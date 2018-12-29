<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-9">
              <div class="card">
                <div class="card-header card-header-success">
                  <h4 class="card-title">Buat Data Master</h4>
                  <p class="card-category">Masukan Data BMN atau ART di bawah ini</p>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Nomor</label>
                                <input value="<?= $list_data->nomor?>" type="text" class="form-control" name="nomor" id="edit-nomor" autocomplete="off" required>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group">
                            <label>Nama Barang</label>
                            <input value="<?= $list_data->nama_barang?>" type="text" class="form-control" name="nama-barang" id="edit-nama-barang" autocomplete="off" required>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Jumlah</label>
                                <input value="<?= $list_data->jumlah?>" type="number" min="0" class="form-control" name="jumlah" id="edit-jumlah" autocomplete="off" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="">Tahun Kontrak</label>
                                <input value="<?= $list_data->tahun_kontrak?>" class="form-control" name="tahun-kontrak" id="edit-tahun-kontrak" type="text" autocomplete="off" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="">Rekanan</label>
                                <input value="<?= $list_data->rekanan?>" class="form-control" name="rekanan" id="edit-rekanan" type="text" autocomplete="off" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group" style="margin-top: 20px;">
                                <select class="form-control pt-0" name="jenis-barang" id="edit-jenis-barang">
                                    <option value="0" disabled>Jenis</option>
                                    <?php if($list_data->jenis === '1'){?>
                                        <option value="1" selected>BMN</option>
                                        <option value="2">ART</option>
                                        <option value="3">Kendaraan</option>
                                    <?php }elseif($list_data->jenis === '2'){?>
                                        <option value="1">BMN</option>
                                        <option value="2" selected>ART</option>
                                        <option value="3">Kendaraan</option>
                                    <?php }elseif($list_data->jenis === '3'){?>
                                        <option value="1">BMN</option>
                                        <option value="2">ART</option>
                                        <option value="3" selected>Kendaraan</option>
                                    <?php }?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group" style="margin-top: 20px;">
                                <select class="form-control pt-0" name="status-barang" id="edit-status-barang">
                                    <option value="0" disabled>Status</option>
                                    <?php if($list_data->status === 'Baik'){?>
                                        <option value="Baik" selected>Baik</option>
                                        <option value="Rusak">Rusak</option>
                                    <?php }elseif($list_data->status === 'Rusak'){?>
                                        <option value="Baik">Baik</option>
                                        <option value="Rusak" selected>Rusak</option>
                                    <?php }?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <?php
                         $random = md5(mt_rand(1,10000));
                         $first = substr($random,0,5);
                         $last = substr($random,5,10);
                         $id = $first.$list_data->id.$last;
                    ?>
                    <button class="btn btn-success pull-right" id="btn-update-data-master" id-data="<?= $id?>">Perbarui Data</button>
                </div>
              </div>
            </div>
        </div>
    </div>
</div>
