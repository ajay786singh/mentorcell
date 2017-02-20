<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends Public_Controller {

    public function __construct()
    {
        parent::__construct();
		
		$this->load->database();
        $this->load->config('common/dp_config');
        $this->load->config('common/dp_language');
        $this->load->library(array('form_validation', 'ion_auth', 'template', 'common/mobile_detect'));
        $this->load->helper(array('array', 'language', 'url'));
        $this->load->model('common/prefs_model');
		$this->load->model('common/college_model');
		$this->load->model('common/common_model');
		/* college model */
    }


	public function index()
	{
		if ($this->ion_auth->logged_in()){
		$this->data['user_login']  = $this->prefs_model->user_info_login($this->ion_auth->user()->row()->id);
		}else{
			$this->data['user_login'] = array('id'=>false);
		}
			
		$cstates = $this->college_model->get_states();
		$options = '';
		foreach($cstates as $stateeach){
				//echo '<option  value="'.$stateeach->id.'">'.$stateeach->name.'</option>';
				$options.= '<optgroup label="'.$stateeach->name.'">';
					$cities = $this->college_model->get_cities($stateeach->id);
					foreach($cities as $city){
						$options.= '<option value="'.$city->id.'">'.$city->name.'</option>';
					}
					$options.=  '</optgroup>';
		} 
		
		
		$this->data['location'] = $options;
		$this->load->view('public/layout/header', $this->data);
		
		$this->data['colleges'] = $this->common_model->get_all("mc_colleges");
		$this->data['streams'] = $this->common_model->get_all_rows("mc_streams", 1,1);
		$this->data['types'] = $this->common_model->get_all_rows("mc_types", 1,1);
		//$this->data['courses'] = $this->common_model->get_all_rows("mc_courses", 1,1);
		$this->data['courses'] = $this->common_model->get_all("mc_courses");
		$this->load->view('public/home', $this->data);
		
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
		$this->load->library('plivo');
		$this->load->library('sendgridemail');
		/* Validate form input */
		$this->form_validation->set_rules('first_name', 'First Name', 'required');
		$this->form_validation->set_rules('last_name', 'Last Name', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique['.$tables['users'].'.email]');
		$this->form_validation->set_rules('phone', 'Phone', 'required');

		//$this->form_validation->set_rules('password', 'Password', 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|max_length[' . $this->config->item('max_password_length', 'ion_auth') . ']');
		
		$phone = trim($this->input->post('phone'));
		$activation_code = rand ( 1000 , 9999 );
		$password  = $this->random_password(8);
		$email = strtolower($this->input->post('email'));
		
		$interest = $this->input->post('interest');
		$course = $this->input->post('course');
		$state = $this->input->post('state');
		$city = $this->input->post('city');
		
		
		if ($this->form_validation->run() == TRUE)
		{
			//$username = strtolower($this->input->post('first_name')) . ' ' . strtolower($this->input->post('last_name'));
			$email    = $email;
			$username = $email;
			$password = $password;
			$additional_data = array(
				'first_name' => $this->input->post('first_name'),
				'last_name'  => $this->input->post('last_name'),
				'phone'      => $phone,
				'active'      => '0',
				'activation_code' => $activation_code
			);
		}
		
		if ($this->form_validation->run() == TRUE )
		{
			$user_id = $this->ion_auth->register($username, $password, $email, $additional_data);
			$this->ion_auth->set_user_meta($user_id, 'interest', $interest);
			$this->ion_auth->set_user_meta($user_id, 'course', $course);
			$this->ion_auth->set_user_meta($user_id, 'state', $state);
			$this->ion_auth->set_user_meta($user_id, 'city', $city);			
			
			$response = array('status'=>true,'user_id'=>$user_id,'message'=>'<div class="alert alert-success"><strong>Congratulation!</strong> You have successfully started your journey. </div>');
			
			$sms_data = array(
            'src' => '+123456789', //The phone number to use as the caller id (with the country code). E.g. For USA 15671234567
            'dst' => '+91'.$phone, // The number to which the message needs to be send (regular phone numbers must be prefixed with country code but without the ‘+’ sign) E.g., For USA 15677654321.
            'text' => 'Your MentorCell OTP is '.$activation_code.' Please verify your account.', // The text to send
            'type' => 'sms', //The type of message. Should be 'sms' for a text message. Defaults to 'sms'
            'url' => base_url() . 'index.php/plivo_test/receive_sms', // The URL which will be called with the status of the message.
            'method' => 'POST', // The method used to call the URL. Defaults to. POST
			);

			/*
			 * look up available number groups
			 */
			$response_array = $this->plivo->send_sms($sms_data);
			
			$email_data = array(
								'subject'=>'Your Password for MentorCell',
								'to' =>$email,
								'message' => "Please use these credentials to login to MentorCell.\n Username: ".$email."\n Password:  ".$password."\n URL: ".site_url()."\n Team\n MentorCell"
							);
			$response_array = $this->sendgridemail->send_email($email_data);
			/*auto login*/
			$this->ion_auth->login($email, $password, false);
			
			echo json_encode($response);die;
			
		}
		else
		{
			$response = array('status'=>false,'message'=>'<div class="alert alert-danger">'.(validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message'))).'</div>');
			echo json_encode($response);
			die;

        }
		
		
	}
	
	function random_password( $length = 8 ) {
    $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()_-=+;:,.?";
    $password = substr( str_shuffle( $chars ), 0, $length );
    return $password;
	}

	function verify_otp()
	{
		$this->form_validation->set_rules('otp', 'OTP', 'required');
		$user_id = $this->input->post('user_id');
		$otpdb =  $this->common_model->get_single_var('activation_code', 'users','id', $user_id);
		if ($this->form_validation->run() == TRUE)
		{
			$otp = $this->input->post('otp');
		}
		
		if ($this->form_validation->run() == TRUE && $otp ==$otpdb /*wrie update code here*/)
		{
			$response = array('status'=>true,'message'=>'<div class="alert alert-success"><strong>Congratulation!</strong> Your Phone is verified now. Please check email for password.</div>');
			echo json_encode($response);die;
		}
		else
		{
			$response = array('status'=>false,'message'=>'<div class="alert alert-danger">Please enter correct OTP.</div>');
			echo json_encode($response);
			die;

        }
        
	}
	
	
	
	function forgotpassword()
	{
       
            $this->load->config('admin/dp_config');
            $this->load->config('common/dp_config');
			$this->load->library('sendgridemail');
            /* Valid form */
            $this->form_validation->set_rules('identity', 'Email', 'required');
            
            if ($this->form_validation->run() == TRUE)
            {
				$email = strtolower($this->input->post('identity'));
				$forgotten = $this->ion_auth->forgotten_password($email);

				if($forgotten['identity']==$email){
					
					$reseturl = site_url()."?setpassword=true&code=".$forgotten['forgotten_password_code'];
					$email_data = array(
								'subject'=>'Reset your Password for MentorCell',
								'to' =>$email,
								'message' => "Please follow link to set password for  MentorCell.\n URL: ".$reseturl."\n  Team\n MentorCell"
							);
						$response_array = $this->sendgridemail->send_email($email_data);
					
					$response = array('status'=>true,'message'=>'<div class="alert alert-success"><strong>Congratulation!</strong> Please check email for instruction.</div>');
					echo json_encode($response);die;
				}
               
            }
            else
            {
				$response = array('status'=>false,'message'=>'<div class="alert alert-danger">'.(validation_errors()) ? validation_errors() : $this->session->flashdata('message').'</div>');
				echo json_encode($response);
				die;
            }
       
    }
	
		function setpassword()
	{
       
            $this->load->config('admin/dp_config');
            $this->load->config('common/dp_config');
			$this->load->library('sendgridemail');
            /* Valid form */
            //$this->form_validation->set_rules('identity', 'Email', 'required');

			$this->form_validation->set_rules('password', 'Password', 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|max_length[' . $this->config->item('max_password_length', 'ion_auth') . ']');

			$this->form_validation->set_rules('code', 'Code', 'required');
			
            if ($this->form_validation->run() == TRUE)
            {
				$code = $this->input->post('code');
				$user = @$this->ion_auth->forgotten_password_complete($code);

				if($user){
					
					$change = $this->ion_auth->reset_password($user['identity'], $this->input->post('password'));
					
					$email_data = array(
								'subject'=>'Password updated for MentorCell',
								'to' =>$user['identity'],
								'message' => "Your password updated successfully for MentorCell.\n Team\n MentorCell"
							);
						$response_array = $this->sendgridemail->send_email($email_data);
					
					$response = array('status'=>true,'message'=>'<div class="alert alert-success"><strong>Congratulation!</strong> Password updated successfully.</div>');
					echo json_encode($response);
					
					die;
				}else{
					
					$response = array('status'=>false,'message'=>'<div class="alert alert-danger">Token is expired!</div>');
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
		

		$this->load->view('public/layout/header', $this->data);
		
		$query = array();
		if(isset($_GET['course'])){
			$query['course'] = $_GET['course'];
			$this->college['colleges'] = $this->college_model->search_result_course($query);
			$this->load->view('public/search', $this->college);
		}else if(isset($_GET['college'])){
			$query['college'] = $_GET['college'];
			$this->college['college'] = $this->college_model->search_result_college($query);
			$id = $this->college['college']->id;
			$this->college['images'] = $this->college_model->get_images($id);
			$this->college['videos'] = $this->college_model->get_videos($id);
			$this->load->view('public/college', $this->college);
			
		}
		$this->load->view('public/layout/footer', $this->data);
		
	}

	public function city()
	{
		$state_id = $this->input->get('state_id');
		$cities = $this->common_model->get_all_rows("cities", "state_id",$state_id);
		$option = '';
		foreach($cities as $city){
			$option .= '<option value="'.$city['id'].'">'.$city['name'].'</option>';
		}
		$option .= '';
		echo $option; die;
	}
	
	public function clgcity()
	{
		$college_id = $this->input->get('college_id');
		$college = $this->college_model->get_clgstate($college_id);
		echo json_encode($college); die;
	}
	
}
