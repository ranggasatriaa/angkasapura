<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Agenda extends MY_Controller {
  function __construct(){
    parent:: __construct();
    $this->load->helper('url');
    $this->load->model('agenda_model');
    $this->load->model('user_model');
    $this->load->library('session');
  }

  // function of agenda kegiatan
  function list_agenda_kegiatan(){
    $this->isLogged();

    $data['list_agenda'] = $this->agenda_model->list_agenda(1)->result();
    $data['sidebar_color'] = 'success';
    $data['page_name'] = 'Daftar Agenda Kegiatan';
    $data['t_foot'] = 'page/agenda/kegiatan/t_foot.php';
    $data['content'] = 'page/agenda/kegiatan/agenda_kegiatan.php';
    $this->load->view('template/main', $data);
  }

  function page_agenda_kegiatan_baru(){
    $this->isLogged();

    $data['sidebar_color'] = 'success';
    $data['page_name'] = 'Daftar Agenda Kegiatan';
    $data['t_foot'] = 'page/agenda/kegiatan/t_foot.php';
    $data['content'] = 'page/agenda/kegiatan/agenda_kegiatan_baru.php';
    $this->load->view('template/main', $data);
  }

  function create_agenda_kegiatan(){
    $this->isLogged();

    $nama = $this->input->post('nama_kegiatan');
    $tgl_mulai = $this->input->post('tanggal_mulai');
    $tgl_selesai = $this->input->post('tanggal_selesai');
    $tempat = $this->input->post('tempat_kegiatan');
    $waktu = $this->input->post('waktu_kegiatan');

    $data = array(
      'nama_kegiatan' => $nama,
      'tanggal_mulai' => $tgl_mulai,
      'tanggal_selesai' => $tgl_selesai,
      'tempat' => $tempat,
      'waktu' => $waktu,
      'jenis' => 1
    );

    $insert = $this->agenda_model->insert_data($data, 'agenda');
    if($insert ==  true){
      echo 1;
    }else{
      echo 0;
    }
  }

  function page_edit_agenda_kegiatan($id){
    $this->isLogged();

    $length = strlen($id);
    $length = $length-15;
    $id_agenda = substr($id,5,$length);

    $agenda = $this->agenda_model->detail_agenda($id_agenda)->row();
    $data['agenda'] = $agenda;
    $data['sidebar_color'] = 'success';
    $data['page_name'] = 'Detail Agenda Kegiatan';
    $data['t_foot'] = 'page/agenda/kegiatan/t_foot.php';
    $data['content'] = 'page/agenda/kegiatan/edit_agenda_kegiatan.php';
    $this->load->view('template/main', $data);
  }

  function update_agenda_kegiatan($id){
    $this->isLogged();

    $length = strlen($id);
    $length = $length-15;
    $id_agenda = substr($id,5,$length);

    $nama = $this->input->post('nama_kegiatan');
    $tgl_mulai = $this->input->post('tanggal_mulai');
    $tgl_selesai = $this->input->post('tanggal_selesai');
    $tempat = $this->input->post('tempat_kegiatan');
    $waktu = $this->input->post('waktu_kegiatan');

    $data = array(
      'nama_kegiatan' => $nama,
      'tanggal_mulai' => $tgl_mulai,
      'tanggal_selesai' => $tgl_selesai,
      'tempat' => $tempat,
      'waktu' => $waktu
    );

    $update = $this->agenda_model->update_agenda('agenda',$data,'id',$id_agenda);
    if($update == true){
      echo 1;
    }else{
      echo 0;
    }
  }

  function delete_agenda(){
    $this->isLogged();

    $id = $this->input->post('id');
    $length = strlen($id);
    $length = $length-15;
    $id_agenda = substr($id,5,$length);

    $data = array(
      'deleted' => 1
    );

    $update = $this->agenda_model->update_agenda('agenda',$data,'id',$id_agenda);
    if($update == true){
      echo 1;
    }else{
      echo 0;
    }
  }

  function upload_excel(){
    $this->isLogged();

    $config['upload_path'] = UPLOAD_PATH_AGENDA;
    $config['allowed_types'] = 'xlsx|xls';
    $config['max_size'] = '10000';
    $config['overwrite'] = true;
    $config['file_name'] = $_FILES['file-excel']['name'];
    $this->load->library('upload', $config);

    if ( ! $this->upload->do_upload('file-excel')) {
      // jika validasi file gagal, kirim parameter error ke index
      $error = $this->upload->display_errors();
      print_r($error);
    } else {
      include APPPATH.'third_party/PHPExcel/PHPExcel.php';
      $file_name = $this->upload->data('file_name');
      $excelreader = new PHPExcel_Reader_Excel2007();
      $loadexcel = $excelreader->load(UPLOAD_PATH_AGENDA.$file_name); // Load file yang telah diupload ke folder excel
      $sheet = $loadexcel->getActiveSheet()->toArray(null, true, true ,true);

      $data = array();
      $numrow = 1;
      foreach($sheet as $row){
        if($numrow > 1){
          array_push($data, array(
            'nama_kegiatan'=>$row['A'],
            'tanggal'=>$row['B'],
            'tempat'=>$row['C'],
            'waktu'=>$row['D'],
            'jenis' => 1
          ));
        }
        $numrow++;
      }
      $insert_to_db = $this->agenda_model->insert_multiple($data);
      if($insert_to_db == true){
        echo 1;
      }else{
        echo 0;
      }
    }
  }
  // end of function of agenda kegiatan

  // function of agenda personil
  function list_agenda_personil(){
    $this->isLogged();

    $data['list_agenda'] = $this->agenda_model->list_agenda(2)->result();
    $data['sidebar_color'] = 'warning';
    $data['page_name'] = 'Daftar Agenda Personil';
    $data['t_foot'] = 'page/agenda/personil/t_foot.php';
    $data['content'] = 'page/agenda/personil/agenda_personil.php';
    $this->load->view('template/main', $data);
  }

  function page_agenda_personil_baru(){
    $this->isLogged();

    $data['pegawai'] = $this->user_model->getPegawai()->result();
    $data['sidebar_color'] = 'success';
    $data['page_name'] = 'Daftar Agenda Personil';
    $data['t_foot'] = 'page/agenda/personil/t_foot.php';
    $data['content'] = 'page/agenda/personil/agenda_personil_baru.php';
    $this->load->view('template/main', $data);
  }

  function create_agenda_personil(){
    $this->isLogged();

    $nama = $this->input->post('nama_kegiatan');
    $tgl_mulai = $this->input->post('tanggal_mulai');
    $tgl_selesai = $this->input->post('tanggal_selesai');
    $tempat = $this->input->post('tempat_kegiatan');
    $waktu = $this->input->post('waktu_kegiatan');
    $personil = $this->input->post('personil');
    $nip = $this->input->post('arrNip');
    $id_personil = $this->input->post('arrId');

    $data = array(
      'nama_kegiatan' => $nama,
      'tanggal_mulai' => $tgl_mulai,
      'tanggal_selesai' => $tgl_selesai,
      'tempat' => $tempat,
      'waktu' => $waktu,
      'jenis' => 2
    );

    $insert = $this->agenda_model->insert_data($data, 'agenda');

    foreach ($personil as $key => $pegawai) {
      $person = array(
        'nama_personil' => $pegawai,
        'nip' => $nip[$key],
        'id_personil' => $id_personil[$key],
        'id_agenda' => $insert
      );
      $insert_personil = $this->agenda_model->insert_data($person,'personil_agenda');
    }

    if($insert_personil ==  true){
      echo 1;
    }else{
      print_r($insert_personil);
    }
  }

  function page_detail_agenda_personil($id){
    $this->isLogged();

    $length = strlen($id);
    $length = $length-15;
    $id_agenda = substr($id,5,$length);
    $agenda = $this->agenda_model->detail_agenda($id_agenda)->row();
    $personil = $this->agenda_model->get_personil($id_agenda)->result();
    $data['agenda'] = $agenda;
    $data['personil'] = $personil;
    $data['sidebar_color'] = 'success';
    $data['page_name'] = 'Detail Agenda Personil';
    $data['t_foot'] = 'page/agenda/personil/t_foot.php';
    $data['content'] = 'page/agenda/personil/detail_agenda_personil.php';
    $this->load->view('template/main', $data);
  }

  function page_edit_agenda_personil($id){
    $this->isLogged();

    $length = strlen($id);
    $length = $length-15;
    $id_agenda = substr($id,5,$length);
    $agenda = $this->agenda_model->detail_agenda($id_agenda)->row();
    $personil = $this->agenda_model->get_personil($id_agenda)->result();
    $data['pegawai'] = $this->user_model->getPegawai()->result();
    $data['agenda'] = $agenda;
    $data['personil'] = $personil;
    $data['sidebar_color'] = 'success';
    $data['page_name'] = 'Perbaharui Agenda Personil';
    $data['t_foot'] = 'page/agenda/personil/t_foot.php';
    $data['content'] = 'page/agenda/personil/edit_agenda_personil.php';
    $this->load->view('template/main', $data);
  }

  function add_personil_agenda(){
    $this->isLogged();

    $id = $this->input->post('id');
    $length = strlen($id);
    $length = $length-15;
    $id_agenda = substr($id,5,$length);

    $data = array(
      'nama_personil' => 'ADI PURWANA',
      'nip' => '197705052006041005',
      'id_user' => '2',
      'id_agenda' => $id_agenda,
    );
    $insert_personil = $this->agenda_model->insert_data($data,'personil_agenda');
    if($insert_personil == true){
      echo 1;
    }else{
      print_r($insert_personil);
    }
  }

  function update_personil_agenda($id){
    $this->isLogged();

    $nama = $this->input->post('nama');
    $nip = $this->input->post('nip');
    $id_user = $this->input->post('id_user');

    $length = strlen($id);
    $length = $length-15;
    $id_personil = substr($id,5,$length);

    $data = array(
      'nama_personil' => $nama,
      'id_user' => $id_user,
      'nip' => $nip
    );

    $update_personil = $this->agenda_model->update_agenda('personil_agenda',$data,'id',$id_personil);
    if($update_personil == true){
      echo 1;
    }else{
      echo 'Gagal memperbaharui Personil';
    }

  }

  function update_data_agenda(){
    $this->isLogged();

    $value = $this->input->post('value');
    $field = $this->input->post('field');
    $id = $this->input->post('id');

    $length = strlen($id);
    $length = $length-15;
    $id_agenda = substr($id,5,$length);

    $data = array(
      $field => $value
    );

    $update_data = $this->agenda_model->update_agenda('agenda', $data, 'id', $id_agenda);
    if($update_data == true){
      echo 1;
    }else{
      print_r($update_data);
    }
  }

  function delete_personil($id){
    $this->isLogged();

    $length = strlen($id);
    $length = $length-15;
    $id_personil = substr($id,5,$length);

    $data = array(
      'deleted' => 1
    );

    $update_data = $this->agenda_model->update_agenda('personil_agenda', $data, 'id', $id_personil);
    if($update_data == true){
      echo 1;
    }else{
      print_r($update_data);
    }
  }

  function search(){
    $this->isLogged();
    
    $query = $this->input->post('value');
    $jenis = $this->input->post('jenis');
    $search = $this->agenda_model->search($query, $jenis)->result();
    $a = 1;
    $hasil = '';
    if($search == null){
      $hasil .= '<tr class="text-center">';
      $hasil .= '<td colspan="7">Agenda Tidak Tersedia</td>';
      $hasil .= '</td></tr>';
    }else{
      foreach($search as $s){
        $random = md5(mt_rand(1,10000));
        $first = substr($random,0,5);
        $last = substr($random,5,10);
        $id = $first.$s->id.$last;
        $hasil .= '<tr class="text-center">';
        $hasil .= '<td>'.$a.'</td>';
        $hasil .= '<td class="text-left">'.$s->nama_kegiatan.'</td>';
        $hasil .= ' <td>'. $this->customlib->format_date_indonesia($s->tanggal_mulai) .'</td>';
        if($jenis == 1){
          $hasil .= ' <td>'. $this->customlib->format_date_indonesia($s->tanggal_selesai) .'</td>';
        }
        $hasil .= '<td>'. $s->tempat.'</td>';
        $hasil .= ' <td>'. substr($s->waktu, 0, 5).'</td>';
        $hasil .= '<td class="td-actions text-right">';
        if($jenis == 1){
          $hasil .= '<a href="'. base_url("edit-agenda-kegiatan/".$id).'" rel="tooltip" class="btn btn-success" data-toggle="tooltip" data-placement="top" title="Edit Laporan"><i class="material-icons">edit</i></a>';
          $hasil .= '<a rel="tooltip" class="btn btn-danger hapus-agenda-kegiatan ml-1" data-toggle="tooltip" data-placement="bottom" title="Hapus Laporan" id-agenda="'.$id.'"><i class="material-icons" style="color:#fff">close</i></a>';
        }elseif($jenis == 2){
          $hasil .= '<a href="'. base_url('detail-agenda-personil/'.$id).'" rel="tooltip" class="btn btn-info" data-toggle="tooltip" data-placement="left" title="Lihat Detail Agenda"><i class="material-icons">info</i></a>';
          $hasil .= '<a href="'. base_url('edit-agenda-personil/'.$id).'" rel="tooltip" class="btn btn-success mr-1 ml-1" data-toggle="tooltip" data-placement="top" title="Edit Agenda Personil"><i class="material-icons">edit</i></a>';
          $hasil .= '<a rel="tooltip" class="btn btn-danger hapus-agenda-personil" data-toggle="tooltip" data-placement="bottom" title="Hapus Agenda Personil" id-agenda="'.$id.'"><i class="material-icons" style="color:#fff">close</i></a>';
        }
        $hasil .= '</td></tr>';
        $a++;
      }
    }
    echo $hasil;
  }
  // end of function of agenda personil
}
