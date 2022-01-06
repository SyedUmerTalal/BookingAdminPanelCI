<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class History_model extends CI_Model{
    
    function __construct() {
        $this->custTable = 'payment_histories';
    }
    public function get_history() {
        $query = $this->db->query('SELECT ph.id, vehicle_id.`title` as vehicle_id , users.name as reserved_by ,
                                    ph.total_seats, ph.booking_date, ph.departure_time, ph.arrival_time,
                                    ph.from_loc, ph.to_loc, ph.unit_cost ,ph.total_amount ,ph.status, ph.created_at
                                    FROM payment_histories AS ph 
                                    INNER JOIN vehicles AS vehicle_id ON vehicle_id.`id` = ph.`vehicle_id`
                                    INNER JOIN users As users ON users.id = ph.reserved_by
                                    ORDER BY created_at');
        return $query->result();
    }
}