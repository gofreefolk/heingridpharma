<?php
class Staff_model extends CI_Model
{
	function get_staff()
	{
			
		$sql = "SELECT designation_id, (select place.name from place where place.id=hqname) as hqname, 
				(select district from place where place.id=hqname) as district, 
				staff_id  FROM staff_registration where email =? and password=?";
		$query=$this->db->query($sql, array($_POST['email'], $_POST['password']));	
		//$this->db->where('email', $this->input->post('email'));
		//$this->db->where('password', $this->input->post('password'));
		//$query = $this->db->get('staff_registration');
		if($query->num_rows()==1)
		{
			print_r($query->result()); die();
			//return $query->result();
		}
	}
	
	function getall()
	{
			
			
//		$this->db->where('staff_id !=', 1);
		$sql = "SELECT name, email,  (select place.name from place where place.id=hqname) as hqname,
				staff_id  FROM staff_registration where staff_id!=1";
		$query = $this->db->query($sql);
			return $query->result();
		
	}
	function get_hq($staff)
	{
		$sql = "SELECT name, email,  (select place.name from place where place.id=hqname) as hqname, designation_id,
				staff_id  FROM staff_registration where staff_id=?";
		$query = $this->db->query($sql, $staff);
		if($query->num_rows()==1)
		{
			return $query->result();
		}
		//$this->db->where('staff_id', $staff);
		
	//	$query = $this->db->get('staff_registration');
		
	}
	
	function insert_staff($data)
	{
		$val = $this->db->insert('staff_registration', $data);
		return $val;
	}
	function update_staff($data, $id)
	{
		$this->db->where('staff_id', $id);
		$val=$this->db->update('staff_registration', $data);
		return $val;
	}
	function get_by_id($id)
	{
		$this->db->where('staff_id', $id);
		
		$query = $this->db->get('staff_registration');
			return $query->result();
	}
}
