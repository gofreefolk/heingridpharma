<?php 
class Admin_operations extends Pharmacy
{
	function set_km($val=0)
	{
		$data['val']=$val;
		$data['title']="Set Kilometer";
		$data['menu']= 'menu/admin_menu';
		$data['main_content']="place/set_km";
		$this->load->model('place_model');		
		$data['source']=$this->place_model->get_hq();				
		$data['destination']=$this->place_model->get_all();
		
		$this->load->view("includes/common_template.php", $data);
	}
	function get_km()
	{
		$data = array('source'=>$_POST['source'],
					  'destination'=>$_POST['destination']					 	
					 );
		$this->load->model('place_model');
		$val=$this->place_model->get_km($data);
		if(isset($val))
		{
			foreach($val as $value)
			{
				$data['km']=$value->km;
			}
		}
		else {
			$data['km']="";
		}
        echo json_encode($data);
	}
		
	function update_km()
	{
		$data = array('source'=>$_POST['source'],
					  'destination'=>$_POST['destination'],
					  'km'=>$_POST['km'] 		
					 );
		$this->load->model('place_model');
		$val=$this->place_model->update_km($data);
		$this->set_km($val);
	}
	function add_place($val=0)
	{
		$data['val']=$val;
		$data['title']="Add Place";
		$data['menu']= 'menu/admin_menu';
		$data['main_content']="place/add_place";
		$this->load->view("includes/common_template.php", $data);
	}
	function insert_place()
	{
		$data = array('name'=>$this->input->post('name'),
					  'district'=>$this->input->post('district'),
					  
					   'hq'=>$this->input->post('hq') ? $this->input->post('hq') : 0,
					
					 );
		$this->load->model('place_model');
		$val=$this->place_model->insert_place($data);
		
		$this->add_place($val);
	}
	
	function view_place()
	{
		$this->load->model('place_model');
		$data['place']=$this->place_model->get_all_cols();
		$data['val'] = 0;
		
		$data['title']="Places";
		$data['menu'] = 'menu/admin_menu';
		$data['main_content'] = "place/view_place";
		$this->load->view("includes/common_template.php", $data);
	}
	function delete_place()
	{
		$this->load->model('place_model');
		$val=$this->place_model->delete_place($_POST['place_id']);
		$this->view_place();
		
	}
	function add_designation($val=0)
	{
		$data['val']=$val;
		$data['title']="Add Designation";
		$data['menu'] = 'menu/admin_menu';
		$data['main_content'] = "admin_operation/add_designation";
		$this->load->view("includes/common_template.php", $data);
	}
	
	function edit_designation()
	{
		$desi_id = $_POST['desi_id'];
		
		$this->load->model('designation');
		$data['designation']=$this->designation->get_selected_designation($desi_id);
		$data['val'] = 0;
		
		$data['title']="Update Designation";
				$data['menu'] = 'menu/admin_menu';
				$data['main_content'] = "admin_operation/update_designation";
				$this->load->view("includes/common_template.php", $data);
			
	}
	
	
	function update_designation()
	{
		$desi_id = $_POST['desi_id'];
	
		
		
		$data = array('designation_name'=>$this->input->post('designation'),
					  'basic_pay'=>$this->input->post('basic_pay'),
					  'details'=>$this->input->post('details'),
					   'hq'=>$this->input->post('hq'),
					   'exhq'=>$this->input->post('exhq'),
					   'os'=>$this->input->post('os'),
					   'other_expense'=>$this->input->post('other_expense')	
					 );
					
		$this->load->model('designation');
		$val=$this->designation->update_designation($data, $desi_id);
		$this->view_designation();
		
		
	}
	
	function view_designation()
	{
		$this->load->model('designation');
		if($val = $this->designation->get_designation())
		{
			
			$data['designation_details']=$val;
			
			
		}	
		
		$data['title']="View Designation";
		$data['menu'] = 'menu/admin_menu';
		$data['main_content'] = "admin_operation/view_designation";
		$this->load->view("includes/common_template.php", $data);
		
	}
	
	function view_selected_designation()
	{
		if($this->uri->segment(3))
		{
			$designation_id = $this->uri->segment(3);
			$this->load->model('designation');
			$val=$this->designation->get_selected_designation($designation_id);
			
			
				$data['selected_designation_detail']=$val;
				$data['title']="Update Designation";
				$data['menu'] = 'menu/admin_menu';
				$data['main_content'] = "admin_operation/update_designation";
				$this->load->view("includes/common_template.php", $data);
			
		}
		else
		 {
			$this->view_designation();
		}
	}
	function insert_designation()
	{
		$data = array('designation_name'=>$this->input->post('designation'),
					  'basic_pay'=>$this->input->post('basic_pay'),
					  'details'=>$this->input->post('details'),
					   'hq'=>$this->input->post('hq'),
					   'exhq'=>$this->input->post('exhq'),
					   'os'=>$this->input->post('os'),
					   'other_expense'=>$this->input->post('other_expense')	
					 );
					
		$this->load->model('designation');
		$val=$this->designation->insert_designation($data);
		$this->add_designation($val);
	}
}