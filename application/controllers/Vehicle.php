<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vehicle extends CI_Controller {
    public function __construct(){
        parent::__construct();   
        $this->load->library('session');
		$this->load->helper('url');
		$this->load->model('vehicle_model');
		if ($this->session->userdata('logged_in') == TRUE){

		}
		else{
			redirect('login');
		}
        
    }
    public function index() {
        $data['query'] = $this->vehicle_model->get_vehicles();
        $this->load->view('vehicle/list.php', $data);
    }
    public function add_vehicle(){
        $data = array(
            'title' => $this->input->post('title'),  
            'reg_number' => $this->input->post('reg_number'),  
            'no_of_seats' => $this->input->post('no_of_seats'),  
        );
        $this->vehicle_model->insert('vehicles',$data);
       
    }
    
    
    function edit_vehicle(){
		$title = $this->input->post('title');
		$reg_number = $this->input->post('reg_number');
		$no_of_seats = $this->input->post('no_of_seats');
		$custData = array(
		    'title'=>$title,
            'reg_number'=>$reg_number,
            'no_of_seats'=>$no_of_seats,
		);
		$this->db->where('id', $_POST['id']);
		$res = $this->db->update('vehicles', $custData);
		if($res){
            $this->session->set_flashdata('msg', '1');
            $this->session->set_flashdata('alert_data', 'Updated Successfully');
            redirect(base_url().'vehicle');
        }else{            
            $this->session->set_flashdata('msg', '2');
            $this->session->set_flashdata('alert_data', 'Something went wrong');
            redirect(base_url().'vehicle');
        }
	}

	function delete_vehicle(){
		$this->db->where('id',$_POST['id']);
		$res = $this->db->delete('vehicles');
		if($res){
            $this->session->set_flashdata('msg', '1');
            $this->session->set_flashdata('alert_data', 'Deleted Successfully');
            redirect(base_url().'vehicle');
        }else{            
            $this->session->set_flashdata('msg', '2');
            $this->session->set_flashdata('alert_data', 'Something went wrong');
            redirect(base_url().'vehicle');
        }
	}
}
