<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Marinas extends CI_Controller {
    
  function __construct() {
    parent::__construct();
    // $this->load->helper('form');
    $this->load->model('Mainmodel', 'mm');
    $this->load->helper(array('form', 'url')); 
    $this->load->library('form_validation');
  }

  public function index() { 

    if (!$this->session->has_userdata('is_logged_in')) {
      redirect(base_url().'admin/login');
    }
    $data['msg'] = $this->session->flashdata('msg');
    $data['data'] = $this->mm->fetchArr('marinas');
    $data['title'] = 'Marinas';
    $data['view'] = $this->load->view('admin/marinas', $data, TRUE);
    $this->load->view('admin/main', $data);
  } 

  public function single($id = ''){  

    $data['data'] = $this->mm->fetchArr('marinas', '',['id' => $id]);
    $data['title'] = 'Marinas';
    $data['view'] = $this->load->view('admin/singlemarina', $data, TRUE);
    $this->load->view('admin/main', $data);
  }
  public function deletemarina($id = ''){
    if ($id == 1) {
      $this->session->set_flashdata('msg', '<span class="alert alert-danger">You dont have permissions to delete this marina</span>');
      redirect('marinas');
    }
    $data['marina'] = $this->mm->deleteRow('marinas', ['id' => $id]);
    $data['ids'] = $this->mm->deleteRow('ids', ['marinaid' => $id]);
    $data['users'] = $this->mm->deleteRow('userlogin', ['marinaid' => $id]); 
    $data['vatrates']     = $this->mm->deleteRow('vatrates', ['marinaid' => $id]);
    $data['premiumsanddiscounts']     = $this->mm->deleteRow('premiumsanddiscounts', ['marinaid' => $id]);
    $data['creditcardsurcharge']    = $this->mm->deleteRow('creditcardsurcharge', ['marinaid' => $id]);
    $data['annual']     = $this->mm->deleteRow('annual', ['marinaid' => $id]);
    $data['summer']     = $this->mm->deleteRow('summer', ['marinaid' => $id]);
    $data['winter']     = $this->mm->deleteRow('winter', ['marinaid' => $id]);
    $data['visitor']    = $this->mm->deleteRow('visitor', ['marinaid' => $id]);
    $data['harbour']    = $this->mm->deleteRow('harbour', ['marinaid' => $id]);
    $data['storage']    = $this->mm->deleteRow('storage', ['marinaid' => $id]);
    $data['hoist']    = $this->mm->deleteRow('hoist', ['marinaid' => $id]);
    $data['creditcardsurcharge']    = $this->mm->deleteRow('creditcardsurcharge', ['marinaid' => $id]);
    $data['electricity']    = $this->mm->deleteRow('electricity', ['marinaid' => $id]); 
 
    $this->session->set_flashdata('msg', $data);
    redirect('marinas');  
  }

  public function addMarina(){

    $data['data'] = $this->mm->fetchArr('marinas'); 
    $data['msg'] = $this->session->flashdata('msg');
    $data['title'] = 'Add Marinas';
    $data['view'] = $this->load->view('admin/addmarina', $data, TRUE);
    $this->load->view('admin/main', $data);
  }
   
  public function submitMarina(){

    $data['username']    = ($this->input->post('username')) ? $this->input->post('username') : '';
    $data['marinaname']  = ($this->input->post('marinaname')) ? $this->input->post('marinaname') : '';
    $data['address']     = ($this->input->post('address')) ? $this->input->post('address') : '';
    $data['address2']     = ($this->input->post('address2')) ? ', '.$this->input->post('address2') : '';
    $data['address3']     = ($this->input->post('address3')) ? ', '.$this->input->post('address3') : '';
    $data['postcode']    = ($this->input->post('postcode')) ? ', '.$this->input->post('postcode') : '';
    $data['contactname'] = ($this->input->post('contactname')) ? $this->input->post('contactname') : '';
    $data['phone']       = ($this->input->post('phone')) ? $this->input->post('phone') : '';
    $data['email']       = ($this->input->post('email')) ? $this->input->post('email') : '';
    $data['web']         = ($this->input->post('web')) ? $this->input->post('web') : '';
    $data['facebook']    = ($this->input->post('facebook')) ? $this->input->post('facebook') : '';
    $data['flickr']      = ($this->input->post('flickr')) ? $this->input->post('flickr') : '';
    $data['twitter']     = ($this->input->post('twitter')) ? $this->input->post('twitter') : '';
    $data['mon']         = ($this->input->post('mon')) ? $this->input->post('mon') : '';
    $data['sat']         = ($this->input->post('sat')) ? $this->input->post('sat') : '';
    $data['sun']         = ($this->input->post('sun')) ? $this->input->post('sun') : '';
    $data['lat']         = ($this->input->post('lat')) ? $this->input->post('lat') : '';
    $data['lon']         = ($this->input->post('lon')) ? $this->input->post('lon') : '';
    $data['security']    = ($this->input->post('security')) ? $this->input->post('security') : '';
    $data['channel']     = ($this->input->post('channel')) ? $this->input->post('channel') : '';
    $data['position']    = ($this->input->post('position')) ? $this->input->post('position') : '';

    if ($data['username'] == '') {
      $this->session->flashdata('msg', '<span class="alert alert-warning">Username Required</span>');
       redirect('marinas/addMarina');
    }

    if (!empty($this->mm->fetchArr('marinas', '', ['username' => $data['username']])[0])) {
      $this->session->flashdata('msg', '<span class="alert alert-warning">This marina already exists</span>');
       redirect('marinas/addMarina');
    }

    if (!empty($this->mm->fetchArr('marinas', '', ['email' => $data['email']])[0])) {
      $this->session->flashdata('msg', '<span class="alert alert-warning">Email Used for this marina already exists. Try another one.</span>');
       redirect('marinas/addMarina');
    }

    $insertdata = array(
         'username'   => $data['username'], 
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
          'mon-fri'   => $data['mon'], 
              'sat'   => $data['sat'], 
              'sun'   => $data['sun'], 
              'lat'   => $data['lat'], 
              'lon'   => $data['lon'], 
         'security'   => $data['security'], 
          'channel'   => $data['channel'], 
         'position'   => $data['position'],     
             'date'   => date('Y-m-d'),
           'status'   => 'approved'
      );
    // insert user
    $this->db->insert('marinas', $insertdata);
    $ids['marinas'] = $this->db->insert_id();
    $marinaid = $ids['marinas'];

  /////////////////////
  // inserting rates //
  /////////////////////
      // Vat Rates  
      $values = array( 
          'normal'       => 0,
          'heatingFuel'  => 0,
          'marinaid'      => $marinaid
      );

      $this->db->insert('vatrates', $values);
      $ids['vatrates'] = $this->db->insert_id();




      // Premium and Discount Rates
      $values = array( 
          'TUdiscounts'       =>0,
          '90daysPremium'     =>0,
          'largeBoatLength'   =>0,
          'largeBoatPremium'  =>0,
          'marinaid'          => $marinaid
      );

      $this->db->insert('premiumsanddiscounts', $values);
      $ids['premiumsanddiscounts'] = $this->db->insert_id();


      // Credit card surcharge values  
      $values = array( 
          'ccSurcharge' => 0,
          'marinaid'    => $marinaid
      );

      $this->db->insert('creditcardsurcharge', $values);
      $ids['creditcardsurcharge'] = $this->db->insert_id();


     // Annual Values 
      $values = array( 
          'singlePayment'             => 0,
          'installments'              => 0,
          'smallBoatsSingle'          => 0, 
          'smallBoatsInstallments'    => 0, 
          'airberth'                  => 0,
          'marinaid'                  => $marinaid
      );

      $this->db->insert('annual', $values);
      $ids['annual'] = $this->db->insert_id();



      // SEASONAL (SUMMER) Values 

      $values = array(
          '3months'     => 0,
          '4months'     => 0,
          '5months'     => 0,
          '6months'     => 0,
          '90days'      => 0,
          'sb3months'   => 0,
          'sb4months'   => 0,
          'sb5months'   => 0,
          'sb6months'   => 0,
          'sb90days'    => 0,
          'marinaid'      => $marinaid
      );

      $this->db->insert('summer', $values);
      $ids['summer'] = $this->db->insert_id();

      // SEASONAL (Winter) Values 

      $values = array( 
          '3months'       => 0,
          '4months'       => 0,
          '5months'       => 0,
          '6months'       => 0,
          'sb3months'     => 0,
          'sb4months'     => 0,
          'sb5months'     => 0,
          'sb6months'     => 0,
          'marinaid'      => $marinaid
      );

      $this->db->insert('winter', $values);
      $ids['winter'] = $this->db->insert_id();




      // Visitor Values 


      $values = array(
          'daily'     => 0,
          'weekly'    => 0,
          '4weeks'    => 0,
          '28day'     => 0,
          'marinaid'  => $marinaid
      );

      $this->db->insert('visitor', $values);
      $ids['visitor'] = $this->db->insert_id();
 

      // TAWE + HARBOUR DUES Values  
      $values = array( 
       'annual'       => 0,  
       '6months'      => 0,
       '5months'      => 0,
       '4months'      => 0,
       '3months'      => 0,
       'harbourdues'  => 0,
       'marinaid'     => $marinaid
      );

      $this->db->insert('harbour', $values);
      $ids['harbour'] = $this->db->insert_id();


      // Storage Values 
      $values = array(
        'weekly'      => 0,
        'marinaid'    => $marinaid
      );

      $this->db->insert('storage', $values);
      $ids['storage'] = $this->db->insert_id();

      // Hoist Values 

      $values = array( 
          'liftout_61_76' => 0,
          'liftout_77_25' => 0,
          'launchoff_61_76'   => 0,
          'launchoff_77_25'   => 0,
          '2week_61_76'   => 0,
          '2week_77_25'   => 0,
          'lhr_1hr'   => 0,
          'lhr_2hr'   => 0,
          'tow'   => 0,
          'step_mast' => 0,
          'demast'    => 0,
          'liftengine'    => 0,
          'boatMover'    => 0,
          'dinghyLaunch'    => 0,
          'marinaid'      => $marinaid
      );

      $this->db->insert('hoist', $values);
      $ids['hoist'] = $this->db->insert_id();


      // Electricity 

      
      $values = array(
        'mainsline'   => 0,
        'marinaid'      => $marinaid
      );

      $this->db->insert('electricity', $values);
      $ids['electricity'] = $this->db->insert_id();

      $values = array(
        'ccSurcharge'   => 0,
        'marinaid'      => $marinaid
      );

      $this->db->insert('creditcardsurcharge', $values);
      $ids['creditcardsurcharge'] = $this->db->insert_id();
  /////////////////////
  //rates insert END //
  /////////////////////


  /////////////////
  // User Insert //
  /////////////////
     
    $values = array(
      'username'   => $data['username'], 
      'date'       => date('Y-m-d'), 
      'email'      => $data['email'], 
      'phone'      => $data['phone'], 
      'password'   => 'marina@123', 
      'status'     => 'Approved',
      'ids_id'     => '',
      'marinaid'   => $ids['marinas'],
      'created_by' => $this->session->userdata('username')
    );

    $this->db->insert('userlogin', $values);
    $ids['marinauser'] = $this->db->insert_id();

    $body = `
        <h3>My Home Port</h3>
        <h5>You have been added as <a href='www.myhomeport.info'>My Home Port</a> member</h5><br>
        <p><strong>User these credintials:</strong></p>
        <p>Username: `.$data['username'].`</p>
        <p>Password: marina@123</p><br>
        <p><a href='www.admin.myhomeport.info' target="_blank">Click here to visit the site.</a></p>
    `;
    $this->sendEmail($data['email'], $body, 'My Home Port: Congratulations Account Created Successfully');
   
  /////////////////////
  // User insert END //
  /////////////////////
    
  ///////////////
  // Ids Table //
  ///////////////

    $values = array(
      'marinaid'  => $ids['marinas'],
      'vatratesid'  => $ids['vatrates'],
      'premiumsanddiscountsid'  => $ids['premiumsanddiscounts'],
      'creditcardsurchargeid'  => $ids['creditcardsurcharge'],
      'annualid'  => $ids['annual'],
      'summerid'  => $ids['summer'],
      'winterid'  => $ids['winter'],
      'visitorid'  => $ids['visitor'],
      'harbourid'  => $ids['harbour'],
      'storageid'  => $ids['storage'],
      'hoistid'  => $ids['hoist'],
      'creditcardsurchargeid'  => $ids['creditcardsurcharge'],
      'electricityid'  => $ids['electricity'],
      'userid'  => $ids['marinauser']  
    );
    $this->db->insert('ids', $values);
    $ids['ids'] = $this->db->insert_id();

  ///////////////////
  // Ids table END //
  ///////////////////

    $this->mm->updateRow('marinas', ['ids_id' => $ids['ids']], ['id' => $ids['marinas']]);

    $this->mm->updateRow('userlogin', ['ids_id' => $ids['ids'], 'marinaid' => $ids['marinas']], ['id' => $ids['marinauser']]);

      $this->session->set_flashdata('msg', '<div class="alert alert-success">Marina added successfully<br>According Values are also being added</br> Now marina can login through below credintials</br> <strong>username: </strong>'.$data['username'].' and  <strong>Password:</strong> admin@123</div>');
      redirect('marinas');
  }

  public function sendEmail($email, $body, $subject) {
    $this->session->set_flashdata('email', $email." ".$body." ".$subject);
  }
 
 

}