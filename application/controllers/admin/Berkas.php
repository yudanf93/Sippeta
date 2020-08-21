<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Berkas extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('M_berkas');         
	}

	public function index() {  
		$berkas = $this->M_berkas->select_berkas();
		$data = array(
			'title' => 'Dashboard Admin SIP PETA',
			'berkas'  => $berkas,
			'isi' => 'admin/berkas_v'
		);
		$this->load->view("admin/layout/wrapper", $data, false);
	}

	public function edit($id_berkas) {
		$edit  = $this->M_berkas->detail($id_berkas); 

		$valid = $this->form_validation;
		$valid->set_rules(
			'status_berkas',
			'status_berkas',
			'required',
			array(
				'required'  =>  'Anda belum mengisikan Status.')
		);
		$valid->set_rules(
			'biaya_berkas',
			'biaya_berkas',
			'required',
			array(
				'required'  =>  'Anda belum mengisikan Biaya.')
		);
		$valid->set_rules(
			'kode_pembayaran',
			'kode_pembayaran',
			'required',
			array(
				'required'  =>  'Anda belum mengisikan Kode Pembayaran.')
		);

		if ($valid->run()===false) {  
			$data = array(
				'title' => 'Dashboard Admin DPK',
				'isi' => 'admin/berkas_e',
				'edit'     => $edit
			);       
			$this->load->view("admin/layout/wrapper", $data, false);

		}else{
			$i  = $this->input; 
			$data = array(
				'status_berkas'  =>  $i->post('status_berkas'),
				'biaya_berkas'  =>  $i->post('biaya_berkas'),
				'kode_pembayaran'  =>  $i->post('kode_pembayaran'),
				'id_berkas'    =>  $id_berkas
			);
			// $this->session->set_flashdata('notifikasi', '<center>Berhasil Merubah data <strong> Ubah Berkas </strong></center>');  
			if ($data['status_berkas']==1) {
				$this->send_diterima($edit->nama_user, $edit->kode_pembayaran, $edit->biaya_berkas, $edit->email_user);
				$this->session->set_flashdata('notifikasi', '<center>Berhasil Merubah Data dan Status Berkas Diterima <strong> email berhasil dikirim </strong></center>');
			} else {
				$this->send_ditolak($edit->nama_user, $edit->email_user);
				$this->session->set_flashdata('notifikasi', '<center>Berhasil Merubah Data dan Status Berkas Ditolak <strong> email berhasil dikirim </strong></center>');
			}
				$this->M_berkas->edit($data,$id_berkas);
				redirect('/admin/berkas');
			}

		}

	public function send_diterima($nama_user, $kode_pembayaran, $biaya_berkas, $email_user) { 
    $data['nama_user'] = $nama_user;
    $data['kode_pembayaran'] = $kode_pembayaran;
    $data['biaya_berkas'] = $biaya_berkas;
    $data['email_user'] = $email_user;
    echo "<pre>";
    print_r($this->load->view('admin/email_berkas_diterima',$data,true));
    exit();
    $subject  = "Konfirmasi Berkas User SIP PETA";
    $message  = $this->load->view('admin/email_berkas_diterima',$data,true);
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
      $this->session->set_flashdata('notifikasi', '<center>Status Berkas Diterima<strong> Email berhasil dikirim </strong></center>');
    } else {
      # code...
      $this->session->set_flashdata('notifikasi', 'Pengiriman Email Gagal');
      // echo $this->email->print_debugger();
      // exit();  
    } 
  } 

  	public function send_ditolak($nama_user, $email_user) { 
    $data['nama_user'] = $nama_user;
    $data['email_user'] = $email_user;
    echo "<pre>";
    print_r($this->load->view('admin/email_berkas_ditolak',$data,true));
    exit();
    $subject  = "Konfirmasi Berkas User SIP PETA";
    $message  = $this->load->view('admin/email_berkas_ditolak',$data,true);
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
      $this->session->set_flashdata('notifikasi', '<center>Status Berkas Ditolak<strong> Email berhasil dikirim </strong></center>');
    } else {
      # code...
      $this->session->set_flashdata('notifikasi', 'Pengiriman Email Gagal');
      // echo $this->email->print_debugger();
      // exit();  
    }
  } 

  public function delete($id) {
    $hapus = $this->M_berkas->detail($id);

    if ($hapus->file_berkas != "") {
        unlink('./dokumen/dok_user/'.$hapus->file_berkas);
       }
    $data = array('id'  =>  $id);
    $this->M_berkas->delete($data);
    $this->session->set_flashdata('notifikasi', '<center>Berhasil Menghapus <strong> Data Berkas </strong></center>');
    redirect('admin/berkas');
  }

}

/* End of file Berkas.php */
/* Location: ./application/controllers/admin/Berkas.php */