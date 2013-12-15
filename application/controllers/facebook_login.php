<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once APPPATH.'libraries/facebook/facebook.php';

class Facebook_login extends CI_Controller {
		
	function __construct() 
	{
		parent::__construct();
		$this->config->load('facebook');
		$this->load->helper('alert');
	}
	
	public function index()
	{
			$this->load->view('facebook_login_v');
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
	
	
	function logout()
	{
		$base_url = $this->config->item('base_url');
		$this->session->sess_destroy();
		header('Location: '.$base_url);
	}
	
	function login() 
	{
		$base_url = $this->config->item('base_url');
		
		$facebook = new Facebook(array(
			'appId'		=> $this->config->item('appId'),
			'secret'	=> $this->config->item('appSecret'),
		));
		
		$user = $facebook->getUser();
		if($user) {
			try{
				$user_profile = $facebook->api('/me');
				$params = array('next' => $base_url.'facebook_login/logout');
				$sess_user = array(
					'User' => $user_profile, 	//Facebook's User Information
					'logged_in' => TRUE,
					'logout' => $facebook->getLogoutUrl($params)
					);
					
				$this->session->set_userdata($sess_user);
				
				header('Location: '.$base_url);
			}catch(FacebookApiException $e){
				error_log($e);
				$user = NULL;
				alert('Failed to Login with Facebook Account', '/hci-foodiary');
				header('Location: '.$base_url);
			}
		}
	}
}

?>