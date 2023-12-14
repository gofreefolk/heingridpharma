<?php 
class Tourplan extends Pharmacy
{
	function view_month()
	{
			
		$data['title']="Tour plan";
		$data['menu'] = 'menu/staff_menu';
		$data['main_content'] = "tour_plan/view_month";
		$this->load->view("includes/common_template.php", $data);
	}
	
	function getbyid()
	{
		$tourplan_id = $this->input->post('tour_id');		
		$this->load->model('tourplan_model');
		$val= $this->tourplan_model->getbyid($tourplan_id);
		//print_r($val);
		echo json_encode($val);
	}
	function update()
	{
		$tourplan_id = $_POST['tour_id'];
		//echo "<br/>"."<br/>"."<br/>"."<br/>".$tourplan_id;	
		$this->load->model('tourplan_model');
		$data['val']= $this->tourplan_model->getbyid($tourplan_id);
		$this->load->model('place_model');		
		$data['place']=$this->place_model->get_all();
		$data['title']="Update tour plan";
		$data['menu'] = 'menu/staff_menu';
		$data['main_content'] = "tour_plan/update";
		
		
		$this->load->view("includes/common_template.php", $data);
	} 
	function save_update()
	{
		$filearr = explode(",",$_POST['place']);
		$name = $filearr[0];
		$data = array(
				 'place'=>$name,
				 'station'=>$_POST['station'],
				 'hotel_lodge'=>$_POST['phone']
				 
				);
		$this->load->model('tourplan_model');
		$val = $this->tourplan_model->update_tour($data, $_POST['tourplan_id']);
		$this->create_or_view_tourplan(1);
	}
	 function getstation()
	 {
	 	$this->load->model('place_model');		
		$data['details']=$this->place_model->get_place_detail($_POST['place']);	
		foreach($data['details'] as $value)
		{
			$detail['district']=$value->district;
			$detail['place']=$value->name;
		}
		
			
		if($this->session->userdata('hq')==$detail['place'])
			{
				$detail['station']='HQ';
			}
		else if($this->session->userdata('district')==$detail['district'] )
		{
			$detail['station']='ExHQ';
		}
		else
			 {
				$detail['station']='OS';			
			}
			 echo json_encode($detail);	
	 }
	 
	function create_or_view_tourplan($d="")
	{
			if($d=="")
			{	
			$d = explode("/",$_POST['date']); 
		
			$date = array("tour_date"=>$_POST['date']);
			$this->session->set_userdata($date);
			}
			else
			 {
				$d = explode("/",$this->session->userdata('tour_date'));
			}
		$data =array('month'=>$d[0], 'year'=>$d[1], 'staff_id'=>$this->session->userdata('id'));
		
		$this->load->model("tourplan_model");
		$data['report']=$this->tourplan_model->get_tourplan($data);
		
		$this->load->model('staff_model');
		$data['hq'] = $this->staff_model->get_hq($data['staff_id']);
		
		foreach($data['hq'] as $row)
		{
			$desi = $row->designation_id;
		}
		$this->load->model('designation');
		$data['desi'] = $this->designation->get_selected_designation($desi);
		
		$data['title']="Toue plan";
		$data['menu'] = 'menu/staff_menu';
		$data['main_content'] = "tour_plan/view_tourplan";
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
		$data['main_content'] = "tour_plan/view_staff";
		
	
		
		
		
		$this->load->view("includes/common_template.php", $data);
	}
	function view_tourplan_report()
	{
		
		$d = explode("/",$_POST['date']); 
			
		$data =array('month'=>$d[0], 'year'=>$d[1], 'staff_id'=>$_POST['staff']);
		$this->load->model('tourplan_model');
		$data['report'] = $this->tourplan_model->get_tourplan($data);
		
		$this->load->model('staff_model');
		$data['hq'] = $this->staff_model->get_hq($data['staff_id']);
		
		foreach($data['hq'] as $row)
		{
			$desi = $row->designation_id;
		}
		$this->load->model('designation');
		$data['desi'] = $this->designation->get_selected_designation($desi);
		$data['title'] = 'Tour Plan';
		$data['menu'] = 'menu/admin_menu';
		$data['main_content'] = "tour_plan/view_tourplan_admin";
		$this->load->view("includes/common_template.php", $data);
	}
}
