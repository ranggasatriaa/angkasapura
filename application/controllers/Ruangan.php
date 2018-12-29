<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ruangan extends MY_Controller {
  public function __construct(){

    parent:: __construct();
    $this->load->model('ruangan_model');
    $this->load->helper('my_helper');
  }

  // RUANGAN
  public function ruangan(){
    $this->isLogged();

    $search_key = $this->input->get('search_key');
    if (empty($search_key)) {
      $data['ruangans'] = $this->ruangan_model->getRuangan()->result();
    }else{
      $data['ruangans'] = $this->ruangan_model->getRuangan('',$search_key)->result();
    }
    $data['search_key'] =$search_key;
    $data['sidebar_color'] = 'orange';
    $data['page_name'] = 'Ruangan';
    $data['header'] = 'template/header.php';
    $data['t_foot'] = 'page/ruangan/t_foot.php';
    $data['content'] = 'page/ruangan/index.php';
    $this->load->view('template/main', $data);
  }

  public function buatRuangan(){
    $this->isLogged();

    $data['sidebar_color'] = 'orange';
    $data['page_name'] = 'Ruangan';
    $data['header'] = 'template/header.php';
    $data['t_foot'] = 'page/ruangan/t_foot.php';
    $data['content'] = 'page/ruangan/new_ruangan.php';
    $this->load->view('template/main', $data);
  }

  public function postBuatRuangan(){
    $this->isLogged();

    $ruangan =  $this->input->post('ruangan');
    $lokasi =  $this->input->post('lokasi');
    $kapasitas =  $this->input->post('kapasitas');

    //check schedule
      $insert_data = [
        'nama_ruangan' =>$ruangan,
        'lokasi' => $lokasi,
        'kapasitas' => $kapasitas
      ];

      if ($this->ruangan_model->insertRuangan($insert_data)) {
        echo 'Sukses';
      }else{
        echo 'Gagal menambahkan data';
      }
  }

  public function editRuangan($id){
    $this->isLogged();
    $data['ruangan'] = $this->ruangan_model->getRuangan(['id'=>$id])->row();
    $data['sidebar_color'] = 'orange';
    $data['page_name'] = 'Ruangan';
    $data['header'] = 'template/header.php';
    $data['t_foot'] = 'page/ruangan/t_foot.php';
    $data['content'] = 'page/ruangan/edit_ruangan.php';
    $this->load->view('template/main', $data);
  }

  public function postEditRuangan(){
    $this->isLogged();
    $id = $this->input->post('id');
    $ruangan =  $this->input->post('ruangan');
    $lokasi =  $this->input->post('lokasi');
    $kapasitas =  $this->input->post('kapasitas');

    //check schedule
      $insert_data = [
        'nama_ruangan' =>$ruangan,
        'lokasi' => $lokasi,
        'kapasitas' => $kapasitas
      ];

    if ($this->ruangan_model->updateRuangan(['id'=>$id],$insert_data)) {
      echo 'Sukses';
    }else{
      echo 'Gagal menambahkan data';
    }
  }

  public function deleteRuangan(){
    $this->isLogged();

    $id = $this->input->post('id');
    if (empty($id)) {
      echo 'Ruangan tidak ditemukan';
    }else{
      if ($this->ruangan_model->deleteRuangan($id)) {
        echo 'Sukses';
      }else {
        echo 'Gagal menghapus ruangan';
      }
    }
  }

//====================================================
// PENGGUNAAN RUANGAN
//====================================================
  public function penggunaan(){
    $this->isLogged();

    $data['ruangans'] = $this->ruangan_model->getRuangan()->result();
    $search_key = $this->input->get('search_key');
    if (empty($search_key)) {
      $data['penggunaans'] = $this->ruangan_model->getPenggunaan()->result();
    }else{
      $data['penggunaans'] = $this->ruangan_model->getPenggunaan('',$search_key)->result();
    }
    $data['search_key'] =$search_key;
    $data['sidebar_color'] = 'azure';
    $data['page_name'] = 'Penggunaaan Ruangan';
    $data['header'] = 'template/header.php';
    $data['t_foot'] = 'page/ruangan/penggunaan/t_foot.php';
    $data['content'] = 'page/ruangan/penggunaan/index.php';
    $this->load->view('template/main', $data);
  }

  public function detailPenggunaan($id){
    $this->isLogged();
    $data['ruangans'] = $this->ruangan_model->getRuangan()->result();
    $data['penggunaan'] = $this->ruangan_model->getPenggunaan(['penggunaan.id'=>$id])->row();
    $data['sidebar_color'] = 'azure';
    $data['page_name'] = 'Penggunaaan Ruangan';
    $data['header'] = 'template/header.php';
    $data['t_foot'] = 'page/ruangan/penggunaan/t_foot.php';
    $data['content'] = 'page/ruangan/penggunaan/detail_penggunaan.php';
    $this->load->view('template/main', $data);
  }

  public function buatPenggunaan(){
    $this->isLogged();

    $data['ruangs'] = $this->ruangan_model->getRuangan()->result();
    $data['sidebar_color'] = 'azure';
    $data['page_name'] = 'Penggunaaan Ruangan';
    $data['header'] = 'template/header.php';
    $data['t_foot'] = 'page/ruangan/penggunaan/t_foot.php';
    $data['content'] = 'page/ruangan/penggunaan/new_penggunaan.php';
    $this->load->view('template/main', $data);
  }

  public function postBuatPenggunaan(){
    $this->isLogged();

    $tanggal_mulai =  $this->input->post('tanggal_mulai');
    $waktu_mulai =  $this->input->post('waktu_mulai');
    $tanggal_selesai =  $this->input->post('tanggal_selesai');
    $waktu_selesai =  $this->input->post('waktu_selesai');
    $tujuan =  $this->input->post('tujuan');
    $permintaan_ruangan =  $this->input->post('permintaan_ruangan');
    $peminjam =  $this->input->post('peminjam');
    $telepon = $this->input->post('telepon');

    //check schedule
    // $check_schedule = $this->ruangan_model->getPenggunaan(['ruangan' => $ruangan, 'tanggal' => $tanggal])->row();
    // if (empty($check_schedule)) {
      $insert_data = [
        'tanggal_mulai' => $tanggal_mulai,
        'waktu_mulai' => $waktu_mulai,
        'tanggal_selesai' => $tanggal_selesai,
        'waktu_selesai' => $waktu_selesai,
        'tujuan' => $tujuan,
        'permintaan_ruangan' => $permintaan_ruangan,
        'peminjam' => $peminjam,
        'telepon' => $telepon,
        'status' => 0
      ];
        // print_r($insert_data);
        // die();
      if ($this->ruangan_model->insertPenggunaan($insert_data)) {
        echo 'Sukses';
      }else{
        echo 'Gagal menambahkan data';
      }
    // }else{
    //   echo 'Ruangan Telah digunakan pada tanggal tersebut';
    // }
  }

  public function editPenggunaan($id){
    $this->isLogged();
    $data['penggunaan'] = $this->ruangan_model->getPenggunaan(['penggunaan.id'=>$id])->row();
    $data['ruangs'] = $this->ruangan_model->getRuangan()->result();
    $data['sidebar_color'] = 'azure';
    $data['page_name'] = 'Penggunaaan Ruangan';
    $data['header'] = 'template/header.php';
    $data['t_foot'] = 'page/ruangan/penggunaan/t_foot.php';
    $data['content'] = 'page/ruangan/penggunaan/edit_penggunaan.php';
    $this->load->view('template/main', $data);
  }

  public function postEditPenggunaan(){
    $this->isLogged();
    $id = $this->input->post('id');
    $tanggal_mulai =  $this->input->post('tanggal_mulai');
    $waktu_mulai =  $this->input->post('waktu_mulai');
    $tanggal_selesai =  $this->input->post('tanggal_selesai');
    $waktu_selesai =  $this->input->post('waktu_selesai');
    $tujuan =  $this->input->post('tujuan');
    $peminjam =  $this->input->post('peminjam');
    $telepon = $this->input->post('telepon');
    $status = $this->input->post('status');
    if ($status == 0) {
      $permintaan_ruangan =  $this->input->post('permintaan_ruangan');
      $insert_data = [
        'tanggal_mulai' => $tanggal_mulai,
        'waktu_mulai' => $waktu_mulai,
        'tanggal_selesai' => $tanggal_selesai,
        'waktu_selesai' => $waktu_selesai,
        'tujuan' => $tujuan,
        'permintaan_ruangan' => $permintaan_ruangan,
        'peminjam' => $peminjam,
        'telepon' => $telepon,
      ];
    }else {
      $ruangan =  $this->input->post('ruangan');
      $insert_data = [
        'tanggal_mulai' => $tanggal_mulai,
        'waktu_mulai' => $waktu_mulai,
        'tanggal_selesai' => $tanggal_selesai,
        'waktu_selesai' => $waktu_selesai,
        'tujuan' => $tujuan,
        'ruangan' => $ruangan,
        'peminjam' => $peminjam,
        'telepon' => $telepon,
      ];
    }
    // print_r($insert_data);
    // echo $id;
    // die();
    if ($this->ruangan_model->updatePenggunaan(['id'=>$id],$insert_data)) {
      echo 'Sukses';
    }else{
      echo 'Gagal menambahkan data';
    }
  }

  public function ijinkanPenggunaan(){
    $this->isLogged();

    $id = $this->input->post('id');
    $user_id = $this->input->post('user');
    $ruangan = $this->input->post('ruangan');
    // echo $id.$user_id.$ruangan;
    // die();
    if (empty($id)) {
      echo 'Penggunaan ruang tidak ditemukan';
    }else{
      if ($this->ruangan_model->updatePenggunaan(['id'=>$id], ['status'=>$user_id, 'ruangan'=>$ruangan])) {
        echo 'Sukses';
      }else {
        echo 'Gagal menghapus pengguanaan';
      }
    }
  }

  public function deletePenggunaan(){
    $this->isLogged();

    $id = $this->input->post('id');
    if (empty($id)) {
      echo 'Penggunaan ruang tidak ditemukan';
    }else{
      if ($this->ruangan_model->deletePenggunaan($id)) {
        echo 'Sukses';
      }else {
        echo 'Gagal menghapus pengguanaan';
      }
    }
  }


}
?>
