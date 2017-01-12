
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class College extends Admin_Controller {
	
	public function __construct()
    {
        parent::__construct();

        //if (is_admin_logged_in() == false)
        //redirect('admin/login');
     $this->load->model('common/college_model');
        //$this->load->model('college_model');

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
		echo "mentor";
		
		/*$this->load->view('header');
		$data['college_lists'] = $this->college_model->get_all("tbl_colleges");
		//print_r($data['student_lists']);
		$this->load->view('college_lists',$data);
		$this->load->view('footer');*/
	}
	
	
	public function add(){
		//$data[''] = $this->input->post('');
		
		if( $this->input->method() == 'post'){
			$data = array();
			unset($_POST['submit']);
			unset($_POST['id']);
			$data = $this->input->post();
			$this->college_model->insert($data,"tbl_colleges");
			//$this->session->set_flashdata('success_msg',"Record Inserted Successfully.");
            redirect(base_url().'index.php/colleges/');
			
		}else{
			$data = array();
			$data['form_type'] = 'add';
		}
		//$this->load->view('header');
		
		//$this->load->view('college',$data);
		//$this->load->view('footer');
		            $this->template->admin_render('admin/colleges/college', $data);

	}
	
	
	public function edit($id){
		//$data[''] = $this->input->post('');

		if( $this->input->method() == 'post'){
			$data = array();
			unset($_POST['submit']);
			$student_id = $_POST['id'];
			unset($_POST['id']);
			$data = $this->input->post();
			$this->college_model->update("tbl_colleges", $data, "id", $student_id);
			//$this->session->set_flashdata('success_msg',"Record Inserted Successfully.");
            redirect(base_url().'index.php/colleges/');
			
		}else{
			$data = array();
			$data['form_type'] = 'edit';
			$data['college_data'] = $this->college_model->get_single_row("tbl_colleges", "id", $id);
			//print_r($data);
		}
		$this->load->view('header');
		$this->load->view('college',$data);
		$this->load->view('footer');
	}
}
