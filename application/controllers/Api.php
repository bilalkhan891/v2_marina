<?php
//use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
/** @noinspection PhpIncludeInspection */
//To Solve File REST_Controller not found
require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

/**
 * This is an example of a few basic user interaction methods you could use
 * all done with a hardcoded array
 *
 * @package         CodeIgniter
 * @subpackage      Rest Server
 * @category        Controller
 * @author          Phil Sturgeon, Chris Kacerguis
 * @license         MIT
 * @link            https://github.com/chriskacerguis/codeigniter-restserver
 */
 //require(APPPATH'.libraries/REST_Controller.php');
class Api extends REST_Controller {

    //use REST_Controller;
    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        error_reporting(0);
        $this->load->model('Mainmodel', 'mm');
        // Configure limits on our controller methods
        // Ensure you have created the 'limits' table and enabled 'limits' within application/config/rest.php
        $this->methods['users_get']['limit'] = 500; // 500 requests per hour per user/key
        $this->methods['users_post']['limit'] = 100; // 100 requests per hour per user/key
        $this->methods['users_delete']['limit'] = 50; // 50 requests per hour per user/key
    }

    public function users_get()
    {
        // Users from a data store e.g. database
        $users = [
            ['id' => 1, 'name' => 'John', 'email' => 'john@example.com', 'fact' => 'Loves coding'],
            ['id' => 2, 'name' => 'Jim', 'email' => 'jim@example.com', 'fact' => 'Developed on CodeIgniter'],
            ['id' => 3, 'name' => 'Jane', 'email' => 'jane@example.com', 'fact' => 'Lives in the USA', ['hobbies' => ['guitar', 'cycling']]],
        ];

        $id = $this->get('id');

        // If the id parameter doesn't exist return all the users

        if ($id === null)
        {
            // Check if the users data store contains users (in case the database result returns NULL)
            if ($users)
            {
                // Set the response and exit
                $this->response($users, REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
            }
            else
            {
                // Set the response and exit
                $this->response([
                    'status' => false,
                    'message' => 'No users were found'
                ], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
            }
        }

        // Find and return a single record for a particular user.

        $id = (int) $id;

        // Validate the id.
        if ($id <= 0)
        {
            // Invalid id, set the response and exit.
            $this->response(null, REST_Controller::HTTP_BAD_REQUEST); // BAD_REQUEST (400) being the HTTP response code
        }

        // Get the user from the array, using the id as key for retrieval.
        // Usually a model is to be used for this.

        $user = null;

        if (!empty($users))
        {
            foreach ($users as $key => $value)
            {
                if (isset($value['id']) && $value['id'] === $id)
                {
                    $user = $value;
                }
            }
        }

        if (!empty($user))
        {
            $this->set_response($user, REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
        }
        else
        {
            $this->set_response([
                'status' => false,
                'message' => 'User could not be found'
            ], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
        }
    }

    public function users_post()
    {
        // $this->some_model->update_user( ... );
        $message = [
            'id' => 100, // Automatically generated by the model
            'name' => $this->post('name'),
            'email' => $this->post('email'),
            'message' => 'Added a resource'
        ];

        $this->set_response($message, REST_Controller::HTTP_CREATED); // CREATED (201) being the HTTP response code
    }

    public function users_delete()
    {
        $id = (int) $this->get('id');

        // Validate the id.
        if ($id <= 0)
        {
            // Set the response and exit
            $this->response(null, REST_Controller::HTTP_BAD_REQUEST); // BAD_REQUEST (400) being the HTTP response code
        }

        // $this->some_model->delete_something($id);
        $message = [
            'id' => $id,
            'message' => 'Deleted the resource'
        ];

        $this->set_response($message, REST_Controller::HTTP_NO_CONTENT); // NO_CONTENT (204) being the HTTP response code
    }

    public function marina_get($marina = ''){
        // $marina = $this->get('marina'); 

        if ($marina === null) {
            // Set the response and exit
            $this->response([
                'status' => false,
                'message' => 'Marina username missing'
            ], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
        }

        $data = $this->mm->fetchArr("marinas", "", ["username" => $marina]);
        // $data = $data->result_array();
        // 
        if (isset($data[0]['username'])) {
            // print_r($data);
            unset($data[0]['username']);
            unset($data[0]['contactname']);
            unset($data[0]['date']);
            unset($data[0]['status']);
            unset($data[0]['ids_id']);
            unset($data[0]['api_id']);
            unset($data[0]['apicheck']);
        }
 
        $api_data=array (
            'address' => $data[0]['address'].", ".$data[0]['address2'].", ".$data[0]['address3'].", ".$data[0]['postcode'],
            'phone' => 
            array (
              0 => $data[0]['phone'],
            ),
            'email' => $data[0]['email'],
            'web' => $data[0]['web'],
            'facebook' => $data[0]['facebook'],
            'flickr' => $data[0]['flickr'],
            'twitter' => $data[0]['twitter'],
            'security' => 
            array (
              0 => $data[0]['security'],
            ),
            'vhf' => (int)$data[0]['channel'],
            'waypoint' => $data[0]['position'],
            'openingHours' => 
            array (
              0 => 
              array (
                'day' => 'Monday - Friday',
                'time' =>$data[0]['mon-fri'],
              ),
              1 => 
              array (
                'day' => 'Saturday',
                'time' => $data[0]['sat'],
              ),
              2 => 
              array (
                'day' => 'Sunday',
                'time' => $data[0]['sun'],
              ),
            ),
            'location' => 
            array (
              'latitude'  => (float)$data[0]['lat'],
              'longitude' => (float)$data[0]['lon'],
            ) 
        );
        $this->response($api_data, REST_Controller::HTTP_OK);
    }

    public function tides_get($marina = null, $from = "", $start = null, $daysVar = '', $days = null){
        // $marina = $this->get('marina'); 

        if ($marina === null || $start === null || $days === null) {
            // Set the response and exit
            $this->response([
                'status' => false,
                'message' => 'Something went wrong with the parameters'
            ], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
        }
        $marinaId = $this->mm->fetchArr('marinas',  'id', ['username' => $marina]);
        if (!isset($marinaId[0]['id'])) {
            $this->response([
                'status' => false,
                'message' => 'Something went wrong with the parameters'
            ], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
        }
        $marinaId = $marinaId[0]['id']; 
  
        $order['by'] = 'date';
        $order['order'] = 'ASC';
        $data = $this->mm->fetchArr('tides', ['date', 'time', 'height', 'state'], ['date >=' => $start, 'date <=' => Date('Y-m-d', strtotime($start." +".$days." days")), 'marinaid' => $marinaId], NULL, $order);
 
        $count = 0;
        $count1 = -1;
        $c1 = 0;
        $d1[$count1]['date'] = '';

        foreach ($data as $row) {
             // print_r($d1[$count1]['date'] . " = " . date("d-m-Y", strtotime($row['date'])) . "- ----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------"); 
            if ($d1[$count1]['date'] != date("Y-m-d", strtotime($row['date']))) {

                $c1 = 0;
                $d1[$count] = array(
                    'date' => date("Y-m-d", strtotime($row['date'])),
                ); 
                $count++;
                $count1++;
            } 
            $d1[$count1]['tides'][$c1] = array('status' => $row['state'], 'time' => $row['time'], 'height' => $row['height']);
            $c1++;

        }
        unset($d1[-1]);
        $this->response($d1, REST_Controller::HTTP_OK);
    }

    public function locks_get($marina = null, $from = "", $start = null, $daysVar = '', $days = null){
        // $marina = $this->get('marina'); 
        if ($marina == 'sailbristol') {
            $this->bristollocks_get($from, $start, $daysVar, $days);
        }
        if ($marina === null || $start === null || $start === null) {
            // Set the response and exit
            $this->response([
                'status' => false,
                'message' => 'Something went wrong with the parameters'
            ], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
        }
        $marinaId = $this->mm->fetchArr('marinas', ['id'], ['username' => $marina])[0]['id'];
        $order['by'] = 'date';
        $order['order'] = 'ASC';
        $data = $this->mm->fetchArr('lockclosures', ['date', 'day', 'close', 'reopen'], ['date >=' => $start, 'date <=' => Date('Y-m-d', strtotime($start." +".$days." days")), 'marinaid' => $marinaId], NULL, $order);
        // print_r($data); echo Date('Y-m-d', strtotime($start." +".$days." days")); die;
        $count = 0;
        $count1 = -1;
        $c1 = 0;
        $d1[$count1]['date'] = '';

        foreach ($data as $row) {
             // print_r($d1[$count1]['date'] . " = " . date("d-m-Y", strtotime($row['date'])) . "- ----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------"); 
            if ($d1[$count1]['date'] != date("Y-m-d", strtotime($row['date']))) {

                $c1 = 0;
                $d1[$count] = array(
                    'date' => date("Y-m-d", strtotime($row['date'])),
                    'day' => $row['day']
                ); 
                $count++;
                $count1++;
            } 
            $d1[$count1]['time'][$c1] = array('close' => $row['close'], 'reopen' => $row['reopen']);
            $c1++;

        }
        unset($d1[-1]); 
        $this->response($d1, REST_Controller::HTTP_OK);
    }
    public function bristollocks_get($from = "", $start = null, $daysVar = '', $days = null){
        // $marina = $this->get('marina'); 

        if ($start === null || $days === null) {
            // Set the response and exit
            $this->response([
                'status' => false,
                'message' => 'Something went wrong with the parameters'
            ], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
        } 
        $order['by'] = 'date';
        $order['order'] = 'ASC';
        $data = $this->mm->fetchArr('bristollocks', '', ['date >=' => $start, 'date <=' => Date('Y-m-d', strtotime($start." +".$days." days"))], NULL, $order);

        $count = 0;
        $count1 = -1;
        $c1 = 0;
        $d1[$count1]['date'] = '';

        foreach ($data as $row) {
             // print_r($d1[$count1]['date'] . " = " . date("d-m-Y", strtotime($row['date'])) . "- ----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------"); 
            if ($d1[$count1]['date'] != date("Y-m-d", strtotime($row['date']))) { 
                $c1 = 0;
                $d1[$count] = array(
                    'date' => date("Y-m-d", strtotime($row['date'])),
                    'day' => $row['day']
                ); 
                $count++;
                $count1++;
            } 
            $lock = explode(' ', $row['locks']); 
            $stopGate = explode(' ', $row['stopGate']); 
            $d1[$count1]['time'][$c1] = array(
                'locksOpen' =>   $row['locks'],
                'locksClose' =>  $row['stopGate']
            );
            $c1++; 
        }
        unset($d1[-1]);

        $this->response($d1, REST_Controller::HTTP_OK); 
    }

    public function business_get( $marina = null, $types = '', $param_id = ''){
        // $marina = $this->get('marina'); 
        $data = array();
        $i = 0;
        if ($marina === null) {
            // Set the response and exit
            $this->response([
                'status' => false,
                'message' => 'Marina username missing'
            ], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
        }
        
        if (!isset($this->mm->fetchArr('marinas', ['id'], ['username' => $marina])[0]['id'])) {
            $this->response([
                'status' => false,
                'message' => 'Wrong Marina username!'
            ], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
        } else {
            $marinaId = $this->mm->fetchArr('marinas', ['id'], ['username' => $marina])[0]['id'];
        }
        if ($types == 'types') {
            $records = $this->mm->fetchArr('businesstypes', ['id','name'], ['marinaid' => $marinaId]);
            foreach ($records as $value) {
                $data[$i] = array(
                    'id' => (int)$value['id'],
                    'name' => $value['name']
                );
                $i++;
            }
        } elseif ($types == 'type') {
            $records = $this->mm->fetchArr('business', ['id', 'name'], ['marinaid' => $marinaId, 'businesstypeid' => $param_id]);
            foreach ($records as $value) {
                $data[$i] = array(
                    'id' => (int)$value['id'], 
                    'name' => $value['name'] 
                );
                $i++;
            }
        } elseif ($types == 'single'){ 
            $this->singleBusiness_get($marinaId, $param_id);
        }

        $this->response($data, REST_Controller::HTTP_OK);
    }
  
    public function singleBusiness_get($marinaId = null, $id = null){
        // $marina = $this->get('marina');  
        $order['by'] = 'date';
        $order['order'] = 'ASC';
        if (isset($this->mm->fetchArr('business', '', ['marinaid' => $marinaId, 'id' => $id])[0])) {
            $data = $this->mm->fetchArr('business', '', ['marinaid' => $marinaId, 'id' => $id])[0];
        } else {
            $this->response([
                'status' => false,
                'message' => 'No records!'
            ], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
        }
        $data_api= array (
            'id' => (int)$data['id'],
            'typeId' => (int)$data['businesstypeid'] ,
            'name' => $data['name'],
            'phone' => 
            array (
              0 => $data['tel'],
            ),
            'email' =>$data['email'],
            'web' => $data['web'],
            'address' => $data['AddressLine1'].", ".$data['AddressLine2'].", ".$data['AddressLine3'].", ".$data['PostCode'],
            'location' => 
            array (
              'latitude'  => (float)$data['lat'],
              'longitude' => (float)$data['longitude'],
            ),
        );
        $this->response($data_api, REST_Controller::HTTP_OK);
    }

    public function subscription_post( $marina = null ){
        $data = $this->post(); 
        if (isset($data)) {
            $email = $data['email'];
            $type = $data['subscribeTo']; 
        } else {
            $this->response([
                'status' => false,
                'message' => 'Wrong data!'
            ], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
        }

        if ($marina === null) {
            // Set the response and exit
            $this->response([
                'status' => false,
                'message' => 'Something went wrong with parameters'
            ], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
        }

        $marinaId = $this->mm->fetchArr('marinas', ['id'], ['username' => $marina])[0]['id'];
        if (!isset($marinaId)) {
            $this->response([
                'status' => false,
                'message' => 'Wrong Marina username!'
            ], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
        }
        $this->mm->insertRow('subscribers', ['email' => $email, 'subType' => (int)$type, 'marinaId' => $marinaId]);
        $insertId = $this->db->insert_id();
        $data = $this->mm->fetchArr('subscribers', ['id', 'email', 'subType'], ['id' => $insertId])[0];

        $this->response($data, REST_Controller::HTTP_OK);
    }

    public function calcRates_post ($marina = null, $parm1 = null, $parm2 = null, $parm3 = null, $parm4 = null) {
 
    	switch ($marina) {
    		case 'sailbristol': 
    			    $this->brsitolRates_post();
    			break;
    		
    		case 'padsstowmarina':
    			$this->padsstowmarina_post($parm1, $parm2, $parm3);
    			break;

    		default:
    			$this->response([
    			    'status' => false,
    			    'message' => 'Wrong Marina username!'
    			], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
	    		break;
    	} 
    }
    // Get Sponser  data
 
    public function sponsor_get($marina = null, $typeId = null){
      
        if ($marina === null || $typeId === null) {
            // Set the response and exit
            $this->response([
                'status' => false,
                'message' => 'Something went wrong with parameters'
            ], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
        }
        if ($this->mm->fetchArr('marinas', ['username'], ['username' => $marina])[0]['username']) {
            $marinauser = $this->mm->fetchArr('marinas', ['username'], ['username' => $marina])[0]['username'];
        } else { 
            $this->response([
                'status' => false,
                'message' => 'Wrong Marina username!'
            ], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
        }
         

        $order['by'] = 'date';
        $order['order'] = 'ASC';
        if (isset($this->mm->fetchArr('sponsor', '', ['marinauser' => $marinauser, 'typeId'=>$typeId])[0])) {
            $data = $this->mm->fetchArr('sponsor', '', ['marinauser' => $marinauser, 'typeId'=>$typeId])[0];
        } else {
            $this->response([
                'status' => false,
                'message' => 'Not found!'
            ], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
        }
        $data = $this->mm->fetchArr('sponsor', '', ['marinauser' => $marinauser, 'typeId'=>$typeId])[0];
        $api_data = array (
            '_id' => (int)$data['id'],
            'name' => $data['businessname'],
            'logo' => $data['icon'],
            'navLogo' => $data['navIcon'],
            'introduction' =>$data['msg'],
            'phone' =>
            array (
              0 => $data['tel']
            ),
            'email' => $data['email'],
            'web' => $data['website'],
            'address' => $data['address1'].", ".$data['address2'].", ".$data['address3'].", ".$data['postcode'],
           
            'location' => 
            array (
              'latitude' =>(float)$data['lat'],
              'longitude' => (float)$data['lng'],
            ),
            'openingHours' => 
            array (
              0 => 
              array (
                'day' => 'Weekdays',
                'time' => $data['mon'],
              ),
              1 => 
              array (
                'day' => 'Saturday',
                'time' => $data['sat'],
              ),
              2 => 
              array (
                'day' => 'Sunday',
                'time' => $data['sun'],
              ),
            ),
          
        );
        $this->response($api_data, REST_Controller::HTTP_OK);
    }

    // end sponser data
    public function rates_post($marina){
        switch ($marina) {
            case 'sailbristol':
                $this->brsitolRates_post();
                break;
            
            default:
                $this->response([
                    'status' => false,
                    'message' => 'Forbidden'
                ], REST_Controller::HTTP_FORBIDDEN);
                break;
        }
    }

    public function brsitolRates_post(){ 
        $data =  $this->post();
        $Class_A_Berthing       = 116.80;
        $Class_B_Berthing_Pontoon_Berth   = 104.90;
        $Pontoon_Per_Metre    = 168.25;
        $Club_Pontoon     = 139.70;
        $Temple_Quay_Without_Services   = 125.00;
        $Temple_Quay_With_Services      = 132.70;
        $Pontoon_Temple_Back  = 141.55;
        $Winter_Berth     = 141.35;
        $Pontoon_Hanover_Quay     = 221.00;
        if ($data == null || !isset($data['length']) || !isset($data['multiHull']) || !isset($data['berthingType']) || !isset($data['days'])) {
            $this->response([
                'status' => false,
                'message' => 'Forbidden'
            ], REST_Controller::HTTP_FORBIDDEN); // NOT_FOUND (404) being the HTTP 
        }
        $response['requestedLength'] = $data['length'];
        $response['berthingType'] = $data['berthingType'];
        $response['days'] = (isset($data['days'])) ? $data['days'] : ''; 
        $response['lengthUnit'] = $data['lengthUnit'];
        $response['currency'] = "£";

        if ($data['lengthUnit'] == 'Feet') {
            $data['length'] = $data['length'] * 0.3048;
        }
        $response['boatLength'] = number_format($data['length'], 2, '.', '') . "m";
        $data['length'] = round($data['length'] * 2) / 2;
        if ($data['berthingType'] == 'Visiting') {
            $ek     = 1.95; 
            $do     = 1.65; 
            $teen   = 1.26;
            $char   = 0.93; 
            if ($data['days'] == 1 &&  $data['multiHull']=="No")   { 
                $res['Payment'] = number_format($data['length']*$ek, 2, '.', '');
            } elseif ($data['days'] == 1 &&  $data['multiHull']=="Yes")  { 
                $res['Payment'] = number_format($data['length']*$ek*1.5, 2, '.', '');
            } elseif ($data['days'] < 8 &&  $data['multiHull']=="No")    { 
                $res['Payment'] = number_format($data['length']*$do*$data['days'], 2, '.', '');
            } elseif ($data['days'] < 8 &&  $data['multiHull']=="Yes")   { 
                $res['Payment'] = number_format($data['length']*$do*1.5*$data['days'], 2, '.', '');
            } elseif ($data['days'] < 15 &&  $data['multiHull']=="No")   { 
                $res['Payment'] = number_format($data['length']*$teen*$data['days'], 2, '.', '');
            } elseif ($data['days'] < 15 &&  $data['multiHull']=="Yes")  { 
                $res['Payment'] = number_format($data['length']*$teen*1.5*$data['days'], 2, '.', '');
            } elseif ($data['days'] < 22 &&  $data['multiHull']=="No")   { 
                $res['Payment'] = number_format($data['length']*$char*$data['days'], 2, '.', '');
            } elseif ($data['days'] < 22 &&  $data['multiHull']=="Yes")  { 
                $res['Payment'] = number_format($data['length']*$char*1.5*$data['days'], 2, '.', '');
            } else {
                $res['Payment'] = 'Days more then 21';
            }

        } elseif($data['berthingType'] == 'Annual') {

            $response["multiHull"] = "No"; 
            $res['Class A Berthing']        = number_format($Class_A_Berthing*$data['length'], 2, '.', '');
            $res['Class B Berthing Pontoon Berth']      = number_format($Class_B_Berthing_Pontoon_Berth*$data['length'], 2, '.', '');
            $res['Pontoon Per Metre']       = number_format($Pontoon_Per_Metre*$data['length'], 2, '.', '');
            $res['Club Pontoon']        = number_format($Club_Pontoon*$data['length'], 2, '.', '');
            $res['Temple Quay Without Services']        = number_format($Temple_Quay_Without_Services*$data['length'], 2, '.', '');
            $res['Temple Quay With Services']       = number_format($Temple_Quay_With_Services*$data['length'], 2, '.', '');
            $res['Pontoon Temple Back']         = number_format($Pontoon_Temple_Back*$data['length'], 2, '.', '');
            $res['Winter Berth']        = number_format($Winter_Berth*$data['length'], 2, '.', '');
            $res['Pontoon Hanover Quay']        = number_format($Pontoon_Hanover_Quay*$data['length'], 2, '.', '');

            if ($data['multiHull'] == 'Yes') {
                
                $response["multiHull"] = "Yes"; 
                $res['Class A Berthing'] = number_format($res['Class A Berthing']*1.5, 2, '.', '');
                $res['Class B Berthing Pontoon Berth'] = number_format($res['Class B Berthing Pontoon Berth']*1.5, 2, '.', '');
                $res['Pontoon Per Metre'] = number_format($res['Pontoon Per Metre']*1.5, 2, '.', '');
                $res['Club Pontoon'] = number_format($res['Club Pontoon']*1.5, 2, '.', '');
                $res['Temple Quay Without Services'] = number_format($res['Temple Quay Without Services']*1.5, 2, '.', '');
                $res['Temple Quay With Services'] = number_format($res['Temple Quay With Services']*1.5, 2, '.', '');
                $res['Pontoon Temple Back'] = number_format($res['Pontoon Temple Back']*1.5, 2, '.', '');
                $res['Winter Berth'] = number_format($res['Winter Berth']*1.5, 2, '.', '');
                $res['Pontoon Hanover Quay'] = number_format($res['Pontoon Hanover Quay']*1.5, 2, '.', '');
            }
        }  else {
            $this->response([
                'status' => false,
                'message' => 'Berthing Type not correct!'
            ], REST_Controller::HTTP_FORBIDDEN); // NOT_FOUND (404) being the HTTP 
        }
        $i = 0;
        foreach ($res as $key => $value) {
            $response['values'][$i] = array(
                'index' => $i,
                'name' => $key,
                'value' => (float)$value
            );
            $i++;
        }
        

        $this->response($response, REST_Controller::HTTP_OK); 
    }
  
    public function padsstowmarina_post($parm1 = null, $parm2 = null, $parm3 = null){
    	if ($parm1 == null || $parm2 == null || $parm3 == null || !is_numeric($parm2) || !is_numeric($parm3)) { 
			$this->response([
		        'status' => false,
		        'message' => 'Error In Parameters'
		    ], REST_Controller::HTTP_FORBIDDEN); // NOT_FOUND (404) being the HTTP response code
		} else {
		    if ($parm1 == 'river') { 
	    		if ($parm3 <= 6) {
	    			$price = 2.10;
	    		} elseif ($parm3 >= 7 || $parm3 <= 20) {
	    			$price = 1.80;
	    		} elseif ($parm3 > 20) {
	    			$price = 1.60;
	    		}
	    		$data = array('cost' => $parm2*$parm3*$price);
	    		$this->response($data, REST_Controller::HTTP_OK);
 
		    } elseif ($parm1 == 'quay') {
		    	 if ($parm3 == 1) {
		    	 	$price = 1.13;
		    	 } elseif ($parm3 == 2 ) {
		    	 	$price = 4.48;
		    	 } elseif ($parm3 == 3) {
		    	 	$price = 10.50;
		    	 } elseif ($parm3 == 4) {
		    	 	$price = 17.24;
		    	 }
		    	 $data = array('cost' => $parm2*$parm3*$price);
		    	 $this->response($data, REST_Controller::HTTP_OK);
		    } else {
	    		$this->response([
	    	        'status' => false,
	    	        'message' => 'Parameter 1 should either be "river" or "quay". '
	    	    ], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
		    }
		}
    } 

    public function getIcons_get($marina = '', $iconType = '', $sponsorType = ''){

        if ($marina === null || $iconType === null) {
            // Set the response and exit
            $this->response([
                'status' => false,
                'message' => 'Something went wrong with parameters'
            ], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
        }
        if ($this->mm->fetchArr('marinas', ['username'], ['username' => $marina])[0]['username']) {
            $marinaId = $this->mm->fetchArr('marinas', ['id'], ['username' => $marina])[0]['id'];
        } else { 
            $this->response([
                'status' => false,
                'message' => 'Wrong Marina username!'
            ], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
        }

        if ($iconType == "marinaicons") {
            $url = $this->mm->fetchArr('marinas', ['appicon', 'marinaicons'], ['id' => $marinaId]); 
            $this->response($url, REST_Controller::HTTP_OK);
        } elseif ($iconType == "sponsoricons") {
            if ($sponsorType == '') {
                $url = $this->mm->fetchArr('sponsor', ['icon', 'typeId'], ['marinaid' => $marinaId]);
            } else {
                $url = $this->mm->fetchArr('sponsor', ['icon', 'typeId'], ['marinaid' => $marinaId, 'typeId' => $sponsorType]);
            }
            $i = 0;
            foreach ($url as $key => $value) {
                $data[$i] = array(
                    'url' => $value['icon'], 
                    'sponsorType' => ($value['typeId'] == 1) ? 'Left' : 'Right', 
                    'sponsorTypeID' => $value['typeId'], 
                );
                $i++;
            }
            $this->response($data, REST_Controller::HTTP_OK);
        } else {
            $this->response([
                'status' => false,
                'message' => 'Wrong Icon Type'
            ], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
        }
    }
    public function message_post($token = null, $marina = null){
        $data = $this->mm->fetchArr('marinas', ['username'], ['username' => $marina]);
        if ($marina === null || !$data[0]['username']) {
            // Set the response and exit
            $this->response([
                'status' => false,
                'message' => 'Marina username missing'
            ], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
        } else {
            $marinauser = $data[0]['username'];
        }
        $data = $this->post();

        if (isset($data['os']) && $data['os'] == 'iOS') {
            if ($this->mm->updateRow('marinas', ['iOSToken' => $data['id']], ['username' => $marinauser])) {
                $this->response($data, REST_Controller::HTTP_OK); 
            } else {
                // Set the response and exit
                $this->response([
                    'status' => false,
                    'message' => 'Something Went Wrong'
                ], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
            }
        } elseif (isset($data['os']) && $data['os'] == 'android') {
            if ($this->mm->updateRow('marinas', ['androidToken' => $data['id']], ['username' => $marinauser])) {
                $this->response($data, REST_Controller::HTTP_OK); 
            } else {
                // Set the response and exit
                $this->response([
                    'status' => false,
                    'message' => 'Something Went Wrong'
                ], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
            }
        }  
    }
} 