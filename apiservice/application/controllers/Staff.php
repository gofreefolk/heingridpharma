<?php

require APPPATH .'/libraries/REST_Controller.php';


class Staff extends REST_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->helper('my_api');
		ob_start();
	}
	
	function login_post()
	{
		$data = array('email'=>$this->input->get_request_header('email', TRUE), 
					'password'=>$this->input->get_request_header('password', TRUE));
		//$this->response($data);
		$this->load->library('form_validation');
		$data = remove_unknown_fields($data, $this->form_validation->get_field_names('login_post'));
		
		$this->form_validation->set_data($data);
		if($this->form_validation->run('login_post') != false)
		{
			
			$this->load->model('Model_staff_registration');	
			$staff = $this->Model_staff_registration->get_by(array('email'=>$this->input->get_request_header('email', TRUE), 'password'=>$this->input->get_request_header('password', TRUE), 'designation_id <>'=>1, 'status'=>'present'));
			if($staff)
			{
				$uuid = $this->generate_uuid();
				
				$staff_id = $staff['staff_id'];
				$this->load->model('Model_token');
				$data = array('uuid'=>$uuid, 'staff_id'=>$staff_id);
				$id=$this->Model_token->insert($data);
				
				
				if(!$id)
				{
					
					$this->response(array('status'=>'failure', 'message'=>'An unexpected error occured while trying to create the token'), REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
				}
				else
				 {
				 	
					$this->response(array('status'=>'success', 'message'=>$uuid));
				}
			}
			else
			 {
				$this->response(array('status'=>'failure','message'=>'Staff is not found'),REST_Controller::HTTP_NOT_FOUND);
			 }
			 
			
			
		}
		else
		 {
		 	
			$this->response(array('status'=>'failure', 'message'=>$this->form_validation->get_errors_as_array()), REST_Controller::HTTP_BAD_REQUEST);
		}
	}

	function logout_delete()
	{
		$data = array('token'=>$this->input->get_request_header('token', TRUE));
		
		$this->load->library('form_validation');
		$this->form_validation->set_data($data);
		
		if($this->form_validation->run('token') != false)
		{
			$this->load->model('Model_token');
			
			$staff = $this->Model_token->get_by(array('uuid'=>$data['token']));
			if($staff)
			{
				$this->Model_token->delete_by(array('uuid'=>$data['token']));
				$this->response(array('status'=>'success', 'message'=>'successfully logout'));
			}
			else
			{
				$this->response(array('status'=>'failure','message'=>'Unauthorised Access'),REST_Controller::HTTP_UNAUTHORIZED);
			}
		}
		else
		 {
		 	
			$this->response(array('status'=>'failure', 'message'=>$this->form_validation->get_errors_as_array()), REST_Controller::HTTP_BAD_REQUEST);
		}
		
	}
	
	function generate_uuid() {
	    return sprintf( '%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
	        mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ),
	        mt_rand( 0, 0xffff ),
	        mt_rand( 0, 0x0fff ) | 0x4000,
	        mt_rand( 0, 0x3fff ) | 0x8000,
	        mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff )
	    );
	}	



	
}