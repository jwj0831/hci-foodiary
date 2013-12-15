<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mobile extends CI_Controller {
	
	function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->model('foodiary_m');
		$this->load->helper(array('form', 'url'));
	}
	
	public function index()
	{
		/*
		$offset = 0;
		$num_of_records = 9;
		$data['list'] = $this->foodiary_m->get_food_records('food_records', $offset, $num_of_records);
		
		$ses_user = $this->session->userdata('User');
		$data['liked'] = $this->foodiary_m->get_my_liked_records('like_records', $offset, $num_of_records, $ses_user['name']);
		$this->load->view('foods/foods_v', $data);
		 * 	*/
		
		$this->load->view('mobile/foods/m_test');
	}
	
	
}
