<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Buat Peminjaman Baru</h4>
                  <p class="card-category">Masukan Data Peminjaman di bawah ini</p>
                </div>
                <div class="card-body">
                    <div class="row">
                      <div class="col-md-3">
                        <div class="form-group">
                          <label>Nama Peminjam</label>
                          <input type="text" class="form-control" name="nama-pinjam" id="nama-pinjam" autocomplete="off">
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="">Tanggal Pinjam</label>
                          <input class="form-control" name="tanggal-lapor" id="tanggal-pinjam" type="date" autocomplete="off">
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="">Tanggal Kembali</label>
                          <input class="form-control" name="tanggal-kembali" id="tanggal-kembali" type="date" autocomplete="off">
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label>No Telp</label>
                          <input type="number" class="form-control" name="no-telp" id="no-telp" autocomplete="off">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-3">
                          <div class="form-group">
                            <label>Tujuan Peminjaman</label>
                            <input type="text" class="form-control" name="tujuan-pinjam" id="tujuan-pinjam" autocomplete="off">
                          </div>
                      </div>
                      <div class="col-md-5">
                          <div class="form-group">
                            <label>Barang yang akan dipinjam</label>
                            <textarea class="form-control" name="barang-akan-pinjam" id="barang-akan-pinjam" cols="30" rows="3"></textarea>
                          </div>
                      </div>
                    </div>
                    <?php
                      $user_level = $this->session->userdata('user_level');
                      if( $user_level == 1 || $user_level == 0){?>
                        <div class="row">
                          <div class="col-md-10">
                            <table class="w-100">
                              <thead class="text-center">
                                <th>Nama</th>
                                <th class="w-25">Jumlah</th>
                                <th>
                                    <button class="btn btn-success" id="btn-add-barang-pinjam">
                                        <i class="material-icons">add</i>
                                    </button>
                                </th>
                              </thead>
                              <tbody id="table-barang-dipinjam">
                                  <tr>
                                    <td class="pt-2 pb-2 form-group">
                                      <select class="form-control" name="nama-barang" id="nama-barang">
                                        <option value="null" disabled selected>Pilih Barang</option>
                                        <?php foreach($list_data as $data){?>
                                          <option value="<?= $data->nama_barang?>" id-barang="<?= $data->id?>" jenis-barang="<?= $data->jenis?>" nomor-barang="<?= $data->nomor?>"><?= $data->nama_barang ?></option>
                                        <?php }?>
                                      </select>
                                    </td>
                                    <td class="pt-2 pb-2 pl-4 form-group">
                                        <input type="number" class="form-control" name="jumlah-barang" id="jumlah-barang" min="0">
                                    </td>
                                  </tr>
                              </tbody>
                            </table>
                          </div>
                        </div>
                      <?php }?>
                    <button class="btn btn-primary pull-right" id="btn-pinjam-fasilitas">Ajukan</button>
                </div>
              </div>
            </div>
        </div>
    </div>
</div>
