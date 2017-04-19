<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Streams extends Admin_Controller {

    public function __construct()
    {
        parent::__construct();

        /* Load :: Common */
        $this->lang->load('admin/users');

        /* Title Page :: Common */
        $this->page_title->push(lang('menu_users'));
        $this->data['pagetitle'] = '<h1>Stream</h1>';

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
			$this->data['streams_list'] = $this->common_model->get_all("mc_streams");
            $this->template->admin_render('admin/streams/index', $this->data);
        }
	}

	public function counseling_video()
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
			$this->data['counceling_video'] = $this->common_model->get_all("mc_counceling_video");
            $this->template->admin_render('admin/streams/counseling_video', $this->data);
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
		$this->form_validation->set_rules('stream_name', 'Stream Name', 'required');
		$this->form_validation->set_rules('stream_code', 'Stream Code', 'required');
		//$this->form_validation->set_rules('stream_description', 'Stream Description', 'required');
		//$this->form_validation->set_rules('stream_logo', 'Stream Logo', 'required');
		$this->form_validation->set_rules('status', 'Status', 'required');
		
		
		if ($this->form_validation->run() == TRUE)
		{	
	
			$this->upload->do_upload('stream_logo');
			$logo = $this->upload->data();
		    
			$this->data = array();
			$this->data = $this->input->post();
			$this->data['stream_logo'] = $logo['file_name'];
			
		}

		if ($this->form_validation->run() == TRUE && $this->common_model->insert($this->data," mc_streams"))
		{
            $this->session->set_flashdata('message', 'Streams added successfully!');
			redirect('admin/streams', 'refresh');
		}
		else
		{
            $this->data['message'] =  (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));

			$this->data['stream_name']['value'] = $this->form_validation->set_value('stream_name');
			$this->data['stream_code']['value'] = $this->form_validation->set_value('stream_code');
			$this->data['stream_description']['value'] = $this->form_validation->set_value('stream_description');
			$this->data['status']['value'] = $this->form_validation->set_value('status');
		
            /* Load Template */
            $this->template->admin_render('admin/streams/create', $this->data);
        }

    }
	
	
	public function create_counseling_video()
	{
		/* Breadcrumbs */
        $this->breadcrumbs->unshift(2, lang('menu_users_create'), 'admin/streams/create_counseling_video');
        $this->data['breadcrumb'] = $this->breadcrumbs->show();

        /* Variables */
		$tables = $this->config->item('tables', 'ion_auth');
		/* Conf */
		$config['upload_path']      = './upload/';
		$config['allowed_types']    = 'gif|jpg|png|avi|flv|wmv|mp3|mp4';
		$config['file_ext_tolower'] = TRUE;
		$this->load->library('upload', $config);

		/* Validate form input */
		$this->form_validation->set_rules('title', 'Title', 'required');
		$this->form_validation->set_rules('status', 'Status', 'required');
		
		
		if ($this->form_validation->run() == TRUE)
		{	
	
			$this->upload->do_upload('video');
			$logo = $this->upload->data();
		    
			$this->data = array();
			$this->data = $this->input->post();
			$this->data['video'] = $logo['file_name'];
			
		}

		if ($this->form_validation->run() == TRUE && $this->common_model->insert($this->data," mc_counceling_video"))
		{
            $this->session->set_flashdata('message', 'Counseling Video added successfully!');
			redirect('admin/streams/counseling_video', 'refresh');
		}
		else
		{
            $this->data['message'] =  (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));

			$this->data['stream_name']['title'] = $this->form_validation->set_value('title');
		$this->data['status']['value'] = $this->form_validation->set_value('status');
		
            /* Load Template */
            $this->template->admin_render('admin/streams/create_counseling_video', $this->data);
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
		
				if($this->common_model->delete_where("mc_streams",'stream_id',$id))
			    {
                    $this->session->set_flashdata('message', 'Stream Deleted!');
					redirect('admin/streams', 'refresh');
			    }
			    else
			    {
					$this->session->set_flashdata('message', 'No Stream found.');
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
        $this->breadcrumbs->unshift(2, lang('menu_users_edit'), 'admin/streams/edit');
        $this->data['breadcrumb'] = $this->breadcrumbs->show();

        /* Data */
		$streams = $this->common_model->get_single_row("mc_streams", "	stream_id", $id);
		
		/* Validate form input */
		/* Validate form input */
		$this->form_validation->set_rules('stream_name', 'Stream Name', 'required');
		$this->form_validation->set_rules('stream_code', 'Stream Code', 'required');
		//$this->form_validation->set_rules('stream_description', 'Stream Description', 'required');
		//$this->form_validation->set_rules('stream_logo', 'Stream Logo', 'required');
		$this->form_validation->set_rules('status', 'Status', 'required');

		if (isset($_POST) && ! empty($_POST))
		{
            /*if ($this->_valid_csrf_nonce() === FALSE OR $id != $this->input->post('id'))
			{	
				show_error('There is something wrong with security.');
			}*/

			if ($this->form_validation->run() == TRUE)
			{
				
				$this->upload->do_upload('stream_logo');
				$logo = $this->upload->data();
				$data['stream_logo'] = $logo['file_name'];
				
				$data['stream_name'] = $this->input->post('stream_name');
				$data['stream_code'] = $this->input->post('stream_code');
				$data['stream_description'] = $this->input->post('stream_description');
				$data['status'] = $this->input->post('status');
				
                if($this->common_model->update("mc_streams", $data, "stream_id", $streams['stream_id']))
			    {
                    $this->session->set_flashdata('message', 'Stream data Updated!');
					redirect('admin/streams', 'refresh');
			    }
			    else
			    {
                    $this->session->set_flashdata('message', $this->ion_auth->errors());

				    
						redirect('admin/streams', 'refresh');
					
			    }
			}
		}

		// display the edit user form
		$this->data['csrf'] = $this->_get_csrf_nonce();
		$this->data['streams'] = $streams;

		// set the flash data error message if there is one
		$this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));

			$this->data['stream_name']['value'] = $this->form_validation->set_value('stream_name',$streams['stream_name']);
			$this->data['stream_code']['value'] = $this->form_validation->set_value('stream_code',$streams['stream_code']);
			$this->data['stream_description']['value'] = $this->form_validation->set_value('stream_description',$streams['stream_description']);
			$this->data['stream_logo']['value'] = $this->form_validation->set_value('stream_logo',$streams['stream_logo']);
			
			$this->data['status']['value'] = $this->form_validation->set_value('status',$streams['status']);
			
        /* Load Template */
		$this->template->admin_render('admin/streams/edit', $this->data);
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
