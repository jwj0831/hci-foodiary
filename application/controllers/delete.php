<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Delete extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following !URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	
	function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->model('foodiary_m');
		$this->load->helper(array('form', 'url', 'alert'));
	}
	
	public function index()
	{
		$food_id = $this->uri->segment(2);
		$ses_user = $this->session->userdata('User');
		
		$data['food'] = $this->foodiary_m->get_food("food_records", $food_id);
		
		if($ses_user['name'] != $food->user_name) {
			alert('You are not a onwer', '/hci-foodiary');
		}
		else {
			$this->foodiary_m->delete_foods($food_id);
			alert('Successfully Delete!', '/hci-foodiary');
		}
	}
	
	
	public function _remap($method)
	{
			$this->load->view('header_v');
		
			if( method_exists($this, $method) )
			{
				$this->{"{$method}"}();
			}
			
			$this->load->view('footer_v');
		/*
		if (BROWSER_TYPE == 'W'){
			$this->load->view('header_v');
		
			if( method_exists($this, $method) )
			{
				$this->{"{$method}"}();
			}
			
			$this->load->view('footer_v');
		}
		else if (BROWSER_TYPE == 'M') {
			$this->load->view('mobile/m_header_v');
		
			if( method_exists($this, $method) )
			{
				$this->{"{$method}"}();
			}
			
			$this->load->view('mobile/m_footer_v');
		}
		*/
	}
	
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */