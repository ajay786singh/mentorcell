<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Caller extends Admin_Controller {

    public function __construct()
    {
        parent::__construct();

        /* Load :: Common */
        $this->lang->load('admin/users');

        /* Title Page :: Common */
        $this->page_title->push(lang('menu_users'));
        $this->data['pagetitle'] = '<h1>Caller</h1>';

        /* Breadcrumbs :: Common */
        $this->breadcrumbs->unshift(1, lang('menu_users'), 'admin/streams');
		
		/* college model */
		$this->load->model('common/common_model');
		/* college model */
		$this->load->model('common/college_model');
		/* college model */
	

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
			$this->data['caller_list'] = $this->common_model->get_all("mc_caller");
            $this->template->admin_render('admin/caller/index', $this->data);
        }
	}


	public function create()
	{
		/* Breadcrumbs */
        $this->breadcrumbs->unshift(2, lang('menu_users_create'), 'admin/caller/create');
        $this->data['breadcrumb'] = $this->breadcrumbs->show();

        /* Variables */
		$tables = $this->config->item('tables', 'ion_auth');
		/* Conf */
		$config['upload_path']      = './upload/';
		$config['allowed_types']    = 'gif|jpg|png';
		$config['file_ext_tolower'] = TRUE;
		$this->load->library('upload', $config);

		/* Validate form input */
		$this->form_validation->set_rules('name', 'Name', 'required');
		
		if ($this->form_validation->run() == TRUE)
		{	
			$this->data = array();
			$this->data = $this->input->post();
		}
		if ($this->form_validation->run() == TRUE && $this->common_model->insert($this->data,"mc_caller"))
		{
            $this->session->set_flashdata('message', 'Caller added successfully!');
			redirect('admin/caller', 'refresh');
		}
		else
		{
            $this->data['message'] =  (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));

			$this->data['name']['value'] = $this->form_validation->set_value('name');
			$this->data['phone']['value'] = $this->form_validation->set_value('phone');
			
            /* Load Template */
            $this->template->admin_render('admin/caller/create', $this->data);
        }

    }
	


	public function delete($id)
	{
        /* Load Template */
		$id = (int) $id;

		if ( ! $this->ion_auth->logged_in() OR ( ! $this->ion_auth->is_admin() ))
		{
			redirect('auth', 'refresh');
		}
		

				if($this->common_model->delete_where("mc_caller",'id',$id))	
			    {
                    $this->session->set_flashdata('message', 'Caller Deleted!');
					redirect('admin/caller', 'refresh');
			    }
			    else
			    {
					$this->session->set_flashdata('message', 'No Caller found.');
					redirect('admin/caller', 'refresh');
				}
	}


	public function edit($id)
	{
        $id = (int) $id;

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
        $this->breadcrumbs->unshift(2, lang('menu_users_edit'), 'admin/caller/edit');
        $this->data['breadcrumb'] = $this->breadcrumbs->show();

        /* Data */
		$caller = $this->common_model->get_single_row("mc_caller", "id", $id);
		
		/* Validate form input */
		/* Validate form input */
		$this->form_validation->set_rules('name', 'Name', 'required');

		if (isset($_POST) && ! empty($_POST))
		{
            /*if ($this->_valid_csrf_nonce() === FALSE OR $id != $this->input->post('id'))
			{	
				show_error('There is something wrong with security.');
			}*/

			if ($this->form_validation->run() == TRUE)
			{
				$data['name'] = $this->input->post('name');
				$data['phone'] = $this->input->post('phone');
				
                if($this->common_model->update("mc_caller", $data, "id", $caller['id']))
			    {
                    $this->session->set_flashdata('message', 'Caller data Updated!');
					redirect('admin/caller', 'refresh');
			    }
			    else
			    {
                    $this->session->set_flashdata('message', $this->ion_auth->errors());
						redirect('admin/caller', 'refresh');
					
			    }
			}
		}

		

		// set the flash data error message if there is one
		$this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));

			$this->data['id'] 			  = 	$caller['id'];
			$this->data['name']['value']  = $this->form_validation->set_value('name',$caller['name']);
			$this->data['phone']['value'] = $this->form_validation->set_value('phone',$caller['phone']);

        /* Load Template */
		$this->template->admin_render('admin/caller/edit', $this->data);
	}

	
	
}
