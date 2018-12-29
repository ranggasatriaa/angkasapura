<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-danger">
            <h4 class="card-title">Buat Surat</h4>
            <p class="card-category">Masukan Data dibawah sesuai Surat Keluar</p>
          </div>
          <div class="card-body">
            <div class="row">
              <?php foreach ($sections as $section):
                if ($section->type=='date'):
                  ?>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label class=""><?=ucwords($section->name)?></label>
                      <input type="<?= $section->type?>" class="form-control" name="<?= $section->code?>"  value="" required>
                      <small class="form-text text-muted"><?= $section->description?></small>
                    </div>
                  </div>
                <?php elseif($section->type=='pegawai'):?>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label class=""><?=ucwords($section->name)?></label>
                      <select class="form-control" name="<?= $section->code ?>" required>
                        <option value="">- Pilih Pegawai - </option>
                        <?php foreach ($pegawais as $pegawai): ?>
                          <option value="<?= $pegawai->user_name?>|<?=empty($pegawai->user_nip) ? '-' : $pegawai->user_nip?>|<?=empty($pegawai->user_position) ? '-' : $pegawai->user_position?>|<?=empty($pegawai->user_functional) ? '-' : $pegawai->user_functional?>|<?=empty($pegawai->user_rank) ? '-' : $pegawai->user_rank?>"><?= $pegawai->user_name ?> </option>
                        <?php endforeach; ?>
                      </select>
                      <small class="form-text text-muted"><?= $section->description ?></small>
                    </div>
                  </div>
                <?php elseif($section->type=='multiple'):?>
                </div>
                <div id="buildyourform">
                  <div class="row">
                    <div class="col-md-10">
                      <div  class="form-group">
                        <label id="labelMengingat"><?=ucwords($section->name)?> Poin 1</label>
                        <input id="inputMengingat" class="form-control" type="text" name="<?= $section->code?>[]" required/>
                        <small id="messageMengingat" class="form-text text-muted"><?= $section->description?> </small>
                      </div>
                    </div>
                    <div class="col-md-2">
                      <a  href="javascript:void(0);" class="add_button_mengingat" rel="tooltip" data-toggle="tooltip" data-placement="left" title="Tambah Poin"><span class="btn btn-success btn-block"><i class="material-icons">add</i></span></a>
                    </div>
                  </div>
                </div>
                <div class="row">
                <?php elseif($section->type=='pegawaihonor'): ?>
                </div>
                <div id="honorPegawai">
                  <div class="row">
                    <div class="col-md-6">
                      <div  class="form-group">
                        <label id="labelHonor"><?=ucwords($section->name)?> Pegawai Ke 1</label>
                        <select id="inputHonor" class="form-control" name="<?= $section->code?>[]" required>
                          <option value="">- Pilih Pegawai - </option>
                          <?php foreach ($pegawais as $pegawai): ?>
                            <option value="<?= $pegawai->user_name?>|<?=empty($pegawai->user_nip) ? '-' : $pegawai->user_nip?>|<?=empty($pegawai->user_position) ? '-' : $pegawai->user_position?>|<?=empty($pegawai->user_functional) ? '-' : $pegawai->user_functional?>|<?=empty($pegawai->user_rank) ? '-' : $pegawai->user_rank?>"><?= $pegawai->user_name ?> </option>
                          <?php endforeach; ?>
                        </select>
                        <small id="messageHonor" class="form-text text-muted"><?= $section->description?> </small>
                      </div>
                    </div>
                    <div class="col-md-2">
                      <div  class="form-group" style="margin-top:60px">
                        <label for="">Jumlah Jam</label>
                        <input class="form-control" min="1" type="number" name="jam[]" value="">
                        <small class="form-text text-muted">Jumlah jam </small>
                      </div>
                    </div>
                    <div class="col-md-2">
                      <div  class="form-group" style="margin-top:60px">
                        <label for="">Honor per Jam (Rp)</label>
                        <input class="form-control" min="0" type="number" name="honor[]" value="">
                        <small class="form-text text-muted">Honor Petugas </small>
                      </div>
                    </div>
                    <div class="col-md-2">
                      <a  href="javascript:void(1);" class="add_button_honor" rel="tooltip" data-toggle="tooltip" data-placement="left" title="Tambah Pegawai"><span class="btn btn-success btn-block"><i class="material-icons">add</i></span></a>
                    </div>
                  </div>
                </div>
                <div class="row">
                <?php elseif($section->type=='personil'): ?>
                </div>
                <div id="personil">
                  <div class="row">
                    <div class="col-md-10">
                      <div  class="form-group">
                        <label id="labelPersonil">Pilih <?=ucwords($section->name)?> Ke 1</label>
                        <select id="inputPersonil" class="form-control" name="<?= $section->code?>[]" required>
                          <option value="">- Pilih Pegawai - </option>
                          <?php foreach ($pegawais as $pegawai): ?>
                            <option value="<?= $pegawai->user_name?>|<?=empty($pegawai->user_nip) ? '-' : $pegawai->user_nip?>|<?=empty($pegawai->user_position) ? '-' : $pegawai->user_position?>|<?=empty($pegawai->user_functional) ? '-' : $pegawai->user_functional?>|<?=empty($pegawai->user_rank) ? '-' : $pegawai->user_rank?>"><?= $pegawai->user_name ?> </option>
                          <?php endforeach; ?>
                        </select>
                        <small id="messagePersonil" class="form-text text-muted"><?= $section->description?></small>
                      </div>
                    </div>
                    <div class="col-md-2">
                      <a  href="javascript:void(2);" class="add_button_personil" rel="tooltip" data-toggle="tooltip" data-placement="left" title="Tambah Pegawai"><span class="btn btn-success btn-block"><i class="material-icons">add</i></span></a>
                    </div>
                  </div>
                </div>
                <div class="row">
                <?php else:?>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label class="bmd-label-floating"><?=ucwords($section->name)?></label>
                      <input type="<?= $section->type?>" class="form-control" name="<?= $section->code?>" value="" required>
                      <small class="form-text text-muted"><?= $section->description?></small>
                    </div>
                  </div>
                <?php endif;
                ?>
                <input id="mail_type" type="hidden" name="mail_type" value="<?= $section->mail_type?>">
              <?php endforeach; ?>
            </div>
            <button class="btn btn-danger pull-right" id="simpanSuratKeluar">Selesai</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
