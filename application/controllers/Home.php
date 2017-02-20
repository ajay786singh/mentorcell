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
	
	public function clgcity()
	{
		$college_id = $this->input->get('college_id');
		$college = $this->college_model->get_clgstate($college_id);
		echo json_encode($college); die;
	}
	
}
