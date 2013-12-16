<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Foods extends CI_Controller {

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
		$this->load->helper(array('form', 'url', 'alert'));
	}
	
	public function index()
	{
		$offset = 0;
		$num_of_records = 9;
		$data['list'] = $this->foodiary_m->get_food_records('food_records', $offset, $num_of_records);
		
		$ses_user = $this->session->userdata('User');
		$data['liked'] = $this->foodiary_m->get_my_liked_records('like_records', $offset, $num_of_records, $ses_user['name']);
			
		$this->load->view('foods/foods_v', $data);
			/*
		if (BROWSER_TYPE == 'W'){
			$this->load->view('foods/foods_v', $data);
		}
		else if (BROWSER_TYPE == 'M'){
			$this->load->view('mobile/foods/m_foods_v', $data);
		}	
			 * */
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
	
	public function record()
	{
		$id = $this->uri->segment(3);
		$data['food'] = $this->foodiary_m->get_food('food_records', $id);
		$this->load->view('foods/food_v', $data);
	}
	
	public function delete()
	{
		if( @$this->session->userdata('logged_in') == TRUE ) {
			$ses_user = $this->session->userdata('User');
			$food_id = $this->uri->segment(3);
			
			$data = $this->foodiary_m->get_food("food_records", $food_id);
			
			if($ses_user['name'] == $data->user_name) {
				$result = $this->foodiary_m->delete_foods($food_id);
				alert('Successfully Delete! '.$result, '/hci-foodiary');
			}
			else {
				alert('You are not a onwer', '/hci-foodiary');
			}			

			} // session if block
		else{
			alert('Please login to upload', '/hci-foodiary');
		}
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */