<?php
class Ruangan_model extends CI_Model{
	function __construct()
	{
		// Call the Model constructor
		parent::__construct();
		$this->load->database();
	}

	//============================================================
	//INSERT DATA
	//============================================================
	function insertPenggunaan($data){
		if ($this->db->insert('penggunaan_ruangan',$data)) {
			return true;
		}
		return false;
	}

	function insertRuangan($data){
		if ($this->db->insert('data_ruangan',$data)) {
			return true;
		}
		return false;
	}
	//============================================================
	//GET DATA
	//============================================================
  function getRuangan($where=null, $search_key=null){
		$this->db->select('*');
		$this->db->from('data_ruangan');
    if ($where!=null) {
      $this->db->where($where);
    }
		if ($search_key != null) {
			$this->db->like('nama_ruangan', $search_key);
		}
		$this->db->where('deleted', 0);
		return $this->db->get();
	}

	function getPenggunaan($where=null, $search_key=null){
		$this->db->select('*');
		$this->db->select('penggunaan.id id');
		$this->db->from('penggunaan_ruangan penggunaan');
		$this->db->join('data_ruangan ruang', 'ruang.id=penggunaan.ruangan', 'left');
		$this->db->join('user user', 'user.user_id=penggunaan.status','left');
    if ($where!=null) {
      $this->db->where($where);
    }
		if ($search_key != null) {
			$this->db->like('ruang.nama_ruangan', $search_key);
		}
		$this->db->where('penggunaan.deleted', 0);
		return $this->db->get();
	}

	function getCurrentAI(){
		$result = $this->db->query("SELECT `AUTO_INCREMENT` FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA = 'project-mail' AND TABLE_NAME = 'penggunaan_ruangan'");
		return $result->row_array();
	}
	//============================================================
	//UPDATE DATA
	//============================================================
	function updatePenggunaan($where, $data){
		$this->db->where($where);
		if($this->db->update('penggunaan_ruangan',$data)){
			return true;
		}else {
			return false;
		}
	}

	function updateRuangan($where, $data){
		$this->db->where($where);
		if($this->db->update('data_ruangan',$data)){
			return true;
		}else {
			return false;
		}
	}

	//============================================================
	//DELETE DATA
	//============================================================
	function deletePenggunaan($id){
		$this->db->where('id', $id);
		if ($this->db->update('penggunaan_ruangan', array('deleted'=>1))) {
			return true;
		}else{
			return false;
		}
	}

	function deleteRuangan($id){
		$this->db->where('id', $id);
		if ($this->db->update('data_ruangan', array('deleted'=>1))) {
			return true;
		}else{
			return false;
		}
	}

}
?>
