<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-3">
        <div class="form-group">
          <label for="">Cari Berdasarkan Tanggal</label>
          <input type="date" class="form-control mt-2" id="tanggal-cari">
        </div>
      </div>
      <div class="col-md-4">
        <div class="mt-2">
            <div class="input-group">
              <input type="text" class="form-control" name="search-input" id="search-input" placeholder="Cari berdasarkan Nama Kegiatan">
              <button class="btn btn-success btn-round btn-just-icon btn-search-agenda"><i class="material-icons">search</i></button>
            </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-10">
        <div class="card">
          <div class="card-header card-header-success">
            <h4 class="card-title float-left">Daftar Agenda Kegiatan</h4>
          </div>
          <div class="card-body">
            <table class="table table-list-surat-masuk">
              <thead class="text-center">
                <th>No</th>
                <th>Nama Kegiatan</th>
                <th>Tanggal Mulai</th>
                <th>Tanggal Selesai</th>
                <th>Tempat</th>
                <th>Waktu</th>
                <th class="text-right">Aksi</th>
              </thead>
              <tbody id="list-agenda-kegiatan">
                <?php
                $a = 1;
                foreach($list_agenda as $la){
                  $random = md5(mt_rand(1,10000));
                  $first = substr($random,0,5);
                  $last = substr($random,5,10);
                  $id = $first.$la->id.$last;
                  ?>
                  <tr class="text-center">
                    <td><?= $a?></td>
                    <td class="text-left"><?= $la->nama_kegiatan?></td>
                    <td><?= $this->customlib->format_date_indonesia($la->tanggal_mulai) ?></td>
                    <td><?= $this->customlib->format_date_indonesia($la->tanggal_selesai) ?></td>
                    <td><?= $la->tempat?></td>
                    <td><?= substr($la->waktu, 0, 5);?></td>
                    <td class="td-actions text-right">
                      <a href="<?= base_url('edit-agenda-kegiatan/'.$id)?>" rel="tooltip" class="btn btn-success" data-toggle="tooltip" data-placement="top" title="Edit Laporan">
                        <i class="material-icons">edit</i>
                      </a>
                      <a rel="tooltip" class="btn btn-danger hapus-agenda-kegiatan" data-toggle="tooltip" data-placement="bottom" title="Hapus Laporan" id-agenda="<?= $id;?>">
                        <i class="material-icons" style="color:#fff">close</i>
                      </a>
                    </td>
                  </tr>
                  <?php $a++; } ?>
                </tbody>
                <tbody id="list-agenda-cari"></tbody>
              </table>
            </div>
          </div>
        </div>
        <div class="col-md-2">
          <div class="card card-add-mail">
            <a data-toggle="modal" data-target="#modal-upload" >
              <div class="card-header card-header-success text-center" rel="tooltip" class="btn btn-warning" data-toggle="tooltip" data-placement="Top" title="Tambah Agenda Kegiatan">
                <i class="material-icons" style="font-size:55px">add</i>
              </div>
            </a>
            <div class="card-body text-center">
              <p class="bold">Tambah Agenda Kegiatan
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- modal pilih -->
  <div class="modal" tabindex="-1" role="dialog" id="modal-upload">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-body">
          <a href="<?= base_url()?>agenda-kegiatan-baru" class="btn btn-danger text-center w-100">
            <b><i class="material-icons mr-2">add</i> Tambah Agenda Manual</b>
          </a>
          <button class="btn btn-danger text-center w-100" id="btn-excel">
            <b><i class="material-icons mr-2">attach_file</i> Upload File Excel</b>
          </button>
        </div>
      </div>
    </div>
  </div>
  <!-- end of modal pilih -->

  <!-- Modal upload Excel-->
  <div class="modal" tabindex="-1" role="dialog" id="modal-excel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Upload File Excel Anda</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <a class="btn btn-warning btn-block btn-sm" href="<?= base_url('assets\scan\Template_Data_Agenda.xlsx')?>"><i class="material-icons mr-2">cloud_download</i>Download Template excel Agenda</a>
          <br>
          <form id="form-upload-excel" enctype="multipart/form-data">
            <div class="form-group">
              <label for="">Pilih Berkas Excel</label>
              <input type="file" class="form-control-file" name="file-excel" id="file-excel" accept=".xls,.xlsx">
            </div>
            <button class="btn btn-primary" type="submit" id="btn-upload-excel">Upload</button>
          </form>
          <p for="" id="label-file">Pilih file Excel</p>
          <button id="pilih-excel" class="btn btn-primary btn-lg">Pilih</button>
          <button class="btn btn-success btn-lg" id="upload-excel">Upload</button>
        </div>
      </div>
    </div>
  </div>
  <!-- Modal upload Excel-->
