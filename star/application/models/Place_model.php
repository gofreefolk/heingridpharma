<?php class Place_model extends CI_Model
{
	function get_place_detail($id)
	{
		
		
		$this->db->where('id', $id);
				
		$query = $this->db->get('place');
	
		if($query->num_rows()>=1)
		{
			
			return $query->result();
		}
	}
	
	function get_km($data)
	{
		$this->db->select('km');
		$this->db->where('source', $data['source']);
		$this->db->where('destination', $data['destination']);
		$query = $this->db->get('km');
		if($query->num_rows()==1)
		{
			
			return $query->result();
		}
	}
	function update_km($data)
	{
		if(!$val=$this->db->insert('km', $data))
		{
			if($this->db->_error_number()==1062)
			{
				$this->db->where('source', $data['source']);
				$this->db->where('destination', $data['destination']);
				$val = $this->db->update('km', $data); 
				
				return $val;
			}
			
		}
		else{
			return $val;
		}
		
		//return $val;
	}
	function insert_place($data)
	{
		 
		$val = $this->db->insert('place', $data);
		if($this->db->_error_number()==1062)
		{
			return 1062;
			
		}
		return $val;
	}
	function get_hq()
	{
		
		$this->db->select('name, id');
		$this->db->where('hq', 'hq');
				
		$query = $this->db->get('place');
	
		if($query->num_rows()>=1)
		{
			
			return $query->result();
		}
	}
	function get_all()
	{
		$this->db->select('name, id');		
		$query = $this->db->get('place');
		if($query->num_rows()>=1)
		{
			return $query->result();
		}
	}
	function get_all_cols()
	{
		//$this->db->select('name, id');		
		$query = $this->db->get('place');
		if($query->num_rows()>=1)
		{
			return $query->result();
		}
	}
	function delete_place($place_id)
	{
		$this->db->where('id', $place_id);
		if(!$this->db->delete('place'))
		{
			echo $this->db->_error_message();
			die();
		} 
		
		
	}
}