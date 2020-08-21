<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bukti_pembayaran extends CI_Controller {

	public function __construct() {   
		parent::__construct();
		$this->load->model('M_pembayaran');
	}

	public function index() {     
		$list_pembayaran = $this->M_pembayaran->list_pembayaran();
		$data = array(
			'title' => 'Sippeta',
			'metades' => 'Project based strategy of all focus areas to produce quality and reach your business target stay updated with the latest trends and digital news by reading our articles written by specialists in their industry.',
			'isi'   => 'user/list_bukti_pembayaran',
			'list_pembayaran' => $list_pembayaran
		);
		$this->load->view("layout/wrapper", $data, false);  
	}

	public function add() {  
		$valid = $this->form_validation;
		$valid->set_rules(
			'nama_pembayaran',
			'nama_pembayaran',  
			'required',  
			array(         
				'required'  =>  'Anda belum mengisikan Nama.') 
		);     
		$valid->set_rules(
			'nominal_pembayaran',
			'nominal_pembayaran',  
			'required',  
			array(         
				'required'  =>  'Anda belum mengisikan Nominal.') 
		);    
		$valid->set_rules(
			'tglbayar_pembayaran',
			'tglbayar_pembayaran',  
			'required',  
			array(         
				'required'  =>  'Anda belum mengisikan Tanggal.') 
		);    


		$config['upload_path']          = './img/img_pembayaran/';
		$config['allowed_types']        = 'gif|jpg|png|jpeg';
		$config['max_size']             = 9000;
		$config['encrypt_name']         = TRUE;

		$this->load->library('upload', $config); 
		$i = $this->input;
		if ($valid->run()===false) {
			$data = array(
				'title' => 'Sippeta',
				'metades' => 'Project based strategy of all focus areas to produce quality and reach your business target stay updated with the latest trends and digital news by reading our articles written by specialists in their industry.',
				'isi' => 'user/bukti_pembayaran'
			);
			$this->load->view("layout/wrapper", $data, false);

		}else{
			if ( ! $this->upload->do_upload('bukti_pembayaran'))
			{
				$error = array('error' => $this->upload->display_errors());
				print_r($error); 
			} else {
				$data = array(
					'nama_pembayaran' =>  $i->post('nama_pembayaran'),
					'nominal_pembayaran' =>  $i->post('nominal_pembayaran'),
					'tglbayar_pembayaran' =>  $i->post('tglbayar_pembayaran'),
					'status_pembayaran' =>  '2',
					'bukti_pembayaran'     =>  $this->upload->data('file_name'),
				);

				$this->M_pembayaran->add($data);
				$this->session->set_flashdata('notifikasi', '<center>Berhasil Menambahkan data <strong> Bukti Pembayaran </strong></center>');
				redirect('/user/bukti_pembayaran');
			}
		}
	}

}

/* End of file bukti_pembayaran.php */
/* Location: ./application/controllers/user/bukti_pembayaran.php */