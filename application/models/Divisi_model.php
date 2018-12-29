<?php
class Divisi_model extends CI_Model{

    function __construct(){
        parent::__construct();
        $this->load->database();
    }

    function list_divisi(){
        $this->db->select('id,nama_divisi');
        $this->db->from('divisi');
        $this->db->where('deleted', 0);
        $this->db->order_by('nama_divisi asc');
        return $this->db->get();
    }
}