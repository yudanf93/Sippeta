<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_pengaduan extends CI_Model {

		Public function __construct() {
		parent::__construct();
		$this->load->database();
	}   

	public function select_pengaduan() {
		$this->db->select('*');   
		$this->db->from('pengaduan');
		$this->db->order_by('id_pengaduan', 'DESC');
		$query  = $this->db->get();
		return $query->result();
	}

	public function delete($data) {
		$this->db->where('id_pengaduan',$data['id']);
		$this->db->delete('pengaduan');
	}

	public function add($data) {
		$this->db->insert('pengaduan', $data);
	}

	public function detail($id_pengaduan) {
		$this->db->select('*');   
		$this->db->from('pengaduan');
		$this->db->where('id_pengaduan', $id_pengaduan);
		$query  = $this->db->get();
		return $query->row(); 
	}
	
	public function edit($data,$id_pengaduan){
		$this->db->where('id_pengaduan',$id_pengaduan);
		$this->db->update('pengaduan',$data);
	}

}

/* End of file M_pengaduan.php */
/* Location: ./application/models/M_pengaduan.php */