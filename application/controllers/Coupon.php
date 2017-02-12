<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Coupon extends Public_Controller {

    public function __construct()
    {
        parent::__construct();
		
		$this->load->database();
        $this->load->config('common/dp_config');
        $this->load->config('common/dp_language');
        $this->load->library(array('form_validation', 'ion_auth', 'template', 'common/mobile_detect'));
        $this->load->helper(array('array', 'language', 'url'));
		$this->load->model('common/common_model');
    }


	public function index() {
		if (!$this->ion_auth->logged_in()){
			die("asdas");
		}else {
			die("YES");
		}
		
		$this->data['user_login'] = array('id'=>false);
		$this->load->view('public/layout/header', $this->data);
		$this->load->view('public/home', $this->data);
		$this->load->view('public/layout/footer', $this->data);
	}
	
}
