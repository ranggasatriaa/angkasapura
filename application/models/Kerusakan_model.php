<?php
class Kerusakan_model extends CI_Model{

    function __construct(){
        parent::__construct();
        $this->load->database();
    }

    public function list_kerusakan(){
        $this->db->select('id,nama_barang,tgl_lapor,divisi,status');
        $this->db->from('kerusakan');
        $this->db->where('deleted', 0);
        $this->db->order_by('tgl_lapor asc');
        return $this->db->get();
    }

    public function insert_kerusakan($data){
        $insert = $this->db->insert('kerusakan', $data);
        if($insert){
            return true;
        }else{
            return false;
        }
    }

    public function detail_kerusakan($id){
        $this->db->select('id,nama_barang,tgl_lapor,divisi,status,keterangan,gambar');
        $this->db->from('kerusakan');
        $this->db->where('deleted', 0);
        $this->db->where('id', $id);
        return $this->db->get();
    }

    public function hapus_gambar($id){
        $hapus = $this->db->query("UPDATE kerusakan SET gambar='' WHERE id='$id' ");
        if($hapus){
            return true;
        }else{
            return false;
        }
    }

    public function update_kerusakan($data, $id){
        $this->db->where('id', $id);
		if($this->db->update('kerusakan',$data)){
            return true;
        }else{
            return false;
        }
    }

    public function hapus_laporan($id){
        $hapus = $this->db->query("UPDATE kerusakan SET deleted=1 WHERE id='$id' ");
        if($hapus){
            return true;
        }else{
            return false;
        }
    }

    public function perbaikan_laporan($id){
        $fixed = $this->db->query("UPDATE kerusakan SET status=1 WHERE id='$id' ");
        if($fixed){
            return true;
        }else{
            return false;
        }
    }

    public function search($query){
        $this->db->select('id,nama_barang,tgl_lapor,divisi,status');
        $this->db->from('kerusakan');
        $this->db->like('nama_barang', $query);
        $this->db->where('deleted', 0);
        $this->db->order_by('tgl_lapor asc');
        return $this->db->get();
    }
}