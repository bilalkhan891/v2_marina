<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Admin extends CI_Controller {
    function __construct() {
        parent::__construct();
        if (!$this->session->has_userdata('is_logged_in')) {
            redirect('login');
        }
        // $this->load->helper('form');
        $this->load->model('Mainmodel', 'mm');
        $this->load->helper('form');
        $this->session->keep_flashdata('message');
    }
    public function index() {
        redirect('admindashboard');
    }
    function marinas() {
        $data['title'] = 'Marinas';
        $data['view'] = $this->load->view('admin/marinas', $data, TRUE);
        $this->load->view('admin/main', $data);
    }
    // admin user details
    public function userlist() {
        $data['msg'] = $this->session->flashdata('msg');
        $data['data'] = $this->mm->fetchArr('admin');
        $data['title'] = 'User List';
        $data['msg'] = $this->session->flashdata('msg');
        $data['view'] = $this->load->view('admin/userlist', $data, TRUE);
        $this->load->view('admin/main', $data);
    }
    public function contactDetails() {
        $data['data'] = $this->mm->fetchArr('contact');
        $data['title'] = 'Contact Details';
        $data['view'] = $this->load->view('admin/contact', $data, TRUE);
        $this->load->view('admin/main', $data);
    }
    public function addUser() {
        $username = ($this->input->post('username')) ? $this->input->post('username') : '';
        $email = ($this->input->post('email')) ? $this->input->post('email') : '';
        $phone = ($this->input->post('phone')) ? $this->input->post('phone') : '';
        $password = sha1(($this->input->post('password')) ? $this->input->post('password') : '1234');
        $data = $this->db->query("SELECT * FROM `admin` WHERE `username`= '" . $username . "'");
        // print_r($data->result()); die;
        if (!empty($data->result())) {
            $this->session->set_flashdata('msg', '<span class="alert alert-danger">Username <strong>' . $username . '</strong> already exists, try another username.<span>');
        } else {
            $data = array('username' => $username, 'date' => date('Y-m-d'), 'email' => $email, 'phone' => $phone, 'password' => $password, 'status' => 'Approved');
            if ($this->mm->insertRow('admin', $data)) {
                // $this->email->from('info@admin.myhomeport.info', 'Your Name');
                // $this->email->to($email);
                // $config = array (
                //                   'mailtype' => 'html',
                //                   'charset'  => 'utf-8',
                //                   'priority' => '1'
                //                    );
                // $this->email->initialize($config);
                // $this->email->subject('Registed User Account');
                // $this->email->message(`
                //         <p>You account has been created on <a href="www.admin.myhomeport.info">Myhomeport</a>.</p>
                //         <p>Please visite the site and login through details below.</p>
                //         <p>User Name: `.$username.`</p>
                //         <p>Password : `.$password.`</p>
                //         <p>Note: If you are facing any problems with login please contact us through the site.</p>
                //     `);
                // $this->email->send();
                $this->session->set_flashdata('msg', '<span class="alert alert-success ">User added.<span>');
                redirect('admin/userlist');
            } else {
                $this->session->set_flashdata('msg', '<span class="alert alert-danger">Couldn\'t add user. Try again<span>');
            }
        }
        redirect('admin/userlist');
    }
    public function updateUser() {
        $id = ($this->input->post('id')) ? $this->input->post('id') : '';
        if ($this->input->post('id') == 1) {
            $this->session->set_flashdata('msg', '<span class="alert alert-danger">Admin user 1 can\'t be updated.</span>');
            redirect('admin/userlist');
        }
        $username = ($this->input->post('username')) ? $this->input->post('username') : '';
        $email = ($this->input->post('email')) ? $this->input->post('email') : '';
        $phone = ($this->input->post('phone')) ? $this->input->post('phone') : '';
        $status = ($this->input->post('status')) ? $this->input->post('status') : '';
        $where = array('id' => $id, 'id !=' => '1');
        $data = array('username' => $username, 'date' => date('Y-m-d'), 'email' => $email, 'phone' => $phone, 'status' => $status);
        if ($this->mm->updateRow('admin', $data, $where)) {
            redirect('admin/userlist');
        }
    }
    public function deleteUser($id = '') {
        if ($id == 1) {
            $this->session->set_flashdata('msg', '<span class="alert alert-danger">Admin user 1 can\'t be updated.</span>');
            redirect('admin/userlist');
        }
        if ($this->mm->deleteRow('admin', ['id' => $id, 'id !=' => '1'])) {
            $this->session->set_flashdata('msg', '<span class="alert alert-success">User deleted successfully</span>');
        } else {
            $this->session->set_flashdata('msg', '<span class="alert alert-danger">Can\'t delete this user.</span>');
        }
        redirect('admin/userlist');
    }
    public function sponsors( $id = '', $user = '' ) {
         
        $this->session->set_userdata(['marinauser' => $user, 'marinaid' => $id]);
        $data['data'] = $this->mm->fetchArr('sponsor', '', ['marinaid' => $id]);
        $data['marinauser'] = $user;
        $data['marinaid'] = $id;
        $data['title'] = 'Sponsors';
        $data['msg'] = $this->session->flashdata('msg');
        $data['view'] = $this->load->view('admin/sponsors', $data, TRUE);
        $this->load->view('admin/main', $data);
    }
    public function sponsor($id = '', $title = '') {
        $this->session->set_userdata(['sponsorname' => urldecode($title), 'sponsorid' => $id]);
        $data['data'] = $this->mm->fetchArr('sponsor', '', ['id' => $id])[0];
        $data['sponsorname'] = urldecode($title);
        $data['sponsorid'] = $id;
        $data['title'] = urldecode($title);
        $data['msg'] = $this->session->flashdata('msg');
        $data['view'] = $this->load->view('admin/sponsor', $data, TRUE);
        $this->load->view('admin/main', $data);
    }
    public function submitSponsor() { 
        $fileExt = pathinfo($_FILES["icon"]["name"], PATHINFO_EXTENSION);
        $action = ($this->input->post('action')) ? $this->input->post('action') : "" ;
        $sponsorId = ($this->input->post('id')) ? $this->input->post('id') : "" ;
        $marinausername = $this->session->userdata('marinauser'); 
        $icon = '';
        $sponsorType = $this->input->post('typeId');
        $filePath = './uploads/icons/'.$marinausername."/".$sponsorType;

        if ($fileExt != 'png') {
            $this->session->set_flashdata('msg','<span class="alert alert-danger">Only .png files are allowed.</span>');
            if ($action == 'update') {
                redirect('admin/sponsor/'.$sponsorId);
            }
            redirect('admin/sponsors/'.$this->input->post('marinaid')."/".$marinausername);
        }
        removeDirectory($filePath); 
        if(!is_dir($filePath)){
          mkdir($filePath);
        } 
        $config['upload_path'] = './uploads/icons/'.$marinausername."/".$sponsorType;
        $config['allowed_types'] = 'png';
        $config['file_name'] = 'sponsor_icon';
        $this->load->library('upload', $config);
         // Upload icon
        
        if ($this->input->post('action') == 'update' && $_FILES['icon']['name'] != '') {
            $this->mm->updateRow('sponsor', ['navIcon' => ''], ['id' => $this->input->post('id')]);
            $scaleArr = array(
              'scale' => array('@1x', '@2x', '@3x', '@hdpi', '@mdpi', '@unknown', '@xhdpi', '@xxhdpi', '@xxxhdpi'),
              'height' => array('64', '128', '192', '96', '64', '265', '128', '192', '265')
            ); 

            // Delete all previous icons
            
            // if (is_readable($filePath."/sponsor_icon.png")) {
            //    unlink($filePath."/sponsor_icon.png");
            // } 
            // if (is_dir($filePath."/navIcon")) {
            //    rmdir($filePath."/navIcon");
            //     echo 'deleted';die;
            // } else {
            //     echo 'not deleted';die;
            // }
            // for ($i=0; $i < 9; $i++) { 
            //     if (is_readable($filePath."/sponsor_icon".$scaleArr['scale'][$i].".png")) {
            //         unlink($filePath."/sponsor_icon".$scaleArr['scale'][$i].".png");
            //     }
            // }

            if (!$this->upload->do_upload('icon')) {
               $error = array('error' => $this->upload->display_errors()); 
               $this->session->set_flashdata('msg', '<span class="alert alert-danger">'.$error.'</span>');
            } else {
               $fileData = $this->upload->data();
               $icon = '/uploads/icons/'.$marinausername."/".$this->input->post('typeId')."/".$fileData['file_name']; 
               $this->scaleIcon($fileData['full_path'], $fileData['file_path'], $fileData['file_name']);
            } 
        } else { 
            $icon = $this->input->post('oldIcon');
        }
         
        $data['formdata'] = Array
                    (
                        'marinaid'      => $this->input->post('marinaid'),
                        'marinauser'    => $marinausername,
                        'businessname'  => $this->input->post('businessname'),
                        'contacttitle'  => $this->input->post('contacttitle'),
                        'fstname'       => $this->input->post('fstname'),
                        'surname'       => $this->input->post('surname'),
                        'address1'      => $this->input->post('address1'),
                        'address2'      => $this->input->post('address2'),
                        'address3'      => $this->input->post('address3'),
                        'postcode'      => $this->input->post('postcode'),
                        'tel'           => $this->input->post('tel'),
                        'email'         => $this->input->post('email'),
                        'website'       => $this->input->post('website'),
                        'mon'       => $this->input->post('mon'),
                        'sat'       => $this->input->post('sat'),
                        'sun'       => $this->input->post('sun'),
                        'lat'           => $this->input->post('lat'),
                        'lng'          => $this->input->post('lng'),
                        'icon'          => $icon,
                        'typeId'          => $this->input->post('typeId'),
                        'msg'          => $this->input->post('msg')
                    ); 

        // print_r($data['formdata']); die;

        if ($this->input->post('action') == "update") { 
            $this->mm->updateRow('sponsor', $data['formdata'], ['id' => $this->input->post('id')]);
            $this->session->set_flashdata('<span class"alert alert-success>Sponsor Updated</span>"'); 
        } else { 
            $this->mm->insertRow('sponsor', $data['formdata']);
            $this->session->set_flashdata('<span class"alert alert-success>Sponsor Added</span>"');
        } 
        redirect('admin/sponsors/'.$this->input->post('marinaid')."/".$marinausername);
    }
    public function scaleIcon($imgSrc = "", $target_path = '', $fileName) { 
          // echo $imgSrc; die;
      $exImgSrc = explode('.', $fileName);
      $scaleArr = array(
        'scale' => array('@1x', '@2x', '@3x', '@hdpi', '@mdpi', '@unknown', '@xhdpi', '@xxhdpi', '@xxxhdpi'),
        'height' => array('64', '128', '192', '96', '64', '265', '128', '192', '265')
      );
      $this->load->library('image_lib');
      for ($i = 0; $i <= 8; $i++) {
        $config_manip = array(
          'image_library' => 'gd2',
          'source_image' => $imgSrc,
          'new_image' => $target_path,
          'maintain_ratio' => TRUE,
          'create_thumb' => TRUE,
          'thumb_marker' => $scaleArr['scale'][$i], 
          'height' => $scaleArr['height'][$i]
        ); 
        $this->image_lib->initialize($config_manip);

        if (!$this->image_lib->resize()) {
          $result = $this->image_lib->display_errors();
        } else {
          $result = 'success';
        }
        $this->image_lib->clear();
      } 
        return $result;
    }
    public function generateNavIcons($id = '', $typeId = '' ) { 
        // echo $imgSrc; die;
        $data = $this->mm->fetchArr('sponsor', ['icon'], ['id' => $id]); 
        
        if (!isset($data[0]['icon']) || $data[0]['icon'] == '') {
            $this->session->set_flashdata('msg', '<span class="alert alert-danger">Upload Icon First!</span>');
            redirect(base_url('admin/sponsor/'.$id));
        }
        $icon = explode("/", $data[0]['icon']); 
        $marinausername = $this->session->userdata('marinauser');
        if (!is_dir('./uploads/icons/'.$marinausername.'/'.$typeId)) {
            mkdir('./uploads/icons/'.$marinausername.'/'.$typeId);
            if(!is_dir('./uploads/icons/'.$marinausername.'/'.$typeId.'/navIcon')){
              mkdir('./uploads/icons/'.$marinausername.'/'.$typeId.'/navIcon');
            }
        } else {
            if(!is_dir('./uploads/icons/'.$marinausername.'/'.$typeId.'/navIcon')){
              mkdir('./uploads/icons/'.$marinausername.'/'.$typeId.'/navIcon');
            }
        }
        
        $exImgSrc = explode('.', $data[0]['icon']);
        $scaleArr = array(
            'scale' => array('@1x', '@2x', '@3x', '@hdpi', '@mdpi', '@unknown', '@xhdpi', '@xxhdpi', '@xxxhdpi'),
            'height' => array('32', '64', '96', '48', '32', '128', '64', '96', '128')
        );
        $this->load->library('image_lib');
        for ($i = 0; $i <= 8; $i++) {
            $config_manip = array(
            'image_library' => 'gd2',
            'source_image' => ".".$data[0]['icon'],
            'new_image' => './uploads/icons/'.$marinausername."/".$typeId."/navIcon",
            'maintain_ratio' => TRUE,
            'create_thumb' => TRUE,
            'thumb_marker' => $scaleArr['scale'][$i], 
            'height' => $scaleArr['height'][$i]
            );
            $this->image_lib->initialize($config_manip);

            if (!$this->image_lib->resize()) {
            $result = $this->image_lib->display_errors();
            } else {
            $result = 'success';
            }
            $this->image_lib->clear();
        } 
        if ($result == 'success') { 
            $this->mm->updateRow('sponsor', ['navIcon' => '/uploads/icons/'.$marinausername.'/'.$typeId.'/navIcon/'.$icon[5]], ['id' => $id]);
            $this->session->set_flashdata('msg', '<span class="alert alert-success">Icons Generated Successfully</span>');
            redirect(base_url('admin/sponsor/'.$id));
        } else {
            $this->session->set_flashdata('msg', '<span class="alert alert-danger">Something went wrong.</span>');
            redirect(base_url('admin/sponsor/'.$id));
        }
    }
    public function deleteSponsor($id){ 
        $this->mm->deleteRow('sponsor', ['id' => $id]);
        $this->session->set_flashdata('msg', '<spna class="alert alert-info">Deleted Successfully</span>');
        redirect('admin/sponsors/' . $this->session->userdata('marinaid') . '/' . $this->session->userdata('marinauser'));
    }
    public function adtypes($user = '', $id = '') {
        $data['data'] = $this->mm->fetchArr('businesstypes', "", ['marinaid' => $id]);
        $this->session->set_userdata(['marinauser' => $user, 'marinaid' => $id]);
        $data['marinauser'] = $user;
        $data['marinaid'] = $id;
        $data['title'] = 'General Advertisers';
        $data['msg'] = $this->session->flashdata('msg');
        $data['view'] = $this->load->view('admin/adtypes', $data, TRUE);
        $this->load->view('admin/main', $data);
    }
    public function addtypes() {
        if ($this->input->post('name')) {
            $name = $this->input->post('name');
        }
        $this->mm->insertRow('businesstypes', ['name' => $name, 'marinaid' => $this->session->userdata('marinaid'), 'apicheck' => 'no']);
        $this->session->set_flashdata('msg', '<span class="alert alert-success">Added Successfully</span>');
        redirect('admin/adtypes/' . $this->session->userdata('marinauser') . '/' . $this->session->userdata('marinaid'));
    }
    public function deletetype($id = '') {
        $db = $this->mm->fetchArr('businesstypes', '', ['id' => $id]);
        if (!empty($db[0])) {
            $this->mm->deleteRow('businesstypes', ['id' => $id]);
            $this->mm->deleteRow('business', ['businesstypeid' => $id]);
            $this->session->set_flashdata('msg', '<spna class="alert alert-info">Deleted Successfully</span>');
            redirect('admin/adtypes/' . $this->session->userdata('marinauser') . '/' . $this->session->userdata('marinaid'));
        } else {
            $this->session->set_flashdata('msg', '<spna class="alert alert-info">Something went wrong</span>');
            redirect('admin/adtypes/' . $this->session->userdata('marinauser') . '/' . $this->session->userdata('marinaid'));
        }
    }
    public function businesses($id = '', $name = '', $apitypeId = "") {
        $name = urldecode($name);
        $this->session->set_userdata(['typeId' => $id, 'typeName' => urlencode($name), 'apitypeId' => $apitypeId, 'apitypeId' => $apitypeId]);
        $data['data'] = $this->mm->fetchArr('business', '', ['businesstypeid' => $id]);
        $this->mm->updateRow('business', ['apitypeId' => $apitypeId], ['businesstypeid' => $id]);
        $data['typeid'] = $id;
        $data['apitypeid'] = $apitypeId;
        $data['title'] = urldecode($name) . ' Business';
        $data['msg'] = $this->session->flashdata('msg');
        $data['view'] = $this->load->view('admin/businesses', $data, TRUE);
        $this->load->view('admin/main', $data);
    }
    public function insertbusiness() {
        $formData = $this->input->post();
        // print_r($formData);
        // print_r($this->mm->fetchArr('business', ''));
        $sendData = Array('apitypeId' => $this->input->post('apitypeid'), '_id' => '', 'name' => ucfirst($this->input->post('businessname')), 'contactTitle' => ucfirst($this->input->post('contacttitle')), 'Contact1stName' => ucfirst($this->input->post('1stname')), 'ContactSurname' => ucfirst($this->input->post('surname')), 'AddressLine1' => ucfirst($this->input->post('address1')), 'AddressLine2' => ucfirst($this->input->post('address2')), 'AddressLine3' => ucfirst($this->input->post('address3')), 'PostCode' => strtoupper($this->input->post('postcode')), 'tel' => $this->input->post('tel'), 'email' => ucfirst($this->input->post('email')), 'web' => $this->input->post('website'), 'lat' => (double)$this->input->post('lat'), 'longitude' => (double)$this->input->post('long'), 'cost' => '', 'paymentDate' => '', 'marinaid' => $this->session->userdata('marinaid'), 'apicheck' => 'no', 'businesstypeid' => $this->session->userdata('typeId'));
        $this->mm->insertRow('business', $sendData);
        $this->session->set_flashdata('msg', '<span class="alert alert-success">Added Successfully</span>');
        redirect('admin/businesses/' . $this->session->userdata('typeId') . "/" . $this->session->userdata('typeName'));
    }
    public function getbusiness($id = '', $name = '') {
        $name = urldecode($name);
        $this->session->set_userdata(['businessid' => $id, 'businessname' => urldecode($name) ]);
        $data['data'] = $this->mm->fetchArr('business', '', ['marinaid' => $this->session->userdata('marinaid'), 'id' => $id]);
        $data['data'] = (!empty($data['data'][0])) ? $data['data'][0] : '';
        $data['typeid'] = $id;
        $data['title'] = ' Business';
        $data['msg'] = $this->session->flashdata('msg');
        $data['view'] = $this->load->view('admin/getbusiness', $data, TRUE);
        $this->load->view('admin/main', $data);
    }
    public function deletebusiness($id = '', $_id = '') {
        $data['data'] = $this->mm->deleteRow('business', ['marinaid' => $this->session->userdata('marinaid'), 'id' => $id]);
        $this->session->set_flashdata('msg', '<span class="alert alert-success">Deleted Successfully</span>');
        redirect('admin/businesses/' . $this->session->userdata('typeId') . '/' . urlencode($this->session->userdata('typeName')));
    }
    public function updatebusiness() {
        $sendData = Array(
            'apitypeId' => $this->input->post('apitypeId'), 
            '_id' => $this->input->post('_id'), 
            'name' => $this->input->post('name'), 
            'contactTitle' => $this->input->post('contactTitle'), 
            'Contact1stName' => $this->input->post('Contact1stName'), 
            'ContactSurname' => $this->input->post('ContactSurname'), 
            'AddressLine1' => $this->input->post('AddressLine1'), 
            'AddressLine2' => $this->input->post('AddressLine2'), 
            'AddressLine3' => $this->input->post('AddressLine3'), 
            'PostCode' => $this->input->post('PostCode'), 
            'tel' => $this->input->post('tel'), 
            'email' => $this->input->post('email'), 
            'web' => $this->input->post('web'), 
            'lat' => (double)$this->input->post('lat'), 
            'longitude' => (double)$this->input->post('longitude'), 
            'cost' => $this->input->post('cost'), 
            'paymentDate' => $this->input->post('paymentDate'), 
            'marinaid' => $this->input->post('marinaid'), 
            'apicheck' => $this->input->post('apicheck'), 
            'businesstypeid' => $this->input->post('businesstypeid')
        );
        $this->mm->updateRow('business', $sendData, ['id' => $this->session->userdata('businessid') ]);
        $this->session->set_flashdata('msg', '<span class="alert alert-success">Updated Successfully</span>');
        redirect('admin/getbusiness/' . $this->session->userdata('businessid') . '/' . urlencode($this->session->userdata('businessname')));
    }
}
