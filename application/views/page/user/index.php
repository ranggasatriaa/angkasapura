<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-10">
        <div class="card">
          <div class="card-header card-header-warning">
            <h4 class="card-title float-left">Daftar Akses</h4>
            <div class="card float-right search-bar-tools">
              <div class="card-body">
                <form class="" action="<?= site_url('akses')?>" method="get">
                  <span class="bmd-form-group">
                    <div class="input-group no-border">
                      <input id="search_key" name="search_key" type="text" value="<?= empty($search_key) ? '' : $search_key?>" class="form-control" placeholder="Cari Petugas...">
                      <button id="search" type="submit" class="btn btn-warning btn-round btn-just-icon">
                        <i class="material-icons">search</i>
                        <div class="ripple-container"></div>
                      </button>
                      <?php if (!empty($search_key)): ?>
                        <a class="btn btn-danger btn-round btn-just-icon" href="<?= site_url('akses')?>">
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
                <tr>
                  <th>No</th>
                  <th>Nama Petugas</th>
                  <th>Username</th>
                  <th>Email</th>
                  <th>Level Akses</th>
                  <th class="text-right">Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $i = 1;
                foreach($listPengguna as $user){
                  if ($user->user_id != $this->session->userdata('user_id')){ ?>
                    <tr>
                      <td><?= $i;?></td>
                      <td><?= ucwords($user->user_name)?></td>
                      <td><?= $user->username?></td>
                      <td><?= $user->user_email?></td>
                      <td>
                        <?php
                        if ($user->user_level == 1) {
                          echo AKSES_1;
                        }else if ($user->user_level == 2){
                          echo AKSES_2;
                        }else if ($user->user_level == 3){
                          echo AKSES_3;
                        }else if ($user->user_level == 4){
                          echo AKSES_4;
                        }
                         ?>
                      </td>
                      <td class="td-actions text-right ">
                        <a href="<?= site_url('detail-akses/'.$user->user_id)?>" rel="tooltip" class="btn btn-info" data-toggle="tooltip" data-placement="left" title="Lihat Detail Akses" style="margin:3px">
                          <i class="material-icons">info</i>
                        </a>
                        <a href="ubah-akses/<?=$user->user_id?>" rel="tooltip" class="btn btn-warning" data-toggle="tooltip" data-placement="left" title="Edit Akses" style="margin:3px">
                          <i class="material-icons">edit</i>
                        </a>
                        <button  onclick="deleteAkses(<?=$user->user_id?>)" rel="tooltip" class="btn btn-danger" data-toggle="tooltip" data-placement="left" title="Hapus Akses" style="margin:3px">
                          <i class="material-icons">close</i>
                        </button>
                      </td>
                    </tr>
                    <?php $i++;
                  }
                }?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <div class="col-md-2">
        <div class="card card-add-mail">
          <a href="<?=site_url('tambah-akses')?>" >
            <div class="card-header card-header-warning text-center" rel="tooltip" class="btn btn-warning" data-toggle="tooltip" data-placement="Top" title="Tambah Akses">
              <i class="material-icons" style="font-size:55px">add</i>
            </div>
          </a>
          <div class="card-body text-center">
            <p class="bold">Tambah Akses
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
