 <?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_place extends MY_Model
{
	protected $_table = 'place';
	protected $primary_key = 'id';
	protected $return_type = 'array';

	protected $after_get = array('remove_sensitive_data');
	
	protected function remove_sensitive_data($place)
	{
		unset($place['state']);
		return $place;
	}
	

}
