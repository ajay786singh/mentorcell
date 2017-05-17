<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Colleges extends Admin_Controller {

    public function __construct()
    {
        parent::__construct();

        /* Load :: Common */
        $this->lang->load('admin/users');

        /* Title Page :: Common */
        $this->page_title->push(lang('menu_users'));
        $this->data['pagetitle'] = '<h1>College</h1>';

        /* Breadcrumbs :: Common */
        $this->breadcrumbs->unshift(1, lang('menu_users'), 'admin/colleges');
		
		/* college model */
		 $this->load->model('admin/exam_model');
		$this->load->model('common/common_model');
		/* college model */
		$this->load->model('common/college_model');
		/* college model */
	

    }


	public function index()
	{
        if ( ! $this->ion_auth->logged_in() OR (! $this->ion_auth->is_admin() && ! $this->ion_auth->in_group('college')))
        {
            redirect('auth/login', 'refresh');
        }
        else
        {
            /* Breadcrumbs */
            $this->data['breadcrumb'] = $this->breadcrumbs->show();

            /* Load Template */
			$userId = $this->ion_auth->get_user_id();
			if($this->ion_auth->in_group('college')){
				$user   = $this->ion_auth->user($userId)->row();
				//$this->data['college_lists'] = $this->common_model->get_all_rows("mc_colleges", 'user_id',$userId);
				$this->data['college_lists'] = $this->college_model->get_assigned_college($user->colleges);
			}else{
				$this->data['college_lists'] = $this->common_model->get_all_rows("mc_colleges","status","2");
			}
			
			
            $this->template->admin_render('admin/colleges/index', $this->data);
        }
	}
	
	public function logo()
	{
        if ( ! $this->ion_auth->logged_in() OR (! $this->ion_auth->is_admin() && ! $this->ion_auth->in_group('logo')))
        {
            redirect('auth/login', 'refresh');
        }
        else
        {
            /* Breadcrumbs */
            $this->data['breadcrumb'] = $this->breadcrumbs->show();

            /* Load Template */
				$this->data['logo_lists'] = $this->common_model->get_all_rows("mc_logo_slider","status","1");
			
			
            $this->template->admin_render('admin/colleges/logo', $this->data);
        }
	}


	public function create()
	{
		/* Breadcrumbs */
        $this->breadcrumbs->unshift(2, lang('menu_users_create'), 'admin/colleges/create');
        $this->data['breadcrumb'] = $this->breadcrumbs->show();

        /* Variables */
		$tables = $this->config->item('tables', 'ion_auth');
		/* Conf */
		$config['upload_path']      = './upload/';
		$config['allowed_types']    = 'gif|jpg|png|pdf';
		$config['file_ext_tolower'] = TRUE;
		$this->load->library('upload', $config);

		$this->form_validation->set_rules('name', 'College name', 'required');
		$this->form_validation->set_rules('popular_colleges', 'Popular Colleges', 'required');
		$this->form_validation->set_rules('featured_colleges', 'Featured Colleges', 'required');
		$this->form_validation->set_rules('address', 'Address', 'required');
		$this->form_validation->set_rules('status', 'Status', 'required');
		
		
		if ($this->form_validation->run() == TRUE)
		{	
	        $this->upload->do_upload('brochure');
			$brochure = $this->upload->data();
			$this->upload->do_upload('logo');
			$logo = $this->upload->data();
		    $this->upload->do_upload('banner');
			$banner = $this->upload->data();
			
			$this->data = array();
			$this->data = $this->input->post();
			$this->data['brochure'] = $brochure['file_name'];
			$this->data['logo'] = $logo['file_name'];
			$this->data['banner'] = $banner['file_name'];
			$this->data['country'] = 101;
			
		}

		if ($this->form_validation->run() == TRUE && $this->common_model->insert($this->data," mc_colleges"))
		{
            $this->session->set_flashdata('message', 'Colleges added successfully!');
			redirect('admin/colleges', 'refresh');
		}
		else
		{
            $this->data['message'] =  (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));

			$this->data['user_id']['value'] = $this->form_validation->set_value('user_id');
			$this->data['name']['value'] = $this->form_validation->set_value('name');
			$this->data['code']['value'] = $this->form_validation->set_value('code');
			$this->data['description']['value'] = $this->form_validation->set_value('description');
			$this->data['contact_person_name']['value'] = $this->form_validation->set_value('contact_person_name');
			$this->data['website']['value'] = $this->form_validation->set_value('website');
			$this->data['email_id']['value'] = $this->form_validation->set_value('email_id');
			$this->data['phone']['value'] = $this->form_validation->set_value('phone');
			$this->data['address']['value'] = $this->form_validation->set_value('address');
			$this->data['state']['value'] = $this->form_validation->set_value('state');
			$this->data['city']['key'] = $this->form_validation->set_value('city');
			$city = $this->common_model->get_single_row("cities", "state_id",$this->data['city']['key']);
			$this->data['city']['value'] = $city['name'];
			$this->data['pincode']['value'] = $this->form_validation->set_value('pincode');
			
			$this->data['why_join']['value'] = $this->form_validation->set_value('why_join');
			$this->data['placement_services']['value'] = $this->form_validation->set_value('placement_services');
			$this->data['top_recruiting_companies']['value'] = $this->form_validation->set_value('top_recruiting_companies');
			$this->data['hostel_details']['value'] = $this->form_validation->set_value('hostel_details');
			$this->data['teaching_facilities']['value'] = $this->form_validation->set_value('teaching_facilities');
			$this->data['top_faculty']['value'] = $this->form_validation->set_value('top_faculty');
			$this->data['partner_colleges']['value'] = $this->form_validation->set_value('partner_colleges');
			$this->data['rank_holders']['value'] = $this->form_validation->set_value('rank_holders');
			$this->data['popular_colleges']['value'] = $this->form_validation->set_value('popular_colleges');
			$this->data['featured_colleges']['value'] = $this->form_validation->set_value('featured_colleges');
            $this->data['status']['value'] = $this->form_validation->set_value('status');
			/* Get all users */
            $this->data['users'] = $this->common_model->get_all_college_user();
			$this->data['states'] = $this->common_model->get_all_rows("states", "country_id",101);
			
            /* Load Template */
            $this->template->admin_render('admin/colleges/create', $this->data);
        }

    }
	
	public function createlogo()
	{
		/* Breadcrumbs */
        $this->breadcrumbs->unshift(2, lang('menu_users_create'), 'admin/colleges/createlogo');
        $this->data['breadcrumb'] = $this->breadcrumbs->show();

        /* Variables */
		$tables = $this->config->item('tables', 'ion_auth');
		/* Conf */
		$config['upload_path']      = './upload/';
		$config['allowed_types']    = 'gif|jpg|png';
		$config['file_ext_tolower'] = TRUE;
		$this->load->library('upload', $config);

		/* Validate form input */
		$this->form_validation->set_rules('college_name', 'College Name', 'required');
		$this->form_validation->set_rules('college_url', 'College URL', 'required');
		$this->form_validation->set_rules('college_detail', 'College Detail', 'required');
		$this->form_validation->set_rules('status', 'Status', 'required');
		
		
		if ($this->form_validation->run() == TRUE)
		{	
	
			//$this->upload->do_upload('logo');
			//$logo = $this->upload->data();
		    
			$this->data = array();
			$this->data = $this->input->post();
			//$this->data['logo'] = $logo['file_name'];
			
		}

		if ($this->form_validation->run() == TRUE && $this->common_model->insert($this->data," mc_logo_slider"))
		{
            $this->session->set_flashdata('message', 'College Featured added successfully!');
			redirect('admin/colleges/logo', 'refresh');
		}
		else
		{
            $this->data['message'] =  (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));

			$this->data['college_name']['value'] = $this->form_validation->set_value('college_name');
			$this->data['college_url']['value'] = $this->form_validation->set_value('college_url');
			$this->data['college_detail']['value'] = $this->form_validation->set_value('college_detail');
			$this->data['status']['value'] = $this->form_validation->set_value('status');
		
            /* Load Template */
			  $this->data['collages'] = $this->common_model->get_all_rows("mc_colleges","status","2");
            $this->template->admin_render('admin/colleges/createlogo', $this->data);
        }

    }
	
	public function delete($id)
	{
        /* Load Template */
		$id = (int) $id;

		if ( ! $this->ion_auth->logged_in() OR (! $this->ion_auth->is_admin() && ! $this->ion_auth->in_group('college')))
		{
			redirect('auth', 'refresh');
		}
		
				if($this->common_model->delete("mc_colleges",$id))
			    {
                    $this->session->set_flashdata('message', 'College Deleted!');
					redirect('admin/colleges', 'refresh');
			    }
			    else
			    {
					$this->session->set_flashdata('message', 'No college found.');
					redirect('admin/colleges', 'refresh');
				}
	}
	
	public function deletelogo($id)
	{
        /* Load Template */
		$id = (int) $id;

		if ( ! $this->ion_auth->logged_in() OR (! $this->ion_auth->is_admin() && ! $this->ion_auth->in_group('college')))
		{
			redirect('auth', 'refresh');
		}
		
				if($this->common_model->delete("mc_logo_slider",$id))
			    {
                    $this->session->set_flashdata('message', 'Logo Deleted!');
					redirect('admin/colleges/logo', 'refresh');
			    }
			    else
			    {
					$this->session->set_flashdata('message', 'No Logo found.');
					redirect('admin/colleges/logo', 'refresh');
				}
	}


	public function edit($id)
	{
        $id = (int) $id;

		if ( ! $this->ion_auth->logged_in() OR (! $this->ion_auth->is_admin() && ! $this->ion_auth->in_group('college')))
		{
			redirect('auth', 'refresh');
		}

		/* Conf */
		$config['upload_path']      = './upload/';
		$config['allowed_types']    = 'gif|jpg|png|pdf';
		$config['file_ext_tolower'] = TRUE;
		$this->load->library('upload', $config);
        /* Breadcrumbs */
        $this->breadcrumbs->unshift(2, lang('menu_users_edit'), 'admin/users/edit');
        $this->data['breadcrumb'] = $this->breadcrumbs->show();

        /* Data */
		$colleges = $this->common_model->get_single_row("mc_colleges", "id", $id);
		$this->form_validation->set_rules('name', 'College name', 'required');
		$this->form_validation->set_rules('popular_colleges', 'Popular Colleges', 'required');
		$this->form_validation->set_rules('featured_colleges', 'Featured Colleges', 'required');
		$this->form_validation->set_rules('address', 'Address', 'required');
		$this->form_validation->set_rules('status', 'Status', 'required');

		if (isset($_POST) && ! empty($_POST))
		{
			if ($this->form_validation->run() == TRUE)
			{
				$this->upload->do_upload('brochure');
				$brochure = $this->upload->data();
				$this->upload->do_upload('logo');
				$logo = $this->upload->data();
				$this->upload->do_upload('banner');
				$banner = $this->upload->data();
			
				$this->data = array();
		
		       if(isset($brochure['file_name']) && $brochure['file_size']>0){
				$data['brochure'] = $brochure['file_name'];
				}
				
				if(isset($logo['file_name']) && $logo['file_size']>0){
				$data['logo'] = $logo['file_name'];
				}
				if(isset($banner['file_name']) && $banner['file_size']>0 ){
				$data['banner'] = $banner['file_name'];
				}
				
				$data['user_id'] = $this->input->post('user_id');

				$data['name'] = $this->input->post('name');
				$data['code'] = $this->input->post('code');
				$data['description'] = $this->input->post('description');
				$data['contact_person_name'] = $this->input->post('contact_person_name');
				$data['email_id'] = $this->input->post('email_id');
				$data['website'] = $this->input->post('website');
				$data['phone'] = $this->input->post('phone');
				$data['address'] = $this->input->post('address');
				$data['state'] = $this->input->post('state');
				$data['city'] = $this->input->post('city');
				$data['status'] = $this->input->post('status');
				$data['pincode'] = $this->input->post('pincode');
				
				$data['why_join'] = $this->input->post('why_join');
				$data['placement_services'] = $this->input->post('placement_services');
				$data['top_recruiting_companies'] = $this->input->post('top_recruiting_companies');
				$data['hostel_details'] = $this->input->post('hostel_details');
				$data['teaching_facilities'] = $this->input->post('teaching_facilities');
				$data['top_faculty'] = $this->input->post('top_faculty');
				$data['partner_colleges'] = $this->input->post('partner_colleges');
				$data['rank_holders'] = $this->input->post('rank_holders');
				$data['popular_colleges'] = $this->input->post('popular_colleges');
				$data['featured_colleges'] = $this->input->post('featured_colleges');
				$data['country'] = 101;
			//	print_r($data);die;
                if($this->common_model->update("mc_colleges", $data, "id", $colleges['id']))
			    {
                    $this->session->set_flashdata('message', 'College data Updated!');
					redirect('admin/colleges', 'refresh');
			    }
			    else
			    {
                    $this->session->set_flashdata('message', $this->ion_auth->errors());
				    
					redirect('admin/colleges', 'refresh');
					
			    }
			}
		}

		// display the edit user form
		$this->data['csrf'] = $this->_get_csrf_nonce();
		$this->data['colleges'] = $colleges;

		// set the flash data error message if there is one
		$this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));

			$this->data['user_id']['value'] = $this->form_validation->set_value('user_id',$colleges['user_id']);
			$this->data['name']['value'] = $this->form_validation->set_value('name',$colleges['name']);
			$this->data['code']['value'] = $this->form_validation->set_value('code',$colleges['code']);
			$this->data['description']['value'] = $this->form_validation->set_value('description',$colleges['description']);
			$this->data['contact_person_name']['value'] = $this->form_validation->set_value('contact_person_name',$colleges['contact_person_name']);
			$this->data['email_id']['value'] = $this->form_validation->set_value('email_id',$colleges['email_id']);
			$this->data['website']['value'] = $this->form_validation->set_value('website',$colleges['website']);
			$this->data['phone']['value'] = $this->form_validation->set_value('phone',$colleges['phone']);
			$this->data['address']['value'] = $this->form_validation->set_value('address',$colleges['address']);
			$this->data['state']['value'] = $this->form_validation->set_value('state',$colleges['state']);
			$this->data['city']['key'] = $this->form_validation->set_value('city',$colleges['city']);
			$city = $this->common_model->get_single_row("cities", "id",$colleges['city']);
			
			$this->data['city']['value'] = $city['name'];
			$this->data['pincode']['value'] = $this->form_validation->set_value('pincode',$colleges['pincode']);
			
			$this->data['why_join']['value'] = $this->form_validation->set_value('why_join',$colleges['pincode']);
			$this->data['placement_services']['value'] = $this->form_validation->set_value('placement_services',$colleges['placement_services']);
			$this->data['top_recruiting_companies']['value'] = $this->form_validation->set_value('top_recruiting_companies',$colleges['top_recruiting_companies']);
			$this->data['hostel_details']['value'] = $this->form_validation->set_value('hostel_details',$colleges['hostel_details']);
			$this->data['teaching_facilities']['value'] = $this->form_validation->set_value('teaching_facilities',$colleges['teaching_facilities']);
			$this->data['top_faculty']['value'] = $this->form_validation->set_value('top_faculty',$colleges['top_faculty']);
			$this->data['partner_colleges']['value'] = $this->form_validation->set_value('partner_colleges',$colleges['partner_colleges']);
			$this->data['rank_holders']['value'] = $this->form_validation->set_value('rank_holders',$colleges['rank_holders']);
			$this->data['popular_colleges']['value'] = $this->form_validation->set_value('popular_colleges',$colleges['popular_colleges']);
			$this->data['featured_colleges']['value'] = $this->form_validation->set_value('featured_colleges',$colleges['featured_colleges']);
			
			$this->data['status']['value'] = $this->form_validation->set_value('status',$colleges['status']);
			/* Get all users */
            $this->data['users'] = $this->common_model->get_all_college_user();
			$this->data['states'] = $this->common_model->get_all_rows("states", "country_id",101);
		
        /* Load Template */
		   $this->template->admin_render('admin/colleges/edit', $this->data);
	}
	
		public function editassigncourse($id)
	{
        $id = (int) $id;

		if ( ! $this->ion_auth->logged_in() OR (! $this->ion_auth->is_admin() && ! $this->ion_auth->in_group('college')))
		{
			redirect('auth', 'refresh');
		}

        /* Breadcrumbs */
        $this->breadcrumbs->unshift(2, lang('menu_users_edit'), 'admin/colleges/editassigncourse');
        $this->data['breadcrumb'] = $this->breadcrumbs->show();

        /* Data */
	      $this->data['courses'] = $this->common_model->get_all_rows("mc_courses", 1,1);
		$this->data['streams'] = $this->common_model->get_stream("mc_streams", 1);
		$this->data['exams'] = $this->common_model->get_all_rows("mc_exams", 1,1);
		$this->data['course_statname'] = $this->common_model->get_all_rows("mc_course_status","status","1");
		
        /* Load Template */
		   $this->template->admin_render('admin/colleges/editassigncourse', $this->data);
	}

	
	
	public function editlogo($id)
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
        $this->breadcrumbs->unshift(2, lang('menu_users_edit'), 'admin/colleges/edit');
        $this->data['breadcrumb'] = $this->breadcrumbs->show();

        /* Data */
		$logoslide = $this->common_model->get_single_row("mc_logo_slider", "id", $id);
		
		/* Validate form input */
		/* Validate form input */
		$this->form_validation->set_rules('college_name', 'College Name', 'required');
		$this->form_validation->set_rules('college_url', 'College URL', 'required');
		$this->form_validation->set_rules('college_detail', 'College Detail', 'required');
		$this->form_validation->set_rules('status', 'Status', 'required');

		if (isset($_POST) && ! empty($_POST))
		{
          

			if ($this->form_validation->run() == TRUE)
			{
				
				$data['college_name'] = $this->input->post('college_name');
				$data['college_url'] = $this->input->post('college_url');
				$data['college_detail'] = $this->input->post('college_detail');
				$data['status'] = $this->input->post('status');
				
                if($this->common_model->update("mc_logo_slider", $data, "id", $logoslide['id']))
			    {
                    $this->session->set_flashdata('message', 'Logo data Updated!');
					redirect('admin/colleges/logo', 'refresh');
			    }
			    else
			    {
                    $this->session->set_flashdata('message', $this->ion_auth->errors());

				    
						redirect('admin/colleges/logo', 'refresh');
					
			    }
			}
		}

		// display the edit user form
		$this->data['csrf'] = $this->_get_csrf_nonce();
		$this->data['logoslide'] = $logoslide;

		// set the flash data error message if there is one
		$this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));

		
			$this->data['college_name']['value'] = $this->form_validation->set_value('college_name',$logoslide['college_name']);
			$this->data['college_url']['value'] = $this->form_validation->set_value('college_url',$logoslide['college_url']);
			$this->data['college_detail']['value'] = $this->form_validation->set_value('college_detail',$logoslide['college_detail']);
			//$this->data['logo']['value'] = $this->form_validation->set_value('logo',$logoslide['logo']);
			
			$this->data['status']['value'] = $this->form_validation->set_value('status',$logoslide['status']);
			$this->data['collages'] = $this->common_model->get_all_rows("mc_colleges","status","2");
        /* Load Template */
		$this->template->admin_render('admin/colleges/editlogo', $this->data);
	}

	

	public function view($id)
	{
        /* Breadcrumbs */
        $this->breadcrumbs->unshift(2, lang('menu_users_profile'), 'admin/groups/profile');
        $this->data['breadcrumb'] = $this->breadcrumbs->show();

        /* Data */
        $id = (int) $id;
		$this->data['college_id'] = $id;
        $this->data['college'] = $this->college_model->get_college($id);
		$this->data['images'] = $this->college_model->get_images($id);
		$this->data['videos'] = $this->college_model->get_videos($id);
		
		$this->data['streams'] = $this->common_model->get_all_rows("mc_streams", 1,1);
		$this->data['types'] = $this->common_model->get_all_rows("mc_types", 1,1);
		$this->data['courses'] = $this->common_model->get_all_rows("mc_courses", 1,1);
		
		
		$this->data['stream_id'] = $this->college_model->get_streams($id);
		$this->data['type_id'] = $this->college_model->get_types($id);
		$this->data['course_id'] = $this->college_model->get_courses_detail($id);

        /* Load Template */
		$this->template->admin_render('admin/colleges/college', $this->data);
	}


		public function gallery($id)
	{
        /* Load Template */
		$id = (int) $id;

		if ( ! $this->ion_auth->logged_in() OR ( ! $this->ion_auth->is_admin() ))
		{
			redirect('auth', 'refresh');
		}
		
		$this->data['message']= "Add images Videos";
		$this->data['college_id'] = $id;
		/* Load Template */
		$this->template->admin_render('admin/colleges/gallery', $this->data);
	}
	
		public function course($id)
	{
        /* Load Template */
		$id = (int) $id;

		if ( ! $this->ion_auth->logged_in() OR (! $this->ion_auth->is_admin() && ! $this->ion_auth->in_group('college')))
		{
			redirect('auth', 'refresh');
		}
		
		$this->data['message']= "Assign Streams, Types and Courses";
		
		$this->data['streams'] = $this->common_model->get_all_rows("mc_streams", 1,1);
		$this->data['types'] = $this->common_model->get_all_rows("mc_types", 1,1);
		$this->data['courses'] = $this->common_model->get_all_rows("mc_courses", 1,1);
		
		$this->data['college_id'] = $id;
		$this->data['stream_id'] = $this->college_model->get_streams($id);
		$this->data['type_id'] = $this->college_model->get_types($id);
		$this->data['course_id'] = $this->college_model->get_courses($id);
		$this->data['coursedata'] = $this->college_model->get_course_relation($id);
		$this->data['streamdata'] = $this->college_model->get_stream_relation($id);
		$this->data['specializedata'] = $this->college_model->get_specialize_relation($id);
		$this->data['assign_list'] = $this->college_model->get_course_assign_data($id);
		/* Load Template */
		$this->template->admin_render('admin/colleges/course', $this->data);
	}
	
	/*assign courses to colleges*/
		public function assigncourse($id)
	{
		
        /* Load Template */
		$id = (int) $id;

		if ( ! $this->ion_auth->logged_in() OR (! $this->ion_auth->is_admin() && ! $this->ion_auth->in_group('college')))
		{
			redirect('auth', 'refresh');
		}

		$this->data['message']= "Assign Courses and extra informtion";

		$this->data['courses'] = $this->common_model->get_all_rows("mc_courses", 1,1);
		$this->data['streams'] = $this->common_model->get_stream("mc_streams", 1);
		$this->data['exams'] = $this->common_model->get_all_rows("mc_exams", 1,1);
		$this->data['course_statname'] = $this->common_model->get_all_rows("mc_course_status","status","1");
		$this->data['college_id'] = $id;
		$this->data['course_id'] = $this->college_model->get_courses($id);
		
		/* Load Template */
		$this->template->admin_render('admin/colleges/assigncourse', $this->data);
	}
	
	public function save_assigncourses()
	{
		$stream_id = $this->input->post('clg_streams_id');
		$college_id = $this->input->post('college_id');
		$specialization_id = $this->input->post('clg_specialization');
		$course_status = $this->input->post('course_status');
		$conveyer_quota = $this->input->post('conveyer_quota');
		$management_quota = $this->input->post('management_quota');
		$clg_course_id = $this->input->post('clg_course_id');
		$title = $this->input->post('title');
		$duration = $this->input->post('duration');
		$recognition = $this->input->post('recognition');
		$fee = $this->input->post('fee');
		$incentive = $this->input->post('incentive');
		$exam = $this->input->post('exam');
		$procedure = $this->input->post('procedure');
		$eligibility = $this->input->post('eligibility');
		$assigned_id = $this->input->post('assigned_id');
		
		$course['college_id'] = $college_id;
		$course['stream_id'] = $stream_id;
		$course['course_id'] = $clg_course_id;
		$course['specialization_id'] = $specialization_id;
		$course['course_status'] = $course_status;
		$course['conveyer_quota'] = $conveyer_quota;
		$course['management_quota'] = $management_quota;
		$course['title'] = $title;
		$course['duration'] = $duration;
		$course['recognition'] = $recognition;
		$course['fee'] = $fee;
		$course['incentive'] = $incentive;
		$course['exam'] = $exam;
		$course['procedure'] = $procedure;
		$course['eligibility'] = $eligibility;
		
        $this->common_model->insert($course,"mc_course_assignment");
		
	//echo "Updated Successfully.";
	//exit;
	}
	/*assign courses to colleges*/
	
	public function get_exam_list_by_stream($course_name){
		$exams_name = $this->exam_model->get_exams_by_course($course_name);

		if(count($exams_name) > 0){
		echo "<option value=''>-- Choose Exam --</option>";
			foreach($exams_name as $exam_data){
				//echo "<option value='".$exam_data['slug']."'>".$exam_data['exam_name']."</option>";
				echo "<option value='".$exam_data['id']."'>".$exam_data['exam_name']."</option>";
			}
		}else{
			echo "<option value='0'>-- Choose Exam --</option>";
		}
		die;
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
	
		public function specialization()
	{
		$specialization_id = $this->input->get('specialization_id');
		$specialization = $this->common_model->get_all_specialization("mc_specialization", "course_id",$specialization_id);
		//$specialization = $this->common_model->get_all_leftspecialization("mc_specialization", "course_id",$specialization_id);
		echo '<select  class="form-control" name="clg_specialization" id="clg_specialization" >
		<option value="">Select Specialization</option>';
		foreach($specialization as $special){
			echo '<option value="'.$special['specialization_id'].'">'.$special['specialization_name'].'</option>';
		}
		echo '</select>';
		exit;
	}
	
	public function course_data()
	{
		$stream_id = $this->input->get('stream_id');
		$course_data = $this->common_model->get_all_stream("mc_courses", "stream_id",$stream_id);
		echo '<option value="">Select Course</option>';
		foreach($course_data as $course){
			echo '<option value="'.$course['course_id'].'">'.$course['course_name'].'</option>';
		}
		exit;
	}
	
	
	
	
	public function course_type()
	{
		$stream = $this->input->get('streams');
		$college_id = $this->input->post('college_id');
		$streams = explode(',',$stream);
		
		$course_type = $this->college_model->get_types($college_id);
		
		$types = $this->common_model->get_all_rows_inwhere("mc_types", 'stream_id',$streams);
		foreach($types as $type){
			if(in_array($type['type_id'],$course_type)){
				echo '<option selected value="'.$type['type_id'].'">'.$type['type_name'].'</option>';
			}else{
				echo '<option  value="'.$type['type_id'].'">'.$type['type_name'].'</option>';
			}
			
		}
		exit;
	}
	
	public function courses()
	{
		$type = $this->input->get('types');
		$college_id = $this->input->post('college_id');
		$types = explode(',',$type);
		$courses_sel = $this->college_model->get_courses($college_id);
		$courses = $this->common_model->get_all_rows_inwhere("mc_courses", 'type_id',$types);
		foreach($courses as $course){
			if(in_array($course['course_id'],$courses_sel)){
				echo '<option selected  value="'.$course['course_id'].'">'.$course['course_name'].'</option>';
			}else{
				echo '<option   value="'.$course['course_id'].'">'.$course['course_name'].'</option>';
			}
			
		}
		exit;
	}
	
	public function save_courses()
	{
		$college_id = $this->input->post('college_id');
		
		try{
		$this->common_model->deletecolumn("mc_college_relations","college_id",$college_id);
		}catch(Exception $e){
			
		}
		
		$stream = $this->input->post('streams');
		$streams = explode(',',$stream);
		$dstream = array();
		foreach($streams as $stream){
			$dstream['term_name'] = 'stream';
			$dstream['college_id'] = $college_id;
			$dstream['term_id'] = $stream;
            $this->common_model->insert($dstream,"mc_college_relations");
		}
		
		$type = $this->input->post('types');
		$types = explode(',',$type);
		$dtype = array();
		foreach($types as $type){
			$dtype['term_name'] = 'type';
			$dtype['college_id'] = $college_id;
			$dtype['term_id'] = $type;
            $this->common_model->insert($dtype,"mc_college_relations");
		}
		
		$course = $this->input->post('courses');
		$courses = explode(',',$course);
		$dcourse = array();
		foreach($courses as $course){
			$dcourse['term_name'] = 'course';
			$dcourse['college_id'] = $college_id;
			$dcourse['term_id'] = $course;
            $this->common_model->insert($dcourse,"mc_college_relations");
		}
		
	echo "Updated Successfully.";
	exit;
	}
	
	
	public function saveimage(){
		$college_id = $this->input->post('college_id');
		
		 /* Variables */
		$tables = $this->config->item('tables', 'ion_auth');
		/* Conf */
		$config['upload_path']      = './upload/';
		$config['allowed_types']    = 'gif|jpg|png|mp4|mpeg';
		$config['file_ext_tolower'] = TRUE;
		$this->load->library('upload', $config);
		
		$this->upload->do_upload('file');
		$file = $this->upload->data();

		$image['college_id'] = $college_id;
		$image['asset_name'] = $file['file_name'];
		if(strpos($file['file_type'],'video')=== false){
			$image['asset_type'] = 'image';
		}else{
			$image['asset_type'] = 'video';
		}

        $this->common_model->insert($image,"mc_college_image");
		echo "Updated Successfully.";
		exit;
	}
	
	
	public function import(){
		
		if(isset($_FILES['excel'])){
			echo "rajan"; die;
		}
		/* Load Template */
		$this->template->admin_render('admin/colleges/import', $this->data);
		
	}	
	
	
	public function import_save(){
		
		/* Conf */
		$config['upload_path']      = './upload/';
		//$config['allowed_types']    = 'gif|jpg|png|mp4|mpeg';
		$config['file_ext_tolower'] = TRUE;
		$this->load->library('upload', $config);
		
		$this->upload->do_upload('excel');
		$file = $this->upload->data();

		print_r($file);
		echo "rajan"; die;
		
		
	}	
	
	
}
