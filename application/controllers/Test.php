<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test extends MY_Controller {
  public function __construct(){

    parent:: __construct();
    $this->load->helper('my_helper');
  }
  public function index(){
    $data['sidebar_color'] = 'purple';
    $data['page_name'] = 'test upload';
    $data['header'] = 'template/header.php';
    $data['t_foot'] = 'page/outmail/footer_outmail.php';
    $data['content'] = 'page/test.php';
    $this->load->view('template/main', $data);
  }
  //UPDATE DATABASE DIREKTORI SCAN SURAT
  public function postTestUpload(){

    $mail_id = $this->input->post('mail_id');
    $page = $this->input->post('page');
    $timestamp = date("Y-m-d H:i:s", time());

    $config['upload_path']          = UPLOAD_PATH;
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
      redirect(site_url('test'));
    }
    else{

      $this->setFlash('success','Berhasil', 'Berhasil Upload');
      redirect(site_url('test'));
    }
  }
}
