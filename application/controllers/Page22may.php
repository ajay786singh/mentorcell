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
	
	  public function write_review()
	{
    
	  $this->form_validation->set_rules('college_name', 'College Name', 'required');
		$this->form_validation->set_rules('stream_name', 'Stream Name', 'required');
		$this->form_validation->set_rules('course_name', 'Course Name', 'required');
		$this->form_validation->set_rules('review_title', 'Review Title', 'required');
		$this->form_validation->set_rules('review_detail', 'Review Detail', 'required');
		$this->form_validation->set_rules('worth_money', 'Worth Money', 'required');
		$this->form_validation->set_rules('campus_life', 'Campus Life', 'required');
		$this->form_validation->set_rules('college_placment', 'College Placement', 'required');
		$this->form_validation->set_rules('campus_facility', 'Campus Facility', 'required');
		$this->form_validation->set_rules('faculty', 'Faculty', 'required');
		$this->form_validation->set_rules('college_recomd', 'Recommend Others', 'required');
		$this->form_validation->set_rules('fname', 'First Name', 'required');
		$this->form_validation->set_rules('lname', 'Last Name', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required');
			if ($this->form_validation->run() == TRUE)
		{	
	
			$this->data = array();
			
			$this->data = $this->input->post();
			$this->data['post_date'] = date('y-m-d');
			
		}
		if ($this->form_validation->run() == TRUE && $this->common_model->insert($this->data," mc_review"))
		{
			$this->data['message'] = 'Review added successfully!';
			redirect('page/write_review', 'refresh');
		}else
		{
             /* Load Template */
        $this->load->view('public/layout/header', $this->data);
		$this->load->view('public/static/write_review', $this->data);
		$this->load->view('public/layout/footer', $this->data);
        }
		
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

		$this->load->view('public/static/management', $this->data);

		$this->load->view('public/layout/footer', $this->data);
	}


}
