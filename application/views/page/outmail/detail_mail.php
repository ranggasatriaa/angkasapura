<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-10">
        <div class="card">
          <div class="card-header card-header-danger">
            <h4>Detail Surat Keluar</h4>
          </div>
          <!-- END CARD HEADER -->
          <div class="card-body detail-surat-masuk">
            <div class="table-resposive">
              <table class="table">
                <thead>
                  <tr>
                    <td colspan="3"><h3>No Surat: <?= $mail->mail_number;?></h3></td>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th width="10%">Perihal</th>
                    <td width="1%">:</td>
                    <td><?= $mail->mail_subject;?></td>
                  </tr>
                  <tr>
                    <th>Tanggal</th>
                    <td>:</td>
                    <td><?= date('d F Y', strtotime($mail->mail_date))?></td>
                  </tr>
                </tbody>
              </table>
            </div>
            <!-- END CARD BODY -->
          </div>
          <!-- END CARD -->
        </div>
          <div class="card">
            <div class="card-header">
              <h4>Scan Surat</h4>
            </div>
            <div class="card-body">
              <?php if (!empty($images)): ?>
              <div class="row">
              <?php foreach ($images as $image): ?>
                <div class="col-md-6">
                  <h6 class="btn btn-danger btn-block btn-sm"> Halaman <?= $image->page?> </h6>
                  <a id="previewImageButtonLink"  href="#" data-toggle="modal" data-target="#previewImage" data-page="<?= $image->page?>" data-directory="<?= $image->directory?>" >
                  <img src="<?=base_url(UPLOAD_PATH_OUTMAIL.$image->directory)?>" alt="" style="margin-bottom:20px; width:100%">
                </a>
                </div>
              <?php endforeach; ?>
            </div>
          <?php else: ?>
            Belum ada scan surat di unggah
            <a href="<?=site_url('outmail/uploadSurat/'.$mail->mail_id)?>" class="btn btn-danger btn-block" alt="" rel="tooltip" data-toggle="tooltip" data-placement="left" title="Upload Scan Surat">
              <i class="material-icons">cloud_upload</i> Upload scan surat sekarang
            </a>
          <?php endif; ?>
            </div>
          </div>
      </div>
      <div class="col-md-2">
        <div class="card card-add-mail">
          <div class="card-body text-center">
            <div class="td-actions">
              <a href="<?=site_url('outmail/uploadSurat/'.$mail->mail_id)?>" class="btn btn-primary" alt="" rel="tooltip" data-toggle="tooltip" data-placement="left" title="Upload Scan Surat">
                <i class="material-icons">cloud_upload</i>
              </a>
              <a href="<?=site_url('outmail/exportFile/'.$mail->mail_id)?>" class="btn btn-success" alt="" rel="tooltip" data-toggle="tooltip" data-placement="left" title="Download Word Surat">
                <i class="material-icons">cloud_download</i>
              </a>
              <?php if ($mail->mail_type == 1): ?>
                <a href="<?=site_url('outmail/exportFile/'.$mail->mail_id.'/2')?>" class="btn btn-success" alt="" rel="tooltip" data-toggle="tooltip" data-placement="left" title="Download Salinan Surat">
                  <i class="material-icons">cloud_download</i>
                </a>
                <a href="<?=site_url('outmail/exportFile/'.$mail->mail_id.'/3')?>" class="btn btn-success" alt="" rel="tooltip" data-toggle="tooltip" data-placement="left" title="Download Petikan Surat">
                  <i class="material-icons">cloud_download</i>
                </a>
              <?php elseif ($mail->mail_type == 4): ?>
                <a href="<?=site_url('outmail/exportFile/'.$mail->mail_id.'/5')?>" class="btn btn-success" alt="" rel="tooltip" data-toggle="tooltip" data-placement="left" title="Download Salinan Surat">
                  <i class="material-icons">cloud_download</i>
                </a>
                <a href="<?=site_url('outmail/exportFile/'.$mail->mail_id.'/6')?>" class="btn btn-success" alt="" rel="tooltip" data-toggle="tooltip" data-placement="left" title="Download Petikan Surat">
                  <i class="material-icons">cloud_download</i>
                </a>
                <a href="<?=site_url('outmail/exportFile/'.$mail->mail_id.'/7')?>" class="btn btn-success" alt="" rel="tooltip" data-toggle="tooltip" data-placement="left" title="Download Lampiran">
                  <i class="material-icons">cloud_download</i>
                </a>
                <a href="<?=site_url('outmail/exportFile/'.$mail->mail_id.'/8')?>" class="btn btn-success" alt="" rel="tooltip" data-toggle="tooltip" data-placement="left" title="Download Salinan Lampiran">
                  <i class="material-icons">cloud_download</i>
                </a>
                <a href="<?=site_url('outmail/exportFile/'.$mail->mail_id.'/9')?>" class="btn btn-success" alt="" rel="tooltip" data-toggle="tooltip" data-placement="left" title="Download Salinan Lampiran">
                  <i class="material-icons">cloud_download</i>
                </a>
              <?php elseif ($mail->mail_type == 12): ?>
                <a href="<?=site_url('outmail/exportFile/'.$mail->mail_id.'/13')?>" class="btn btn-success" alt="" rel="tooltip" data-toggle="tooltip" data-placement="left" title="Download Lampiran">
                  <i class="material-icons">cloud_download</i>
                </a>
              <?php endif; ?>
              <a href="<?=site_url('outmail/edit/'.$mail->mail_id)?>" class="btn btn-warning" rel="tooltip" data-toggle="tooltip" data-placement="left" title="Edit Surat">
                <i class="material-icons">edit</i>
              </a>
              <button class="btn btn-danger" onclick="deleteOutmail(<?= $mail->mail_id?>)" rel="tooltip" data-toggle="tooltip" data-placement="left" title="Hapus Surat">
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
