<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-azure">
            <h4 class="card-title">Permintaan Penggunaan Ruang Baru</h4>
            <p class="card-category">Masukan Data dibawah sesuai Data ruangan yang ingin di gunakan</p>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-md-3">
                <div class="form-group">
                  <label>Tanggal Mulai</label>
                  <input type="date" class="form-control required" name="tanggal_mulai" value="<?php echo $penggunaan->tanggal_mulai ?>" autofocus>
                  <small class="form-text text-muted"></small>
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label>Waktu Mulai</label>
                  <input type="time" class="form-control required" name="waktu_mulai" value="<?php echo $penggunaan->waktu_mulai ?>" >
                  <small class="form-text text-muted"></small>
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label>Tanggal Selesai</label>
                  <input type="date" class="form-control required" name="tanggal_selesai" value="<?php echo $penggunaan->tanggal_selesai ?>" >
                  <small class="form-text text-muted"></small>
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label>Waktu Selesai</label>
                  <input type="time" class="form-control required" name="waktu_selesai" value="<?php echo $penggunaan->waktu_selesai ?>" >
                  <small class="form-text text-muted"></small>
                </div>
              </div>
              <div class="col-md-7">
                <div class="form-group">
                  <label>Tujuan Penggunaan</label>
                  <input type="text" class="form-control required" name="tujuan" value="<?php echo $penggunaan->tujuan ?>" >
                  <small class="form-text text-muted"></small>
                </div>
              </div>
              <?php if ($penggunaan->status == 0): ?>
                <div class="col-md-5">
                  <div class="form-group">
                    <label>Ruang yang dibutuhkan</label>
                    <input type="text" class="form-control required" name="permintaan_ruangan" value=" <?php echo $penggunaan->permintaan_ruangan ?>" >
                    <small class="form-text text-muted">Conton: Ruang sidang dengan kapasitas 60 orang</small>
                  </div>
                </div>
              <?php else: ?>
                <div class="col-md-5">
                  <div class="form-group" style="margin-top:0px">
                    <label>Ruang yang dipilih</label>
                    <select class="form-control" name="ruangan" required>
                      <option value="">- Pilih Ruangan -</option>
                      <?php foreach ($ruangs as $ruang): ?>
                        <option <?= $penggunaan->ruangan==$ruang->id ? 'selected' : ''?> value="<?php echo $ruang->id ?>"><?php echo $ruang->nama_ruangan.' kapasitas '.$ruang->kapasitas.' orang' ?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                </div>
              <?php endif; ?>
              <div class="col-md-5">
                <div class="form-group">
                  <label>Nama Peminjam</label>
                  <input type="text" class="form-control required" name="peminjam" value="<?php echo $penggunaan->peminjam ?>">
                  <small class="form-text text-muted"></small>
                </div>
              </div>
              <div class="col-md-5">
                <div class="form-group">
                  <label>Nomor Telfon Peminjam</label>
                  <input type="number" min="0" class="form-control required" name="telepon" value="<?php echo $penggunaan->telepon ?>">
                  <small class="form-text text-muted">Contoh: 08645252678117</small>
                </div>
              </div>
              <div class="col-md-2">
                <div class="form-group">
                  <input type="hidden" name="status" value="<?php echo $penggunaan->status ?>">
                  <input type="hidden" name="id" value="<?php echo $penggunaan->id ?>">
                  <input type="hidden" name="id" value="<?= $penggunaan->id?>">
                  <button class="btn btn-primary pull-right" id="simpanEditPenggunaan">Selesai</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
