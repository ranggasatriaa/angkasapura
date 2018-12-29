<?php
class Inmail_model extends CI_Model{

    function __construct(){
        parent::__construct();
        $this->load->database();
    }

    function getCurrentAI(){
		$result = $this->db->query("SELECT `AUTO_INCREMENT` FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA = 'project-mail' AND TABLE_NAME = 'inmail'");
		return $result->row_array();
    }
    
    function index(){
        $this->db->select('id,nomor,tanggal,perihal,dari');
        $this->db->from('inmail');
        $this->db->where('deleted', 0);
        $this->db->order_by('tanggal asc');
        return $this->db->get();
    }

    public function insert_data_surat($data,$table){
        $insert = $this->db->insert($table, $data);
        if($insert){
            return true;
        }else{
            return false;
        }
    }

    function detailSurat($id){
        $this->db->select('id, nomor, tanggal, perihal, dari, untuk, isi, gambar');
        $this->db->from('inmail');
        $this->db->where('deleted', 0);
        $this->db->where('id', $id);
        return $this->db->get();
    }

    public function updateSuratMasuk($data, $id){
        $this->db->where('id', $id);
        $this->db->update('inmail', $data);
        return true;
    }

    function deleteInmail($id){
        $this->db->query("UPDATE inmail SET deleted = 1 WHERE id='$id'");
        return true;
    }
    function deleteHasilScan($id){
        $this->db->query("UPDATE inmail SET gambar = '' WHERE id='$id'");
        return true;
    }

    function search($query){
        $this->db->select('id,nomor,tanggal,perihal,dari');
        $this->db->from('inmail');
        $this->db->like('nomor', $query);
        $this->db->where('deleted', 0);
        return $this->db->get();
    }
}