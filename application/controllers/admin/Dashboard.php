<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

  public function __construct()
  {   
    parent::__construct();
    $this->load->model('M_user');
    $this->load->helper(array('form', 'url'));
  }

  public function index() {
  $get_admin = $this->M_user->get_admin($this->session->userdata('id_user'));

    $data = array(
      'title' => 'Dashboard Admin SIP PETA',
      'isi' => 'admin/dashboard',
      'get_admin' => $get_admin
    );
    $this->load->view("admin/layout/wrapper", $data, false);
  }

}

/* End of file Dashboard.php */
/* Location: ./application/controllers/admin/Dashboard.php */