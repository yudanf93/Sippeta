<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pembayaran extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_pembayaran');
		$this->load->model('M_user');
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
				if ($data['status_pembayaran']==2) {
					$this->session->set_flashdata('notifikasi','<center>Berhasil Merubah data dan <strong> Status sedang di Proses </strong></center>');
				} else if ($data['status_pembayaran']==1) {
					$this->send_diterima($edit->nama_pembayaran, $edit->kode_pembayaran, $edit->nominal_pembayaran, $edit->tglbayar_pembayaran, $edit->email_user, $edit->nama_berkas);
					$this->session->set_flashdata('notifikasi', '<center>Berhasil Merubah Data dan Status pembayaran Diterima <strong> email berhasil dikirim </strong></center>');
				} else {
					$this->send_ditolak($edit->nama_pembayaran, $edit->kode_pembayaran, $edit->nominal_pembayaran, $edit->tglbayar_pembayaran, $edit->email_user, $edit->nama_berkas);
					$this->session->set_flashdata('notifikasi', '<center>Berhasil Merubah Data dan Status pembayaran Ditolak <strong> email berhasil dikirim </strong></center>');
				}
				$this->M_pembayaran->edit($data,$id_pembayaran);
				redirect('/admin/pembayaran');

			} else {
				if ($edit->bukti_pembayaran != "") {
					unlink('./img/img_pembayaran/'.$edit->bukti_pembayaran);
				}

				$data = array(
					'nama_pembayaran'   =>  $i->post('nama_pembayaran'),
					'nominal_pembayaran' =>  $i->post('nominal_pembayaran'),
					'bukti_pembayaran'  =>  $this->upload->data('file_name'),
					'status_pembayaran' =>  $i->post('status_pembayaran'),
					'tglbayar_pembayaran'=>  $i->post('tglbayar_pembayaran')
				);			
				// $this->session->set_flashdata('notifikasi','<center>Berhasil Merubah data <strong> Ubah Pembayaran </strong></center>');
				if ($data['status_pembayaran']==2) {
					$this->session->set_flashdata('notifikasi','<center>Berhasil Merubah data dan Status sedang di Proses <strong> Ubah Pembayaran </strong></center>');
				} else if ($data['status_pembayaran']==1) {
					$this->send_diterima($edit->nama_pembayaran, $edit->kode_pembayaran, $edit->nominal_pembayaran, $edit->tglbayar_pembayaran, $edit->email_user, $edit->nama_berkas);
					$this->session->set_flashdata('notifikasi', '<center>Berhasil Merubah Data dan Status pembayaran Diterima <strong> Email berhasil dikirim </strong></center>');
				} else {
					$this->send_ditolak($edit->nama_pembayaran, $edit->kode_pembayaran, $edit->nominal_pembayaran, $edit->tglbayar_pembayaran, $edit->email_user, $edit->nama_berkas);
					$this->session->set_flashdata('notifikasi', '<center>Berhasil Merubah Data dan Status pembayaran Ditolak <strong> Email berhasil dikirim </strong></center>');
				}
				$this->M_pembayaran->edit($data,$id_pembayaran);
				redirect('/admin/pembayaran');
			}
		}

	}

	public function send_diterima($nama_pembayaran, $kode_pembayaran, $nominal_pembayaran, $tglbayar_pembayaran, $email_user, $nama_berkas) { 
		$data['nama_pembayaran'] = $nama_pembayaran;
		$data['nama_berkas'] = $nama_berkas;
		$data['kode_pembayaran'] = $kode_pembayaran;
		$data['nominal_pembayaran'] = $nominal_pembayaran;
		$data['tglbayar_pembayaran'] = $tglbayar_pembayaran;
		$data['email_user'] = $email_user;
    echo "<pre>";
    print_r($this->load->view('admin/email_pembayaran_diterima',$data,true));
    exit();
		$subject  = "Konfirmasi pembayaran User SIP PETA";
		$message  = $this->load->view('admin/email_pembayaran_diterima',$data,true);
		$config   = array(
			'protocol'    => 'smtp',
			'smtp_host'   => 'ssl://mail.sevenpion.com',
			'smtp_port'   => '465',
			'smtp_user'   => 'developers@sevenpion.com',
			'smtp_pass'   => 'qweasdzxc123',
			'mailtype'    => 'html',
			'charset'     => 'utf-8',
			'wordwrap'    => TRUE
		);
		$this->load->library('email', $config);
    // $this->email->initialize($config); 
		$this->email->set_newline("\r\n");
		$this->email->from('developers@sevenpion.com','Direktori Profesi Keuangan (DPK)');
		$this->email->to($data['email_user']);
		$this->email->subject($subject);
		$this->email->message($message);
		if($this->email->send()){
			$this->session->set_flashdata('notifikasi', '<center>Status pembayaran Diterima<strong> Email berhasil dikirim </strong></center>');
		} else {
      # code...
			$this->session->set_flashdata('notifikasi', 'Pengiriman Email Gagal');
      // echo $this->email->print_debugger();
      // exit();  
		} 
	} 

	public function send_ditolak($nama_pembayaran, $kode_pembayaran, $nominal_pembayaran, $tglbayar_pembayaran, $email_user, $nama_berkas) { 
		$data['nama_pembayaran'] = $nama_pembayaran;
		$data['nama_berkas'] = $nama_berkas;
		$data['kode_pembayaran'] = $kode_pembayaran;
		$data['nominal_pembayaran'] = $nominal_pembayaran;
		$data['tglbayar_pembayaran'] = $tglbayar_pembayaran;
		$data['email_user'] = $email_user;
    echo "<pre>";
    print_r($this->load->view('admin/email_pembayaran_ditolak',$data,true));
    exit();
		$subject  = "Konfirmasi pembayaran User SIP PETA";
		$message  = $this->load->view('admin/email_pembayaran_ditolak',$data,true);
		$config   = array(
			'protocol'    => 'smtp',
			'smtp_host'   => 'ssl://mail.sevenpion.com',
			'smtp_port'   => '465',
			'smtp_user'   => 'developers@sevenpion.com',
			'smtp_pass'   => 'qweasdzxc123',
			'mailtype'    => 'html',
			'charset'     => 'utf-8',
			'wordwrap'    => TRUE
		);
		$this->load->library('email', $config);
    // $this->email->initialize($config); 
		$this->email->set_newline("\r\n");
		$this->email->from('developers@sevenpion.com','Direktori Profesi Keuangan (DPK)');
		$this->email->to($data['email_user']);
		$this->email->subject($subject);
		$this->email->message($message);
		if($this->email->send()){
			$this->session->set_flashdata('notifikasi', '<center>Status pembayaran Ditolak<strong> Email berhasil dikirim </strong></center>');
		} else {
      # code...
			$this->session->set_flashdata('notifikasi', 'Pengiriman Email Gagal');
      // echo $this->email->print_debugger();
      // exit();  
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