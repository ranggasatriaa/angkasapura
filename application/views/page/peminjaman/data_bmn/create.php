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
                                <input type="text" class="form-control" name="nomor" id="nomor" autocomplete="off" required>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group">
                            <label>Nama Barang</label>
                            <input type="text" class="form-control" name="nama-barang" id="nama-barang" autocomplete="off" required>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Jumlah</label>
                                <input type="number" min="0" class="form-control" name="jumlah" id="jumlah" autocomplete="off" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="">Tahun Kontrak</label>
                                <input class="form-control" name="tahun-kontrak" id="tahun-kontrak" type="text" autocomplete="off" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="">Rekanan</label>
                                <input class="form-control" name="rekanan" id="rekanan" type="text" autocomplete="off" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group" style="margin-top: 20px;">
                                <select class="form-control pt-0" name="jenis-barang" id="jenis-barang">
                                    <option value="0" selected disabled>Jenis</option>
                                    <option value="1">BMN</option>
                                    <option value="2">ART</option>
                                    <option value="3">Kendaraan</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group" style="margin-top: 20px;">
                                <select class="form-control pt-0" name="status-barang" id="status-barang">
                                    <option value="0" selected disabled>Status</option>
                                    <option value="Baik">Baik</option>
                                    <option value="Rusak">Rusak</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-success pull-right" id="btn-tambah-data-master">Simpan Data</button>
                </div>
              </div>
            </div>
        </div>
    </div>
</div>
