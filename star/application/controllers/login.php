<?php 
class Login extends CI_Controller
{
	
	 
	public function index($flag=0)
	
	{
	
		$data['title']="Login";
		if($flag==1)
			$data['login_error']= 'The email or password you entered is incorrect.';
		else 
		{
			$data['login_error']= '';	
		}
		$data['main_content']= 'login_form';
		$this->load->view("includes/template", $data);

	}
	
	function logout()
	{
		$this->session->unset_userdata('is_logged_in');
  // session_destroy();
   redirect('login', 'refresh');
	}
	function validate_credentials()
	
	{
	
		
		$this->load->library("form_validation");
		$this->form_validation->set_rules("email", "Email", 'trim|required|valid_email');
		$this->form_validation->set_rules('password', 'Password','trim|required');
		if($this->form_validation->run()==false)
		{
			$this->index();
		}
		else
		{
			$this->load->model('staff_login');
			$record = $this->staff_login->validate();
			if(isset($record) )
			{
				
				foreach($record as $row)
				{
					$data = array(
					'email' =>$this->input->post('email'),
					'is_logged_in'=>true,
					'designation_id'=>$row->designation_id,					
					'hq'=>$row->hqname,
					'hqid'=>$row->hqid,
					'id'=>$row->staff_id,
					'district'=>$row->district				
					);
					$this->session->set_userdata($data);
					if($row->designation_id==1)
						redirect('main/admin');
					else
					{
						redirect('main/staff');	
					}
				}
			}
			else
			{
				//$this->form_validation->set_message('required','The email or password you entered is incorrect.');
				
				$this->index(1);
			}
		}
	}
	/*function validate_credentials()
	{
		$this->load->library("form_validation");
		$this->form_validation->set_rules("email", "Email", 'trim|required');
		$this->form_validation->set_rules('password', 'Password','trim|required');
		
		if($this->form_validation->run()==FALSE)
		{
			echo "pls fill correctly";
			//$this->index();
		}
		
		else {
			
		
		$this->load->model('staff_login');
		$query = $this->staff_login->validate();
		if($row=$query->result())
		{
			
			echo $row->name;
			$data = array(
					'email' =>$this->input->post('email'),
					'is_logged_in'=>true
					
					);
			$this->session->set_userdata($data);
			//redirect('main/index');
		}
		else
			 {
			$this->index();
		}	
		}
	}*/
	
}
