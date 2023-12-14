<?php

require APPPATH .'/libraries/REST_Controller.php';


class Detail extends REST_Controller
{
	function __construct()
	{
		parent::__construct();
		ob_start();
	}
	function stationkm_get()
	{
		$data = array('token'=>$this->input->get_request_header('token', TRUE),
					   'place'=>$this->input->get_request_header('place', true));
		
		$this->load->library('form_validation');
		$this->form_validation->set_data($data);
		if($this->form_validation->run('station') != false)
		{
			$this->load->model('Model_token');
			$this->db->select('staff_id');
			$staff = $this->Model_token->get_by(array('uuid'=>$data['token']));
			if($staff)
			{									
				$this->load->model('Model_staff_registration');
				//$this->db->select('hqname');
				$staff = $this->Model_staff_registration->get_by(array('staff_id'=>$staff['staff_id']));			
				
				$this->load->model('Model_place');
				
				
				$myplace = $this->Model_place->get_by(array('id'=>$staff['hqname']));
				
				
				if($myplace)
				{
					
					$workplace = $this->Model_place->get_by(array('id'=>$data['place']));
					if($workplace)
					{
						$message = array();	
						if($myplace['id']==$workplace['id'])
						{
							$message['station'] = "HQ";
						}
						else if($myplace['district']==$workplace['district'])
						{
							$message['station'] = 'ExHQ';
						}
						else
						{
							$message['station'] = "OS";
						}
						
						$this->load->model('Model_km');
						$this->db->select('km');
						$km = $this->Model_km->get_by(array('source'=>$myplace['id'], 'destination'=>$workplace['id']));
						$message['km'] = $km['km'];
						
						$this->load->model('Model_doctor');
						$this->db->select('name');
						$this->db->select('specialized');
						$this->db->select('doctor_id');
						$message['doctor'] = $this->Model_doctor->get_many_by('place_id', $workplace['id']);
						
						$this->response($message);		
					}
					else
					{
						$this->response(array('status'=>'failure','message'=>'Place is not found'),REST_Controller::HTTP_NOT_FOUND);
					}	
						
				}
				else
				{
					$this->response(array('status'=>'failure','message'=>'Headquarter is not ready. Contact your admin'),REST_Controller::HTTP_NOT_FOUND);
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