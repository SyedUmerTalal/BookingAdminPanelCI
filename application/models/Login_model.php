<?php  
  
class Login_model extends CI_Model {  

    public function log_in_correctly($data) {  
        $this->db->where('email', $this->input->post('email'));  
        $this->db->where('password', $this->input->post('password'));  
        $query = $this->db->get('users');  
  
        if ($query->num_rows() == 1)  {  
            return true;  
        } 
        else {  
            return false;  
        }  
    }
    
    function read_user_information($email) {  
        $this->db->where('email', $this->input->post('email'));    
        $query = $this->db->get('users');  
  
        if ($query->num_rows() == 1)  {  
            return $query->result();
        } 
        else {  
            return false;  
        }  
    }
}  
?>