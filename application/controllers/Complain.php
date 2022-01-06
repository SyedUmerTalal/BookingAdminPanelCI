<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Complain extends CI_Controller {
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
    // Complain
    function index(){
        $url = 'https://webprojectmockup.com/custom/ticket-app/public/api/get_complain';
        $data = array(
            'user_id'=>1,
        );
        $result = api_response($url,  1, $data);  
        $final['records'] = json_decode($result,true);
        if(isset($final) && $final['records']['success'] == 1){
        $this->load->view('complain/list.php',$final);
        }
    }

    public function add_complain(){

        $url = 'https://webprojectmockup.com/custom/ticket-app/public/api/post_complain';
        $data = array(
            'title'=>$_POST['title'],
            'description'=>$_POST['description'],
            'user_id'=>1,
        );
        $result = api_response($url,  1, $data);
        $final ['records'] = json_decode($result,true);
        if(isset($final) && $final['records']['success'] == 1){
            $this->session->set_flashdata('msg', '1');
            $this->session->set_flashdata('alert_data', 'Complain sent successfully');
            return redirect(base_url().'complain');
        }else{
            $this->session->set_flashdata('msg', '2');
            $this->session->set_flashdata('alert_data','Complain Not Sent');
            return redirect(base_url().'complain');
        }
    }
    
    function delete_complain(){
		$this->db->where('id',$_POST['id']);
		$res = $this->db->delete('complains');
		if($res){
            $this->session->set_flashdata('msg', '1');
            $this->session->set_flashdata('alert_data', 'Deleted Successfull.');
            redirect(base_url().'complain');
        }else{            
            $this->session->set_flashdata('msg', '2');
            $this->session->set_flashdata('alert_data', 'Something went wrong');
            redirect(base_url().'complain');
        }
	}
	function edit_complain(){
		$title = $this->input->post('title');
		$description = $this->input->post('description');
		$is_resolved = $this->input->post('is_resolved');
		$custData = array(
			'title' => $title,
			'description' => $description,
			'is_resolved' => $is_resolved,
		);
		$this->db->where('id', $_POST['id']);
		$res = $this->db->update('complains', $custData);
		if($res){
            $this->session->set_flashdata('msg', '1');
            $this->session->set_flashdata('alert_data', 'Updated Successfully.');
            redirect(base_url().'complain');
        }else{            
            $this->session->set_flashdata('msg', '2');
            $this->session->set_flashdata('alert_data', 'Something went wrong');
            redirect(base_url().'complain');
        }
	}
	
}
