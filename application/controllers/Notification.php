<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Notification extends CI_Controller {
    public function __construct(){
        parent::__construct();   
        $this->load->library('session');
		$this->load->helper('url');
		if ($this->session->userdata('logged_in') == TRUE){

		}
		else{
			redirect('login');
		}
        
    }

    // Notification
    public function index(){
        $url = 'https://webprojectmockup.com/custom/ticket-app/public/api/send';
        $data = array(
            'user_id'=>1,
        );
        // print_r(api_response($url, 1, $data));
        // exit;
        $result = api_response($url,  1, $data);
        $final['records'] = json_decode($result,true);
        $this->load->view('notification/list.php',$final);
    }
    
    public function add_notification(){
        
        $url = 'https://webprojectmockup.com/custom/ticket-app/public/api/send-notification';
        $data = array(
            'title'=>$_POST['title'],
            'description'=>$_POST['description'],
        );
        $result = api_response($url,  1, $data);
        $this->session->set_flashdata('msg', '1');
        $this->session->set_flashdata('alert_data', 'Notification sent successfully');
        return redirect(base_url().'notification');
    }
    
    function delete_notification(){
		$this->db->where('id',$_POST['id']);
		$res = $this->db->delete('notifications');
		if($res){
            $this->session->set_flashdata('msg', '1');
            $this->session->set_flashdata('alert_data', 'Deleted Successfull.');
            redirect(base_url().'notification');
        }else{            
            $this->session->set_flashdata('msg', '2');
            $this->session->set_flashdata('alert_data', 'Something went wrong');
            redirect(base_url().'notification');
        }
	}
	function edit_notification(){
		$title = $this->input->post('title');
		$description = $this->input->post('description');
		$custData = array(
			'title' => $title,
			'description' => $description,
		);
		$this->db->where('id', $_POST['id']);
		$res = $this->db->update('notifications', $custData);
		if($res){
            $this->session->set_flashdata('msg', '1');
            $this->session->set_flashdata('alert_data', 'Updated Successfully.');
            redirect(base_url().'notification');
        }else{            
            $this->session->set_flashdata('msg', '2');
            $this->session->set_flashdata('alert_data', 'Something went wrong');
            redirect(base_url().'notification');
        }
	}
}
