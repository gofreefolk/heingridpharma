<?php
class News_model extends CI_Model
{
	function insert_news($data)
	{
		$val = $this->db->insert('notification', $data);
		return $val;
	}
	function getall()
	{
		$this->db->order_by("id", "desc");
		$val = $this->db->get('notification',1);
		return $val->result();
	}
}
