<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-10">
        <div class="card">
          <div class="card-header card-header-info">
            <h4 class="card-title float-left">Daftar Penggunaan Ruangan</h4>
            <div class="card float-right search-bar-tools">
              <div class="card-body">
                <form class="" action="<?= site_url('penggunaan-ruangan')?>" method="get">
                  <span class="bmd-form-group">
                    <div class="input-group no-border">
                      <input id="search_key" name="search_key" type="text" value="<?= empty($search_key) ? '' : $search_key?>" class="form-control" placeholder="Cari Nama Ruangan...">
                      <button id="search" type="submit" class="btn btn-info btn-round btn-just-icon">
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
                  <tr>
                    <th rowspan="2" class="text-center">No</th>
                    <th colspan="2">Tanggal dan Waktu Penggunaan</th>
                    <th rowspan="2">Ruangan</th>
                    <th rowspan="2">Tujuan Penggunaan</th>
                    <th rowspan="2">Status</th>
                    <th rowspan="2" class="text-right">Aksi</th>
                  </tr>
                  <tr>
                    <th>Mulai</th>
                    <th>Selesai</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $i=1;
                  foreach ($penggunaans as $pinjam): ?>
                  <tr>
                    <td class="text-center"><?= $i?></td>
                    <td><?= view_date($pinjam->tanggal_mulai)."<br>".date("h:i",strtotime($pinjam->waktu_mulai))?> </td>
                    <td><?= view_date($pinjam->tanggal_selesai)."<br>".date("h:i",strtotime($pinjam->waktu_selesai))?> </td>
                    <td><?php
                    if ($pinjam->status == 0) {
                      echo "Meminta ".$pinjam->permintaan_ruangan;
                    }else {
                      echo "Disetujui ".$pinjam->nama_ruangan." dengan kapasitas ".$pinjam->kapasitas." orang";
                    }
                    ?>
                  </td>
                  <td><?= $pinjam->tujuan?></td>
                  <td><?= $pinjam->status==0 ? '<span class="text-danger">Belum diijinkan</span>' : '<span class="text-success">Telah diijinkan oleh '.$pinjam->user_name.' </span>'?></td>
                  <td class="td-actions text-right">
                    <a href="<?=site_url('detail-penggunaan-ruangan/'.$pinjam->id)?>" class="btn btn-info" alt="" rel="tooltip" data-toggle="tooltip" data-placement="top" title="Detail Penggunaan Ruangan" style="margin:3px">
                      <i class="material-icons">info</i>
                    </a>
                    <?php if ($this->session->userdata('user_level') == 4): ?>
                      <?php if ($pinjam->status == 0): ?>
                      <button class="btn btn-danger" onclick="deletePenggunaan(<?= $pinjam->id?>,'dibatalkan')" rel="tooltip" data-toggle="tooltip" data-placement="top" title="Batalkan Penggunaan Ruangan" style="margin:3px">
                        <i class="material-icons">close</i>
                      </button>
                    <?php endif; ?>
                    <?php elseif ($this->session->userdata('user_level') == 1): ?>
                      <?php if ($pinjam->status == 0): ?>
                        <a href="#" class="btn btn-success" data-toggle="modal" data-target="#exampleModal"  rel="tooltip" data-toggle="tooltip" data-placement="top" title="Ijinkan Penggunaan Ruangan" style="margin:3px"><i class="material-icons">check</i></a>
                      <?php endif;?>
                      <a href="<?=site_url('ubah-penggunaan-ruangan/'.$pinjam->id)?>" class="btn btn-warning" rel="tooltip" data-toggle="tooltip" data-placement="top" title="Edit Penggunaan Ruangan" style="margin:3px">
                        <i class="material-icons">edit</i>
                      </a>
                      <button class="btn btn-danger" onclick="deletePenggunaan(<?= $pinjam->id?>, 'dihapus')" rel="tooltip" data-toggle="tooltip" data-placement="top" title="Hapus Penggunaan Ruangan" style="margin:3px">
                        <i class="material-icons">close</i>
                      </button>
                    <?php endif; ?>
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
        <a href="<?=site_url('penggunaan-ruangan-baru')?>" >
          <div class="card-header card-header-info text-center" rel="tooltip" class="btn btn-warning" data-toggle="tooltip" data-placement="Top" title="Tambah peminjaman ruangan">
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

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Pilih Ruangan yang Dijijinkan untuk digunakan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <select class="form-control" name="ruangan" required>
            <option value="">- Pilih Ruangan -</option>
            <?php foreach ($ruangans as $ruang): ?>
              <option value="<?php echo $ruang->id ?>"><?php echo $ruang->nama_ruangan.' kapasitas '.$ruang->kapasitas.' orang' ?></option>
            <?php endforeach; ?>
          </select>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
        <button class="btn btn-success" onclick="ijinkanPenggunaan(<?= $pinjam->id?>,<?= $this->session->userdata('user_id')?>)" rel="tooltip" data-toggle="tooltip" data-placement="top" title="Ijinkan Penggunaan Ruangan" style="margin:3px">
          Setujui
        </button>
      </div>
    </div>
  </div>
</div>
