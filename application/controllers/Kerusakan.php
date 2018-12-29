<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kerusakan extends MY_Controller {
  public function __construct()
  {
    parent:: __construct();
    $this->load->helper(array('form', 'url'));
    $this->load->model('user_model');
    $this->load->model('divisi_model');
    $this->load->model('kerusakan_model');
  }

  public function index(){
    $this->isLogged();

    $data['list_kerusakan'] = $this->kerusakan_model->list_kerusakan()->result();
    $data['sidebar_color'] = 'azure';
    $data['page_name'] = 'Laporan Kerusakan Barang';
    $data['t_foot'] = 'page/barang/t_foot.php';
    $data['content'] = 'page/barang/laporan_rusak.php';
    $this->load->view('template/main', $data);
  }

  public function laporan_baru(){
    $this->isLogged();

    $data['divisi'] = $this->divisi_model->list_divisi()->result();
    $data['sidebar_color'] = 'primary';
    $data['page_name'] = 'Laporan Kerusakan Baru';
    $data['t_foot'] = 'page/barang/t_foot.php';
    $data['content'] = 'page/barang/laporan_baru.php';
    $this->load->view('template/main', $data);
  }

  public function create_laporan(){
    $this->isLogged();

    $nama = $this->input->post('nama-barang');
    $divisi = $this->input->post('divisi');
    $tgl = $this->input->post('tanggal-lapor');
    $keterangan = $this->input->post('keterangan-rusak');
    $timestamp = date("Y-m-d H:i:s", time());

    $config['upload_path']          = UPLOAD_PATH_KERUSAKAN;
    $config['allowed_types']        = 'gif|jpg|png|jpeg|PNG|JPG';
    $config['file_name']            = $nama.'-'.$divisi.'-'.$timestamp.'-'.$_FILES['gambar-barang']['name'];
    $config['max_size']             = 5120;
    $config['overwrite']            = TRUE;
    $config['encrypt_name']         = FALSE;
    $config['remove_spaces']        = TRUE;
    if ( ! is_dir($config['upload_path']) ){
        die("THE UPLOAD DIRECTORY DOES NOT EXIST");
    }

    //PROSES UPLOAD
    $this->load->library('upload', $config);
    //KONDISI JIKA UPLOAD GAGAL
    if (!$this->upload->do_upload('gambar-barang')){
        return $this->upload->display_errors();
        // $this->setFlash('error','Gagal Upload', $this->upload->display_errors());
        // redirect(site_url('lapor-baru'));
    }
    else{
        $file_name = $this->upload->data('file_name');
        $datas = $this->upload->data();
        $dataInsert = array(
          'nama_barang' => $nama,
          'divisi' => $divisi,
          'tgl_lapor' => $tgl,
          'keterangan' => $keterangan,
          'gambar' => $file_name,
          'status' => 0,
          'deleted' => 0
        );
        $insert = $this->kerusakan_model->insert_kerusakan($dataInsert);
        if($insert == true){
            echo 1;
        }else{
            echo 0;
        }
    }
  }

  function detail_laporan($id){
    $this->isLogged();

    $length = strlen($id);
    $length = $length-15;
    $id_laporan = substr($id,5,$length);
    $data['detail_rusak'] = $this->kerusakan_model->detail_kerusakan($id_laporan)->row();
    $data['sidebar_color'] = 'azure';
    $data['page_name'] = 'Detail Laporan';
    $data['t_foot'] = 'page/barang/t_foot.php';
    $data['content'] = 'page/barang/detail_laporan.php';
    $this->load->view('template/main', $data);
  }

  function edit_laporan($id){
    $this->isLogged();

    $length = strlen($id);
    $length = $length-15;
    $id_laporan = substr($id,5,$length);
    $data['divisi'] = $this->divisi_model->list_divisi()->result();
    $data['detail_laporan'] = $this->kerusakan_model->detail_kerusakan($id_laporan)->row();
    $data['sidebar_color'] = 'azure';
    $data['page_name'] = 'Edit Laporan Kerusakan';
    $data['t_foot'] = 'page/barang/t_foot.php';
    $data['content'] = 'page/barang/edit_laporan.php';
    $this->load->view('template/main', $data);
  }

  function update_laporan(){
    $this->isLogged();

    $nama = $this->input->post('nama-barang');
    $divisi = $this->input->post('divisi');
    $tgl = $this->input->post('tanggal-lapor');
    $keterangan = $this->input->post('keterangan-rusak');
    $id = $this->input->post('laporan-id');
    $length = strlen($id);
    $length = $length-15;
    $id_laporan = substr($id,5,$length);
    $timestamp = date("Y-m-d H:i:s", time());

    if($_FILES['gambar-barang']['name'] == ''){
      $dataUpdate = array(
        'nama_barang' => $nama,
        'divisi' => $divisi,
        'tgl_lapor' => $tgl,
        'keterangan' => $keterangan
      );
      $update = $this->kerusakan_model->update_kerusakan($dataUpdate, $id_laporan);
      if($update == true){
          echo 1;
      }else{
          echo 0;
      }
    }else{
      $config['upload_path']          = UPLOAD_PATH_KERUSAKAN;
      $config['allowed_types']        = 'gif|jpg|png|jpeg|PNG|JPG';
      $config['file_name']            = $nama.'-'.$divisi.'-'.$timestamp.'-'.$_FILES['gambar-barang']['name'];
      $config['max_size']             = 5120;
      $config['overwrite']            = TRUE;
      $config['encrypt_name']         = FALSE;
      $config['remove_spaces']        = TRUE;
      if ( ! is_dir($config['upload_path']) ){
          die("THE UPLOAD DIRECTORY DOES NOT EXIST");
      }

      //PROSES UPLOAD
      $this->load->library('upload', $config);
      //KONDISI JIKA UPLOAD GAGAL
      if (!$this->upload->do_upload('gambar-barang')){
          $_POST['error'] = $this->upload->display_errors();;
          $this->setFlash('error','Gagal Upload', $this->upload->display_errors());
          // redirect(site_url('edit-laporan/'.$id));
      }
      else{
          $file_name = $this->upload->data('file_name');
          $datas = $this->upload->data();
          $dataUpdate = array(
            'nama_barang' => $nama,
            'divisi' => $divisi,
            'tgl_lapor' => $tgl,
            'keterangan' => $keterangan,
            'gambar' => $file_name,
          );
          $update = $this->kerusakan_model->update_kerusakan($dataUpdate, $id_laporan);
          if($update == true){
              echo 1;
          }else{
              echo 0;
          }
      }
    }
  }

  function delete_image(){
    $this->isLogged();

    $id = $this->input->post('id');
    $length = strlen($id);
    $length = $length-15;
    $id_laporan = substr($id,5,$length);
    $hapus = $this->kerusakan_model->hapus_gambar($id_laporan);
    if($hapus == true){
      echo 1;
    }else{
      echo 0;
    }
  }

  function delete_laporan(){
    $this->isLogged();

    $id = $this->input->post('id');
    $length = strlen($id);
    $length = $length-15;
    $id_laporan = substr($id,5,$length);
    $hapus = $this->kerusakan_model->hapus_laporan($id_laporan);
    if($hapus == true){
      echo 1;
    }else{
      echo 0;
    }
  }

  function perbaikan_kerusakan(){
    $this->isLogged();

    $id = $this->input->post('id');
    $length = strlen($id);
    $length = $length-15;
    $id_laporan = substr($id,5,$length);
    $fixed = $this->kerusakan_model->perbaikan_laporan($id_laporan);
    if($fixed == true){
      echo 1;
    }else{
      echo 0;
    }
  }

  function search(){
    $this->isLogged();

    $query = $this->input->post('value');
    $search = $this->kerusakan_model->search($query)->result();
    $a = 1;
    $hasil = '';
    foreach($search as $s){
        $random = md5(mt_rand(1,10000));
        $first = substr($random,0,5);
        $last = substr($random,5,10);
        $id = $first.$s->id.$last;
        $hasil .= '<tr class="text-center">';
        $hasil .= '<td>'.$a.'</td>';
        $hasil .= '<td>'.$this->customlib->format_date_indonesia($s->tgl_lapor).'</td>';
        $hasil .= ' <td>'. $s->nama_barang .'</td>';
        $hasil .= '<td>'. $s->divisi.'</td>';
        if($s->status == 0){
          $hasil .= '<td>Terlapor</td>';
        }else{
          $hasil .= '<td>Telah Diperbaiki</td>';
        }
        $hasil .= '<td class="td-actions text-right">';
        $hasil .= '<a href="'. base_url('detail-laporan/'.$id).'" rel="tooltip" class="btn btn-info" data-toggle="tooltip" data-placement="left" title="Lihat Laporan Kerusakan"><i class="material-icons">info</i></a>';
        $hasil .= '<a href="'. base_url('edit-laporan/'.$id).'" rel="tooltip" class="btn btn-success mr-1 ml-1" data-toggle="tooltip" data-placement="top" title="Edit Laporan Kerusakan"><i class="material-icons">edit</i></a>';
        $hasil .= '<a rel="tooltip" class="btn btn-danger hapus-laporan" data-toggle="tooltip" data-placement="bottom" title="Hapus Laporan" laporan-id="'.$id.'"><i class="material-icons" style="color:#fff">close</i></a>';
        $hasil .= '</td></tr>';
        $a++;
    }
    echo $hasil;
  }
}
