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
			$this->data['college_lists'] = $this->common_model->get_all("mc_colleges");
            $this->template->admin_render('admin/colleges/index', $this->data);
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
		$this->form_validation->set_rules('user_id', 'User', 'required');
		$this->form_validation->set_rules('name', 'College name', 'required');
		$this->form_validation->set_rules('code', 'College Code', 'required');
		$this->form_validation->set_rules('description', 'College Description', 'required');
		$this->form_validation->set_rules('contact_person_name', 'Contact Person Name', 'required');
		$this->form_validation->set_rules('email_id', 'Official Email address', 'required|valid_email');
		$this->form_validation->set_rules('phone', 'Mobile', 'required');
		$this->form_validation->set_rules('address', 'Address', 'required');
		$this->form_validation->set_rules('state', 'State', 'required');
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
			$this->data['email_id']['value'] = $this->form_validation->set_value('email_id');
			$this->data['phone']['value'] = $this->form_validation->set_value('phone');
			$this->data['address']['value'] = $this->form_validation->set_value('address');
			$this->data['state']['value'] = $this->form_validation->set_value('state');
			$this->data['city']['key'] = $this->form_validation->set_value('city');
			$city = $this->common_model->get_single_row("cities", "state_id",$this->data['city']['key']);
			$this->data['city']['value'] = $city['name'];
			$this->data['pincode']['value'] = $this->form_validation->set_value('pincode');
			$this->data['status']['value'] = $this->form_validation->set_value('status');
			/* Get all users */
            $this->data['users'] = $this->common_model->get_all_college_user();
			$this->data['states'] = $this->common_model->get_all_rows("states", "country_id",101);
			
            /* Load Template */
            $this->template->admin_render('admin/colleges/create', $this->data);
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
        $this->breadcrumbs->unshift(2, lang('menu_users_edit'), 'admin/users/edit');
        $this->data['breadcrumb'] = $this->breadcrumbs->show();

        /* Data */
		$colleges = $this->common_model->get_single_row("mc_colleges", "id", $id);
		
		/* Validate form input */
		$this->form_validation->set_rules('user_id', 'User', 'required');
		$this->form_validation->set_rules('name', 'College name', 'required');
		$this->form_validation->set_rules('code', 'College Code', 'required');
		$this->form_validation->set_rules('description', 'College Description', 'required');
		$this->form_validation->set_rules('contact_person_name', 'Contact Person Name', 'required');
		$this->form_validation->set_rules('email_id', 'Official Email address', 'required|valid_email');
		$this->form_validation->set_rules('phone', 'Mobile', 'required');
		$this->form_validation->set_rules('address', 'Address', 'required');
		$this->form_validation->set_rules('state', 'State', 'required');
		//$this->form_validation->set_rules('city', 'City', 'required');
		$this->form_validation->set_rules('status', 'Status', 'required');

		if (isset($_POST) && ! empty($_POST))
		{
            /*if ($this->_valid_csrf_nonce() === FALSE OR $id != $this->input->post('id'))
			{	
				show_error('There is something wrong with security.');
			}*/

			if ($this->form_validation->run() == TRUE)
			{
				
				$this->upload->do_upload('logo');
				$logo = $this->upload->data();
				$this->upload->do_upload('banner');
				$banner = $this->upload->data();
			
				$this->data = array();
				if(isset($logo['file_name'])){
				$data['logo'] = $logo['file_name'];
				}
				if(isset($banner['file_name'])){
				$data['banner'] = $banner['file_name'];
				}
				
				$data['user_id'] = $this->input->post('user_id');
				$data['name'] = $this->input->post('name');
				$data['code'] = $this->input->post('code');
				$data['description'] = $this->input->post('description');
				$data['contact_person_name'] = $this->input->post('contact_person_name');
				$data['email_id'] = $this->input->post('email_id');
				$data['phone'] = $this->input->post('phone');
				$data['address'] = $this->input->post('address');
				$data['state'] = $this->input->post('state');
				$data['city'] = $this->input->post('city');
				$data['status'] = $this->input->post('status');
				$data['pincode'] = $this->input->post('pincode');
				$data['country'] = 101;
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
			$this->data['phone']['value'] = $this->form_validation->set_value('phone',$colleges['phone']);
			$this->data['address']['value'] = $this->form_validation->set_value('address',$colleges['address']);
			$this->data['state']['value'] = $this->form_validation->set_value('state',$colleges['state']);
			$this->data['city']['key'] = $this->form_validation->set_value('city',$colleges['city']);
			$city = $this->common_model->get_single_row("cities", "state_id",$this->data['city']['key']);
			
			$this->data['city']['value'] = $city['name'];
			$this->data['pincode']['value'] = $this->form_validation->set_value('pincode',$colleges['pincode']);
			$this->data['status']['value'] = $this->form_validation->set_value('status',$colleges['status']);
			/* Get all users */
            $this->data['users'] = $this->common_model->get_all_college_user();
			$this->data['states'] = $this->common_model->get_all_rows("states", "country_id",101);


        /* Load Template */
		$this->template->admin_render('admin/colleges/edit', $this->data);
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
