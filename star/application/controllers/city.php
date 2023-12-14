<?php 

class City extends Pharmacy
{
	function add_city()
	{
		$data['title']="Add-City";
		$data['menu']='menu/admin_menu';
		$data['main_content']="location/add_city";
		$this->load->view('includes/common_template', $data);
	}
	function update_city()
	{
		
	}
	function view_city()
	{
		
	}
	
}
