<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Rates extends CI_Controller {

	var $marinausername;

	function __construct() {
		parent::__construct();
		$this->load->helper('form');
		$this->marinausername = $this->session->userdata('marinausername');
		$this->load->model('Mainmodel', 'mm');
		if ($this->session->userdata('is_user_logged_in') == 0) {
			redirect(base_url() . 'userlogin');
		}
	}
    
    public function updatebristolrates($update = ""){
        
        $data = array();
		$dbValues = $this->mm->fetchArr('bristolRates', '')[0];
        unset($dbValues['id']);
		if($update == "update") {
            $postValues = $this->input->post();  
            if ($this->mm->updateRow('bristolRates', $postValues, ['id' => 1])) {
                $this->session->set_flashdata('msg', '<span class="alert alert-success">Values updated successfully.</span>');
            } else {
                $this->session->set_flashdata('msg', '<span class="alert alert-danger">Something went wrong.</span>');
            }
            redirect('rates/updatebristolrates','refresh');
        }
        
        $data['dbValues'] = $dbValues;
		$data['msg'] = $this->session->flashdata('msg');
		$view['view'] = $this->load->view('users/updatebristolrates', $data, TRUE);
		$this->load->view('users/usermain', $view); 
	}
    
    
    
}