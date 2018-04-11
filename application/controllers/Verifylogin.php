<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Verifylogin extends CI_Controller { 

	 function __construct()
		 {
		   parent::__construct();
		   $this->load->model('User','',TRUE);
		 }

	 function index()
	 {
	   //This method will have the credentials validation
	   $this->load->library('form_validation');

	   $this->form_validation->set_rules('username', 'Username', 'trim|required');
	   $this->form_validation->set_rules('password', 'Password', 'trim|required|callback_check_database');

	   if($this->form_validation->run() == FALSE)
	   {
	     //Field validation failed.  User redirected to login page
	     $this->load->view('index');
	   }
	   else
	   {
	     //Go to private area
	     redirect('People_Controller/index', 'refresh');
	   }

	 }

	 function check_database($password)
	 {
	   //Field validation succeeded.  Validate against database
		 
	   $username = $this->input->post('username');

	   //query the database
	   $result = $this->User->login($username, $password);
           
	   if($result)
	   {
	     $sess_array = array();
	     foreach($result as $row)
	     {
	       $sess_array = array(

	         'session_id' => session_id(),
	         'full_name' => $row->Full_Name
	       );

	       $this->session->set_userdata('logged_in', $sess_array);
	     }

	    $session_data = $this->session->userdata('logged_in');
       
	     return TRUE;
	   }
	   else
	   {
	     $this->form_validation->set_message('check_database', 'Invalid username or password');
	     return false;
	   }
	 }
	}
?>
