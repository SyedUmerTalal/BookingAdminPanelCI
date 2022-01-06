<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Seat extends CI_Controller {
    public function __construct(){
        parent::__construct();   
        $this->load->library('session');
		$this->load->helper('url');
        $this->load->model('seat_model');
        $this->load->model('user_model');
		if ($this->session->userdata('logged_in') == TRUE){

		}
		else{
			redirect('login');
		}
        
    }
    // Seat	
    function index(){

        $this->load->view('seat/list.php');
    }
    
     public function add_seat(){
        $data = array(
            'vehicle_id' => $this->input->post('vehicle_id'),  
            'type' => $this->input->post('type'),  
            'title' => $this->input->post('title'),  
        );
        $this->seat_model->insert('seats',$data);
       
    }
    function edit_seat(){
		$vehicle_id = $this->input->post('vehicle_id');
		$type = $this->input->post('type');
		$title = $this->input->post('seat_title');
		$custData = array(
			'vehicle_id' => $vehicle_id,
			'type' => $type,
			'title' => $title,
		);
		$this->db->where('id', $_POST['id']);
		$res = $this->db->update('seats', $custData);
		if($res){
            $this->session->set_flashdata('msg', '1');
            $this->session->set_flashdata('alert_data', 'Updated Successfully.');
            redirect(base_url().'seat');
        }else{            
            $this->session->set_flashdata('msg', '2');
            $this->session->set_flashdata('alert_data', 'Something went wrong');
            redirect(base_url().'seat');
        }
	}
    function delete_seat(){
		$this->db->where('id',$_POST['id']);
		$res = $this->db->delete('seats');
		if($res){
            $this->session->set_flashdata('msg', '1');
            $this->session->set_flashdata('alert_data', 'Deleted Successfull.');
            redirect(base_url().'seat');
        }else{            
            $this->session->set_flashdata('msg', '2');
            $this->session->set_flashdata('alert_data', 'Something went wrong');
            redirect(base_url().'seat');
        }
	}
}
