<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-10">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4>Detail Penggunaan Ruangan</h4>
          </div>
          <!-- END CARD HEADER -->
          <div class="card-body">
            <div class="table-resposive">
              <table class="table">
                <tbody>
                  <tr>
                    <th width="25%">Tanggal dan Waktu Mulai</th>
                    <td width="1%">:</td>
                    <td><?php echo view_date($penggunaan->tanggal_mulai)?> pukul <?php echo date("h:i",strtotime($penggunaan->waktu_mulai)) ?></td>
                  </tr>
                  <tr>
                    <th>Tanggal dan Waktu Selesai</th>
                    <td>:</td>
                    <td><?php echo view_date($penggunaan->tanggal_selesai)?> pukul <?php echo date("h:i",strtotime($penggunaan->waktu_selesai)) ?></td>
                  </tr>
                  <tr>
                    <th>Ruangan yang diminta</th>
                    <td>:</td>
                    <td><?= ucwords($penggunaan->permintaan_ruangan)?></td>
                  </tr>
                  <?php if ($penggunaan->status == 1): ?>
                    <tr>
                      <th>Ruangan yang dijinkan</th>
                      <td>:</td>
                      <td><?= ucwords($penggunaan->nama_ruangan)?> kapasitas <?php echo $penggunaan->kapasitas ?></td>
                    </tr>
                  <?php endif; ?>
                  <tr>
                    <th>Tujuan Penggunaan</th>
                    <td>:</td>
                    <td><?= ucwords($penggunaan->tujuan)?></td>
                  </tr>
                  <tr>
                    <th>Peminjam</th>
                    <td>:</td>
                    <td><?= ucwords($penggunaan->peminjam)?></td>
                  </tr>
                  <tr>
                    <th>Telepon Peminjam</th>
                    <td>:</td>
                    <td><?= $penggunaan->telepon?></td>
                  </tr>
                  <tr>
                    <th>Status</th>
                    <td>:</td>
                    <td><?= $penggunaan->status==0 ? '<span class="text-danger">Belum diijinkan</span>' : '<span class="text-success">Telah diijinkan oleh '.$penggunaan->user_name.'</span>'?></td>
                  </tr>
                </tbody>
              </table>
            </div>
            <!-- END CARD BODY -->
          </div>
          <!-- END CARD -->
        </div>
      </div>
      <div class="col-md-2">
        <div class="card card-add-mail">
          <div class="card-body text-center">
            <div class="td-actions">
              <a href="<?=site_url('detail-penggunaan-ruangan/'.$penggunaan->id)?>" class="btn btn-info" alt="" rel="tooltip" data-toggle="tooltip" data-placement="top" title="Detail Penggunaan Ruangan">
                <i class="material-icons">info</i>
              </a>
              <?php if ($penggunaan->status == 0): ?>
                <a href="#" class="btn btn-success" data-toggle="modal" data-target="#exampleModal"  rel="tooltip" data-toggle="tooltip" data-placement="top" title="Ijinkan Penggunaan Ruangan" style="margin:3px"><i class="material-icons">check</i></a>
              <?php endif; ?>
              <a href="<?=site_url('ubah-penggunaan-ruangan/'.$penggunaan->id)?>" class="btn btn-warning" rel="tooltip" data-toggle="tooltip" data-placement="top" title="Edit Penggunaan Ruangan" >
                <i class="material-icons">edit</i>
              </a>
              <button class="btn btn-danger" onclick="deletePenggunaan(<?= $penggunaan->id?>)" rel="tooltip" data-toggle="tooltip" data-placement="top" title="Hapus Penggunaan Ruangan">
                <i class="material-icons">close</i>
              </button>
            </div>
          </div>
        </div>
      </div>
      <!-- END COL -->
    </div>
    <!-- END ROW -->
  </div>
  <!-- END CONTAINER -->
</div>
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
        <button class="btn btn-success" onclick="ijinkanPenggunaan(<?= $penggunaan->id?>,<?= $this->session->userdata('user_id')?>)" rel="tooltip" data-toggle="tooltip" data-placement="top" title="Ijinkan Penggunaan Ruangan" style="margin:3px">
        Setujui
      </button>
      </div>
    </div>
  </div>
</div>
