<?php 
class Retrive extends Pharmacy
{
	function get_station_km_doctors()
	{
		//echo $_POST['place'];
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
			 
			$temp['source']=$this->session->userdata('hqid');
			$temp['destination']=$_POST['place'];
		$data['details']=$this->place_model->get_km($temp);
	//	print_r($data['details']);	 
	 	if(isset($data['details']))
		{
			foreach($data['details'] as $value)
				{
				$detail['km']=$value->km;
		
				}
		}
		else
		 {
			$detail['km']='';
		}
				
		$this->load->model('doctor_model');		
		$data['details']=$this->doctor_model->getdoctor($_POST['place']);		
		if(isset($data['details']))
		{
		$detail['doctor']=$data['details'];
		
			
		}	
		else 
		{
			$detail['doctor']="";
		}														
		echo json_encode($detail);
	}
		
	function getdoctor()
	{
		$place_id = $this->input->post('place');
	/*	$filearr = explode(",",$hq);
		$name = $filearr[0];
		$json = file_get_contents('https://maps.googleapis.com/maps/api/place/textsearch/json?query='.urlencode($name).'&sensor=false&key=AIzaSyBT0k8cNvBpTPb5XQ579xAujLUqe7iDknY');
		
		$obj = json_decode($json);
		$place_id = $obj->results[0]->place_id;
		//echo $place_id;
		$data['name']=$name;
		$data['place_id']=$place_id;
		
		$json = file_get_contents('https://maps.googleapis.com/maps/api/place/details/json?placeid='.$place_id.'&key=AIzaSyCthl-SlVre_EYBK6FnctXQR6BvN4pJZ4k');
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
		$staff_id = $this->session->userdata('id');
		$myhqid = $this->session->userdata('hqid');
		$myhq = $this->session->userdata('hq');
		$mydistrict = $this->session->userdata('district');
		
		
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
	function station()
	{
		
	}
	
}
