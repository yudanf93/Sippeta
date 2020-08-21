<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_pembayaran extends CI_Model {

	Public function __construct() {
		parent::__construct();
		$this->load->database();
	}   

	public function select_pembayaran() {
		$this->db->select('pembayaran.*, berkas.* ');   
		$this->db->from('pembayaran');
		$this->db->join('berkas', 'berkas.id_berkas = pembayaran.id_berkas', 'left');
		$this->db->order_by('id_pembayaran', 'DESC');
		$query  = $this->db->get();
		return $query->result();
	}

	public function list_pembayaran() {
		$this->db->select('pembayaran.*, berkas.*, user.* ');   
		$this->db->from('pembayaran');
		$this->db->join('berkas', 'berkas.id_berkas = pembayaran.id_berkas', 'left');
		$this->db->join('user', 'user.id_user = berkas.id_user', 'left');
		$this->db->order_by('id_pembayaran', 'DESC');
		$query  = $this->db->get();
		return $query->result();
	}

	public function delete($data) {
		$this->db->where('id_pembayaran',$data['id']);
		$this->db->delete('pembayaran');
	}

	public function add($data) {
		$this->db->insert('pembayaran', $data);
	}

	public function detail($id_pembayaran) {
		$this->db->select('pembayaran.*, berkas.*, user.email_user as email_user');   
		$this->db->from('pembayaran');
		$this->db->join('berkas as berkas', 'berkas.id_berkas = pembayaran.id_berkas', 'left');
		$this->db->join('user', 'user.id_user = berkas.id_user', 'left');
		$this->db->where('id_pembayaran', $id_pembayaran);
		$query  = $this->db->get();
		return $query->row();
	}
	
	public function edit($data,$id_pembayaran){
		$this->db->where('id_pembayaran',$id_pembayaran);
		$this->db->update('pembayaran',$data);
	}

}

/* End of file M_pembayaran.php */
/* Location: ./application/models/M_pembayaran.php */