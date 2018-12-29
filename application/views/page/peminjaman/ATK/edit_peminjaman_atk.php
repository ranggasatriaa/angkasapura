<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 pl-4">
              <div class="card">
                <div class="card-header card-header-info">
                    <div class="card-title">
                        <h4>Detail Pengajuan Permintaan ATK</h4>
                        <p class="status-edit"></p>
                    </div>
                </div>
                <div class="card-body detail pb-4 pr-4">
                    <div class="row pt-3">
                        <?php
                            $random = md5(mt_rand(1,10000));
                            $first = substr($random,0,5);
                            $last = substr($random,5,10);
                            $id = $first.$detail_pinjam->id.$last;
                        ?>
                        <div class="col-md-5 pl-5" id-pinjam="<?= $id?>">
                            <div class="detail-kerusakan">
                                <label class="mb-0" for="">Nama Pengaju</label>
                                <input type="text" class="pl-2 mb-2 form-control" value="<?= $detail_pinjam->nama?>" id="nama-pengaju">
                            </div>
                            <div class="detail-kerusakan">
                                <label class="mb-0" for="">NIP</label>
                                <input type="text" class="pl-2 mb-2 form-control" value="<?= $detail_pinjam->nip?>" id="nip-pengaju">
                            </div>
                            <div class="detail-kerusakan">
                                <label class="mb-0" for="">Tanggal</label>
                                <input type="date" class="pl-2 mb-2 form-control" value="<?= date('Y-m-d',strtotime($detail_pinjam->tanggal))?>" id="tanggal-pengaju">
                            </div>
                            <button class="btn btn-success mt-3">
                                <i class="material-icons mr-1">print</i>
                                Cetak
                            </button>
                        </div>
                        <div class="col-md-7 detail">
                            <table class="w-100">
                                <thead>
                                    <th class="pt-2 pb-2 text-left">Nama</th>
                                    <th class="pt-2 pb-2 text-right">Jumlah</th>
                                    <th class="pt-2 pb-2 text-right">
                                        <button class="btn btn-success add-atk-edit" id-permintaan="<?= $id?>">
                                            <i class="material-icons">add</i>
                                        </button>
                                    </th>
                                </thead>
                                <tbody id="atk_edit_table">
                                    <?php foreach($list_atk as $la){ 
                                        $random = md5(mt_rand(1,10000));
                                        $first = substr($random,0,5);
                                        $last = substr($random,5,10);
                                        $id_atk = $first.$la->id.$last;
                                        ?>
                                    <tr id-atk="<?= $id_atk?>">
                                        <td class="pt-2 pb-2 text-left form-group w-75">
                                            <input class="form-control atk_edit" type="text" value="<?= $la->nama_atk?>" name="atk_edit">
                                        </td>
                                        <td class="pt-2 pb-2 form-group w-25 pl-4">
                                            <input class="form-control text-right jumlah_edit" type="int" value="<?= $la->jumlah?>" name="jumlah_edit">
                                        </td>
                                        <td class="pl-3">
                                            <button class="btn btn-danger delete-atk-edit">
                                                <i class="material-icons">delete</i>
                                            </button>
                                        </td>
                                    </tr>
                                    <?php }?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
              </div>
            </div>
        </div>
    </div>
</div>