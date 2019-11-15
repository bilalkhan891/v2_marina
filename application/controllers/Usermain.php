<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Usermain extends CI_Controller {

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

	public function downloadCSV($d = ''){
         error_reporting(0);
		if ($d == 'download' ) {
			$this->load->helper('download'); 

            if($this->marinausername=='sailbristol'){
	            force_download('./assets/fordownload/sailbristol_Convertor.xlsm', NULL);
				$this->session->set_flashdata('msg', '<span class="alert alert-info">File downloading.</span>'); 
				redirect('usermain/downloadcsv');

            } else {
            	 force_download('assets/fordownload/Default_Convertor.xlsm', NULL);
				$this->session->set_flashdata('msg', '<span class="alert alert-info">File downloading.</span>');
				redirect('usermain/downloadcsv');
            }
			
		}

		$order['by'] = 'date';
		$order['order'] = 'DESC';
		$data['locks'] = $this->mm->fetchArr('lockclosures', '', ['marinaid' => (string) $this->session->userdata('marinaid')], NULL, $order);
		$data['tides'] = $this->mm->fetchArr('tides', '', ['marinaid' => (string) $this->session->userdata('marinaid')], NULL, $order);

		$data['msg'] = $this->session->flashdata('msg');
		$data['title'] = 'Tides & Locks Generator';
		$data['view'] = $this->load->view('users/downloadcsv', $data, TRUE);
		$this->load->view('users/usermain', $data);
	}

	public function contactDetails() {

		$marinaid = $this->session->userdata('marinaid');
		$data['data'] = $this->mm->fetchArr('marinas', '', ['id' => $marinaid]);
		$data['msg'] = $this->session->flashdata('msg');
		$data['title'] = 'Marinas';
		$data['view'] = $this->load->view('users/contactdetails', $data, TRUE);
		$this->load->view('users/usermain', $data);
	}
	public function updateContact(){  

		$data['marinaname']  = ($this->input->post('marinaname')) ? $this->input->post('marinaname') : '';
		$data['address']     = ($this->input->post('address')) ? $this->input->post('address') : '';
		$data['address2']    = ($this->input->post('address2')) ? $this->input->post('address2') : '';
		$data['address3']    = ($this->input->post('address3')) ? $this->input->post('address3') : '';
		$data['postcode']    = ($this->input->post('postcode')) ? $this->input->post('postcode') : '';
		$data['contactname'] = ($this->input->post('contactname')) ? $this->input->post('contactname') : '';
		$data['phone']       = ($this->input->post('phone')) ? $this->input->post('phone') : '';
		$data['email']       = ($this->input->post('email')) ? $this->input->post('email') : '';
		$data['web']         = ($this->input->post('web')) ? $this->input->post('web') : '';
		$data['facebook']    = ($this->input->post('facebook')) ? $this->input->post('facebook') : '';
		$data['flickr']      = ($this->input->post('flickr')) ? $this->input->post('flickr') : '';
		$data['twitter']     = ($this->input->post('twitter')) ? $this->input->post('twitter') : '';
		$data['mon-fri']     = ($this->input->post('mon-fri')) ? $this->input->post('mon-fri') : '';
		$data['sat']         = ($this->input->post('sat')) ? $this->input->post('sat') : '';
		$data['sun']         = ($this->input->post('sun')) ? $this->input->post('sun') : '';
		$data['lat']         = ($this->input->post('lat')) ? $this->input->post('lat') : '';
		$data['lon']         = ($this->input->post('lon')) ? $this->input->post('lon') : '';
		$data['security']    = ($this->input->post('security')) ? $this->input->post('security') : '';
		$data['channel']     = ($this->input->post('channel')) ? $this->input->post('channel') : '';
		$data['position']    = ($this->input->post('position')) ? $this->input->post('position') : '';
 

		$insertdata = array( 
		   'marinaname'   => $data['marinaname'], 
		      'address'   => $data['address'],
		     'address2'   => $data['address2'],
		     'address3'   => $data['address3'],
		     'postcode'   => $data['postcode'],
		  'contactname'   => $data['contactname'], 
		        'phone'   => $data['phone'], 
		        'email'   => $data['email'], 
		          'web'   => $data['web'], 
		     'facebook'   => $data['facebook'], 
		       'flickr'   => $data['flickr'], 
		      'twitter'   => $data['twitter'], 
		      'mon-fri'   => $data['mon-fri'], 
		          'sat'   => $data['sat'], 
		          'sun'   => $data['sun'], 
		          'lat'   => $data['lat'], 
		          'lon'   => $data['lon'], 
		     'security'   => $data['security'], 
		      'channel'   => $data['channel'], 
		     'position'   => $data['position'],
		       'apicheck'   => 'no'
		  ); 
 

		if($this->mm->updateRow('marinas',$insertdata, ['id' => $this->session->userdata('marinaid')])) {
			$this->session->set_flashdata('msg', '<span class="alert alert-success">Updated Successfully</span>"');
		} else {
			$this->session->set_flashdata('msg', '<span class="alert alert-danger">Something Went wrong.</span>"');
		}
		redirect('usermain/contactDetails');
	  
	}
  

	function marinas() {

		$data['view'] = $this->load->view('users/calcrates', '', TRUE);
		$this->load->view('users/usermain', $data);
	}

	// admin user details
	public function userlist() {
		$data['data'] = $this->mm->fetchArr('userlogin', '', ['ids_id' => $this->session->userdata('ids_id')]);
		$data['title'] = 'User List';
		$data['msg'] = $this->session->flashdata('msg');

		$data['view'] = $this->load->view('users/userlist', $data, TRUE);
		$this->load->view('users/usermain', $data);
	}

	public function addUser() {
        $marinaId = $this->session->userdata('marinaid');
		$name = ($this->input->post('name')) ? $this->input->post('name') : '';
		$username = ($this->input->post('username')) ? $this->input->post('username') : '';
		$email = ($this->input->post('email')) ? $this->input->post('email') : '';
		$phone = ($this->input->post('phone')) ? $this->input->post('phone') : '';
		//$marinaid = $this->session->userdata('marinaid');

		$ContactDetails = ($this->input->post('ContactDetails')) ? $this->input->post('ContactDetails') : '';
		$BerthingRates = ($this->input->post('BerthingRates')) ? $this->input->post('BerthingRates') : '';
		$UpdateBerthingRates = ($this->input->post('UpdateBerthingRates')) ? $this->input->post('UpdateBerthingRates') : '';
		$LockClosures = ($this->input->post('LockClosures')) ? $this->input->post('LockClosures') : '';
		$TideTimes = ($this->input->post('TideTimes')) ? $this->input->post('TideTimes') : '';
		$PushNotifications = ($this->input->post('PushNotifications')) ? $this->input->post('PushNotifications') : '';
		$TidesLocksGenerator = ($this->input->post('TidesLocksGenerator')) ? $this->input->post('TidesLocksGenerator') : '';


		$password = sha1(($this->input->post('password')) ? $this->input->post('password') : '');

		$data['usernameexists'] = $this->mm->fetchArr('userlogin', '', ['username' => $username]);
		$data['emailnameexists'] = $this->mm->fetchArr('userlogin', '', ['email' => $email]);
		// print_r($data); die;
		$data['data']['name'] = $name;
		$data['data']['username'] = $username;
		$data['data']['password'] = $password;
		if (!empty($data['usernameexists'])) {
			$this->session->set_flashdata('msg', '<span class="alert-danger alert float-left">Username already exists, try another one.</span>');
		} elseif (!empty($data['emailnameexists'])){
			$this->session->set_flashdata('msg', '<span class="alert-danger alert float-left">Email already exists, try another one.</span>');
		} else {

		 $data = array('username' => $username, 'date' => date('Y-m-d'), 'email' => $email, 'name' => $name,  'phone' => $phone, 'status' => 'Approved', 'ids_id' => $this->session->userdata('ids_id'), 'password' => $password, 'marinaid' => $this->session->userdata('marinaid'), 'ContactDetails' => $ContactDetails, 'BerthingRates' => $BerthingRates, 'UpdateBerthingRates' => $UpdateBerthingRates, 'LockClosures' => $LockClosures, 'TideTimes' => $TideTimes, 'TidesLocksGenerator' => $TidesLocksGenerator, 'PushNotifications' => $PushNotifications);
 

<<<<<<< HEAD
		/*$data = array('username' => $username, 'date' => date('Y-m-d'), 'email' => $email, 'name' => $name, 'phone' => $phone, 'status' => 'Approved', 'ids_id' => $this->session->userdata('ids_id'), 'password' => $password, 'marinaid' => $marinaId);*/
=======
		$data = array('username' => $username, 'date' => date('Y-m-d'), 'email' => $email, 'name' => $name, 'role' => $role, 'phone' => $phone, 'status' => 'Approved', 'ids_id' => $this->session->userdata('ids_id'), 'password' => $password, 'marinaid' => $marinaId);
>>>>>>> b9815f022669b365c2a0714d1fd9f9f3214884b6

			if ($this->mm->insertRow('userlogin', $data)) {

				 $this->mailgun($name, $email, $this->load->view('email/createuser', $data, TRUE), 'account created.');

				$this->session->set_flashdata('msg', '<span class="alert-success alert float-left">User added.</span>');
				redirect('usermain/userlist');
			}
		}
		redirect('usermain/userlist');
	}

	function viewemail($name) {

		$data['data']['username'] = '';
		$data['data']['password'] = '';
		$this->load->view('email/'.$name, $data); 	
	}
	public function updateUser() {
		$id = ($this->input->post('id')) ? $this->input->post('id') : '';
		$username = ($this->input->post('username')) ? $this->input->post('username') : '';
		$name = ($this->input->post('name')) ? $this->input->post('name') : ''; 

		$ContactDetails = ($this->input->post('ContactDetails')) ? $this->input->post('ContactDetails') : '';

		$BerthingRates = ($this->input->post('BerthingRates')) ? $this->input->post('BerthingRates') : '';
		$UpdateBerthingRates = ($this->input->post('UpdateBerthingRates')) ? $this->input->post('UpdateBerthingRates') : '';
		$LockClosures = ($this->input->post('LockClosures')) ? $this->input->post('LockClosures') : '';
		$TideTimes = ($this->input->post('TideTimes')) ? $this->input->post('TideTimes') : '';
		$PushNotifications = ($this->input->post('PushNotifications')) ? $this->input->post('PushNotifications') : '';
		$TidesLocksGenerator = ($this->input->post('TidesLocksGenerator')) ? $this->input->post('TidesLocksGenerator') : '';



		$email = ($this->input->post('email')) ? $this->input->post('email') : '';
		$phone = ($this->input->post('phone')) ? $this->input->post('phone') : '';
		$status = ($this->input->post('status')) ? $this->input->post('status') : '';

		$where = array('id' => $id, 'id !=' => '1');
		$data = array('username' => $username, 'date' => date('Y-m-d'), 'email' => $email, 'name' => $name,  'phone' => $phone, 'status' => $status, 'ContactDetails' => $ContactDetails, 'BerthingRates' => $BerthingRates, 'UpdateBerthingRates' => $UpdateBerthingRates, 'LockClosures' => $LockClosures, 'TideTimes' => $TideTimes, 'TidesLocksGenerator' => $TidesLocksGenerator, 'PushNotifications' => $PushNotifications);

		if ($this->mm->updateRow('userlogin', $data, $where)) {
			redirect('usermain/userlist');
		}
	}
	public function deleteUser($id = '') {
		if ($id == 1) {
			$this->session->set_flashdata('msg', '<span class="alert alert-danger">Admin user 1 can\'t be updated.</span>');
			redirect('usermain/userlist');
		}
		if ($this->mm->deleteRow('userlogin', ['id' => $id, 'id !=' => '1'])) {
			$this->session->set_flashdata('msg', '<span class="alert alert-success">User deleted successfully</span>');
		} else {
			$this->session->set_flashdata('msg', '<span class="alert alert-danger">Can\'t delete this user.</span>');
		}
		redirect('usermain/userlist');
	}
 
	public function bristolRates(){
		$data = array();
		$dbValues = $this->mm->fetchArr('bristolRates', '')[0];
		unset($dbValues['id']);
		
		if ($this->input->post( )) {
			
			$data = $this->input->post(); 
			if ($this->input->post('mBoatLength') == 'feet') {
				$data['length'] = $this->input->post('length') * 0.3048; 
			}
			//  dynamic value
			$viewdata['Class_A_Berthing']       = $dbValues['Class_A_Berthing'];
			$viewdata['Class_B_Berthing_Pontoon_Berth']   = $dbValues['Class_B_Berthing_Pontoon_Berth'];
			$viewdata['Pontoon_Per_Metre']    = $dbValues['Pontoon_Per_Metre'];
			$viewdata['Club_Pontoon']     = $dbValues['Club_Pontoon'];
			$viewdata['Temple_Quay_Without_Services']   = $dbValues['Temple_Quay_Without_Services'];
			$viewdata['Temple_Quay_With_Services']      = $dbValues['Temple_Quay_With_Services'];
			$viewdata['Pontoon_Temple_Back']  = $dbValues['Pontoon_Temple_Back'];
			$viewdata['Winter_Berth']     = $dbValues['Winter_Berth'];
			$viewdata['Pontoon_Hanover_Quay']     = $dbValues['Pontoon_Hanover_Quay'];
			// .dynamic values
			
			$data['length'] = round($data['length'] * 2) / 2;
            if ($data['length'] < $dbValues['Minimum_Boat_Length_Charges']) {
                $data['length'] = $dbValues['Minimum_Boat_Length_Charges'];
            }
            echo $data['length'] ."  Minimum Boat Length: ". $dbValues['Minimum_Boat_Length_Charges']; die;
			if ($data['btype'] == 'Visiting') {
			    $ek     = 1.95; 
			    $do     = 1.65; 
			    $teen   = 1.26;
			    $char   = 0.93;
			    $res['Number of Days'] = $data['days'] . " Days";
			    $res['Rounded Boat Length'] = $data['length'] . "m" ;
			    if ($data['days'] == 1 &&  $data['multihull']=="No")   { 
			        $res['Payment'] = "£".number_format($data['length']*$ek, 2, '.', '');
			    } elseif ($data['days'] == 1 &&  $data['multihull']=="Yes")  { 
			        $res['Payment'] = "£".number_format($data['length']*$ek*1.5, 2, '.', '');
			    } elseif ($data['days'] < 8 &&  $data['multihull']=="No")    { 
			        $res['Payment'] = "£".number_format($data['length']*$do*$data['days'], 2, '.', '');
			    } elseif ($data['days'] < 8 &&  $data['multihull']=="Yes")   { 
			        $res['Payment'] = "£".number_format($data['length']*$do*1.5*$data['days'], 2, '.', '');
			    } elseif ($data['days'] < 15 &&  $data['multihull']=="No")   { 
			        $res['Payment'] = "£".number_format($data['length']*$teen*$data['days'], 2, '.', '');
			    } elseif ($data['days'] < 15 &&  $data['multihull']=="Yes")  { 
			        $res['Payment'] = "£".number_format($data['length']*$teen*1.5*$data['days'], 2, '.', '');
			    } elseif ($data['days'] < 22 &&  $data['multihull']=="No")   { 
			        $res['Payment'] = "£".number_format($data['length']*$char*$data['days'], 2, '.', '');
			    } elseif ($data['days'] < 22 &&  $data['multihull']=="Yes")  { 
			        $res['Payment'] = "£".number_format($data['length']*$char*1.5*$data['days'], 2, '.', '');
			    } else {
			        $res['Payment'] = 'Days more then 21';
			    }

			} elseif($data['btype'] == 'Annual') {
 
			    $res["Multi Hull"] = "No";
			    $res["Rounded Boat Length"] = $data['length'] . "m"; 
			    $res['Class A Berthing']        = "£".number_format($viewdata['Class_A_Berthing']*$data['length'], 2, '.', '');
			    $res['Class B Berthing Pontoon Berth']      = "£".number_format($viewdata['Class_B_Berthing_Pontoon_Berth']*$data['length'], 2, '.', '');
			    $res['Pontoon Per Metre']       = "£".number_format($viewdata['Pontoon_Per_Metre']*$data['length'], 2, '.', '');
			    $res['Club Pontoon']        = "£".number_format($viewdata['Club_Pontoon']*$data['length'], 2, '.', '');
			    $res['Temple Quay Without Services']        = "£".number_format($viewdata['Temple_Quay_Without_Services']*$data['length'], 2, '.', '');
			    $res['Temple Quay With Services']       = "£".number_format($viewdata['Temple_Quay_With_Services']*$data['length'], 2, '.', '');
			    $res['Pontoon Temple Back']         = "£".number_format($viewdata['Pontoon_Temple_Back']*$data['length'], 2, '.', '');
			    $res['Winter Berth']        = "£".number_format($viewdata['Winter_Berth']*$data['length'], 2, '.', '');
			    $res['Pontoon Hanover Quay']        = "£".number_format($viewdata['Pontoon_Hanover_Quay']*$data['length'], 2, '.', '');

			    if ($data['multihull'] == 'Yes') {
			        
			        $res["Multi Hull"] = "Yes";
			        $res["Rounded Boat Length"] = $data['length'] . "m"; 
			        $res['Class A Berthing'] = "£".number_format($res['Class A Berthing']*1.5, 2, '.', '');
			        $res['Class B Berthing Pontoon Berth'] = "£".number_format($res['Class B Berthing Pontoon Berth']*1.5, 2, '.', '');
			        $res['Pontoon Per Metre'] = "£".number_format($res['Pontoon Per Metre']*1.5, 2, '.', '');
			        $res['Club Pontoon'] = "£".number_format($res['Club Pontoon']*1.5, 2, '.', '');
			        $res['Temple Quay Without Services'] = "£".number_format($res['Temple Quay Without Services']*1.5, 2, '.', '');
			        $res['Temple Quay With Services'] = "£".number_format($res['Temple Quay With Services']*1.5, 2, '.', '');
			        $res['Pontoon Temple Back'] = "£".number_format($res['Pontoon Temple Back']*1.5, 2, '.', '');
			        $res['Winter Berth'] = "£".number_format($res['Winter Berth']*1.5, 2, '.', '');
			        $res['Pontoon Hanover Quay'] = "£".number_format($res['Pontoon Hanover Quay']*1.5, 2, '.', '');
			    }
			}
			$data['dbValues'] = $dbValues;
			$data['res'] = $res;
			$data['msg'] = $this->session->flashdata('msg');
			$view['view'] = $this->load->view('users/bristolrates', $data, TRUE);
			$this->load->view('users/usermain', $view);
			return;
		}
		$data['dbValues'] = $dbValues;
		$data['msg'] = $this->session->flashdata('msg');
		$view['view'] = $this->load->view('users/bristolrates', $data, TRUE);
		$this->load->view('users/usermain', $view);

	}

	public function updatebristolrates(){
		
		$postValues = $this->input->post();  
		if ($this->mm->updateRow('bristolRates', $postValues, ['id' => 1])) {
			$this->session->set_flashdata('msg', '<span class="alert alert-success">Values updated successfully.</span>');
		} else {
			$this->session->set_flashdata('msg', '<span class="alert alert-danger">Something went wrong.</span>');
		}
		redirect('usermain/mRates','refresh');
	}

	public function mRates() {
		 
		switch ($this->marinausername) {
			case 'sailbristol':
				$this->bristolRates();
				return;
				break; 
		}

		$data['data']['annual'] = $this->mm->fetchArr('annual', '', ['marinaid' => $this->session->userdata('marinaid')]);
		$data['data']['summer'] = $this->mm->fetchArr('summer', '', ['marinaid' => $this->session->userdata('marinaid')]);
		$data['data']['winter'] = $this->mm->fetchArr('winter', '', ['marinaid' => $this->session->userdata('marinaid')]);
		$data['data']['visitor'] = $this->mm->fetchArr('visitor', '', ['marinaid' => $this->session->userdata('marinaid')]);
		$data['data']['harbour'] = $this->mm->fetchArr('harbour', '', ['marinaid' => $this->session->userdata('marinaid')]);
		$data['data']['storage'] = $this->mm->fetchArr('storage', '', ['marinaid' => $this->session->userdata('marinaid')]);
		$data['data']['hoist'] = $this->mm->fetchArr('hoist', '', ['marinaid' => $this->session->userdata('marinaid')]);
		$data['data']['electricity'] = $this->mm->fetchArr('electricity', '', ['marinaid' => $this->session->userdata('marinaid')]);
		$data['data']['vatrates'] = $this->mm->fetchArr('vatrates', '', ['marinaid' => $this->session->userdata('marinaid')]);
		$data['data']['premiumsanddiscounts'] = $this->mm->fetchArr('premiumsanddiscounts', '', ['marinaid' => $this->session->userdata('marinaid')]);
		$data['data']['creditcardsurcharge'] = $this->mm->fetchArr('creditcardsurcharge', '', ['marinaid' => $this->session->userdata('marinaid')]);

		$view['view'] = $this->load->view('users/mrates', $data, TRUE);
		$this->load->view('users/usermain', $view);
	}

	public function updateRates() {

		// Vat Rates
		$data['vatratesid'] = $this->input->post('vatratesid');
		$data['vatratesnormal'] = $this->input->post('vatratesnormal');
		$data['heatingFuel'] = $this->input->post('heatingFuel');

		$where = array('id' => $data['vatratesid']);
		$values = array(
			'normal' => $data['vatratesnormal'],
			'heatingFuel' => $data['heatingFuel'],
		);
		$this->mm->updateRow('vatrates', $values, $where);

		// Premium and Discount Rates
		$data['premiumsanddiscountsid'] = $this->input->post('premiumsanddiscountsid');
		$data['TUdiscounts'] = $this->input->post('TUdiscounts');
		$data['90daysPremium'] = $this->input->post('90daysPremium');
		$data['largeBoatLength'] = $this->input->post('largeBoatLength');
		$data['largeBoatPremium'] = $this->input->post('largeBoatPremium');

		$where = array('id' => $data['premiumsanddiscountsid']);
		$values = array(
			'TUdiscounts' => $data['TUdiscounts'],
			'90daysPremium' => $data['90daysPremium'],
			'largeBoatLength' => $data['largeBoatLength'],
			'largeBoatPremium' => $data['largeBoatPremium'],
		);
		$this->mm->updateRow('premiumsanddiscounts', $values, $where);

		// Credit card surcharge values
		$data['creditcardsurchargeid'] = $this->input->post('creditcardsurchargeid');
		$data['ccSurcharge'] = $this->input->post('ccSurcharge');

		$where = array('id' => $data['creditcardsurchargeid']);
		$values = array(
			'ccSurcharge' => $data['ccSurcharge'],
		);
		$this->mm->updateRow('creditcardsurcharge', $values, $where);

		// Annual Values
		$data['annualid'] = $this->input->post('annualid');
		$data['singlePayment'] = $this->input->post('singlePayment');
		$data['installments'] = $this->input->post('installments');
		$data['smallBoatsSingle'] = $this->input->post('smallBoatsSingle');
		$data['smallBoatsInstallments'] = $this->input->post('smallBoatsInstallments');
		$data['airberth'] = $this->input->post('airberth');

		$where = array('id' => $data['annualid']);
		$values = array(
			'singlePayment' => $data['singlePayment'],
			'installments' => $data['installments'],
			'smallBoatsSingle' => $data['smallBoatsSingle'],
			'smallBoatsInstallments' => $data['smallBoatsInstallments'],
			'airberth' => $data['airberth'],
		);
		$this->mm->updateRow('annual', $values, $where);

		// SEASONAL (SUMMER) Values
		$data['summerid'] = $this->input->post('summerid');
		$data['summer3months'] = $this->input->post('summer3months');
		$data['summer4months'] = 4 * ($data['summer3months'] / 3);
		$data['summer5months'] = 5 * ($data['summer3months'] / 3);
		$data['summer6months'] = 6 * ($data['summer3months'] / 3);
		$data['summer90days'] = ((1 + ($data['90daysPremium'] * $data['summer3months']) / 100) + $data['summer3months']) - 1;
		$data['summersb3months'] = $this->input->post('summersb3months');
		$data['summersb4months'] = 4 * ($data['summersb3months'] / 3);
		$data['summersb5months'] = 5 * ($data['summersb3months'] / 3);
		$data['summersb6months'] = 6 * ($data['summersb3months'] / 3);
		$data['summersb90days'] = ((1 + ($data['summersb3months'] * $data['90daysPremium']) / 100) + $data['summersb3months']) - 1;

		$where = array('id' => $data['summerid']);
		$values = array(
			'3months' => $data['summer3months'],
			'4months' => $data['summer4months'],
			'5months' => $data['summer5months'],
			'6months' => $data['summer6months'],
			'90days' => $data['summer90days'],
			'sb3months' => $data['summersb3months'],
			'sb4months' => $data['summersb4months'],
			'sb5months' => $data['summersb5months'],
			'sb6months' => $data['summersb6months'],
			'sb90days' => $data['summersb90days'],
		);
		$this->mm->updateRow('summer', $values, $where);

		// SEASONAL (Winter) Values
		$data['winterid'] = $this->input->post('winterid');
		$data['winter3months'] = $this->input->post('winter3months');
		$data['winter4months'] = 4 * ($data['winter3months'] / 3);
		$data['winter5months'] = 5 * ($data['winter3months'] / 3);
		$data['winter6months'] = 6 * ($data['winter3months'] / 3);
		$data['wintersb3months'] = $this->input->post('wintersb3months');
		$data['wintersb4months'] = 4 * ($data['wintersb3months'] / 3);
		$data['wintersb5months'] = 5 * ($data['wintersb3months'] / 3);
		$data['wintersb6months'] = 6 * ($data['wintersb3months'] / 3);

		$where = array('id' => $data['winterid']);
		$values = array(
			'3months' => $data['winter3months'],
			'4months' => $data['winter4months'],
			'5months' => $data['winter5months'],
			'6months' => $data['winter6months'],
			'sb3months' => $data['wintersb3months'],
			'sb4months' => $data['wintersb4months'],
			'sb5months' => $data['wintersb5months'],
			'sb6months' => $data['wintersb6months'],
		);
		$this->mm->updateRow('winter', $values, $where);

		// Visitor Values
		$data['visitorid'] = $this->input->post('visitorid');
		$data['visitordaily'] = $this->input->post('visitordaily');
		$data['visitorweekly'] = $this->input->post('visitorweekly');
		$data['visitor4weeks'] = $this->input->post('visitor4weeks');
		$data['visitor28day'] = $this->input->post('visitor28day');

		$where = array('id' => $data['visitorid']);
		$values = array(
			'daily' => $data['visitordaily'],
			'weekly' => $data['visitorweekly'],
			'4weeks' => $data['visitor4weeks'],
			'28day' => $data['visitor28day'],
		);
		$this->mm->updateRow('visitor', $values, $where);

		// TAWE + HARBOUR DUES Values
		$data['harbourid'] = $this->input->post('harbourid');
		$data['harbourannual'] = $this->input->post('harbourannual');
		$data['harbour6months'] = round(6 * ($data['harbourannual'] / 12), 2);
		$data['harbour5months'] = round(5 * ($data['harbourannual'] / 12), 2);
		$data['harbour4months'] = round(4 * ($data['harbourannual'] / 12), 2);
		$data['harbour3months'] = round(3 * ($data['harbourannual'] / 12), 2);
		$data['harbourdues'] = $this->input->post('harbourdues');

		$where = array('id' => $data['harbourid']);
		$values = array(
			'annual' => $data['harbourannual'],
			'6months' => $data['harbour6months'],
			'5months' => $data['harbour5months'],
			'4months' => $data['harbour4months'],
			'3months' => $data['harbour3months'],
			'harbourdues' => $data['harbourdues'],
		);
		$this->mm->updateRow('harbour', $values, $where);

		// Storage Values
		$data['storageid'] = $this->input->post('storageid');
		$data['storageweekly'] = $this->input->post('storageweekly');

		$where = array('id' => $data['storageid']);
		$values = array('weekly' => $data['storageweekly']);
		$this->mm->updateRow('storage', $values, $where);

		// Hoist Values
		$data['hoistid'] = $this->input->post('hoistid');
		$data['liftout_61_76'] = $this->input->post('liftout_61_76');
		$data['liftout_77_25'] = $this->input->post('liftout_77_25');
		$data['launchoff_61_76'] = $this->input->post('launchoff_61_76');
		$data['launchoff_77_25'] = $this->input->post('launchoff_77_25');
		$data['2week_61_76'] = $this->input->post('2week_61_76');
		$data['2week_77_25'] = $this->input->post('2week_77_25');
		$data['lhr_1hr'] = $this->input->post('lhr_1hr');
		$data['lhr_2hr'] = $this->input->post('lhr_2hr');
		$data['tow'] = $this->input->post('tow');
		$data['step_mast'] = $this->input->post('step_mast');
		$data['demast'] = $this->input->post('demast');
		$data['liftengine'] = $this->input->post('liftengine');
		$data['boatMover'] = $this->input->post('boatMover');
		$data['dinghyLaunch'] = $this->input->post('dinghyLaunch');

		$where = array('id' => $data['hoistid']);
		$values = array(
			'liftout_61_76' => $data['liftout_61_76'],
			'liftout_77_25' => $data['liftout_77_25'],
			'launchoff_61_76' => $data['launchoff_61_76'],
			'launchoff_77_25' => $data['launchoff_77_25'],
			'2week_61_76' => $data['2week_61_76'],
			'2week_77_25' => $data['2week_77_25'],
			'lhr_1hr' => $data['lhr_1hr'],
			'lhr_2hr' => $data['lhr_2hr'],
			'tow' => $data['tow'],
			'step_mast' => $data['step_mast'],
			'demast' => $data['demast'],
			'liftengine' => $data['liftengine'],
			'boatMover' => $data['boatMover'],
			'dinghyLaunch' => $data['dinghyLaunch'],
		);
		$this->mm->updateRow('hoist', $values, $where);

		// Electricity
		$data['electricityid'] = $this->input->post('electricityid');
		$data['mainsline'] = $this->input->post('mainsline');

		$where = array('id' => $data['electricityid']);
		$values = array('ccSurcharge' => $data['mainsline']);
		$this->mm->updateRow('creditcardsurcharge', $values, $where);
		redirect('usermain/mrates');
	}

	public function calcrates() {

		$data['data']['annual'] = $this->mm->fetchArr('annual', '', ['marinaid' => $this->session->userdata('marinaid')]);
		$data['data']['summer'] = $this->mm->fetchArr('summer', '', ['marinaid' => $this->session->userdata('marinaid')]);
		$data['data']['winter'] = $this->mm->fetchArr('winter', '', ['marinaid' => $this->session->userdata('marinaid')]);
		$data['data']['visitor'] = $this->mm->fetchArr('visitor', '', ['marinaid' => $this->session->userdata('marinaid')]);
		$data['data']['harbour'] = $this->mm->fetchArr('harbour', '', ['marinaid' => $this->session->userdata('marinaid')]);
		$data['data']['storage'] = $this->mm->fetchArr('storage', '', ['marinaid' => $this->session->userdata('marinaid')]);
		$data['data']['hoist'] = $this->mm->fetchArr('hoist', '', ['marinaid' => $this->session->userdata('marinaid')]);
		$data['data']['electricity'] = $this->mm->fetchArr('electricity', '', ['marinaid' => $this->session->userdata('marinaid')]);
		$data['data']['vatrates'] = $this->mm->fetchArr('vatrates', '', ['marinaid' => $this->session->userdata('marinaid')]);
		$data['data']['premiumsanddiscounts'] = $this->mm->fetchArr('premiumsanddiscounts', '', ['marinaid' => $this->session->userdata('marinaid')]);
		$data['data']['creditcardsurcharge'] = $this->mm->fetchArr('creditcardsurcharge', '', ['marinaid' => $this->session->userdata('marinaid')]);
		// print_r($data['data']['annual'][0]); die;

		$lbprem = $data['data']['premiumsanddiscounts'][0]['largeBoatPremium'];
		$condition = $data['data']['premiumsanddiscounts'][0]['largeBoatLength'];
		$discount = $data['data']['premiumsanddiscounts'][0]['TUdiscounts'];

		$ann = $data['data']['annual'][0]['singlePayment'];
		$sb = $data['data']['annual'][0]['smallBoatsSingle'];
		$sbi = $data['data']['annual'][0]['smallBoatsInstallments'];
		$abata = $data['data']['annual'][0]['airberth'];
		$anni = $data['data']['annual'][0]['installments'];

		$hd = $data['data']['harbour'][0]['harbourdues'];
		$tawe3 = $data['data']['harbour'][0]['3months'];
		$tawe4 = $data['data']['harbour'][0]['4months'];
		$tawe5 = $data['data']['harbour'][0]['5months'];
		$tawe5 = $data['data']['harbour'][0]['5months'];
		$tawe6 = $data['data']['harbour'][0]['6months'];
		$tawe12 = $data['data']['harbour'][0]['annual'];

		$vat = $data['data']['vatrates'][0]['normal'];

		$sum3 = $data['data']['summer'][0]['3months'];
		$sum4 = $data['data']['summer'][0]['4months'];
		$sum5 = $data['data']['summer'][0]['5months'];
		$sum6 = $data['data']['summer'][0]['6months'];
		$days90 = $data['data']['summer'][0]['90days'];
		$sbsum3 = $data['data']['summer'][0]['sb3months'];
		$sbsum4 = $data['data']['summer'][0]['sb4months'];
		$sbsum5 = $data['data']['summer'][0]['sb5months'];
		$sbsum6 = $data['data']['summer'][0]['sb6months'];
		$sbdays90 = $data['data']['summer'][0]['sb90days'];

		$win3 = $data['data']['winter'][0]['3months'];
		$win4 = $data['data']['winter'][0]['4months'];
		$win5 = $data['data']['winter'][0]['5months'];
		$win6 = $data['data']['winter'][0]['6months'];
		$sbwin3 = $data['data']['winter'][0]['sb3months'];
		$sbwin4 = $data['data']['winter'][0]['sb4months'];
		$sbwin5 = $data['data']['winter'][0]['sb5months'];
		$sbwin6 = $data['data']['winter'][0]['sb6months'];

		$visd = $data['data']['visitor'][0]['daily'];
		$visw = $data['data']['visitor'][0]['weekly'];
		$vism = $data['data']['visitor'][0]['4weeks'];
		$vis28bun = $data['data']['visitor'][0]['28day'];

		$boatLength = $this->input->post('boatLength');
		$mBoatLength = $this->input->post('mBoatLength');

		$loa = round(($mBoatLength == 'meter') ? $boatLength : (double) $boatLength / 3.2808, 1);
		//echo $lbprem; die;
		// echo   round( ( ( (  $ann * $loa ) + $hd ) * ( 1 + ( $vat/100 ) ) ) + $tawe12, 2 ); die;
		//echo  ( ( 1 + ( $lbprem/100 )  ) * $ann  *  $boatLength); die;

		$loa = ($loa <= 6.1) ? 6.1 : $loa;

		$calc['data']['boatLength'] = $loa . 'M';

		if ($loa > 6.1) {

			if ($loa >= $condition) {

				$calc['data']['value1'] = number_format(round((((((1 + $lbprem / 100) * $ann * $loa)) + $hd) * (1 + $vat / 100)) + $tawe12, 2), 2, '.', '');
				$calc['data']['value2'] = number_format(round((((((1 + ($lbprem / 100)) * $anni * $loa)) + $hd) * (1 + ($vat / 100))) + $tawe12, 2), 2, '.', '');
				$calc['data']['value3'] = number_format(round((((((1 - $discount / 100 + $lbprem / 100) * $ann * $loa)) + $hd) * (1 + ($vat / 100))) + $tawe12, 2), 2, '.', '');
				$calc['data']['value4'] = number_format(round((((((1 - $discount / 100 + $lbprem / 100) * $anni * $loa)) + $hd) * (1 + ($vat / 100))) + $tawe12, 2), 2, '.', '');

				$calc['data']['value10'] = number_format(round((((((1 + ($lbprem / 100)) * $sum3 * $loa)) + $hd) * (1 + ($vat / 100))) + $tawe3, 2), 2, '.', '');
				$calc['data']['value11'] = number_format(round((((((1 + ($lbprem / 100)) * $sum4 * $loa)) + $hd) * (1 + ($vat / 100))) + $tawe4, 2), 2, '.', '');
				$calc['data']['value12'] = number_format(round((((((1 + ($lbprem / 100)) * $sum5 * $loa)) + $hd) * (1 + ($vat / 100))) + $tawe5, 2), 2, '.', '');
				$calc['data']['value13'] = number_format(round((((((1 + ($lbprem / 100)) * $sum6 * $loa)) + $hd) * (1 + ($vat / 100))) + $tawe6, 2), 2, '.', '');
				$calc['data']['value14'] = number_format(round((((((1 + ($lbprem / 100)) * $days90 * $loa)) + $hd) * (1 + ($vat / 100))) + $tawe3, 2), 2, '.', '');

				$calc['data']['value15'] = number_format(round((((((1 + ($lbprem / 100)) * $win3 * $loa)) + $hd) * (1 + ($vat / 100))) + $tawe3, 2), 2, '.', '');
				$calc['data']['value16'] = number_format(round((((((1 + ($lbprem / 100)) * $win4 * $loa)) + $hd) * (1 + ($vat / 100))) + $tawe4, 2), 2, '.', '');
				$calc['data']['value17'] = number_format(round((((((1 + ($lbprem / 100)) * $win5 * $loa)) + $hd) * (1 + ($vat / 100))) + $tawe5, 2), 2, '.', '');
				$calc['data']['value18'] = number_format(round((((((1 + ($lbprem / 100)) * $win6 * $loa)) + $hd) * (1 + ($vat / 100))) + $tawe6, 2), 2, '.', '');

			} else {

				$calc['data']['value1'] = number_format(round(((($ann * $loa) + $hd) * (1 + ($vat / 100))) + $tawe12, 2), 2, '.', '');
				// $calc['data']['value1'] = number_format( round( ( ( (  $ann * $loa ) + $hd ) * ( 1 + ( $vat/100 ) ) ) + $tawe12, 2 ) , 2, '.', '');
				$calc['data']['value2'] = number_format(round(((($anni * $loa) + $hd) * (1 + ($vat / 100))) + $tawe12, 2), 2, '.', '');
				$calc['data']['value3'] = number_format(round(((((1 - $discount / 100) * $ann * $loa) + $hd) * (1 + ($vat / 100))) + $tawe12, 2), 2, '.', '');
				$calc['data']['value4'] = number_format(round(((((1 - $discount / 100) * $anni * $loa) + $hd) * (1 + ($vat / 100))) + $tawe12, 2), 2, '.', '');

				$calc['data']['value10'] = number_format(round(((($sum3 * $loa) + $hd) * (1 + ($vat / 100))) + $tawe3, 2), 2, '.', '');
				$calc['data']['value11'] = number_format(round(((($sum4 * $loa) + $hd) * (1 + ($vat / 100))) + $tawe4, 2), 2, '.', '');
				$calc['data']['value12'] = number_format(round(((($sum5 * $loa) + $hd) * (1 + ($vat / 100))) + $tawe5, 2), 2, '.', '');
				$calc['data']['value13'] = number_format(round(((($sum6 * $loa) + $hd) * (1 + ($vat / 100))) + $tawe6, 2), 2, '.', '');
				$calc['data']['value14'] = number_format(round(((($days90 * $loa) + $hd) * (1 + ($vat / 100))) + $tawe3, 2), 2, '.', '');

				$calc['data']['value15'] = number_format(round(((($win3 * $loa) + $hd) * (1 + ($vat / 100))) + $tawe3, 2), 2, '.', '');
				$calc['data']['value16'] = number_format(round(((($win4 * $loa) + $hd) * (1 + ($vat / 100))) + $tawe4, 2), 2, '.', '');
				$calc['data']['value17'] = number_format(round(((($win5 * $loa) + $hd) * (1 + ($vat / 100))) + $tawe5, 2), 2, '.', '');
				$calc['data']['value18'] = number_format(round(((($win6 * $loa) + $hd) * (1 + ($vat / 100))) + $tawe6, 2), 2, '.', '');

			}

		} else {

			$calc['data']['value1'] = "N/A";
			$calc['data']['value2'] = "N/A";
			$calc['data']['value3'] = "N/A";
			$calc['data']['value4'] = "N/A";

			$calc['data']['value10'] = "N/A";
			$calc['data']['value11'] = "N/A";
			$calc['data']['value12'] = "N/A";
			$calc['data']['value13'] = "N/A";
			$calc['data']['value14'] = "N/A";

			$calc['data']['value15'] = "N/A";
			$calc['data']['value16'] = "N/A";
			$calc['data']['value17'] = "N/A";
			$calc['data']['value18'] = "N/A";
		}

		if ($loa == 6.1) {

			$calc['data']['value5'] = number_format(round((($sb + $hd) * (1 + ($vat / 100))) + $tawe12, 2), 2, '.', '');
			$calc['data']['value6'] = number_format(round((($sbi + $hd) * (1 + ($vat / 100))) + $tawe12, 2), 2, '.', '');
			$calc['data']['value7'] = number_format(round((($sb * (1 - $discount / 100) + $hd) * (1 + ($vat / 100))) + $tawe12, 2), 2, '.', '');
			$calc['data']['value8'] = number_format(round((($sbi * (1 - $discount / 100) + $hd) * (1 + ($vat / 100))) + $tawe12, 2), 2, '.', '');

			$calc['data']['value19'] = number_format(round((($sbsum3 + $hd) * (1 + ($vat / 100))) + $tawe3, 2), 2, '.', '');
			$calc['data']['value20'] = number_format(round((($sbsum4 + $hd) * (1 + ($vat / 100))) + $tawe4, 2), 2, '.', '');
			$calc['data']['value21'] = number_format(round((($sbsum5 + $hd) * (1 + ($vat / 100))) + $tawe5, 2), 2, '.', '');
			$calc['data']['value22'] = number_format(round((($sbsum6 + $hd) * (1 + ($vat / 100))) + $tawe6, 2), 2, '.', '');
			$calc['data']['value23'] = number_format(round((($sbdays90 + $hd) * (1 + ($vat / 100))) + $tawe3, 2), 2, '.', '');

			$calc['data']['value24'] = number_format(round((($sbwin3 + $hd) * (1 + ($vat / 100))) + $tawe3, 2), 2, '.', '');
			$calc['data']['value25'] = number_format(round((($sbwin4 + $hd) * (1 + ($vat / 100))) + $tawe4, 2), 2, '.', '');
			$calc['data']['value26'] = number_format(round((($sbwin5 + $hd) * (1 + ($vat / 100))) + $tawe5, 2), 2, '.', '');
			$calc['data']['value27'] = number_format(round((($sbwin6 + $hd) * (1 + ($vat / 100))) + $tawe6, 2), 2, '.', '');

		} else {

			$calc['data']['value5'] = "N/A";
			$calc['data']['value6'] = "N/A";
			$calc['data']['value7'] = "N/A";
			$calc['data']['value8'] = "N/A";

			$calc['data']['value24'] = "N/A";
			$calc['data']['value25'] = "N/A";
			$calc['data']['value26'] = "N/A";
			$calc['data']['value27'] = "N/A";

			$calc['data']['value19'] = "N/A";
			$calc['data']['value20'] = "N/A";
			$calc['data']['value21'] = "N/A";
			$calc['data']['value22'] = "N/A";
			$calc['data']['value23'] = "N/A";

		}

		$calc['data']['value9'] = number_format(round($abata * (1 + $vat / 100), 2), 2, '.', '');

		$calc['data']['value28'] = number_format(round(($visd * $loa) * (1 + $vat / 100), 2), 2, '.', '');
		$calc['data']['value29'] = number_format(round(($visw * $loa) * (1 + $vat / 100), 2), 2, '.', '');
		$calc['data']['value30'] = number_format(round(($vism * $loa) * (1 + $vat / 100), 2), 2, '.', '');
		$calc['data']['value31'] = number_format(round(($vis28bun * $loa) * (1 + $vat / 100), 2), 2, '.', '');

		// echo '<style>body{ white-space: pre-wrap; }</style>';
		// echo "<pre>";
		// echo json_encode($calc['data'], JSON_PRETTY_PRINT);
		$calc['title'] = 'Rates';
		$calc['view'] = $this->load->view('users/calcrates', $calc, TRUE);
		$this->load->view('users/usermain', $calc);
	}

	public function lockclosures() {


		if ($this->session->userdata('marinausername') == 'sailbristol') {
			$order['by'] = 'date';
			$order['order'] = 'ASC';

			$data['data'] = $this->mm->fetchArr('bristollocks', '', ['date >=' => date('Y-m-d'), 'date <=' => Date('Y-m-d', strtotime("+3 months"))], NULL, $order);
			// print_r($data['data']);

			$data['msg'] = $this->session->flashdata('msg');
			$data['title'] = 'Bristol Lock Closures';
			$data['marinaId'] = $this->session->userdata('marinaid');
			$data['view'] = $this->load->view('users/bristollocks', $data, TRUE);
			$data['view'] = $this->load->view('users/usermain', $data);
			return;
		}

		$order['by'] = 'date';
		$order['order'] = 'ASC';
		$data['marinaId'] = $this->session->userdata('marinaid');
		$data['data'] = $this->mm->fetchArr('lockclosures', '', ['marinaid' => (string) $this->session->userdata('marinaid'), 'date >=' => date('Y-m-d'), 'date <=' => Date('Y-m-d', strtotime("+3 months"))], NULL, $order);
		// print_r($data['data']);

		$data['msg'] = $this->session->flashdata('msg');
		$data['title'] = 'Lock Closures';
		$data['view'] = $this->load->view('users/lockclosures', $data, TRUE);
		$data['view'] = $this->load->view('users/usermain', $data);

	}

	public function addClosures() {
		$day = ($this->input->post('day')) ? $this->input->post('day') : '';
		$date = ($this->input->post('date')) ? $this->input->post('date') : '';
		$lockclosure = ($this->input->post('lockclosure')) ? $this->input->post('lockclosure') : '';
		$close = ($this->input->post('close')) ? $this->input->post('close') : '';
		$reopen = ($this->input->post('reopen')) ? $this->input->post('reopen') : '';

		$data = array(
			'day' => $day,
			'date' => $date,
			'lockclosure' => $lockclosure,
			'close' => $close,
			'reopen' => $reopen,
			'marinaid' => $this->session->userdata('marinaid'),
		);
		// print_r($data);die;
		if ($this->mm->insertRow('lockclosures', $data)) {
			$this->session->set_flashdata('msg', '<span class="alert alert-success">Record Added Successfully</span>');
			redirect('usermain/lockclosures');
		}
		$this->session->set_flashdata('msg', '<span class="alert alert-danger">Could not add Record</span>');
		redirect('usermain/lockclosures');
	}

	public function deleteClosures($id = null) {

		// print_r($this->session->userdata('marinaid'));die;
		if ($this->session->userdata('marinausername') == 'sailbristol') {
			$this->mm->deleteRow('bristollocks', ['id' => $id]);
			$this->session->set_flashdata('msg', '<span class="alert alert-success">Record Deleted Successfully</span>');
		} elseif ($this->mm->deleteRow('lockclosures', ['id' => $id])) {
			$this->session->set_flashdata('msg', '<span class="alert alert-success">Record Deleted Successfully</span>');
			redirect('usermain/lockclosures');
		} 
		redirect('usermain/lockclosures');
	}

	public function tides() {
		$order['by'] = 'date';
		$order['order'] = 'ASC';

		$data['data'] = $this->mm->fetchArr('tides', '', ['marinaid' => (string) $this->session->userdata('marinaid'), 'date >=' => date('Y-m-d'), 'date <=' => Date('Y-m-d', strtotime("+3 months"))], NULL, $order);
		// print_r($data['data']);

		$data['msg'] = $this->session->flashdata('msg');
		$data['title'] = 'Tides';
		$data['view'] = $this->load->view('users/tides', $data, TRUE);
		$data['view'] = $this->load->view('users/usermain', $data);

	}

	public function addtide() {
		$day = ($this->input->post('day')) ? $this->input->post('day') : '';
		$date = ($this->input->post('date')) ? $this->input->post('date') : '';
		$time = ($this->input->post('time')) ? $this->input->post('time') : '';
		$height = ($this->input->post('height')) ? $this->input->post('height') : '';
		$state = ($this->input->post('state')) ? $this->input->post('state') : '';

		$data = array(
			'day' => $day,
			'date' => $date,
			'time' => $time,
			'height' => $height,
			'state' => $state,
			'marinaid' => $this->session->userdata('marinaid'),
		);
		// print_r($data);die;
		if ($this->mm->insertRow('tides', $data)) {
			$this->session->set_flashdata('msg', '<span class="alert alert-success">Record Added Successfully</span>');
			redirect('usermain/tides');
		}
		$this->session->set_flashdata('msg', '<span class="alert alert-danger">Could not add Record</span>');
		redirect('usermain/tides');
	}

	public function deletetide($id) {

		// print_r($this->session->userdata('marinaid'));die;

		if ($this->mm->deleteRow('tides', ['id' => $id])) {
			$this->session->set_flashdata('msg', '<span class="alert alert-success">Record Deleted Successfully</span>');
			redirect('usermain/tides');
		}
		$this->session->set_flashdata('msg', '<span class="alert alert-danger">Could not delete Record</span>');
		redirect('usermain/tides');
	}
 
	function importtides() {

		$this->load->library('csvimport');

		$data = $this->csvimport->get_array($_FILES['userfile']['tmp_name']);
		// echo '<pre>';
		// print_r($data);die;
		$success = 0;
		$fail = 0;
		foreach ($data as $row) {
			$date = explode('-', $row['Date']);
			if (isset($date[2])) {

			} else {
				$date = explode('/', $row['Date']);
				if (isset($date[2])) {

				} else {
					$this->session->set_flashdata('msg', '<span class="alert alert-danger">Date format is not correct. Date should be <strong>(dd-mm-yyyy)</strong></span>');
					redirect('usermain/tides');
				}
			}
			// print_r($date);die;

			$replace = array('/', ' ', ':');
			$date = str_replace($replace, '-', $row['Date']);

			$row['Date'] = Date('Y-m-d', strtotime($date));
			// print_r($row);

			$data = array(
				'day' => $row['Day'],
				'date' => $row['Date'],
				'time' => $row['Time'],
				'height' => $row['Heigh'] . "m",
				'state' => ($row['Tide State'] == "High Water") ? 'high' : 'low',
				'marinaid' => $this->session->userdata('marinaid'),
			);

			if ($this->mm->insertRow('tides', $data)) {
				$success++;
			} else {
				$fail++;
			}
		}

		$this->session->set_flashdata('msg', '<span class="alert alert-success">(' . $success . ') records added successfully. (' . $fail . ') Failed.</span>');
		return '<span class="alert alert-success">(' . $success . ') records added successfully. (' . $fail . ') Failed.</span>';

	}

	function importclosures() {

		$this->load->library('csvimport');

		$data = $this->csvimport->get_array($_FILES['userfile']['tmp_name']);
		echo '<pre>';
		// print_r($data);
		// die;
		$success = 0;
		$fail = 0;
		foreach ($data as $row) {

			$date = explode('-', $row['Date']);
			if (isset($date[2])) {

			} else {
				$date = explode('/', $row['Date']);
				if (isset($date[2])) {

				} else {
					$this->session->set_flashdata('msg', '<span class="alert alert-danger">Date format is not correct. Date should be <strong>(dd-mm-yyyy)</strong></span>');
					redirect('usermain/lockclosures');
				}
			}

			$replace = array('/', ' ', ':');
			$date = str_replace($replace, '-', $row['Date']);

			$row['Date'] = Date('Y-m-d', strtotime($date));

			if ($row['Lock Closure'] == 'Lock Master Decision') {
				$row['close'] = 'LMD';
				$row['reopen'] = 'LMD';
			} elseif ($row['Lock Closure'] == 'Closed For Christmas') {
				$row['close'] = 'CFC';
				$row['reopen'] = 'CFC';
			} elseif ($row['Lock Closure'] == 'Closed For Maintenance') {
				$row['close'] = 'CFM';
				$row['reopen'] = 'CFM';
			} else {
				$times = explode(' ', $row['Lock Closure']);
				$row['close'] = $times[1];
				$row['reopen'] = $times[3];
			}
			// print_r($row);die;

			$data = array(
				'day' => $row['Day'],
				'date' => $row['Date'],
				'lockclosure' => $row['Lock Closure'],
				'close' => $row['close'],
				'reopen' => $row['reopen'],
				'marinaid' => $this->session->userdata('marinaid'),
			);

			// print_r($data);
			// $result = $this->mm->get_num_rows('lockclosures', '', $data);

			if ($this->mm->insertRow('lockclosures', $data)) {
				$success++;
			} else {
				$fail++;
			}
		}

		$this->session->set_flashdata('msg', '<span class="alert alert-success">(' . $success . ') records added successfully. (' . $fail . ') Failed.</span>');
		return '<span class="alert alert-success">(' . $success . ') records added successfully. (' . $fail . ') Failed.</span>';

		// redirect('usermain/lockclosures');

	}

	public function importBristolLocks() {
 		$this->load->library('csvimport');

		$data = $this->csvimport->get_array($_FILES['userfile']['tmp_name']);
		 
		$success = 0;
		$fail = 0;
		foreach ($data as $row) {

			$date = explode('-', $row['Date']);
			if (isset($date[2])) {

			} else {
				$date = explode('/', $row['Date']);
				if (isset($date[2])) {

				} else {
					$this->session->set_flashdata('msg', '<span class="alert alert-danger">Date format is not correct. Date should be <strong>(dd-mm-yyyy)</strong></span>');
					redirect('usermain/lockclosures');
				}
			}

			$replace = array('/', ' ', ':');
			$date = str_replace($replace, '-', $row['Date']);

			$row['Date'] = Date('Y-m-d', strtotime($date)); 
			// print_r($row);die; 
			$data = array(
				'day' => $row['Day'],
				'date' => $row['Date'],
				'locks' => $row['Lock'],
				'stopGate' => $row['Stop  Gate'] 
			);

			// print_r($data);
			// $result = $this->mm->get_num_rows('lockclosures', '', $data);

			if ($this->mm->insertRow('bristollocks', $data)) {
				$success++;
			} else {
				$fail++;
			}
		}

		$this->session->set_flashdata('msg', '<span class="alert alert-success">(' . $success . ') records added successfully. (' . $fail . ') Failed.</span>');
		echo '<span class="alert alert-success">(' . $success . ') records added successfully. (' . $fail . ') Failed.</span>';

		// redirect('usermain/lockclosures');

	}

	public function deleteall($table = '', $auth) {
		if ($auth == 1) {
			if ($this->mm->deleteRow($table, ['marinaid' => $this->session->userdata('marinaid')])) {
				$this->session->set_flashdata('msg', "<span class='alert alert-success'>Records deleted successfully.</span>");
				redirect('usermain/' . $table);
			}
		}
		$this->session->set_flashdata('msg', "<span class='alert alert-danger'>Couldn't delete reocrds.</span>");

		redirect('usermain/' . $table);
	}
	public function deleteAllBristol() { 

		if ($this->mm->deleteRow('bristollocks', ['day !=' => null])) {
			$this->session->set_flashdata('msg', "<span class='alert alert-success'>Records deleted successfully.</span>");
			redirect('usermain/lockclosures');
		} 
		$this->session->set_flashdata('msg', "<span class='alert alert-danger'>Couldn't delete reocrds.</span>");

		redirect('usermain/lockclosures');
	}

	public function notifications() {

		$data['data'] = $this->mm->fetchArr('notifications', '', ['marinaid' => $this->session->userdata('marinaid')]);
		$data['msg'] = $this->session->flashdata('msg');
		$data['title'] = 'Notifications';
		$data['view'] = $this->load->view('users/notifications', $data, TRUE);
		$data['view'] = $this->load->view('users/usermain', $data);
	}
	public function sendNoti(){
		$title = $this->input->post('title');
		$message = $this->input->post('message');
		$deviceTokens = $this->mm->fetchArr('marinas', ['iOSToken', 'androidToken', 'firebaseToken'], ['username' => $this->marinausername])[0];
		
		// print_r($deviceTokens); die;
		$msg_payload = array (
			'title' => $title,
			'message' => $message,
		);

		return myPushNoti($msg_payload, $deviceTokens);
	}
 
	public function check(){
		echo json_encode($this->session->all_userdata(), JSON_PRETTY_PRINT);
	}

	public function getNoti(){

		$data = $this->mm->fetchArr('notifications', '', ['marinaid' => $this->session->userdata('marinaid')]);

		$text = '';

		if (empty($data)) {
			$text = '<h4 class="alert alert-secondary" role="alert">No records found.</h4>';
		} else {
			foreach ($data as $row) {
				$text .= '<div class="card"><div class="card-body">';

				$text .= '<h5 class="card-title">'.$row['title'].'</h5>';
				$text .= '<p class="card-text">'.$row['message'].'</p>';
				$text .= '<p class="card-text"><small class="text-muted">Sent date: '.$row['date'].'</small></p>';
				$text .= '<footer class="blockquote-footer">  <small> Posted by: <cite title="Source Title"></cite>'.$row['username'].' </small> </footer></small></p> '; 
				$text .= ' </div> </div> ';
			} 
		}


		echo $text;

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

}