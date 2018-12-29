<div class="content">
    <a href="<?= base_url()?>buat-data-bmn" class="btn btn-success btn-md btn-add-mail ml-3">
        <i class="material-icons">add</i> Tambah Data
    </a>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-success">
                  <h4 class="card-title">Data Master BMN dan ART</h4>
                </div>
                <div class="card-body">
                    <table class="table table-list-surat-masuk">
                        <thead>
                            <tr class="text-center">
                                <th>No</th>
                                <th>Nomor</th>
                                <th>Nama Barang</th>
                                <th>Jumlah</th>
                                <th>Thn Kontrak</th>
                                <th>Rekanan</th>
                                <th>Jenis</th>
                                <th>Status</th>
                                <th class="text-right">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $a = 1; foreach($list_data as $ld){
                            $random = md5(mt_rand(1,10000));
                            $first = substr($random,0,5);
                            $last = substr($random,5,10);
                            $id = $first.$ld->id.$last;
                        ?>
                           <tr class="text-center">
                                <td><?= $a?></td>
                                <td><?= $ld->nomor?></td>
                                <td class="text-left pl-4"><?= $ld->nama_barang?></td>
                                <td><?= $ld->jumlah?></td>
                                <td><?= $ld->tahun_kontrak?></td>
                                <td><?= $ld->rekanan?></td>
                                <?php if($ld->jenis == 1){?>
                                    <td>BMN</td>
                                <?php }elseif($ld->jenis == 2){?>
                                    <td>ART</td>
                                <?php }elseif($ld->jenis == 3){?>
                                    <td>Kendaraan</td>
                                <?php }?>
                                <td><?= $ld->status?></td>
                                <td class="td-actions text-right">
                                    <a href="<?= base_url('edit-data-bmn/').$id?>" rel="tooltip" class="btn btn-success" data-toggle="tooltip" data-placement="top" title="Edit Data Master">
                                        <i class="material-icons">edit</i>
                                    </a>
                                    <a rel="tooltip" class="btn btn-danger btn-hapus-data" data-toggle="tooltip" data-placement="bottom" title="Hapus Data Master" id-data="<?= $id?>">
                                        <i class="material-icons" style="color:#fff">close</i>
                                    </a>
                                </td>
                           </tr>
                        <?php $a++;}?>
                        </tbody>
                    </table>
                </div>
              </div>
            </div>
        </div>
    </div>
</div>
