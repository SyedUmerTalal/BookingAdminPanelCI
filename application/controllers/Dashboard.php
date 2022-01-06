<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
    
    public function __construct(){
        parent::__construct();   
        $this->load->library('session');
		$this->load->helper('url');
		if ($this->session->userdata('logged_in') == TRUE){

		}
		else{
			redirect('login');
		}
        
    }
    
    // dashboard

	function index() {
        $this->load->view('index');
    }
    
    // Logout
    function logout(){
		$this->session->sess_destroy();
		redirect();
	}

}
