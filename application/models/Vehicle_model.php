<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Vehicle_model extends CI_Model{
    
    function __construct() {
        $this->custTable = 'vehicles';
    }
    public function get_vehicles() {
        $query = $this->db->get($this->custTable);
        return $query->result();
    }
    
    public function insert($table,$data) {  
        $query = $this->db->insert('vehicles',$data);
         if($query){
            $this->session->set_flashdata('msg', '1');
            $this->session->set_flashdata('alert_data', 'Updated Successfully');
            redirect(base_url().'vehicle');
        }else{            
            $this->session->set_flashdata('msg', '2');
            $this->session->set_flashdata('alert_data', 'Something went wrong');
            redirect(base_url().'vehicle');
        }
    }
}