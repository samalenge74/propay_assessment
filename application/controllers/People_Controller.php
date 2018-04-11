<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class People_Controller extends CI_Controller {

	function __construct()
	 {
	   parent::__construct();

	   $this->load->model('User','', TRUE);
	   $this->load->model('People_Model','',TRUE);
	   $this->load->model('Dropdowns_Model','', TRUE);
	   
	 }

	public function index()
	{
		if($this->session->userdata('logged_in')){

			$session_data = $this->session->userdata('logged_in');
			$data['name'] = $session_data['full_name'];
			$data['people'] = $this->People_Model->View_All_People();
			$this->load->view('Templates/header', $data);
			$this->load->view('templates/sideMenu', $data);
			$this->load->view('People/people', $data); //Main Dashboard
			$this->load->view('Templates/footer');
		}else{
			//If no session, redirect to login page
                    redirect('index', 'refresh');
		}
	}

	public function add_person_view()
	{
		if($this->session->userdata('logged_in')){


			$session_data = $this->session->userdata('logged_in');
			$data['name'] = $session_data['full_name'];
			$data['languages'] = $this->Dropdowns_Model->languages();
			$data['interests'] = $this->Dropdowns_Model->interests();
			$this->load->view('Templates/header', $data);
			$this->load->view('Templates/sideMenu', $data);
			$this->load->view('People/add_a_person', $data); //Main Dashboard
			$this->load->view('Templates/footer');
		}else{
			//If no session, redirect to login page
                    redirect('index', 'refresh');
		}
	}

	public function edit_person_view($id)
	{
		if($this->session->userdata('logged_in')){


			$session_data = $this->session->userdata('logged_in');
			$data['name'] = $session_data['full_name'];
			$data['person'] = $this->People_Model->View_One_Person($id);
			$data['languages'] = $this->Dropdowns_Model->languages();
			$data['interests'] = $this->Dropdowns_Model->interests();
			$this->load->view('Templates/header', $data);
			$this->load->view('Templates/sideMenu', $data);
			$this->load->view('People/edit_a_person', $data);
			$this->load->view('Templates/footer');
		}else{
			//If no session, redirect to login page
                    redirect('index', 'refresh');
		}
	}

	public function add_person()
	{

		//This method will have the credentials validation
	   $this->load->library('form_validation');

	   $this->form_validation->set_rules('name', 'Name', 'trim|required');
	   $this->form_validation->set_rules('surname', 'Surname', 'trim|required');
	   $this->form_validation->set_rules('said', 'SA ID', 'trim|required|numeric|regex_match[/^\d{13}$/]');
	   $this->form_validation->set_rules('mnumber', 'Mobile Number', 'trim|required|numeric|regex_match[/^\d{10}$/]');
	   $this->form_validation->set_rules('email', 'Email Address', 'trim|required|valid_email|callback_email_exists');
	   $this->form_validation->set_rules('dob', 'Date of Birth', 'trim|required');
	   $this->form_validation->set_rules('language', 'Language', 'trim|required|callback_dropdown_languages');
	   $this->form_validation->set_rules('interests[]', 'Interests', 'trim|required|callback_dropdown_interests');
	   

	   if($this->form_validation->run() == FALSE)
	   {
		    $session_data = $this->session->userdata('logged_in');
			$data['name'] = $session_data['full_name'];
			$data['languages'] = $this->Dropdowns_Model->languages();
			$data['interests'] = $this->Dropdowns_Model->interests();
			$this->load->view('Templates/header', $data);
			$this->load->view('Templates/sideMenu', $data);
			$this->load->view('People/add_a_person', $data);
			$this->load->view('Templates/footer');

	   	}
	   	else
	   	{
	     //Go to private area

	   		$data = array(
				'Name' => $this->input->post('name'),
				'Surname' => $this->input->post('surname'),
				'SA_ID' => $this->input->post('said'),
				'Mobile_Number' => $this->input->post('mnumber'),
				'Email' => $this->input->post('email'),
				'DOB' => date('Y-m-d', strtotime($this->input->post('dob'))),
				'Language_ID' => $this->input->post('language'),
				'Interests' => implode(',',$_POST['interests'])
			);

	   		$email_address = $this->input->post('email');

	   		$result = $this->People_Model->Create_Person($data);
			
	   		if($result){
	   			$response = '';
	   			$full_name = $this->input->post('name') ." " . $this->input->post('surname');
	   			$to_email = $this->input->post('email');

	   			$this->event->trigger('send.email', $full_name,$to_email,$response);

	   			if($response == 'Email sent'){
	   				$this->session->set_flashdata('person_added', $this->input->post('name') ." " . $this->input->post('surname') . ' was successfully added and an email notification was sent out.');
	   			}else{
	   				$this->session->set_flashdata('person_added_no_email', $this->input->post('name') ." " . $this->input->post('surname') . ' was successfully added but the email notifcation failed.');
	   			}
	   			
	     		redirect('People_Controller/index', 'refresh');
	   		}else{
	   			$this->session->set_flashdata('person_not_added', $this->input->post('name') ." " . $this->input->post('surname') . ' could not added.');
	   		}
	     	
	   }
	}

	public function edit_person()
	{
		//This method will have the credentials validation
	   $this->load->library('form_validation');

	   $this->form_validation->set_rules('name', 'Name', 'trim|required');
	   $this->form_validation->set_rules('surname', 'Surname', 'trim|required');
	   $this->form_validation->set_rules('said', 'SA ID', 'trim|required|numeric|regex_match[/^\d{13}$/]');
	   $this->form_validation->set_rules('mnumber', 'Mobile Number', 'trim|required|numeric|regex_match[/^\d{10}$/]');
	   $this->form_validation->set_rules('email', 'Email Address', 'trim|required|valid_email');
	   $this->form_validation->set_rules('dob', 'Date of Birth', 'trim|required');
	   $this->form_validation->set_rules('language', 'Language', 'trim|required|callback_dropdown_languages');
	   $this->form_validation->set_rules('interests[]', 'Interests', 'trim|required|callback_dropdown_interests');
	   

	   if($this->form_validation->run() == FALSE)
	   {
		    $session_data = $this->session->userdata('logged_in');
			$data['name'] = $session_data['full_name'];
			$data['person'] = $this->People_Model->View_One_Person($this->input->post('person_id'));
			$data['languages'] = $this->Dropdowns_Model->languages();
			$data['interests'] = $this->Dropdowns_Model->interests();
			$this->load->view('Templates/header', $data);
			$this->load->view('Templates/sideMenu', $data);
			$this->load->view('People/edit_a_person', $data);
			$this->load->view('Templates/footer');

	   	}
	   	else
	   	{
	     //Go to private area

	   		$id = $this->input->post('person_id');

	   		$data = array(
				'Name' => $this->input->post('name'),
				'Surname' => $this->input->post('surname'),
				'SA_ID' => $this->input->post('said'),
				'Mobile_Number' => $this->input->post('mnumber'),
				'Email' => $this->input->post('email'),
				'DOB' => date('Y-m-d', strtotime($this->input->post('dob'))),
				'Language_ID' => $this->input->post('language'),
				'Interests' => implode(',',$this->input->post('interests'))
			);


	   		$result = $this->People_Model->Update_Person($id, $data);

	   		if($result){
	     		$this->session->set_flashdata('person_edited', $this->input->post('name') ." " . $this->input->post('surname') . ' was successfully edited.');
	     		redirect('People_Controller/edit_person_view/'. $id);
	   		}else{
	   			$this->session->set_flashdata('person_not_edited', $this->input->post('name') ." " . $this->input->post('surname') . ' was not edited.');
	   		}
	     	
	   }
	}

	public function delete($id, $name, $surname){
		$result = $this->People_Model->Delete_Person($id);
		if($result)
		{
		$this->session->set_flashdata('person_deleted', $name ." ". $surname . ' was successfully deleted.');
	     		redirect('People_Controller/index', 'refresh');
   		}else{
   			$this->session->set_flashdata('person_not_deleted', $name ." ". $surname . ' was not deleted.');
   		}
	}

	public function email_exists()
    {
    	$result = $this->People_Model->Email_Exists($this->input->post('email'));
    	if ($result){
    		$this->form_validation->set_message('email_exists', 'Email address already exists.');
    		return FALSE;
    	}else{
    		return TRUE;
    	}
    }

    public function dropdown_languages()
    {
    	if ($this->input->post('language') === 'CHOOSE' || $this->input->post('language') === '')  {
            $this->form_validation->set_message('dropdown_languages', 'Please choose a language.');
            return FALSE;
        }
        else {
            return TRUE;
        }
    	
    }

    public function dropdown_interests()
    {
    	if ($this->input->post('interests') === '')  {
            $this->form_validation->set_message('dropdown_interests', 'Please choose at least one interest.');
            return FALSE;
        }
        else {
            return TRUE;
        }
    	
    }

}


?>
