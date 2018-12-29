<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-danger">
            <h4 class="card-title">Ubah Surat</h4>
            <p class="card-category">Masukan Data dibawah sesuai Surat Keluar</p>
          </div>
          <div class="card-body">
            <div class="row">
              <?php $i=1; foreach ($contents as $content):
                if ($content->type=='date'):
                  ?>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label class=""><?=ucwords($content->name)?></label>
                      <input type="<?= $content->type?>" class="form-control" name="<?= $content->code?>"  value="<?= $content->content?>" required>
                      <small class="form-text text-muted"><?= $content->description?></small>
                    </div>
                  </div>
                <?php elseif($content->type=='pegawai'):?>
                  <div class="col-md-12">
                    <div class="form-group ">
                      <label class=""><?=ucwords($content->name)?></label>
                      <select class="form-control" name="<?= $content->code ?>" required>
                        <option value="">- Pilih Pegawai - </option>
                        <?php foreach ($pegawais as $pegawai): ?>
                          <?php list($nama, $nip, $position, $functional, $pangkat) = preg_split("/[|]+/", $content->content); ?>
                          <option <?= $nama == $pegawai->user_name ? 'selected' : ''?> value="<?= $pegawai->user_name?>|<?=empty($pegawai->user_nip) ? '-' : $pegawai->user_nip?>|<?=empty($pegawai->user_position) ? '-' : $pegawai->user_position?>|<?=empty($pegawai->user_functional) ? '-' : $pegawai->user_functional?>|<?=empty($pegawai->user_rank) ? '-' : $pegawai->user_rank?>">
                          <?= $pegawai->user_name ?>
                        </option>
                      <?php endforeach; ?>
                    </select>
                    <small class="form-text text-muted"><?= $content->description ?></small>
                  </div>
                </div>
              <?php elseif($content->type=='multiple'):?>
                <div class="col-md-12">
                  <div  class="form-group">
                    <label id="labelMultiple"><?=ucwords($content->name)?> Poin <?= $content->content_order?></label>
                    <input id="inputMultiple" class="form-control" type="text" name="<?= $content->code.$content->content_order?>" value="<?= $content->content?>" required/>
                    <small id="messageMultiple" class="form-text text-muted"><?= $content->description?> poin <?= $i?> </small>
                  </div>
                </div>
                <?php $i++; else:?>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label class="bmd-label-floating"><?=ucwords($content->name)?></label>
                      <input type="<?= $content->type?>" class="form-control" name="<?= $content->code?>" value="<?= $content->content?>" required>
                      <small class="form-text text-muted"><?= $content->description?></small>
                    </div>
                  </div>
                <?php endif;
                ?>
                <input id="mail_type" type="hidden" name="mail_type" value="<?= $content->mail_type?>">
              <?php endforeach; ?>
              <input type="hidden" name="mail_id" value="<?= $mail_id?>">
            </div>
            <a class="btn btn-default pull-left" href="<?=site_url('outmail/detail/'.$mail_id)?>">Kembali</a>
            <button class="btn btn-danger pull-right" id="simpanUpdateSuratKeluar">Selesai</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
