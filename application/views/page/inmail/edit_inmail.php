<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-11">
              <div class="card">
                <div class="card-header card-header-info">
                  <h4 class="card-title">Buat Surat</h4>
                  <p class="card-category">Masukan Data dibawah sesuai Surat Masuk</p>
                </div>
                <div class="card-body">
                  <form enctype="multipart/form-data" id="form-edit-surat-masuk">
                    <div class="row">
                      <div class="col-md-5">
                        <div class="form-group">
                          <label class="bmd-label-floating">Nomor Surat</label>
                          <input type="text" class="form-control" name="nomor-surat" id="nomorSuratMasukUpdate" value="<?php echo $detailsurat->nomor;?>" required>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="bmd-label-floating">Perihal</label>
                          <input type="text" class="form-control" name="subjek-surat" id="subjekSuratMasukUpdate" value="<?php echo $detailsurat->perihal;?>" required>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Tanggal Pengirim</label>
                          <input type="date" class="form-control" name="tanggal-kirim" id="tanggalKirimSuratUpdate" value="<?php echo date('Y-m-d',strtotime($detailsurat->tanggal));?>" required>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Pengirim</label>
                          <input type="text" class="form-control" name="pengirim-surat" id="pengirimSuratMasukUpdate" value="<?php echo $detailsurat->dari;?>" required>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Penerima</label>
                          <input type="text" class="form-control" name="penerima-surat" id="penerimaSuratMasukUpdate" value="<?php echo $detailsurat->untuk;?>" required>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Isi Surat Masuk</label>
                          <div class="form-group">
                            <label class="bmd-label-floating">Tuliskan isi surat masuk disini</label>
                            <textarea class="form-control" rows="5" name="isi-surat-masuk" required><?php echo $detailsurat->isi;?></textarea>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-5">
                          <div class="form-group">
                              <label>Foto Kerusakan</label>
                              <div class="form-group text-center">
                                  <?php
                                      $random = md5(mt_rand(1,10000));
                                      $first = substr($random,0,5);
                                      $last = substr($random,5,10);
                                      $id = $first.$detailsurat->id.$last;
                                  ?>
                                  <input type="hidden" value="<?= $id;?>" id="laporan-id" name="laporan-id">
                                  <input type="file" name="foto-surat-masuk" id="edit-foto-surat-masuk" accept=".jpeg, .jpg, .png, .JPEG, .PNG">
                                  <img class="mb-4" src="<?= base_url(UPLOAD_PATH_INMAIL.$detailsurat->gambar)?>" alt="" id="fotosurat" width="150">
                                  <div class="tools-pict">
                                    <?php if($detailsurat->gambar !== ''){?>
                                        <a style="color:#fff;width:45%" class="btn btn-info btn-sm" id="btn-foto-surat-masuk">Pilih Gambar</a>
                                        <a class="btn btn-danger btn-sm" id="edit-hapus-foto-surat" style="color:#fff;" id-surat="<?= $id?>">Hapus Gambar</a>
                                    <?php }else{?>
                                        <a style="color:#fff;" class="btn btn-info" id="btn-foto-surat-masuk">Pilih Gambar</a>
                                    <?php }?>
                                  </div>
                              </div>
                          </div>
                      </div>
                    </div>
                    <input type="hidden" name="id-surat" value="<?= $id?>">
                    <button class="btn btn-info pull-right" type="submit" id="update-surat-masuk">Simpan Surat Masuk</button>
                    <div class="clearfix"></div>
                  </form>
                </div>
              </div>
            </div>
        </div>
    </div>
</div>
