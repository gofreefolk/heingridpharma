 <?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_designation extends MY_Model
{
	protected $_table = 'designation';
	protected $primary_key = 'designation_id';
	protected $return_type = 'array';

	protected $after_get = array('remove_sensitive_data');
	
	protected function remove_sensitive_data($designation)
	{
		unset($designation['basic_pay']);
		unset($designation['hq']);
		unset($designation['exhq']);
		unset($designation['os']);
		unset($designation['other_expense']);
					
		return $designation;
	}
	

}
