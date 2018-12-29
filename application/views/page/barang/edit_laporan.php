<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-9">
              <div class="card">
                <div class="card-header card-header-info">
                  <h4 class="card-title">Revisi Laporan Kerusakan</h4>
                  <p class="card-category">Berikut Data Laporan Kerusakan di bawah ini</p>
                </div>
                <div class="card-body">
                <form enctype="multipart/form-data" id="form-update-laporan" method="post">
                    <div class="row">
                      <div class="col-md-5">
                        <div class="form-group">
                          <label>Nama Fasilitas</label>
                          <input type="text" class="form-control" name="nama-barang" id="nama-barang" autocomplete="off" value="<?= $detail_laporan->nama_barang;?>">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group" style="margin-top: 22px;">
                          <select  class="form-control" name="divisi" id="divisi">
                            <?php foreach($divisi as $d){?>
                              <option value="<?= $d->nama_divisi;?>" <?php if($detail_laporan->divisi === $d->nama_divisi){ echo 'selected'; }?>><?= $d->nama_divisi;?></option>
                            <?php }?>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="">Tanggal Pelaporan</label>
                          <input class="form-control" name="tanggal-lapor" id="tanggal-lapor" type="date" autocomplete="off" value="<?= date('Y-m-d',strtotime($detail_laporan->tgl_lapor))?>">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Keterangan</label>
                                <div class="form-group">
                                    <label class="bmd-label-floating">Tuliskan Keterangan Kerusakan</label>
                                    <textarea class="form-control" rows="5" name="keterangan-rusak" id="keterangan-rusak"><?= $detail_laporan->keterangan;?></textarea>
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
                                        $id = $first.$detail_laporan->id.$last;
                                    ?>
                                    <input type="hidden" value="<?= $id;?>" id="laporan-id" name="laporan-id">
                                    <input type="file" name="gambar-barang" id="edit-file-barang" accept=".jpeg, .jpg, .png, .JPEG, .PNG">
                                    <img class="mb-4" src="<?= base_url(UPLOAD_PATH_KERUSAKAN.$detail_laporan->gambar)?>" alt="" id="pictview" width="150">
                                    <?php if($detail_laporan !== ''){?>
                                        <a style="color:#fff;width:45%" class="btn btn-info btn-sm float-right" id="edit-foto-barang">Pilih Gambar</a>
                                        <a class="btn btn-danger btn-sm float-left" id="hapus-foto-barang-edit" style="color:#fff;">Hapus Gambar</a>
                                    <?php }else{?>
                                        <a style="color:#fff;" class="btn btn-info" id="edit-foto-barang">Pilih Gambar</a>
                                    <?php }?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <input class="btn btn-info pull-right" type="submit" value="update" id="update-kerusakan">
                  </form>
                </div>
              </div>
            </div>
        </div>
    </div>
</div>
