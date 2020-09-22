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
    
    public function updaterates(){

    	switch ($this->marinausername) {
    		case 'sailbristol':
    			# code...
    			break;
    		
    		case 'swanseamarina':
    			$this->updateSwanseaRates();
    			break;
    		
    		default:
    			echo "Something went wrong!";
    			break;
    	}

    }


    private function updateSwanseaRates(){ 
    	if (empty($this->input->post())) {
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

    		$data['view'] = $this->load->view('users/'.$this->marinausername.'/updaterates', $data, TRUE);
    		$this->load->view('users/usermain', $data);
    		 
    	} else {
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
    		redirect('rates/updaterates');
    	}
    	
    }

    private function updateBristolRates($update = ""){
        
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