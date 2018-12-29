<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-10">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4>Detail Penggunaan Ruangan</h4>
          </div>
          <!-- END CARD HEADER -->
          <div class="card-body detail-surat-masuk">
            <div class="table-resposive">
              <table class="table">
                <tbody>
                  <tr>
                    <th width="10%">Tanggal Penggunaan</th>
                    <td width="1%">:</td>
                    <td><?= view_date($penggunaan->tanggal)?></td>
                  </tr>
                  <tr>
                    <th>Ruangan</th>
                    <td>:</td>
                    <td><?= ucwords($penggunaan->nama_ruangan)?></td>
                  </tr>
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
                    <td><?= $penggunaan->status==0 ? '<span class="text-danger">Belum diijinkan</span>' : '<span class="text-success">Telah diijinkan</span>'?></td>
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
              <a href="<?=site_url('detail-penggunaan-ruangan/'.$penggunaan->id)?>" class="btn btn-info" alt="" rel="tooltip" data-toggle="tooltip" data-placement="top" title="Detail Penggunaan Ruangan" style="margin:3px">
                <i class="material-icons">info</i>
              </a>
              <?php if ($penggunaan->status == 0): ?>

              <button class="btn btn-success" onclick="ijinkanPenggunaan(<?= $penggunaan->id?>)" rel="tooltip" data-toggle="tooltip" data-placement="top" title="Ijinkan Penggunaan Ruangan" style="margin:3px">
                <i class="material-icons">check</i>
              </button>
            <?php endif; ?>
              <a href="<?=site_url('ubah-penggunaan-ruangan/'.$penggunaan->id)?>" class="btn btn-warning" rel="tooltip" data-toggle="tooltip" data-placement="top" title="Edit Penggunaan Ruangan" style="margin:3px">
                <i class="material-icons">edit</i>
              </a>
              <button class="btn btn-danger" onclick="deletePenggunaan(<?= $penggunaan->id?>)" rel="tooltip" data-toggle="tooltip" data-placement="top" title="Hapus Penggunaan Ruangan" style="margin:3px">
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

<div class="modal fade" id="previewImage" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="previewTitle"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <img id="image" src="" alt="" width="100%">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
      </div>
    </div>
  </div>
</div>

<script>

</script>
