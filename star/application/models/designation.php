<?php class Designation extends CI_Model
{
	function insert_designation($data)
	{
		 
		
		if($val = $this->db->insert('designation', $data))
		{
			return $val;
		}
		else 
			{
				echo $this->db->_error_message();
				die();
			}
		
	}
	
	function update_designation($data, $id)
	{
		$this->db->where('designation_id', $id);
		if($val = $this->db->update('designation', $data)) 
			{
				return $val;
			}
			else 
			{
				echo $this->db->_error_message();
				die();
			}
	}
	function get_designation()
	{
		$this->db->where("designation_id <>", 1);
		$val = $this->db->get('designation');
		return $val->result();
	}
	function get_selected_designation($id)
	{
		$this->db->where("designation_id =", $id);
		if($val = $this->db->get('designation'))
		{
			return $val->result();
		}
		else 
			{
				echo $this->db->_error_message();
				die();
			}
	}

	
}
