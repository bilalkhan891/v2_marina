<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class TideTimes extends CI_Controller {

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
 
	public function index() {

		if ($this->session->userdata('is_user_logged_in') == 0) {
			redirect(base_url() . 'userlogin');
		}
		$data['title'] = 'Dashboard';
		$data['view'] = $this->load->view('users/dashboard', $data, TRUE);
		$this->load->view('users/usermain', $data);
	}

	public function viewTideTimes() {
		$order['by'] = 'date';
		$order['order'] = 'ASC';

		$data['data'] = $this->mm->fetchArr('tides', '', ['marinaid' => (string) $this->session->userdata('marinaid'), 'date >=' => date('Y-m-d'), 'date <=' => Date('Y-m-d', strtotime("+3 months"))], NULL, $order);
		// print_r($data['data']);

		$data['msg'] = $this->session->flashdata('msg');
		$data['title'] = 'View Tides';
		$data['view'] = $this->load->view('users/viewtidetimes', $data, TRUE);
		$data['view'] = $this->load->view('users/usermain', $data);

	}


}