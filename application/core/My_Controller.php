<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller
{


    public $event;

	public function __construct() {
        parent::__construct();

		$this->load->library('EventDispatcher');
		$this->event = new EventDispatcher();
    }
}