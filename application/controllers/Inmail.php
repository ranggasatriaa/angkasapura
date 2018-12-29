<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inmail extends MY_Controller {
  public function __construct()
  {
    parent:: __construct();
    $this->load->helper('url');
    $this->load->model('inmail_model');
    $this->load->model('user_model');
    $this->load->library('session');


  }
  public function index(){
    $this->isLogged();

    $listSuratMasuk = $this->inmail_model->index();
    // die(var_dump($listSuratMasuk->result()));
    $data['listSurat'] = $listSuratMasuk->result();
    $data['sidebar_color'] = 'azure';
    $data['page_name'] = 'Surat Masuk';
    $data['t_foot'] = 'page/inmail/t_foot.php';
    $data['content'] = 'page/inmail/in_mail.php';
    $this->load->view('template/main', $data);
  }

  public function buatSurat(){
    $this->isLogged();

    $level = '';
    $listUser = $this->user_model->pilihLevel();

    $data['user'] = $listUser->result();
    $data['sidebar_color'] = 'azure';
    $data['page_name'] = 'Buat Data Surat Masuk';
    $data['t_foot'] = 'page/inmail/t_foot.php';
    $data['content'] = 'page/inmail/new_mail.php';
    $this->load->view('template/main', $data);
  }

  public function buatSuratBaru(){
    $this->isLogged();

    $nosurat = addslashes(htmlentities($this->input->post('nomorSurat')));
    $subjek = addslashes(htmlentities($this->input->post('subjekSurat')));
    $tglsurat = date('Y-m-d', strtotime($this->input->post('tanggalKirim')));
    $pengirim = addslashes(htmlentities($this->input->post('pengirimSurat')));
    $penerima = addslashes(htmlentities($this->input->post('penerimaSurat')));
    $isisurat = addslashes(htmlentities($this->input->post('isiSuratMasuk')));

    $in =  $this->inmail_model->getCurrentAI();
    $id_newinmail = $in['AUTO_INCREMENT'];
    date_default_timezone_set("Asia/Jakarta");
    $timestamp = date('y-m-d-H-i-s');

    $config['upload_path']          = UPLOAD_PATH_INMAIL;
    $config['allowed_types']        = 'gif|jpg|png|jpeg';
    $config['file_name']            = $nosurat.'-'.$timestamp.'-'.$_FILES['gambar-surat']['name'];
    $config['max_size']             = 2048;
    $config['overwrite']            = TRUE;
    $config['encrypt_name']         = FALSE;
    $config['remove_spaces']        = TRUE;
    if ( ! is_dir($config['upload_path']) ){
      die("THE UPLOAD DIRECTORY DOES NOT EXIST");
    }

    //upload to directory
    $this->load->library('upload', $config);

    if (!$this->upload->do_upload('gambar-surat')){
      die($this->upload->display_errors());
    }else{
      $file_name = $this->upload->data('file_name');
      $datas = $this->upload->data();
      $data = array(
        'nomor' => $nosurat,
        'tanggal' => $tglsurat,
        'dari' => $pengirim,
        'untuk' => $penerima,
        'perihal' => $subjek,
        'isi' => $isisurat,
        'gambar' => $file_name
      );
      // insert into db
      $insertSuratMasuk = $this->inmail_model->insert_data_surat($data,'inmail');
      if ($insertSuratMasuk == true){
        echo 1;
      } else{
        echo 'Gagal membuat surat karena database bermasalah';
      }
    }
  }

  public function detailSurat($id){
    $this->isLogged();

    $length = strlen($id);
    $length = $length-15;
    $id_surat = substr($id,5,$length);

    $detailSurat = $this->inmail_model->detailSurat($id_surat);
    $data['detailsurat'] = $detailSurat->row();
    $data['sidebar_color'] = 'azure';
    $data['page_name'] = 'Data Surat Masuk';
    $data['t_foot'] = 'page/inmail/t_foot.php';
    $data['content'] = 'page/inmail/view_inmail.php';
    $this->load->view('template/main', $data);
  }

  public function updateDisposisi(){
    $this->isLogged();

    $user_level = $this->session->userdata('user_level');
    $disposisi_id = $this->input->post('disposisi_id');
    $mail_id = $this->input->post('mail_id');
    $message = $this->input->post('message');
    $status = $this->input->post('status');

    $updateStatus = $this->inmail_model->updateStatusSurat($mail_id,$disposisi_id,$message);
    if ($updateStatus){
      redirect(site_url('dashboard'));
    }else{
      redirect(site_url('dashboard'));
    }
  }

  public function editSurat($id){
    $this->isLogged();

    $length = strlen($id);
    $length = $length-15;
    $id_surat = substr($id,5,$length);
    $detailSurat = $this->inmail_model->detailSurat($id_surat);
    // $disposisi = $this->inmail_model->detailDisposisi($id);
    $level = 2;
    $listUser = $this->user_model->pilihLevel($level);
    $data['detailsurat'] = $detailSurat->row();
    // $data['detaildisposisi'] = $disposisi->row();
    $data['user'] = $listUser->result();
    $data['sidebar_color'] = 'azure';
    $data['page_name'] = 'Perharui Data Surat Masuk';
    $data['t_foot'] = 'page/inmail/t_foot.php';
    $data['content'] = 'page/inmail/edit_inmail.php';
    $this->load->view('template/main', $data);
  }

  //UPDATE DATABASE DIREKTORI SCAN SURAT
  public function insertFile(){
    $this->isLogged();

    $id = $this->input->post('id');
    $timestamp = date("Y-m-d H:i:s", time());

    $config['upload_path']          = UPLOAD_PATH_INMAIL;
    $config['allowed_types']        = 'gif|jpg|png|jpeg';
    $config['file_name']            = $id.'-'.$_FILES['userfile']['name'];
    $config['max_size']             = 2048;
    $config['overwrite']            = TRUE;
    $config['encrypt_name']         = FALSE;
    $config['remove_spaces']        = TRUE;
    if ( ! is_dir($config['upload_path']) ){
      die("THE UPLOAD DIRECTORY DOES NOT EXIST");
    }

    //PROSES UPLOAD
    $this->load->library('upload', $config);
    //KONDISI JIKA UPLOAD GAGAL
    if (!$this->upload->do_upload('userfile')){
      $_POST['error'] = $this->upload->display_errors();;
      $this->setFlash('error','Gagal Upload', $this->upload->display_errors());
      redirect(site_url('inmail/edit_inmail/'.$id));
    }
    else{
      //PEMBUATAN DATA PER ITEM UNTUK SEMUA ITEM DATA FILE UPLOAD
      $file_name = $this->upload->data('file_name');
      // echo $file_name;
      // die();
      $datas = $this->upload->data();
      // print_r($datas);
      // die();
      $update = $this->inmail_model->updateFileInmail($id, $file_name);
      if($update == true){
        // $this->setFlash('success','Berhasil', 'Berhasil Upload');
        redirect(site_url('inmail/detailsurat/'.$id));
      }else{
        // $this->setFlash('error','Gagal Upload', $this->upload->display_errors());
        redirect(site_url('inmail/edit_inmail/'.$id));
      }
    }
  }

  public function updateDataSurat(){
    $this->isLogged();

    $nosurat = addslashes(htmlentities($this->input->post('nomor-surat')));
    $subjek = addslashes(htmlentities($this->input->post('subjek-surat')));
    $tglsurat = date('Y-m-d', strtotime($this->input->post('tanggal-kirim')));
    $pengirim = addslashes(htmlentities($this->input->post('pengirim-surat')));
    $penerima = addslashes(htmlentities($this->input->post('penerima-surat')));
    $isisurat = addslashes(htmlentities($this->input->post('isi-surat-masuk')));
    $id = addslashes(htmlentities($this->input->post('id-surat')));
    $length = strlen($id);
    $length = $length-15;
    $id_surat = substr($id,5,$length);
    date_default_timezone_set("Asia/Jakarta");
    $timestamp = date('y-m-d-H-i-s');

    $config['upload_path']          = UPLOAD_PATH_INMAIL;
    $config['allowed_types']        = 'gif|jpg|png|jpeg|JPG|JPEG|PNG';
    $config['file_name']            = $nosurat.'-'.$_FILES['foto-surat-masuk']['name'];
    $config['max_size']             = 2048;
    $config['overwrite']            = TRUE;
    $config['encrypt_name']         = FALSE;
    $config['remove_spaces']        = TRUE;
    if ( ! is_dir($config['upload_path']) ){
      die("THE UPLOAD DIRECTORY DOES NOT EXIST");
    }

    //upload to directory
    $this->load->library('upload', $config);

    if (!$this->upload->do_upload('foto-surat-masuk')){
      die($this->upload->display_errors());
    }else{
      $file_name = $this->upload->data('file_name');
      $datas = $this->upload->data();
      $data = array(
        'nomor' => $nosurat,
        'tanggal' => $tglsurat,
        'gambar' => $file_name,
        'isi' => $isisurat,
        'dari' => $pengirim,
        'untuk' => $penerima,
        'perihal' => $subjek,
      );

      $updatedata = $this->inmail_model->updateSuratMasuk($data, $id_surat);
      if($updatedata ==  true){
        echo 1;
      }else{
        echo 'Gagal melakukan memperbarui data surat masuk';
      }
    }
  }

  public function deleteSurat(){
    $this->isLogged();

    $id = $this->input->post('id');
    $length = strlen($id);
    $length = $length-15;
    $id_surat = substr($id,5,$length);
    $delete = $this->inmail_model->deleteInmail($id_surat);
    if($delete == true){
      echo 'Surat Masuk berhasil di hapus';
    }else{
      echo 'Surat Masuk gagal di hapus';
    }
  }

  function deleteHasilScan(){
    $this->isLogged();

    $id = $this->input->post('id');
    $length = strlen($id);
    $length = $length-15;
    $id_surat = substr($id,5,$length);
    $delete = $this->inmail_model->deleteHasilScan($id_surat);
    if($delete == true){
      echo 1;
    }else{
      echo 0;
    }
  }

  function search(){
    $this->isLogged();

    $query = $this->input->post('value');
    $search = $this->inmail_model->search($query)->result();
    $a = 1;
    $hasil = '';
    foreach($search as $s){
      $random = md5(mt_rand(1,10000));
      $first = substr($random,0,5);
      $last = substr($random,5,10);
      $id = $first.$s->id.$last;
      $hasil .= '<tr class="text-center">';
      $hasil .= '<td>'.$a.'</td>';
      $hasil .= '<td>'.$this->customlib->format_date_indonesia($s->tanggal).'</td>';
      $hasil .= ' <td>'. $s->nomor .'</td>';
      $hasil .= '<td>'. $s->perihal.'</td>';
      $hasil .= ' <td>'.$s->dari.'</td>';
      $hasil .= '<td class="td-actions text-right">';
      $hasil .= '<a href="'. base_url('detailsurat/'.$id).'" rel="tooltip" class="btn btn-info" data-toggle="tooltip" data-placement="left" title="Lihat Surat Masuk"><i class="material-icons">info</i></a>';
      $hasil .= '<a href="'. base_url('editsurat/'.$id).'" rel="tooltip" class="btn btn-success mr-1 ml-1" data-toggle="tooltip" data-placement="top" title="Edit Surat Masuk"><i class="material-icons">edit</i></a>';
      $hasil .= '<a rel="tooltip" class="btn btn-danger" data-toggle="tooltip" data-placement="bottom" title="Hapus Surat Masuk" id="hapusInmail" id-inmail="'.$id.'"><i class="material-icons" style="color:#fff">close</i></a>';
      $hasil .= '</td></tr>';
      $a++;
    }
    echo $hasil;
  }
}
