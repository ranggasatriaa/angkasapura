<?php
class Peminjaman_model extends CI_Model{

    function __construct(){
        parent::__construct();
        $this->load->database();
    }

    public function insert_peminjaman($data){
        $insert = $this->db->insert('peminjaman', $data);
        if($insert){
            return true;
        }else{
            return false;
        }
    }

    public function insert_data_pinjam($data,$table){
        $insert = $this->db->insert($table, $data);
        if($insert){
            if($table == 'permintaan_atk' || $table == 'peminjaman'){
                return $this->db->insert_id();
            }else{
                return true;
            }
        }else{
            return false;
        }
    }

    public function list_peminjaman(){
        $this->db->select('id,nama_peminjam,tgl_pinjam,tgl_kembali,status');
        $this->db->from('peminjaman');
        $this->db->where('deleted', 0);
        $this->db->order_by('tgl_pinjam asc');
        return $this->db->get();
    }
    public function list_data(){
        $this->db->select('*');
        $this->db->from('data_bmn');
        $this->db->where('deleted', 0);
        return $this->db->get();
    }

    public function list_pengaju_atk(){
        $this->db->select('id,nama,nip,tanggal');
        $this->db->from('permintaan_atk');
        $this->db->where('deleted', 0);
        $this->db->order_by('created_at desc');
        return $this->db->get();
    }

    public function detail_permintaan_atk($id){
        $this->db->select('id,nama,nip,tanggal');
        $this->db->from('permintaan_atk');
        $this->db->where('id', $id);
        $this->db->where('deleted', 0);
        return $this->db->get();
    }

    public function list_item_atk($id){
        $this->db->select('id,nama_atk,jumlah');
        $this->db->from('atk_diminta');
        $this->db->where('id_permintaan', $id);
        $this->db->where('deleted', 0);
        return $this->db->get();
    }

    public function list_barang_dipinjam($id){
        $this->db->select('id,nama,jumlah,id_barang,jenis,nomor_barang');
        $this->db->from('barang_dipinjam');
        $this->db->where('id_peminjaman', $id);
        $this->db->where('deleted', 0);
        return $this->db->get();
    }

    public function detail_pinjam($id){
        $this->db->select('id,nama_peminjam,tgl_pinjam,tgl_kembali,tujuan,barang_akan_dipinjam,telp,status');
        $this->db->from('peminjaman');
        $this->db->where('id', $id);
        $this->db->where('deleted', 0);
        return $this->db->get();
    }

    public function detail_data($id){
        $this->db->select('id,nomor,nama_barang,jumlah,tahun_kontrak,rekanan,status,jenis');
        $this->db->from('data_bmn');
        $this->db->where('id', $id);
        $this->db->where('deleted', 0);
        return $this->db->get();
    }

    public function update_pinjaman($id, $data, $table, $where){
        $this->db->where($where, $id);
		if($this->db->update($table,$data)){
            return true;
        }else{
            return false;
        }        
    }

    public function search_minta_atk($query){
        $this->db->select('id,nama,nip,tanggal');
        $this->db->from('permintaan_atk');
        $this->db->like('nama', $query); 
        $this->db->or_like('nip', $query);
        $this->db->where('deleted', 0);
        $this->db->order_by('created_at desc');
        return $this->db->get();
    }

    function search_peminjaman($query){
        $this->db->select('id,nama_peminjam,tgl_pinjam,tgl_kembali');
        $this->db->from('peminjaman');
        $this->db->like('nama_peminjam', $query); 
        $this->db->where('deleted', 0);
        $this->db->order_by('tgl_pinjam asc');
        return $this->db->get();
    }
}