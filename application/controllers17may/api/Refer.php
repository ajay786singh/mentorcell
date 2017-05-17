<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
// use namespace
use Restserver\Libraries\REST_Controller;

class Refer extends REST_Controller {

    public function __construct() {
        parent::__construct();		
		$this->load->database();
		$this->load->config('common/dp_config');
        $this->load->config('common/dp_language');
        $this->load->library(array('form_validation', 'ion_auth', 'template', 'common/mobile_detect'));
        $this->load->helper(array('array', 'language', 'url','jwt'));
        $this->load->model('common/prefs_model');
		$this->load->model('common/common_model');
		$this->load->model('common/coupon_model');
    }


	public function index_post() {
		$key = $this->input->post('key');
		$userid = JWT::decode($key, $this->config->item('jwt_key'));
		$referkey = base64_encode("happysharinguserid-".$userid);
		$url = site_url()."coupon?referral-key=".$referkey;
		$response = array('status'=>true,'message'=>'data','url'=>$url,'referral-key'=>$referkey);
		echo json_encode($response);
		die;
	}
	
	
	
	public function points_get($key) {
		$userid = JWT::decode($key, $this->config->item('jwt_key'));
		$points = $this->common_model->get_single_var('points', 'users', 'id', $userid);
		$response = array('status'=>true,'point'=>$points);
		echo json_encode($response);
		die;
	}
	
}
