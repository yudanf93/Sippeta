<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_user extends CI_Model {

	Public function __construct() {
		parent::__construct();
		$this->load->database();
	}   

	public function get_admin ($id_user){
		$this->db->where('id_user',$id_user);
		$this->db->select('*');
		$this->db->from('user');
		$query =$this->db->get();    
		return $query->row_array();     
	}

		public function select_user(){
		$this->db->select('*');
		$this->db->from('user');
		$query =$this->db->get();    
		return $query->result();     
	}
	

	public function delete($data) {
		$this->db->where('id_user',$data['id']);
		$this->db->delete('user');
	}
	public function add($data) {
		$this->db->insert('user', $data);
	}   

	public function detail($id_user) {
		$this->db->select('user.*');
		$this->db->from('user');
		$this->db->where('id_user', $id_user);
		$query  = $this->db->get();
		return $query->row();
	}
	public function updatePassword($data,$id_user)  
	{    
		$this->db->where('id_user',$id_user);
		$this->db->update('user',$data);
	} 

//UNTUK USERR RESET PASWORD
	public function password_user($data)  
	{    
		$this->db->where('id_user',$data['id_user']);
		$this->db->update('user',$data);
	} 

	public function get_token($token) {
		$this->db->select('*');
		$this->db->from('tokens');
		$this->db->where('token', $token);
		$query  = $this->db->get();
		return $query->row();
	}

	public function edit($data,$id_user){
		$this->db->where('id_user',$id_user);
		$this->db->update('user',$data);
	}

  //Start: method tambahan untuk reset code  
	public function getUserInfo($id)  
	{  
		$q = $this->db->get_where('user', array('id_user' => $id), 1);   
		if($this->db->affected_rows() > 0){  
			$row = $q->row();  
			return $row;  
		}else{  
			error_log('no user found getUserInfo('.$id.')');  
			return false;  
		}  
	}  

	public function getUserInfoByEmail($email){  
		$q = $this->db->get_where('user', array('email' => $email), 1);   
		if($this->db->affected_rows() > 0){  
			$row = $q->row();  
			return $row;  
		}  
	}  

	public function insertToken($id_user)  
	{    
		$token = substr(sha1(rand()), 0, 30);   
		$date = date('Y-m-d');  

		$string = array(  
			'token'=> $token,  
			'id_user'=>$id_user,  
			'created'=>$date  
		);  
		$query = $this->db->insert_string('tokens',$string);  
		$this->db->query($query);  
		return $token . $id_user;  

	}  

	public function isTokenValid($token)  
	{  
		$tkn = substr($token,0,30);  
		$uid = substr($token,30);     

		$q = $this->db->get_where('tokens', array(  
			'tokens.token' => $tkn,   
			'tokens.id_user' => $uid), 1);               

		if($this->db->affected_rows() > 0){   
			$row = $q->row();         

			$created = $row->created;  
			$createdTS = strtotime($created);  
			$today = date('Y-m-d');   
			$todayTS = strtotime($today);  

			if($createdTS != $todayTS){  
				return false;  
			}  

			$user_info = $this->getUserInfo($row->id_user);  
			return $user_info;  

		}else{  
			return false;  
		}  

	}   

	public function ubah_password($post)  
	{    
		$this->db->where('id_user', $post['id_user']);  
		$this->db->update('user', array('password' => $post['password']));      
		return true;  
	}   
   //End: method tambahan untuk reset code  

    //fungsi cek level
	function akses_level() {
		return $this->session->userdata('akses_level');
	}


}

/* End of file M_user.php */
/* Location: ./application/models/M_user.php */