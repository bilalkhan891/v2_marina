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
  public function editMarina($id = ''){
 
    $data['data'] = $this->mm->fetchArr('marinas', '', ['id' => $id])[0]; 
    $data['msg'] = $this->session->flashdata('msg');
    $data['title'] = 'Edit Marinas';
    $data['view'] = $this->load->view('admin/updatemarina', $data, TRUE);
    $this->load->view('admin/main', $data);
  }
   
  public function submitMarina(){
  
    $csvgenerator = '';

    $data['username']    = ($this->input->post('username')) ? $this->input->post('username') : '';
    $data['appname']    = ($this->input->post('appname')) ? $this->input->post('appname') : '';
    $data['welcometo']    = ($this->input->post('welcometo')) ? $this->input->post('welcometo') : '';
    $data['weatherlocation'] = ($this->input->post('weatherlocation')) ? $this->input->post('weatherlocation') : '';
    // $data['appicon'] =      ($this->input->post('appicon')) ? $this->input->post('appicon') : '';
    // $data['marinaicons'] = ($this->input->post('marinaicons')) ? $this->input->post('marinaicons') : '';
    // $data['csvgenerator'] = ($this->input->post('csvgenerator')) ? $this->input->post('csvgenerator') : '';
    $data['marinaname']  = ($this->input->post('marinaname')) ? $this->input->post('marinaname') : '';
    $data['address']     = ($this->input->post('address')) ? $this->input->post('address') : '';
    $data['address2']     = ($this->input->post('address2')) ? $this->input->post('address2') : '';
    $data['address3']     = ($this->input->post('address3')) ? $this->input->post('address3') : '';
  
    $data['postcode']    = ($this->input->post('postcode')) ?  $this->input->post('postcode') : '';
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
       redirect('marinas');
    }

    if (!empty($this->mm->fetchArr('marinas', '', ['username' => $data['username']])[0])) {
      $this->session->flashdata('msg', '<span class="alert alert-warning">This marina already exists</span>');
       redirect('marinas');
    }

    if (!empty($this->mm->fetchArr('marinas', '', ['email' => $data['email']])[0])) {
      $this->session->flashdata('msg', '<span class="alert alert-warning">Email Used for this marina already exists. Try another one.</span>');
       redirect('marinas');
    }


  $config['upload_path'] = './uploads/icons';
  $config['allowed_types'] = 'jpg|png|csv';
  $config['encrypt_name'] = TRUE;
  $this->load->library('upload', $config);
  // Upload Appicon
 if (!$this->upload->do_upload('appicon')) {
    $error = array('error' => $this->upload->display_errors()); 
  } else {
    $fileData = $this->upload->data();
    
    $appicon ='uploads/icons/'.$fileData['file_name']; 
  }
  // upload marinaicons

  if (!$this->upload->do_upload('marinaicons')) {
    $error = array('error' => $this->upload->display_errors()); 
  } else {
    $fileData = $this->upload->data();
    $marinaicons= 'uploads/icons/'.$fileData['file_name'];
  }

// Upload csv and xsls file
   if (!$this->upload->do_upload('csvgenerator')) {
    $error = array('error' => $this->upload->display_errors()); 
  } else {
    $fileData = $this->upload->data();
    $csvgenerator = 'uploads/csvgenerator/'.$fileData['file_name'];
  }


    $data = array(
         'username'   => $data['username'], 
          'marinaname' => $data['marinaname'], 
          'appname'=>$data['appname'],
          'welcometo'=>$data['welcometo'],
          'weatherlocation'=>$data['weatherlocation'],
          'appicon'=>$appicon,
          'marinaicons'=>$marinaicons,
          'csvgenerator'=>$csvgenerator,
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
    $this->db->insert('marinas', $data);
    $ids['marinas'] = $this->db->insert_id();
    $marinaid = $ids['marinas'];
 
  /////////////////
  // User Insert //
  /////////////////
     
    $values = array(
      'username'   => $data['username'], 
      'date'       => date('Y-m-d'), 
      'email'      => $data['email'], 
      'phone'      => $data['phone'], 
      'password'   => 'admin@123', 
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

    public function updateMarina(){
      
      $id   = ($this->input->post('id')) ? $this->input->post('id') : ''; 
      $data['appname']    = ($this->input->post('appname')) ? $this->input->post('appname') : '';
      $data['welcometo']    = ($this->input->post('welcometo')) ? $this->input->post('welcometo') : '';
      $data['weatherlocation'] = ($this->input->post('weatherlocation')) ? $this->input->post('weatherlocation') : '';
      // $data['appicon'] =      ($this->input->post('appicon')) ? $this->input->post('appicon') : '';
      // $data['marinaicons'] = ($this->input->post('marinaicons')) ? $this->input->post('marinaicons') : '';
      // $data['csvgenerator'] = ($this->input->post('csvgenerator')) ? $this->input->post('csvgenerator') : '';
      $data['marinaname']  = ($this->input->post('marinaname')) ? $this->input->post('marinaname') : '';
      $data['username']  = ($this->input->post('username')) ? $this->input->post('username') : '';
      $data['address']     = ($this->input->post('address')) ? $this->input->post('address') : '';
      $data['address2']     = ($this->input->post('address2')) ? $this->input->post('address2') : '';
      $data['address3']     = ($this->input->post('address3')) ? $this->input->post('address3') : '';
    
      $data['postcode']    = ($this->input->post('postcode')) ?  $this->input->post('postcode') : '';
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
    print_r($data);
    $appicon = '';
    $marinaicons = '';
    $csvgenerator = '';
  
    $config['upload_path'] = './uploads/icons';
    $config['allowed_types'] = 'jpg|png|csv';
    $this->load->library('upload', $config);
    // Upload Appicon
   if (!$this->upload->do_upload('appicon')) {
      $error = array('error' => $this->upload->display_errors()); 
    } else {
      $fileData = $this->upload->data();
      
      $appicon ='uploads/icons/'.time().'-'.$fileData['file_name']; 
    }
    // upload marinaicons

    if (!$this->upload->do_upload('marinaicons')) {
      $error = array('error' => $this->upload->display_errors()); 
    } else {
      $fileData = $this->upload->data();
      $marinaicons= 'uploads/icons/'.time().'-'.$fileData['file_name'];;
    }

  // Upload csv and xsls file
     if (!$this->upload->do_upload('csvgenerator')) {
      $error = array('error' => $this->upload->display_errors()); 
    } else {
      $fileData = $this->upload->data();
      $csvgenerator = 'uploads/csvgenerator/'.time().'-'.$fileData['file_name'];
    }


    $dbdata = array( 
        'marinaname' => $data['marinaname'], 
        'username' => $data['username'], 
        'appname'=>$data['appname'],
        'welcometo'=>$data['welcometo'],
        'weatherlocation'=>$data['weatherlocation'],
        'appicon'=>$appicon,
        'marinaicons'=>$marinaicons,
        'csvgenerator'=>$csvgenerator,
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
           'date'   => date('Y-m-d'),
         'status'   => 'approved'
    );
      
    if ($this->mm->updateRow('marinas', $dbdata, ['id' => $id])) {
      $this->session->set_flashdata('msg', '<span class="alert alert-success">Marina Updated Successfully</span>');
      redirect('marinas');
    }
    $this->session->set_flashdata('msg', '<span class="alert alert-success">Something Went Wrong!</span>');
    redirect('marinas');
  }

  public function sendEmail($email, $body, $subject) {
    $this->session->set_flashdata('email', $email." ".$body." ".$subject);
  }
 
 

}