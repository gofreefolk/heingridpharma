<?php 
class Doctor extends Pharmacy
{
	function add_doctor($val=0)
	{
		$data['val']=$val;
		$data['title']="Add Doctor";
		$data['menu'] = 'menu/admin_menu';
		$data['main_content'] = "doctor/add_doctor";
		$this->load->model('place_model');		
		$data['place']=$this->place_model->get_all();
		$this->load->view("includes/common_template.php", $data);
	}
	
	function add_doctor_staff($val=0)
	{
		$data['val']=$val;
		$data['title']="Add Doctor";
		$data['menu'] = 'menu/staff_menu';
		$data['main_content'] = "doctor/add_doctor_staff";
		$this->load->model('place_model');		
		$data['place']=$this->place_model->get_all();	
		$this->load->view("includes/common_template.php", $data);
	}
	
	function insert_doctor_staff()
	{
		
		//$hq = $_POST['hq'];
		//$filearr = explode(",",$hq);
		//$name = $filearr[0];
		//echo $hq;  
		//$json = file_get_contents('https://maps.googleapis.com/maps/api/place/textsearch/json?query='.urlencode($name).'&sensor=false&key=AIzaSyBWYpZ_ioPMxH9lWZchZBcUfJnfnGdODpw');
		//$json = file_get_contents('https://maps.googleapis.com/maps/api/place/textsearch/json?query=Kanjirappally,%20Kerala,%20India&sensor=false&key=AIzaSyAn-xhuZ0MIJldKYJaXxREhU-gFHnJLy8o');
		//$obj = json_decode($json);
		//$place_id = $obj->results[0]->place_id;
		
		
		//$json = file_get_contents('https://maps.googleapis.com/maps/api/place/details/json?placeid='.$place_id.'&key=AIzaSyDqULuR5DJvWZcduwdnA5SjJPnJDyw9xTc');
		//$obj = json_decode($json);
		//$len = sizeof($obj->result->address_components);
		//$district = $obj->result->address_components[$len-3]->long_name;
		//$state = $obj->result->address_components[$len-2]->long_name; 
		//$country=$obj->result->address_components[$len-1]->long_name;
		//echo $district. " ". $state. " ". $country;
		//echo $_POST['specialized'];
		
		
		
		
		
		
		$data = array(
				 'name'=>$_POST['name'],
				 'mobile'=>$_POST['mobile'],
				 'email'=>$_POST['email'],
				 'firm'=>$_POST['firm'],
				 'specialized'=>$_POST['specialized'],
				 'place_id'=>$_POST['hq'],
				 'added_by'=>$this->session->userdata("id")
				);
		$this->load->model('doctor_model');
		$val = $this->doctor_model->insert_doctor($data);
		$this->add_doctor_staff($val);
		
	}
	
	function insert_doctor()
	{
		
		/*$hq = $_POST['hq'];
		$filearr = explode(",",$hq);
		$name = $filearr[0];
		//echo $hq;  
		$json = file_get_contents('https://maps.googleapis.com/maps/api/place/textsearch/json?query='.urlencode($name).'&sensor=false&key=AIzaSyBck7_6JR1HHosbWsuA0YWyX0wdDo_TdmA');
		//$json = file_get_contents('https://maps.googleapis.com/maps/api/place/textsearch/json?query=Kanjirappally,%20Kerala,%20India&sensor=false&key=AIzaSyAn-xhuZ0MIJldKYJaXxREhU-gFHnJLy8o');
		$obj = json_decode($json);
		$place_id = $obj->results[0]->place_id;
		
		
		$json = file_get_contents('https://maps.googleapis.com/maps/api/place/details/json?placeid='.$place_id.'&key=AIzaSyC6vLhb7pau7KYI9mL1M4eomMpQDZBdysU');
		$obj = json_decode($json);
		$len = sizeof($obj->result->address_components);
		$district = $obj->result->address_components[$len-3]->long_name;
		$state = $obj->result->address_components[$len-2]->long_name; 
		$country=$obj->result->address_components[$len-1]->long_name;
		
	*/
		
		$data = array(
				 'name'=>$_POST['name'],
				 'mobile'=>$_POST['mobile'],
				 'email'=>$_POST['email'],
				 'firm'=>$_POST['firm'],
				 'specialized'=>$_POST['specialized'],
				 'place_id'=>$_POST['hq'],
				 'added_by'=>$this->session->userdata("id")
				);
		$this->load->model('doctor_model');
		$val = $this->doctor_model->insert_doctor($data);
		$this->add_doctor($val);
			
		
	}
}
