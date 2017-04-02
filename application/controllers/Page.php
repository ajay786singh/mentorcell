<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page extends Public_Controller {

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
      
    }
	
	
	public function companyoverview()
	{
		
		$this->load->view('public/layout/header', $this->data);
		$this->load->view('public/static/companyoverview', $this->data);
		$this->load->view('public/layout/footer', $this->data);
	}
	
	public function whatwedo()
	{
		
		$this->load->view('public/layout/header', $this->data);
		$this->load->view('public/static/whatwedo', $this->data);
		$this->load->view('public/layout/footer', $this->data);
	}
	
	public function testimonial()
	{
		
		$this->load->view('public/layout/header', $this->data);
		$this->load->view('public/static/testimonial', $this->data);
		$this->load->view('public/layout/footer', $this->data);
	}
	
	public function team()
	{
		
		$this->load->view('public/layout/header', $this->data);
		$this->load->view('public/static/team', $this->data);
		$this->load->view('public/layout/footer', $this->data);
	}
	

}
