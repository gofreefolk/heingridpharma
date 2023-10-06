<?php
//defined('BASEPATH') OR exit('No direct script access allowed');
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$config = array(
		'student_put' => array(
			array('field' => 'email_address', 'label' => 'email_address', 'rules' => 'trim|required|valid_email'),
			array('field' => 'password', 'label' => 'password', 'rules' => 'trim|required|min_length[8]|max_length[16]'),
			array('field' => 'first_name', 'label' => 'first_name', 'rules' => 'trim|required|max_length[50]'),
			array('field' => 'last_name', 'label' => 'last_name', 'rules' => 'trim|reuired|max_length[50]'),
			array('field' => 'phone_number', 'label' => 'phone_number', 'rules' => 'trim|required|alpha_dash')
		),
		
		'login_post' => array(
			array('field' => 'email', 'label' => 'email', 'rules' => 'trim|required|valid_email'),
			array('field' => 'password', 'label' => 'password', 'rules' => 'trim|required')
		),
		
		'token' => array(
			array('field' => 'token', 'label' => 'token', 'rules' => 'trim|required')
		),
		
		'station' => array(
			array('field' => 'token', 'label' => 'token', 'rules' => 'trim|required'),
			array('field' => 'place', 'label' => 'place_id', 'rules' => 'trim|required')
		),
		
		'daily' => array(
			array('field' => 'date', 'label' => 'date', 'rules' => 'trim|required'),
			array('field' => 'place_id', 'label' => 'place_id', 'rules' => 'trim|required'),
			array('field' => 'doctors_visited', 'label' => 'doctord_visited', 'rules' => 'trim|required'),
			array('field' => 'chemist', 'label' => 'chemist', 'rules' => 'trim'),
			array('field' => 'worked_with', 'label' => 'worked_with', 'rules' => 'trim'),
			array('field' => 'other_expense', 'label' => 'other_expense', 'rules' => 'trim'),
			array('field' => 'expense_reason', 'label' => 'expense_reason', 'rules' => 'trim'),
			array('field' => 'station', 'label' => 'station', 'rules' => 'trim|required'),
			array('field' => 'km', 'label' => 'km', 'rules' => 'trim|required')
			
		)
	
		
		
		
);

?>