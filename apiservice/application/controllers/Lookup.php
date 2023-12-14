<?php

require APPPATH .'/libraries/REST_Controller.php';


class Lookup extends REST_Controller
{
	function __construct()
	{
		parent::__construct();
		//$this->load->helper('my_api');
		ob_start();
	}
	
	public function designation_get()
	{
		$version_get = $this->uri->segment(3);
		$data = array('token'=>$this->input->get_request_header('token', TRUE));
		
		$this->load->library('form_validation');
		$this->form_validation->set_data($data);
		
		if($this->form_validation->run('token') != false)
		{
			$this->load->model('Model_token');
			$this->db->select('staff_id');
			$staff = $this->Model_token->get_by(array('uuid'=>$data['token']));
			if($staff)
			{
				$staff_id=$staff['staff_id'];	
				$this->load->model('Model_version');
				$this->db->select('designation');
				$version = $this->Model_version->get(1);
				
				if($version['designation']!=$version_get)
				{
					
					$this->load->model('Model_designation');
					$designation  = $this->Model_designation->get_many_by('designation_id <>', 1);
					if($designation)
					{
                                              array_unshift($designation,array('designation_name'=> "<--Select-->", 
									       'details'=> "<--Select-->",
									       'designation_id'=> "0"));
						$this->response(array('status'=>'success', 'message'=>array("version"=>$version['designation'], "designation"=>$designation)));	
					}
					else
					{
						$this->response(array('status'=>'failure','message'=>'Designations is not found'),REST_Controller::HTTP_NOT_FOUND);
					}
					
				}
				else
					 {
						$this->response(array('status'=>'success','message'=>'Same version'));
					 }
			
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
		
		
		/*
		$this->load->model('Model_version');
		$this->db->select('designation');
		$version = $this->Model_version->get(1);
			
		$this->load->model('Model_designation');
		$designation  = $this->Model_designation->get_many_by('designation_id <>', 1);
		if($designation)
		{
			$this->response(array('status'=>'success', 'message'=>array("version"=>$version['designation'], "designation"=>$designation)));	
		}
		else
		 {
			$this->response(array('status'=>'failure','message'=>'Designations is not found'),REST_Controller::HTTP_NOT_FOUND);
		 }	
			*/
	}
	
	public function place_get()
	{
		$version_get = $this->uri->segment(3);
		$data = array('token'=>$this->input->get_request_header('token', TRUE));
		
		$this->load->library('form_validation');
		$this->form_validation->set_data($data);
		if($this->form_validation->run('token') != false)
		{
			$this->load->model('Model_token');
			$this->db->select('staff_id');
			$staff = $this->Model_token->get_by(array('uuid'=>$data['token']));
			if($staff)
			{
				$staff_id=$staff['staff_id'];	
				$this->load->model('Model_version');
				$this->db->select('place');
				$version = $this->Model_version->get(1);
				
				if($version['place']!=$version_get)
				{
					
					$this->load->model('Model_place');
					$place  = $this->Model_place->get_all();
					if($place)
					{
                                              $obj = array('name'=> "<--Select-->", 
							   'district'=> "<--Select-->",
							   'hq'=> "0",
							   'id'=>"0");
						array_unshift($place,$obj);
						$this->response(array('status'=>'success', 'message'=>array("version"=>$version['place'], "place"=>$place)));	
					}
					else
					{
						$this->response(array('status'=>'failure','message'=>'Places is not found'),REST_Controller::HTTP_NOT_FOUND);
					}
					
				}
				else
					 {
						$this->response(array('status'=>'success','message'=>'Same version'));
					 }
			
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