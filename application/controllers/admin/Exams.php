<?php
defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting(E_ALL);
class Exams extends Admin_Controller {

    public function __construct()
    {
        parent::__construct();

        /* Load :: Common */
        $this->lang->load('admin/users');

        /* Title Page :: Common */
        $this->page_title->push(lang('menu_users'));
        $this->data['pagetitle'] = $this->page_title->show();

        /* Breadcrumbs :: Common */
        $this->breadcrumbs->unshift(1, lang('menu_users'), 'admin/users');
		
		/* college model */
		        $this->load->model('admin/exam_model');
		        $this->load->model('common/college_model');

    }


	public function index()
	{ 
        if ( ! $this->ion_auth->logged_in() OR ! $this->ion_auth->is_admin())
        {
            redirect('auth/login', 'refresh');
        }
        else
        { 
            /* Breadcrumbs */
            $this->data['breadcrumb'] = $this->breadcrumbs->show();

            /* Get all users */
            $this->data['users'] = $this->ion_auth->users()->result();
            foreach ($this->data['users'] as $k => $user)
            {
                $this->data['users'][$k]->groups = $this->ion_auth->get_users_groups($user->id)->result();
            }

            /* Load Template */
				$this->data['exam_lists'] = $this->exam_model->get_all("mc_exams");
				
				
            	$this->template->admin_render('admin/exams/index', $this->data);
        }
	}


	public function create()
	{
		
		/* Breadcrumbs */
       // $this->breadcrumbs->unshift(2, lang('menu_users_create'), 'admin/users/create');
        //$this->data['breadcrumb'] = $this->breadcrumbs->show();
        /* Variables */
		$tables = $this->config->item('tables', 'ion_auth');
           if( $this->input->method() == 'post'){
			$this->data = array();
			unset($_POST['submit']);
			unset($_POST['id']);
			$this->data = $this->input->post();
			$this->exam_model->insert($this->data,"mc_exams");
			//$this->session->set_flashdata('success_msg',"Record Inserted Successfully.");
			    $this->template->admin_render('admin/exams/index');
		}else{
			//$this->data = array();
			$this->data['form_type'] = 'add';
		}
	           $this->data['exams_list'] = $this->exam_model->get_all("mc_exams");
			    $this->template->admin_render('admin/exams/exam', $this->data);
        }
	


	public function delete($id)
	{
        /* Load Template */
		//$this->template->admin_render('admin/users/delete', $this->data);
		$this->exam_model->delete($id);
		redirect('admin/exams/index', 'refresh');
	}


	public function edit($id)
	{
        $id = (int) $id;        
		$tables = $this->config->item('tables', 'ion_auth');
           if( $this->input->method() == 'post'){
			$this->data = array();
			unset($_POST['submit']);
			unset($_POST['id']);
			$this->data = $this->input->post();
			
			$this->exam_model->update("mc_exams",$this->data, "id", $id);
			//$this->session->set_flashdata('success_msg',"Record Inserted Successfully.");
			  //$this->data['exam_lists'] = $this->exam_model->get_all("mc_exams");
			  //$this->template->admin_render('admin/exams/index', $this->data);
			  redirect('admin/exams/index', 'refresh');
			  
		}else{
			//$this->data = array();
			//$this->data['form_type'] = 'add';
		}
	    $this->data['form_data'] = $id;
		$this->data['exams_list'] = $this->exam_model->get_single_row("mc_exams","id", $id);
		$this->template->admin_render('admin/exams/exam', $this->data);
        /* Load Template */
	}


	function activate($id, $code = FALSE)
	{
        $id = (int) $id;

		if ($code !== FALSE)
		{
            $activation = $this->ion_auth->activate($id, $code);
		}
		else if ($this->ion_auth->is_admin())
		{
			$activation = $this->ion_auth->activate($id);
		}

		if ($activation)
		{
            $this->session->set_flashdata('message', $this->ion_auth->messages());
			redirect('admin/users', 'refresh');
		}
		else
		{
			$this->session->set_flashdata('message', $this->ion_auth->errors());
			redirect('auth/forgot_password', 'refresh');
		}
	}


	public function deactivate($id = NULL)
	{
		if ( ! $this->ion_auth->logged_in() OR ! $this->ion_auth->is_admin())
		{
            return show_error('You must be an administrator to view this page.');
		}

        /* Breadcrumbs */
        $this->breadcrumbs->unshift(2, lang('menu_users_deactivate'), 'admin/users/deactivate');
        $this->data['breadcrumb'] = $this->breadcrumbs->show();

		/* Validate form input */
		$this->form_validation->set_rules('confirm', 'lang:deactivate_validation_confirm_label', 'required');
		$this->form_validation->set_rules('id', 'lang:deactivate_validation_user_id_label', 'required|alpha_numeric');

		$id = (int) $id;

		if ($this->form_validation->run() === FALSE)
		{
			$user = $this->ion_auth->user($id)->row();

            $this->data['csrf']       = $this->_get_csrf_nonce();
            $this->data['id']         = (int) $user->id;
            $this->data['firstname']  = ! empty($user->first_name) ? htmlspecialchars($user->first_name, ENT_QUOTES, 'UTF-8') : NULL;
            $this->data['lastname']   = ! empty($user->last_name) ? ' '.htmlspecialchars($user->last_name, ENT_QUOTES, 'UTF-8') : NULL;

            /* Load Template */
            $this->template->admin_render('admin/users/deactivate', $this->data);
		}
		else
		{
            if ($this->input->post('confirm') == 'yes')
			{
                if ($this->_valid_csrf_nonce() === FALSE OR $id != $this->input->post('id'))
				{
                    show_error($this->lang->line('error_csrf'));
				}

                if ($this->ion_auth->logged_in() && $this->ion_auth->is_admin())
				{
					$this->ion_auth->deactivate($id);
				}
			}

			redirect('admin/users', 'refresh');
		}
	}


	public function profile($id)
	{
        /* Breadcrumbs */
        $this->breadcrumbs->unshift(2, lang('menu_users_profile'), 'admin/groups/profile');
        $this->data['breadcrumb'] = $this->breadcrumbs->show();

        /* Data */
        $id = (int) $id;

        $this->data['user_info'] = $this->ion_auth->user($id)->result();
        foreach ($this->data['user_info'] as $k => $user)
        {
            $this->data['user_info'][$k]->groups = $this->ion_auth->get_users_groups($user->id)->result();
        }

        /* Load Template */
		$this->template->admin_render('admin/users/profile', $this->data);
	}


	public function _get_csrf_nonce()
	{
		$this->load->helper('string');
		$key   = random_string('alnum', 8);
		$value = random_string('alnum', 20);
		$this->session->set_flashdata('csrfkey', $key);
		$this->session->set_flashdata('csrfvalue', $value);

		return array($key => $value);
	}


	public function _valid_csrf_nonce()
	{
		if ($this->input->post($this->session->flashdata('csrfkey')) !== FALSE && $this->input->post($this->session->flashdata('csrfkey')) == $this->session->flashdata('csrfvalue'))
		{
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}
}
