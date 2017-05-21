<?php 
if(!defined('BASEPATH')) exit ('No direct script access allowed');
/**
* 
*/
class M_User extends CI_Model
{
	function login($email,$password,$level=null){
		$this->db->select('id_user,email,password,nama,level,status,id_lantai,id_unit');
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
	function cekPassword($password,$id_user){
		$query = "select * from tb_user where id_user='$id_user'";
		$result = $this->db->query($query);
		$usr = $result->result_array();		
		if (password_verify($password,$usr[0]['password'])) {
			return true;
		}else{
			return false;
		}
	}

	function changePassword($data){
		$query = "update tb_user set password='".password_hash($data['password'],PASSWORD_DEFAULT)."' where id_user='".$data['id_user']."'";
		if ($this->db->query($query)) {
			return true;
		}else{
			return false;
		}
	}

	function editProfile($data){
		$query = "update tb_user set nama='".$data['nama']."', no_hp='".$data['no_hp']."' where id_user='".$data['id_user']."'";
		if ($this->db->query($query)) {
			return true;
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
			$query = "INSERT INTO tb_user(email,password,nama,no_hp,id_lantai,id_unit,level,status,deleted) VALUES 
		('".$data['email']."','".
			password_hash($data['password'],PASSWORD_DEFAULT)."','".
			$data['nama']."','".
			$data['no_hp']."',".
			$data['id_lantai'].",".
			$data['id_unit'].",".
			$data['level'].",".
			$data['status'].",0)";
		}else{
			if ($data['password']=='') {
				$query = "UPDATE `tb_user` SET ".
							"`nama` = '".$data['nama']."',".
							"`no_hp` = '".$data['no_hp']."',".
							"`id_lantai` = '".$data['id_lantai']."',".
							"`id_unit` = '".$data['id_unit']."',".
							"`status` = '".$data['status']."'".
							" WHERE `id_user` = ".$data['id_user'];
			}else{
				$query = "UPDATE tb_user SET ".
							"nama = '".$data['nama']."',".
							"password = '".password_hash($data['password'],PASSWORD_DEFAULT)."',".
							"no_hp = '".$data['no_hp']."',".
							"id_lantai = '".$data['id_lantai']."',".
							"id_unit = '".$data['id_unit']."',".
							"status = '".$data['status']."'".
							" WHERE id_user = ".$data['id_user'];
			}
			
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

	function getUser(){
		$query = "SELECT u.id_user,u.email,u.nama,u.no_hp,l.nama_lantai,g.nama_gedung, un.nama_unit,
					case u.level
				    	when 1 then 'Admin'
				        when 2 then 'Sekretaris'
				        when 3 then 'User'
				    end as level,	
				    case u.status
				    	when 0 then 'Not Active'
				        when 1 then 'Active'
				        when 2 then 'Banned'
				    end as status

					FROM `tb_user` u left outer join tb_unit un on u.id_unit = un.id_unit
				    		left outer join tb_lantai l on u.id_lantai = l.id_lantai
				            left outer join tb_gedung g on l.id_gedung = g.id_gedung
				    where u.deleted=0
				    order by u.level, u.id_user asc";
    	$result = $this->db->query($query);
		return $result->result_array();
	}

	function deleteUser($id){
		$query = "update `tb_user` set `deleted`=1 where `id_user`=$id";
		if ($this->db->query($query)) {
			return true;
		}else{
			return false;
		}
	}
}
 ?>