<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	public function __construct(){
        parent::__construct();   
        $this->load->library('session');
		$this->load->helper('url');
		$this->load->library('form_validation');
			if ($this->session->userdata('logged_in') == TRUE){
    			redirect('dashboard');
    		}
    		
    		
    }

	public function index(){
		$this->load->view('login');
	}
	
	function verify_user(){
		if(!empty($_POST)){
			
			$this->form_validation->set_rules('email', 'email', 'required');
			$this->form_validation->set_rules('password', 'password', 'required');
				if ($this->form_validation->run() == FALSE){
					if (isset($this->session->userdata['logged_in'])) {
				
					} 
					else {
						$this->load->view('login');
					}
				}
                else{
					$data = array(  
						'email' => $this->input->post('email'),  
						'password' => $this->input->post('password')  
						); 
					
					$this->load->model('login_model');  
					$query = $this->login_model->log_in_correctly($data);

					if ($this->login_model->log_in_correctly($data))  {
						$email = $this->input->post('email');
						$result   = $this->login_model->read_user_information($email);
						if ($result != false) {
							$session_data = array(
								'id' => $result[0]->id,
								'email' => $result[0]->email,
							);
    							$this->session->set_userdata('logged_in', $session_data);
                                $this->session->set_userdata($session_data);
                                $this->session->set_flashdata('msg', '1');
                                $this->session->set_flashdata('alert_data', 'Login Successfull.');
                                redirect('dashboard');
						}
						else{
                                $this->session->set_flashdata('msg', '2');
                                $this->session->set_flashdata('alert_data', 'Invalid Email Or Password.');
                                redirect('login');
						} 	  
					} 
					else {  
					    
                                $this->session->set_flashdata('msg', '2');
                                $this->session->set_flashdata('alert_data', 'Invalid Email Or Password.');
                                redirect('login');
					}  

				}
		}
		else {
			$this->load->view('login');
		}
	}
    public function ForgotPassword(){
         $email = $this->input->post('email');      
         $findemail = $this->login_model->ForgotPassword($email);  
         if($findemail){
          $this->login_model->sendpassword($findemail);        
           }else{
          $this->session->set_flashdata('msg',' Email not found!');
          redirect('login','refresh');
       }
    }
}
