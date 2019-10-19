<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
    
    function __construct() {
    	parent::__construct();
    	// $this->load->helper('form');
    	$this->load->model('My_Model', 'mm');
        $this->load->model('Mainmodel');
    }

    public function index() { 

    	if ($this->session->has_userdata('is_logged_in')) {
    		redirect(base_url().'admin');
    	} 
	    $this->load->view('admin/adminlogin'); 
    } 

    public function loginValidation(){ 

    	$this->load->library('form_validation');
    	$this->form_validation->set_rules('username', 'Username', 'required');
    	$this->form_validation->set_rules('password', 'Password', 'required');

    	if($this->form_validation->run()) { 

			$data['user'] = $this->input->post('username');  
			$data['pwd'] = $this->input->post('password');
            $userdata = $this->Mainmodel->can_login($data['user'], $data['pwd'], 'admin');

			if ($userdata['status'] != FALSE) {

                $approved = $this->mm->get_num_rows('admin', ['status', 'approved'], ['username' => $data['user'], 'password' => $data['pwd']] );
                
                if (empty($approved)) {
                    $this->session->set_flashdata('msg', '<span class="alert alert-danger">You account is not approved. Check your email or contact us</span>');
                }
				$sessions = array(
					'username' => $data['user'],
					'is_logged_in' => TRUE
				);
				$this->session->set_userdata($sessions);
				redirect( base_url().'admin');
			} else {
				$flashdata = array(
					
				);
				$this->session->set_flashdata(['msg' => '<span class="alert alert-danger">Invalid Username or Password</span>' ]);
				redirect('login');
			}

    	} else {
    		$this->form_validation->set_message('check', 'The {field} field can not be the word "test"');
    		$this->logout();
    	}
    }
    public function logout(){

        $data['msg'] = $this->session->flashdata('msg');
    	$this->session->unset_userdata('is_logged_in'); 
    	redirect(base_url().'login');

    }

    public function main(){
    	
    }

}