<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Userlogin extends CI_Controller {

	function __construct() {
		parent::__construct();

		$this->load->model('Mainmodel');
		$this->load->model('My_Model', 'mm'); 
	}

	public function index() {
		if ($this->session->userdata('is_user_logged_in') == 'xyz') {
			redirect(base_url() . 'usermain');
		}
		$this->load->view('users/userlogin');
	}

	public function loginValidation() {

		$this->load->library('form_validation');
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');

		if ($this->form_validation->run()) {

			$data['user'] = $this->input->post('username');
			$data['pwd'] = sha1($this->input->post('password'));

			$userdata = $this->Mainmodel->can_login($data['user'], $data['pwd'], 'userlogin');
			

			if ($userdata['status'] != FALSE) { 

				$userdata['idsdata'] = $this->mm->fetchArr('ids', '', ['id' => $userdata[0]['ids_id']]);
				// print_r($userdata[0]['id']);die;
				$marinausername = $this->mm->fetchArr('marinas', '', ['id' => $userdata['idsdata'][0]['marinaid']])[0];

				$sessions = array(
					'username' => $data['user'],
					'is_user_logged_in' => TRUE, 
					'userid' => (string) $userdata[0]['id'],
					'ids_id' => $userdata[0]['ids_id'],
					'marinausername' => $marinausername['username'],
					'annualid' => $userdata['idsdata'][0]['annualid'],
					'contactid' => $userdata['idsdata'][0]['contactid'],
					'creditcardsurchargeid' => $userdata['idsdata'][0]['creditcardsurchargeid'],
					'electircityid' => $userdata['idsdata'][0]['electircityid'],
					'harbourid' => $userdata['idsdata'][0]['harbourid'],
					'hoistid' => $userdata['idsdata'][0]['hoistid'],
					'premiumsanddiscountsid' => $userdata['idsdata'][0]['premiumsanddiscountsid'],
					'storageid' => $userdata['idsdata'][0]['storageid'],
					'summerid' => $userdata['idsdata'][0]['summerid'],
					'vatratesid' => $userdata['idsdata'][0]['vatratesid'],
					'visitorid' => $userdata['idsdata'][0]['visitorid'],
					'winterid' => $userdata['idsdata'][0]['winterid'],
					'marinaid' => $marinausername['id'],
					'role' => $marinausername['role_id'],
				);

				$this->session->set_userdata($sessions);
				redirect(base_url() . 'userlogin');

			} else {

				$this->session->set_flashdata(['error_msg' => 'Invalid Username or Password']);
				redirect('userlogin');
			}

		} else {
			$this->form_validation->set_message('check', 'The {field} field can not be the word "test"');
			$this->logout();
		}
	}
	public function logout() {
		$this->session->unset_userdata('is_user_logged_in');
		redirect(base_url() . 'userlogin');

	}

	public function main() {

	}

	public function resetpwd(){

		$data['password1'] = $this->input->post('password1');
		$data['password2'] = $this->input->post('password2');
 
		if ($data['password1'] != $data['password2']) {
			echo 'Password didn\'t match';
			return;
		}

		$userId = $this->session->userdata('userid');
		$marinaid = $this->session->userdata('marinaid');

		$this->mm->updateRow('userlogin', ['password' => sha1($data['password1'])], ['id' => $userId, 'marinaid' => $marinaid]);

		$data['data'] = $this->mm->fetchArr('userlogin', '', ['id' => $userId, 'marinaid' => $marinaid])[0];
 
		$from_email = "paul@myhomeport.info"; 
        //Load email library
         
        $response = $this->mailgun($data['data']['name'], $data['data']['email'], $this->load->view('email/resetpwd', $data, TRUE), "Password reset alert.");
         
        //Send mail
        if ($response == 200) {
        	echo 'success';
        } else {
        	echo 'failed';
        }
    	
	}
 
	public function forgotpwd(){
		$data['1'] = '';
		 
		if ($this->input->post('email')) {  
			// 
			$email = $this->input->post('email');
			$data['data'] = $this->mm->fetchArr('userlogin', '', ['email' => $email]);
// print_r($data['data']); die;
			if (empty($data['data'])) {
				$this->session->set_flashdata('msg', '<span class="alert alert-info"> This email does not exists.</span><br><br>' ); 
				redirect('userlogin/forgotpwd');
			} else {
				$data['data'] = $data['data'][0];
			}
 

			$data['code'] = md5($email.",".$data['data']['id']); 
			 
			$this->mm->updateRow('userlogin', ['pwd_reset' => $data['code']], ['email' => $email]);
	        //Load email library
	        $view = $this->load->view('email/forgotpwd', $data, TRUE);
	        $response = $this->mailgun($data['data']['name'], $email, $view, 'password reset.');
	         
	        if ($response == 200) { 
				$this->session->set_flashdata('msg', '<span class="alert alert-info">Email Sent.</span><br><br>' );
	        } else {
				$this->session->set_flashdata('msg', '<span class="alert alert-info"> Could not sent you email.</span><br><br>' );
	        }

		}

		
		$this->load->view('users/forgotpwd', $data);
	}

	public function resetforgotpwd($code = ""){
		
		$this->session->set_userdata('code', $code);
		// echo $this->session->userdata('code'); 
		if ($code == '') {
			$this->session->set_flashdata('msg', '<span class="alert alert-info">This link is expired, get new one.</span><br><br>');
			redirect('userlogin/forgotpwd');
		} 

		$data['data'] = $this->mm->fetchArr('userlogin', '', ['pwd_reset' => $code]);
		if (empty($data['data'])) {
			$this->session->set_flashdata('msg', '<span class="alert alert-info">This link is expired, get new one.</span><br><br>');
			redirect('userlogin/forgotpwd');
		} else {
			$data['data'] = $data['data'][0];
			$this->session->set_userdata(['userId' => $data['data']['id']]); 
		}
		
		//var_dump($this->session->user_data());die();
		
		$data['msg'] = $this->session->flashdata('msg');
		$this->load->view('users/insertnewpwd', $data);
	}

	public function insertnewpwd(){

		$this->load->library('form_validation');
		$this->form_validation->set_rules('password1', 'Password', 'required');
		$this->form_validation->set_rules('password2', 'Confirm Password', 'required|matches[password1]');

		if ($this->form_validation->run()) {
			$data['password1'] = $this->input->post('password1');
			$data['password2'] = $this->input->post('password2'); 

			$userId = $this->session->userdata('userId'); 

			$this->mm->updateRow('userlogin', ['password' => sha1($data['password1'])], ['id' => $userId]);

			$data['data'] = $this->mm->fetchArr('userlogin', '', ['id' => $userId])[0];
	 		
			$response = $this->mailgun($data['data']['name'], $data['data']['email'] ,$this->load->view('email/resetpwd', $data, TRUE), 'Password Reset Notification');

	         
	        if ($response == 200) {
	        	$this->mm->updateRow('userlogin', ['pwd_reset' => ''], ['id' => $userId]);
				$this->session->set_flashdata('msg', '<span class="alert alert-success">Password reset successfully.</span>');
				redirect('userlogin');
	        } else {
	        	echo 'failed';
	        }
		} else {
			$this->session->set_flashdata('msg', '<span class="alert alert-danger">There was problem in your input.</span><br>Both Password need to match.');
			redirect('userlogin/resetforgotpwd/'.$this->session->userdata('code'));
		}
 
	}
 

	public function mailgun($name = '', $to = '', $view = '', $subject = ''){
		#guzzle library add to use guzzle
		  $this->load->library('guzzle');

		  # guzzle client define
		  $client     = new GuzzleHttp\Client(['auth' => ['api', 'key-34c2df2afbdc92e783b7c8535f8eb307']]);
		  
		  #This url define speific Target for guzzle
		  $url        = 'https://api.mailgun.net/v3/admin.myhomeport.info/messages';

		  #guzzle
		  try {
		    # guzzle post request example with form parameter
		    $response = $client->request( 'POST', 
		                                   $url, 
		                                  [ 'form_params' 
		                                        => [ 
		                                        	'from' => 'My Home Port <no-reply@myhomeport.info>',
		                                        	'to' => $name.' <'.$to.'>',
		                                        	'subject' => 'My Home Port '.$subject,
		                                        	'html' => $view 
		                                        ] 
		                                  ] 
		                                );

		    #guzzle repose for future use
		    return (int)$response->getStatusCode(); // 200
		    // echo $response->getReasonPhrase(); // OK
		    // echo $response->getProtocolVersion(); // 1.1
		    // echo $response->getBody();
		  } catch (GuzzleHttp\Exception\BadResponseException $e) {
		    #guzzle repose for future use
		    $response = $e->getResponse();
		    $responseBodyAsString = $response->getBody()->getContents();
		    print_r($responseBodyAsString);
		  }
	}
	public function view($e) {
		$this->load->view('email/'.$e);
	}
	
}