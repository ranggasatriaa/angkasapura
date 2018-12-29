<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-10">
        <div class="row">
          <div class="col-md-6">
          </div>
          <div class="col-md-6">

          </div>
        </div>
        <div class="card">
          <div class="card-header card-header-danger">
            <h4 class="card-title float-left">Daftar Pegawai</h4>
            <div class="card float-right search-bar-tools">
              <div class="card-body">
                <form class="" action="<?= site_url('pegawai')?>" method="get">
                  <span class="bmd-form-group">
                    <div class="input-group no-border">
                      <input id="search_key" name="search_key" type="text" value="<?= empty($search_key) ? '' : $search_key?>" class="form-control" placeholder="Cari Pegawai...">
                      <button id="search" type="submit" class="btn btn-danger btn-round btn-just-icon">
                        <i class="material-icons">search</i>
                        <div class="ripple-container"></div>
                      </button>
                      <?php if (!empty($search_key)): ?>
                        <a class="btn btn-danger btn-round btn-just-icon" href="<?= site_url('pegawai')?>">
                          <i class="material-icons">clear</i>
                        </a>
                      <?php endif; ?>
                    </div>
                  </span>
                </form>
              </div>
            </div>
          </div>
          <div class="card-body">
            <table class="table">
              <thead>
                <tr class="text-center">
                  <th>No</th>
                  <th>NIP</th>
                  <th>Nama Pegawai</th>
                  <th>Jabatan</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $a = 1;
                foreach($listPengguna as $user){?>
                  <tr class="text-center">
                    <td><?= $a;?></td>
                    <td><?= $user->user_nip?></td>
                    <td><?= $user->user_name;?></td>
                    <td><?= $user->user_position;?></td>
                    <td class="td-actions text-right ">
                      <a href="<?= site_url('detail-pegawai/'.$user->user_id)?>" rel="tooltip" class="btn btn-info" data-toggle="tooltip" data-placement="left" title="Lihat Detail Pegawai" style="margin:3px">
                        <i class="material-icons">info</i>
                      </a>
                      <a href="ubah-pegawai/<?=$user->user_id?>" rel="tooltip" class="btn btn-warning" data-toggle="tooltip" data-placement="left" title="Edit Pegawai" style="margin:3px">
                        <i class="material-icons">edit</i>
                      </a>
                      <button  onclick="deletePegawai(<?=$user->user_id?>)" rel="tooltip" class="btn btn-danger" data-toggle="tooltip" data-placement="left" title="Hapus Pegawai" style="margin:3px">
                        <i class="material-icons">close</i>
                      </button>
                    </td>
                  </tr>
                  <?php $a++; }?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <div class="col-md-2">
          <div class="card card-add-mail">
            <a data-toggle="modal" data-target="#modal-upload" >
              <div class="card-header card-header-danger text-center" rel="tooltip" class="btn btn-warning" data-toggle="tooltip" data-placement="Top" title="Tambah Pegawai">
                <i class="material-icons" style="font-size:55px">add</i>
              </div>
            </a>
            <div class="card-body text-center">
              <p class="bold">Tambah Pegawai
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
        <a href="<?= base_url('tambah-pegawai')?>" class="btn btn-danger text-center w-100">
          <b><i class="material-icons mr-2">add</i> Tambah Pegawai Manual</b>
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
        <a class="btn btn-warning btn-block btn-sm" href="<?= base_url('assets\scan\Template_Data_Pegawai.xlsx')?>"><i class="material-icons mr-2">cloud_download</i>Download Template excel Pegawai</a>
        <br>
        <form id="form-upload-excel">
          <div class="form-group">
            <input type="file" class="form-control-file" name="file-excel" id="file-excel">
          </div>
          <button class="btn btn-success" type="submit" id="btn-upload-excel">Upload</button>
        </form>
        <h4 for="" id="label-file">Pilih file Excel</h4>
        <div class="row">
          <div class="col-md-6">
            <button id="pilih-excel" class="btn btn-danger btn-block"><i class="material-icons mr-2">check_circle_outline</i>Pilih</button>
          </div>
          <div class="col-md-6">
            <button id="upload-excel" class="btn btn-success btn-block"><i class="material-icons mr-2">cloud_upload</i>Upload</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Modal upload Excel-->
