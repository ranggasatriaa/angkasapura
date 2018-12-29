<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ruangan extends MY_Controller {
  public function __construct(){

    parent:: __construct();
    $this->load->model('ruangan_model');
    $this->load->helper('my_helper');
  }

  //====================================================
  // RUANGAN
  //====================================================
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
    $data['page_name'] = 'Surat Keluar';
    $data['header'] = 'template/header.php';
    $data['t_foot'] = 'page/ruangan/t_foot.php';
    $data['content'] = 'page/ruangan/index.php';
    $this->load->view('template/main', $data);
  }

  public function buatPenggunaan(){
    $this->isLogged();

    $data['ruangs'] = $this->ruangan_model->getRuangan()->result();
    $data['sidebar_color'] = 'azure';
    $data['page_name'] = 'Surat Keluar';
    $data['header'] = 'template/header.php';
    $data['t_foot'] = 'page/ruangan/penggunaan/t_foot.php';
    $data['content'] = 'page/ruangan/penggunaan/new_penggunaan.php';
    $this->load->view('template/main', $data);
  }

  public function postBuatRuangan(){
    $this->isLogged();

    $ruangan =  $this->input->post('ruangan');
    $tanggal =  $this->input->post('tanggal');
    $tujuan =  $this->input->post('tujuan');
    $peminjam =  $this->input->post('peminjam');
    $telepon = $this->input->post('telepon');

    //check schedule
    $check_schedule = $this->ruangan_model->getPenggunaan(['ruangan' => $ruangan, 'tanggal' => $tanggal])->row();
    if (empty($check_schedule)) {
      $insert_data = [
        'ruangan' => $this->input->post('ruangan'),
        'tanggal' => $this->input->post('tanggal'),
        'tujuan' => $this->input->post('tujuan'),
        'peminjam' => $this->input->post('peminjam'),
        'telepon' => $this->input->post('telepon'),
        'status' => 0
      ];

      if ($this->ruangan_model->insertPenggunaan($insert_data)) {
        echo 'Sukses';
      }else{
        echo 'Gagal menambahkan data';
      }
    }else{
      echo 'Ruangan Telah digunakan pada tanggal tersebut';
    }
  }

//====================================================
// PENGGUNAAN RUANGAN
//====================================================
  public function penggunaan(){
    $this->isLogged();

    $search_key = $this->input->get('search_key');
    if (empty($search_key)) {
      $data['ruangans'] = $this->ruangan_model->getPenggunaan()->result();
    }else{
      $data['ruangans'] = $this->ruangan_model->getPenggunaan('',$search_key)->result();
    }
    $data['search_key'] =$search_key;
    $data['sidebar_color'] = 'azure';
    $data['page_name'] = 'Surat Keluar';
    $data['header'] = 'template/header.php';
    $data['t_foot'] = 'page/ruangan/penggunaan/t_foot.php';
    $data['content'] = 'page/ruangan/penggunaan/index.php';
    $this->load->view('template/main', $data);
  }

  public function detailPenggunaan($id){
    $this->isLogged();

    $data['penggunaan'] = $this->ruangan_model->getPenggunaan(['penggunaan.id'=>$id])->row();
    $data['sidebar_color'] = 'azure';
    $data['page_name'] = 'Surat Keluar';
    $data['header'] = 'template/header.php';
    $data['t_foot'] = 'page/ruangan/penggunaan/t_foot.php';
    $data['content'] = 'page/ruangan/penggunaan/detail_penggunaan.php';
    $this->load->view('template/main', $data);
  }

  public function buatPenggunaan(){
    $this->isLogged();

    $data['ruangs'] = $this->ruangan_model->getRuangan()->result();
    $data['sidebar_color'] = 'azure';
    $data['page_name'] = 'Surat Keluar';
    $data['header'] = 'template/header.php';
    $data['t_foot'] = 'page/ruangan/penggunaan/t_foot.php';
    $data['content'] = 'page/ruangan/penggunaan/new_penggunaan.php';
    $this->load->view('template/main', $data);
  }

  public function postBuatPenggunaan(){
    $this->isLogged();

    $ruangan =  $this->input->post('ruangan');
    $tanggal =  $this->input->post('tanggal');
    $tujuan =  $this->input->post('tujuan');
    $peminjam =  $this->input->post('peminjam');
    $telepon = $this->input->post('telepon');

    //check schedule
    $check_schedule = $this->ruangan_model->getPenggunaan(['ruangan' => $ruangan, 'tanggal' => $tanggal])->row();
    if (empty($check_schedule)) {
      $insert_data = [
        'ruangan' => $this->input->post('ruangan'),
        'tanggal' => $this->input->post('tanggal'),
        'tujuan' => $this->input->post('tujuan'),
        'peminjam' => $this->input->post('peminjam'),
        'telepon' => $this->input->post('telepon'),
        'status' => 0
      ];

      if ($this->ruangan_model->insertPenggunaan($insert_data)) {
        echo 'Sukses';
      }else{
        echo 'Gagal menambahkan data';
      }
    }else{
      echo 'Ruangan Telah digunakan pada tanggal tersebut';
    }
  }

  public function editPenggunaan($id){
    $this->isLogged();
    $data['penggunaan'] = $this->ruangan_model->getPenggunaan(['penggunaan.id'=>$id])->row();
    $data['ruangs'] = $this->ruangan_model->getRuangan()->result();
    $data['sidebar_color'] = 'azure';
    $data['page_name'] = 'Surat Keluar';
    $data['header'] = 'template/header.php';
    $data['t_foot'] = 'page/ruangan/penggunaan/t_foot.php';
    $data['content'] = 'page/ruangan/penggunaan/edit_penggunaan.php';
    $this->load->view('template/main', $data);
  }

  public function postEditPenggunaan(){
    $this->isLogged();
    $id = $this->input->post('id');


    $insert_data = [
      'ruangan' => $this->input->post('ruangan'),
      'tanggal' => $this->input->post('tanggal'),
      'tujuan' => $this->input->post('tujuan'),
      'peminjam' => $this->input->post('peminjam'),
      'telepon' => $this->input->post('telepon'),
    ];

    if ($this->ruangan_model->updatePenggunaan(['id'=>$id],$insert_data)) {
      echo 'Sukses';
    }else{
      echo 'Gagal menambahkan data';
    }
  }

  public function ijinkanPenggunaan(){
    $this->isLogged();

    $id = $this->input->post('id');
    if (empty($id)) {
      echo 'Penggunaan ruang tidak ditemukan';
    }else{
      if ($this->ruangan_model->updatePenggunaan(['id'=>$id], ['status'=>1])) {
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
