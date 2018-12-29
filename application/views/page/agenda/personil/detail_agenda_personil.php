<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-10">
              <div class="card">
                <div class="card-header card-header-info">
                  <h4 class="card-title">Detail Agenda Personil</h4>
                </div>
                <div class="card-body detail">
                    <div class="row pt-3">
                        <div class="col-md-5 pl-5">  
                            <div class="detail-kerusakan">
                                <label for="">Nama Kegiatan</label>
                                <p class="pl-2 detail-data"><?= $agenda->nama_kegiatan?></p>
                            </div>
                            <div class="detail-kerusakan">
                                <label for="">Tanggal Mulai Kegiatan</label>
                                <p class="pl-2 detail-data"><?= $this->customlib->format_date_indonesia($agenda->tanggal_mulai)?></p>
                            </div>
                            <div class="detail-kerusakan">
                                <label for="">Tanggal Selesai Kegiatan</label>
                                <p class="pl-2 detail-data"><?= $this->customlib->format_date_indonesia($agenda->tanggal_selesai)?></p>
                            </div>
                            <div class="detail-kerusakan">
                                <label for="">Tempat Kegiatan</label>
                                <p class="pl-2 detail-data"><?= $agenda->tempat?></p>
                            </div>
                            <div class="detail-kerusakan">
                                <label for="">Waktu Kegiatan</label>
                                <p class="pl-2 detail-data"><?= substr($agenda->waktu, 0, 5)?></p>
                            </div>
                        </div>
                        <div class="col-md-7 detail">
                            <label for="">Personil</label>
                            <table class="table w-100">
                                <thead>
                                    <th class>#</th>
                                    <th class="pt-2 pb-2 text-center">NIP</th>
                                    <th class="pt-2 pb-2 text-center">Nama</th>
                                </thead>
                                <tbody>
                                    <?php $a=1; foreach($personil as $p){?>
                                    <tr>
                                        <td><?= $a?></td>
                                        <td class="pt-2 pb-2 text-left"><?= $p->nip?></td>
                                        <td class="pt-2 pb-2 text-left"><?= $p->nama_personil?></td>
                                    </tr>
                                    <?php $a++;}?>
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
                            $id = $first.$agenda->id.$last;
                        ?>
                        <a href="<?= base_url('edit-agenda-personil/'.$id)?>" rel="tooltip" class="btn btn-success" data-toggle="tooltip" data-placement="left" title="Edit Agenda Personil ">
                            <i class="material-icons">edit</i>
                        </a>
                        <a rel="tooltip" class="btn btn-danger btn-hapus-pengajuan" data-toggle="tooltip" data-placement="left" title="Hapus Agenda Personil" id-agenda="<?= $id?>">
                            <i class="material-icons" style="color:#fff">close</i>
                        </a>
                    </div>
                </div>
              </div>
            </div>
        </div>
    </div>
</div>