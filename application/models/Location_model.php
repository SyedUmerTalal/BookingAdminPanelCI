<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Location_model extends CI_Model{
    
    function __construct() {
        $this->custTable = 'location_vehicles';
    }
    public function get_vehicle_location() {
        $query = $this->db->query('SELECT lv.id, lv.vehicle_id as vehicle_id ,lv.location_id as location_id, lv.to_location_id as to_location_id , from_loc.`location` as from_loc , to_loc.`location` as to_loc,V.title ,lv.amount,lv.departure_time,lv.arrival_time 
        FROM location_vehicles AS lv 
        INNER JOIN locations AS from_loc ON from_loc.`id` = lv.`location_id` 
        INNER JOIN locations AS to_loc ON to_loc.`id` = lv.`to_location_id` 
        INNER JOIN vehicles As V ON V.id= lv.vehicle_id');
        return $query->result();
    }
    
    public function insert($table,$data) {  
        $query = $this->db->insert('location_vehicles',$data);
         if($query){
            $this->session->set_flashdata('msg', '1');
            $this->session->set_flashdata('alert_data', 'Updated Successfully');
            redirect(base_url().'location');
        }else{            
            $this->session->set_flashdata('msg', '2');
            $this->session->set_flashdata('alert_data', 'Something went wrong');
            redirect(base_url().'location');
        }
    }
    public function rawQuery($query){
        $sql=$query;    
        $query = $this->db->query($sql);
        return $query->result_array();
    }
}