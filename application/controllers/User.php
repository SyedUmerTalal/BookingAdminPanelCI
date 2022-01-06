<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
    
    public function __construct(){
        parent::__construct();   
        $this->load->library('session');
		$this->load->helper('url');
		$this->load->model('user_model');
        $this->load->library("pagination");
		if ($this->session->userdata('logged_in') == TRUE){

		}
		else{
			redirect('login');
		}
        
    }
    
    // Users
    function index(){
        // $config = array();
        // $config["base_url"] = base_url() . "users";
        // $config["total_rows"] = $this->user_model->get_count();
        // $config["per_page"] = 10;
        // $config["uri_segment"] = 2;

        // $this->pagination->initialize($config);

        // $page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;

        // $data["links"] = $this->pagination->create_links();

        $data['query'] = $this->user_model->get_users();
        
        $this->load->view('users/list.php', $data);
    }

    public function add_user(){

        $url = 'https://webprojectmockup.com/custom/ticket-app/public/api/register';
        $data = array(
            'name'=>$_POST['name'],
            'email'=>$_POST['email'],
            'address'=>$_POST['address'],
            'number'=>$_POST['number'],
            'password'=>$_POST['password']
        );
        $result = api_response($url,  1, $data);
        $this->session->set_flashdata('msg', '1');
        $this->session->set_flashdata('alert_data', 'User Register Successfully');
        return redirect(base_url().'user');
    }

    function profile(){
        $url = 'https://webprojectmockup.com/custom/ticket-app/public/api/profile';
        $data = array(
            'user_id'=>1,
        );
        $result = api_response($url,  1, $data);
        $final['records'] = json_decode($result,true);
        // print_r($final['data']);
        
        if(isset($final) && $final['records']['success'] == 1){
            $this->load->view('users/view_user.php',$final);
        }
    }
    
    function edit_user(){
		$name = $this->input->post('name');
		$email = $this->input->post('email');
		$number = $this->input->post('number');
		$address = $this->input->post('address');
		$custData = array(
		    'name'=>$name,
            'email'=>$email,
            'address'=>$address,
            'number'=>$number,
		);
		$this->db->where('id', $_POST['id']);
		$res = $this->db->update('users', $custData);
		if($res){
            $this->session->set_flashdata('msg', '1');
            $this->session->set_flashdata('alert_data', 'Updated Successfully');
            redirect(base_url().'user');
        }else{            
            $this->session->set_flashdata('msg', '2');
            $this->session->set_flashdata('alert_data', 'Something went wrong');
            redirect(base_url().'user');
        }
	}

	function delete_user(){
		$this->db->where('id',$_POST['id']);
		$res = $this->db->delete('users');
		if($res){
            $this->session->set_flashdata('msg', '1');
            $this->session->set_flashdata('alert_data', 'Deleted Successfull.');
            redirect(base_url().'user');
        }else{            
            $this->session->set_flashdata('msg', '2');
            $this->session->set_flashdata('alert_data', 'Something went wrong');
            redirect(base_url().'user');
        }
	}
	
}
