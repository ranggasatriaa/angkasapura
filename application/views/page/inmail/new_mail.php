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
                  <form enctype="multipart/form-data" id="form-surat-masuk">
                    <div class="row">
                      <div class="col-md-5">
                        <div class="form-group">
                          <label class="bmd-label-floating">Nomor Surat</label>
                          <input type="text" class="form-control" name="nomorSurat" id="nomorSuratMasuk">
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="bmd-label-floating">Perihal</label>
                          <input type="text" class="form-control" name="subjekSurat" id="subjekSuratMasuk">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="">Tanggal Surat</label>
                          <input class="form-control" type="date" name="tanggalKirim" id="tanggalKirimSurat">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Pengirim</label>
                          <input type="text" class="form-control" name="pengirimSurat" id="pengirimSuratMasuk">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Penerima</label>
                          <input type="text" class="form-control" name="penerimaSurat" id="penerimaSuratMasuk">
                        </div>
                      </div>
                    </div>                    
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Isi Surat Masuk</label>
                          <div class="form-group">
                            <label class="bmd-label-floating">Tuliskan isi surat masuk disini</label>
                            <textarea class="form-control" rows="5" id="isiSuratMasuk" name="isiSuratMasuk"></textarea>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                          <div class="form-group">
                            <label>Hasil Scan Surat</label>
                            <div class="form-group text-center">
                                <input type="file" name="gambar-surat" id="gambar-surat" accept=".jpeg, .jpg, .png, .JPEG, .PNG">
                                <img class="mb-4" src="" alt="" id="fotosurat" width="150">
                                <div class="tools-pict text-center">
                                  <a style="color:#fff;" class="btn btn-info" id="pilih-foto-surat">Pilih Gambar</a>
                                  <a class="btn btn-danger btn-sm" id="hapus-foto-surat" style="visibility:hidden;color:#fff;">Hapus Gambar</a>
                                </div>
                            </div>
                          </div>
                      </div>
                    </div>
                    <button class="btn btn-info pull-right" type="submit" id="simpanSuratMasuk">Simpan Surat Masuk</button>
                    <div class="clearfix"></div>
                  </form>
                </div>
              </div>
            </div>
        </div>
    </div>
</div>