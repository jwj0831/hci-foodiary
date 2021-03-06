<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Me extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
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
	}
	
	public function index()
	{
			$ses_user = $this->session->userdata('User');
			$liked = $this->foodiary_m->get_like_food_num_about_user($ses_user['name']);
			$records = $this->foodiary_m->get_food_records_num_about_user($ses_user['name']);
			$data = array('liked'=> $liked, 'records' => $records);
			$this->load->view('foods/me_v', $data);
	}
	
	
	public function _remap($method)
	{
		$this->load->view('header_v');
	
		if( method_exists($this, $method) )
		{
			$this->{"{$method}"}();
		}
		
		$this->load->view('footer_v');
	}
	
	public function me()
	{
		$this->load->view('foods/me_v');
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */