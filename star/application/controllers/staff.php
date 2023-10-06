<?php 
class Staff extends Pharmacy
{
	function view_staff()
	{
		$this->load->model('staff_model');
		if($val = $this->staff_model->getall())
		{
			
			$data['staff_details']=$val;
			
			
		}	
		
		$data['title']="View Staff";
		$data['menu'] = 'menu/admin_menu';
		$data['main_content'] = "staff_operation/view_staff";
		$this->load->view("includes/common_template.php", $data);
	}
	function staff_operation()
	{
		$data['title']="Staff Operation";
		$data['menu'] = 'menu/admin_menu';
		$data['main_content'] = "staff_operation/staff_operation";
		 
                $newdata = array(
                   'edit_user'  => $_POST['staff_id']
                   
               );
$this->session->set_userdata($newdata);
                
		$this->load->view("includes/common_template.php", $data);
	}
}
