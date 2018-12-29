<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-9">
              <div class="card">
                <div class="card-header card-header-success">
                  <h4 class="card-title">Buat Agenda Kegiatan</h4>
                  <p class="card-category">Masukan Data Agenda Kegiatan di bawah ini</p>
                </div>
                <div class="card-body">
                    <div class="row">
                      <div class="col-md-7">
                        <div class="form-group">
                          <label>Nama Kegiatan</label>
                          <input type="text" class="form-control" name="nama-kegiatan" id="nama-kegiatan" autocomplete="off" required>
                        </div>
                      </div>
                      <div class="col-md-5">
                        <div class="form-group">
                          <label class="">Tempat Kegiatan</label>
                          <input class="form-control" name="tempat-kegiatan" id="tempat" type="text" autocomplete="off" required>
                        </div>
                      </div>
                    </div>                   
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label>Tanggal Mulai</label>
                          <input type="date" class="form-control" name="tgl-agenda" id="tgl-mulai" autocomplete="off" required>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label>Tanggal Selesai</label>
                          <input type="date" class="form-control" name="tgl-agenda" id="tgl-selesai" autocomplete="off" required>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="">Waktu Kegiatan</label>
                          <input class="form-control" name="waktu-kegiatan" id="waktu" type="time" min="6:00" max="22:00" autocomplete="off" required>
                        </div>
                      </div>
                    </div>
                    <button class="btn btn-success pull-right" id="btn-tambah-agenda-kegiatan">Simpan Agenda</button>
                </div>
              </div>
            </div>
        </div>
    </div>
</div>