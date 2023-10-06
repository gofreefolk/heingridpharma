<?php

require APPPATH .'/libraries/REST_Controller.php';


class Daily extends REST_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->helper('my_api');
		ob_start();
	}
	
	function report_post()
	{
		/*$data = array('date'=>$this->input->()) 
					'password'=>$this->input->get_request_header('password', TRUE));
		//$this->response($data);*/
		
		$this->load->library('form_validation');
		$data = remove_unknown_fields($this->post(), $this->form_validation->get_field_names('daily'));
		
		$this->form_validation->set_data($data);
		if($this->form_validation->run('daily') != false)
		{
			$this->load->model('Model_token');
			$this->db->select('staff_id');
			$staff = $this->Model_token->get_by(array('uuid'=>$this->input->get_request_header('token', TRUE)));
			if($staff)
			{
				$data['staff_id']=$staff['staff_id'];
				$this->load->model('Model_place');
				$this->db->select('name');
				$place = $this->Model_place->get_by(array('id'=>$data['place_id']));
				$data['place']=$place['name'];
				$data['status']='work';
				$this->load->model('Model_daily');
				$id=$this->Model_daily->insert($data);				
				
				if(!$id)
				{
					
					$this->response(array('status'=>'failure', 'message'=>'An unexpected error occured while trying to create the token'), REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
				}
				else
				 {
				 	
					$this->response(array('status'=>'success', 'message'=>'Daily report inserted'));
				}
				
				$this->response($data);
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
}