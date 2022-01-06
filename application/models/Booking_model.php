<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Booking_model extends CI_Model{
    
    function __construct() {
        $this->custTable = 'payment_histories';
    }
    public function get_history() {
        $query = $this->db->query('SELECT bk.id, bk.booking_date,bk.status, bk.created_at, payment_history_id.total_amount as total_amount,
                                        payment_history_id.departure_time, payment_history_id.arrival_time, payment_history_id.from_loc, payment_history_id.to_loc ,payment_history_id.total_seats, 
                                        seats.title as seat_title, seats.type,
                                        vehicle.title as vehicle_title,
                                        users.name as user_name
                                        FROM bookings AS bk
                                        left JOIN payment_histories AS payment_history_id ON payment_history_id.`id` = bk.`payment_history_id`
                                        left JOIN seats AS seats ON seats.`id` = bk.`seat_id`
                                        left JOIN vehicles as vehicle ON vehicle.id = payment_history_id.vehicle_id
                                        left JOIN users As users ON users.id = bk.user_id
                                        ORDER by created_at');
        return $query->result();
    }
}