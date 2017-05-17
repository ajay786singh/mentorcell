
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Student extends CI_Controller {
	
	public function __construct()
    {
        parent::__construct();

        //if (is_admin_logged_in() == false)
        //redirect('admin/login');

        $this->load->model('student_model');

    }
	
	
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('header');
		$data['student_lists'] = $this->student_model->get_all("tbl_students");
		//print_r($data['student_lists']);
		$this->load->view('student_lists',$data);
		$this->load->view('footer');
	}
	
	
	public function add(){
		//$data[''] = $this->input->post('');
		
		if( $this->input->method() == 'post'){
			$data = array();
			unset($_POST['submit']);
			unset($_POST['id']);
			$data = $this->input->post();
			$this->student_model->insert($data,"tbl_students");
			//$this->session->set_flashdata('success_msg',"Record Inserted Successfully.");
            redirect(base_url().'index.php/student/');
			
		}else{
			$data = array();
			$data['form_type'] = 'add';
			$data['education_interests'] =  $this->student_model->get_all('tbl_edu_interest');
		}
		$this->load->view('header');
		
		$this->load->view('student',$data);
		$this->load->view('footer');
	}
	
	
	public function edit($id){
		//$data[''] = $this->input->post('');

		if( $this->input->method() == 'post'){
			$data = array();
			unset($_POST['submit']);
			$student_id = $_POST['id'];
			unset($_POST['id']);
			$data = $this->input->post();
			$this->student_model->update("tbl_students", $data, "id", $student_id);
			//$this->session->set_flashdata('success_msg',"Record Inserted Successfully.");
            redirect(base_url().'index.php/student/');
			
		}else{
			$data = array();
			$data['form_type'] = 'edit';
			$data['student_data'] = $this->student_model->get_single_row("tbl_students", "id", $id);
			//print_r($data);
		}
		$this->load->view('header');
		$this->load->view('student',$data);
		$this->load->view('footer');
	}
}
