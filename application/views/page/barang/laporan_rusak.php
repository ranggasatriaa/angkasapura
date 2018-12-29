<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-10">
              <div class="card">
                <div class="card-header card-header-info">
                    <h4 class="card-title float-left">Daftar Laporan Kerusakan</h4>
                    <div class="card float-right search-bar-tools">
                        <div class="card-body">
                            <div class="input-group">
                                <input type="text" class="form-control" name="search-input" id="search-input" placeholder="Cari berdasarkan Nama Fasilitas">
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
                                <th>Tanggal Lapor</th>
                                <th>Nama Fasilitas</th>
                                <th>Divisi</th>
                                <th>Status</th>
                                <th class="text-right">Aksi</th>
                            </tr>
                        </thead>
                        <tbody id="list-laporan">
                        <?php
                            $a = 1;
                            foreach($list_kerusakan as $rusak){
                                $random = md5(mt_rand(1,10000));
                                $first = substr($random,0,5);
                                $last = substr($random,5,10);
                                $id = $first.$rusak->id.$last;
                        ?>
                           <tr class="text-center">
                               <td><?= $a;?></td>
                               <td><?= $this->customlib->format_date_indonesia($rusak->tgl_lapor)?></td>
                               <td class="text-left"><?= $rusak->nama_barang?></td>
                               <td><?= $rusak->divisi;?></td>
                               <?php if($rusak->status == 0){?>
                                    <td>Terlapor</td>
                               <?php }elseif($rusak->status == 1){?>
                                    <td>Telah Diperbaiki</td>
                               <?php }?>
                               <td class="td-actions text-right">
                                    <a href="<?= base_url('detail-laporan/'.$id)?>" rel="tooltip" class="btn btn-info" data-toggle="tooltip" data-placement="left" title="Lihat Detail Laporan">
                                        <i class="material-icons">info</i>
                                    </a>
                                    <a href="<?= base_url('edit-laporan/'.$id)?>" rel="tooltip" class="btn btn-success" data-toggle="tooltip" data-placement="top" title="Edit Laporan">
                                        <i class="material-icons">edit</i>
                                    </a>
                                    <a rel="tooltip" class="btn btn-danger hapus-laporan" data-toggle="tooltip" data-placement="bottom" title="Hapus Laporan" laporan-id="<?= $id;?>">
                                        <i class="material-icons" style="color:#fff">close</i>
                                    </a>
                               </td>
                           </tr>
                           <?php $a++;}?>
                        </tbody>
                        <tbody id="list-laporan-cari"></tbody>
                    </table>
                </div>
              </div>
            </div>
            <div class="col-md-2">
              <div class="card card-add-mail">
                <a href="<?=site_url('lapor-baru')?>" >
                  <div class="card-header card-header-info text-center" rel="tooltip" class="btn btn-warning" data-toggle="tooltip" data-placement="Top" title="Tambah Laporan Kerusakan">
                    <i class="material-icons" style="font-size:55px">add</i>
                  </div>
                </a>
                <div class="card-body text-center">
                  <p class="bold">Tambah Laporan Kerusakan
                  </p>
                </div>
              </div>
            </div>
        </div>
    </div>
</div>
