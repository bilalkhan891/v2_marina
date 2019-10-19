<?php 

defined('BASEPATH') OR exit('No direct script access allowed');
 
class Admindashboard extends CI_Controller {
 
    function __construct() {

    	parent::__construct(); 
        if (!$this->session->has_userdata('is_logged_in')) { 
            redirect(base_url().'login'); 
        } 
    	// $this->load->helper('form'); 
    	$this->load->model('Mainmodel', 'mm'); 
        $this->load->helper('form');  
        $this->session->keep_flashdata('message'); 
    } 
    public function index() {
 
    	$data['greendeal']  = $this->mm->fetchArr('subscribers', '', ['subType' => '0']);
        $data['left']       = $this->mm->fetchArr('subscribers', '', ['subType' => '1']);
        $data['right']      = $this->mm->fetchArr('subscribers', '', ['subType' => '2']);
        $data['msg']        = $this->session->flashdata('msg');

        $order['by']        = 'subType';
        $order['order']     = 'ASC'; 
        $data['allsubs']    = $this->mm->fetchArr('subscribers', '', '', NULL, $order);
        $data['allsubs1']   = array();
        $i = 0;
        foreach ($data['allsubs'] as $arr) {
            $data['allsubs1'][$i] = array_values($arr);
            $i++;
        }

	    $view['view']       = $this->load->view('admin/dashboard', $data, TRUE); 
        $this->load->view('admin/main', $view); 
    } 
    // Function to update Emails
    // public function updateEmails(){$existing = array_column($this->mm->fetchArr('subscribers', 'email', ['subType' => (int)$i]), 'email'); foreach ($response as $email) {if (!in_array($email, $existing)) {$this->mm->insertRow('subscribers', ['email' => $email, 'subType' => (int)$i, 'marinaId' => 1]); } } $this->session->set_flashdata('msg', '<span class="alert alert-success"> Records updated successfully.</span>'); $order['by'] = 'subType'; $order['order'] = 'ASC'; $allsubs = $this->mm->fetchArr('subscribers', '', '', NULL, $order); }

    public function viewAllSubs(){
        $data =   ' ';
        $data .=      '<thead>';
        $data .=        '<tr>';
        $data .=            '<th scope="col">#</th>';
        $data .=            '<th scope="col">Type</th>';
        $data .=            '<th scope="col">Name</th>';
        $data .=        '</tr>';
        $data .=      '</thead>';
        $data .=     ' <tbody>';

        $order['by'] = 'subType';
        $order['order'] = 'ASC'; 
        $array = $this->mm->fetchArr('subscribers', '', '', NULL, $order);
        $i = 1;
        foreach ($array as $row) {
            
            if ($row['subType'] == 0 ) {
                $name = "Green Deal";
                
            } elseif ($row['subType'] == 1 ) {
                $name = "Left";
                
            } elseif ($row['subType'] == 2 ) {
                $name = "Right";
                
            } 

            $data .=       ' <tr>'; 
            $data .=         ' <th scope="row" >'.$i.'</th>';
            $data .=         ' <td>'.$name.'</td>';
            $data .=         ' <td>'.$row['email'].'</td>'; 
            $data .=        '</tr>';

            $i++;
        } 
        $data .=      '</tbody>'; 

        echo $data;
    } 
}
 


 