<?php
class User extends MY_Controller {
  public function __construct(){
    parent:: __construct();
    $this->load->model('user_model');
  }

  public function login(){
    $this->load->view("login");
  }

  public function logout(){
    $this->session->sess_destroy();
    redirect(site_url('user/login'));
  }

  public function penggunaMasuk(){
    $username = $this->input->post('username');
    $password = md5(filter_var($this->input->post('password'), FILTER_SANITIZE_STRING));
    // echo $username.$password;
    // die();
    $verifikasiUser = $this->user_model->loginUser($username,$password)->row();
    if(!empty($verifikasiUser)){
      $data_session = array(
        'user_level' => $verifikasiUser->user_level,
        'user_name' => $verifikasiUser->user_name,
        'username' => $verifikasiUser->username,
        'user_id' => $verifikasiUser->user_id
      );
      $this->session->set_userdata($data_session);
      echo 1;
    }else{
      echo 0;
    }
  }

  //================================================
  //AKSES
  //================================================
  public function indexAkses(){
    $this->isLogged();
    $search_key = $this->input->get('search_key');

    if (empty($search_key)) {
      $listPengguna = $this->user_model->getUser('user_level!=0')->result();
    }else {
      $listPengguna = $this->user_model->getUser('user_level!=0', $search_key)->result();
    }

    $data['search_key'] = $search_key;
    $data['listPengguna'] = $listPengguna;
    $data['sidebar_color'] = 'orange';
    $data['page_name'] = 'Akses';
    $data['header'] = 'template/header.php';
    $data['t_foot'] = 'page/user/t_foot.php';
    $data['content'] = 'page/user/index.php';
    $this->load->view('template/main', $data);
  }

  public function buatAkses(){
    $this->isLogged();

    $data['sidebar_color'] = 'orange';
    $data['page_name'] = 'Tambah Akses';
    $data['header'] = 'template/header.php';
    $data['t_foot'] = 'page/user/t_foot.php';
    $data['content'] = 'page/user/new_user.php';
    $this->load->view('template/main', $data);
  }

  public function postBuatAkses(){
    $this->isLogged();

    $name = $this->input->post('name');
    $username = $this->input->post('username');
    $email = $this->input->post('email');
    $level = $this->input->post('level');
    $password = $this->input->post('password');

    $insert_data = [
      'username' => $username,
      'user_name' => $name,
      'user_email' => $email,
      'user_password' => md5(filter_var($password, FILTER_SANITIZE_STRING)),
      'user_level' => $level,
      'deleted' => 0,
      'created_at' => date('Y-m-d H:i:s')
    ];

    if ($this->user_model->insertUser($insert_data)) {
      echo 'Sukses';
    }else {
      echo 'Gagal menambahkan data';
    }
  }

  public function ubahAkses($user_id){
    $this->isLogged();

    $data['user'] = $this->user_model->getUser(['user_id'=>$user_id])->row();

    $data['sidebar_color'] = 'orange';
    $data['page_name'] = 'Ubah Akses';
    $data['header'] = 'template/header.php';
    $data['t_foot'] = 'page/user/t_foot.php';
    $data['content'] = 'page/user/edit_user.php';
    $this->load->view('template/main', $data);
  }

  public function postUbahAkses(){
    $this->isLogged();
    $user_id = $this->input->post('user_id');
    $name = $this->input->post('name');
    $username = $this->input->post('username');
    $email = $this->input->post('email');
    $level = $this->input->post('level');
    $password = $this->input->post('password');

    if (empty($password)) {
      $update_data = [
        'user_name' => $name,
        'username' => $username,
        'user_email' => $email,
        'user_level' => $level,
      ];
    }else{
      $update_data = [
        'user_name' => $name,
        'username' => $username,
        'user_email' => $email,
        'user_level' => $level,
        'user_password' => md5(filter_var($password, FILTER_SANITIZE_STRING)),
      ];
    }
    if ($this->user_model->updateUser(['user_id'=>$user_id],$update_data)) {
      echo 'Sukses';
    }else {
      echo 'Gagal menambahkan data';
    }
  }

  public function detailAkses($user_id){
    $this->isLogged();

    // $user_id =  $this->session->userdata('user_id');
    $data['user'] = $this->user_model->getUser(['user_id'=>$user_id])->row();

    $data['sidebar_color'] = 'orange';
    $data['page_name'] = 'Detail Akses';
    $data['header'] = 'template/header.php';
    $data['t_foot'] = 'template/footer.php';
    $data['content'] = 'page/user/profil.php';
    $this->load->view('template/main', $data);
  }

  public function deleteAkses(){
    $user_id = $this->input->post('user_id');
    if (empty($user_id)) {
      echo 'User tidak ditemukan';
    }else{
      if ($this->user_model->deletePegawai($user_id)) {
        echo 'Sukses';
      }else {
        echo 'Gagal menghapus akses';
      }
    }
  }

  public function postEditProfil(){
    $this->isLogged();

    $user_id =  $this->session->userdata('user_id');
    $user = $this->user_model->selectUser($user_id);
    $old_password = $this->input->post('old_password');
    $new_password1 = $this->input->post('new_password1');
    $new_password2 = $this->input->post('new_password2');

    if (md5(filter_var($old_password, FILTER_SANITIZE_STRING)) == $user->user_password) {

      if ($new_password1 == $new_password2) {
        $update = $this->user_model->updateUser(['user_id'=> $user_id], array('user_password' => md5(filter_var($new_password1, FILTER_SANITIZE_STRING))));
        if ($update == true) {
          $this->setFlash('success','Success', 'Passsword berhasil dirubah');
          redirect(site_url('profil'));
        }else {
          $this->setFlash('error','Failed', 'Gagal Mengganti Password');
          redirect(site_url('profil'));
        }
      }else{
        $this->setFlash('error','Failed', 'Password Baru tidak sama');
        redirect(site_url('profil'));
      }
    }else{
      $this->setFlash('error','Failed', 'Password Lama tidak sesuai');
      redirect(site_url('profil'));
    }
    $this->user_model->updateUser(['user_id'=> $user_id]);
  }

  //================================================
  //PEGAWAI
  //================================================
  public function indexPegawai(){
    $this->isLogged();
    $search_key = $this->input->get('search_key');
    if (empty($search_key)) {
      $listPengguna = $this->user_model->getPegawai()->result();
    }else{
      $listPengguna = $this->user_model->getPegawai('',$search_key)->result();
    }

    $data['search_key'] = $search_key;
    $data['listPengguna'] = $listPengguna;
    $data['sidebar_color'] = 'danger';
    $data['page_name'] = 'Data Pegawai';
    $data['header'] = 'template/header.php';
    $data['t_foot'] = 'page/user/pegawai/t_foot.php';
    $data['content'] = 'page/user/pegawai/index.php';
    $this->load->view('template/main', $data);
  }

  public function detailPegawai($user_id){
    $this->isLogged();
    $user = $this->user_model->getPegawai(['user_id'=>$user_id])->row();
    $data['user'] = $user;
    $data['sidebar_color'] = 'danger';
    $data['page_name'] = 'Detail Pegawai';
    $data['header'] = 'template/header.php';
    $data['t_foot'] = 'page/user/pegawai/t_foot.php';
    $data['content'] = 'page/user/pegawai/detail.php';
    $this->load->view('template/main', $data);
  }

  public function buatPegawai(){
    $this->isLogged();

    $data['ranks'] = $this->user_model->getRank()->result();

    $data['sidebar_color'] = 'danger';
    $data['page_name'] = 'Tambah Pegawai';
    $data['header'] = 'template/header.php';
    $data['t_foot'] = 'page/user/pegawai/t_foot.php';
    $data['content'] = 'page/user/pegawai/new_pegawai.php';
    $this->load->view('template/main', $data);
  }

  public function postBuatPegawai(){
    $this->isLogged();

    $name = $this->input->post('name');
    $nip = $this->input->post('nip');
    $position = $this->input->post('position');
    $functional = $this->input->post('functional');
    $rank = $this->input->post('rank');
    $address = $this->input->post('address');
    $education = $this->input->post('education');
    $email = $this->input->post('email');

    $insert_data = [
      'user_name' => $name,
      'user_nip' => $nip,
      'user_email' => $email,
      'user_rank' => $rank,
      'user_address' =>$address,
      'user_position' => $position,
      'user_functional' => $functional,
      'user_education' => $education,
      'user_level' => 0,
      'deleted' => 0,
      'created_at' => date('Y-m-d H:i:s')
    ];

    if ($this->user_model->insertUser($insert_data)) {
      echo 'Sukses';
    }else {
      echo 'Gagal menambahkan data';
    }
  }

  public function uploadBuatPegawai(){
    $this->isLogged();

    $data['ranks'] = $this->user_model->getRank()->result();

    $data['sidebar_color'] = 'rose';
    $data['page_name'] = 'Upload File Pegawai';
    $data['header'] = 'template/header.php';
    $data['t_foot'] = 'page/user/pegawai/t_foot.php';
    $data['content'] = 'page/user/pegawai/upload_excel_pegawai.php';
    $this->load->view('template/main', $data);
  }

  public function postUploadBuatPegawai(){
    $this->isLogged();

    $config['upload_path'] = UPLOAD_PATH_PEGAWAI;
    $config['allowed_types'] = 'xlsx';
    $config['max_size'] = '10000';
    $config['overwrite'] = true;
    $this->load->library('upload', $config);

    if ( ! $this->upload->do_upload('file-excel')) {
      // jika validasi file gagal, kirim parameter error ke index
      $error = $this->upload->display_errors();
      print_r($error);
    } else {
      include APPPATH.'third_party/PHPExcel/PHPExcel.php';

      $excelreader = new PHPExcel_Reader_Excel2007();
      $loadexcel = $excelreader->load(UPLOAD_PATH_PEGAWAI.$_FILES['file-excel']['name']); // Load file yang telah diupload ke folder excel
      $sheet = $loadexcel->getActiveSheet()->toArray(null, true, true ,true);

      $data = array();
      $numrow = 1;
      foreach($sheet as $row){
        if($numrow > 3){
          if (!empty($row['B'])) {
            array_push($data, array(
              'user_nip'=>$row['A'],
              'user_name'=>$row['B'],
              'user_position'=>$row['C'],
              'user_functional'=>$row['D'],
              'user_rank'=>$row['E'],
              'user_address'=>$row['F'],
              'user_education'=>$row['G'],
              'user_email'=>$row['H'],
              'user_level'=>0,
              'created_at' => date('Y-m-d H:i:s')
            ));
          }
        }
        $numrow++;
      }
      $insert_to_db = $this->user_model->insert_multiple($data);
      if($insert_to_db == true){
        echo 'Sukses';
      }else{
        print_r($insert_to_db);
      }
    }
  }

  public function ubahPegawai($user_id){
    $this->isLogged();

    $data['user'] = $this->user_model->getPegawai(['user_id' => $user_id])->row();
    $data['ranks'] = $this->user_model->getRank()->result();

    $data['sidebar_color'] = 'danger';
    $data['page_name'] = 'Ubah Pegawai';
    $data['header'] = 'template/header.php';
    $data['t_foot'] = 'page/user/pegawai/t_foot.php';
    $data['content'] = 'page/user/pegawai/edit_pegawai.php';
    $this->load->view('template/main', $data);
  }

  public function postUbahPegawai(){
    $this->isLogged();
    $user_id = $this->input->post('user_id');
    $name = $this->input->post('name');
    $nip = $this->input->post('nip');
    $position = $this->input->post('position');
    $functional = $this->input->post('functional');
    $rank = $this->input->post('rank');
    $address = $this->input->post('address');
    $education = $this->input->post('education');
    $email = $this->input->post('email');

    $update_data = [
      'user_name' => $name,
      'user_nip' => $nip,
      'user_email' => $email,
      'user_rank' => $rank,
      'user_position' => $position,
      'user_functional' => $functional,
      'user_education' => $education,
      'user_address' => $address,
    ];

    if ($this->user_model->updateUser(['user_id'=>$user_id],$update_data)) {
      echo 'Sukses';
    }else {
      echo 'Gagal menambahkan data';
    }
  }

  public function deletePegawai(){
    $user_id = $this->input->post('user_id');
    if (empty($user_id)) {
      echo 'User tidak ditemukan';
    }else{
      if ($this->user_model->deletePegawai($user_id)) {
        echo 'Sukses';
      }else {
        echo 'Gagal menghapus pegawai';
      }
    }

  }

  // public f
}

?>
