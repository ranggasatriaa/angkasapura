<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-10">
              <div class="card">
                <div class="card-header card-header-info">
                  <h4 class="card-title">Detail Laporan Kerusakan Fasilitas</h4>
                </div>
                <div class="card-body detail">
                    <div class="row pt-3">
                        <div class="col-md-6">
                            <div class="detail-kerusakan">
                                <label for="">Nama Fasilitas</label>
                                <p class="pl-2 detail-data"><?= $detail_rusak->nama_barang?></p>
                            </div>
                            <div class="detail-kerusakan">
                                <label for="">Divisi</label>
                                <p class="pl-2 detail-data"><?= $detail_rusak->divisi?></p>
                            </div>
                            <div class="detail-kerusakan">
                                <label for="">Tanggal Pelaporan</label>
                                <p class="pl-2 detail-data"><?= $this->customlib->format_date_indonesia($detail_rusak->tgl_lapor)?></p>
                            </div>
                            <div class="detail-kerusakan">
                                <label for="">Keterangan</label>
                                <p class="pl-2 detail-data"><?= $detail_rusak->keterangan?></p>
                            </div>
                        </div>
                        <div class="col-md-6 detail">
                            <div class="detail-kerusakan">
                                <label for="">Status</label>
                                <p class="pl-2 detail-data">
                                <?php if($detail_rusak->status == 0){
                                    echo 'Terlapor';
                                }elseif($detail_rusak->status == 1){
                                    echo 'Telah Diperbaiki';
                               }?>
                                </p>
                            </div>
                            <div class="detail-kerusakan">
                                <label for="">Foto Laporan</label> <br>
                                <img class="detail-img" data-toggle="modal" data-target="#modalGambarLaporan" class="pl-2" src="<?= base_url(UPLOAD_PATH_KERUSAKAN.$detail_rusak->gambar)?>" alt="" width="250" >
                            </div>
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
                            $id = $first.$detail_rusak->id.$last;
                        ?>
                        <?php if($detail_rusak->status == 0){ ?>
                        <a href="<?= base_url('edit-laporan/'.$id)?>" rel="tooltip" class="btn btn-info" data-toggle="tooltip" data-placement="left" title="Edit Laporan Kerusakan ">
                            <i class="material-icons">edit</i>
                        </a>
                        <a rel="tooltip" class="btn btn-success btn-diperbaiki" data-toggle="tooltip" data-placement="left" title="Tandai Sudah Diperbaiki" laporan-id="<?= $id;?>">
                            <i class="material-icons" style="color:#fff">check_circle</i>
                        </a>
                        <?php }?>
                        <a rel="tooltip" class="btn btn-danger hapus-laporan" data-toggle="tooltip" data-placement="left" title="Hapus Laporan Kerusakan" laporan-id="<?= $id;?>">
                            <i class="material-icons" style="color:#fff">close</i>
                        </a>
                    </div>
                </div>
              </div>
              <!-- Modal image -->
                <div class="modal fade" id="modalGambarLaporan" tabindex="-1" role="dialog" aria-labelledby="GambarLaporan" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="" style="max-width:500px">
                            <img src="<?= base_url(UPLOAD_PATH_KERUSAKAN.$detail_rusak->gambar)?>" style="width:100%;">
                        </div>
                    </div>
                </div>
              <!-- Modal image -->
            </div>
        </div>
    </div>
</div>
