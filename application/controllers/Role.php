<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Role extends CI_Controller {

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
    $data['data'] = $this->mm->fetchArr('user_role');
    $data['title'] = 'Roles';
    $data['view'] = $this->load->view('admin/role', $data, TRUE);
    $this->load->view('admin/main', $data);
  } 
  
    public function add(){
    
    $this->db->insert('user_role',$_POST);
    $this->session->set_flashdata('msg', '<span class="alert alert-success ">Role added.<span>');
    redirect('Role/index');
  }
  
  public function update()
  {
      $arr = [
             'role_name'=> $this->input->post('name'),
             'role_description'=> $this->input->post('description'),
          ];
    $this->db->where('role_id',$this->input->post('id'))->update('user_role',$arr);
    $this->session->set_flashdata('msg', '<span class="alert alert-success ">Role updated.<span>');
    redirect('Role/index');  
  }
  
    public function delete($id)
  {

    $this->db->where('role_id',$id)->delete('user_role');
    $this->session->set_flashdata('msg', '<span class="alert alert-success ">Role Deleted.<span>');
    redirect('Role/index');  
  }
  
}

?>