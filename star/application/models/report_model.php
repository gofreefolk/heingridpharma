<?php
class Report_model extends CI_Model
{
	function insert_daily($data)
	{
		if($val = $this->db->insert('daily', $data))
		{
			return $val;
		}
		else 
			{
				echo $this->db->_error_message();
				die();
			}
	}
	function delete_daily($id)
	{
		$this->db->where('daily_id', $id);
		$val = $this->db->delete('daily'); 
	}
	function update_daily($data, $id)
	{
		$this->db->where('daily_id', $id);
		$val = $this->db->update('daily', $data); 
		return $val;
	}
	function insert_leave($data)
	{
		if($val = $this->db->insert('daily', $data))
		{
			return 2;	
		}
		else 
			{
				echo $this->db->_error_message();
				die();
			}
	}

	function update_leave($data, $id)
	{
		$this->db->where('daily_id', $id);
			if($val = $this->db->update('daily', $data))
			 {
				return $val;
			 }
			else{
					echo $this->db->_error_message();
				die();
			}
	}
	function getdaily($data)
	{
		/*$this->db->where('daily_id', $data);
		$val = $this->db->get('daily');
		return $val->result();
		*/
		
		$sql = "Select date, place_id,(select name from place where place.id=daily.place_id) as place,
				(select district from place where place.id=daily.place_id) as district, 
				(select km.km from km where km.source=? and km.destination =daily.place_id ) as km, 
		worked_with, doctors_visited, chemist, other_expense, expense_reason, leave_reason, 
		daily_id from daily where daily_id=?";
		//$sql = "Select * from daily where date=? and staff_id=? ";
		
		if($query = $this->db->query($sql, array($this->session->userdata('hqid') ,$data)))
			return ($query->result());
		else 
		{
			echo $this->db->_error_message();
				die();
		}
		
	}
	function monthly($data)
	{
		 
$sql = "SELECT   date , max(km) as km, place_id,(select name from place where place.id=daily.place_id) as place, 
		group_concat(place) as conplace, worked_with, group_concat(doctors_visited) as doctors_visited,
		 chemist,sum(other_expense) as other_expense, station,  status,  leave_reason, staff_id, daily_id 
		  from daily where  month(date)=? and year(date)=?
			  and staff_id=? group by date order by date desc";
		$query=$this->db->query($sql, array($data['month'], $data['year'], $data['staff_id']));
		
		
		return ($query->result());
	}
	
	function daily($data)
	{
		$sql = "Select date, place_id,(select name from place where place.id=daily.place_id) as place, 
		worked_with, doctors_visited, chemist, station, km, status, leave_reason, 
		(select designation_name from designation where daily.worked_with=designation.designation_id) as dwith , 
		daily_id from daily where date=? and staff_id=? and status='work'";
		//$sql = "Select * from daily where date=? and staff_id=? ";
		
		$query = $this->db->query($sql, array($data['date'], $data['staff_id']));
		return ($query->result());
		
	}
}
