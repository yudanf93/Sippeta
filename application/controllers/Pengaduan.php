<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengaduan extends CI_Controller {

	public function __construct() {   
		parent::__construct();
	    $this->load->model('M_pengaduan');
	}

	public function index() {		
		$data = array(
			'title' => 'Sippeta',
			'metades' => 'Project based strategy of all focus areas to produce quality and reach your business target stay updated with the latest trends and digital news by reading our articles written by specialists in their industry.',
			'isi' 	=> 'pengaduan'
		);
		$this->load->view("layout/wrapper", $data, false);
	}

	public function add() {  

		$valid = $this->form_validation;
		$valid->set_rules(
			'nama_pengaduan',
			'nama_pengaduan',  
			'required',  
			array(         
				'required'  =>  'Anda belum mengisikan Nama.') 
		);  
		$valid->set_rules(
			'email_pengaduan',
			'email_pengaduan',  
			'required',  
			array(         
				'required'  =>  'Anda belum mengisikan Email.') 
		); 
		$valid->set_rules(
			'nohp_pengaduan',
			'nohp_pengaduan',  
			'required',  
			array(         
				'required'  =>  'Anda belum mengisikan No Hp.') 
		);
		$valid->set_rules(
			'pesan_pengaduan',
			'pesan_pengaduan',  
			'required',  
			array(         
				'required'  =>  'Anda belum mengisikan Pesan.') 
		);    

		if ($valid->run()===false) {
			$data = array(
				'title' => 'Sippeta',
				'metades' => 'Project based strategy of all focus areas to produce quality and reach your business target stay updated with the latest trends and digital news by reading our articles written by specialists in their industry.',
				'isi' => 'pengaduan'
			);
			$this->load->view("layout/wrapper", $data, false);

		}else{
			$i = $this->input;
			$data = array(
				'nama_pengaduan' =>  $i->post('nama_pengaduan'),
				'email_pengaduan' =>  $i->post('email_pengaduan'),
				'pesan_pengaduan' =>  $i->post('pesan_pengaduan'),
				'nohp_pengaduan' =>  $i->post('nohp_pengaduan')
			);

			$this->M_pengaduan->add($data);
			$this->session->set_flashdata('notifikasi', '<center>Berhasil Mengirim data <strong> Pengaduan</strong></center>');
			redirect('/pengaduan');
		}
	}

}  

/* End of file Pengaduan.php */
/* Location: ./application/controllers/Pengaduan.php */