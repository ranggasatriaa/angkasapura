<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                <label for="">Cari Berdasarkan Tanggal</label>
                <input type="date" class="form-control mt-2" id="tanggal-cari">
                </div>
            </div>
            <div class="col-md-4">
                <div class="mt-2">
                    <div class="input-group">
                    <input type="text" class="form-control" name="search-input" id="search-input" placeholder="Cari berdasarkan Nama Kegiatan">
                    <button class="btn btn-success btn-round btn-just-icon btn-search-agenda"><i class="material-icons">search</i></button>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-10">
              <div class="card">
                <div class="card-header card-header-success">
                    <h4 class="card-title float-left">Daftar Agenda Personil</h4>
                </div>
                <div class="card-body">
                    <table class="table table-list-surat-masuk">
                        <thead class="text-center">
                            <th>No</th>
                            <th>Nama Kegiatan</th>
                            <th>Tanggal Mulai</th>
                            <th>Tempat</th>
                            <th>Waktu</th>
                            <th class="text-right">Aksi</th>
                        </thead>
                        <tbody id="list-agenda-kegiatan">
                            <?php
                            $a = 1;
                            foreach($list_agenda as $la){
                                $random = md5(mt_rand(1,10000));
                                $first = substr($random,0,5);
                                $last = substr($random,5,10);
                                $id = $first.$la->id.$last;
                            ?>
                            <tr class="text-center">
                                <td><?= $a?></td>
                                <td class="text-left"><?= $la->nama_kegiatan?></td>
                                <td><?= $this->customlib->format_date_indonesia($la->tanggal_mulai) ?></td>
                                <td><?= $la->tempat?></td>
                                <td><?= substr($la->waktu, 0, 5);?></td>
                                <td class="td-actions text-right">
                                    <a href="<?= base_url('detail-agenda-personil/'.$id)?>" rel="tooltip" class="btn btn-info" data-toggle="tooltip" data-placement="left" title="Lihat Detail Agenda">
                                        <i class="material-icons">info</i>
                                    </a>
                                    <a href="<?= base_url('edit-agenda-personil/'.$id)?>" rel="tooltip" class="btn btn-warning" data-toggle="tooltip" data-placement="top" title="Edit Agenda Personil">
                                        <i class="material-icons">edit</i>
                                    </a>
                                    <a rel="tooltip" class="btn btn-danger hapus-agenda-personil" data-toggle="tooltip" data-placement="bottom" title="Hapus Agenda Personil" id-agenda="<?= $id;?>">
                                        <i class="material-icons" style="color:#fff">close</i>
                                    </a>
                                </td>
                            </tr>
                            <?php $a++; } ?>
                        </tbody>
                        <tbody id="list-agenda-cari"></tbody>
                    </table>
                </div>
              </div>
            </div>
            <div class="col-md-2">
              <div class="card card-add-mail">
                <a href="<?=site_url('agenda-personil-baru')?>" >
                  <div class="card-header card-header-success text-center" rel="tooltip" data-toggle="tooltip" data-placement="Top" title="Tambah Agenda Personil">
                    <i class="material-icons" style="font-size:55px">add</i>
                  </div>
                </a>
                <div class="card-body text-center">
                  <p class="bold">Tambah Agenda Personil
                  </p>
                </div>
              </div>
            </div>
        </div>
    </div>
</div>
