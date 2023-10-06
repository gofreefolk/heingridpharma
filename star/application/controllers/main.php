<?php
class Main extends Pharmacy
{
	
	public function admin()
	{
		$data['menu'] = 'menu/admin_menu';
		//$data['main_content'] = 'admin_home';
		$data['title'] = "Admin-Home";
		$data['main_content']="common";
		$this->load->model('news_model');
		$data['news'] = $this->news_model->getall();
		$this->load->view("includes/common_template", $data);
		
	}
	
	public function change()
	{
		$password = $_POST['password'];
		$myusername= $this->session->userdata('email');
		
		$username = $_POST['email'];
		$newpass = $_POST['new_pass'];
		$retype = $_POST['retype'];
		if($newpass=='')
		{
			echo "0";
			
		}
		else{
		if($myusername==$username)
		{
			$this->load->model('staff_login');
			$record = $this->staff_login->validate();
			if(isset($record) )
				{
						
					if($newpass==$retype)	
						{
							$this->staff_login->change();
							echo "1";
						}
					else
					{
						echo "0";
					}
				}
			else
				{
					echo "0";
				}
		}
		else
		 {
			echo "0";
		}
		}
	}
	public function staff()
	{
		$data['menu'] = 'menu/staff_menu';
		$data['title'] = "Staff-Home";
		$this->load->model('news_model');
		$data['news'] = $this->news_model->getall();
		
		$data['main_content'] = 'staff/staff_home';
		$this->load->view("includes/common_template", $data);
		
	}
	
	function is_logged_in()
	{
		$is_logged_in = $this->session->userdata('is_logged_in');
		if(!isset($is_logged_in) || $is_logged_in!==TRUE)
		{
			echo "no permission";
			die();
			
		}
	}
}
