<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengaduan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_pengaduan');
	}

	public function index() {  
		$pengaduan = $this->M_pengaduan->select_pengaduan();
		$data = array(
			'title' => 'Dashboard Admin SIP PETA',
			'pengaduan'  => $pengaduan,
			'isi' => 'admin/pengaduan_v'
		);
		$this->load->view("admin/layout/wrapper", $data, false);
	}

	public function edit($id_pengaduan) {
		$edit  = $this->M_pengaduan->detail($id_pengaduan); 

		$valid = $this->form_validation;
		$valid->set_rules(
			'nohp_pengaduan',
			'nohp_pengaduan',  
			'required',  
			array(         
				'required'  =>  'Anda belum mengisikan Nomer Handphone.') 
		);
		$valid->set_rules(
			'email_pengaduan',
			'email_pengaduan',
			'required',
			array(
				'required'  =>  'Anda belum mengisikan Email.')
		);

		$valid->set_rules(
			'nama_pengaduan',
			'nama_pengaduan',
			'required',  
			array(
				'required'  =>  'Anda belum mengisikan Nama.')
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
				'title' => 'Dashboard Admin DPK',
				'isi' => 'admin/pengaduan_e',
				'edit'     => $edit
			);       
			$this->load->view("admin/layout/wrapper", $data, false);

		}else{
			$i  = $this->input;
			$data = array(
				'nama_pengaduan'     =>  $i->post('nama_pengaduan'),
				'email_pengaduan'    =>  $i->post('email_pengaduan'),
				'nohp_pengaduan'     =>  $i->post('nohp_pengaduan'),
				'pesan_pengaduan'   =>  $i->post('pesan_pengaduan'),
				'balaske_pengaduan'   =>  $i->post('balaske_pengaduan')
			);			
			$this->session->set_flashdata('notifikasi','<center>Berhasil Merubah data <strong> Ubah pengaduan </strong></center>');
			$this->M_pengaduan->edit($data,$id_pengaduan);
				redirect('/admin/pengaduan');

			} 

		}

	public function delete($id)	{
		$data = array('id'  =>  $id);
		$this->M_pengaduan->delete($data);
		$this->session->set_flashdata('notifikasi', '<center>Berhasil Menghapus <strong> Data Pengaduan]</strong></center>');
		redirect('admin/pengaduan');
	}
}

/* End of file Pengaduan.php */
/* Location: ./application/controllers/admin/Pengaduan.php */