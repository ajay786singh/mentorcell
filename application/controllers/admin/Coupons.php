<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Coupons extends Admin_Controller {

		public function __construct()
		{
			parent::__construct();

			/* Load :: Common */
			$this->lang->load('admin/users');

			/* Title Page :: Common */
			$this->page_title->push('Coupons');
			$this->data['pagetitle'] = $this->page_title->show();

			/* Breadcrumbs :: Common */
			$this->breadcrumbs->unshift(1, 'Coupons', 'admin/coupons');
			
			/* college model */
			$this->load->model('common/common_model');
			$this->load->model('common/college_model');
			$this->load->model('common/coupon_model');
			
			$this->load->library('paginationajax');

		}


		public function index()
		{ 
			if ( ! $this->ion_auth->logged_in() OR ! $this->ion_auth->is_admin())
			{
				redirect('auth/login', 'refresh');
			}
			else
			{ 
				/* Breadcrumbs */
				$this->data['breadcrumb'] = $this->breadcrumbs->show();

				/* Load Template */
				$this->data['coupon_list'] = $this->common_model->get_all("mc_coupons");
				
				$a_params['count']		= true;
				$config['base_url'] 	= base_url()."admin/coupons/index";
				$config['total_rows'] 	= $this->coupon_model->get_all_coupons($a_params);
				$config['uri_segment'] 	= 4;
				$config['per_page'] 	= 2;
				if($this->input->post('page')){
					$config['cur_page'] = $this->input->post('page');
				}else{
					$config['cur_page'] = 1;
				}
				$config['replace_div'] = 'dashboard';
				$this->paginationajax->initialize($config);
				
				$a_params['count']			=		false;
				$a_params['num']			=		$config['per_page'];
				$a_params['offset']			=		$this->input->post('offset');
				$a_params['whereClause']	=		array();			
				$this->data['a_coupons'] 	= 		$this->coupon_model->get_all_coupons($a_params);
				
				
				if($this->input->post('page')){
					$this->load->view('admin/coupons/manage_coupon_ajax',$this->data);
				}else{	
					$this->template->admin_render('admin/coupons/index', $this->data);
				}				
			}
		}
		
		function global_vals() {
			if ( ! $this->ion_auth->logged_in() OR ! $this->ion_auth->is_admin())
			{
				redirect('auth/login', 'refresh');
			}
			else
			{ 
				/* Title Page :: Common */
				$this->page_title->push("Coupon Global Values");
				$this->data['pagetitle'] = $this->page_title->show();
			
				/* Breadcrumbs */
				$this->data['breadcrumb'] = $this->breadcrumbs->show();
				
				/* Validate form input */
				$this->form_validation->set_rules('min', 'Minimum', 'required');
				$this->form_validation->set_rules('max', 'Maximum', 'required');
				$this->data['min']	=	"";
				$this->data['max']	=	"";
				if($result	=	$this->common_model->get_all('mc_global_coupon_values')) {
					$this->data['min']	=	$result[0]['min'];
					$this->data['max']	=	$result[0]['max'];
				}				
				
				if ($this->form_validation->run() == TRUE) {
					$min	=	$this->input->post('min');
					$max	=	$this->input->post('max');
					
					if($min > 100 || $max > 100) {
						$this->session->set_flashdata('message', 'Value Not allowed!');
						redirect('admin/coupons/global_vals', 'refresh');
					}
					if($result) {
						$this->common_model->update('mc_global_coupon_values',array('min'=>$min,'max'=>$max),'1','1');
					} else {
						$this->common_model->insert(array('min'=>$min,'max'=>$max),'mc_global_coupon_values');
					}
					$this->session->set_flashdata('message', 'Value Updated successfully!');
					redirect('admin/coupons/global_vals', 'refresh');
				}
				/* Load Template */					
				$this->template->admin_render('admin/coupons/global_vals', $this->data);
			}			
		}
		
		function coupon_validation($str) {
			// pr($_POST);
			$coupon			=	$this->input->post('coupon');
			$course_id		=	$this->input->post('course_id');
			$college_id		=	$this->session->userdata('user_id');
			
			if(!$this->coupon_model->is_valid_coupon($coupon)) {
				$this->form_validation->set_message("coupon_validation", 'The coupon "'.$coupon.'" is invalid coupon.');
				return FALSE;
				
			}
			
			$result	=	$this->coupon_model->is_exists_coupon($coupon);
			$msg	=	"<br> By college: ".$result['college_name']." <br> For course: ".$result['course_name'];
			if($result) {
				$this->form_validation->set_message("coupon_validation", 'The coupon "'.$coupon.'" is already in use. '.$msg);
				return FALSE;
			}
			
			return TRUE;
		}
		
		function redeem() {
			if ( ! $this->ion_auth->logged_in() )
			{
				redirect('auth/login', 'refresh');
			}
			else
			{ 
				/* Title Page :: Common */
				$this->page_title->push("Redeem / Enquiry ");
				$this->data['pagetitle'] = $this->page_title->show();
			
				/* Breadcrumbs */
				$this->data['breadcrumb'] = $this->breadcrumbs->show();
				
				/* Validate form input */
				
				//$college_id		=	$this->session->userdata('user_id');
				$userId = $this->ion_auth->get_user_id();
				if($this->ion_auth->in_group('college')){
				 $user   = $this->ion_auth->user($userId)->row();
				 $this->data['college_lists'] = $this->college_model->get_assigned_college($user->colleges);
				}else{
				 $this->data['college_lists'] = $this->common_model->get_all("mc_colleges");
				}
				
				$this->form_validation->set_rules('course_id', 'Course', 'required');
				$this->form_validation->set_rules('coupon', 'Coupon', 'trim|required|callback_coupon_validation');
				$this->data['coupon']		=	"";		
				$this->data['course_id']	=	0;				
				//$this->data['courses']		=	$this->coupon_model->get_all_courses($college_id);
				
				if ($this->form_validation->run() == TRUE) {
					$this->load->library('sendgridemail');
					$college_id		=	$this->input->post('college_id');
					$coupon			=	$this->input->post('coupon');
					$str_course_id	=	$this->input->post('course_id');
					list($course_id,$incentive)	=	explode("|",$str_course_id);
					
					$collegeName	=	$this->common_model->get_single_var('name', 'mc_colleges', 'id', $college_id);
					$coursedetails  =   $this->college_model->get_single_courses_detail($college_id,$course_id);
					$courseName		=	$this->common_model->get_single_var('course_name', 'mc_courses', 'course_id', $course_id);
					
					$fee            =   $coursedetails->fee;
					$incentive		=	$incentive;
					$result			=	$this->coupon_model->is_valid_coupon($coupon);

					if(!$incentive){
						$this->form_validation->set_message("coupon_validation", 'Incentive is not mentioned');
						$this->template->admin_render('admin/coupons/redeem', $this->data);
						return FALSE;
					}
					
					
					if($result) {
						$coupon_id		=	$result['coupon_id'];
						$score			=	$result['score'];
						
						$total_disc		=	($incentive * $score) / 100;
						$total_disc_fee	=	$fee - $total_disc;
						
						$this->data['course_id']		=	$course_id;
						$this->data['course_fee']		=   $fee;
						$this->data['course_incentive']	=	$incentive;
						$this->data['coupon']			=	$coupon;
						$this->data['total_disc']		=	$total_disc;
						$this->data['total_disc_fee']	=	$total_disc_fee;	

						$email_data = array(
							'subject'=>'Enquiry has been made on MentorCell by college '.$collegeName,
							'to' =>'sanjeev.singh82@gmail.com',
							'message' => "An enquiry has been made on MentorCell by <b>College:</b> ".$collegeName." for <b>Course:</b> ".$courseName." .\n Coupon: ".$coupon."\n URL: ".site_url()."\n Team\n MentorCell"
						);
						
						$response_array = $this->sendgridemail->send_email($email_data);
					} 
					
					if ($this->input->post('redeem_submitted')) {					
						$this->common_model->update('mc_coupons',array('course_id'=>$course_id,'college_id'=>$college_id, 'course_fee'=>$course_fee, 'total_disc'=>$total_disc, 'total_disc_fee'=>$total_disc_fee),'coupon_id',$coupon_id);
						
						$this->session->set_flashdata('message', 'Coupon applied successfully!');
						redirect('admin/coupons/redeem', 'refresh');
					}
				}
				/* Load Template */					
				$this->template->admin_render('admin/coupons/redeem', $this->data);
			}			
		}
		
		
		/*get courses*/
		function courses($id) {
			if ( ! $this->ion_auth->logged_in() )
			{
				redirect('auth/login', 'refresh');
			}
			else
			{ 
				$college_id = $id;
				$courses = $this->coupon_model->get_all_courses($college_id);
				echo '<option value="">Choose a Course to apply coupon</option>';
				if($courses) {
					foreach($courses as $k => $course){
						
						echo '<option value="'.$course['course_id']."|".$course['incentive'].'" >'.$course['course_name'].'</option>';			
					}
				}
	
			die;
			}
		}	
		
		public function counselling()
	{
        if ( ! $this->ion_auth->logged_in() OR ! $this->ion_auth->is_admin())
        {
            redirect('auth/login', 'refresh');
        }
        else
        {
            /* Breadcrumbs */
            $this->data['breadcrumb'] = $this->breadcrumbs->show();

            /* Load Template */
			$this->data['streams_list'] = $this->common_model->get_all("mc_counselling_data");
            $this->template->admin_render('admin/coupons/counselling', $this->data);
        }
	}
	
		public function study_abroad()
	{
        if ( ! $this->ion_auth->logged_in() OR ! $this->ion_auth->is_admin())
        {
            redirect('auth/login', 'refresh');
        }
        else
        {
            /* Breadcrumbs */
            $this->data['breadcrumb'] = $this->breadcrumbs->show();

            /* Load Template */
			$this->data['streams_list'] = $this->common_model->get_all("mc_studyabroad_data");
            $this->template->admin_render('admin/coupons/study_abroad', $this->data);
        }
	}
	
	public function exportcounsel_data(){
		//$data = $this->common_model->get_all("mc_counselling_data");
		
			$data  = $this->common_model->export_counsel_data();
            //$data[] = array('x'=> "rajan", 'y'=> "rajan", 'z'=> "rajan", 'a'=> "rajan");
			//$data[] = array('x'=> "rajan1", 'y'=> "rajan1", 'z'=> "rajan1", 'a'=> "rajan1");
             header("Content-type: application/csv");
            header("Content-Disposition: attachment; filename=\"counselling".".csv\"");
            header("Pragma: no-cache");
            header("Expires: 0");

            $handle = fopen('php://output', 'w');
         
			$headerarray = array('id' => 'S.N','name' => 'Name','email' => 'Email','phone' => 'Phone','stream_name' => 'Education Interests','course_name' => 'Courses' ,'message' =>'Comment'
			,'created' => 'created');

			fputcsv($handle, $headerarray);
            foreach ($data as $data) {
                fputcsv($handle, $data);
            }
                fclose($handle);
            exit;
    }
	
	public function exportstuday_data(){
		//$data = $this->common_model->get_all("mc_counselling_data");
		
			$data  = $this->common_model->export_study_data();
			//echo"<pre>";
			//print_r($data);die;
            //$data[] = array('x'=> "rajan", 'y'=> "rajan", 'z'=> "rajan", 'a'=> "rajan");
			//$data[] = array('x'=> "rajan1", 'y'=> "rajan1", 'z'=> "rajan1", 'a'=> "rajan1");
             header("Content-type: application/csv");
            header("Content-Disposition: attachment; filename=\"Study_abroad".".csv\"");
            header("Pragma: no-cache");
            header("Expires: 0");

            $handle = fopen('php://output', 'w');
         
			$headerarray = array('studyid' => 'S.N','name' => 'Name','email' => 'Email','phone' => 'Phone','state_name' => 'State Name','city_name' => 'City Name' ,'country_name' =>'Desire Country Name','course_name' => 'Desire Course name','intake_name' => 'Intake');

			fputcsv($handle, $headerarray);
            foreach ($data as $data) {
                fputcsv($handle, $data);
            }
                fclose($handle);
            exit;
    }
		
	}
?>