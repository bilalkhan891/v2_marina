<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class GetData extends CI_Controller {

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
		$this->calcrates();
	}

	public function calcrates($boatLength = NULL, $mBoatLength = 'metre') {

		if ($boatLength != NULL) {
			$boatLength = (double) $boatLength;
			if ($boatLength == 0) {
				// set response code - 404 Not found
				http_response_code(500);

				// tell the user no products found
				echo json_encode(
					array("message" => "Wrong Input: parameter 1 need to be int, float or double type")
				);
				return;
			}
		}
		if ($mBoatLength != NULL && $mBoatLength != 'metre' && $mBoatLength != 'feet') {

			// set response code - 404 Not found
			http_response_code(500);

			// tell the user no products found
			echo json_encode(
				array("message" => "Wrong Input: parameter 2 need to 'feet' or 'metre'")
			);
			return;
		}

		$rows['requestedLength'] = $boatLength;
		$rows['requestedUnit'] = $mBoatLength;
		$rows['boatLength'] = '';

		$calc['data']['value1']['name'] = "Annual 1 Advance Payment";
		$calc['data']['value2']['name'] = "Annual Monthly Direct Debit";
		$calc['data']['value3']['name'] = "'T' and 'U' Pontoon - Annual 1 Advance Payment - 20% Discount";
		$calc['data']['value4']['name'] = "'T' and 'U' Pontoon - Annual Monthly Direct Debit - 20% Discount";
		$calc['data']['value5']['name'] = "Small Boat 1 Advance Payment";
		$calc['data']['value6']['name'] = "Small Boat Monthly Direct Debit";
		$calc['data']['value7']['name'] = "'T' and 'U' Pontoon / Small Boat Basin - Small Boat 1 Advance Payment - 20% Discount";
		$calc['data']['value8']['name'] = "'T' and 'U' Pontoon / Small Boat Basin - Small Boat Monthly Direct Debit - 20% Discount";
		$calc['data']['value9']['name'] = "Air Berth Afloat * / Tender Afloat **";
		$calc['data']['value10']['name'] = "Summer 3 Months";
		$calc['data']['value11']['name'] = "Summer 4 Months";
		$calc['data']['value12']['name'] = "Summer 5 Months";
		$calc['data']['value13']['name'] = "Summer 6 Months";
		// $calc['data']['value14']['name'] = "90 Days Contract***";
		$calc['data']['value15']['name'] = "Winter 3 Months";
		$calc['data']['value16']['name'] = "Winter 4 Months";
		$calc['data']['value17']['name'] = "Winter 5 Months";
		$calc['data']['value18']['name'] = "Winter 6 Months";
		$calc['data']['value19']['name'] = "Small Boat Summer 3 Months";
		$calc['data']['value20']['name'] = "Small Boat Summer 4 Months";
		$calc['data']['value21']['name'] = "Small Boat Summer 5 Months";
		$calc['data']['value22']['name'] = "Small Boat Summer 6 Months";
		// $calc['data']['value23']['name'] = "Small Boat 90 Days Contract***";
		$calc['data']['value24']['name'] = "Small Boat Winter 3 Months";
		$calc['data']['value25']['name'] = "Small Boat Winter 4 Months";
		$calc['data']['value26']['name'] = "Small Boat Winter 5 Months";
		$calc['data']['value27']['name'] = "Small Boat Winter 6 Months";
		$calc['data']['value28']['name'] = "Visitor Daily";
		$calc['data']['value29']['name'] = "Visitor Weekly";
		$calc['data']['value30']['name'] = "Visitor 4 Weeks";
		$calc['data']['value31']['name'] = "Visitor 28 Day Bundle";

		$data['data']['annual'] = $this->mm->fetchArr('annual');
		$data['data']['summer'] = $this->mm->fetchArr('summer');
		$data['data']['winter'] = $this->mm->fetchArr('winter');
		$data['data']['visitor'] = $this->mm->fetchArr('visitor');
		$data['data']['harbour'] = $this->mm->fetchArr('harbour');
		$data['data']['storage'] = $this->mm->fetchArr('storage');
		$data['data']['hoist'] = $this->mm->fetchArr('hoist');
		$data['data']['electricity'] = $this->mm->fetchArr('electricity');
		$data['data']['vatrates'] = $this->mm->fetchArr('vatrates');
		$data['data']['premiumsanddiscounts'] = $this->mm->fetchArr('premiumsanddiscounts');
		$data['data']['creditcardsurcharge'] = $this->mm->fetchArr('creditcardsurcharge');
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

		$boatLength = ($boatLength != '') ? $boatLength : 6.1;
		$mBoatLength = ($mBoatLength != '') ? $mBoatLength : 'metre';
		$loa = 6.1;
		if ($mBoatLength == 'metre') {$loa = round($boatLength, 1);} elseif ($mBoatLength == 'feet') {$loa = (double) $boatLength / 3.2808;} else {

		}
		//echo $lbprem; die;
		// echo   round( ( ( (  $ann * $loa ) + $hd ) * ( 1 + ( $vat/100 ) ) ) + $tawe12, 2 ); die;
		//echo  ( ( 1 + ( $lbprem/100 )  ) * $ann  *  $boatLength); die;

		$loa = ($loa <= 6.1) ? 6.1 : $loa;

		$rows['boatLength'] = number_format($loa, 2) . 'M';

		if ($loa > 6.1) {

			if ($loa >= $condition) {

				$calc['data']['value1']['rates'] = round((((((1 + $lbprem / 100) * $ann * $loa)) + $hd) * (1 + $vat / 100)) + $tawe12, 2);
				$calc['data']['value2']['rates'] = round((((((1 + ($lbprem / 100)) * $anni * $loa)) + $hd) * (1 + ($vat / 100))) + $tawe12, 2);
				$calc['data']['value3']['rates'] = round((((((1 - $discount / 100 + $lbprem / 100) * $ann * $loa)) + $hd) * (1 + ($vat / 100))) + $tawe12, 2);
				$calc['data']['value4']['rates'] = round((((((1 - $discount / 100 + $lbprem / 100) * $anni * $loa)) + $hd) * (1 + ($vat / 100))) + $tawe12, 2);

				$calc['data']['value10']['rates'] = round((((((1 + ($lbprem / 100)) * $sum3 * $loa)) + $hd) * (1 + ($vat / 100))) + $tawe3, 2);
				$calc['data']['value11']['rates'] = round((((((1 + ($lbprem / 100)) * $sum4 * $loa)) + $hd) * (1 + ($vat / 100))) + $tawe4, 2);
				$calc['data']['value12']['rates'] = round((((((1 + ($lbprem / 100)) * $sum5 * $loa)) + $hd) * (1 + ($vat / 100))) + $tawe5, 2);
				$calc['data']['value13']['rates'] = round((((((1 + ($lbprem / 100)) * $sum6 * $loa)) + $hd) * (1 + ($vat / 100))) + $tawe6, 2);
				// $calc['data']['value14']['rates'] = round((((((1 + ($lbprem / 100)) * $days90 * $loa)) + $hd) * (1 + ($vat / 100))) + $tawe3, 2);

				$calc['data']['value15']['rates'] = round((((((1 + ($lbprem / 100)) * $win3 * $loa)) + $hd) * (1 + ($vat / 100))) + $tawe3, 2);
				$calc['data']['value16']['rates'] = round((((((1 + ($lbprem / 100)) * $win4 * $loa)) + $hd) * (1 + ($vat / 100))) + $tawe4, 2);
				$calc['data']['value17']['rates'] = round((((((1 + ($lbprem / 100)) * $win5 * $loa)) + $hd) * (1 + ($vat / 100))) + $tawe5, 2);
				$calc['data']['value18']['rates'] = round((((((1 + ($lbprem / 100)) * $win6 * $loa)) + $hd) * (1 + ($vat / 100))) + $tawe6, 2);

			} else {

				$calc['data']['value1']['rates'] = round(((($ann * $loa) + $hd) * (1 + ($vat / 100))) + $tawe12, 2);
				// $calc['data']['value1']['rates'] = round( ( ( (  $ann * $loa ) + $hd ) * ( 1 + ( $vat/100 ) ) ) + $tawe12, 2 );
				$calc['data']['value2']['rates'] = round(((($anni * $loa) + $hd) * (1 + ($vat / 100))) + $tawe12, 2);
				$calc['data']['value3']['rates'] = round(((((1 - $discount / 100) * $ann * $loa) + $hd) * (1 + ($vat / 100))) + $tawe12, 2);
				$calc['data']['value4']['rates'] = round(((((1 - $discount / 100) * $anni * $loa) + $hd) * (1 + ($vat / 100))) + $tawe12, 2);

				$calc['data']['value10']['rates'] = round(((($sum3 * $loa) + $hd) * (1 + ($vat / 100))) + $tawe3, 2);
				$calc['data']['value11']['rates'] = round(((($sum4 * $loa) + $hd) * (1 + ($vat / 100))) + $tawe4, 2);
				$calc['data']['value12']['rates'] = round(((($sum5 * $loa) + $hd) * (1 + ($vat / 100))) + $tawe5, 2);
				$calc['data']['value13']['rates'] = round(((($sum6 * $loa) + $hd) * (1 + ($vat / 100))) + $tawe6, 2);
				// $calc['data']['value14']['rates'] = round(((($days90 * $loa) + $hd) * (1 + ($vat / 100))) + $tawe3, 2);

				$calc['data']['value15']['rates'] = round(((($win3 * $loa) + $hd) * (1 + ($vat / 100))) + $tawe3, 2);
				$calc['data']['value16']['rates'] = round(((($win4 * $loa) + $hd) * (1 + ($vat / 100))) + $tawe4, 2);
				$calc['data']['value17']['rates'] = round(((($win5 * $loa) + $hd) * (1 + ($vat / 100))) + $tawe5, 2);
				$calc['data']['value18']['rates'] = round(((($win6 * $loa) + $hd) * (1 + ($vat / 100))) + $tawe6, 2);

			}

		} else {

			unset($calc['data']['value1']);
			unset($calc['data']['value2']);
			unset($calc['data']['value3']);
			unset($calc['data']['value4']);

			unset($calc['data']['value10']);
			unset($calc['data']['value11']);
			unset($calc['data']['value12']);
			unset($calc['data']['value13']);
			unset($calc['data']['value14']);

			unset($calc['data']['value15']);
			unset($calc['data']['value16']);
			unset($calc['data']['value17']);
			unset($calc['data']['value18']);

		}

		if ($loa == 6.1) {

			$calc['data']['value5']['rates'] = round((($sb + $hd) * (1 + ($vat / 100))) + $tawe12, 2);
			$calc['data']['value6']['rates'] = round((($sbi + $hd) * (1 + ($vat / 100))) + $tawe12, 2);
			$calc['data']['value7']['rates'] = round((($sb * (1 - $discount / 100) + $hd) * (1 + ($vat / 100))) + $tawe12, 2);
			$calc['data']['value8']['rates'] = round((($sbi * (1 - $discount / 100) + $hd) * (1 + ($vat / 100))) + $tawe12, 2);

			$calc['data']['value19']['rates'] = round((($sbsum3 + $hd) * (1 + ($vat / 100))) + $tawe3, 2);
			$calc['data']['value20']['rates'] = round((($sbsum4 + $hd) * (1 + ($vat / 100))) + $tawe4, 2);
			$calc['data']['value21']['rates'] = round((($sbsum5 + $hd) * (1 + ($vat / 100))) + $tawe5, 2);
			$calc['data']['value22']['rates'] = round((($sbsum6 + $hd) * (1 + ($vat / 100))) + $tawe6, 2);
			// $calc['data']['value23']['rates'] = round((($sbdays90 + $hd) * (1 + ($vat / 100))) + $tawe3, 2);

			$calc['data']['value24']['rates'] = round((($sbwin3 + $hd) * (1 + ($vat / 100))) + $tawe3, 2);
			$calc['data']['value25']['rates'] = round((($sbwin4 + $hd) * (1 + ($vat / 100))) + $tawe4, 2);
			$calc['data']['value26']['rates'] = round((($sbwin5 + $hd) * (1 + ($vat / 100))) + $tawe5, 2);
			$calc['data']['value27']['rates'] = round((($sbwin6 + $hd) * (1 + ($vat / 100))) + $tawe6, 2);

		} else {

			unset($calc['data']['value5']);
			unset($calc['data']['value6']);
			unset($calc['data']['value7']);
			unset($calc['data']['value8']);

			unset($calc['data']['value24']);
			unset($calc['data']['value25']);
			unset($calc['data']['value26']);
			unset($calc['data']['value27']);

			unset($calc['data']['value19']);
			unset($calc['data']['value20']);
			unset($calc['data']['value21']);
			unset($calc['data']['value22']);
			unset($calc['data']['value23']);

		}

		$calc['data']['value9']['rates'] = round($abata * (1 + $vat / 100), 2);

		$calc['data']['value28']['rates'] = round(($visd * $loa) * (1 + $vat / 100), 2);
		$calc['data']['value29']['rates'] = round(($visw * $loa) * (1 + $vat / 100), 2);
		$calc['data']['value30']['rates'] = round(($vism * $loa) * (1 + $vat / 100), 2);
		$calc['data']['value31']['rates'] = round(($vis28bun * $loa) * (1 + $vat / 100), 2);

		$block1 = "All prices are inclusive of VAT and are correct until 31/3/20.  Summer season April - September, winter season October - March.  Multihulls with a beam of 15ft or more will attract a 50% surcharge on the standard berthing fee.";

		$block2 = "* Air Berths may only be installed with prior written consent from the Marina Manager and are charged in addition to the normal berthing fee for your vessel.  Air Berths are to be stored in the berth allocated to your vessel and your vessel must use the Air Berth when afloat and not in use.  No additional space is provided for an Air Berth.";

		$block3 = "** For your tender to qualify for the tender afloat rate, you must hold a current annual berthing licence for a larger vessel.  The tenders LOA must not exceed 4m and you must be able to demonstrate that it can be stored safely and securely aboard your main vessel.  No additional space is provided, so your tender must be secured alongside your main vessel.";
 
		$i = 1;
		$j = 1;
		$rows['values'] = array();
		foreach ($calc as $row) {
			$rows['values'] = (array) $row;
		}
		for ($z = 0; $z <= 40; $z++) {
			if (empty($rows['values']['value' . $j])) {

			} else {
				$rows['values']['value' . $j]['index'] = $i;
				$i++;
			}
			$j++;
		}

		$rows['terms'] = array($block1, $block2, $block3);

		$rows['values'] = array_values($rows['values']);
		echo json_encode($rows, JSON_PRETTY_PRINT);

		// echo json_encode($calc['data'], JSON_PRETTY_PRINT);
		// return json_encode($calc['data'], JSON_PRETTY_PRINT);
	}

	public function locks($date = '', $days = '') {
		$order['by'] = 'date';
		$order['order'] = 'ASC';
		// print_r(array('date >=' => Date('Y-m-d', strtotime($date)), 'date <' => Date('Y-m-d', strtotime($date . " + " . $days . " days"))));die;

		if (strtotime($date) !== false && $days != '') {
			$data['values'] = $this->mm->fetchArr('lockclosures', '', ['date >=' => Date('Y-m-d', strtotime($date)), 'date <=' => Date('Y-m-d', strtotime($date . "+ " . $days . "days"))], NULL, $order);

		} elseif (strtotime($date) !== false) {
			// echo 'date valide';die;
			$data['values'] = $this->mm->fetchArr('lockclosures', '', ['date >=' => Date('Y-m-d', strtotime($date)), 'date <=' => Date('Y-m-d', strtotime($date . "+3 months"))], NULL, $order);
		} else {
			$data['values'] = $this->mm->fetchArr('lockclosures', '', ['date >=' => date('Y-m-d'), 'date <=' => Date('Y-m-d', strtotime("+3 months"))], NULL, $order);
		}
		// print_r($data['data']);
		$count = 0;
		if (empty($data['values'])) {
			$d1['error']['No Records'] = "We couldn't find any record for your given search.";
		} else {

			foreach ($data['values'] as $row) {
				$d1[$count] = array(
					'date' => date("d-m-Y", strtotime($row['date'])),
					'time' => array('close' => $row['close'], 'reopen' => $row['reopen']),
				);
				$count++;
			}

		}

		$result['Search Parameters'] = array(
			'Start Date' => $date,
			'End Date' => ($days != '') ? Date('d-m-Y', strtotime($date . "+ " . $days . "days")) : Date('d-m-Y', strtotime($date . "+ 3 months")),
			'Limit' => ($days != '') ? $days . " - Days" : $days . " - Days",
		);
		$result['info'] = array_values($d1);
		echo json_encode($result, JSON_PRETTY_PRINT);

	}
	public function tides($date = '', $days = '') {
		$order['by'] = 'date';
		$order['order'] = 'ASC';
		// print_r(array('date >=' => Date('Y-m-d', strtotime($date)), 'date <' => Date('Y-m-d', strtotime($date . " + " . $days . " days"))));die;

		if (strtotime($date) !== false && $days != '') {
			$data['values'] = $this->mm->fetchArr('tides', '', ['date >=' => Date('Y-m-d', strtotime($date)), 'date <=' => Date('Y-m-d', strtotime($date . "+ " . $days . "days"))], NULL, $order);

		} elseif (strtotime($date) !== false) {
			$data['values'] = $this->mm->fetchArr('tides', '', ['date >=' => Date('Y-m-d', strtotime($date)), 'date <=' => Date('Y-m-d', strtotime($date . "+3 months"))], NULL, $order);
			// print_r($data['values']);
			// echo Date('Y-m-d', strtotime("+3 months"));
			// die;
		} else {
			$data['values'] = $this->mm->fetchArr('tides', '', ['date >=' => date('Y-m-d'), 'date <=' => Date('Y-m-d', strtotime("+3 months"))], NULL, $order);
		}
		// print_r($data['data']);
		$count = 0;

		if (empty($data['values'])) {
			$d1['error']['No Records'] = "We couldn't find any record for your given search.";
		} else {
			foreach ($data['values'] as $row) {
				$d1[$count] = array(
					'date' => date("d-m-Y", strtotime($row['date'])),
					'tides' => array('height' => $row['height'], 'time' => $row['time'], 'state' => $row['state']),
				);
				$count++;
			}
		}

		$result['Search Parameters'] = array(
			'Start Date' => $date,
			'End Date' => ($days != '') ? Date('d-m-Y', strtotime($date . "+ " . $days . "days")) : Date('d-m-Y', strtotime($date . "+ 3 months")),
			'Limit' => ($days != '') ? $days . " - Days" : "90 - Days",
		);

		$result['info'] = array_values($d1);
		echo json_encode($result, JSON_PRETTY_PRINT);

	}
}