<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-danger">
            <h4 class="card-title">Tambah Pegawai Baru</h4>
            <p class="card-category">Masukan Data dibawah sesuai data pengawai baru</p>
          </div>
          <div class="card-body">
            <div id="form" class="row justify-content-center">
              <div class="col-md-5">
                <div class="form-group">
                  <label>Nama Lengkap <small>(Wajib diisi)</small> </label>
                  <input type="text" class="form-control required" name="name" autofocus >
                  <small class="form-text text-muted message"></small>
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label>NIP</label>
                  <input type="text" class="form-control" name="nip" onblur="validateNip(this)">
                  <small id="nip_message">Masukan nip tanpa spasi</small>
                </div>
              </div>
              <div class="col-md-4">
                <div class="from-group">
                  <label>Golongan</label>
                  <select class="form-control" name="rank">
                    <option value="">- Pilih Posisi Pegawai -</option>
                    <?php foreach ($ranks as $rank): ?>
                      <option value="<?= $rank->rank ?>"> <?= $rank->rank ?> </option>
                    <?php endforeach; ?>
                  </select>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label>Jabatan Struktural</label>
                  <input type="text" class="form-control " name="position">
                  <small class="form-text text-muted">Contoh: Anggota Subbagian Administrasi </small>
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label>Jabatan Functional</label>
                  <input type="text" class="form-control" name="functional">
                  <small class="form-text text-muted">Contoh: Pengadministrasi Umum </small>
                </div>
              </div>
              <div class="col-md-5  ">
                <div class="from-group">
                  <label>Alamat Domisili </label>
                  <input type="text" class="form-control" name="address" >
                  <small class="form-text text-muted message"></small>
                  <!-- <small class="form-text text-muted">Contoh: Jl. Raya Muktar, Sawangan, Bojongsari, Depok</small> -->
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label>Pendidikan Formal</label>
                  <input type="text" class="form-control" name="education">
                  <small class="form-text text-muted">Contoh: S1</small>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label>E-mail</label>
                  <input type="email" class="form-control" name="email" onblur="validateEmail(this)">
                  <small class="form-text text-muted" id="email_message">Contoh: example@example.com</small>
                </div>
              </div>
            </div>
            <button class="btn btn-danger pull-right simpan" id="simpanPegawaiBaru">Tambah Pengguna</button>
            <button class="btn btn-danger pull-right cek-input" id="cekInput" onclick="swal('Cek Masukkan', 'Ada masukan yang tidak valid! Coba kembali', 'error')" style="display:none">Tambah Pengguna</button>
            <div class="clearfix"></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
