<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct() {   
		parent::__construct();
	    //$this->load->model('M_artikel');
	}

	public function index() {
		//$artikel = $this->M_artikel->select_artikel_publish_user();  
		

		$this->load->view('login_v');
	}
}

/* End of file home.php */
/* Location: ./application/controllers/home.php */