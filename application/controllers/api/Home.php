<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
// use namespace
use Restserver\Libraries\REST_Controller;

class Home extends REST_Controller {

    public function __construct()
    {
        parent::__construct();
		
		$this->load->database();
        $this->load->config('common/dp_config');
        $this->load->config('common/dp_language');
        $this->load->library(array('form_validation', 'ion_auth', 'template', 'common/mobile_detect'));
        $this->load->helper(array('array', 'language', 'url','jwt'));
        $this->load->model('common/prefs_model');
		$this->load->model('common/college_model');
		$this->load->model('common/common_model');
		$this->load->model('admin/exam_model');
		/* college model */
    }


	public function index_get()
	{
		
			
		$cstates = $this->college_model->get_states();

		$this->data['location'] = $$cstates;
		$this->data['colleges'] = $this->common_model->get_all("mc_colleges");
		$this->data['streams'] = $this->common_model->get_all_rows("mc_streams", 1,1);
		$this->data['types'] = $this->common_model->get_all_rows("mc_types", 1,1);
		//$this->data['courses'] = $this->common_model->get_all_rows("mc_courses", 1,1);
		$this->data['courses'] = $this->common_model->get_all("mc_courses");
		echo json_encode($this->data); die;
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
			
			$this->college['streams'] = $this->common_model->get_all_rows("mc_streams", 1,1);
			$this->college['types'] = $this->common_model->get_all_rows("mc_types", 1,1);
			$this->college['courses'] = $this->common_model->get_all_rows("mc_courses", 1,1);
		
		
			$this->college['stream_id'] = $this->college_model->get_streams($id);
			$this->college['type_id'] = $this->college_model->get_types($id);
			$this->college['course_id'] = $this->college_model->get_courses_detail($id);
			
			/*course description*/
			if(isset($_GET['course_main']) && !empty($_GET['course_main'])){
				$this->college['course_detail'] = $this->college_model->get_single_courses_detail(intval($query['college']),intval($_GET['course_main']));
				$this->load->view('public/college_course', $this->college);
			}
			
			/*course description*/
			
			$this->load->view('public/college', $this->college);
			
		}elseif(isset($_GET['stream'])){
			redirect('/exam/index/'.$_GET['exam_lists'], 'refresh'); die;
		}
		$this->load->view('public/layout/footer', $this->data);
		
	}
	
	
	function admission_get()
	{ 
		$query = '';
		$this->college['colleges'] = $this->college_model->admission_result($query);
		echo json_encode($this->college); die;
		
	}	
	
	public function clgcity_get($college_id)
	{
		$college = $this->college_model->get_clgstate($college_id);
		echo json_encode($college); die;
	}
	
	
	public function get_exam_list($course_name){
		$exams_name = $this->exam_model->get_exams_by_course($course_name);
		
		if(count($exams_name) > 0){
		echo "<option value='0'>-- Select Exam --</option>";
			foreach($exams_name as $exam_data){
				echo "<option value='".$exam_data['slug']."'>".$exam_data['exam_name']."</option>";
			}
		}
		die;
	}

	public function feedback_post(){
		$this->load->library('sendgridemail');
		
		$name = $_POST['name'];
		$email = $_POST['email'];
		$phone = $_POST['phone'];
		$message = $_POST['message'];
		
		$email_data = array(
								'subject'=>'New Enquiry Request from MentorCell',
								'to' =>'dinesh@mentorcell.com',
								'message' => "Please find information requested  from MentorCell.\n Name: ".$name."\n Email: ".$email."\n Phone: ".$phone."\n Message:  ".$message."\n URL: ".site_url()."\n Team\n MentorCell"
							);
			$response_array = $this->sendgridemail->send_email($email_data);
			
			if($response_array == 202){
				$response = array('status'=>true,'message'=>'<div class="alert alert-success">We will reply you soon.</div>');
			}else{
				$response = array('status'=>false,'message'=>'<div class="alert alert-danger">We are unable to deliver email.</div>');
			}
			echo json_encode($response);die;

	}
	
	
	
	/**/
	public function underconstruction()
	{
		if ($this->ion_auth->logged_in()){
		$this->data['user_login']  = $this->prefs_model->user_info_login($this->ion_auth->user()->row()->id);
		}else{
			$this->data['user_login'] = array('id'=>false);
		}
		$this->load->view('public/layout/header', $this->data);
		$this->load->view('public/404', $this->data);
		$this->load->view('public/layout/footer', $this->data);
	}
	
	/**/
	
}
