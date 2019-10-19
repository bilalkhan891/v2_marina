<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Apidata extends CI_Controller {

	function __construct() {
		parent::__construct();
		// $this->load->helper('form');
		// required headers
		header("Access-Control-Allow-Origin: *");
		header("Content-Type: application/json; charset=UTF-8");
		$this->load->model('Mainmodel', 'mm');
		$this->load->helper('form');
	}

	public function index() {
	}

// 	public function gettides() {

// 		$ch = curl_init();
// 		curl_setopt($ch, CURLOPT_URL, "https://api.myhomeport.info/api/v1.0/tides/from/20190802/days/50");
// 		curl_setopt($ch, CURLOPT_POST, 0);
// 		curl_setopt($ch, CURLOPT_HTTPHEADER, array(
// 			'Authorization: 77351569-09ab-4236-92d7-e9b2848328da',
// 		));
// 		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
// 		$output = curl_exec($ch);
// 		curl_close($ch);
// 		print_r($output);
// 		return $output;
// 	}

// 	public function posttides() {
// 		$order['by'] = 'date';
// 		$order['order'] = 'ASC';

// 		$data['values'] = $this->mm->fetchArr('tides', '', ['date >=' => date('Y-m-d'), 'date <=' => Date('Y-m-d', strtotime(date('Y-m-d') . "+12 months"))], NULL, $order);
// 		// print_r($data['values']);die;
		$count = 0;
		$count1 = -1;
		$c1 = 0;
// 		if (empty($data['values'])) {
// 			return "We couldn't find any record for your given search.";
// 		} else {

			$d1[$count1]['date'] = '';

			foreach ($data['values'] as $row) {
				// print_r($d1[$count1]['date'] . " = " . date("d-m-Y", strtotime($row['date'])) . "- ----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------");

				if ($d1[$count1]['date'] != date("d-m-Y", strtotime($row['date']))) {

					$c1 = 0;
					$d1[$count] = array(
						'date' => date("d-m-Y", strtotime($row['date'])),
					);

					$count++;
					$count1++;
				}

				$d1[$count1]['tides'][$c1] = array('status' => $row['state'], 'time' => $row['time'], 'height' => $row['height']);
				$c1++;

			}

// 		}
// 		unset($d1[-1]);
// 		$result['info'] = array_values($d1);
// 		$data_string = json_encode($result);
// 		// print_r($data_string);die;
// 		$ch = curl_init();
// 		curl_setopt($ch, CURLOPT_URL, "https://api.myhomeport.info/api/v1.0/tides");
// 		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
// 		curl_setopt($ch, CURLINFO_HEADER_OUT, true);
// 		curl_setopt($ch, CURLOPT_POST, true);
// 		curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
// 		curl_setopt($ch, CURLOPT_HTTPHEADER, array(
// 			'Authorization: 77351569-09ab-4236-92d7-e9b2848328da',
// 			'Content-Type: application/json',
// 		));
// 		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
// 		$info = curl_getinfo($ch);
// 		$output = curl_exec($ch);
// 		curl_close($ch);

// 		print_r($info);
// 		print_r($output);
// 		return json_encode($output);
// 	}

// 	public function getlocks() {

// 		$ch = curl_init();
// 		curl_setopt($ch, CURLOPT_URL, "https://api.myhomeport.info/api/v1.0/locks/from/20190802/days/50");
// 		curl_setopt($ch, CURLOPT_POST, 0);
// 		curl_setopt($ch, CURLOPT_HTTPHEADER, array(
// 			'Authorization: 77351569-09ab-4236-92d7-e9b2848328da',
// 		));
// 		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
// 		$output = curl_exec($ch);
// 		curl_close($ch);
// 		print_r($output);
// 		return $output;
// 	}

// 	public function postlocks() {
// 		$order['by'] = 'date';
// 		$order['order'] = 'ASC';

// 		$data['values'] = $this->mm->fetchArr('lockclosures', '', ['date >=' => date('Y-m-d'), 'date <=' => Date('Y-m-d', strtotime(date('Y-m-d') . "+12 months"))], NULL, $order);
// 		// print_r($data['data']);
// 		$count = 0;
// 		if (empty($data['values'])) {
// 			$d1['error']['No Records'] = "We couldn't find any record for your given search.";
// 		} else {

// 			foreach ($data['values'] as $row) {
// 				$d1[$count] = array(
// 					'date' => date("d-m-Y", strtotime($row['date'])),
// 					'time' => array('close' => $row['close'], 'reopen' => $row['reopen']),
// 				);
// 				$count++;
// 			}

// 		}

// 		$result['info'] = array_values($d1);
// 		$data_string = json_encode($result, JSON_PRETTY_PRINT);
// 		// print_r($data_string);die;
// 		$ch = curl_init();
// 		curl_setopt($ch, CURLOPT_URL, "https://api.myhomeport.info/api/v1.0/locks");
// 		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
// 		curl_setopt($ch, CURLINFO_HEADER_OUT, true);
// 		curl_setopt($ch, CURLOPT_POST, true);
// 		curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
// 		curl_setopt($ch, CURLOPT_HTTPHEADER, array(
// 			'Authorization: 77351569-09ab-4236-92d7-e9b2848328da',
// 			'Content-Type: application/json',
// 		));
// 		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
// 		$info = curl_getinfo($ch);
// 		$output = curl_exec($ch);
// 		curl_close($ch);

// 		print_r($info);
// 		print_r($output);
// 		return json_encode($output);
// 	}
// }

// { "info": [{
//     "date": "16-06-2019",
//     "time": {
//         "close": "10:00",
//         "reopen": "13:00"
//     }
// },{
//     "date": "17-06-2019",
//     "time": {
//         "close": "10:42",
//         "reopen": "13:42"
//     }
// },{
//     "date": "18-06-2019",
//     "time": {
//         "close": "11:18",
//         "reopen": "14:18"
//     }
// },{
//     "date": "19-06-2019",
//     "time": {
//         "close": "11:54",
//         "reopen": "14:54"
//     }
// },{

// {"info":[{
//     "date": "02-06-2019",
//     "time": {
//         "close": "11:33",
//         "reopen": "3.45"
//     }
// },{
//     "date": "03-06-2019"
// },{
//     "date": "04-06-2019",
//     "time": {
//         "close": "11:33",
//         "reopen": "3.45"
//     }
// },{
//     "date": "05-06-2019"
// },{
//     "date": "06-06-2019",
//     "time": {
//         "close": "11:33",
//         "reopen": "3.45"
//     }
// },{
