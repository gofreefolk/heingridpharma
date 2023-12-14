<?php
class Doctor_model extends CI_Model
{
	function getdoctor($place_id)
	{
			
			
		$this->db->where('place_id', $place_id);
		//$this->db->where('specialized !=', 'chemist');
		$this->db->select('name, specialized, doctor_id');		
		$query = $this->db->get('doctor');
			return $query->result();
		
	}
	function getdata($doctor_id)
	{
		$this->db->where('doctor_id', $doctor_id);
		$this->db->select('name, specialized, doctor_id');
		$query=$this->db->get('doctor');
		return $query->result();
	}
	
	function insert_doctor($data)
	{
		
		if($val = $this->db->insert('doctor', $data)){
			return $val;	
		}
		else 
			{
				echo $this->db->_error_message();
				die();
			}
	}
}
