<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class History extends CI_Controller {
    public function __construct(){
        parent::__construct();   
        $this->load->library('session');
		$this->load->helper('url');
		$this->load->model('history_model');
		if ($this->session->userdata('logged_in') == TRUE){

		}
		else{
			redirect('login');
		}
        
    }
    // History
    function index(){
        $data['query'] = $this->history_model->get_history();
        $this->load->view('history/list.php');
    }
}
