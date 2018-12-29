<?php
class User_model extends CI_Model{

  function __construct(){
    parent::__construct();
    $this->load->database();
  }

  //============================================================
	//INSERT DATA
	//============================================================
	function insertUser($data){
		if ($this->db->insert('user',$data)) {
			return true;
		}
		return false;
	}

  function insert_multiple($data){
      $insert = $this->db->insert_batch('user', $data);
      if($insert){
          return true;
      }else{
          return false;
      }
  }
  //============================================================
  //GET DATA
  //============================================================
  function getUser($where=null, $search_key=null){
    $this->db->select('*');
    $this->db->from('user user');
    if ($where!=null) {
      $this->db->where($where);
    }
    $this->db->where('user.deleted', 0);
    if ($search_key != null) {
      $this->db->like('user.user_name', $search_key);
      $this->db->or_like('user.user_email', $search_key);
    }
    $this->db->order_by('user_name asc');
    return $this->db->get();
  }

  function getPegawai($where=null, $search_key=null){
    $this->db->select('*');
    $this->db->from('user user');
    if ($where!=null) {
      $this->db->where($where);
    }
    $this->db->where('user.user_level', 0);
    // $this->db->where('user.deleted', 0);
    if ($search_key != null) {
      $this->db->like('user.user_name', $search_key);
      $this->db->or_like('user.user_nip', $search_key);
      $this->db->or_like('user.user_position', $search_key);
      $this->db->or_like('user.user_functional', $search_key);
    }
    $this->db->order_by('user_name asc');
    return $this->db->get();
  }

  function getPosition($where=null){
    $this->db->select('*');
    $this->db->from('user_position');
    if ($where!=null) {
      $this->db->where($where);
    }
    $this->db->where('deleted', 0);
    return $this->db->get();
  }

  function getRank($where=null){
    $this->db->select('*');
    $this->db->from('user_rank');
    if ($where!=null) {
      $this->db->where($where);
    }
    $this->db->where('deleted', 0);
    return $this->db->get();
  }

  //============================================================
  //UPDATE DATA
  //============================================================
  function updateUser($where, $data){
    $this->db->where($where);
    if($this->db->update('user',$data)){
      return true;
    }else {
      return false;
    }
  }

  //============================================================
  //DELETE DATA
  //============================================================
  function deletePegawai($user_id){
    $this->db->where('user_id', $user_id);
    if($this->db->update('user',['deleted'=>1])){
      return true;
    }else {
      return false;
    }
  }

  function detail($user_id){
    $this->db->select('*');
    $this->db->from('user user');
    $this->db->join('user_position position', 'position.id=user.user_position', 'left');
    $this->db->join('user_rank rank', 'rank.id=user.user_rank', 'left');

    $this->db->where('user_id', $user_id);
    $this->db->where('user.deleted', 0);
    return $this->db->get()->row();
  }

  function loginUser($email,$password){
    $this->db->select('*');
    $this->db->from('user');
    $this->db->where('deleted', 0);
    $this->db->where('username', $email);
    $this->db->where('user_password', $password);
    return $this->db->get();
  }

  function insertUserDB($nama,$email,$password,$level){
    $insertUser = $this->db->query("INSERT INTO user (user_name,user_email,user_password,user_level,deleted) VALUES ('$nama','$email','$password','$level',0)");
    if($insertUser){
      return true;
    } else{
      return false;
    }
  }

  function selectUser($user_id){
    $this->db->select('*');
    $this->db->from('user');
    $this->db->where('user_id', $user_id);
    return $this->db->get()->row();
  }

  function pilihLevel(){
    $this->db->select('user_name,user_email,user_level,user_id');
    $this->db->from('user');
    // $this->db->where('user_level', $lvl);
    $this->db->where('deleted', 0);
    $this->db->order_by('user_name asc');
    return $this->db->get();
  }

}
