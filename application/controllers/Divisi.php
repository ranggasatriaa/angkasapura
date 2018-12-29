<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Divisi extends MY_Controller {
    public function __construct()
    {
      parent:: __construct();
      $this->load->helper('url');
      $this->load->model('inmail_model');
      $this->load->model('user_model');
      $this->load->library('session');


    }
}
