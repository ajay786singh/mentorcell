<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Answers extends Admin_Controller {

    public function __construct()
    {
        parent::__construct();

        /* Load :: Common */
        $this->lang->load('admin/users');

        /* Title Page :: Common */
        $this->page_title->push(lang('menu_users'));
       

        /* Breadcrumbs :: Common */
        $this->breadcrumbs->unshift(1, lang('menu_users'), 'admin/streams');
		
		/* college model */
		$this->load->model('common/common_model');
	

    }


	public function index($question_id)
	{
        if ( ! $this->ion_auth->logged_in() OR ! $this->ion_auth->is_admin())
        {
            redirect('auth/login', 'refresh');
        }
        else
        { 	
			$question_detail = $this->common_model->get_single_row("mc_questionnaire",'question_id',$question_id);
			$this->data['pagetitle'] = '<h1>Answers for question '.$question_detail['question'].'</h1>';
            /* Breadcrumbs */
            $this->data['breadcrumb'] = $this->breadcrumbs->show();

            /* Load Template */
			$this->data['question_id'] = $question_id;
			
			$this->data['answer_list'] = $this->common_model->get_all_rows("mc_answers",'question_id',$question_id,'answer_id asc');
            $this->template->admin_render('admin/answers/index', $this->data);
			
        }
	}


	public function create($question_id)
	{
		$question_detail = $this->common_model->get_single_row("mc_questionnaire",'question_id',$question_id);
		$this->data['pagetitle'] = '<h1>Answers for question '.$question_detail['question'].'</h1>';
		/* Breadcrumbs */
        $this->breadcrumbs->unshift(2, lang('menu_users_create'), 'admin/streams/create');
        $this->data['breadcrumb'] = $this->breadcrumbs->show();
		

        /* Variables */
		$tables = $this->config->item('tables', 'ion_auth');
		/* Conf */
		$config['upload_path']      = './upload/';
		$config['allowed_types']    = 'gif|jpg|png';
		$config['file_ext_tolower'] = TRUE;
		$this->load->library('upload', $config);

		/* Validate form input */
		$flag = FALSE;
		for($i=1;$i<=5;$i++) {
			if($this->input->post('answer'.$i)) {
				$flag = TRUE;
			}
		}		
		if(!$flag) {
			$this->form_validation->set_rules('answer1', 'Question', 'required');
		}
		// $this->form_validation->set_rules('type', 'Type', 'required');
		$this->form_validation->set_rules('correct', 'Correct Answer', 'required');
		
		
		if ($this->form_validation->run() == TRUE)
		{	
			$this->data = array();
			$this->data = $this->input->post();
		}
		if ($this->form_validation->run() == TRUE)
		{
			$question_id	=	$this->input->post('question_id');
			$correct		=	$this->input->post('correct');
			$this->common_model->update("mc_answers",array('correct'=>0),'question_id',$question_id);
			for($i=1;$i<=5;$i++) {
				$data['answer']			=	$this->input->post('answer'.$i);
				$answer_id				=	$this->input->post('answer_id'.$i);
				$data['question_id']	=	$question_id;
				if($data['answer']) {
					if($correct	==	$i) {
						$data['correct']	=	1;
					}else {
						$data['correct']	=	0;
					}
					if($answer_id) {
						$this->common_model->update("mc_answers",$data,'answer_id',$answer_id);
					} else {
						$this->common_model->insert($data,"mc_answers");
					}
				}
			}	
            $this->session->set_flashdata('message', 'Answers added successfully!');
			redirect('admin/answers/index/'.$question_id, 'refresh');
		}
		else
		{
            $this->data['message'] =  (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));

			$this->data['answer_id']['value'] 	= $this->form_validation->set_value('answer_id');
			$this->data['answer']['value'] 		= $this->form_validation->set_value('answer');
			$this->data['question_id']['value'] 	= $this->form_validation->set_value('question_id');
			// $this->data['type']['value'] 	= $this->form_validation->set_value('type');
			if($this->form_validation->set_value('correct')) {
				$this->data['correct']['value'] = $this->form_validation->set_value('correct');
			} else {
				$this->data['correct']['value'] = 1;
			}
			$this->data['question_id'] = $question_id;
			$this->data['answer_list'] = $this->common_model->get_all_rows("mc_answers",'question_id',$question_id,'answer_id asc');
			// $this->data['levels'] 		= $this->common_model->get_all_rows("mc_levels", 1,1);
			// $this->data['types'] 		= array(1=>'Radio', 'Textbox', 'Checkbox');
            /* Load Template */
            $this->template->admin_render('admin/answers/create', $this->data);
        }

    }
	


	public function delete($question_id,$answer_id)
	{
        /* Load Template */
		$question_id = (int) $question_id;
		$answer_id = (int) $answer_id;

		if ( ! $this->ion_auth->logged_in() OR ( ! $this->ion_auth->is_admin() ))
		{
			redirect('auth', 'refresh');
		}
		
		if($this->common_model->deletecolumn("mc_answers","answer_id",$answer_id))
		{
			$this->session->set_flashdata('message', 'Answers Deleted!');
			redirect('admin/answers/index/'.$question_id, 'refresh');
		}
		else
		{
			$this->session->set_flashdata('message', 'No Answers found.');
			redirect('admin/answers/index/'.$question_id, 'refresh');
		}
	}


	public function edit($question_id)
	{
        $question_id = (int) $question_id;
		$question_detail = $this->common_model->get_single_row("mc_questionnaire",'question_id',$question_id);
		if ( ! $this->ion_auth->logged_in() OR ( ! $this->ion_auth->is_admin() ))
		{
			redirect('auth', 'refresh');
		}

		/* Conf */
		$config['upload_path']      = './upload/';
		$config['allowed_types']    = 'gif|jpg|png';
		$config['file_ext_tolower'] = TRUE;
		$this->load->library('upload', $config);
        /* Breadcrumbs */
        $this->breadcrumbs->unshift(2, lang('menu_users_edit'), 'admin/answers/edit');
        $this->data['breadcrumb'] = $this->breadcrumbs->show();

        /* Data */
		$answers = $this->common_model->get_single_row("mc_answers", "question_id", $question_id);
		
		/* Validate form input */
		$this->form_validation->set_rules('answer', 'Question', 'required');
		// $this->form_validation->set_rules('type', 'Type', 'required');
		$this->form_validation->set_rules('correct', 'Status', 'required');

		if (isset($_POST) && ! empty($_POST))
		{
            /*if ($this->_valid_csrf_nonce() === FALSE OR $question_id != $this->input->post('question_id'))
			{	
				show_error('There is something wrong with security.');
			}*/

			if ($this->form_validation->run() == TRUE)
			{
				$data['answer'] = $this->input->post('answer');
				// $data['type']	 = $this->input->post('type');
				
				$data['correct'] = $this->input->post('correct');
				
                if($this->common_model->update("mc_answers", $data, "question_id", $answers['question_id']))
			    {
                    $this->session->set_flashdata('message', 'Answers data Updated!');
					redirect('admin/answers/index/'.$question_id, 'refresh');
			    }
			    else
			    {
                    $this->session->set_flashdata('message', $this->ion_auth->errors());
						redirect('admin/answers/index/'.$question_id, 'refresh');
					
			    }
			}
		}

		// display the edit user form
		$this->data['csrf'] = $this->_get_csrf_nonce();
		$this->data['answers'] = $answers;

		// set the flash data error message if there is one
		$this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));

		$this->data['answer_id']['value'] 	= $this->form_validation->set_value('answer_id',$answers['answer_id']);
		$this->data['answer']['value'] 		= $this->form_validation->set_value('answer',$answers['answer']);
		$this->data['question_id'] 			= $question_id;
		$this->data['correct']['value'] 		= $this->form_validation->set_value('correct',$answers['correct']);
		$this->data['answers'] 				= $this->common_model->get_all_rows("mc_answers", 1,1);
		$this->data['pagetitle'] 			= '<h1>Answers for question '.$question_detail['question'].'</h1>';
		// $this->data['levels'] 		= $this->common_model->get_all_rows("mc_levels", 1,1);
		// $this->data['types'] 		= array(1=>'Radio', 'Textbox', 'Checkbox');
			
        /* Load Template */
		$this->template->admin_render('admin/answers/edit', $this->data);
	}


	

	public function view($question_id)
	{
        /* Breadcrumbs */
        $this->breadcrumbs->unshift(2, lang('menu_users_profile'), 'admin/groups/profile');
        $this->data['breadcrumb'] = $this->breadcrumbs->show();

        /* Data */
        $question_id = (int) $question_id;

        $this->data['user_info'] = $this->ion_auth->user($question_id)->result();
        foreach ($this->data['user_info'] as $k => $user)
        {
            $this->data['user_info'][$k]->groups = $this->ion_auth->get_users_groups($user->question_id)->result();
        }

        /* Load Template */
		$this->template->admin_render('admin/users/profile', $this->data);
	}


	public function _get_csrf_nonce()
	{
		$this->load->helper('string');
		$key   = random_string('alnum', 8);
		$value = random_string('alnum', 20);
		$this->session->set_flashdata('csrfkey', $key);
		$this->session->set_flashdata('csrfvalue', $value);

		return array($key => $value);
	}


	public function _valid_csrf_nonce()
	{
		if ($this->input->post($this->session->flashdata('csrfkey')) !== FALSE && $this->input->post($this->session->flashdata('csrfkey')) == $this->session->flashdata('csrfvalue'))
		{
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}
	
	public function city()
	{
		$state_id = $this->input->get('state_id');
		$cities = $this->common_model->get_all_rows("cities", "state_id",$state_id);
		$option = '<select  class="form-control" required="" name="city" question_id="college_city" ><option value="">Select City</option>';
		foreach($cities as $city){
			$option .= '<option value="'.$city['question_id'].'">'.$city['name'].'</option>';
		}
		$option .= '</select>';
		echo $option; die;
	}
	
	
}
