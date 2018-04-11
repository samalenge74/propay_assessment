<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	function __construct()
	 {
	   parent::__construct();
	 }
 
	public function index()
	{	
		//$this->load->view('Templates/header');
       // $this->load->view('Templates/sideMenu');
        $this->load->view('index');
       // $this->load->view('Templates/footer');
	}

	public function logout()
		{
		 	
		   	$this->session->unset_userdata('logged_in');
		   	session_destroy();

		   	redirect('index', 'refresh');
		}

}
