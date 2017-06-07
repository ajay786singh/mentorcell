<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Courses extends Admin_Controller {

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
			$this->data['courses_list'] = $this->common_model->get_all("mc_courses");
            $this->template->admin_render('admin/courses/index', $this->data);
        }
	}
	
	public function desirecourses()
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
			$this->data['courses_list'] = $this->common_model->get_all("mc_desire_course");
            $this->template->admin_render('admin/courses/desirecourses', $this->data);
        }
	}
	
	public function intake()
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
			$this->data['courses_list'] = $this->common_model->get_all("mc_intake");
            $this->template->admin_render('admin/courses/intake', $this->data);
        }
	}
	
	public function testimonial()
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
			$this->data['courses_list'] = $this->common_model->get_all("mc_testimonial");
            $this->template->admin_render('admin/courses/testimonial', $this->data);
        }
	}
	
	public function courses_status()
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
			$this->data['courses_list'] = $this->common_model->get_all("mc_course_status");
            $this->template->admin_render('admin/courses/courses_status', $this->data);
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
		$this->form_validation->set_rules('stream_id', 'Course Stream', 'required');
		$this->form_validation->set_rules('course_name', 'Course Name', 'required');
		$this->form_validation->set_rules('popular_courses', 'Popular Course', 'required');
		//$this->form_validation->set_rules('course_code', 'Course Code', 'required');
		$this->form_validation->set_rules('status', 'Status', 'required');
		
		
		if ($this->form_validation->run() == TRUE)
		{	
			$this->data = array();
			$this->data = $this->input->post();
		}
		if ($this->form_validation->run() == TRUE && $this->common_model->insert($this->data,"mc_courses"))
		{
            $this->session->set_flashdata('message', 'Courses added successfully!');
			redirect('admin/courses', 'refresh');
		}
		else
		{
            $this->data['message'] =  (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));

			$this->data['stream_id']['value'] = $this->form_validation->set_value('stream_id');
			$this->data['course_name']['value'] = $this->form_validation->set_value('course_name');
			$this->data['popular_courses']['value'] = $this->form_validation->set_value('popular_courses');
			//$this->data['course_code']['value'] = $this->form_validation->set_value('course_code');
			$this->data['course_duration']['value'] = $this->form_validation->set_value('course_duration');			
			$this->data['status']['value'] = $this->form_validation->set_value('status');
			$this->data['streams'] = $this->common_model->get_all_rows("mc_streams", 1,1);
			//$this->data['types'] = $this->common_model->get_all_rows("mc_types", 1,1);
            /* Load Template */
            $this->template->admin_render('admin/courses/create', $this->data);
        }

    }
	
		public function createdesire()
	{
		/* Breadcrumbs */
        $this->breadcrumbs->unshift(2, lang('menu_users_create'), 'admin/courses/createdesire');
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
		$this->form_validation->set_rules('status', 'Status', 'required');
		
		
		if ($this->form_validation->run() == TRUE)
		{	
			$this->data = array();
			$this->data = $this->input->post();
		}
		if ($this->form_validation->run() == TRUE && $this->common_model->insert($this->data,"mc_desire_course"))
		{
            $this->session->set_flashdata('message', 'Desire Courses added successfully!');
			redirect('admin/courses/desirecourses', 'refresh');
		}
		else
		{
            $this->data['message'] =  (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));

			$this->data['name']['value'] = $this->form_validation->set_value('name');
			$this->data['duration']['value'] = $this->form_validation->set_value('duration');			
			$this->data['status']['value'] = $this->form_validation->set_value('status');
            /* Load Template */
            $this->template->admin_render('admin/courses/createdesire', $this->data);
        }

    }
	
	public function createintake()
	{
		/* Breadcrumbs */
        $this->breadcrumbs->unshift(2, lang('menu_users_create'), 'admin/courses/createintake');
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
		$this->form_validation->set_rules('status', 'Status', 'required');
		
		
		if ($this->form_validation->run() == TRUE)
		{	
			$this->data = array();
			$this->data = $this->input->post();
		}
		if ($this->form_validation->run() == TRUE && $this->common_model->insert($this->data,"mc_intake"))
		{
            $this->session->set_flashdata('message', 'Intake added successfully!');
			redirect('admin/courses/intake', 'refresh');
		}
		else
		{
            $this->data['message'] =  (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));

			$this->data['name']['value'] = $this->form_validation->set_value('name');
			$this->data['status']['value'] = $this->form_validation->set_value('status');
            /* Load Template */
            $this->template->admin_render('admin/courses/createintake', $this->data);
        }

    }
	
	
		public function createtestimonial()
	{
		/* Breadcrumbs */
        $this->breadcrumbs->unshift(2, lang('menu_users_create'), 'admin/courses/createtestimonial');
        $this->data['breadcrumb'] = $this->breadcrumbs->show();
 /* Variables */
		$tables = $this->config->item('tables', 'ion_auth');
		/* Conf */
		$config['upload_path']      = './upload/';
		$config['allowed_types']    = 'gif|jpg|png|pdf';
		$config['file_ext_tolower'] = TRUE;
		$this->load->library('upload', $config);
		
		$this->form_validation->set_rules('status', 'Status', 'required');
		
		if ($this->form_validation->run() == TRUE)
		{	
	       $this->upload->do_upload('image');
			$image = $this->upload->data();
			$this->data = array();
			$this->data = $this->input->post();
			$this->data['image'] = $image['file_name'];
		}
		if ($this->form_validation->run() == TRUE && $this->common_model->insert($this->data,"mc_testimonial"))
		{
            $this->session->set_flashdata('message', 'Testimonial added successfully!');
			redirect('admin/courses/testimonial', 'refresh');
		}else{
       $this->data['message'] =  (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));

       $this->template->admin_render('admin/courses/createtestimonial', $this->data);
		}
    }
	
	
	public function editdesire($id)
	{
        $id = (int) $id;

		if ( ! $this->ion_auth->logged_in() OR ( ! $this->ion_auth->is_admin() ))
		{
			redirect('auth', 'refresh');
		}

        /* Breadcrumbs */
        $this->breadcrumbs->unshift(2, lang('menu_users_edit'), 'admin/courses/editdesire');
        $this->data['breadcrumb'] = $this->breadcrumbs->show();

        /* Data */
		$courses = $this->common_model->get_single_row("mc_desire_course", "id", $id);
		
		/* Validate form input */
		$this->form_validation->set_rules('name', 'Course Name', 'required');
		$this->form_validation->set_rules('status', 'Status', 'required');

		if (isset($_POST) && ! empty($_POST))
		{
            
			if ($this->form_validation->run() == TRUE)
			{
				$data['name'] = $this->input->post('name');
				$data['duration'] = $this->input->post('duration');
				$data['status'] = $this->input->post('status');
				
                if($this->common_model->update("mc_desire_course", $data, "id", $courses['id']))
			    {
                    $this->session->set_flashdata('message', 'Course data Updated!');
					redirect('admin/courses/desirecourses', 'refresh');
			    }
			    else
			    {
                    $this->session->set_flashdata('message', $this->ion_auth->errors());
						redirect('admin/courses/desirecourses', 'refresh');
					
			    }
			}
		}

		// display the edit user form
		$this->data['csrf'] = $this->_get_csrf_nonce();
		$this->data['courses'] = $courses;

		// set the flash data error message if there is one
		$this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));

			$this->data['name']['value'] = $this->form_validation->set_value('name',$courses['name']);
			$this->data['status']['value'] = $this->form_validation->set_value('status',$courses['status']);
			$this->data['duration']['value'] = $this->form_validation->set_value('duration',$courses['duration']);
			/* Load Template */
		$this->template->admin_render('admin/courses/editdesire', $this->data);
	}
	
	public function editintake($id)
	{
        $id = (int) $id;

		if ( ! $this->ion_auth->logged_in() OR ( ! $this->ion_auth->is_admin() ))
		{
			redirect('auth', 'refresh');
		}

        /* Breadcrumbs */
        $this->breadcrumbs->unshift(2, lang('menu_users_edit'), 'admin/courses/editdesire');
        $this->data['breadcrumb'] = $this->breadcrumbs->show();

        /* Data */
		$courses = $this->common_model->get_single_row("mc_intake", "id", $id);
		
		/* Validate form input */
		$this->form_validation->set_rules('name', 'Intake Name', 'required');
		$this->form_validation->set_rules('status', 'Status', 'required');

		if (isset($_POST) && ! empty($_POST))
		{
            
			if ($this->form_validation->run() == TRUE)
			{
				$data['name'] = $this->input->post('name');
				$data['status'] = $this->input->post('status');
				
                if($this->common_model->update("mc_intake", $data, "id", $courses['id']))
			    {
                    $this->session->set_flashdata('message', 'Intake data Updated!');
					redirect('admin/courses/intake', 'refresh');
			    }
			    else
			    {
                    $this->session->set_flashdata('message', $this->ion_auth->errors());
						redirect('admin/courses/intake', 'refresh');
					
			    }
			}
		}

		// display the edit user form
		$this->data['csrf'] = $this->_get_csrf_nonce();
		$this->data['courses'] = $courses;

		// set the flash data error message if there is one
		$this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));

			$this->data['name']['value'] = $this->form_validation->set_value('name',$courses['name']);
			$this->data['status']['value'] = $this->form_validation->set_value('status',$courses['status']);
			/* Load Template */
		$this->template->admin_render('admin/courses/editintake', $this->data);
	}
	
		public function create_status()
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
		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('status', 'Status', 'required');
		
		
		if ($this->form_validation->run() == TRUE)
		{	
			$this->data = array();
			$this->data = $this->input->post();
		}
		if ($this->form_validation->run() == TRUE && $this->common_model->insert($this->data,"mc_course_status"))
		{
            $this->session->set_flashdata('message', 'Course Status added successfully!');
			redirect('admin/courses/courses_status', 'refresh');
		}
		else
		{
            $this->data['message'] =  (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));

			$this->data['name']['value'] = $this->form_validation->set_value('name');
			$this->data['status']['value'] = $this->form_validation->set_value('status');
            /* Load Template */
            $this->template->admin_render('admin/courses/create_status', $this->data);
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
		
					if($this->common_model->delete_where("mc_courses",'course_id',$id))
			    {
                    $this->session->set_flashdata('message', 'Course Deleted!');
					redirect('admin/courses', 'refresh');
			    }
			    else
			    {
					$this->session->set_flashdata('message', 'No Course found.');
					redirect('admin/courses', 'refresh');
				}
	}
	
		public function deletedesire($id)
	{
        /* Load Template */
		$id = (int) $id;

		if ( ! $this->ion_auth->logged_in() OR ( ! $this->ion_auth->is_admin() ))
		{
			redirect('auth', 'refresh');
		}
		
					if($this->common_model->delete_where("mc_desire_course",'id',$id))
			    {
                    $this->session->set_flashdata('message', 'Course Deleted!');
					redirect('admin/courses/desirecourses', 'refresh');
			    }
			    else
			    {
					$this->session->set_flashdata('message', 'No Course found.');
					redirect('admin/courses/desirecourses', 'refresh');
				}
	}
	
	public function deleteintake($id)
	{
        /* Load Template */
		$id = (int) $id;

		if ( ! $this->ion_auth->logged_in() OR ( ! $this->ion_auth->is_admin() ))
		{
			redirect('auth', 'refresh');
		}
		
					if($this->common_model->delete_where("mc_intake",'id',$id))
			    {
                    $this->session->set_flashdata('message', 'Intake Deleted!');
					redirect('admin/courses/intake', 'refresh');
			    }
			    else
			    {
					$this->session->set_flashdata('message', 'No Intake found.');
					redirect('admin/courses/intake', 'refresh');
				}
	}
	
	public function status_delete($id)
	{
        /* Load Template */
		$id = (int) $id;

		if ( ! $this->ion_auth->logged_in() OR ( ! $this->ion_auth->is_admin() ))
		{
			redirect('auth', 'refresh');
		}
		
					if($this->common_model->delete_where("mc_course_status",'id',$id))
			    {
                    $this->session->set_flashdata('message', 'Course Deleted!');
					redirect('admin/courses/courses_status', 'refresh');
			    }
			    else
			    {
					$this->session->set_flashdata('message', 'No Course found.');
					redirect('admin/courses/courses_status', 'refresh');
				}
	}
	
	public function deletetestimonial($id)
	{
        /* Load Template */
		$id = (int) $id;

		if ( ! $this->ion_auth->logged_in() OR ( ! $this->ion_auth->is_admin() ))
		{
			redirect('auth', 'refresh');
		}
		
					if($this->common_model->delete_where("mc_testimonial",'id',$id))
			    {
                    $this->session->set_flashdata('message', 'Course Deleted!');
					redirect('admin/courses/testimonial', 'refresh');
			    }
			    else
			    {
					$this->session->set_flashdata('message', 'No Course found.');
					redirect('admin/courses/testimonial', 'refresh');
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
        $this->breadcrumbs->unshift(2, lang('menu_users_edit'), 'admin/courses/edit');
        $this->data['breadcrumb'] = $this->breadcrumbs->show();

        /* Data */
		$courses = $this->common_model->get_single_row("mc_courses", "course_id", $id);
		
		/* Validate form input */
		$this->form_validation->set_rules('stream_id', 'Course Stream', 'required');
		$this->form_validation->set_rules('popular_courses', 'Popular Course', 'required');
		$this->form_validation->set_rules('course_name', 'Course Name', 'required');
		//$this->form_validation->set_rules('course_code', 'Course Code', 'required');
		$this->form_validation->set_rules('status', 'Status', 'required');

		if (isset($_POST) && ! empty($_POST))
		{
            /*if ($this->_valid_csrf_nonce() === FALSE OR $id != $this->input->post('id'))
			{	
				show_error('There is something wrong with security.');
			}*/

			if ($this->form_validation->run() == TRUE)
			{
				$data['stream_id'] = $this->input->post('stream_id');
				$data['course_name'] = $this->input->post('course_name');
				$data['popular_courses'] = $this->input->post('popular_courses');
				//$data['course_code'] = $this->input->post('course_code');
				$data['course_duration'] = $this->input->post('course_duration');
				
				$data['status'] = $this->input->post('status');
				
                if($this->common_model->update("mc_courses", $data, "course_id", $courses['course_id']))
			    {
                    $this->session->set_flashdata('message', 'Course data Updated!');
					redirect('admin/courses', 'refresh');
			    }
			    else
			    {
                    $this->session->set_flashdata('message', $this->ion_auth->errors());
						redirect('admin/courses', 'refresh');
					
			    }
			}
		}

		// display the edit user form
		$this->data['csrf'] = $this->_get_csrf_nonce();
		$this->data['courses'] = $courses;

		// set the flash data error message if there is one
		$this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));

			$this->data['stream_id']['value'] = $this->form_validation->set_value('stream_id',$courses['stream_id']);
			$this->data['course_name']['value'] = $this->form_validation->set_value('course_name',$courses['course_name']);
			$this->data['popular_courses']['value'] = $this->form_validation->set_value('popular_courses',$courses['popular_courses']);
			//$this->data['course_code']['value'] = $this->form_validation->set_value('course_code',$courses['course_code']);
			$this->data['status']['value'] = $this->form_validation->set_value('status',$courses['status']);
			$this->data['course_duration']['value'] = $this->form_validation->set_value('course_duration',$courses['course_duration']);
			$this->data['streams'] = $this->common_model->get_all_rows("mc_streams", 1,1);
			$this->data['collage_list'] = $this->common_model->get_all_rows("mc_colleges",1,1);
			//print_r($this->data['collage_list']);die;
			//$this->data['types'] = $this->common_model->get_all_rows("mc_types", 1,1);
        /* Load Template */
		$this->template->admin_render('admin/courses/edit', $this->data);
	}
	
	
	public function status_edit($id)
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
        $this->breadcrumbs->unshift(2, lang('menu_users_edit'), 'admin/courses/status_edit');
        $this->data['breadcrumb'] = $this->breadcrumbs->show();

        /* Data */
		$courses = $this->common_model->get_single_row("mc_course_status", "id", $id);
		
		/* Validate form input */
		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('status', 'Status', 'required');

		if (isset($_POST) && ! empty($_POST))
		{
            /*if ($this->_valid_csrf_nonce() === FALSE OR $id != $this->input->post('id'))
			{	
				show_error('There is something wrong with security.');
			}*/

			if ($this->form_validation->run() == TRUE)
			{
				$data['name'] = $this->input->post('name');				
				$data['status'] = $this->input->post('status');
				
                if($this->common_model->update("mc_course_status", $data, "id", $courses['id']))
			    {
                    $this->session->set_flashdata('message', 'Course data Updated!');
					redirect('admin/courses/courses_status', 'refresh');
			    }
			    else
			    {
                    $this->session->set_flashdata('message', $this->ion_auth->errors());
						redirect('admin/courses/courses_status', 'refresh');
					
			    }
			}
		}

		// display the edit user form
		$this->data['csrf'] = $this->_get_csrf_nonce();
		$this->data['courses'] = $courses;

		// set the flash data error message if there is one
		$this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));

			$this->data['name']['value'] = $this->form_validation->set_value('name',$courses['name']);
			$this->data['status']['value'] = $this->form_validation->set_value('status',$courses['status']);
        /* Load Template */
		$this->template->admin_render('admin/courses/status_edit', $this->data);
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
		$option = '<select  class="form-control" required="" name="city" id="college_city" ><option value="">Select City</option>';
		foreach($cities as $city){
			$option .= '<option value="'.$city['id'].'">'.$city['name'].'</option>';
		}
		$option .= '</select>';
		echo $option; die;
	}
	
	
}
