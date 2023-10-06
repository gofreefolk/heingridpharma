<?php
class Admin_staff_operation extends  Pharmacy
{
	function add_staff($val=0)
	{
		$data['title'] = 'New Staff';
		$data['menu'] = 'menu/admin_menu';
		$this->load->model('designation');
		$data['desi'] = $this->designation->get_designation();
		$data['main_content'] = "staff_operation/new_staff";
		
		$data['val']=$val;
		
		$this->load->model('place_model');		
		$data['hq']=$this->place_model->get_hq();
		
		$this->load->view("includes/common_template.php", $data);
		
	}
	
	function edit($val=0)
	{
		$data['title'] = 'New Staff';
		$data['menu'] = 'menu/admin_menu';
		$this->load->model('designation');
		$data['desi'] = $this->designation->get_designation();
		$this->load->model('staff_model');
		$data['staff'] = $this->staff_model->get_by_id($this->session->userdata('edit_user'));
		$data['main_content'] = "admin_operation/edit_staff";
		
		$data['val']=$val;
		
		$this->load->model('place_model');		
		$data['hq']=$this->place_model->get_hq();
		
		$this->load->view("includes/common_template.php", $data);
		
	}
	
	function add_daily_report($val=0)
	{
		$data['title'] = 'Admin Daily Report';
		$data['menu'] = 'menu/admin_menu';
		$this->load->model('designation');
		$data['desi'] = $this->designation->get_designation();
		$data['main_content'] = "admin_operation/add_daily_report";
		
		$data['val']=$val;
		
		
		
		$this->load->view("includes/common_template.php", $data);
	}
	
	function insert_staff()
	{
		
		//$filearr = explode(",",$hq);
		//$name = $filearr[0];
		//echo $name;  
		//$json = file_get_contents('https://maps.googleapis.com/maps/api/place/textsearch/json?query='.urlencode($name).'&sensor=false&key=AIzaSyDAvEVvpm38zF9HKub0Sw3b0cPzjZIO18E');
		//$json = file_get_contents('https://maps.googleapis.com/maps/api/place/textsearch/json?query=Kanjirappally,%20Kerala,%20India&sensor=false&key=AIzaSyAn-xhuZ0MIJldKYJaXxREhU-gFHnJLy8o');
		//$obj = json_decode($json);
		//$place_id = $obj->results[0]->place_id;
		
		
		//$json = file_get_contents('https://maps.googleapis.com/maps/api/place/details/json?placeid='.$place_id.'&key=AIzaSyAXlOZIKU3jaGGzvtX-i2iPG9LBpiKmIAY');
	///	$obj = json_decode($json);
		
		//$len = sizeof($obj->result->address_components);
		//$district = $obj->result->address_components[$len-3]->long_name;
		//$state = $obj->result->address_components[$len-2]->long_name; 
		//$country=$obj->result->address_components[$len-1]->long_name;
		
		/*
		$district = $obj->result->address_components[1]->long_name;
		$state = $obj->result->address_components[2]->long_name; 
		$country=$obj->result->address_components[3]->long_name;*/
		//echo $district. " ". $state. " ". $country;
		$data = array(
				 'name'=>$_POST['name'],
				 'doj'=>$_POST['doj'],
				 'designation_id'=>$_POST['designation'],
				 'email'=>$_POST['email'],
				 'password'=>'password',
				 'hqname'=>$_POST['hq']
				);
		$this->load->model('staff_model');
		$val = $this->staff_model->insert_staff($data);
		$this->add_staff($val);
	}


   function update_staff()
   {
   //	$hq = $_POST['hq'];
	//	$filearr = explode(",",$hq);
		//$name = $filearr[0];
		//echo $name;  
		//$json = file_get_contents('https://maps.googleapis.com/maps/api/place/textsearch/json?query='.urlencode($name).'&sensor=false&key=AIzaSyAY0Ok1BfrB_xYnFKEps8D0DVbF5mrjjVQ');
		//$json = file_get_contents('https://maps.googleapis.com/maps/api/place/textsearch/json?query=Kanjirappally,%20Kerala,%20India&sensor=false&key=AIzaSyAn-xhuZ0MIJldKYJaXxREhU-gFHnJLy8o');
		//$obj = json_decode($json);
	///	$place_id = $obj->results[0]->place_id;
		
		
		//$json = file_get_contents('https://maps.googleapis.com/maps/api/place/details/json?placeid='.$place_id.'&key=AIzaSyA5LFCoew7NCaKLkO4LXFP_DU8pM4P90yk');
		//$obj = json_decode($json);
		
		//$len = sizeof($obj->result->address_components);
		//$district = $obj->result->address_components[$len-3]->long_name;
		//$state = $obj->result->address_components[$len-2]->long_name; 
		//$country=$obj->result->address_components[$len-1]->long_name;
		
		/*
		$district = $obj->result->address_components[1]->long_name;
		$state = $obj->result->address_components[2]->long_name; 
		$country=$obj->result->address_components[3]->long_name;*/
		//echo $district. " ". $state. " ". $country;
		$data = array(
				 'name'=>$_POST['name'],
				 'doj'=>$_POST['doj'],
				 'designation_id'=>$_POST['designation'],
				 'email'=>$_POST['email'],
				 'password'=>'password',
				 'hqname'=>$_POST['hq'],
				);
		$this->load->model('staff_model');
		$val = $this->staff_model->update_staff($data, $this->session->userdata('edit_user'));
		$this->edit($val);
   }
function getdoctor()
	{
		$hq = $this->input->post('place');
		$filearr = explode(",",$hq);
		$name = $filearr[0];
		$json = file_get_contents('https://maps.googleapis.com/maps/api/place/textsearch/json?query='.urlencode($name).'&sensor=false&key=AIzaSyBJMee9MX0G56m5-at8PfBCPZsf5riCIoU');
		
		$obj = json_decode($json);
		$place_id = $obj->results[0]->place_id;
		//echo $place_id;
		$data['name']=$name;
		$data['place_id']=$place_id;
		
		$json = file_get_contents('https://maps.googleapis.com/maps/api/place/details/json?placeid='.$place_id.'&key=AIzaSyDgBlbDxumhomgELKdItO_gX_21-GXd1xc');
		$obj = json_decode($json);
		$len = sizeof($obj->result->address_components);
		$district = $obj->result->address_components[$len-3]->long_name;
		$state = $obj->result->address_components[$len-2]->long_name; 
		$country=$obj->result->address_components[$len-1]->long_name;
		$data['district']=$district;
		$data['state']=$state;
		$data['country']=$country;
		
		
		$station='';
		$km='';
		$staff_id = $this->session->userdata('edit_user');
		$this->load->model('staff_model');
		$staff_detail=$this->staff_model->get_hq($staff_id);
		foreach($staff_detail as $row)
		{
			$myhqid = $row->hqid;
			$myhq = $row->hqname;
			$mydistrict = $row->district;
			
		}
		
		
		
		
		
		
		
		if($myhqid==$place_id)
			$data['station']='HQ';
		else if($data['district']==$mydistrict)
			$data['station']="ExHQ";
		else
			$data['station']="OS";
		
		
		
			
	$from = urlencode($myhq);
	$to =  urlencode($name);
	//echo $myhq. " - ".$hq;
	//die();

		 $distance = file_get_contents("http://maps.googleapis.com/maps/api/distancematrix/json?origins=$from&destinations=$to");
 $decode = json_decode($distance);
 // echo "Select,";
 //foreach ($city->Data as $value) {
     if(isset($decode->rows[0]->elements[0]->distance->text))
	 {
	 $km= $decode->rows[0]->elements[0]->distance->text;
	 $km=substr($km, 0, strrpos($km, ' '));
	 $data['km']=$km;
	 }
		
		
	
		/*echo $district;
		echo $state;
		echo $country;
		*/
		$this->load->model('doctor_model');
		$doctor=$this->doctor_model->getdoctor($place_id);
		$data['doctor']=$doctor;
		//echo json_encode($doctor);
		
		echo json_encode($data);
		//print_r($doctor);
		
	}
function insert_daily()
	{
		
		$staff_id = $this->session->userdata('edit_user');
		$hq = $this->input->post('work');
		$filearr = explode(",",$hq);
		$name = $filearr[0];
	
		
		$data = array(
				'date'=>$_POST['date'],
				'place_id'=>$_POST['place_id'],
				'place'=>$name,
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
		
		$this->add_daily_report($val);
	}
	
	function insert_leave()
	{
		$staff_id = $this->session->userdata('edit_user');
		$data = array(
				'date'=>$_POST['date'],
				'status'=>'leave',
				'leave_reason'=>$_POST['reason'],
				'staff_id'=>$staff_id
				
				);
		
		$this->load->model('report_model');
		$val = $this->report_model->insert_leave($data);
		
		$this->add_daily_report($val);
		
	}
	
}
