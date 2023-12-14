<?php 
class Secondary extends Pharmacy
{
	function view_secondary_by_year()
	{
		$data['title'] = 'Secondary Sales';
		$data['menu'] = 'menu/staff_menu';
		//$this->load->model('report_model');
		//$data['desi'] = $this->designation->get_designation();
		$data['main_content'] = "secondary/view_secondary_by_year";
			$this->load->view("includes/common_template.php", $data);
	}
	
	function view($val=0)
	{
		$data['title']="Product Wise Secondary";
		$data['menu'] = 'menu/staff_menu';		
		
		$data['main_content'] = "secondary/view";  
		$this->load->view("includes/common_template.php", $data);
	}
	function add_product()
	{
		$data['title']="Product Wise Secondary";
		$data['menu'] = 'menu/staff_menu';		
		$this->load->model("product_model");
		$data['product']=$this->product_model->getall();
		
		
		$this->load->model("secondary_model");
		$data['secondary']=$this->secondary_model->get_by_staff();
		
		$data['main_content'] = "secondary/add_product";  
		$this->load->view("includes/common_template.php", $data);
		
	}
	
	function remove()
	{
		$data = array("pid"=>$_POST['product_id'],
					  "staff_id" => $this->session->userdata("id"),
					  "year" =>date('Y'));
					  
		
		$this->load->model("secondary_model");
		$val= $this->secondary_model->remove($data);
		if($val==1)
		{
			echo "Product is removed";
		}
		
	}
	function add()
	{
		$data = array("product_id"=>$_POST['product_id'],
					  "year" =>date('Y'),
					  "staff_id" => $this->session->userdata("id")
					  );
					  
		$this->load->model("secondary_model");
		$val= $this->secondary_model->add($data);
		if($val==1)
		{
			echo "Product is added";
		}
	}

function view_secondary()
{
	    $d["staff_id"] = $this->session->userdata("id");
		$d["year"]=$_POST['year'];
		$this->load->model('secondary_model');
		$data['report']=$this->secondary_model->get_secondary($d);
		
		
		
		
		
		//$this->load->model('secondary_model');
		$data['value']=$this->secondary_model->getvalue($d);
		
		$this->load->model('staff_model');
		$data['hq'] = $this->staff_model->get_hq($this->session->userdata('id'));
		
		foreach($data['hq'] as $row)
		{
			$desi = $row->designation_id;
		}
		$this->load->model('designation');
		$data['desi'] = $this->designation->get_selected_designation($desi);
		
		$data['title']="Secondary Sales";
		$data['menu'] = 'menu/staff_menu';
		$data['main_content'] = "secondary/view_secondary";
		$this->load->view("includes/common_template.php", $data);
}

function update()
	{
		$sec_id = $_POST['sec_id'];
		//echo "<br/>"."<br/>"."<br/>"."<br/>".$tourplan_id;	
		$this->load->model('secondary_model');
		$data['val']= $this->secondary_model->getbyid($sec_id);
		$data['title']="Update Secondary Sales";
		$data['menu'] = 'menu/staff_menu';
		$data['main_content'] = "secondary/update";
		$this->load->view("includes/common_template.php", $data);
	}
	
	function save_update()
	{
		
		$data = array(				
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
		$this->load->model('secondary_model');
		$val = $this->secondary_model->update_secondary($data, $_POST['sec_id']);
		$this->view_secondary_by_year();
	}
	
	function edit_value()
	{
		$value_id = $_POST['value'];
		$this->load->model('secondary_model');
		$data['value'] = $this->secondary_model->get_value_by_id($value_id);
		
		
		$data['title']="Update Secondary Sales";
		$data['menu'] = 'menu/staff_menu';
		$data['main_content'] = "secondary/update_value";
		$this->load->view("includes/common_template.php", $data);
		
	}
	function save_update_value()
	{
		$data = array(				
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
		$this->load->model('secondary_model');
		$val = $this->secondary_model->update_secondary_value($data, $_POST['value_id']);
		$this->view_secondary();
	}
	function view_staff()
	{
		$data['title'] = 'Secondary Sales';
		$data['menu'] = 'menu/admin_menu';
		//$this->load->model('report_model');
		//$data['desi'] = $this->designation->get_designation();
		$this->load->model('staff_model');
		$data['staff'] = $this->staff_model->getall();
		$data['main_content'] = "secondary/view_staff";
		
	
		
		
		
		$this->load->view("includes/common_template.php", $data);
	}
	function view_secondary_report()
	{
		$data =array('staff_id'=>$_POST['staff'], 'year'=>$_POST['year']);
		
		$this->load->model('secondary_model');
		$data['report'] = $this->secondary_model->get_secondary($data);
			
		$this->load->model('secondary_model');
		$data['value']=$this->secondary_model->getvalue($data);
		
		
		$this->load->model('staff_model');
		$data['hq'] = $this->staff_model->get_hq($data['staff_id']);
		
		foreach($data['hq'] as $row)
		{
			$desi = $row->designation_id;
		}
		$this->load->model('designation');
		$data['desi'] = $this->designation->get_selected_designation($desi);
		$data['title']="Secondary Sales";
		$data['menu'] = 'menu/admin_menu';
		$data['main_content'] = "secondary/view_secondary_report";
		$this->load->view("includes/common_template.php", $data);
		}
	
}