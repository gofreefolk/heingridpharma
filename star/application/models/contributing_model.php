<?php
class Contributing_model extends CI_Model
{
	function insert_doctor($data)
	{
		$val = $this->db->insert('contributing', $data);
		return $val;
	}
	function get_contributing($data, $year)
	{
		$this->db->where("staff_id",$data['staff_id']);
		$this->db->where("year",$year);
		$this->db->order_by("dr_name", "ASC");
		$val = $this->db->get('contributing');
		return $val->result();
	}
	function getbyid($con_id)
	{
		$this->db->where("contributing_id =", $con_id);
		$val = $this->db->get('contributing');
		return $val->result();
	}
	function update_contri($data, $con_id)
	{
		$this->db->where('contributing_id', $con_id);
		$val = $this->db->update('contributing', $data); 
		return $val;
	}
}