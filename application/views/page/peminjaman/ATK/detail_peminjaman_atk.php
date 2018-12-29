<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-10">
              <div class="card">
                <div class="card-header card-header-info">
                  <h4 class="card-title">Detail Pengajuan Permintaan ATK</h4>
                </div>
                <div class="card-body detail">
                    <div class="row pt-3">
                        <div class="col-md-6 pl-5">  
                            <div class="detail-kerusakan">
                                <label for="">Nama Pengaju</label>
                                <p class="pl-2 detail-data"><?= $detail_pinjam->nama?></p>
                            </div>
                            <div class="detail-kerusakan">
                                <label for="">NIP</label>
                                <p class="pl-2 detail-data"><?= $detail_pinjam->nip?></p>
                            </div>
                            <div class="detail-kerusakan">
                                <label for="">Tanggal</label>
                                <p class="pl-2 detail-data"><?= $this->customlib->format_date_indonesia($detail_pinjam->tanggal)?></p>
                            </div>
                        </div>
                        <div class="col-md-6 detail">
                            <table class="w-75">
                                <thead>
                                    <th class="pt-2 pb-2 text-left">Nama</th>
                                    <th class="pt-2 pb-2 text-right">Jumlah</th>
                                </thead>
                                <tbody>
                                    <?php foreach($list_atk as $la){ ?>
                                    <tr>
                                        <td class="pt-2 pb-2 text-left"><?= $la->nama_atk?></td>
                                        <td class="pt-2 pb-2 text-right"><?= $la->jumlah?></td>
                                    </tr>
                                    <?php }?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
              </div>
            </div>
            <div class="col-md-2">
              <div class="card card-add-mail">
                <div class="card-body text-center">
                    <div class="td-actions">
                        <?php
                            $random = md5(mt_rand(1,10000));
                            $first = substr($random,0,5);
                            $last = substr($random,5,10);
                            $id = $first.$detail_pinjam->id.$last;
                        ?>
                        <a href="<?= base_url('edit-permintaan-atk/'.$id)?>" rel="tooltip" class="btn btn-success" data-toggle="tooltip" data-placement="left" title="Edit Pengajuan Peminjaman ">
                            <i class="material-icons">edit</i>
                        </a>
                        <a rel="tooltip" class="btn btn-danger btn-hapus-pengajuan" data-toggle="tooltip" data-placement="left" title="Hapus Laporan Kerusakan" id-pinjaman="<?= $id;?>">
                            <i class="material-icons" style="color:#fff">close</i>
                        </a>
                    </div>
                </div>
              </div>
            </div>
        </div>
    </div>
</div>