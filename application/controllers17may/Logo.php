<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logo extends Admin_Controller {

    public function __construct()
    {
        parent::__construct();

        /* Load :: Common */
        $this->lang->load('admin/users');

        /* Title Page :: Common */
        $this->page_title->push(lang('menu_users'));
        $this->data['pagetitle'] = '<h1>Logo</h1>';

        /* Breadcrumbs :: Common */
        $this->breadcrumbs->unshift(1, lang('menu_users'), 'admin/logo');
		
		/* college model */
		$this->load->model('common/common_model');
		/* college model */
		$this->load->model('common/college_model');
		/* college model */
	

    }


	public function index()
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
			$userId = $this->ion_auth->get_user_id();
			if($this->ion_auth->in_group('logo')){
				$user   = $this->ion_auth->user($userId)->row();
				//$this->data['college_lists'] = $this->common_model->get_all_rows("mc_colleges", 'user_id',$userId);
				$this->data['college_lists'] = $this->college_model->get_assigned_college($user->colleges);
			}else{
				$this->data['college_lists'] = $this->common_model->get_all_rows("mc_colleges","status","2");
			}
			
			
            $this->template->admin_render('admin/logo/index', $this->data);
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
		$config['allowed_types']    = 'gif|jpg|png';
		$config['file_ext_tolower'] = TRUE;
		$this->load->library('upload', $config);

		/* Validate form input */
		//$this->form_validation->set_rules('user_id', 'User', 'required');
		$this->form_validation->set_rules('name', 'College name', 'required');
		//$this->form_validation->set_rules('code', 'College Code', 'required');
		//$this->form_validation->set_rules('description', 'College Description', 'required');
		//$this->form_validation->set_rules('contact_person_name', 'Contact Person Name', 'required');
		//$this->form_validation->set_rules('email_id', 'Official Email address', 'required|valid_email');
		//$this->form_validation->set_rules('phone', 'Mobile', 'required');
		$this->form_validation->set_rules('address', 'Address', 'required');
		//$this->form_validation->set_rules('state', 'State', 'required');
		//$this->form_validation->set_rules('city', 'City', 'required');
		$this->form_validation->set_rules('status', 'Status', 'required');
		
		
		if ($this->form_validation->run() == TRUE)
		{	
	
			$this->upload->do_upload('logo');
			$logo = $this->upload->data();
		    $this->upload->do_upload('banner');
			$banner = $this->upload->data();
		
			$this->data = array();
			$this->data = $this->input->post();
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
			
			
			
			$this->data['status']['value'] = $this->form_validation->set_value('status');
			/* Get all users */
            $this->data['users'] = $this->common_model->get_all_college_user();
			$this->data['states'] = $this->common_model->get_all_rows("states", "country_id",101);
			
            /* Load Template */
            $this->template->admin_render('admin/colleges/create', $this->data);
        }

    }
	



	
}
