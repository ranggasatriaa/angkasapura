<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-10">
              <div class="card">
                <div class="card-header card-header-success">
                  <h4 class="card-title">Buat Agenda Personil</h4>
                  <p class="card-category">Masukan Data Agenda Personil di bawah ini</p>
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
                          <label>Tanggal Mulai Kegiatan</label>
                          <input type="date" class="form-control" name="tgl-agenda" id="tgl-mulai" autocomplete="off" required>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label>Tanggal Selesai Kegiatan</label>
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
                    <div class="row">
                      <div class="col-md-10">
                        <table>
                          <thead>
                            <th class="w-100">Nama Personil</th>
                            <th class="w-25"><button class="btn btn-success pull-right" id="btn-tambah-personil">Tambah Personil</button></th>
                          </thead>
                          <tbody id="list-personil">
                            <tr>
                              <td>
                                <div class="form-group">
                                  <select  class="form-control list-nama-personil" name="nama-personil" id="nama-personil">
                                    <option value="0" disabled selected>Pilih Personil</option>
                                    <?php foreach($pegawai as $p){?>
                                      <option value="<?= $p->user_name?>" id-pegawai="<?= $p->user_id?>" nip="<?= $p->user_nip?>"><?= $p->user_name?></option>
                                    <?php }?>
                                  </select>
                                </div>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                    <button class="btn btn-success pull-right" id="btn-tambah-agenda-personil">Simpan Agenda</button>
                </div>
              </div>
            </div>
        </div>
    </div>
</div>