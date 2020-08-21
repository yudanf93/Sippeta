<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Daftar extends CI_Controller {

	public function __construct() {   
		parent::__construct();
		$this->load->model('M_user');
	}

	public function index() {		
		$data = array(
			'title' 	=> 'Sippeta',
			'metades'	=> 'Project based strategy of all focus areas to produce quality and reach your business target stay updated with the latest trends and digital news by reading our articles written by specialists in their industry.',
			'isi' 		=> 'daftar'
		);
		$this->load->view("layout/wrapper", $data, false);
	}

	public function add() { 
		
		$valid = $this->form_validation;
		$valid->set_rules('email_user', '<strong>Email yang anda masukkan sudah terdaftar</strong>', 'required|trim|is_unique[user.email_user]|min_length[6]|max_length[40]|valid_email');

		$valid->set_rules(
			'password_user',
			'password_user',
			'required',
			array(
				'required'  =>  'Anda belum mengisikan Password.')
		);

		$valid->set_rules(
			'nama_user',
			'nama_user',
			'required',  
			array(
				'required'  =>  'Anda belum mengisikan Nama.')
		);

		$valid->set_rules(
			'nohp_user',
			'nohp_user',
			'required',  
			array(
				'required'  =>  'Anda belum mengisikan No Hp.')
		);
		
		if ($valid->run()===false) {
			$data = array(
				'title' 	=> 'Sippeta',
				'metades' 	=> 'Project based strategy of all focus areas to produce quality and reach your business target stay updated with the latest trends and digital news by reading our articles written by specialists in their industry.',
				'isi' 		=> 'daftar'
			);
			$this->load->view("layout/wrapper", $data, false);

		}else{
			$i  = $this->input;
			$data = array(
				'nama_user'     =>  $i->post('nama_user'),
				'email_user'    =>  $i->post('email_user'),
				'nohp_user'    	=>  $i->post('nohp_user'),
				'password_user'	=>  MD5($i->post('password_user')),
				'foto'          =>  'profil.png',
				'akses_level'   =>  $i->post('akses_level'),
				'tgl_user'      =>  $i->post('tgl_user')
			);

			$this->M_user->add($data);
			// $this->session->set_flashdata('notifikasi', '<center>Berhasil Mendaftar  <strong> Silahkan Login </strong></center>');
			$this->send_konfirmasi($data['email_user'],$data['nama_user'],$data['nohp_user']);
			redirect('home/');
		}
	}

	public function send_konfirmasi($email_user,$nama_user,$nohp_user) { 
		$data['email_user'] = $email_user;
		$data['nama_user'] = $nama_user;
		$data['nohp_user'] = $nohp_user;
    // echo "<pre>";
    // print_r($this->load->view('v_email_pendaftaran',$data,true));
    // exit();
		$subject  = "Pendaftaran Akun Direktori Profesi Keuangan (DPK)";
		$message  = $this->load->view('v_email_pendaftaran',$data,true);
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
		$this->email->from('developers@sevenpion.com','Sippeta');
		$this->email->to($data['email_user']);

		if($this->email->send()){
			$this->session->set_flashdata('notifikasi', '<div class="alert alert-success alert-dismissible fade show"><center>Silahkan Cek Email <strong> Anda</strong></center><button type="button" class=close data-dismiss=alert aria-label=Close>
				<span aria-hidden=true>&times;</span>
				</button></div>');
		}


		$this->email->subject($subject);
		$this->email->message($message);
		if($this->email->send()){
			$this->session->set_flashdata('notifikasi', '<div class="alert alert-success alert-dismissible fade show"><center>Silahkan Cek Email <strong> Anda</strong></center><button type="button" class=close data-dismiss=alert aria-label=Close>
				<span aria-hidden=true>&times;</span>
				</button></div>');
		} else {
			$this->session->set_flashdata('notifikasi', '<div class="alert alert-danger alert-dismissible fade show"><center>Pengiriman Email anda<strong> Gagal</strong></center><button type="button" class=close data-dismiss=alert aria-label=Close>
				<span aria-hidden=true>&times;</span>
				</button></div>');
			echo $this->email->print_debugger();
			exit();  
		}
	}

}

/* End of file daftar.php */
/* Location: ./application/controllers/daftar.php */