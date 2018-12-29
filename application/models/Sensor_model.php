<?php
/* Created by PhpStorm.
User: Dellicious Date: 11/10/2016
Time: 3:12 PM /
*/
class Sensor_model extends CI_Model{
	function __construct()
	{
		// Call the Model constructor
		parent::__construct();
		$this->load->database();
	}

	//============================================================
	//INSERT DATA
	//============================================================
	function insertSuratKeluar($data){
$this->db->insert('outmail',$data);

	}

	//============================================================
	//GET DATA
	//============================================================
	function getSensor($where=null){
		$this->db->select('*');
		$this->db->from('sensor');
		if ($where!=null) {
			$this->db->where($where);
		}
		return $this->db->get();
	}
	function getData($where=null){
		$this->db->select('*');
		$this->db->from('data');
		if ($where!=null) {
			$this->db->where($where);
		}
		return $this->db->get();
	}
	function getProfil($where=null,$select=null){
		if ($select==null) {
			$this->db->select('*');
		}else{
			$this->db->select($select);
		}
		$this->db->from('profil');
		if ($where!=null) {
			$this->db->where($where);
		}
		return $this->db->get();
	}

	//============================================================
	//UPDATE DATA
	//============================================================
	function updateSensor($where, $data){
		$this->db->where($where);
		if($this->db->update('data',$data)){
			return true;
		}else {
			return false;
		}
	}

	//============================================================
	//DELETE DATA
	//============================================================


	// function deleteMailContent($mail_id){
	// 	$this->db->where('data', $mail_id);
	// 	if ($this->db->update('mail_content', array('deleted'=>1, 'updated_at'=>date('Y-m-d H:i:s')))) {
	// 		return true;
	// 	}else{
	// 		return false;
	// 	}
	// }

	function destroySensor($where){
		return $this->db->delete('data', $where);
	}


}
?>
