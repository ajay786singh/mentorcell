<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Questionnaire extends Admin_Controller {

    public function __construct()
    {
        parent::__construct();

        /* Load :: Common */
        $this->lang->load('admin/users');

        /* Title Page :: Common */
        $this->page_title->push(lang('menu_users'));
        $this->data['pagetitle'] = '<h1>Questionnaire</h1>';

        /* Breadcrumbs :: Common */
        $this->breadcrumbs->unshift(1, lang('menu_users'), 'admin/streams');
		
		/* college model */
		$this->load->model('common/common_model');
	

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

            /* Load Template */
			$this->data['questionnaire_list'] = $this->common_model->get_all("mc_questionnaire");
            $this->template->admin_render('admin/questionnaire/index', $this->data);
        }
	}


	public function create()
	{
		/* Breadcrumbs */
        $this->breadcrumbs->unshift(2, lang('menu_users_create'), 'admin/streams/create');
        $this->data['breadcrumb'] = $this->breadcrumbs->show();

        /* Variables */
		$tables = $this->config->item('tables', 'ion_auth');
		/* Conf */
		$config['upload_path']      = './upload/';
		$config['allowed_types']    = 'gif|jpg|png';
		$config['file_ext_tolower'] = TRUE;
		$this->load->library('upload', $config);

		/* Validate form input */
		$this->form_validation->set_rules('category_id', 'Category', 'required');
		$this->form_validation->set_rules('question', 'Question', 'required');
		$this->form_validation->set_rules('level_id', 'Level', 'required');
		// $this->form_validation->set_rules('type', 'Type', 'required');
		$this->form_validation->set_rules('status', 'Status', 'required');
		
		
		if ($this->form_validation->run() == TRUE)
		{	
			$this->data = array();
			$this->data = $this->input->post();
		}
		if ($this->form_validation->run() == TRUE && $this->common_model->insert($this->data,"mc_questionnaire"))
		{
            $this->session->set_flashdata('message', 'Questionnaire added successfully!');
			redirect('admin/questionnaire', 'refresh');
		}
		else
		{
            $this->data['message'] =  (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));

			$this->data['category_id']['value'] = $this->form_validation->set_value('category_id');
			$this->data['question']['value'] = $this->form_validation->set_value('question');
			$this->data['level_id']['value'] = $this->form_validation->set_value('level_id');
			// $this->data['type']['value'] 	= $this->form_validation->set_value('type');
			if($this->form_validation->set_value('status')) {
				$this->data['status']['value'] = $this->form_validation->set_value('status');
			} else {
				$this->data['status']['value'] = 1;
			}
			
			$this->data['categories'] 	= $this->common_model->get_all_rows("mc_categories", 1,1);
			$this->data['levels'] 		= $this->common_model->get_all_rows("mc_levels", 1,1);
			// $this->data['types'] 		= array(1=>'Radio', 'Textbox', 'Checkbox');
            /* Load Template */
            $this->template->admin_render('admin/questionnaire/create', $this->data);
        }

    }
	


	public function delete($question_id)
	{
        /* Load Template */
		$question_id = (int) $question_id;

		if ( ! $this->ion_auth->logged_in() OR ( ! $this->ion_auth->is_admin() ))
		{
			redirect('auth', 'refresh');
		}
		
				if($this->common_model->delete("mc_questionnaire","question_id",$question_id))
			    {
                    $this->session->set_flashdata('message', 'Questionnaire Deleted!');
					redirect('admin/questionnaire', 'refresh');
			    }
			    else
			    {
					$this->session->set_flashdata('message', 'No Questionnaire found.');
					redirect('admin/questionnaire', 'refresh');
				}
	}


	public function edit($question_id)
	{
        $question_id = (int) $question_id;

		if ( ! $this->ion_auth->logged_in() OR ( ! $this->ion_auth->is_admin() ))
		{
			redirect('auth', 'refresh');
		}

		/* Conf */
		$config['upload_path']      = './upload/';
		$config['allowed_types']    = 'gif|jpg|png';
		$config['file_ext_tolower'] = TRUE;
		$this->load->library('upload', $config);
        /* Breadcrumbs */
        $this->breadcrumbs->unshift(2, lang('menu_users_edit'), 'admin/questionnaire/edit');
        $this->data['breadcrumb'] = $this->breadcrumbs->show();

        /* Data */
		$questionnaire = $this->common_model->get_single_row("mc_questionnaire", "question_id", $question_id);
		
		/* Validate form input */
		$this->form_validation->set_rules('category_id', 'Category', 'required');
		$this->form_validation->set_rules('question', 'Question', 'required');
		$this->form_validation->set_rules('level_id', 'Level', 'required');
		// $this->form_validation->set_rules('type', 'Type', 'required');
		$this->form_validation->set_rules('status', 'Status', 'required');

		if (isset($_POST) && ! empty($_POST))
		{
            /*if ($this->_valid_csrf_nonce() === FALSE OR $question_id != $this->input->post('question_id'))
			{	
				show_error('There is something wrong with security.');
			}*/

			if ($this->form_validation->run() == TRUE)
			{
				$data['category_id'] = $this->input->post('category_id');
				$data['question'] = $this->input->post('question');
				$data['level_id'] = $this->input->post('level_id');
				// $data['type']	 = $this->input->post('type');
				
				$data['status'] = $this->input->post('status');
				
                if($this->common_model->update("mc_questionnaire", $data, "question_id", $questionnaire['question_id']))
			    {
                    $this->session->set_flashdata('message', 'Questionnaire data Updated!');
					redirect('admin/questionnaire', 'refresh');
			    }
			    else
			    {
                    $this->session->set_flashdata('message', $this->ion_auth->errors());
						redirect('admin/questionnaire', 'refresh');
					
			    }
			}
		}

		// display the edit user form
		$this->data['csrf'] = $this->_get_csrf_nonce();
		$this->data['questionnaire'] = $questionnaire;

		// set the flash data error message if there is one
		$this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));

		$this->data['category_id']['value'] = $this->form_validation->set_value('category_id',$questionnaire['category_id']);
		$this->data['question']['value'] = $this->form_validation->set_value('question',$questionnaire['question']);
		$this->data['level_id']['value'] = $this->form_validation->set_value('level_id',$questionnaire['level_id']);
		$this->data['status']['value'] = $this->form_validation->set_value('status',$questionnaire['status']);
		$this->data['categories'] 	= $this->common_model->get_all_rows("mc_categories", 1,1);
		$this->data['levels'] 		= $this->common_model->get_all_rows("mc_levels", 1,1);
		// $this->data['types'] 		= array(1=>'Radio', 'Textbox', 'Checkbox');
			
        /* Load Template */
		$this->template->admin_render('admin/questionnaire/edit', $this->data);
	}


	

	public function view($question_id)
	{
        /* Breadcrumbs */
        $this->breadcrumbs->unshift(2, lang('menu_users_profile'), 'admin/groups/profile');
        $this->data['breadcrumb'] = $this->breadcrumbs->show();

        /* Data */
        $question_id = (int) $question_id;

        $this->data['user_info'] = $this->ion_auth->user($question_id)->result();
        foreach ($this->data['user_info'] as $k => $user)
        {
            $this->data['user_info'][$k]->groups = $this->ion_auth->get_users_groups($user->question_id)->result();
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
	
	public function city()
	{
		$state_id = $this->input->get('state_id');
		$cities = $this->common_model->get_all_rows("cities", "state_id",$state_id);
		$option = '<select  class="form-control" required="" name="city" question_id="college_city" ><option value="">Select City</option>';
		foreach($cities as $city){
			$option .= '<option value="'.$city['question_id'].'">'.$city['name'].'</option>';
		}
		$option .= '</select>';
		echo $option; die;
	}
	
	
}
