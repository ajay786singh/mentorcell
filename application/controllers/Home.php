<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends Public_Controller {

    public function __construct()
    {
        parent::__construct();

		$this->load->database();
        $this->load->config('common/dp_config');
        $this->load->config('common/dp_language');
        $this->load->library(array('form_validation', 'ion_auth', 'template', 'common/mobile_detect', 'pagination'));
        $this->load->helper(array('array', 'language', 'url'));
        $this->load->model('common/prefs_model');
		$this->load->model('common/college_model');
		$this->load->model('common/common_model');
		$this->load->model('admin/exam_model');
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

		$this->data['colleges'] 			= $this->common_model->get_all_rows("mc_colleges",'status','2','name');
		$this->data['streams'] 				= $this->common_model->get_all_rows("mc_streams", 1,1);
		$this->data['types'] 				= $this->common_model->get_all_rows("mc_types", 1,1);
		//$this->data['courses'] = $this->common_model->get_all_rows("mc_courses", 1,1);
		$this->data['courses'] 				= $this->common_model->get_all("mc_courses");
		//$this->data['counselling_video'] 	=  array("zoHm5AXeYYQ","Qqn0ChMyOyc","axltjnTyHOc","OQzPfib7YyA","zoHm5AXeYYQ");
		$this->data['counselling_video'] = $this->common_model->get_all_rows("mc_counceling_video", "status",1);

		$this->load->view('public/home', $this->data);

		$this->load->view('public/layout/footer', $this->data);
	}
	
	
	
	public function gallery()
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

		$this->data['streams'] = $this->common_model->get_all_rows("mc_streams", 1,1);
		$this->data['counceling_video'] = $this->common_model->get_all_rows("mc_counceling_video", "status",1);
		$this->load->view('public/gallery', $this->data);

		$this->load->view('public/layout/footer', $this->data);
	}


	function search($page = 0)
	{

		if ($this->ion_auth->logged_in()){
		$this->data['user_login']  = $this->prefs_model->user_info_login($this->ion_auth->user()->row()->id);
		}else{
			$this->data['user_login'] = array('id'=>false);
		}


		$this->load->view('public/layout/header', $this->data);

		$query = array();
		
		//print_r($_GET);die;
		if(isset($_GET['course'])){
			$query['course'] = $_GET['course'];
			if(empty($_GET['location'])){
				$query['location'] = 0;
			}else{
				$query['location'] = $_GET['location'];
			}
			
			$this->college['coursename'] = $query['course'];
			$config = array();
         $config["total_rows"] = $this->college_model->search_result_cont($query);
        $config["per_page"] = 20;
		 $config['first_link'] = 'First';
        $config['last_link'] = 'Last';
		 $config['uri_segment'] = 3;
         $config["base_url"] = base_url() . "home/search";
		 $config['suffix'] = '?'.http_build_query($_GET, '', "&"); 
		$this->pagination->initialize($config);
		$page = ($this->uri->segment(3) != '' ? $this->uri->segment(3): 0);
		$this->college["paginglinks"] = $this->pagination->create_links();
			$this->college['colleges'] = $this->college_model->search_result_course($query,$config["per_page"], $page);
			$this->college['count_res'] = $this->college_model->search_result_cont($query);
			
			$this->load->view('public/search', $this->college);
		
		}else if(isset($_GET['college'])){
			

			/*course description*/
		if(isset($_GET['course_main']) && !empty($_GET['course_main'])){
			$stream_name = $_GET['stream'];
			$course_main = $_GET['type'];
			$specializetion_main = $_GET['course_main'];
			$college_id = $_GET['college'];
			$query['college'] = $_GET['college'];
			$collegeid = $_GET['college'];
			$this->college['college'] = $this->college_model->search_result_college($query);
			$id = $this->college['college']->id;
			$this->college['images'] = $this->college_model->get_images($id);
			$this->college['videos'] = $this->college_model->get_videos($id);

			$this->college['streams'] = $this->common_model->get_all_rows("mc_streams", 1,1);
			$this->college['types'] = $this->common_model->get_all_rows("mc_types", 1,1);
			$this->college['courses'] = $this->common_model->get_all_rows("mc_courses", 1,1);
			$this->college['courseid'] = $course_main;
			$this->college['streamid'] = $stream_name;
			$this->college['stream_id'] = $this->college_model->get_streams($id);
			$this->college['type_id'] = $this->college_model->get_types($id);
			$this->college['course_id'] = $this->college_model->get_courses_detail($id);
            $this->college['exams_name'] = $this->exam_model->get_exams_by_course($stream_name);
			$this->college['fees'] = $this->college_model->get_fees_by_collage($collegeid);
			$this->college['recomd_count'] = $this->college_model->get_recomdreview($collegeid,$stream_name,$course_main);
			$this->college['recomd_data'] = $this->college_model->get_recomdreview_detail($collegeid,$stream_name,$course_main);
		$this->college['course_detail'] = $this->college_model->get_single_courses_detail(intval($query['college']),intval($_GET['course_main']));
			$this->college['college_detail'] = $this->college_model->get_college_detail($college_id,$stream_name,$course_main,$specializetion_main);	 
				//print_r($this->college['course_detail']);die;
				$this->load->view('public/college_course', $this->college);
				//echo"<pre>";
				//print_r($this->college['college_detail']);die;
				
			}else{
				
			/*course description*/
            $query['college'] = $_GET['college'];
			$this->college['college'] = $this->college_model->search_result_college($query);
			$id = $this->college['college']->id;
			$this->college['images'] = $this->college_model->get_images($id);
			$this->college['videos'] = $this->college_model->get_videos($id);

			$this->college['streams'] = $this->common_model->get_all_rows("mc_streams", 1,1);
			$this->college['types'] = $this->common_model->get_all_rows("mc_types", 1,1);
			$this->college['courses'] = $this->common_model->get_all_rows("mc_courses", 1,1);


			$this->college['stream_id'] = $this->college_model->get_streams($id);
			$this->college['stream_ids'] = $this->college_model->get_streamsbycolid($id);
			$this->college['type_id'] = $this->college_model->get_types($id);
			$this->college['course_id'] = $this->college_model->get_courses_detail($id);
			$this->load->view('public/college', $this->college);
			}


		}elseif(isset($_GET['stream'])){
			//print_r($_GET['exam_lists']);die;
			redirect('/exam/index/'.$_GET['exam_lists'], 'refresh'); die;
		}
		$this->load->view('public/layout/footer', $this->data);

	}


	function admission()
	{
		if ($this->ion_auth->logged_in()){
		$this->data['user_login']  = $this->prefs_model->user_info_login($this->ion_auth->user()->row()->id);
		}else{
			$this->data['user_login'] = array('id'=>false);
		}
		$query = '';
		$this->college['colleges'] = $this->college_model->admission_result($query);
		///$this->college['colleges'] = $this->common_model->get_all_rows("mc_colleges","status","1");
		//print_r($this->college['colleges']);die;
		$this->load->view('public/layout/header', $this->data);
		$this->load->view('public/admission', $this->college);
		$this->load->view('public/layout/footer', $this->data);

	}
	
	function all_college()
	{
		if ($this->ion_auth->logged_in()){
		$this->data['user_login']  = $this->prefs_model->user_info_login($this->ion_auth->user()->row()->id);
		}else{
			$this->data['user_login'] = array('id'=>false);
		}
		$this->college['streamid'] = $_GET['id'];
		$this->college['type'] = $_GET['type'];
		$this->load->view('public/layout/header', $this->data);
		$this->load->view('public/all_college', $this->college);
		$this->load->view('public/layout/footer', $this->data);

	}
	
	function shortlist()
	{
		if ($this->ion_auth->logged_in()){
		$this->data['user_login']  = $this->prefs_model->user_info_login($this->ion_auth->user()->row()->id);
		}else{
			$this->data['user_login'] = array('id'=>false);
		}
		$this->load->view('public/layout/header', $this->data);
		$this->load->view('public/shortlist');
		$this->load->view('public/layout/footer', $this->data);

	}
	
		function more_course()
	{
		if ($this->ion_auth->logged_in()){
		$this->data['user_login']  = $this->prefs_model->user_info_login($this->ion_auth->user()->row()->id);
		}else{
			$this->data['user_login'] = array('id'=>false);
		}
		$this->college['college_id'] = $_GET['id'];
		$this->load->view('public/layout/header', $this->data);
		$this->load->view('public/more_course', $this->college);
		$this->load->view('public/layout/footer', $this->data);

	}

	public function clgcity()
	{
		$college_id = $this->input->get('college_id');
		$college = $this->college_model->get_clgstate($college_id);
		echo json_encode($college); die;
	}


	public function get_exam_list($course_name){
		$exams_name = $this->exam_model->get_exams_by_course($course_name);

		if(count($exams_name) > 0){
		echo "<option value=''>-- Select Exam --</option>";
			foreach($exams_name as $exam_data){
				//echo "<option value='".$exam_data['slug']."'>".$exam_data['exam_name']."</option>";
				echo "<option value='".$exam_data['id']."'>".$exam_data['exam_name']."</option>";
			}
		}else{
			echo "<option value='0'>-- Select Exam --</option>";
		}
		die;
	}
	
	public function get_coursetype_list_by_stream($stream_name,$college_id){
		$stream_name = $this->exam_model->get_colltype_by_stream($stream_name,$college_id);
      
		if(count($stream_name) > 0){
			 echo "<option value=''>-- Select Course --</option>";
			foreach($stream_name as $exam_data){
				if($exam_data['course_id']!='' OR $exam_data['course_id']!= '0'){
				$course_name = $this->exam_model->get_coursetype_name($exam_data['course_id']);
				if($course_name->course_name){
				echo "<option value='".$exam_data['course_id']."'>".$course_name->course_name."</option>";
				}
				}
			}
		}else{
			echo "<option value='0'>-- Select Type --</option>";
		}
		die;
	}
	
	public function get_specialize_list_by_course($course,$college_id){
		$course_name = $this->exam_model->get_speltype_by_course($course,$college_id);

		if(count($course_name) > 0){
		echo "<option value=''>-- Select Specialization --</option>";
			foreach($course_name as $exam_data){
				$special_name = $this->college_model->get_spel_data($exam_data['specialization_id']);
				echo "<option value='".$exam_data['specialization_id']."'>".$special_name->specialization_name."</option>";
			}
		}else{
			echo "<option value='0'>-- Select Course --</option>";
		}
		die;
	}
	
	public function get_location_list($course_name){
		 $collage_id = $this->college_model->get_collageid($course_name);
		//$exams_name = $this->exam_model->get_exams_by_course($course_name);

		if(count($collage_id) > 0){
		echo "<option value='0'>-- Select Location --</option>";
			foreach($collage_id as $collageid){
				$location_id = $this->college_model->get_location($collageid['college_id']);
            $city_name = $this->college_model->get_city_name($location_id[0]['city']);
				//echo "<option value='".$exam_data['slug']."'>".$exam_data['exam_name']."</option>";
				echo "<option value='".$location_id[0]['city']."'>".$city_name->name."</option>";
			}
		}
		die;
	}
	
	public function get_stream_by_college($college_id){
		 $stream_list= $this->college_model->get_streamlist($college_id);
		
		 echo "<option value='0'>-- Select Stream --</option>";
    if(count($stream_list) > 0){
		
			foreach($stream_list as $streamlist){
				if($streamlist['stream_id']!=''){
				$stream = $this->college_model->get_stream($streamlist['stream_id']);
				if($stream){
				echo "<option value='".$stream->stream_id."'>".$stream->stream_name."</option>";
				}
				}
			}
		}
		die;
	}

	public function feedback(){
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
	
		function study_abroad($page = 0)
	{

		if ($this->ion_auth->logged_in()){
		$this->data['user_login']  = $this->prefs_model->user_info_login($this->ion_auth->user()->row()->id);
		}else{
			$this->data['user_login'] = array('id'=>false);
		}


		$this->load->view('public/layout/header', $this->data);

		$query = array();
		
			$query['course'] = $_GET['course'];
			$query['location'] = 0;
			
			$this->college['coursename'] = $query['course'];
			$stream_detail = $this->common_model->get_single_row('mc_courses','course_id',$query['course']);
			$this->college['streamids'] = $stream_detail['stream_id'];
			$config = array();
         $config["total_rows"] = $this->college_model->search_result_cont($query);
        $config["per_page"] = 20;
		 $config['first_link'] = 'First';
        $config['last_link'] = 'Last';
		 $config['uri_segment'] = 3;
         $config["base_url"] = base_url() . "home/study_abroad";
		 $config['suffix'] = '?'.http_build_query($_GET, '', "&"); 
		$this->pagination->initialize($config);
		$page = ($this->uri->segment(3) != '' ? $this->uri->segment(3): 0);
		$this->college["paginglinks"] = $this->pagination->create_links();
			$this->college['colleges'] = $this->college_model->search_result_course($query,$config["per_page"], $page);
			$this->college['count_res'] = $this->college_model->search_result_cont($query);
			
			$this->load->view('public/admission', $this->college);
		
		$this->load->view('public/layout/footer', $this->data);

	}
	
		function streamcourses()
	{
$streamids = $_GET['streamid'];
$assigned_streamcourses = $this->college_model->get_assigned_streamcourses($streamids);

		if(count($assigned_streamcourses) > 0){
			 echo "<option value=''>-- Select Courses --</option>";
			foreach($assigned_streamcourses as $a_streamcourse){

			$assigned_course_name = $this->common_model->get_single_row('mc_courses','course_id',$a_streamcourse['course_id']);
		
				
				echo "<option value='".$a_streamcourse['course_id']."'>".$assigned_course_name['course_name']."</option>";
				}
			
		}else{
			echo "<option value='0'>-- Select Course --</option>";
		}
		die;
					
	}
	
	
	
	

	/**/

}
