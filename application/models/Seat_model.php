<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Seat_model extends CI_Model{
    
    function __construct() {
        $this->custTable = 'seats';
    }
    public function get_seats() {
         $query = $this->db->query("SELECT seats.vehicle_id, seats.type, seats.title as seat_title, seats.id, vehicles.title FROM vehicles INNER JOIN seats ON seats.vehicle_id=vehicles.id");
        return $query->result();
    }
    
    public function insert($table,$data) {  
        $query = $this->db->insert('seats',$data);
         if($query){
            $this->session->set_flashdata('msg', '1');
            $this->session->set_flashdata('alert_data', 'Updated Successfully');
            redirect(base_url().'seat');
        }else{            
            $this->session->set_flashdata('msg', '2');
            $this->session->set_flashdata('alert_data', 'Something went wrong');
            redirect(base_url().'seat');
        }
    }
}