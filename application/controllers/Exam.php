<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Exam extends Public_Controller {

    public function __construct()
    {
        parent::__construct();
		
		$this->load->database();
        $this->load->config('common/dp_config');
        $this->load->config('common/dp_language');
        $this->load->library(array('form_validation', 'ion_auth', 'template', 'common/mobile_detect'));
        $this->load->helper(array('array', 'language', 'url'));
        $this->load->model('common/prefs_model');
		$this->load->model('admin/exam_model');
		$this->load->model('common/common_model');
		/* college model */
    }


	public function index($exam_name)
	{
		if ($this->ion_auth->logged_in()){
		$this->data['user_login']  = $this->prefs_model->user_info_login($this->ion_auth->user()->row()->id);
		}else{
			$this->data['user_login'] = array('id'=>false);
		}
		$this->data['exam_data'] = $this->exam_model->get_single_row("mc_exams", "slug",$exam_name );
		$this->load->view('public/layout/header', $this->data);
		$this->load->view('public/exam', $this->data);
		$this->load->view('public/layout/footer', $this->data);
	}
	
	 function login()
	{
        if ( ! $this->ion_auth->logged_in())
        {
            /* Load */
            $this->load->config('admin/dp_config');
            $this->load->config('common/dp_config');

            /* Valid form */
            $this->form_validation->set_rules('identity', 'Identity', 'required');
            $this->form_validation->set_rules('password', 'Password', 'required');

            /* Data */
            $this->data['title']               = $this->config->item('title');
            $this->data['title_lg']            = $this->config->item('title_lg');
            $this->data['auth_social_network'] = $this->config->item('auth_social_network');
            $this->data['forgot_password']     = $this->config->item('forgot_password');
            $this->data['new_membership']      = $this->config->item('new_membership');

            if ($this->form_validation->run() == TRUE)
            {
                $remember = (bool) $this->input->post('remember');
                if ($this->ion_auth->login($this->input->post('identity'), $this->input->post('password'), $remember))
                {
                    if ( ! $this->ion_auth->is_admin())
                    {
                        $response = array('status'=>true,'message'=>'<div class="alert alert-success"><strong>Congratulation!</strong>Logged In Successfully.</div>');
						echo json_encode($response);die;
                    }
                    else
                    {
                        /* Data */
                        $response = array('status'=>false,'message'=>'<div class="alert alert-danger">Please visit admin section.</div>');
						echo json_encode($response);
						die;
                    }
                }
                else
                {
				    $response = array('status'=>false,'message'=>'<div class="alert alert-danger">'.$this->ion_auth->errors().'</div>');
					echo json_encode($response);
					die;
                }
            }
            else
            {
				$response = array('status'=>false,'message'=>'<div class="alert alert-danger">'.(validation_errors()) ? validation_errors() : $this->session->flashdata('message').'</div>');
				echo json_encode($response);
				die;
            }
        }
        else
        {
            $response = array('status'=>true,'message'=>'<div class="alert alert-info"><strong>Info!</strong> You are already logged in.</div>');
			echo json_encode($response);die;
        }
   }
	
	
	function logout($src = NULL)
	{
        $logout = $this->ion_auth->logout();

        $this->session->set_flashdata('message', $this->ion_auth->messages());

        if ($src == 'admin')
        {
            redirect('auth/login', 'refresh');
        }
        else
        {
            redirect('/', 'refresh');
        }
	}
	
	public function register()
	{
		/* Variables */
		$tables = $this->config->item('tables', 'ion_auth');

		/* Validate form input */
		//$this->form_validation->set_rules('first_name', 'First Name', 'required');
		//$this->form_validation->set_rules('last_name', 'Last Name', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique['.$tables['users'].'.email]');
		$this->form_validation->set_rules('phone', 'Phone', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|max_length[' . $this->config->item('max_password_length', 'ion_auth') . ']');
		
		if ($this->form_validation->run() == TRUE)
		{
			//$username = strtolower($this->input->post('first_name')) . ' ' . strtolower($this->input->post('last_name'));
			$email    = strtolower($this->input->post('email'));
			$username = $email;
			$password = $this->input->post('password');
			$additional_data = array(
				'phone'      => $this->input->post('phone'),
			);
		}

		if ($this->form_validation->run() == TRUE && $this->ion_auth->register($username, $password, $email, $additional_data))
		{
			$response = array('status'=>true,'message'=>'<div class="alert alert-success"><strong>Congratulation!</strong> You have successfully started your journey. </div>');
			echo json_encode($response);die;
		}
		else
		{
			$response = array('status'=>false,'message'=>'<div class="alert alert-danger">'.(validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message'))).'</div>');
			echo json_encode($response);
			die;

        }
		
		
	}
	
	function verify_otp()
	{
		$this->form_validation->set_rules('otp', 'OTP', 'required');
		if ($this->form_validation->run() == TRUE)
		{
			$otp = $this->input->post('otp');
		}
		
		if ($this->form_validation->run() == TRUE && $otp =='1234' /*wrie update code here*/)
		{
			$response = array('status'=>true,'message'=>'<div class="alert alert-success"><strong>Congratulation!</strong> Your Phone is verified now.</div>');
			echo json_encode($response);die;
		}
		else
		{
			$response = array('status'=>false,'message'=>'<div class="alert alert-danger">Please enter correct OTP.</div>');
			echo json_encode($response);
			die;

        }
        
	}
	
	function courses()
	{
		$stream = $this->input->get('stream');
		$courses = $this->college_model->get_courseswithstream($stream);
		echo '<option>Desired Courses</option>';
		foreach($courses as $course){
			
				echo '<option   value="'.$course->course_id.'">'.$course->course_name.'</option>';
			
		}
		exit;
		
	}

	
	function search()
	{
		
		if ($this->ion_auth->logged_in()){
		$this->data['user_login']  = $this->prefs_model->user_info_login($this->ion_auth->user()->row()->id);
		}else{
			$this->data['user_login'] = array('id'=>false);
		}
		$query = array();

		//$this->college['colleges'] = $this->college_model->search_result_course($query);
		
		$this->college['college'] = $this->college_model->search_result_college($query);
		
		
		$this->load->view('public/layout/header', $this->data);
		$this->load->view('public/college', $this->college);
		$this->load->view('public/layout/footer', $this->data);
		
	}	
	
}
