<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Location extends CI_Controller {
    public function __construct(){
        parent::__construct();   
        $this->load->library('session');
		$this->load->helper('url');
		$this->load->model('location_model');
		if ($this->session->userdata('logged_in') == TRUE){

		}
		else{
			redirect('login');
		}
        
    }

    // Locations
    function index(){
        $data['query'] = $this->location_model->get_vehicle_location();
        $this->load->view('location/list.php');
    }
    
    public function add_vehiclelocation(){
        $data = array(
            'vehicle_id' => $this->input->post('vehicle_id'),  
            'to_location_id' => $this->input->post('to_location_id'),
            'location_id' => $this->input->post('location_id'),
            'departure_time' => $this->input->post('departure_time'),
            'arrival_time' => $this->input->post('arrival_time'),
            'amount' => $this->input->post('amount'),  
        );
        $this->location_model->insert('location_vehicles',$data);
    }
    function delete_vehiclelocation(){
		$this->db->where('id',$_POST['id']);
		$res = $this->db->delete('location_vehicles');
		if($res){
            $this->session->set_flashdata('msg', '1');
            $this->session->set_flashdata('alert_data', 'Deleted Successfull.');
            redirect(base_url('location'));
        }else{            
            $this->session->set_flashdata('msg', '2');
            $this->session->set_flashdata('alert_data', 'Something went wrong');
            redirect(base_url('location'));
        }
	}
	function edit_vehiclelocation(){
		$vehicle_id = $this->input->post('vehicle_id');
		$to_location_id = $this->input->post('to_location_id');
		$location_id = $this->input->post('location_id');
		$departure_time = $this->input->post('departure_time');
		$arrival_time = $this->input->post('arrival_time');
		$amount = $this->input->post('amount');
		$custData = array(
			'vehicle_id' => $vehicle_id,
			'to_location_id' => $to_location_id,
			'location_id' => $location_id,
			'departure_time' => $departure_time,
			'arrival_time' => $arrival_time,
			'amount' => $amount,
		);
		$this->db->where('id', $_POST['id']);
		$res = $this->db->update('location_vehicles', $custData);
		if($res){
            $this->session->set_flashdata('msg', '1');
            $this->session->set_flashdata('alert_data', 'Updated Successfully.');
            redirect(base_url().'location');
        }else{            
            $this->session->set_flashdata('msg', '2');
            $this->session->set_flashdata('alert_data', 'Something went wrong');
            redirect(base_url().'location');
        }
	}
	public function cities(){
	    if($_GET){
	        $id = $_GET['id'];
	        $query = "select * from locations WHERE id != '$id'";
		    $ss = $this->location_model->rawQuery($query);
		    echo json_encode($ss);
	    } else{
	        $query = "select * from locations";
		    $ss = $this->location_model->rawQuery($query);
		    echo json_encode($ss);
	    }
	       
	}
}
