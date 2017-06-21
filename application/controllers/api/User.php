<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
// use namespace
use Restserver\Libraries\REST_Controller;


class User extends REST_Controller {

    public function __construct()
    {
        parent::__construct();
		
		$this->load->database();
        $this->load->config('common/dp_config');
        $this->load->config('common/dp_language');
        $this->load->library(array('form_validation', 'ion_auth', 'template', 'common/mobile_detect'));
        $this->load->helper(array('array', 'language', 'url','jwt'));
        $this->load->model('common/prefs_model');
		$this->load->model('common/college_model');
		$this->load->model('common/common_model');
		$this->load->model('common/coupon_model');
		/* college model */
    }


	 function login_post()
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
                        $response = array('status'=>true,'message'=>'Congratulation! Logged In Successfully.');
						
						$user = $this->ion_auth->user()->row()->id;
						$token = array();
						$token = $user;
						$response['key'] = JWT::encode($token, $this->config->item('jwt_key'));
						$response['userdata'] = $this->prefs_model->user_info_login($this->ion_auth->user()->row()->id);
						echo json_encode($response);die;
                    }
                    else
                    {
                        /* Data */
						$user = $this->ion_auth->user()->row()->id;
						$token = array();
						$token = $user;
                        $response = array('status'=>false,'message'=>'Please visit admin section.');
						$response['key'] = JWT::encode($token, $this->config->item('jwt_key'));
						$response['userdata'] = $this->prefs_model->user_info_login($this->ion_auth->user()->row()->id);
						echo json_encode($response);
						die;
                    }
                }
                else
                {
				    $response = array('status'=>false,'message'=>$this->ion_auth->errors());
					echo json_encode($response);
					die;
                }
            }
            else
            {
				$response = array('status'=>false,'message'=>(validation_errors()) ? validation_errors() : $this->session->flashdata('message'));
				echo json_encode($response);
				die;
            }
        }
        else
        {
            $response = array('status'=>true,'message'=>' Info! You are already logged in.');
			echo json_encode($response);die;
        }
   }
	
	
	function logout_get($key)
	{
        $userid = JWT::decode($key, $this->config->item('jwt_key'));
		$logout = $this->ion_auth->logout($userid);

        $this->session->set_flashdata('message', $this->ion_auth->messages());

        $response = array('status'=>true,'message'=>' Info! You are logged out successfully.');
		echo json_encode($response);
		die;
	}
	
	public function register_post()
	{
		/* Variables */
		$tables = $this->config->item('tables', 'ion_auth');
		$this->load->library('plivo');
		$this->load->library('sendgridemail');
		/* Validate form input */
		$this->form_validation->set_rules('first_name', 'First Name', 'required');
		$this->form_validation->set_rules('last_name', 'Last Name', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique['.$tables['users'].'.email]');
		//$this->form_validation->set_rules('phone', 'Phone', 'required');

		$this->form_validation->set_rules('phone', 'Phone', 'required|regex_match[/^[0-9]{10}$/]|is_unique['.$tables['users'].'.phone]',
        array('is_unique' => 'Mobile number is already registered'));
		//$this->form_validation->set_rules('phone', 'Phone', 'required');
		$this->form_validation->set_message('is_unique', 'The %s id is already registered with us');
		
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
			$this->ion_auth->set_user_meta($user_id, 'register_caller', $register_caller);
			
			$response = array('status'=>true,'user_id'=>$user_id,'message'=>'Congratulation! You have successfully started your journey.');
			
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
			$response = array('status'=>false,'message'=>(validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message'))));
			echo json_encode($response);
			die;

        }
		
		
	}
	
	function random_password( $length = 8 ) {
    $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()_-=+;:,.?";
    $password = substr( str_shuffle( $chars ), 0, $length );
    return $password;
	}

	function verify_otp_post()
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
			$response = array('status'=>true,'message'=>'Congratulation! Your Phone is verified now. Please check email for password.');
			echo json_encode($response);die;
		}
		else
		{
			$response = array('status'=>false,'message'=>'Please enter correct OTP.');
			echo json_encode($response);
			die;

        }
        
	}
	
	
	
	function forgotpassword_post()
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
					if($response_array == 202){
						$response = array('status'=>true,'message'=>'Congratulation! Please check email for instruction.');
					}else{
						$response = array('status'=>true,'message'=>'Registered! We are unable to deliver email.');
					}
					echo json_encode($response);die;
				}else{
					
					$response = array('status'=>false,'message'=>'You are not registered with Mentorcell.');
					echo json_encode($response);die;
					
				}
               
            }
            else
            {
				$response = array('status'=>false,'message'=>(validation_errors()) ? validation_errors() : $this->session->flashdata('message'));
				echo json_encode($response);
				die;
            }
       
    }
	
		function setpassword_post()
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
					
					$response = array('status'=>true,'message'=>'Congratulation! Password updated successfully.');
					echo json_encode($response);
					
					die;
				}else{
					
					$response = array('status'=>false,'message'=>'Token is expired!');
					echo json_encode($response);
					die;
					
				}
            }
            else
            {
				$response = array('status'=>false,'message'=>(validation_errors()) ? validation_errors() : $this->session->flashdata('message'));
				echo json_encode($response);
				die;
            }
       
    }
	
	
	
	
	
	function courses_get($stream)
	{
		$courses = $this->college_model->get_courseswithstream($stream);
		$response = array('status'=>true,'course'=>$courses);
		echo json_encode($response);
		die;
		
	}

	
	public function city_get($state_id)
	{
		$cities = $this->common_model->get_all_rows("districts", "state_id",$state_id);
		$response = array('status'=>true,'district'=>$cities);
		echo json_encode($response);
		die;
	}
	
	public function profile_get($key)
	{
		$userid = JWT::decode($key, $this->config->item('jwt_key'));
		
		if ($this->ion_auth->logged_in($userid)){
			if($userid){
				$user  = $this->prefs_model->user_info_login($userid);
			}else{
				$user  = $this->prefs_model->user_info_login($this->ion_auth->user()->row()->id);
			}
		
		$this->data['user_login'] = $user;
		}else{
			$response = array('status'=>false,'message'=>'No user');
			echo json_encode($response);
			die;
		}
		
		$city = $this->ion_auth->get_user_meta($user['id'], 'city');
		$this->data['city_id'] = $city;
		$this->data['city'] = $this->common_model->get_single_var('name', 'cities','id', $city);
		$state = $this->ion_auth->get_user_meta($user['id'], 'state');
		$this->data['state_id'] = $state;
		$this->data['state'] = $this->common_model->get_single_var('name', 'states','id', $state);
		
		$this->data['dob'] = $this->ion_auth->get_user_meta($user['id'], 'dob');
		$this->data['about_me'] = $this->ion_auth->get_user_meta($user['id'], 'about_me');
		$this->data['bio'] = $this->ion_auth->get_user_meta($user['id'], 'bio');		
		$this->data['coupon'] = $this->common_model->get_single_row('mc_coupons','user_id',$user['id']);

		$response = array('status'=>false,'message'=>'User data','data'=>$this->data);
		echo json_encode($response);
		die;
	}
	
	public function colleges_get($page=1)
	{	$page = 1;
	   $offset = ($page-1)*5;
	   $college_lists = $this->common_model->get_all_colleges("mc_colleges",'status','2','name');
		//$college_lists = $this->common_model->get_all("mc_colleges", $offset);
		$response = array('status'=>false,'message'=>'college data','data'=>$college_lists);
		//$response = $offset;
		echo json_encode($response);
		die;
	
	}

		public function collegeById_get($college_id)
	{	
	   $college_lists = $this->common_model->get_single_row("mc_colleges",'id',$college_id);
		//$college_lists = $this->common_model->get_all("mc_colleges", $offset);
		$response = array('data'=>$college_lists);
		//$response = $offset;
		echo json_encode($response);
		die;
	
	}
	
	function curpassword_validation_post() {
			$key = $this->input->post('key');
			$userid = JWT::decode($key, $this->config->item('jwt_key'));
		
			if ($this->ion_auth->logged_in($userid)){
				if($userid){
				$user  = $this->prefs_model->user_info_login($userid);
				}else{
				$user  = $this->prefs_model->user_info_login($this->ion_auth->user()->row()->id);
				}
				
			}else{
				$this->data['user_login'] = array('id'=>false);
			}
			$id = $userdata['id'];
			$originalPassword = $this->input->post('curpassword');
			if ($this->ion_auth->hash_password_db($id, $originalPassword) !== TRUE)
			{
				$this->form_validation->set_message("curpassword_validation", 'Please Enter Valid Current Password');
				return FALSE;
			}
			
			return TRUE;
	}
	
	public function changepassword_post(){
		
			$this->load->config('admin/dp_config');
            $this->load->config('common/dp_config');
			$this->load->library('sendgridemail');
            /* Valid form */
            //$this->form_validation->set_rules('identity', 'Email', 'required');
			$key = $this->input->post('key');
			$userid = JWT::decode($key, $this->config->item('jwt_key'));
			
			if ($this->ion_auth->logged_in($userid)){
				if($userid){
				$user  = $this->prefs_model->user_info_login($userid);
				}else{
				$user  = $this->prefs_model->user_info_login($this->ion_auth->user()->row()->id);
				}
				
			}else{
				$this->data['user_login'] = array('id'=>false);
			}
						
			$this->form_validation->set_rules('password', 'Password', 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|max_length[' . $this->config->item('max_password_length', 'ion_auth') . ']|matches[cpassword]');
			$this->form_validation->set_rules('cpassword','Confirm Password' , 'required');
				
			$this->form_validation->set_rules('curpassword', 'Current Password', 'required|callback_curpassword_validation');
			

            if ($this->form_validation->run() == TRUE)
            {
				$curpassword = $this->input->post('curpassword');
				$password = $this->input->post('password');
				$cpassword = $this->input->post('cpassword');

				if($userdata['id']){
					
					$change = $this->ion_auth->reset_password($userdata['email'],$password);
					
					$email_data = array(
								'subject'=>'Password updated for MentorCell',
								'to' =>$userdata['email'],
								'message' => "Your password updated successfully for MentorCell.\n Team\n MentorCell"
							);
						$response_array = $this->sendgridemail->send_email($email_data);
					
					$response = array('status'=>true,'message'=>'Congratulation! Password updated successfully.');
					echo json_encode($response);
					
					die;
				}else{
					
					$response = array('status'=>false,'message'=>'Not a valid student!');
					echo json_encode($response);
					die;
					
				}
            }
            else
            {
				$error = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
				
				$response = array('status'=>false,'message'=>$error);
				echo json_encode($response);
				die;
            }
		
		
	}
	
	
	public function savedoc_post(){
		
			$this->load->config('admin/dp_config');
            $this->load->config('common/dp_config');
			$this->load->library('sendgridemail');
            
			
			$key = $this->input->post('key');
			$userid = JWT::decode($key, $this->config->item('jwt_key'));
			
			if ($this->ion_auth->logged_in($userid)){
				if($userid){
				$user  = $this->prefs_model->user_info_login($userid);
				}else{
				$user  = $this->prefs_model->user_info_login($this->ion_auth->user()->row()->id);
				}
				
			}else{
				$this->data['user_login'] = array('id'=>false);
			}
			
			$this->form_validation->set_rules('file', 'File', 'required'); 
			
            if ($_FILES['file']['size']>0)
            {
				$curpassword = $this->input->post('curpassword');
				

				if($userdata['id']){
					
					/*config to upload doc*/
					$config['upload_path']      = './upload/document';
					$config['allowed_types']    = 'jpg|png|doc|docx|pdf';
					$config['file_ext_tolower'] = TRUE;
					$this->load->library('upload', $config);
					
					$this->upload->do_upload('file');
					$file = $this->upload->data();

					$fname = $file['file_name'];
					$this->ion_auth->set_user_meta($userdata['id'], 'registration_form', $fname);
					/*config to upload doc*/
					
					$response = array('status'=>true,'message'=>'Congratulation! Registration form uploaded.');
					echo json_encode($response);
					
					die;
				}else{
					
					$response = array('status'=>false,'message'=>'Not a valid student!');
					echo json_encode($response);
					die;
					
				}
            }
            else
            {
				$error = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
				
				$response = array('status'=>false,'message'=>$error);
				echo json_encode($response);
				die;
            }
		
		
	}
	
	
	/*profile update*/
	
	public function profileupdate_post(){
		
			$this->load->config('admin/dp_config');
            $this->load->config('common/dp_config');
			$this->load->library('sendgridemail');
            /* Valid form */			
			$key = $this->input->post('key');
			$userid = JWT::decode($key, $this->config->item('jwt_key'));
			
			if ($this->ion_auth->logged_in($userid)){
				if($userid){
				$user  = $this->prefs_model->user_info_login($userid);
				}else{
				$user  = $this->prefs_model->user_info_login($this->ion_auth->user()->row()->id);
				}
				
			}else{
				$this->data['user_login'] = array('id'=>false);
			}
			
			$this->form_validation->set_rules('first_name', 'First Name', 'required');
			$this->form_validation->set_rules('last_name', 'Last Name', 'required');
			$this->form_validation->set_rules('email', 'Email', 'valid_email');
			$this->form_validation->set_rules('phone', 'Phone', 'required');

			
			
            if ($this->form_validation->run() == TRUE)
            {
				$first_name = $this->input->post('first_name');
				$last_name = $this->input->post('last_name');
				$email = $this->input->post('email');
				$phone = $this->input->post('phone');
				
				$state = $this->input->post('state');
				$city = $this->input->post('city');
				$dob = $this->input->post('dob');
				$aboutMe = $this->input->post('aboutme');
				$bio = $this->input->post('bio');

				if($userdata['id']){
					$data['first_name'] = $first_name;
					$data['last_name'] = $last_name;
					$data['phone'] = $phone;
					$this->ion_auth->update($userdata['id'], $data);
					
					$this->ion_auth->set_user_meta($userdata['id'], 'student_email', $email);
					$this->ion_auth->set_user_meta($userdata['id'], 'state', $state );
					$this->ion_auth->set_user_meta($userdata['id'], 'city', $city);
					$this->ion_auth->set_user_meta($userdata['id'], 'dob', $dob);
					$this->ion_auth->set_user_meta($userdata['id'], 'about_me', $aboutMe);
					$this->ion_auth->set_user_meta($userdata['id'], 'bio', $bio);				
					
					$response = array('status'=>true,'message'=>'Congratulation! Profile Updated Successfully!');
					echo json_encode($response);
					
					die;
				}else{
					
					$response = array('status'=>false,'message'=>'Not a valid student!');
					echo json_encode($response);
					die;
					
				}
            }
            else
            {
				$error = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
				
				$response = array('status'=>false,'message'=>$error);
				echo json_encode($response);
				die;
            }
		
		
	}

	/*profile update*/
	
	/*courses to redeem*/
		/*get courses*/
		function college_courses_get($id) {
				$college_id = $id;
				$courses = $this->coupon_model->get_all_courses($college_id);
				$response = array('status'=>true,'course'=>$courses);
				echo json_encode($response);
				die;
		}



	function redeem_post() {
		
		$key = $this->input->post('key');
		$userid = JWT::decode($key, $this->config->item('jwt_key'));
		
			if ( ! $this->ion_auth->logged_in($userid) )
			{
				$response = array('status'=>false,'message'=>'Please login first.');
				echo json_encode($response);
				die;
			}
			else
			{ 
				//$userId = $this->ion_auth->get_user_id();
				
				$this->form_validation->set_rules('course', 'Course', 'required');
				$this->form_validation->set_rules('college', 'College', 'required');
			
				
				if ($this->form_validation->run() == TRUE) {
					$this->load->library('sendgridemail');
					$college_id		=	$this->input->post('college');
					$coupon         =   $this->common_model->get_single_var('coupon','mc_coupons','user_id',$userId);
					$str_course_id	=	$this->input->post('course');
					list($course_id,$incentive)	=	explode("|",$str_course_id);
					
					$collegeName	=	$this->common_model->get_single_var('name', 'mc_colleges', 'id', $college_id);
					$coursedetails  =   $this->college_model->get_single_courses_detail($college_id,$course_id);
					$courseName		=	$this->common_model->get_single_var('course_name', 'mc_courses', 'course_id', $course_id);
					
					$fee            =   $coursedetails->fee;
					$incentive		=	$incentive;
					$result			=	$this->coupon_model->is_valid_coupon($coupon);

					if(!$incentive){
						$response = array('status'=>false,'message'=>'No Discount for this College.');
						echo json_encode($response);
						die;
					}
					
					
					if($result) {
						$coupon_id		=	$result['coupon_id'];
						$score			=	$result['score'];
						$total_disc		=	($incentive * $score) / 100;
						$total_disc_fee	=	$fee - $total_disc;
						
						$email_data = array(
							'subject'=>'Enquiry has been made on MentorCell by college '.$collegeName,
							'to' =>'sanjeev.singh82@gmail.com',
							'message' => "An enquiry has been made on MentorCell by <b>College:</b> ".$collegeName." for <b>Course:</b> ".$courseName." .\n Coupon: ".$coupon."\n URL: ".site_url()."\n Team\n MentorCell"
						);
						
						$response_array = $this->sendgridemail->send_email($email_data);
						
						$data = array('fee'=>$fee, 'total_discount'=>$total_disc,'remain_discount'=>$total_disc_fee);
						$response = array('status'=>true,'message'=>'Coupon Result.','data'=>$data);
						echo json_encode($response);
						die;
					}else{
						$response = array('status'=>false,'message'=>'Coupon not applicable.');
						echo json_encode($response);
						die;
					} 
				}else{
					$error = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
					
					$response = array('status'=>false,'message'=>$error);
					echo json_encode($response);
					die;
				}
			}			
		}		
	
	/*courses to redeem*/
	
}
