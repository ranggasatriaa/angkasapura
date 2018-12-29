<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-10">
              <div class="card">
                <div class="card-header card-header-info">
                  <h4 class="card-title">Detail Pengajuan Peminjaman Fasilitas</h4>
                </div>
                <div class="card-body detail">
                    <div class="row pt-3">
                        <div class="col-md-4">  
                            <div class="detail-kerusakan">
                                <label for="">Nama Peminjam</label>
                                <p class="pl-2 detail-data"><?= $detail_pinjam->nama_peminjam?></p>
                            </div>
                        </div>
                        <div class="col-md-3 detail">
                            <div class="detail-kerusakan">
                                <label for="">Tanggal Pinjam</label>
                                <p class="pl-2 detail-data"><?= $this->customlib->format_date_indonesia($detail_pinjam->tgl_pinjam)?></p>
                            </div>
                        </div>
                        <div class="col-md-5 detail">
                            <div class="detail-kerusakan">
                                <label for="">Tanggal Kembali</label>
                                <?php if($detail_pinjam->tgl_kembali == '0000-00-00 00:00:00'){?>
                                    <p class="pl-2 detail-data">Barang dipinjam Belum Di Kembalikan</p>
                                <?php }else{ ?>
                                    <p class="pl-2 detail-data"><?= $this->customlib->format_date_indonesia($detail_pinjam->tgl_kembali)?></p>
                                <?php }?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="detail-kerusakan">
                                <label for="">Tujuan</label>
                                <p class="pl-2 detail-data"><?= $detail_pinjam->tujuan?></p>
                            </div>  
                        </div>
                        <div class="col-md-3">
                            <div class="detail-kerusakan">
                                <label for="">No Telephone</label>
                                <p class="pl-2 detail-data"><?= $detail_pinjam->telp?></p>
                            </div>  
                        </div>
                        <div class="col-md-5">
                            <div class="detail-kerusakan">
                                <label for="">Status</label>
                                <?php if($detail_pinjam->status == 0){?>
                                    <p class="pl-2 detail-data">Sedang Dalam Proses Persetujuan</p>
                                <?php }else{?>
                                    <p class="pl-2 detail-data">Di Setujui</p>
                                <?php }?>
                            </div>  
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5">
                            <div class="detail-kerusakan">
                                <label for="">Barang Akan di Pinjam</label>
                                <p class="pl-2 detail-data"><?= $detail_pinjam->barang_akan_dipinjam?></p>
                            </div>  
                        </div>
                    </div>
                    <?php if($detail_pinjam->status == 1){?>
                        <div class="row">
                            <div class="col-md-10">
                                <table class="w-75">
                                    <thead>
                                        <th class="pt-2 pb-2 text-left">Nama</th>
                                        <th class="pt-2 pb-2 text-right">Jumlah</th>
                                    </thead>
                                    <tbody>
                                        <?php foreach($list_barang as $lb){
                                            if($lb !== '') { ?>
                                                <tr>
                                                    <td class="pt-2 pb-2 text-left"><?= $lb->nama?></td>
                                                    <td class="pt-2 pb-2 text-right"><?= $lb->jumlah?></td>
                                                </tr>
                                        <?php }else{?>
                                                <tr>
                                                    <td colspan="2">Belum ada data tercatat</td>
                                                </tr>
                                        <?php }
                                        }?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    <?php }?>
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
                        <a href="<?= base_url('edit-pinjam/'.$id)?>" rel="tooltip" class="btn btn-success" data-toggle="tooltip" data-placement="left" title="Edit Pengajuan Peminjaman ">
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