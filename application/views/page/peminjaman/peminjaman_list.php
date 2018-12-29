<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-10">
              <div class="card">
                <div class="card-header card-header-info">
                  <h4 class="card-title float-left">Daftar Peminjaman BMN dan ART</h4>
                  <div class="card float-right search-bar-tools">
                        <div class="card-body">
                            <div class="input-group">
                                <input type="text" class="form-control" name="search-input" id="search-input" placeholder="Cari berdasarkan Nama Peminjam">
                                <button class="btn btn-info btn-round btn-just-icon btn-search-laporan"><i class="material-icons">search</i></button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-list-surat-masuk">
                        <thead>
                            <tr class="text-center">
                                <th>No</th>
                                <th>Nama Peminjam</th>
                                <th>Tanggal Pinjam</th>
                                <th>Tanggal Kembali</th>
                                <th class="text-right">Aksi</th>
                            </tr>
                        </thead>
                        <tbody id="list-laporan">
                        <?php
                            $user_level = $this->session->userdata('user_level');
                            $a = 1;
                            foreach ($pinjam as $p){
                            $random = md5(mt_rand(1,10000));
                            $first = substr($random,0,5);
                            $last = substr($random,5,10);
                            $id = $first.$p->id.$last;
                        ?>
                           <tr class="text-center">
                                <td><?= $a?></td>
                                <td><?= $p->nama_peminjam?></td>
                                <td><?= $this->customlib->format_date_indonesia($p->tgl_pinjam)?></td>
                                <?php if($p->tgl_kembali == '0000-00-00 00:00:00' || $p->tgl_kembali == ''){?>
                                    <td> <b> Belum Dikembalikan</b></td>
                                <?php }else{?>
                                    <td><?= $this->customlib->format_date_indonesia($p->tgl_kembali)?></td>
                                <?php }?>
                                <td class="td-actions text-right">
                                    <?php if($user_level == 1 || $user_level == 2){?>
                                        <a href="<?= base_url('print-pinjam/').$id?>" rel="tooltip" class="btn btn-primary" data-toggle="tooltip" data-placement="left" title="Print Peminjaman">
                                            <i class="material-icons">print</i>
                                        </a>
                                        <a rel="tooltip" class="btn btn-success btn-cek-kembali" data-toggle="tooltip" data-placement="top" title="Tandai Telah diKembalikan" id-pinjaman="<?= $id?>">
                                            <i class="material-icons" style="color:#fff">check</i>
                                        </a>
                                    <?php }?>
                                    <a href="<?= base_url('detail-pinjam/').$id?>" rel="tooltip" class="btn btn-info" data-toggle="tooltip" data-placement="top" title="Lihat Detail Pengajuan">
                                        <i class="material-icons">info</i>
                                    </a>
                                    <?php if($p->status == 0){?>
                                        <a href="<?= base_url('edit-pinjam/').$id?>" rel="tooltip" class="btn btn-warning" data-toggle="tooltip" data-placement="top" title="Edit Pengajuan">
                                            <i class="material-icons">edit</i>
                                        </a>
                                    <?php }?>
                                    <a rel="tooltip" class="btn btn-danger btn-hapus-pengajuan" data-toggle="tooltip" data-placement="bottom" title="Hapus Pengajuan" id-pinjaman="<?= $id?>">
                                        <i class="material-icons" style="color:#fff">close</i>
                                    </a>
                                </td>
                           </tr>
                            <?php $a++; }?>
                        </tbody>
                        <tbody id="list-laporan-cari"></tbody>
                    </table>
                </div>
              </div>
            </div>
            <div class="col-md-2">
              <div class="card card-add-mail">
                <a href="<?=site_url('pinjam-baru')?>" >
                  <div class="card-header card-header-info text-center" rel="tooltip" class="btn btn-warning" data-toggle="tooltip" data-placement="Top" title="Peminjaman Baru">
                    <i class="material-icons" style="font-size:55px">add</i>
                  </div>
                </a>
                <div class="card-body text-center">
                  <p class="bold">Peminjaman Baru
                  </p>
                </div>
              </div>
            </div>
        </div>
    </div>
</div>
