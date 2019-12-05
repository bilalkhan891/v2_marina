<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class LockClosures extends CI_Controller {

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

	public function viewLockClosures() {


		if ($this->session->userdata('marinausername') == 'sailbristol') {
			$order['by'] = 'date';
			$order['order'] = 'ASC';

			$data['data'] = $this->mm->fetchArr('bristollocks', '', ['date >=' => date('Y-m-d'), 'date <=' => Date('Y-m-d', strtotime("+3 months"))], NULL, $order);
			// print_r($data['data']);

			$data['msg'] = $this->session->flashdata('msg');
			$data['title'] = 'View Bristol Lock Closures';
			$data['marinaId'] = $this->session->userdata('marinaid');
			$data['view'] = $this->load->view('users/viewbristollocks', $data, TRUE);
			$data['view'] = $this->load->view('users/usermain', $data);
			return;
		}

		$order['by'] = 'date';
		$order['order'] = 'ASC';
		$data['marinaId'] = $this->session->userdata('marinaid');
		$data['data'] = $this->mm->fetchArr('lockclosures', '', ['marinaid' => (string) $this->session->userdata('marinaid'), 'date >=' => date('Y-m-d'), 'date <=' => Date('Y-m-d', strtotime("+3 months"))], NULL, $order);
		// print_r($data['data']);

		$data['msg'] = $this->session->flashdata('msg');
		$data['title'] = 'View Lock Closures';
		$data['view'] = $this->load->view('users/viewlockclosures', $data, TRUE);
		$data['view'] = $this->load->view('users/usermain', $data);

	}


}