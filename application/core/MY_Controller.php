<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Controller extends CI_Controller{
  function __construct(){
    parent::__construct();
    $this->load->helper('url');
    $this->load->library('session');
    // $this->load->library('Pdf');
    date_default_timezone_set('asia/jakarta');
  }

  //SET NOTIFIKASI KE HALAMAN SELANJUTNYA
  public function setFlash($type,$alert, $subtitle){
    $this->session->set_flashdata(array('alert'=>$alert, 'message'=>$subtitle, 'type'=>$type));
  }

  //CEK APAKAH SUDAH LOGIN
  public function isLogged(){
    if(!$this->session->userdata('user_level') && !$this->session->userdata('user_name') && !$this->session->userdata('user_id') ){
      echo "<script>alert('Login terlebih dahulu')</script>";
      redirect(site_url(''));
    }else {
      if ($this->uri->segment(1) == '') {
        $this->setFlash('warning', 'Anda sudah Login','');
        redirect(site_url('dashboard'));
      }
    }
  }
}
