<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Outmail extends MY_Controller {
  public function __construct(){

    parent:: __construct();
    $this->load->model('outmail_model');
    $this->load->model('user_model');
    $this->load->helper('my_helper');
  }
  //MAANAMPILKAN HALAMAN UTAMA SURAT KELUAR
  public function index(){
    $this->isLogged();
    // $this->setFlash('success','titlenya', 'subtitlenya');
    $search_key = $this->input->get('search_key');
    if (empty($search_key)) {
      $data['mails'] = $this->outmail_model->index();
    }else {
      $data['mails'] = $this->outmail_model->index($search_key);
    }

    $data['search_key'] = $search_key;
    $data['types'] = $this->outmail_model->getMailType(['parent_id'=>null])->result();
    $data['sidebar_color'] = 'danger';
    $data['page_name'] = 'Surat Keluar';
    $data['header'] = 'template/header.php';
    $data['t_foot'] = 'page/outmail/t_foot.php';
    $data['content'] = 'page/outmail/index.php';
    $this->load->view('template/main', $data);
  }

  //MENAMPILKAN FORM BUAT SURAT KELUAR BARU
  public function buatSurat($type_id){
    $this->isLogged();

    $data['sections'] = $this->outmail_model->getMailSection(['mail_type'=>$type_id])->result();
    $data['pegawais'] = $this->user_model->getPegawai(['user.deleted'=>0])->result();
    $type = $this->outmail_model->getMailType(['id'=>$type_id])->row();

    $data['sidebar_color'] = 'danger';
    $data['page_name'] = 'Buat '.$type->name;
    $data['header'] = 'template/header.php';
    $data['t_foot'] = 'page/outmail/t_foot.php';
    $data['content'] = 'page/outmail/new_mail.php';
    $this->load->view('template/main', $data);
  }

  public function postBuatSurat(){
    $mail_type =  $this->input->post('mail_type');
    if (empty($this->input->post('perihal'))) {
      $subject = $this->input->post('kegiatan');
    }else {
      $subject = $this->input->post('perihal');
    }
    $number = $this->input->post('nomor');
    $date = $this->input->post('tanggal');
    $sections = $this->outmail_model->getMailSection(['mail_type'=>$mail_type])->result();

    $outmailData = [
      'mail_type' => $mail_type,
      'mail_date' => $date,
      'mail_number' => $number,
      'mail_subject' => $subject,
      'deleted' => 0,
      'created_at' => date('Y-m-d H:i:s')
    ];
    $insertMail = $this->outmail_model->insertSuratKeluar($outmailData);

    //INSERT TO MAIL_CONTENT
    if ($insertMail == true) {
      $mail_id = $this->db->insert_id();

      foreach ($sections as $section) {
        if ($section->type == 'pegawaihonor') {
          $pegawaihonor = $this->input->post('pegawaihonor');
          $lenght = count($pegawaihonor);
          $jam = $this->input->post('jam');
          $honor = $this->input->post('honor');
          for ($i=0; $i < $lenght ; $i++) {
            $content = $pegawaihonor[$i].'|'.$jam[$i].'|'.$honor[$i];
            $contentData = [
              'section_id' => $section->id,
              'mail_id' => $mail_id,
              'content' => $content,
              'order' => $i+1,
              'deleted' => 0,
              'created_at' => date('Y-m-d H:i:s')
            ];
            // print_r($contentData);
            $insertContent = $this->outmail_model->insertMailContent($contentData);
          }
        }else{
          $content = $this->input->post($section->code);

          if (is_array($content)) {
            $i=1;
            foreach ($content as $content) {
              $contentData = [
                'section_id' => $section->id,
                'mail_id' => $mail_id,
                'content' => $content,
                'order' => $i,
                'deleted' => 0,
                'created_at' => date('Y-m-d H:i:s')
              ];
              $insertContent = $this->outmail_model->insertMailContent($contentData);

              if ($insertContent == false) {
                echo 'Gagal masukkan data'.ucwords($section->name);
                die();
              }
              $i++;
            }
          }else{
            // $data[] =  $this->input->post($section->code);
            $contentData = [
              'section_id' => $section->id,
              'mail_id' => $mail_id,
              'content' => $content,
              'order' => 1,
              'deleted' => 0,
              'created_at' => date('Y-m-d H:i:s')
            ];
            $insertContent = $this->outmail_model->insertMailContent($contentData);

            if ($insertContent == false) {
              echo 'Gagal masukkan data'.ucwords($section->name);
              die();
            }
          }
        }
      }
      echo 'Sukses';
    }else {
      echo 'Gagal membuat surat baru';
    }
  }

  public function exportFile($mail_id, $type_id=null){
    $this->isLogged();

    $mail = $this->outmail_model->detailSurat($mail_id);
    if ($type_id != null) {
      $type = $this->outmail_model->getMailType(['id'=>$type_id])->row();
      $data['content'] = 'page/outmail/template/'.$type_id;
    }else {
      $type = $this->outmail_model->getMailType(['id'=>$mail->mail_type])->row();
      $data['content'] = 'page/outmail/template/'.$mail->mail_type;
    }
    $contents = $this->outmail_model->getMailContent(['mail_id'=>$mail->mail_id])->result();

    foreach ($contents as $content) {
      if ($content->type == 'multiple') {
        $data[$content->code][] = $content->content;
      }else if ($content->type == 'pegawai') {
        list($nama, $nip, $position, $functional, $pangkat) = preg_split("/[|]+/", $content->content);
        $data[$content->code]['nama'] = $nama;
        $data[$content->code]['nip'] = view_nip($nip);
        if (strpos(strtolower($position), 'kepala') !== false) {
          $data[$content->code]['jabatan'] = $position;
        }else {
          if ($functional == '-') {
            $data[$content->code]['jabatan'] = $position;
          }else {
            $data[$content->code]['jabatan'] = $functional.' pada '.$position;
          }
        }
        $data[$content->code]['pangkat'] = $pangkat;
      }else if($content->type == 'pegawaihonor' || $content->type == 'personil'){
        $data[$content->code][] = $content->content;
        // list($nama, $nip, $position, $functional, $pangkat, $jam, $honor) = preg_split("/[|]+/", $content->content);
        // $data[$content->code]['nama'] = $nama;
        // $data[$content->code]['nip'] = view_nip($nip);
        // if (strpos(strtolower($position), 'kepala') !== false) {
        //   $data[$content->code]['jabatan'] = $position;
        // }else {
        //   if ($functional == '-') {
        //     $data[$content->code]['jabatan'] = $position;
        //   }else {
        //     $data[$content->code]['jabatan'] = $functional.' pada '.$position;
        //   }
        // }
        // $data[$content->code]['pangkat'] = $pangkat;
        // $data[$content->code]['jam'] = $jam;
        // $data[$content->code]['honor'] = $honor;
      }
      else {
        $data[$content->code] = $content->content;
      }
    }

    if (!empty($data['perihal'])) {
      $data['title'] = $mail->name.' '.$data['perihal'];
    }else if (!empty($data['kegiatan'])) {
      $data['title'] = $mail->name.' '.$data['kegiatan'];
    }else {
      $data['title'] = $mail->name;
    }
    $data['export_type'] = $type->export_type;
    // print_r($data);
    // die();
    $this->load->view('page/outmail/export_word', $data);
  }

  //DETAIL SURAT Keluar
  public function detailSurat($mail_id){
    $this->isLogged();

    $data['mail'] = $this->outmail_model->detailSurat($mail_id);

    $data['images'] = $this->outmail_model->getMailImage(['mail_id'=>$mail_id])->result();
    $data['sidebar_color'] = 'danger';
    $data['page_name'] = 'Detail Surat Keluar';
    $data['header'] = 'template/header.php';
    $data['t_foot'] = 'page/outmail/t_foot.php';
    $data['content'] = 'page/outmail/detail_mail.php';
    $this->load->view('template/main', $data);
  }

  //HALAMAN UPLOAD SCAN SURAT
  public function uploadSurat($mail_id){
    $this->isLogged();

    $data['mail_id'] = $mail_id;
    $data['images'] = $this->outmail_model->getMailImage(['mail_id'=>$mail_id])->result();
    $data['sidebar_color'] = 'danger';
    $data['page_name'] = 'Upload File Surat Keluar';
    $data['header'] = 'template/header.php';
    $data['t_foot'] = 'page/outmail/t_foot.php';
    $data['content'] = 'page/outmail/upload_surat.php';
    $this->load->view('template/main', $data);
  }

  //UPDATE DATABASE DIREKTORI SCAN SURAT
  public function postuploadSurat(){
    $this->isLogged();

    $mail_id = $this->input->post('mail_id');
    $page = $this->input->post('page');
    $timestamp = date("Y-m-d H:i:s", time());

    $config['upload_path']          = UPLOAD_PATH_OUTMAIL;
    $config['allowed_types']        = 'gif|jpg|png|jpeg';
    $config['file_name']            = $mail_id.'-'.$page.'-'.$_FILES['userfile']['name'];
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
    if (!$this->upload->do_upload('userfile'))
    {
      $_POST['error'] = $this->upload->display_errors();;
      $this->setFlash('error','Gagal Upload', $this->upload->display_errors());
      redirect(site_url('outmail/uploadSurat/'.$mail_id));
    }
    else{
      //PEMBUATAN DATA PER ITEM UNTUK SEMUA ITEM DATA FILE UPLOAD
      $file_name = $this->upload->data('file_name');
      // echo $file_name;
      // die();
      $datas = $this->upload->data();
      // print_r($datas);
      // die();
      $param_insert = array(
        'mail_id' => $mail_id,
        'directory' => $file_name,
        'page' => $page,
        'deleted' => 0,
        'created_at' => $timestamp,
      );
      $insert = $this->outmail_model->insertMailImage($param_insert);
      if($insert == true){
        $this->setFlash('success','Berhasil', 'Berhasil Upload');
        redirect(site_url('outmail/uploadSurat/'.$mail_id));
      }else{
        $this->setFlash('error','Gagal Upload', $this->upload->display_errors());
        redirect(site_url('outmail/uploadSurat/'.$mail_id));
      }
    }
  }

  public function cancelUpload($image_id){
    $this->isLogged();

    $image = $this->outmail_model->getMailImage(['id'=>$image_id])->row();
    $path = UPLOAD_PATH_OUTMAIL.$image->directory;
    $this->outmail_model->destroyMailImage(['id'=>$image->id]);
    unlink($path);
    redirect(site_url('outmail/uploadSurat/'.$image->mail_id));
  }

  //MENGUBAH SURAT KELUAR
  public function editSurat($mail_id){
    $this->isLogged();
    $mail = $this->outmail_model->getMail(['mail_id'=>$mail_id])->row();
    $data['mail_id'] = $mail_id;
    $data['image'] = $this->outmail_model->getMailImage(['mail_id'=>$mail_id])->result();
    $data['sections'] = $this->outmail_model->getMailSection(['mail_type'=>$mail->mail_type])->result();
    $data['pegawais'] = $this->user_model->getPegawai()->result();
    $data['contents'] = $this->outmail_model->getMailContent(['mail_id'=>$mail->mail_id])->result();

    $data['sidebar_color'] = 'danger';
    $data['page_name'] = 'Perbaiki Surat Keluar';
    $data['header'] = 'template/header.php';
    $data['t_foot'] = 'page/outmail/t_foot.php';
    $data['content'] = 'page/outmail/edit_mail.php';
    $this->load->view('template/main', $data);
  }

  //MENGUBAH DATABASE UNTUK PERUBAHAN SURAT KELUAR
  public function postEditSurat(){
    $this->isLogged();

    $mail_id = $this->input->post('mail_id');

    $mail_type =  $this->input->post('mail_type');
    $subject = $this->input->post('perihal');
    $number = $this->input->post('nomor');
    $date = $this->input->post('tanggal');
    $contents = $this->outmail_model->getMailContent(['mail_id'=>$mail_id])->result();

    $outmailData = [
      'mail_date' => $date,
      'mail_number' => $number,
      'mail_subject' => $subject
    ];
    $updateMail = $this->outmail_model->updateSuratKeluar('mail_id', $mail_id, $outmailData);

    if ($updateMail == true) {
      foreach ($contents as $content) {
        // echo $this->input->post($section->code);
        if ($content->type=='multiple') {
          $isi = $this->input->post($content->code.$content->content_order);
        }else {
          $isi = $this->input->post($content->code);
        }
        // $contentData = [
        //   // 'section_id' => $content->id,
        //   // 'mail_id' => $mail_id,
        //   'content' => $isi,
        // ];
        // //
        // print_r($contentData);
        // echo $mail_id .'-'. $content->section_id .'-'. $isi.'] [';
        // echo "MAILID: ".$mail_id;
        // echo 'SECTIONID: '.$content->id;
        $updateContent = $this->outmail_model->updateMailContent(['mail_id'=>$mail_id, 'section_id'=>$content->section_id], ['content' => $isi]);
        //
        // if ($updateContent == false) {
        //   echo 'Gagal masukkan data'.ucwords($content->name);
        //   die();
        // }
      }
      echo 'Sukses';
    }else {
      echo 'Gagal mengubah surat';
    }
  }

  //MENGHAPUS DATA SURAT DARI DATABASE
  public function deleteSurat(){
    $this->isLogged();
    $mail_id = $this->input->post('mail_id');

    if ($this->outmail_model->deleteSuratKeluar($mail_id)){

      if($this->outmail_model->deleteMailContent($mail_id) || $this->outmail_model->deleteMailImage($mail_id) ) {
        echo 'Sukses';
      }else {
        echo "Gagal Menghapus!";
      }
    }else {
      echo 'Gagal Menghapus !!';
    }
  }

}
