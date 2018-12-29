<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-10">
        <div class="card">
          <div class="card-header card-header-danger">
            <h4 class="card-title float-left">Daftar Surat Keluar</h4>
            <div class="card float-right search-bar-tools">
              <div class="card-body">
                <form class="" action="<?= site_url('outmail/index')?>" method="get">
                  <span class="bmd-form-group">
                    <div class="input-group no-border">
                      <input id="search_key" name="search_key" type="text" value="<?= empty($search_key) ? '' : $search_key?>" class="form-control" placeholder="Cari Surat Keluar...">
                      <button id="search" type="submit" class="btn btn-danger btn-round btn-just-icon">
                        <i class="material-icons">search</i>
                        <div class="ripple-container"></div>
                      </button>
                      <?php if (!empty($search_key)): ?>
                        <a class="btn btn-danger btn-round btn-just-icon" href="<?= site_url('outmail')?>">
                          <i class="material-icons">clear</i>
                        </a>
                      <?php endif; ?>
                    </div>
                  </span>
                </form>
              </div>
              </div>
            <table class="table"  style="margin-bottom:0px">

            </table>
          </div>
          <!-- END CARD HEADER -->
          <div class="card-body">
            <div class="table-resposive">
              <table class="table">
                <thead>
                  <tr class="text-center">
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>Nomor Surat</th>
                    <td>Tipe Surat</th>
                    <th>Perihal</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $i=1;
                  foreach ($mails as $mail): ?>
                  <tr>
                    <td class="text-center"><?= $i?></td>
                    <td><?=view_date($mail->mail_date)?></td>
                    <td><?= $mail->mail_number?></td>
                    <td><?= $mail->name ?></td>
                    <td><?=limit(ucwords($mail->mail_subject),40)?></td>
                    <td class="td-actions text-right">
                      <a href="<?=site_url('outmail/detail/'.$mail->mail_id)?>" class="btn btn-info" alt="" rel="tooltip" data-toggle="tooltip" data-placement="top" title="Detail Surat" style="margin:3px">
                        <i class="material-icons">info</i>
                      </a>
                      <a href="<?=site_url('outmail/exportFile/'.$mail->mail_id)?>" class="btn btn-success" alt="" rel="tooltip" data-toggle="tooltip" data-placement="left" title="Download Word Surat" style="margin:3px">
                        <i class="material-icons">cloud_download</i>
                      </a>
                      <a href="<?=site_url('outmail/uploadSurat/'.$mail->mail_id)?>" class="btn btn-primary" alt="" rel="tooltip" data-toggle="tooltip" data-placement="top" title="Upload Scan Surat" style="margin:3px">
                        <i class="material-icons">cloud_upload</i>
                      </a>
                      <a href="<?=site_url('outmail/edit/'.$mail->mail_id)?>" class="btn btn-warning" rel="tooltip" data-toggle="tooltip" data-placement="top" title="Edit Surat" style="margin:3px">
                        <i class="material-icons">edit</i>
                      </a>
                      <button class="btn btn-danger" onclick="deleteOutmail(<?= $mail->mail_id?>)" rel="tooltip" data-toggle="tooltip" data-placement="top" title="Hapus Surat" style="margin:3px">
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
          <a data-toggle="modal" data-target="#exampleModal" >
            <div class="card-header card-header-danger text-center" rel="tooltip" class="btn btn-danger" data-toggle="tooltip" data-placement="Top" title="Tambah Surat Keluar">
              <i class="material-icons" style="font-size:55px">add</i>
            </div>
          </a>
          <div class="card-body text-center">
            <p class="bold">Tambah Surat Keluar
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
        <h5 class="modal-title" id="exampleModalLabel">Pilih Jenis Surat yang Akan Dibuat</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?php foreach ($types as $type): ?>
          <a class="btn btn-danger btn-block" href="<?=site_url('outmail/buatSurat/'.$type->id)?>"><?= $type->name?></a>
        <?php endforeach; ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
      </div>
    </div>
  </div>
</div>
