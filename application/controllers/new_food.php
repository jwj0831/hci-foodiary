<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class New_food extends CI_Controller {

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
		if( @$this->session->userdata('logged_in') == TRUE ) {
			if (BROWSER_TYPE == 'W'){
				$this->load->view('foods/upload_v');
			}
			else if (BROWSER_TYPE == 'M'){
				$this->load->view('mobile/foods/m_upload_v');
			}	
		} // session if block
		else{
			alert('Please login to upload', '/hci-foodiary');
		}
	}
	
	
	public function _remap($method)
	{
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
	}
	
	public function upload()
	{
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('food_name', 'Food Name', 'required|max_length[12]');
		$this->form_validation->set_rules('comments', 'Comments', 'required');
		//$this->form_validation->set_rules('food_img', 'Food Image', 'required');
		
		if( $this->form_validation->run() == FALSE ) {
			$this->load->view('foods/upload_v');
		}
		else {
			$config = array(
				'upload_path' => 'uploads/',
				'allowed_types' => 'gif|jpg|png',
				'encrypt_name' => TRUE,
				'max_size' => '5000'
			);
			
			$this->load->library('upload', $config);
			if ( !$this->upload->do_upload() ) {
				$data['error'] = $this->upload->display_errors();
				$this->load->view('foods/upload_v', $data);
			}
			else {
				$ses_user = $this->session->userdata('User');
				
				$upload_data = $this->upload->data();
				$upload_data['user_name'] = $ses_user['name'];
				$upload_data['food_name'] = $this->input->post('food_name', true);
				$upload_data['ratings'] = $this->input->post('ratings', true);
				$upload_data['geo_lat'] = $this->input->post('geo_lat', true);
				$upload_data['geo_long'] = $this->input->post('geo_long', true);
				$upload_data['comments'] = $this->input->post('comments', true);
				
				$result = $this->foodiary_m->insert_new_food_records($upload_data);
				
				redirect('/'); exit;
			} // do_upload if block
		} // form_validation if block
	} // upload function
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */