<?php
class Pharmacy extends CI_Controller
{
function __construct()
 {
  parent::__construct();
  $is_logged_in = $this->session->userdata('is_logged_in');
		if(!isset($is_logged_in) || $is_logged_in!==TRUE)
		{
			echo "no permission";
			die();
			
		}
 }
	function is_logged_in()
	{
		$is_logged_in = $this->session->userdata('is_logged_in');
		if(!isset($is_logged_in) || $is_logged_in!==TRUE)
		{
			echo "no permission";
			die();
			
		}
	}
} 