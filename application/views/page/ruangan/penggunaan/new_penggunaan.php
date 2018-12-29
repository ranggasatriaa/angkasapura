<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-info">
            <h4 class="card-title">Permintaan Penggunaan Ruang Baru</h4>
            <p class="card-category">Masukan Data dibawah sesuai Data ruangan yang ingin di gunakan</p>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-md-3">
                <div class="form-group">
                  <label>Tanggal Mulai</label>
                  <input type="date" class="form-control required" name="tanggal_mulai" value="" autofocus>
                  <small class="form-text text-muted"></small>
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label>Waktu Mulai</label>
                  <input type="time" class="form-control required" name="waktu_mulai" value="" >
                  <small class="form-text text-muted"></small>
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label>Tanggal Selesai</label>
                  <input type="date" class="form-control required" name="tanggal_selesai" value="" >
                  <small class="form-text text-muted"></small>
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label>Waktu Selesai</label>
                  <input type="time" class="form-control required" name="waktu_selesai" value="" >
                  <small class="form-text text-muted"></small>
                </div>
              </div>
              <div class="col-md-7">
                <div class="form-group">
                  <label>Tujuan Penggunaan</label>
                  <input type="text" class="form-control required" name="tujuan" value="" >
                  <small class="form-text text-muted"></small>
                </div>
              </div>
              <div class="col-md-5">
                <div class="form-group">
                  <label>Ruang yang dibutuhkan</label>
                  <input type="text" class="form-control required" name="permintaan_ruangan" value="" >
                  <small class="form-text text-muted">Conton: Ruang sidang dengan kapasitas 60 orang</small>
                </div>
              </div>
              <div class="col-md-5">
                <div class="form-group">
                  <label>Nama Peminjam</label>
                  <input type="text" class="form-control required" name="peminjam" value="">
                  <small class="form-text text-muted"></small>
                </div>
              </div>
              <div class="col-md-5">
                <div class="form-group">
                  <label>Nomor Telfon Peminjam</label>
                  <input type="number" min="0" class="form-control required" name="telepon" value="">
                  <small class="form-text text-muted">Contoh: 08645252678117</small>
                </div>
              </div>
              <div class="col-md-2">
                <div class="form-group">
                <button class="btn btn-info  pull-right" id="simpanPenggunaan">Selesai</button>
              </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
