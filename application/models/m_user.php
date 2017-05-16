<?php 
if(!defined('BASEPATH')) exit ('No direct script access allowed');
/**
* 
*/
class M_User extends CI_Model
{
	function login($email,$password,$level=null){
		$this->db->select('id_user,email,password,nama,level,status');
		$this->db->from('tb_user');
		$this->db->where('email',$email);
		// $this->db->where('status',1);		
		// $this->db->where('password',$password);
		if ($level!=null) {
			$this->db->where('level',$level);
		}else{
			$this->db->where('level !=',3);
		}
		$this->db->limit(1);
		$query = $this->db->get();
		if ($query->num_rows()==1) {
			$row = $query->row();
			if (password_verify($password,$row->password)) {
				return $query->result_array();	
			}else{
				return false;
			}
		}else{
			return false;
		}
	}

	function register($data){
		$query = "INSERT INTO tb_user(email,password,nama,no_hp,id_lantai,id_unit,level,status) VALUES 
		('".$data['email']."','".
			password_hash($data['password'],PASSWORD_DEFAULT)."','".
			$data['nama']."','".
			$data['no_hp']."',".
			$data['id_lantai'].",".
			$data['id_unit'].",3,0)";
		if ($this->db->query($query)) {
			return true;
		}else{
			return false;
		}
	}

	function setUser($data){
		if ($data['id_user']=='') {
			$query = "INSERT INTO tb_user(email,password,level,DELETED) VALUES(
			'".$data['email']."',
			'".$data['password']."',
			'".$data['level']."',
			'N')";
		}else{
			$query = "UPDATE tb_user SET ".
			"email = '".$data['email']."',".
			"password = '".$data['password']."',".
			" WHERE id_user = ".$data['id_user'];
		}
		if ($this->db->query($query)) {
			return true;
		}else{
			return false;
		}
	}

	function getIDUser($id){
		$query = "select * from tb_user where id_user =".$id;
		$result = $this->db->query($query);
		return $result->result_array();
	}
}
 ?>