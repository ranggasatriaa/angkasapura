<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-warning">
            <h4 class="card-title">Ubah Ruang</h4>
            <p class="card-category">Masukan Data dibawah sesuai perubahan data ruangan</p>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-md-3">
                <div class="form-group">
                  <label>Nama Ruangan</label>
                  <input type="text" class="form-control required" name="ruangan" value="<?= $ruangan->nama_ruangan?>" autofocus>
                  <small class="form-text text-muted"></small>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label>Lokasi Ruangan</label>
                  <input type="text" class="form-control required" name="lokasi" value="<?= $ruangan->lokasi?>" >
                  <small class="form-text text-muted"></small>
                </div>
              </div>
              <div class="col-md-2">
                <div class="form-group">
                  <label>Kapasitas Ruangan</label>
                  <input type="number" min="1" class="form-control required" name="kapasitas" value="<?= $ruangan->kapasitas?>">
                  <small class="form-text text-muted"></small>
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group pull-right">
                  <input type="hidden" name="id" value="<?= $ruangan->id?>">
                  <button class="btn btn-success" id="simpanEditRuangan">Selesai</button>
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
