<?php 
class Contributing extends Pharmacy
{
	function view_by_year()
	{
		$data['title'] = 'Doctors Contribution';
		$data['menu'] = 'menu/staff_menu';
		//$this->load->model('report_model');
		//$data['desi'] = $this->designation->get_designation();
		$data['main_content'] = "contributing/view_by_year";
			$this->load->view("includes/common_template.php", $data);
	}
	
	function view()
	{
		$data['title']="Contibuting";
		$data['menu'] = 'menu/staff_menu';
		$data['main_content'] = "contributing/view";  
		$this->load->view("includes/common_template.php", $data);
	}
	function view_staff()
	{
		$data['title'] = 'Tour Plan';
		$data['menu'] = 'menu/admin_menu';
		//$this->load->model('report_model');
		//$data['desi'] = $this->designation->get_designation();
		$this->load->model('staff_model');
		$data['staff'] = $this->staff_model->getall();
		$data['main_content'] = "contributing/view_staff";
		
	
		
		
		
		$this->load->view("includes/common_template.php", $data);
	}
	
	function add_doctor($val=0)
	{
			$data['val']=$val;
		$data['title']="Add Doctor";
		$data['menu'] = 'menu/staff_menu';
		$data['main_content'] = "contributing/add_doctor";
		$this->load->view("includes/common_template.php", $data);
	}
	
	function insert_doctor()
	{
		
		$data = array(
				 'dr_name'=>$_POST['name'],
				 'product'=>$_POST['product'],
				 'year'=>$_POST['year'],
				 'staff_id'=>$this->session->userdata('id')
				);
		$this->load->model('contributing_model');
		$val = $this->contributing_model->insert_doctor($data);
		$this->add_doctor($val);
	}
	function view_contributing($year=null)
	{
		$data =array('staff_id'=> $this->session->userdata('id'));
		$this->load->model('contributing_model');
		if($year==null)
		$year = $_POST['year'];
		$data['report']=$this->contributing_model->get_contributing($data, $year);
		
		$this->load->model('staff_model');
		$data['hq'] = $this->staff_model->get_hq($this->session->userdata('id'));
		
		foreach($data['hq'] as $row)
		{
			$desi = $row->designation_id;
		}
		$this->load->model('designation');
		$data['desi'] = $this->designation->get_selected_designation($desi);
		
		$data['title']="Contributing list";
		$data['menu'] = 'menu/staff_menu';
		$data['main_content'] = "contributing/view_contributing";
		$this->load->view("includes/common_template.php", $data);
	}
	function update()
	{
		$con_id = $_POST['con_id'];
		//echo "<br/>"."<br/>"."<br/>"."<br/>".$tourplan_id;	
		$this->load->model('contributing_model');
		$data['val']= $this->contributing_model->getbyid($con_id);
		$data['title']="Update Contributing List";
		$data['menu'] = 'menu/staff_menu';
		$data['main_content'] = "contributing/update";
		$this->load->view("includes/common_template.php", $data);
	}
	function save_update()
	{
		
		$data = array(
				 'dr_name'=>$_POST['dr_name'],
				 'product'=>$_POST['product'],
				 'apr'=>$_POST['apr'],
				 'may'=>$_POST['may'],
				 'jun'=>$_POST['jun'],
				 'jul'=>$_POST['jul'],
				 'aug'=>$_POST['aug'],
				 'sep'=>$_POST['sep'],
				 'oct'=>$_POST['oct'],
				 'nov'=>$_POST['nov'],
				 'dece'=>$_POST['dec'],
				 'jan'=>$_POST['jan'],
				 'feb'=>$_POST['feb'],
				 'mar'=>$_POST['mar']
				);
		$this->load->model('contributing_model');
		$val = $this->contributing_model->update_contri($data, $_POST['con_id']);
		$this->view_contributing($_POST['year']);
	}
	
	function view_contributing_report()
	{
		
			
		$data =array('staff_id'=>$_POST['staff']);
		$year = $_POST['year'];
		$this->load->model('contributing_model');
		$data['report'] = $this->contributing_model->get_contributing($data, $year);
		
		$this->load->model('staff_model');
		$data['hq'] = $this->staff_model->get_hq($data['staff_id']);
		
		foreach($data['hq'] as $row)
		{
			$desi = $row->designation_id;
		}
		$this->load->model('designation');
		$data['desi'] = $this->designation->get_selected_designation($desi);
		$data['title'] = 'Doctors Contributing';
		$data['menu'] = 'menu/admin_menu';
		$data['main_content'] = "contributing/view_contributing_report";
		$this->load->view("includes/common_template.php", $data);
	}
}