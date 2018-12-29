<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-warning">
            <h4 class="card-title">Tambah Akses Pengguna Baru</h4>
            <p class="card-category">Isikan form dibawah ini sesuai dengan data pengguna baru</p>
          </div>
          <div class="card-body">
            <div id="form" class="row justify-content-center">
              <div class="col-md-4">
                <div class="form-group" >
                  <label>Nama Lengkap <small>(Wajib diisi)</small> </label>
                  <input  type="text" class="form-control required" name="name" required>
                  <small class="form-text text-muted message"></small>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label>Username<small>(Wajib diisi)</small></label>
                  <input type="text" class="form-control required" name="username">
                  <small class="form-text text-muted"></small>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label>E-mail</label>
                  <input type="email" class="form-control" name="email" onblur="validateEmail(this)">
                  <small class="form-text text-muted"></small>
                  <small class="form-text text-muted" id="email_message">Contoh: example@example.com</small>
                </div>
              </div>

              <div class="col-md-2">
                <div class="form-group" style="margin-top:-6px">
                  <label for="exampleFormControlSelect1">Level Akses<small>(Wajib diisi)</small> </label>
                  <select class="form-control required" name="level" id="exampleFormControlSelect1">
                    <option value="">- Pilih Level Akses</option>
                    <option value="1"><?= AKSES_1?></option>
                    <option value="2"><?= AKSES_2?></option>
                    <option value="3"><?= AKSES_3?></option>
                    <option value="4"><?= AKSES_4?></option>
                  </select>
                  <small class="form-text text-muted message"></small>
                </div>
              </div>
              <div class="col-md-5">
                <div class="form-group">
                  <label>Password <small>(Wajib diisi)</small> </label>
                  <input type="password" class="form-control required" name="password1" required >
                  <small class="form-text text-muted message"></small>
                </div>
              </div>
              <div class="col-md-5">
                <div class="form-group">
                  <label>Konfirmasi Password <small>(Wajib diisi)</small> </label>
                  <input type="password" class="form-control required" name="password2" required >
                  <small class="form-text text-muted confirm_message"></small>
                </div>
              </div>
            </div>
            <button class="btn btn-warning pull-right simpan" id="simpanAksesBaru">Tambah Pengguna</button>
            <button class="btn btn-warning pull-right cek-input" id="cekInput" onclick="swal('Cek Masukkan', 'Ada masukan yang tidak valid! Coba kembali', 'error')" style="display:none">Tambah Pengguna..</button>
            <div class="clearfix"></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
