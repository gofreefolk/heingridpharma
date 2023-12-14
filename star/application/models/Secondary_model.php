<?php class secondary_model extends CI_Model
{
	function get_by_staff()
	{
	
	$staff_id=$this->session->userdata("id");
	$year = date('Y');
	$sql = "select * from secondary where staff_id=? and year = ?";
	$query=$this->db->query($sql, array($staff_id, $year));
		
			return ($query->result());
		
	}
	function remove($data)
	{
		$this->db->where('staff_id', $data['staff_id']);
		$this->db->where('year', $data['year']);
		$this->db->where('product_id', $data['pid']);
		$val=$this->db->delete('secondary');
		 return $val;
	}
	function add($data)
	{
	 $val=$this->db->insert('secondary', $data);
	 return $val; 
	}
	
	function get_secondary($d)
	{
	//	$staff_id=$this->session->userdata("id");
	//$year = date('Y');
	$sql = "select secondary.*, (select product_name from product where secondary.product_id=product_id) as pname from secondary where staff_id=? and year = ?";
	$query=$this->db->query($sql, array($d['staff_id'], $d['year']));
		
			return ($query->result());
	}  
	function getbyid($sec_id)
	{
		$sql = "select secondary.*, (select product_name from product where secondary.product_id=product_id) as pname from secondary where secondary_id=?";
		$query=$this->db->query($sql, array($sec_id));
	
		return ($query->result());
	}
	function update_secondary($data, $sec_id)
	{
		$this->db->where('secondary_id', $sec_id);
		$val = $this->db->update('secondary', $data); 
		return $val;
	}

	function getvalue($d)
	{
		$sql = "SELECT * from secondary_value where  staff_id=? and year=?";
		
		
			$query=$this->db->query($sql, array($d['staff_id'], $d['year']));
		if($query->num_rows==0)
		{
			$this->create_value($d);
			 $sql = "SELECT * from secondary_value where  staff_id=? and year=?";
		
		
			$query=$this->db->query($sql, array($d['staff_id'], $d['year']));
			return ($query->result());
		}
		else
		{
			return ($query->result());
		}
		
	} 
	function create_value($d)
	{
		$data = array(
						'staff_id'=>$d['staff_id'],
						'year'=>$d['year']
					 );
		$this->db->insert('secondary_value',$data);			 
	}
	function get_value_by_id($value_id)
	{
		
		$this->db->where('value_id', $value_id);
		$val = $this->db->get('secondary_value'); 
		return $val->result();
		
	}
	function update_secondary_value($data, $value_id)
	{
		$this->db->where('value_id', $value_id);
		$val = $this->db->update('secondary_value', $data); 
		return $val;
	}
}
		
	