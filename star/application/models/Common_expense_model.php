<?php class Common_expense_model extends CI_Model
{
	/*function insert_common($data)
	{
		 
		$val = $this->db->insert('designation', $data);
		
		return $val;
	}*/
	function getdata()
	{
		//$this->db->where("designation_id <>", 1);
		$val = $this->db->get('common');
		return $val->result();
	}

}
