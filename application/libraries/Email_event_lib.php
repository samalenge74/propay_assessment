<?php 

class Email_event_lib {

	private $_ci;

	public function __construct() {
	
		$this->_ci = get_instance();
		$this->_ci->load->library('email');
		
		$this->_ci->event->register('send.email',function(&$full_name,&$to_email,&$response) {
	     	
	     	$this->_ci->email->from('no_reply@domainname.ext', 'New Registration');
	     	$this->_ci->email->to($to_email);
	     	$this->_ci->email->subject('DRA Contractors Portal New Password');
	     	$this->_ci->email->message('Good day '. $full_name .' \r\n \r\n You have been successfully added to the system. \r\n \r\n Propay People Portal');
	     	if($this->_ci->email->send())
	     	{
	     		$response = 'Email sent';
	     	}else{
	     		$response = 'Email not sent';
	     	}
			
		});
		
	} 
} 