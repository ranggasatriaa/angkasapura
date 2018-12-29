<?php
class Agenda_model extends CI_Model{

    function __construct(){
        parent::__construct();
        $this->load->database();
    }

    public function list_agenda($jenis){
        $this->db->select('id,nama_kegiatan,tanggal_mulai,tanggal_selesai,tempat,waktu');
        $this->db->from('agenda');
        $this->db->where('jenis', $jenis);
        $this->db->where('deleted',0);
        $select = $this->db->get();
        return $select;
    }

    public function insert_data($data, $table){
        $insert = $this->db->insert($table, $data);
        if($insert){
            if(!empty($data['jenis'])){
                if($data['jenis'] == 2){
                    return $this->db->insert_id();
                }else{
                    return 'Gagal mendapat id agenda';
                }
            }else{
                return true;
            }
        }else{
            return false;
        }
    }

    public function detail_agenda($id){
        $this->db->select('id,nama_kegiatan,tanggal_mulai,tanggal_selesai,tempat,waktu');
        $this->db->from('agenda');
        $this->db->where('id',$id);
        $this->db->where('deleted',0);
        $select = $this->db->get();
        return $select;
    }

    public function update_agenda($table, $data, $where, $id){
        $this->db->where($where, $id);
		if($this->db->update($table,$data)){
            return true;
        }else{
            return false;
        }        
    }

    public function get_personil($id_agenda){
        $this->db->select('id,nama_personil,nip,id_personil');
        $this->db->from('personil_agenda');
        $this->db->where('id_agenda',$id_agenda);
        $this->db->where('deleted',0);
        $select = $this->db->get();
        return $select;
    }

     // Buat sebuah fungsi untuk melakukan insert lebih dari 1 data
    public function insert_multiple($data){
        $insert = $this->db->insert_batch('agenda', $data);
        if($insert){
            return true;
        }else{
            return false;
        }
    }

    public function search($query, $jenis){
        // $this->db->query('select (id,nama_kegiatan,tanggal_mulai,tanggal_selesai,tempat,waktu) from agenda where nama_kegiatan like `%'.$query.'%` or tanggal_mulai like `%'.$query.'%` and jenis='.$jenis.' and deleted=0 ' );
        $this->db->select('id,nama_kegiatan,tanggal_mulai,tanggal_selesai,tempat,waktu');
        $this->db->from('agenda');
        $this->db->like('nama_kegiatan', $query);
        $this->db->or_like('tanggal_mulai', $query);
        $this->db->where('jenis',$jenis);
        $this->db->where('deleted',0);
        $select = $this->db->get();
        return $select;
    }


}