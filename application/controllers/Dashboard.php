<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MY_Controller {
  public function __construct()
  {
    parent:: __construct();
    $this->load->model('sensor_model');
  }

  public function index(){
    $data['profil'] = $this->sensor_model->getProfil('id=1')->row();
    $data['page_name'] = 'Dashboard';
    $data['sensors'] = $this->sensor_model->getSensor()->result();
    // print_r($data);
    $data['t_foot'] = 'page/dashboard/t_foot.php';
    $this->load->view('page/dashboard/dashboard', $data);
  }

  public function getData(){
    $sensor = $this->sensor_model->getData()->result();
    print_r($sensor);
    // return $sensor;
  }

  public function getThreshold(){
    $sensor = $this->sensor_model->getProfil()->row();
    echo $sensor->green_top.','.$sensor->green_down.','.$sensor->yellow_top.','.$sensor->yellow_down.','.$sensor->red_top.','.$sensor->red_down;
  }
}
