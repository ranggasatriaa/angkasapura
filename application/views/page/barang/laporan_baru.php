<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-9">
              <div class="card">
                <div class="card-header card-header-info">
                  <h4 class="card-title">Buat Laporan Kerusakan</h4>
                  <p class="card-category">Masukan Data Kerusakan di bawah ini</p>
                </div>
                <div class="card-body">
                <form enctype="multipart/form-data" id="form-lapor-rusak" action="<?= base_url()?>kerusakan/create_laporan" method="post">
                    <div class="row">
                      <div class="col-md-5">
                        <div class="form-group">
                          <label>Nama Fasilitas</label>
                          <input type="text" class="form-control" name="nama-barang" id="nama-barang" autocomplete="off">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group" style="margin-top: 22px;">
                          <select  class="form-control" name="divisi" id="divisi">
                            <option value="0" disabled selected>Pilih Divisi</option>
                            <?php foreach($divisi as $d){?>
                              <option value="<?= $d->nama_divisi;?>"><?= $d->nama_divisi;?></option>
                            <?php }?>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="">Tanggal Pelaporan</label>
                          <input class="form-control" name="tanggal-lapor" id="tanggal-lapor" type="date" autocomplete="off">
                        </div>
                      </div>
                    </div>                   
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Keterangan</label>
                          <div class="form-group">
                            <label class="bmd-label-floating">Tuliskan Keterangan Kerusakan</label>
                            <textarea class="form-control" rows="5" name="keterangan-rusak" id="keterangan-rusak"></textarea>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-5">
                          <div class="form-group">
                            <label>Foto Kerusakan</label> 
                            <div class="form-group text-center">
                                <input type="file" name="gambar-barang" id="file-barang" accept=".jpeg, .jpg, .png, .JPEG, .PNG">
                                <img class="mb-4" src="" alt="" id="pictview" width="150">
                                <a style="color:#fff;" class="btn btn-info" id="pilih-foto-barang">Pilih Gambar</a>
                                <a class="btn btn-danger btn-sm float-left" id="hapus-foto-barang" style="display:none;color:#fff;">Hapus Gambar</a>
                            </div>
                            <small><i>maksimal ukuran gambar 5MB</i></small>
                          </div>
                      </div>
                    </div>
                    <input class="btn btn-info pull-right" type="submit" value="upload" id="lapor-kerusakan">
                  </form>
                </div>
              </div>
            </div>
        </div>
    </div>
</div>