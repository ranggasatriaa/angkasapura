<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-9">
              <div class="card">
                <div class="card-header card-header-danger">
                  <h4 class="card-title">Buat Permintaan Baru</h4>
                  <p class="card-category">Masukan Data Permintaan di bawah ini</p>
                </div>
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-5">
                      <div class="form-group">
                        <label class="">Nama Pengaju</label>
                        <input class="form-control" name="nama" id="nama-pengaju" type="text" autocomplete="off">
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label class="">NIP</label>
                        <input class="form-control" name="nip" id="nip-pengaju" type="text" autocomplete="off">
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <label class="">Tanggal Pengajuan</label>
                        <input class="form-control" name="tanggal" id="tanggal-ajuan" type="date" autocomplete="off">
                      </div>
                    </div>
                  </div>
                  <div class="row" id="list-atk">
                      <div class="col-md-5">
                        <div class="form-group">
                          <label class="">Nama Fasilitas</label>
                          <input type="text" class="form-control" name="nama-atk" id="nama-atk" autocomplete="off">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="">Jumlah Barang</label>
                          <input class="form-control" type="number" min="0" name="jumlah-atk" id="jumlah-atk">
                        </div>
                      </div>
                      <div class="col-md-3">
                          <button class="btn btn-success pull-right" id="add-list-atk">
                            <i class="material-icons">add</i>Tambah ATK
                          </button>
                      </div>
                    </div>
                    <div class="list-added-atk">
                    </div>
                    <button class="btn btn-danger pull-right" id="btn-minta-atk">Proses</button>
                </div>
              </div>
            </div>
        </div>
    </div>
</div>
