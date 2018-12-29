<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-10">
        <div class="card">
          <div class="card-header card-header-danger">
            <h4 class="card-title float-left">Daftar Surat Masuk</h4>
            <div class="card float-right search-bar-tools">
              <div class="card-body">
                <div class="input-group">
                  <input type="text" class="form-control" name="search-input" id="search-input" placeholder="Cari berdasarkan Nomor Surat">
                  <button class="btn btn-danger btn-round btn-just-icon btn-search-inmail"><i class="material-icons">search</i></button>
                </div>
              </div>
            </div>
          </div>
          <div class="card-body">
            <table class="table table-list-surat-masuk">
              <thead>
                <tr class="text-center">
                  <th>No</th>
                  <th>Tanggal Surat</th>
                  <th>Nomor Surat</th>
                  <th>Perihal</th>
                  <th>Asal</th>
                  <th class="text-right">Aksi</th>
                </tr>
              </thead>
              <tbody id="list-inmail-kegiatan">
                <?php
                $a = 1;
                foreach($listSurat as $sm){
                  $random = md5(mt_rand(1,10000));
                  $first = substr($random,0,5);
                  $last = substr($random,5,10);
                  $id = $first.$sm->id.$last;
                  ?>
                  <tr class="text-center">
                    <td><?php echo $a;?></td>
                    <td><?php echo $this->customlib->format_date_indonesia($sm->tanggal)?></td>
                    <td><?php echo $sm->nomor?></td>
                    <td><?php echo $sm->perihal?></td>
                    <td><?php echo $sm->dari?></td>
                    <td class="td-actions text-right">
                      <a href="detailsurat/<?php echo $id?>" rel="tooltip" class="btn btn-info" data-toggle="tooltip" data-placement="left" title="Lihat Detail Surat">
                        <i class="material-icons">info</i>
                      </a>
                      <a href="editsurat/<?php echo $id?>" rel="tooltip" class="btn btn-success" data-toggle="tooltip" data-placement="top" title="Edit Surat">
                        <i class="material-icons">edit</i>
                      </a>
                      <a rel="tooltip" class="btn btn-danger" data-toggle="tooltip" data-placement="bottom" title="Hapus Surat" id="hapusInmail" id-inmail="<?php echo $id;?>">
                        <i class="material-icons" style="color:#fff">close</i>
                      </a>
                    </td>
                  </tr>
                  <?php $a++;} ?>
                </tbody>
                <tbody id="list-inmail-cari"></tbody>
              </table>
            </div>
          </div>
        </div>
        <div class="col-md-2">
          <div class="card card-add-mail">
            <a href="<?=site_url('new-inmail')?>" >
              <div class="card-header card-header-danger text-center" rel="tooltip" class="btn btn-warning" data-toggle="tooltip" data-placement="Top" title="Tambah Surat Masuk">
                  <i class="material-icons" style="font-size:55px">add</i>
              </div>
            </a>
            <div class="card-body text-center">
              <p class="bold">Tambah Surat Masuk</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
