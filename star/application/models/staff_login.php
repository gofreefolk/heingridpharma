<?php
class Staff_login extends CI_Model
{
	function validate()
	{
		$sql = "SELECT designation_id, hqname as hqid, (select place.name from place where place.id=hqname) as hqname, 
				(select district from place where place.id=hqname) as district, 
				staff_id  FROM staff_registration where email =? and password=?";
		
		$query=$this->db->query($sql, array($_POST['email'], $_POST['password']));	
		
		if($query->num_rows()==1)
		{
			return $query->result();
		}
		
		/*$this->db->where('email', $this->input->post('email'));
		$this->db->where('password', $this->input->post('password'));
		$query = $this->db->get('staff_registration');
		if($query->num_rows()==1)
		{
			return $query->result();
		}*/
	}
	
	function change()
	{
		$this->db->where('email', $this->input->post('email'));
		$this->db->where('password', $this->input->post('password'));
		$this->db->update('staff_registration', array("password" =>$this->input->post('new_pass')));
	}
}
