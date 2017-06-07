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
		$this->load->library('sendgridemail');
    $this->load->view('public/layout/header', $this->data);
		$this->load->view('public/static/counselling', $this->data);
		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('phone', 'Phone', 'required');
		if ($this->form_validation->run() == TRUE)
		{
		$this->counselling = array();
		$name = $this->input->post('name');
		$email = $this->input->post('email');
		$phone = $this->input->post('phone');
		$intrested = $this->input->post('register_interest');
		$courses = $this->input->post('register_course');
		$message = $this->input->post('message');
			$this->counselling['name'] = $name;
			$this->counselling['email'] = $email;
			$this->counselling['phone'] = $phone;
			$this->counselling['intrested'] = $intrested;
			$this->counselling['courses'] = $courses;
			$this->counselling['message'] = $message;
			$this->counselling['created'] = date('Y-m-d');
		}
			if ($this->form_validation->run() == TRUE && $this->common_model->insert($this->counselling," mc_counselling_data"))
		{
			$intrestname = $this->common_model->get_single_row("mc_streams", "stream_id", $intrested);
			$intname = $intrestname['stream_name'];
			$coursename = $this->common_model->get_single_row("mc_courses", "course_id", $courses);
			$cname = $coursename['course_name'];
			$email_data = array(
								'subject'=>'New Counselling Request from MentorCell',
								'to' =>'info@mentorcell.com',
								'message' => "Please find information requested  from MentorCell.\n Name: ".$name."\n Email: ".$email."\n Phone: ".$phone."\n Education Interests: ".$intname."\n Course: ".$cname."\n Message:  ".$message."\n URL: ".site_url()."\n Team\n MentorCell"
							);
			$response_array = $this->sendgridemail->send_email($email_data);
			$this->data['message'] = 'Counselling Form Add successfully! We will reply you soon.'; ?>
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
			<script>
			alert('Counselling Form Add successfully! We will reply you soon.');
			</script>
			
			<?php //$this->load->view('public/static/counselling', $this->data);
			redirect('page/counselling', 'refresh');
		}
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
	
	public function study_abroad()
	{
		$this->load->library('sendgridemail');
    $this->load->view('public/layout/header', $this->data);
		$this->load->view('public/static/study_abroad', $this->data);
		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('phone', 'Phone', 'required');
		if ($this->form_validation->run() == TRUE)
		{
		$this->counselling = array();
		$name = $this->input->post('name');
		$email = $this->input->post('email');
		$phone = $this->input->post('phone');
		$courses = $this->input->post('register_course');
		$country = $this->input->post('country');
		$state = $this->input->post('state');
		$city = $this->input->post('city');
		$intake = $this->input->post('intake');
			$this->counselling['name'] = $name;
			$this->counselling['email'] = $email;
			$this->counselling['phone'] = $phone;
			$this->counselling['courses'] = $courses;
			$this->counselling['country'] = $country;
			$this->counselling['state'] = $state;
			$this->counselling['city'] = $city;
			$this->counselling['intake'] = $intake;
			$this->counselling['created'] = date('Y-m-d');
		}
			if ($this->form_validation->run() == TRUE && $this->common_model->insert($this->counselling," mc_studyabroad_data"))
		{
			$countryname = $this->common_model->get_single_row("mc_desire_country", "id", $country);
			$contname = $countryname['name'];
			$statename = $this->common_model->get_single_row("states", "id", $state);
			$sname = $statename['name'];
			$cityname = $this->common_model->get_single_row("districts", "id", $city);
			$citname = $cityname['name'];
			$coursename = $this->common_model->get_single_row("mc_desire_course", "id", $courses);
			$cname = $coursename['name'];
			$intakename = $this->common_model->get_single_row("mc_intake", "id", $intake);
			$iname = $intakename['name'];
			$email_data = array(
								'subject'=>'Studay Abroad Request from MentorCell',
								'to' =>'info@mentorcell.com',
								'message' => "Please find information requested  from MentorCell.\n Name: ".$name."\n Email: ".$email."\n Phone: ".$phone."\n State:  ".$sname."\n City: ".$citname."\n Desire Course: ".$cname."\n Desire Country: ".$contname."\n Intake:  ".$iname."\n URL: ".site_url()."\n Team\n MentorCell"
							);
			$response_array = $this->sendgridemail->send_email($email_data);
			$this->data['message'] = 'Studay Abroad Form Add successfully! We will reply you soon.';
			echo '<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>';
			echo '<script>alert("Studay Abroad Form Add successfully! We will reply you soon.");</script>';
			
			redirect('page/study_abroad', 'refresh');
		}
		$this->load->view('public/layout/footer', $this->data);
	}


}
