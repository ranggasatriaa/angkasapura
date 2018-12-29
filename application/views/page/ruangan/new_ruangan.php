<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-warning">
            <h4 class="card-title"> Ruang Baru</h4>
            <p class="card-category">Masukan Data dibawah sesuai Data ruangan yang ingin di tambahkan</p>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-md-3">
                <div class="form-group">
                  <label>Nama Ruangan</label>
                  <input type="text" class="form-control required" name="ruangan" value="" autofocus>
                  <small class="form-text text-muted"></small>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label>Lokasi Ruangan</label>
                  <input type="text" class="form-control required" name="lokasi" value="" >
                  <small class="form-text text-muted"></small>
                </div>
              </div>
              <div class="col-md-2">
                <div class="form-group">
                  <label>Kapasitas Ruangan</label>
                  <input type="number" min="1" class="form-control required" name="kapasitas" value="">
                  <small class="form-text text-muted"></small>
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group pull-right">
                <button class="btn btn-success" id="simpanRuangan">Selesai</button>
                <a href="<?= site_url('ruangan')?>" class="btn btn-default">Batal</a>
              </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
