<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Peminjaman extends MY_Controller {
  public function __construct()
  {
    parent:: __construct();
    $this->load->helper('url');
    $this->load->model('user_model');
    $this->load->model('peminjaman_model');
    $this->load->library('session');
    //   $this->load->library('tcpdf/tcpdf');
  }

  function index(){
    $this->isLogged();

    $data['pinjam'] = $this->peminjaman_model->list_peminjaman()->result();
    $data['sidebar_color'] = 'primary';
    $data['page_name'] = 'Laporan Peminjaman';
    $data['t_foot'] = 'page/peminjaman/t_foot.php';
    $data['content'] = 'page/peminjaman/peminjaman_list.php';
    $this->load->view('template/main', $data);
  }
  function list_atk(){
    $this->isLogged();

    $data['pengajuan_atk'] = $this->peminjaman_model->list_pengaju_atk()->result();
    $data['sidebar_color'] = 'danger';
    $data['page_name'] = 'Laporan Permintaan ATK';
    $data['t_foot'] = 'page/peminjaman/atk/t_foot.php';
    $data['content'] = 'page/peminjaman/atk/list_peminjaman_atk.php';
    $this->load->view('template/main', $data);
  }
  function atk_create_page(){
    $this->isLogged();

    $data['sidebar_color'] = 'primary';
    $data['page_name'] = 'Buat Laporan Permintaan ATK';
    $data['t_foot'] = 'page/peminjaman/atk/t_foot.php';
    $data['content'] = 'page/peminjaman/atk/create_peminjaman_atk.php';
    $this->load->view('template/main', $data);
  }
  function create_minta_atk(){
    $this->isLogged();

    $this->isLogged();$atk = $this->input->post('atk');
    $jumlah = $this->input->post('jumlah_atk');
    $nip = $this->input->post('nip');
    $nama = $this->input->post('nama');
    $tgl = $this->input->post('tgl');

    $pinjam = array(
      'nama' => $nama,
      'nip' => $nip,
      'tanggal' => $tgl
    );
    $id_pinjam = $this->peminjaman_model->insert_data_pinjam($pinjam,'permintaan_atk');
    foreach ($jumlah as $key => $value) {
      $atk_item = array(
        'nama_atk' => $atk[$key],
        'jumlah' => $value,
        'id_permintaan' => $id_pinjam
      );
      $insert_item = $this->peminjaman_model->insert_data_pinjam($atk_item,'atk_diminta');
      $insert_item;
    }
    if($insert_item == true){
      echo 1;
    }else{
      echo 0;
    }

  }
  function detail_atk_page($id){
    $this->isLogged();

    $length = strlen($id);
    $length = $length-15;
    $id_minta_atk = substr($id,5,$length);
    $data['sidebar_color'] = 'primary';
    $data['detail_pinjam'] = $this->peminjaman_model->detail_permintaan_atk($id_minta_atk)->row();
    $data['list_atk'] = $this->peminjaman_model->list_item_atk($id_minta_atk)->result();
    $data['page_name'] = 'Detail Laporan Permintaan ATK ';
    $data['t_foot'] = 'page/peminjaman/atk/t_foot.php';
    $data['content'] = 'page/peminjaman/atk/detail_peminjaman_atk.php';
    $this->load->view('template/main', $data);
  }

  function edit_atk_page($id){
    $this->isLogged();

    $length = strlen($id);
    $length = $length-15;
    $id_minta_atk = substr($id,5,$length);
    $data['sidebar_color'] = 'primary';
    $data['detail_pinjam'] = $this->peminjaman_model->detail_permintaan_atk($id_minta_atk)->row();
    $data['list_atk'] = $this->peminjaman_model->list_item_atk($id_minta_atk)->result();
    $data['page_name'] = 'Edit Laporan Permintaan ATK ';
    $data['t_foot'] = 'page/peminjaman/atk/t_foot.php';
    $data['content'] = 'page/peminjaman/atk/edit_peminjaman_atk.php';
    $this->load->view('template/main', $data);
  }

  function add_atk($id){
    $this->isLogged();

    $nama = $this->input->post('nama_atk');
    $jumlah = $this->input->post('jumlah_atk');
    $length = strlen($id);
    $length = $length-15;
    $id_pinjam = substr($id,5,$length);
    $data = array(
      'nama_atk' => $nama,
      'jumlah' =>  $jumlah,
      'id_permintaan' => $id_pinjam
    );
    $tambah = $this->peminjaman_model->insert_data_pinjam($data, 'atk_diminta');
    if($tambah == true){
      echo 1;
    }else{
      echo 0;
    }
  }

  function add_barang_pinjam(){
    $this->isLogged();

    $nama = $this->input->post('nama_barang');
    $jumlah = $this->input->post('jumlah_barang');
    $id = $this->input->post('id');
    $length = strlen($id);
    $length = $length-15;
    $id_pinjam = substr($id,5,$length);
    $data = array(
      'nama' => $nama,
      'jumlah' =>  $jumlah,
      'id_peminjaman' => $id_pinjam
    );
    $tambah = $this->peminjaman_model->insert_data_pinjam($data, 'barang_dipinjam');
    if($tambah == true){
      echo 1;
    }else{
      echo 0;
    }
  }

  function delete_atk(){
    $this->isLogged();

    $id = $this->input->post('id_atk');
    $length = strlen($id);
    $length = $length-15;
    $id_atk = substr($id,5,$length);
    $data = array(
      'deleted' => 1
    );
    $delete = $this->peminjaman_model->update_pinjaman($id_atk, $data, 'atk_diminta', 'id');
    if($delete == true){
      echo 1;
    }else{
      echo 0;
    }
  }

  function delete_barang_dipinjam(){
    $this->isLogged();

    $id = $this->input->post('id');
    $length = strlen($id);
    $length = $length-15;
    $id_barang = substr($id,5,$length);
    $data = array(
      'deleted' => 1
    );
    $delete = $this->peminjaman_model->update_pinjaman($id_barang, $data, 'barang_dipinjam', 'id');
    if($delete == true){
      echo 1;
    }else{
      echo 0;
    }
  }

  function delete_pengajuan_atk(){
    $this->isLogged();

    $id = $this->input->post('id_ajuan');
    $length = strlen($id);
    $length = $length-15;
    $id_atk = substr($id,5,$length);
    $data = array(
      'deleted' => 1
    );
    $delete = $this->peminjaman_model->update_pinjaman($id_atk, $data, 'permintaan_atk', 'id');
    if($delete == true){
      echo 1;
    }else{
      echo 0;
    }
  }

  function update_atk_edit(){
    $this->isLogged();

    $id = $this->input->post('id');
    $length = strlen($id);
    $length = $length-15;
    $id_atk = substr($id,5,$length);
    $jenis = $this->input->post('jenis');
    $value = $this->input->post('value');
    if($jenis == 'nama'){
      $data = array(
        'nama_atk' => $value
      );
    }elseif($jenis == 'jumlah'){
      $data = array(
        'jumlah' => $value
      );
    }
    $update = $this->peminjaman_model->update_pinjaman($id_atk, $data, 'atk_diminta', 'id');
    if($update == true){
      echo 1;
    }else{
      echo 0;
    }
  }

  function update_pengaju_edit(){
    $this->isLogged();

    $id = $this->input->post('id');
    $length = strlen($id);
    $length = $length-15;
    $id_ajuan = substr($id,5,$length);
    $jenis = $this->input->post('jenis');
    $value = $this->input->post('value');
    if($jenis == 'nama'){
      $data = array(
        'nama' => $value
      );
    }elseif($jenis == 'nip'){
      $data = array(
        'nip' => $value
      );
    }elseif($jenis == 'tgl'){
      $data = array(
        'tanggal' => $value
      );
    }
    $update = $this->peminjaman_model->update_pinjaman($id_ajuan, $data, 'permintaan_atk', 'id');
    if($update == true){
      echo 1;
    }else{
      echo 0;
    }
  }

  function create_page(){
    $this->isLogged();

    $data['list_data'] = $this->peminjaman_model->list_data()->result();
    $data['sidebar_color'] = 'primary';
    $data['page_name'] = 'Buat Laporan Peminjaman ';
    $data['t_foot'] = 'page/peminjaman/t_foot.php';
    $data['content'] = 'page/peminjaman/peminjaman_baru.php';
    $this->load->view('template/main', $data);
  }

  function create_peminjaman(){
    $this->isLogged();

    $nama_pinjam = $this->input->post('nama_pinjam');
    $bidang = $this->input->post('jenis');
    $tgl_pinjam = $this->input->post('tgl_pinjam');
    $tgl_kembali = $this->input->post('tgl_kembali');
    $tujuan = $this->input->post('tujuan');
    $barang_akan_pinjam = $this->input->post('barang_akan_pinjam');
    $telp = $this->input->post('telp');

    $data = array(
      'nama_peminjam' => $nama_pinjam,
      'tgl_pinjam' => $tgl_pinjam,
      'tgl_kembali' => $tgl_kembali,
      'tujuan' => $tujuan,
      'barang_akan_dipinjam' => $barang_akan_pinjam,
      'telp' => $telp
    );

    $id_pinjam = $this->peminjaman_model->insert_data_pinjam($data,'peminjaman');

    if($this->session->userdata('user_level') == 1){
      $item = $this->input->post('nama_barang');
      $jumlah = $this->input->post('jumlah_barang');
      $id_barang = $this->input->post('arrId');
      $jenis_barang = $this->input->post('arrJenis');
      $nomor_barang = $this->input->post('arrNomor');
      
      foreach ($jumlah as $key => $value) {
        $items = array(
          'nama' => $item[$key],
          'jumlah' => $value,
          'id_barang' => $id_barang[$key],
          'nomor_barang' => $nomor_barang[$key],
          'jenis' => $jenis_barang[$key],
          'id_peminjaman' => $id_pinjam
        );
        $insert_item = $this->peminjaman_model->insert_data_pinjam($items,'barang_dipinjam');
        $insert_item;
      }
    }

    if($this->session->userdata('user_level') == 1){
      if($insert_item == true){
        echo 1;
      }else{
        echo 0;
      }
    }else{
      if($id_pinjam !== 0){
        echo 1;
      }else{
        echo 0;
      }
    }

  }
  function detail_peminjaman($id){
    $this->isLogged();

    $length = strlen($id);
    $length = $length-15;
    $id_laporan = substr($id,5,$length);
    $data['sidebar_color'] = 'primary';
    $data['detail_pinjam'] = $this->peminjaman_model->detail_pinjam($id_laporan)->row();
    $data['list_barang'] = $this->peminjaman_model->list_barang_dipinjam($id_laporan)->result();
    $data['page_name'] = 'Detail Laporan Peminjaman ';
    $data['t_foot'] = 'page/peminjaman/t_foot.php';
    $data['content'] = 'page/peminjaman/peminjaman_detail.php';
    $this->load->view('template/main', $data);
  }

  function edit_page($id){
    $this->isLogged();

    $length = strlen($id);
    $length = $length-15;
    $id_laporan = substr($id,5,$length);
    $data['list_data'] = $this->peminjaman_model->list_data()->result();
    $data['sidebar_color'] = 'primary';
    $data['detail_pinjam'] = $this->peminjaman_model->detail_pinjam($id_laporan)->row();
    $data['list_barang'] = $this->peminjaman_model->list_barang_dipinjam($id_laporan)->result();
    $data['page_name'] = 'Ubah Laporan Peminjaman Fasilitas';
    $data['t_foot'] = 'page/peminjaman/t_foot.php';
    $data['content'] = 'page/peminjaman/peminjaman_edit.php';
    $this->load->view('template/main', $data);
  }

  function update_peminjaman(){
    $this->isLogged();

    $value = $this->input->post('value');
    $jenis = $this->input->post('jenis');
    $id = $this->input->post('id');

    $length = strlen($id);
    $length = $length-15;
    $id_pinjam = substr($id,5,$length);

    if($jenis == 'nama'){
      $data = array(
        'nama_peminjam' => $value
      );
    }elseif($jenis == 'pinjam'){
      $data = array(
        'tgl_pinjam' => $value
      );
    }elseif($jenis == 'kembali'){
      $data = array(
        'tgl_kembali' => $value
      );
    }elseif($jenis == 'tujuan'){
      $data = array(
        'tujuan' => $value
      );
    }elseif($jenis == 'telp'){
      $data = array(
        'telp' => $value
      );
    }elseif($jenis == 'barang_dipinjam'){
      $data = array(
        'barang_akan_dipinjam' => $value
      );
    }

    $update = $this->peminjaman_model->update_pinjaman($id_pinjam, $data, 'peminjaman', 'id');
    if($update == true){
      echo 1;
    }else{
      echo 0;
    }
  }

  function update_barang_peminjaman(){
    $this->isLogged();

    $value = $this->input->post('value_input');
    $jenis = $this->input->post('jenis_input');
    $id = $this->input->post('id_pinjam');
    $id_barang = $this->input->post('id_barang');
    $jenis_barang = $this->input->post('jenis_barang');
    $nomor_barang = $this->input->post('nomor_barang');
    $length = strlen($id);
    $length = $length-15;
    $id_pinjam = substr($id,5,$length);

    if($jenis == 'barang'){
      if($jenis_barang == 3){
        $data = array(
          'nama' => $value,
          'id_barang' => $id_barang,
          'jenis' => $jenis_barang,
          'nomor_barang' => $nomor_barang,
          'jumlah' => 1
        );
      }else{
        $data = array(
          'nama' => $value,
          'id_barang' => $id_barang,
          'jenis' => $jenis_barang,
          'nomor_barang' => $nomor_barang,
        );
      }
    }elseif($jenis == 'jumlah'){
      $data = array(
        'jumlah' => $value
      );
    }

    $update = $this->peminjaman_model->update_pinjaman($id_pinjam, $data, 'barang_dipinjam', 'id');
    if($update == true){
      echo 1;
    }else{
      echo 0;
    }

  }

  function delete_pinjaman(){
    $this->isLogged();

    $id = $this->input->post('id');
    $length = strlen($id);
    $length = $length-15;
    $id_pinjam = substr($id,5,$length);
    $data = array(
      'deleted' => 1
    );
    $update = $this->peminjaman_model->update_pinjaman($id_pinjam, $data, 'peminjaman', 'id');
    if($update == true){
      echo 1;
    }else{
      echo 0;
    }
  }

  function print_pinjam($id){
    $this->isLogged();

    $length = strlen($id);
    $length = $length-15;
    $id_pinjam = substr($id,5,$length);
    $data['detail_pinjam'] = $this->peminjaman_model->detail_pinjam($id_pinjam)->row();
    $data['list_barang'] = $this->peminjaman_model->list_barang_dipinjam($id_pinjam)->result();
    $this->load->view('page/peminjaman/print_pinjaman', $data);
  }

  function tandai_pinjaman(){
    $this->isLogged();

    $id = $this->input->post('id');
    $length = strlen($id);
    $length = $length-15;
    $id_pinjam = substr($id,5,$length);
    date_default_timezone_set('Asia/Jakarta');
    $date = $timestamp = date("Y-m-d H:i:s", time());
    $data = array(
      'tgl_kembali' => $date
    );
    $update = $this->peminjaman_model->update_pinjaman($id_pinjam, $data, 'peminjaman', 'id');
    if($update == true){
      echo 1;
    }else{
      echo 0;
    }
  }

  function setujui_pinjaman(){
    $this->isLogged();

    $id = $this->input->post('id');
    $length = strlen($id);
    $length = $length-15;
    $id_pinjam = substr($id,5,$length);
    $data = array(
      'status' => 1
    );
    $update = $this->peminjaman_model->update_pinjaman($id_pinjam, $data, 'peminjaman', 'id');
    if($update == true){
      echo 1;
    }else{
      echo 0;
    }
  }

  // master data function
  function list_data(){
    $this->isLogged();

    $data['list_data'] = $this->peminjaman_model->list_data()->result();
    $data['sidebar_color'] = 'primary';
    $data['page_name'] = 'Data Master BMN';
    $data['t_foot'] = 'page/peminjaman/data_bmn/t_foot.php';
    $data['content'] = 'page/peminjaman/data_bmn/list.php';
    $this->load->view('template/main', $data);
  }

  function create_data_page(){
    $this->isLogged();

    $data['sidebar_color'] = 'primary';
    $data['page_name'] = 'Buat Data Master BMN & ART';
    $data['t_foot'] = 'page/peminjaman/data_bmn/t_foot.php';
    $data['content'] = 'page/peminjaman/data_bmn/create.php';
    $this->load->view('template/main', $data);
  }

  function manage_data_master($id=null){
    $this->isLogged();

    $fungsi = $this->input->post('fungsi');
    $length = strlen($id);
    $length = $length-15;
    $id_data = substr($id,5,$length);
    $data = array(
      'nomor' => $this->input->post('nomor_barang'),
      'nama_barang' => $this->input->post('nama_barang'),
      'jumlah' => $this->input->post('jumlah'),
      'tahun_kontrak' => $this->input->post('tahun_kontrak'),
      'rekanan' => $this->input->post('rekanan'),
      'status' => $this->input->post('status'),
      'jenis' => $this->input->post('jenis'),
    );
    if($fungsi == 'create'){
      $manage_data = $this->peminjaman_model->insert_data_pinjam($data,'data_bmn');
    }elseif($fungsi == 'edit'){
      $manage_data = $this->peminjaman_model->update_pinjaman($id_data, $data, 'data_bmn', 'id');
    }
    if($manage_data == true){
      echo 1;
    }else{
      echo $manage_data;
    }
  }

  function edit_data_page($id){
    $this->isLogged();

    $length = strlen($id);
    $length = $length-15;
    $id_data = substr($id,5,$length);
    $data['list_data'] = $this->peminjaman_model->detail_data($id_data)->row();
    $data['sidebar_color'] = 'primary';
    $data['page_name'] = 'Data Master BMN';
    $data['t_foot'] = 'page/peminjaman/data_bmn/t_foot.php';
    $data['content'] = 'page/peminjaman/data_bmn/edit.php';
    $this->load->view('template/main', $data);
  }

  function hapus_data_master(){
    $this->isLogged();

    $id = $this->input->post('id');
    $length = strlen($id);
    $length = $length-15;
    $id_data = substr($id,5,$length);
    $data = array(
      'deleted' => 1
    );
    $update = $this->peminjaman_model->update_pinjaman($id_data, $data, 'data_bmn', 'id');
    if($update == true){
      echo 1;
    }else{
      echo 0;
    }
  }

  function search_minta_atk(){
    $this->isLogged();

    $query = $this->input->post('value');
    $search = $this->peminjaman_model->search_minta_atk($query)->result();
    $a = 1;
    $hasil = '';
    foreach($search as $s){
      $random = md5(mt_rand(1,10000));
      $first = substr($random,0,5);
      $last = substr($random,5,10);
      $id = $first.$s->id.$last;
      $hasil .= '<tr class="text-center">';
      $hasil .= '<td>'.$a.'</td>';
      $hasil .= ' <td>'. $s->nama.'</td>';
      $hasil .= '<td>'.$s->nip.'</td>';
      $hasil .= '<td>'.$this->customlib->format_date_indonesia($s->tanggal).'</td>';
      $hasil .= '<td class="td-actions text-right">';
      $hasil .= '<a href="'. base_url('detail-permintaan-atk/'.$id).'" rel="tooltip" class="btn btn-info" data-toggle="tooltip" data-placement="left" title="Lihat Laporan Kerusakan"><i class="material-icons">info</i></a>';
      $hasil .= '<a href="'. base_url('edit-permintaan-atk/'.$id).'" rel="tooltip" class="btn btn-success mr-1 ml-1" data-toggle="tooltip" data-placement="top" title="Edit Laporan Kerusakan"><i class="material-icons">edit</i></a>';
      $hasil .= '<a rel="tooltip" class="btn btn-danger btn-hapus-pengajuan" data-toggle="tooltip" data-placement="bottom" title="Hapus Laporan" id-pinjaman="'.$id.'"><i class="material-icons" style="color:#fff">close</i></a>';
      $hasil .= '</td></tr>';
      $a++;
    }
    echo $hasil;
  }

  function search_peminjaman(){
    $this->isLogged();

    $query = $this->input->post('value');
    $search = $this->peminjaman_model->search_peminjaman($query)->result();
    $a = 1;
    $hasil = '';
    foreach($search as $s){
      $random = md5(mt_rand(1,10000));
      $first = substr($random,0,5);
      $last = substr($random,5,10);
      $id = $first.$s->id.$last;
      $hasil .= '<tr class="text-center">';
      $hasil .= '<td>'.$a.'</td>';
      $hasil .= ' <td>'. $s->nama_peminjam.'</td>';
      $hasil .= '<td>'.$this->customlib->format_date_indonesia($s->tgl_pinjam).'</td>';
      if($s->tgl_kembali == '0000-00-00 00:00:00'){
        $hasil .= '<td><b> Belum Dikembalikan</b></td>';
      }else{
        $hasil .= '<td>'.$this->customlib->format_date_indonesia($s->tgl_kembali).'</td>';
      }
      $hasil .= '<td class="td-actions text-right">';
      $hasil .= '<a href="'. base_url('print-pinjam/'.$id).'" rel="tooltip" class="btn btn-primary" data-toggle="tooltip" data-placement="left" title="Print Peminjaman"><i class="material-icons">print</i></a>';
      $hasil .= '<a rel="tooltip" class="btn btn-success btn-cek-kembali" data-toggle="tooltip" data-placement="top" title="Tandai Telah diKembalikan" id-pinjaman="'.$id.'"><i class="material-icons" style="color:#fff">check</i></a>';
      $hasil .= '<a href="'. base_url('detail-pinjam/'.$id).'" rel="tooltip" class="btn btn-info" data-toggle="tooltip" data-placement="left" title="Lihat Detail Pengajuan"><i class="material-icons">info</i></a>';
      $hasil .= '<a href="'. base_url('edit-pinjam/'.$id).'" rel="tooltip" class="btn btn-success mr-1 ml-1" data-toggle="tooltip" data-placement="top" title="Edit Pengajuan"><i class="material-icons">edit</i></a>';
      $hasil .= '<a rel="tooltip" class="btn btn-danger btn-hapus-pengajuan" data-toggle="tooltip" data-placement="bottom" title="Hapus Laporan" id-pinjaman="'.$id.'"><i class="material-icons" style="color:#fff">close</i></a>';
      $hasil .= '</td></tr>';
      $a++;
    }

    echo $hasil;
  }


  // end of master data function
}
