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
				$this->form_validation->set_rules('course_id', 'Course', 'required');
				$this->form_validation->set_rules('coupon', 'Coupon', 'trim|required|callback_coupon_validation');
				$this->data['coupon']	=	"";				
				$this->data['courses']	=	$this->common_model->get_all("mc_courses");
				
				if ($this->form_validation->run() == TRUE) {
					$this->load->library('sendgridemail');
					
					$coupon			=	$this->input->post('coupon');
					$course_id		=	$this->input->post('course_id');
					$college_id		=	$this->session->userdata('user_id');
					$collegeName	=	$this->common_model->get_single_var('name', 'mc_colleges', 'id', $college_id);
					$courseName		=	$this->common_model->get_single_var('course_name', 'mc_courses', 'course_id', $course_id);
					$course_fee		=	50000;
					$result			=	$this->coupon_model->is_valid_coupon($coupon);
					if($result) {
						$coupon_id		=	$result['coupon_id'];
						$score			=	$result['score'];
						
						
						$total_disc		=	($course_fee * $score) / 100;
						$total_disc_fee	=	$course_fee - $total_disc;
						
						$this->data['course_id']		=	$course_id;
						$this->data['course_fee']		=	$course_fee;
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
	}
?>