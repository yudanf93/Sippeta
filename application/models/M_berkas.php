<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_berkas extends CI_Model {

	Public function __construct() {
		parent::__construct();
		$this->load->database();
	}   

	public function select_berkas() {
		$this->db->select('berkas.*, user.* ');   
		$this->db->from('berkas');
		$this->db->join('user', 'user.id_user = berkas.id_user', 'left');
		$this->db->order_by('id_berkas', 'DESC');
		$query  = $this->db->get();
		return $query->result();
	}

	public function pengajuan_user() {
		$this->db->select('berkas.*, user.* ');   
		$this->db->from('berkas');
		$this->db->where('berkas.id_user', $this->session->userdata('id_user'));
		$this->db->join('user', 'user.id_user = berkas.id_user', 'left');
		$this->db->order_by('id_berkas', 'DESC');
		$query  = $this->db->get();
		return $query->result();
	}


	public function delete($data) {
		$this->db->where('id_berkas',$data['id']);
		$this->db->delete('berkas');
	}

	public function add($data) {
		$this->db->insert('berkas', $data);
	}

	public function detail($id_berkas) {
		$this->db->select('berkas.*, user.*');   
		$this->db->from('berkas');
		$this->db->join('user', 'user.id_user = berkas.id_user', 'left');
		$this->db->where('id_berkas', $id_berkas);
		$query  = $this->db->get();
		return $query->row();
	}
	
	public function edit($data,$id_berkas){
		$this->db->where('id_berkas',$id_berkas);
		$this->db->update('berkas',$data);
	}

}

/* End of file M_berkas.php */
/* Location: ./application/models/M_berkas.php */