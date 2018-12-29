<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <div class="card-title">
                    <h4>Memperbaharui Peminjaman Barang</h4>
                    <p class="status-edit"></p>
                  </div>
                  <p class="card-category">Data Peminjaman di bawah ini</p>
                </div>
                <div class="card-body">
                    <span class="small"> <i>Ubah Langsung di kolom yang tersedia</i></span>
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label>Nama Peminjam</label>
                          <input type="text" class="form-control field-text-pinjam" jenis="nama" name="nama-barang" id="update-nama-peminjam" autocomplete="off" value="<?= $detail_pinjam->nama_peminjam ?>">
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="">Tanggal Pinjam</label>
                          <input class="form-control data-pinjaman" name="tanggal-lapor" id="update-tanggal-pinjam" type="date" autocomplete="off" value="<?= date('Y-m-d',strtotime($detail_pinjam->tgl_pinjam))?>" jenis="pinjam">
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="">Tanggal Kembali</label>
                          <input class="form-control data-pinjaman" name="tanggal-kembali" id="update-tanggal-kembali" type="date" autocomplete="off" value="<?= date('Y-m-d',strtotime($detail_pinjam->tgl_kembali))?>" jenis="kembali">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Tujuan Peminjaman</label>
                                <input type="text" class="form-control field-text-pinjam" jenis="tujuan" name="tujuan-pinjam" id="tujuan-pinjam" autocomplete="off" value="<?= $detail_pinjam->tujuan ?>">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>No Telephone</label>
                                <input type="text" class="form-control field-text-pinjam" jenis="telp" name="no-telp" id="no-telp" autocomplete="off" value="<?= $detail_pinjam->telp ?>">
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group">
                                <label>Barang yang akan dipinjam</label>
                                <textarea class="form-control field-text-pinjam" name="barang-akan-pinjam" jenis="barang_dipinjam" id="barang-akan-pinjam" cols="30" rows="3"><?= $detail_pinjam->barang_akan_dipinjam ?></textarea>
                            </div>
                        </div>
                    </div>
                    <?php if($this->session->userdata('user_level') == 1 || $this->session->userdata('user_level') == 2){?>
                        <div class="row">
                            <div class="col-md-9">
                                <table class="w-100">
                                    <thead>
                                        <th class="pt-2 pb-2 w-75">Nama</th>
                                        <th class="pt-2 pb-2 text-center w-25">Jumlah</th>
                                        <th class="pt-2 pb-2 text-right">
                                            <button class="btn btn-success add-barang-edit">
                                                <i class="material-icons">add</i>
                                            </button>
                                        </th>
                                    </thead>
                                    <tbody id="item_edit_table">
                                        <?php foreach($list_barang as $lb){ 
                                            $random = md5(mt_rand(1,10000));
                                            $first = substr($random,0,5);
                                            $last = substr($random,5,10);
                                            $id_item = $first.$lb->id.$last;
                                            ?>
                                        <tr id-item="<?= $id_item?>">
                                            <td class="pt-2 pb-2 text-left form-group">
                                                <select class="form-control nama-barang-dipinjam" name="nama-barang" id="nama-barang">
                                                    <option value="<?= $lb->nama?>" disabled selected id-barang="<?= $lb->id_barang?>" jenis-barang="<?= $lb->jenis?>" nomor-barang="<?= $lb->nomor_barang?>"><?= $lb->nama?></option>
                                                    <?php foreach($list_data as $data){?>
                                                        <option value="<?= $data->nama_barang?>" id-barang="<?= $data->id?>" jenis-barang="<?= $data->jenis?>" nomor-barang="<?= $data->nomor?>"><?= $data->nama_barang ?></option>
                                                    <?php }?>
                                                </select>
                                            </td>
                                            <td class="pt-2 pb-2 form-group pl-4">
                                                <?php if($lb->jenis == 1 || $lb->jenis == 2){?>
                                                    <input class="form-control text-right jumlah_barang_dipinjam" type="number" value="<?= $lb->jumlah?>">
                                                <?php }else{?>
                                                    <input class="form-control text-right jumlah_barang_dipinjam" disabled type="number" value="<?= $lb->jumlah?>">
                                                <?php }?>
                                            </td>
                                            <td class="pl-3">
                                                <button class="btn btn-danger btn-hapus-barang">
                                                    <i class="material-icons">delete</i>
                                                </button>
                                            </td>
                                        </tr>
                                        <?php }?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-md-1 mt-2">
                                <button class="btn btn-success approved-pinjam" rel="tooltip" data-toggle="tooltip" data-placement="top" title="Approved Pinjaman">
                                    <i class="material-icons">check_circle_outline</i>
                                </button>
                            </div>
                        </div>
                    <?php }?>              
                    <?php
                     $random = md5(mt_rand(1,10000));
                     $first = substr($random,0,5);
                     $last = substr($random,5,10);
                     $id_peminjaman = $first.$detail_pinjam->id.$last;
                    ?>
                    <input type="hidden" value="<?= $id_peminjaman;?>" id="id-pinjam">
                </div>
              </div>
            </div>
        </div>
    </div>
</div>