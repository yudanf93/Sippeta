<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pembayaran extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_pembayaran');
	}

	public function index() {  
		$pembayaran = $this->M_pembayaran->select_pembayaran();
		$data = array(
			'title' => 'Dashboard Admin SIP PETA',
			'pembayaran'  => $pembayaran,
			'isi' => 'admin/pembayaran_v'
		);
		$this->load->view("admin/layout/wrapper", $data, false);
	}

	public function edit($id_pembayaran) {
		$edit  = $this->M_pembayaran->detail($id_pembayaran); 

		$valid = $this->form_validation;
		$valid->set_rules(
			'nama_pembayaran',
			'nama_pembayaran',  
			'required',  
			array(         
				'required'  =>  'Anda belum mengisikan Nama Pembayar.') 
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
		$valid->set_rules(
			'status_pembayaran',
			'status_pembayaran',
			'required',  
			array(
				'required'  =>  'Anda belum mengisikan Status.')
		);

			$config['upload_path']          = './img/img_pembayaran/';
			$config['allowed_types']        = 'gif|jpg|png|jpeg';
			$config['max_size']             = 3000;
			$config['max_width']            = 2000;
			$config['max_height']           = 2000;
			$config['encrypt_name']         = TRUE;

		$this->load->library('upload', $config);
		$i  = $this->input;
		if ($valid->run()===false) {  
			$data = array(
				'title' => 'Dashboard Admin DPK',
				'isi' => 'admin/pembayaran_e',
				'edit'     => $edit
			);       
			$this->load->view("admin/layout/wrapper", $data, false);

		}else{
			if ( ! $this->upload->do_upload('bukti_pembayaran'))
    		{   
			$data = array(
				'nama_pembayaran'   =>  $i->post('nama_pembayaran'),
				'nominal_pembayaran' =>  $i->post('nominal_pembayaran'),
				'bukti_pembayaran'  =>  $i->post('gambar_lama'),
				'status_pembayaran' =>  $i->post('status_pembayaran'),
				'tglbayar_pembayaran'=>  $i->post('tglbayar_pembayaran')
			);			
			$this->session->set_flashdata('notifikasi','<center>Berhasil Merubah data <strong> Ubah Pembayaran </strong></center>');
			$this->M_pembayaran->edit($data,$id_pembayaran);
				redirect('/admin/pembayaran');

			} else {
				if ($edit->bukti_pembayaran != "") {
			 	unlink('./img/img_pembayaran/'.$edit->bukti_pembayaran);
			}
   
			$data = array(
				'nama_user'     	=>  $i->post('nama_user'),
				'nama_pembayaran'   =>  $i->post('nama_pembayaran'),
				'nominal_pembayaran' =>  $i->post('nominal_pembayaran'),
				'bukti_pembayaran'  =>  $this->upload->data('file_name'),
				'status_pembayaran' =>  $i->post('status_pembayaran'),
				'tglbayar_pembayaran'=>  $i->post('tglbayar_pembayaran')
			);			
			$this->session->set_flashdata('notifikasi','<center>Berhasil Merubah data <strong> Ubah Pembayaran </strong></center>');
			$this->M_pembayaran->edit($data,$id_pembayaran);
				redirect('/admin/pembayaran');
			}
		}

	}

	public function delete($id) {
		$hapus = $this->M_pembayaran->detail($id);

		if ($hapus->bukti_pembayaran != "") {
			 	unlink('./img/img_pembayaran/'.$hapus->bukti_pembayaran);
			 }
		$data = array('id'  =>  $id);
		$this->M_pembayaran->delete($data);
		$this->session->set_flashdata('notifikasi', '<center>Berhasil Menghapus <strong> Data Pembayaran </strong></center>');
		redirect('admin/pembayaran');
	}

}

/* End of file Pembayaran.php */
/* Location: ./application/controllers/admin/Pembayaran.php */