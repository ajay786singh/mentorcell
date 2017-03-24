<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Coupon extends Public_Controller {

    public function __construct() {
        parent::__construct();		
		$this->load->database();
        $this->load->config('common/dp_config');
        $this->load->config('common/dp_language');
        $this->load->library(array('form_validation', 'ion_auth', 'template', 'common/mobile_detect'));
        $this->load->helper(array('array', 'language', 'url'));
		$this->load->model('common/common_model');
		
		$this->questionsDisp	=	20;
		$this->minValue			=	80;
		$this->maxValue			=	120;
		$this->eachCorrectValue	=	round(($this->maxValue - $this->minValue) / $this->questionsDisp);
    }


	public function index() {
		$this->data['couponBox1']	=	'active';
		$this->data['couponBox2']	=	'';
		$this->data['couponBox3']	=	'';
		$loggedIn					=	$this->ion_auth->logged_in();		
		$this->data['loggedIn'] 	= 	$loggedIn;
		if (!$loggedIn) {
			$this->data['user_login'] 	= 	array('id'=>false);
		} else {
			$this->data['user_login']	=	$this->prefs_model->user_info_login($this->ion_auth->user()->row()->id);
			$user_id					=	$this->data['user_login']['id'];
		}
		$this->load->view('public/layout/header', $this->data);
		if (!$loggedIn) {
			$this->load->view('public/coupon', $this->data);
		} else {
			$hasAnswerd					=	$this->common_model->get_single_row('mc_coupons','user_id',$user_id);
			$this->data['hasAnswerd']	=	$hasAnswerd;
			if($hasAnswerd) {
				$resultDisplay				=	$hasAnswerd['resultDisplay'];
				$coupon						=	$hasAnswerd['coupon'];
				$this->data['couponBox1']	=	'';
				$this->data['couponBox2']	=	'';
				$this->data['couponBox3']	=	'active';
				$message	=	"
				<h4>Your IQ is</h4>
				<h5>".$resultDisplay."</h5>
				<div class='clearfix'></div>
				<h6>Your Coupon code is : ".$coupon."</h6>";
				if($resultDisplay<80)
				$message = "<h6>Your Coupon code is : ".$coupon."</h6>";
				$this->data['message']	=	$message;
				$this->load->view('public/coupon', $this->data);
			} else {
				$this->data['couponBox1']	=	'';
				$this->data['couponBox2']	=	'active';
				$this->data['couponBox3']	=	'';
				//if(isset($_POST['coupon_course_submitted'])) {
					$this->data['questionnaire_list'] 	=	$this->common_model->get_all_rows("mc_questionnaire",1,1,'RAND()', $this->questionsDisp);
					$this->data['course_id'] 			=	0;//$this->input->post('course_id');
					$this->load->view('public/coupon', $this->data);
				//} else {
				//	$this->data['courses']	=	$this->common_model->get_all("mc_courses");
				//	$this->load->view('public/coupon_course', $this->data);
				//}
			}
		}		
		$this->load->view('public/layout/footer', $this->data);
	}
	public function question_answer_submitted() {
		$user_id		=	$this->session->userdata('user_id');
		if($user_id) {
			$hasAnswerd		=	$this->common_model->get_single_row('mc_coupons','user_id',$user_id);
			$tot_correct	=	0;
			$course_id	 	= 	$this->input->post('course_id');
		
			if(empty($hasAnswerd)) {
				$this->data['couponBox1']	=	'';
				$this->data['couponBox2']	=	'active';
				$this->data['couponBox3']	=	'';
				
				$answers_val 	= 	$this->input->post('answers_val');
				$a_answers_val	=	explode(",",$answers_val);
				// pr($a_answers_val);die;
				
				//Generating Coupon Code
				$coupon				=	coupon_generator(8);
				$c_data['coupon']	=	$coupon;
				$c_data['user_id']	=	$user_id;
				$c_data['course_id']=	$course_id;
				
				$this->common_model->insert($c_data, "mc_coupons");
				$coupon_id	=	$this->db->insert_id();
				
				if(isset($a_answers_val[0]) && !empty($a_answers_val[0])) {
					foreach($a_answers_val as $val) {
						$a_values	=	explode(":",$val);
						$data['question_id']		=	$a_values[0];
						list($answer_id,$correct)	=	explode("|",$a_values[1]);
						$data['answer_id']			=	$answer_id;
						$data['user_id']			=	$user_id;
						$data['coupon_id']			=	$coupon_id;
						$this->common_model->insert($data, "mc_qa_result");
						if($correct) {
							$tot_correct++;
						}
					}
				}
				//Calculating actual Score of the user
				//Formula: When a student scores 10/20, his coupon value will be MIN + {(MAX - MIN)/ 20/10} i.e. 50 + 40/2 = 70%
				//Formula: When a student scores 20/20, his coupon value will be by above formula: 50 + 40 = 90%
				$minMaxResult		=	$this->common_model->get_all('mc_global_coupon_values');
				$minGlobalValue		=	$minMaxResult[0]['min'];
				$maxGlobalValue		=	$minMaxResult[0]['max'];
				if($tot_correct) {
					$score	=	$minGlobalValue	 + (($maxGlobalValue	- $minGlobalValue) / ($this->questionsDisp / $tot_correct));
				} else {
					$score	=	$minGlobalValue;
				}				
				
				//Formula: TO display user the result bewteen 80, 120. It is only for display purpose. It has nothing to do with the rest of the calclation
				if($tot_correct == $this->questionsDisp) {
					$resultDisplay	=	$this->maxValue;
				}elseif($tot_correct == 0) {
					$resultDisplay	=	$this->minValue;
				}else {
					$resultDisplay	=	$this->minValue + ($tot_correct * $this->eachCorrectValue);
				}
				
				$this->common_model->update('mc_coupons', array('score'=>$score, 'resultDisplay'=>$resultDisplay, 'tot_correct'=>$tot_correct), 'user_id', $user_id);
				
				
				$message	=	"
				<h4>Your IQ is</h4>
				<h5>".$resultDisplay."</h5>
				<div class='clearfix'></div>
				<h6>Your Coupon code is : ".$coupon."</h6>";
				
				$this->load->library('plivo');
				$this->load->library('sendgridemail');
				
				$row	=	$this->common_model->get_single_row('users', 'id', $user_id);
				$phone	=	$row['phone']; 
				$email	=	$row['email']; 
				
				$sms_data = array(
					'src' => '+123456789', //The phone number to use as the caller id (with the country code). E.g. For USA 15671234567
					'dst' => '+91'.$phone, // The number to which the message needs to be send (regular phone numbers must be prefixed with country code but without the ‘+’ sign) E.g., For USA 15677654321.
					'text' => 'Your MentorCell Coupon code is '.$coupon.'', // The text to send
					'type' => 'sms', //The type of message. Should be 'sms' for a text message. Defaults to 'sms'
					'url' => base_url() . 'index.php/plivo_test/receive_sms', // The URL which will be called with the status of the message.
					'method' => 'POST', // The method used to call the URL. Defaults to. POST
				);

				/*
				 * look up available number groups
				 */
				$response_array = $this->plivo->send_sms($sms_data);
				
				$email_data = array(
									'subject'=>'Your Coupon code for MentorCell',
									'to' =>$email,
									'message' => "Please use these coupon to get MentorCell discount.\n Coupon: ".$coupon."\n URL: ".site_url()."\n Team\n MentorCell"
								);
				$response_array = $this->sendgridemail->send_email($email_data);
				
				
				$response 		= 	array('status'=>true,'message'=>$message);
				echo json_encode($response);die;
			} else {
				$response 		= 	array('status'=>true,'message'=>'<div class="alert alert-warning"><strong>Sorry!</strong> You have already submitted the answers.</div>');
				echo json_encode($response);die;
			}
		}
	}
}
