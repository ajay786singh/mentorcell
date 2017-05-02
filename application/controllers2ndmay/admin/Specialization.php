<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Specialization extends Admin_Controller {

    public function __construct()
    {
        parent::__construct();

        /* Load :: Common */
        $this->lang->load('admin/users');

        /* Title Page :: Common */
        $this->page_title->push(lang('menu_users'));
        $this->data['pagetitle'] = '<h1>Courses</h1>';

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
			$this->data['specialization_list'] = $this->common_model->get_all("mc_specialization");
            $this->template->admin_render('admin/specialization/index', $this->data);
        }
	}


	public function create()
	{
		/* Breadcrumbs */
        $this->breadcrumbs->unshift(2, lang('menu_users_create'), 'admin/specialization/create');
        $this->data['breadcrumb'] = $this->breadcrumbs->show();

        /* Variables */
		$tables = $this->config->item('tables', 'ion_auth');
		/* Conf */
		$config['upload_path']      = './upload/';
		$config['allowed_types']    = 'gif|jpg|png';
		$config['file_ext_tolower'] = TRUE;
		$this->load->library('upload', $config);

		/* Validate form input */
		$this->form_validation->set_rules('course_id', 'Course', 'required');
		$this->form_validation->set_rules('specialization_name', 'Specialization Name', 'required');
		$this->form_validation->set_rules('status', 'Status', 'required');
		
		
		if ($this->form_validation->run() == TRUE)
		{	
			$this->data = array();
			$this->data = $this->input->post();
		}
		if ($this->form_validation->run() == TRUE && $this->common_model->insert($this->data,"mc_specialization"))
		{
            $this->session->set_flashdata('message', 'Specialization added successfully!');
			redirect('admin/specialization', 'refresh');
		}
		else
		{
            $this->data['message'] =  (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));

			$this->data['course_id']['value'] = $this->form_validation->set_value('course_id');
			$this->data['specialization_name']['value'] = $this->form_validation->set_value('specialization_name');
			$this->data['status']['value'] = $this->form_validation->set_value('status');
			
			$this->data['courses'] = $this->common_model->get_all_rows("mc_courses", 1,1);
            /* Load Template */
            $this->template->admin_render('admin/specialization/create', $this->data);
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
		

				if($this->common_model->delete_where("mc_specialization",'specialization_id',$id))	
			    {
                    $this->session->set_flashdata('message', 'Specialization Deleted!');
					redirect('admin/specialization', 'refresh');
			    }
			    else
			    {
					$this->session->set_flashdata('message', 'No Specialization found.');
					redirect('admin/specialization', 'refresh');
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
        $this->breadcrumbs->unshift(2, lang('menu_users_edit'), 'admin/specialization/edit');
        $this->data['breadcrumb'] = $this->breadcrumbs->show();

        /* Data */
		$specialization = $this->common_model->get_single_row("mc_specialization", "specialization_id", $id);
		
		/* Validate form input */
		/* Validate form input */
		$this->form_validation->set_rules('course_id', 'Course', 'required');
		$this->form_validation->set_rules('specialization_name', 'Specialization Name', 'required');
		$this->form_validation->set_rules('status', 'Status', 'required');

		if (isset($_POST) && ! empty($_POST))
		{
            /*if ($this->_valid_csrf_nonce() === FALSE OR $id != $this->input->post('id'))
			{	
				show_error('There is something wrong with security.');
			}*/

			if ($this->form_validation->run() == TRUE)
			{
				$data['course_id'] = $this->input->post('course_id');
				$data['specialization_name'] = $this->input->post('specialization_name');
				$data['status'] = $this->input->post('status');
				
                if($this->common_model->update("mc_specialization", $data, "specialization_id", $specialization['specialization_id']))
			    {
                    $this->session->set_flashdata('message', 'specialization data Updated!');
					redirect('admin/specialization', 'refresh');
			    }
			    else
			    {
                    $this->session->set_flashdata('message', $this->ion_auth->errors());
						redirect('admin/specialization', 'refresh');
					
			    }
			}
		}

		

		// set the flash data error message if there is one
		$this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));

			$this->data['course_id']['value'] = $this->form_validation->set_value('course_id',$specialization['course_id']);
			$this->data['specialization_name']['value'] = $this->form_validation->set_value('course_name',$specialization['specialization_name']);
			$this->data['status']['value'] = $this->form_validation->set_value('status',$specialization['status']);
			$this->data['specialization_id'] = 	$specialization['specialization_id'];
			$this->data['courses'] = $this->common_model->get_all_rows("mc_courses", 1,1);
        /* Load Template */
		$this->template->admin_render('admin/specialization/edit', $this->data);
	}


	

	public function view($id)
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







	
	
}
