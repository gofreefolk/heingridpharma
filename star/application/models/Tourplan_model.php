<?php class Tourplan_model extends CI_Model {
	function get_tourplan($data) {
		$sql = "SELECT tour_date, place, (select name from place where place.id=tourplan.place) as place_name,
		station, hotel_lodge, staff_id, day, tourplan_id from tourplan where  month(tour_date)=? and
		year(tour_date)=?  and staff_id=?  order by tour_date asc";
		$query=$this->db->query($sql, array($data['month'], $data['year'], $data['staff_id']));
		if( $query->num_rows() == 0) {
			$this->create_tour($data);
			$sql = "SELECT * from tourplan where  month(tour_date)=? and year(tour_date)=?
					and staff_id=?  order by tour_date asc";
		
			$query=$this->db->query($sql, array($data['month'], $data['year'], $data['staff_id']));
			return $query->result();
		}
		else {
			return $query->result();
		}
	}
	function getbyid($tourplan_id)
	{
		$this->db->where("tourplan_id =", $tourplan_id);
		$val = $this->db->get('tourplan');
		return $val->result();
	}
	
	function create_tour($data)
	{
		$days = cal_days_in_month(CAL_GREGORIAN, $data['month'], $data['year']); // 31
		//echo "There were {$days} days in $data[month] $data[year]";
		//$value = a
		$val = array();
		for($i=1; $i<=$days; $i++)
		{
			$d = date($data['year'])."-".date($data['month']). "-". str_pad($i,2,'0', STR_PAD_LEFT);
			$d = strtotime($d); 
			$row = array('tour_date'=>date($data['year'])."-".date($data['month']). "-". str_pad($i,2,'0', STR_PAD_LEFT),
						'staff_id'=>$data['staff_id'],
						'day'=>date('D', $d)
						);
		array_push($val,$row);	
					
		}
		$this->db->insert_batch('tourplan', $val); 
		
 	}
	function update_tour($data, $tour_id)
	{
		$this->db->where('tourplan_id', $tour_id);
		$val = $this->db->update('tourplan', $data); 
		return $val;
	}
	
}