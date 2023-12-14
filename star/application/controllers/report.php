<?php 
class Report extends Pharmacy
{
	function add_daily($val=0)
	{
		
		$data['title'] = 'Daily Report';
		$data['menu'] = 'menu/staff_menu';
		$this->load->model('designation');
		$data['desi'] = $this->designation->get_designation();
		$data['main_content'] = "report/add_daily_report";
		
		$data['val']=$val;
		
		$this->load->model('place_model');		
		$data['place']=$this->place_model->get_all();
		
		
		$this->load->view("includes/common_template.php", $data);
	}
	
	function edit_daily($val=0)
	{
		$daily_id=$_POST['daily_id'];
		$this->load->model('report_model');
		$data['daily'] = $this->report_model->getdaily($daily_id);
		$data['val']=$val;
		
		$data['title'] = 'Edit Daily Report ';
		$data['menu'] = 'menu/staff_menu';
		$this->load->model('designation');
		$data['desi'] = $this->designation->get_designation();
		$data['main_content'] = "report/edit_daily_report";
		
		
		
		
		
		$this->load->view("includes/common_template.php", $data);
		
		 
	}
	function insert_daily()
	{
		
		$staff_id = $this->session->userdata('id');
		//$hq = $this->input->post('work');
		//$filearr = explode(",",$hq);
		//$name = $filearr[0];
	
		
		$data = array(
				'date'=>$_POST['date'],
				'place_id'=>$_POST['work'],
				'place'=>$_POST['place'],
				'worked_with'=>$_POST['designation'],
				'doctors_visited'=>$_POST['check'],
				'chemist'=>$_POST['chemist'],
				'other_expense'=>$_POST['other_expense'],
				'expense_reason'=>$_POST['expense_reason'],
				'station'=>$_POST['station'],
				'km'=>$_POST['km'],
				'status'=>'work',
				'staff_id'=>$staff_id
				
				);
		
		$this->load->model('report_model');
		$val = $this->report_model->insert_daily($data);
		
		$this->add_daily($val);
	}
	
	function update_daily()
	{
		$staff_id = $this->session->userdata('id');
		$hq = $this->input->post('work');
		$filearr = explode(",",$hq);
		$name = $filearr[0];
		$daily_id=$_POST['daily_id'];
		$data = array(
						
				'worked_with'=>$_POST['designation'],
				'doctors_visited'=>$_POST['check'],
				'chemist'=>$_POST['chemist'],
				'other_expense'=>$_POST['other_expense'],
				'expense_reason'=>$_POST['expense_reason']
							
				);
		
		$this->load->model('report_model');
		$val = $this->report_model->update_daily($data, $daily_id);
		
		$data['title'] = 'Monthly Report';
		$data['menu'] = 'menu/staff_menu';
		//$this->load->model('report_model');
		//$data['desi'] = $this->designation->get_designation();
		$data['main_content'] = "report/staff_view_daily_report";
		
	
		
		
		
		$this->load->view("includes/common_template.php", $data);
		
		//$this->add_daily(3);
	}
	

	function delete_daily()
	{
		$daily_id = $this->input->post('daily_id');
		$this->load->model("report_model");
		$this->report_model->delete_daily($daily_id);
		echo "Deleted";
	}

	function view_monthly()
	{
		$data['title'] = 'Monthly Report';
		$data['menu'] = 'menu/admin_menu';
		//$this->load->model('report_model');
		//$data['desi'] = $this->designation->get_designation();
		$this->load->model('staff_model');
		$data['staff'] = $this->staff_model->getall();
		$data['main_content'] = "report/view_monthly_report";
		
	
		
		
		
		$this->load->view("includes/common_template.php", $data);
		
	}
	function view_monthly_report()
	{
		
		$d = explode("/",$_POST['date']); 
			
		$data =array('month'=>$d[0], 'year'=>$d[1], 'staff_id'=>$_POST['staff']);
		$this->load->model('report_model');
		$data['report'] = $this->report_model->monthly($data);
		
		$this->load->model('staff_model');
		$data['hq'] = $this->staff_model->get_hq($data['staff_id']);
		
		foreach($data['hq'] as $row)
		{
			$desi = $row->designation_id;
		}
		
		$this->load->model('common_expense_model');
		$data['common']=$this->common_expense_model->getdata();
		
		
		$this->load->model('designation');
		$data['desi'] = $this->designation->get_selected_designation($desi);
		
		$data['title'] = 'Monthly Report';
		$data['menu'] = 'menu/admin_menu';
		
		$data['main_content'] = "report/view_monthly_report_print";
		$this->load->view("includes/common_template.php", $data);
		//print_r($data);
	}

	function view_daily()
	{
			$data['title'] = 'Daily Report';
		$data['menu'] = 'menu/admin_menu';
		//$this->load->model('report_model');
		//$data['desi'] = $this->designation->get_designation();
		$this->load->model('staff_model');
		$data['staff'] = $this->staff_model->getall();
		$data['main_content'] = "report/view_daily_report";
		
	
		
		
		
		$this->load->view("includes/common_template.php", $data);
		
	}
	
	
	
	
	function view_daily_report_print()
	{
	   $data= array('date'=>$_POST['date'], 'staff_id'=> $_POST['staff']);
	   $this->load->model('report_model');
	   $data['report'] = $this->report_model->daily($data);
	   
	   if(sizeof($data['report'])!=0)
	   {
		
	    $data['title'] = 'Monthly Report';
		$data['menu'] = 'menu/admin_menu';
	
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
		
		$data['main_content'] = "report/view_daily_report_print";
		$data['doctor']=$doctor;
	
		
		
		$this->load->view("includes/common_template.php", $data );
		
		}
		else{
			echo "No details.. please go back";
		
	
			}
	  
	  
	  

	}



	function staff_view_monthly_report_view_edit()
	{
				
		
		$d = explode("/",$_POST['date']); 
			
		$data =array('month'=>$d[0], 'year'=>$d[1], 'staff_id'=>$this->session->userdata("id"));
		$this->load->model('report_model');
		$data['report'] = $this->report_model->monthly($data);
		
		$this->load->model('staff_model');
		$data['hq'] = $this->staff_model->get_hq($data['staff_id']);
		
		foreach($data['hq'] as $row)
		{
			$desi = $row->designation_id;
		}
		
		
	
		
		$this->load->model('common_expense_model');
		$data['common']=$this->common_expense_model->getdata();
		
		
		$this->load->model('designation');
		$data['desi'] = $this->designation->get_selected_designation($desi);
		
		$data['title'] = 'Staff Monthly Report';
		$data['menu'] = 'menu/staff_menu';
		$data['main_content'] = "report/staff_view_daily_report_view_edit";
		
		
		$this->load->view("includes/common_template.php", $data);
	}
	

	function insert_leave()
	{
				
					
							
						
					
				
			
		
		$staff_id = $this->session->userdata('id');
		$data = array(
				'date'=>$_POST['date'],
				'place_id'=>$this->session->userdata('hqid'),
				'place'=>$this->session->userdata('hq'),
				'status'=>'leave',
				'leave_reason'=>$_POST['reason'],
				'staff_id'=>$staff_id
				
				);
		
		$this->load->model('report_model');
		$val = $this->report_model->insert_leave($data);
		
		$this->add_daily($val);
		
	}
	function update_leave()
	{
		$daily_id=$_POST['daily_id1'];
		//$staff_id = $this->session->userdata('id');
		$data = array(
				'date'=>$_POST['date'],
				'place_id'=>'',
				 'place'=>'',
				 'worked_with'=>0,
				 'doctors_visited'=>'',
				 'chemist'=>'',
				 'other_expense'=>0,
				 'expense_reason'=>'',
				 'station'=>'',
				 'km'=>'',
				'status'=>'leave',
				'leave_reason'=>$_POST['reason']
				
				
				);
		
		$this->load->model('report_model');
		$val = $this->report_model->update_leave($data, $daily_id);
		
		$data['title'] = 'Monthly Report';
		$data['menu'] = 'menu/staff_menu';
		//$this->load->model('report_model');
		//$data['desi'] = $this->designation->get_designation();
		$data['main_content'] = "report/staff_view_monthly_report";
		
	
		
		
		
		$this->load->view("includes/common_template.php", $data);
	}


}

