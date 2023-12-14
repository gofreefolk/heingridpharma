<?php 
class Staff_report extends Pharmacy
{
	function staff_view_monthly()
	{
		$data['title'] = 'Monthly Report';
		$data['menu'] = 'menu/staff_menu';
		//$this->load->model('report_model');
		//$data['desi'] = $this->designation->get_designation();
		$data['main_content'] = "report/staff_view_monthly_report";
		
	
		
		
		
		$this->load->view("includes/common_template.php", $data);
		
	}
	
	function staff_view_daily()
	{
		$data['title'] = 'Staff Daily Report';
		$data['menu'] = 'menu/staff_menu';
		//$this->load->model('report_model');
		//$data['desi'] = $this->designation->get_designation();
	
		$data['main_content'] = "report/staff_view_daily_report";
		
	
		
		
		
		$this->load->view("includes/common_template.php", $data);
	}
	
	function staff_view_daily_report_print()
	{
		$data= array('date'=>$_POST['date'], 'staff_id'=>$this->session->userdata("id"));
	   $this->load->model('report_model');
	   $data['report'] = $this->report_model->daily($data);
	   
	   if(sizeof($data['report'])!=0)
	   {
		
	    $data['title'] = 'Daily Report';
		$data['menu'] = 'menu/staff_menu';
	
		$this->load->model('doctor_model');
		foreach($data['report'] as $row)
		{
			$temp =$row->doctors_visited;
			$temp = str_replace(',', '', $temp);
			$doct = explode('/', $temp);
				
				
			for($i=0; $i<sizeof($doct)-1; $i++)
			{
			$doctor[]=$this->doctor_model->getdata($doct[$i]);	
				
			}
		}
		
		//$data['doctor']=$doctor;	
		
		$data['main_content'] = "report/view_staff_daily_report_print";
		$data['doctor']=$doctor;
	
		
		
		$this->load->view("includes/common_template.php", $data );
		
		}
		else{
			echo "No details.. please go back";
		
	
			}
	  
	  
	}
	
}