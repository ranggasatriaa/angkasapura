<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-10">
        <div class="card">
          <div class="card-header card-header-warning">
            <h4 class="card-title float-left">Daftar Akses</h4>
            <div class="card float-right search-bar-tools">
              <div class="card-body">
                <form class="" action="<?= site_url('penggunaan-ruangan')?>" method="get">
                  <span class="bmd-form-group">
                    <div class="input-group no-border">
                      <input id="search_key" name="search_key" type="text" value="<?= empty($search_key) ? '' : $search_key?>" class="form-control" placeholder="Cari Nama Ruangan...">
                      <button id="search" type="submit" class="btn btn-warning btn-round btn-just-icon">
                        <i class="material-icons">search</i>
                        <div class="ripple-container"></div>
                      </button>
                      <?php if (!empty($search_key)): ?>
                        <a class="btn btn-danger btn-round btn-just-icon" href="<?= site_url('penggunaan-ruangan')?>">
                          <i class="material-icons">clear</i>
                        </a>
                      <?php endif; ?>
                    </div>
                  </span>
                </form>
              </div>
            </div>
          </div>
          <!-- END CARD HEADER -->
          <div class="card-body">
            <div class="table-resposive">
              <table class="table">
                <thead>
                  <tr class="text-center">
                    <th>No</th>
                    <th>Ruangan</th>
                    <th>Lokasi</th>
                    <th>Kapasitas</th>
                    <th >Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $i=1;
                  foreach ($ruangans as $pinjam): ?>
                  <tr class="text-center">
                    <td><?= $i?></td>
                    <td><?= ucwords($pinjam->nama_ruangan)?></td>
                    <td><?= $pinjam->lokasi?></td>
                    <td><?= $pinjam->kapasitas?> orang</td>
                    <td class="td-actions">
                      <a href="<?=site_url('ubah-ruangan/'.$pinjam->id)?>" class="btn btn-warning" rel="tooltip" data-toggle="tooltip" data-placement="top" title="Edit Penggunaan Ruangan" style="margin:3px">
                        <i class="material-icons">edit</i>
                      </a>
                      <button class="btn btn-danger" onclick="deleteRuangan(<?= $pinjam->id?>)" rel="tooltip" data-toggle="tooltip" data-placement="top" title="Hapus Penggunaan Ruangan" style="margin:3px">
                        <i class="material-icons">close</i>
                      </button>
                    </td>
                  </tr>
                  <?php $i++; endforeach; ?>
                </tbody>
              </table>
            </div>
            <!-- END TABLE RESPONSIVE -->
          </div>
          <!-- END CARD BODY -->
        </div>
        <!-- END CARD -->
      </div>
      <div class="col-md-2">
        <div class="card card-add-mail">
          <a href="<?=site_url('ruangan-baru')?>" >
            <div class="card-header card-header-warning text-center" rel="tooltip" class="btn btn-warning" data-toggle="tooltip" data-placement="Top" title="Tambah peminjaman ruangan">
              <i class="material-icons" style="font-size:55px">add</i>
            </div>
          </a>
          <div class="card-body text-center">
            <p class="bold">Tambah peminjaman ruangan
            </p>
          </div>
        </div>
      </div>
      <!-- END COL -->
    </div>
    <!-- END ROW -->
  </div>
  <!-- END CONTAINER -->
</div>
