 <?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_staff_registration extends MY_Model
{
	protected $_table = 'staff_registration';
	protected $primary_key = 'staff_id';
	protected $return_type = 'array';

	protected $after_get = array('remove_sensitive_data');
	
	protected function remove_sensitive_data($login)
	{
		unset($login['address']);
		unset($login['dob']);
		unset($login['gender']);
		unset($login['phone']);
		unset($login['photo']);
		unset($login['doj']);
		unset($login['email']);
		unset($login['password']);
		unset($login['hqid']);
		unset($login['district']);
		unset($login['state']);
		unset($login['country']);
		unset($login['dol']);
		unset($login['status']);
				
		return $login;
	}
	
	/*protected $before_create = array('prep_data');
	protected $before_update = array('update_timestamp');
	
	
	
	protected function prep_data($student)
	{
		$student['password'] = md5($student['password']);
		$student['ip_address'] = $this->input->ip_address();
		$student['created_timestamp'] = date('Y-m-d H:i:s');
		return $student;
	}
	
	protected function update_timestamp($student)
	{
		$student['updated_timestamp'] = date('Y-m-d H:i:s');
		return $student;
	}*/
}
