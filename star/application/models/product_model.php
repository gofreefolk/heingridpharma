<?php class Product_model extends CI_Model
{
	function save_product($data)
	{
		 
		$val = $this->db->insert('product', $data);
		
		return $val;
	}
	function get_product_by_current_year()
	{
		$sql = "SELECT  * FROM product WHERE   YEAR(pdate) = YEAR(CURDATE()) ";
		$val = $this->db->query($sql);
		return $val->result();
		
	}
	function getall()
	{
		$sql = "SELECT  * FROM product order by product_name ASC  ";
		$query = $this->db->query($sql);
		return $query->result();
	}
	
}