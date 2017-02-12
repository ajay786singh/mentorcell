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
		
		$this->questionsDisp	=	5;
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
			
			$message	=	"<h3>You Are Genius</h3>
			<h4>Your IQ is</h4>
			<h5>".$resultDisplay."</h5>
			<div class='clearfix'></div>
			<h6>Your Coupon code is : ".$coupon."</h6>";
			
			$response 		= 	array('status'=>true,'message'=>$message);
			echo json_encode($response);die;
		} else {
			$response 		= 	array('status'=>true,'message'=>'<div class="alert alert-warning"><strong>Sorry!</strong> You have already submitted the answers.</div>');
			echo json_encode($response);die;
		}
	}
}
