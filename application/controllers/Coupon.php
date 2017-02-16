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
		if (!$this->ion_auth->logged_in()){
			redirect(base_url(),'refresh');
		}
		$this->data['user_login']  			=	$this->prefs_model->user_info_login($this->ion_auth->user()->row()->id);
		$this->data['questionnaire_list'] 	=	$this->common_model->get_all_rows("mc_questionnaire",1,1,'RAND()', $this->questionsDisp);
		$this->load->view('public/layout/header', $this->data);
		$this->load->view('public/coupon', $this->data);
		$this->load->view('public/layout/footer', $this->data);
	}
	public function question_answer_submitted() {
		$user_id		=	$this->session->userdata('user_id');
		$hasAnswerd		=	$this->common_model->get_single_row('mc_qa_result','user_id',$user_id);
		$tot_correct	=	0;
		if(empty($hasAnswerd)) {
			$answers_val 	= 	$this->input->post('answers_val');
			$a_answers_val	=	explode(",",$answers_val);
			foreach($a_answers_val as $val) {
				$a_values	=	explode(":",$val);
				$data['question_id']		=	$a_values[0];
				list($answer_id,$correct)=	explode("|",$a_values[1]);
				$data['answer_id']			=	$answer_id;
				$data['user_id']			=	$user_id;
				$this->common_model->insert($data, "mc_qa_result");
				if($correct) {
					$tot_correct++;
				}
			}
			
			if($tot_correct == $this->questionsDisp) {
				$resultDisplay	=	$this->maxValue;
			}elseif($tot_correct == 0) {
				$resultDisplay	=	$this->minValue;
			}else {
				$resultDisplay	=	$this->minValue + ($tot_correct * $this->eachCorrectValue);
			}
			//Generating Coupon Code
			$coupon				=	coupon_generator(8);
			$c_data['coupon']	=	$coupon;
			$c_data['user_id']	=	$user_id;
			$this->common_model->insert($c_data, "mc_coupons");
			
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
