<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_model extends CI_Model{
    
    function __construct() {
        $this->custTable = 'users';
    }
    public function getUser($email,$password){
        $this->db->select('*');
        $this->db->from($this->custTable);
        $where = "email='$email' AND password='$password'";
        $this->db->where($where);
        $query = $this->db->get();
        $result = $query->row_array();
        return !empty($result)?$result:false;
    }
    public function insertCustomer($data){
        $insert = $this->db->insert($this->custTable, $data);
        return $insert?$this->db->insert_id():false;
    }
    
    public function get_count() {
        return $this->db->count_all($this->custTable);
    }

    public function get_users() {
        $query = $this->db->query('SELECT * FROM `users` WHERE role_id = 2');
        return $query->result();
    }
    public function rawQuery($query){
        $sql=$query;    
        $query = $this->db->query($sql);
        return $query->result_array();
    }
}