<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	function __construct() {
        parent::__construct();
        // if (!$this->session->has_userdata('is_logged_in')) {
        //     redirect('login');
        // } 
        $this->load->model('Mainmodel', 'mm'); 
    }
	public function index()
	{
		$this->load->view('welcome_message');
	}
	public function encrypt(){

		$pwduser = $this->mm->fetchArr('userlogin', ['id', 'password']);
		$pwdadmin = $this->mm->fetchArr('admin', ['id', 'password']);

		foreach ($pwdadmin as $key => $value) { 
			if (!is_sha1($value['password']) === TRUE) {
				$pwd = sha1($value['password']);
				$this->mm->updateRow('admin', ['password' => $pwd], [ 'id' => $value['id'] ] );
			} 
		}
		foreach ($pwduser as $key => $value) { 
			if (!is_sha1($value['password']) === TRUE) {
				$pwd = sha1($value['password']);
				$this->mm->updateRow('userlogin', ['password' => $pwd], [ 'id' => $value['id'] ] );
			} 
		}
	}
}
