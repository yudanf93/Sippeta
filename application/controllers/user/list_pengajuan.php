<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class List_pengajuan extends CI_Controller {

  public function __construct() {   
    parent::__construct();
    $this->load->model('M_berkas');
    $this->load->model('M_user');
  }

  public function index() {     
    $pengajuan = $this->M_berkas->pengajuan_user();
    $data = array(
      'title' => 'Sippeta',
      'metades' => 'Project based strategy of all focus areas to produce quality and reach your business target stay updated with the latest trends and digital news by reading our articles written by specialists in their industry.',
      'isi'   => 'user/list_pengajuan',
      'pengajuan' => $pengajuan

    );
    $this->load->view("layout/wrapper", $data, false);
  }

  public function add() {  
    $user = $this->M_user->pilih_user();

    $valid = $this->form_validation;
    $valid->set_rules(
      'nama_berkas',
      'nama_berkas',  
      'required',  
      array(         
        'required'  =>  'Anda belum mengisikan Nama Berkas.') 
    );      

    $config['upload_path']          = './dokumen/dok_user/';
    $config['allowed_types']        = 'pdf';
    $config['max_size']             = 9000;
    $config['encrypt_name']         = TRUE;

    $this->load->library('upload', $config); 
    $i = $this->input;
    if ($valid->run()===false) {
      $data = array(
        'title' => 'Sippeta',
        'metades' => 'Project based strategy of all focus areas to produce quality and reach your business target stay updated with the latest trends and digital news by reading our articles written by specialists in their industry.',
        'user' => $user,
        'isi' => 'user/upload_pengajuan'
      );
      $this->load->view("layout/wrapper", $data, false);

    }else{
      if ( ! $this->upload->do_upload('file_berkas'))
      {
        $error = array('error' => $this->upload->display_errors());
        print_r($error); 
      } else {
        $data = array(
          'nama_berkas' =>  $i->post('nama_berkas'),
          'biaya_berkas' =>  $i->post('biaya_berkas'),
          'kode_pembayaran' =>  $i->post('kode_pembayaran'),
          'status_berkas' =>  $i->post('status_berkas'),
          'file_berkas'     =>  $this->upload->data('file_name'),
          'id_user'   =>  $user->id_user
        );

        $this->M_berkas->add($data);
        $this->session->set_flashdata('notifikasi', '<center>Berhasil Menambahkan data <strong> Pengajuan Berkas</strong></center>');
        redirect('/user/list_pengajuan');
      }
    }
  }

}

/* End of file list_pengajuan.php */
/* Location: ./application/controllers/user/list_pengajuan.php */