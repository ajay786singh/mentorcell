<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends Public_Controller {

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
		$this->load->model('common/coupon_model');
		/* college model */
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
		$this->form_validation->set_rules('phone', 'Phone', 'required|is_unique['.$tables['users'].'.phone]',
        array('is_unique' => 'Mobile number is already registered'));
    //$this->form_validation->set_rules('phone', 'Phone', 'required');
    $this->form_validation->set_message('is_unique', 'The %s id is already registered with us');
		//$this->form_validation->set_rules('password', 'Password', 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|max_length[' . $this->config->item('max_password_length', 'ion_auth') . ']');

		$phone = trim($this->input->post('phone'));
		$activation_code = rand ( 1000 , 9999 );
		$password  = $this->random_password(8);
		$email = strtolower($this->input->post('email'));

		$interest = $this->input->post('interest');
		$course = $this->input->post('course');
		$state = $this->input->post('state');
		$city = $this->input->post('city');
		$refer_key = $this->input->post('refer_key');
		$register_caller = $this->input->post('register_caller');
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
			$this->common_model->save_point($refer_key);
			
			$user_id = $this->ion_auth->register($username, $password, $email, $additional_data);
			$this->ion_auth->set_user_meta($user_id, 'interest', $interest);
			$this->ion_auth->set_user_meta($user_id, 'course', $course);
			$this->ion_auth->set_user_meta($user_id, 'state', $state);
			$this->ion_auth->set_user_meta($user_id, 'city', $city);
			$this->ion_auth->set_user_meta($user_id, 'register_caller', $register_caller);


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
					if($response_array == 202){
						$response = array('status'=>true,'message'=>'<div class="alert alert-success"><strong>Congratulation!</strong> Please check email for instruction.</div>');
					}else{
						$response = array('status'=>true,'message'=>'<div class="alert alert-danger"><strong>Registered!</strong> We are unable to deliver email.</div>');
					}
					echo json_encode($response);die;
				}else{

					$response = array('status'=>false,'message'=>'<div class="alert alert-danger"><strong>You are not registered with Mentorcell.</div>');
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


	public function city()
	{
		$state_id = $this->input->get('state_id');
		$cities = $this->common_model->get_all_rows("districts", "state_id",$state_id);
		$option = '';
		foreach($cities as $city){
			$option .= '<option value="'.$city['id'].'">'.$city['name'].'</option>';
		}
		$option .= '';
		echo $option; die;
	}

	public function profile()
	{

		if ($this->ion_auth->logged_in()){
		$user  = $this->prefs_model->user_info_login($this->ion_auth->user()->row()->id);
		$this->data['user_login'] = $user;
		}else{
			 redirect('/', 'refresh');
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

		$this->data['college_lists'] = $this->common_model->get_all("mc_colleges");


		$this->load->view('public/layout/header', $this->data);

		$this->load->view('public/profile', $this->data);

		$this->load->view('public/layout/footer', $this->data);
	}

	function curpassword_validation($str) {
			if ($this->ion_auth->logged_in()){
				$userdata  = $this->prefs_model->user_info_login($this->ion_auth->user()->row()->id);

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

	public function changepassword(){

			$this->load->config('admin/dp_config');
            $this->load->config('common/dp_config');
			$this->load->library('sendgridemail');
            /* Valid form */
            //$this->form_validation->set_rules('identity', 'Email', 'required');

			if ($this->ion_auth->logged_in()){
				$userdata  = $this->prefs_model->user_info_login($this->ion_auth->user()->row()->id);

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

					$response = array('status'=>true,'message'=>'<div class="alert alert-success"><strong>Congratulation!</strong> Password updated successfully.</div>');
					echo json_encode($response);

					die;
				}else{

					$response = array('status'=>false,'message'=>'<div class="alert alert-danger">Not a valid student!</div>');
					echo json_encode($response);
					die;

				}
            }
            else
            {
				$error = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

				$response = array('status'=>false,'message'=>'<div class="alert alert-danger">'.$error.'</div>');
				echo json_encode($response);
				die;
            }


	}


	public function savedoc(){

			$this->load->config('admin/dp_config');
            $this->load->config('common/dp_config');
			$this->load->library('sendgridemail');


			if ($this->ion_auth->logged_in()){
				$userdata  = $this->prefs_model->user_info_login($this->ion_auth->user()->row()->id);

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

					$response = array('status'=>true,'message'=>'<div class="alert alert-success"><strong>Congratulation!</strong> Registration form uploaded.</div>');
					echo json_encode($response);

					die;
				}else{

					$response = array('status'=>false,'message'=>'<div class="alert alert-danger">Not a valid student!</div>');
					echo json_encode($response);
					die;

				}
            }
            else
            {
				$error = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

				$response = array('status'=>false,'message'=>'<div class="alert alert-danger">'.$error.'</div>');
				echo json_encode($response);
				die;
            }


	}


	/*profile update*/

	public function profileupdate(){

			$this->load->config('admin/dp_config');
            $this->load->config('common/dp_config');
			$this->load->library('sendgridemail');
            /* Valid form */
            //$this->form_validation->set_rules('identity', 'Email', 'required');

			if ($this->ion_auth->logged_in()){
				$userdata  = $this->prefs_model->user_info_login($this->ion_auth->user()->row()->id);

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

					$response = array('status'=>true,'message'=>'<div class="alert alert-success"><strong>Congratulation!</strong>Profile Updated Successfully!</div>');
					echo json_encode($response);

					die;
				}else{

					$response = array('status'=>false,'message'=>'<div class="alert alert-danger">Not a valid student!</div>');
					echo json_encode($response);
					die;

				}
            }
            else
            {
				$error = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

				$response = array('status'=>false,'message'=>'<div class="alert alert-danger">'.$error.'</div>');
				echo json_encode($response);
				die;
            }


	}

	/*profile update*/

	/*courses to redeem*/
		/*get courses*/
		function college_courses($id) {
				$college_id = $id;
				$courses = $this->coupon_model->get_all_courses($college_id);
				echo '<option value="">Choose a Course to apply coupon</option>';
				if($courses) {
					foreach($courses as $k => $course){

						echo '<option value="'.$course['course_id']."|".$course['incentive'].'" >'.$course['course_name'].'</option>';
					}
				}

			die;
		}



	function redeem() {
			if ( ! $this->ion_auth->logged_in() )
			{
				echo "<div class='alert alert-danger'>please login first</div>";
			}
			else
			{
				$userId = $this->ion_auth->get_user_id();

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
						$response = array('status'=>false,'message'=>'<div class="alert alert-danger">No Discount for this College.</div>');
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

						$message = '<div class="alert alert-success"><p>Fee: Rs. '.$fee.' </p><p>Discount: Rs. '.$total_disc.'</p><p>Fee after Discount: Rs. '.$total_disc_fee.'</p></div>';
						$response = array('status'=>true,'message'=>$message);
						echo json_encode($response);
						die;
					}else{
						$response = array('status'=>false,'message'=>'<div class="alert alert-danger">Coupon not applicable.</div>');
						echo json_encode($response);
						die;
					}
				}else{
					$error = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

					$response = array('status'=>false,'message'=>'<div class="alert alert-danger">'.$error.'</div>');
					echo json_encode($response);
					die;
				}
			}
		}

	/*courses to redeem*/

}
