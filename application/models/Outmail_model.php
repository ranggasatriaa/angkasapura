<?php
/* Created by PhpStorm.
User: Dellicious Date: 11/10/2016
Time: 3:12 PM /
*/
class Outmail_model extends CI_Model{
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
		if ($this->db->insert('outmail',$data)) {
			return true;
		}
		return false;
	}

	function insertMailContent($data){
		if ($this->db->insert('mail_content',$data)) {
			return true;
		}
		return false;
	}

	function insertMailImage($data){
		if ($this->db->insert('mail_image',$data)) {
			return true;
		}else {
			return false;
		}
	}

	//============================================================
	//GET DATA
	//============================================================
	function index($search_key=null){
		$this->db->select('*');
		$this->db->from('outmail outmail');
		$this->db->join('mail_type type', 'type.id=outmail.mail_type', 'left');
		$this->db->where('outmail.deleted', 0);
		if ($search_key != null) {
			$this->db->like('outmail.mail_subject', $search_key);
			$this->db->or_like('outmail.mail_number', $search_key);
			$this->db->or_like('type.name', $search_key);
		}
		return $this->db->get()->result();
	}

	function detailSurat($mail_id){
		$this->db->select('*');
		$this->db->from('outmail outmail');
		$this->db->join('mail_type type', 'type.id=outmail.mail_type', 'left');
		$this->db->where('mail_id', $mail_id);
		$this->db->where('outmail.deleted', 0);
		return $this->db->get()->row();
	}

	function getMail($where=null){
		$this->db->select('*');
		$this->db->from('outmail');
		if ($where!=null) {
			$this->db->where($where);
		}
		$this->db->where('deleted',0);
		return $this->db->get();
	}

	function getMailType($where=null){
		$this->db->select('*');
		$this->db->from('mail_type');
		if ($where!=null) {
			$this->db->where($where);
		}
		$this->db->where('deleted',0);
		return $this->db->get();
	}

	function getMailSection($where=null){
		$this->db->select('*');
		$this->db->from('mail_section');
		if ($where!=null) {
			$this->db->where($where);
		}
		$this->db->where('deleted',0);
		$this->db->order_by('order', 'ASC');
		return $this->db->get();
	}

	function getMailContent($where=null){
		$this->db->select('*');
		$this->db->select('content.id id');
		$this->db->select('content.order content_order');
		$this->db->select('section.order section_order');
		$this->db->from('mail_content content');
		$this->db->join('mail_section section', 'section.id=content.section_id', 'left');
		if ($where!=null) {
			$this->db->where($where);
		}
		$this->db->where('content.deleted',0);
		return $this->db->get();
	}

	function getMailImage($where=null){
		$this->db->select('*');
		$this->db->from('mail_image');
		if ($where!=null) {
			$this->db->where($where);
		}
		$this->db->where('deleted',0);
		return $this->db->get();
	}

	function getCurrentAI(){
		$result = $this->db->query("SELECT `AUTO_INCREMENT` FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA = 'project-mail' AND TABLE_NAME = 'outmail'");
		return $result->row_array();
	}
	//============================================================
	//UPDATE DATA
	//============================================================
	function updateSuratKeluar($parameter, $value, $data){
		$this->db->where($parameter, $value);
		if($this->db->update('outmail',$data)){
			return true;
		}else {
			return false;
		}
	}

	function updateMailContent($where, $data){
		$this->db->where($where);
		if($this->db->update('mail_content',$data)){
			return true;
		}else {
			return false;
		}
	}

	//============================================================
	//DELETE DATA
	//============================================================
	function deleteSuratKeluar($id){
		$this->db->where('mail_id', $id);
		if ($this->db->update('outmail', array('deleted'=>1, 'updated_at'=>date('Y-m-d H:i:s')))) {
			return true;
		}else{
			return false;
		}
	}

	function deleteMailContent($mail_id){
		$this->db->where('mail_id', $mail_id);
		if ($this->db->update('mail_content', array('deleted'=>1, 'updated_at'=>date('Y-m-d H:i:s')))) {
			return true;
		}else{
			return false;
		}
	}
	function deleteMailImage($mail_id){
		$this->db->where('mail_id', $mail_id);
		if ($this->db->update('mail_image', array('deleted'=>1, 'updated_at'=>date('Y-m-d H:i:s')))) {
			return true;
		}else{
			return false;
		}
	}

	function destroyMailImage($where){
		return $this->db->delete('mail_image', $where);
	}


}
?>
