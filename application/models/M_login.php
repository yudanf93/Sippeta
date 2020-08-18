<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_login extends CI_Model {

	Public function __construct()
	{
		parent::__construct();     
		$this->load->database();
	}

	public function listing(){
		$this->db->select('*');
		$this->db->from('user');
		$this->db->order_by('id_user','DESC');
		$query  = $this->db->get();
		return $query->result();
	}

	public function detail($id){
		$this->db->select('*');
		$this->db->from('user');
		$this->db->where('id_user', $id);
		$this->db->order_by('id','DESC');
		$query  = $this->db->get();
		return $query->row();
	}

	public function edit($data){
		$this->db->where('id_user', $data['id_user']);
		$this->db->update('user', $data);
	}

	public function login($email, $password){
		$this->db->select('*');
		$this->db->from('user');
		$this->db->where(array( 'email_user'  =>  $email,
			'password_user'  =>  $password));
		$this->db->order_by('id_user','DESC');
		$this->db->limit(1);
		$query = $this->db->get();
		return $query->row();
	}
}


/* End of file M_login.php */
/* Location: ./application/models/M_login.php */