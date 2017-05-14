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
		$this->load->model('admin/course_detail_model');

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

  public function counselling()
	{
    $this->load->view('public/layout/header', $this->data);
		$this->load->view('public/static/counselling', $this->data);
		$this->load->view('public/layout/footer', $this->data);
	}
	
	 public function management($id)
	{
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
		$this->data['course_description_page_name_list'] = $this->course_detail_model->get_single_row("mc_course_description","id", $id);
		//print_r($this->data);

		$this->load->view('public/static/management', $this->data);

		$this->load->view('public/layout/footer', $this->data);
	}


}
