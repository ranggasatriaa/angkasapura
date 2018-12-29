<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-9">
              <div class="card">
                <div class="card-header card-header-success">
                  <h4 class="card-title">Buat Agenda Kegiatan</h4>
                  <p class="card-category">Masukan Data Agenda Kegiatan di bawah ini</p>
                </div>
                <div class="card-body">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Nama Kegiatan</label>
                          <input type="text" class="form-control" value="<?= $agenda->nama_kegiatan;?>" name="nama-kegiatan" id="nama-kegiatan" autocomplete="off" required>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label>Tanggal Mulai</label>
                          <input type="date" class="form-control" value="<?= date('Y-m-d',strtotime($agenda->tanggal_mulai));?>" id="tgl-agenda-mulai" name="tgl" autocomplete="off" required>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label>Tanggal Selesai</label>
                          <input type="date" class="form-control" value="<?= date('Y-m-d',strtotime($agenda->tanggal_selesai));?>" id="tgl-agenda-selesai" name="tgl" autocomplete="off" required>
                        </div>
                      </div>
                    </div>                   
                    <div class="row">
                      <div class="col-md-5">
                        <div class="form-group">
                          <label class="">Tempat Kegiatan</label>
                          <input class="form-control" value="<?= $agenda->tempat;?>" name="tempat-kegiatan" id="tempat" type="text" autocomplete="off" required>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="">Waktu Kegiatan</label>
                          <input class="form-control" value="<?= $agenda->waktu;?>" name="waktu-kegiatan" id="waktu" type="time" min="6:00" max="22:00" autocomplete="off" required>
                        </div>
                      </div>
                    </div>
                    <?php
                        $random = md5(mt_rand(1,10000));
                        $first = substr($random,0,5);
                        $last = substr($random,5,10);
                        $id = $first.$agenda->id.$last;
                    ?>
                    <input type="hidden" value="<?= $id;?>" id="id-agenda">
                    <button class="btn btn-success pull-right" id="btn-edit-agenda-kegiatan">Perbarui Agenda</button>
                </div>
              </div>
            </div>
            <div class="col-md-2">
              <div class="card card-add-mail">
                <div class="card-body text-center">
                    <div class="td-actions">
                        <a rel="tooltip" class="btn btn-danger hapus-agenda-kegiatan" data-toggle="tooltip" data-placement="left" title="Hapus Agenda Kegiatan" id-agenda="<?= $id;?>">
                            <i class="material-icons" style="color:#fff">close</i>
                        </a>
                    </div>
                </div>
              </div>
        </div>
    </div>
</div>