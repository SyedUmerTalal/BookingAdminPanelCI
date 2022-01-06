<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Booking extends CI_Controller {
    public function __construct(){
        parent::__construct();   
        $this->load->library('session');
		$this->load->helper('url');
		$this->load->model('booking_model');
		if ($this->session->userdata('logged_in') == TRUE){

		}
		else{
			redirect('login');
		}
        
    }
    // Booking History
    function index(){
        $data['query'] = $this->booking_model->get_history();
        $this->load->view('booking/list.php');
    }
}
