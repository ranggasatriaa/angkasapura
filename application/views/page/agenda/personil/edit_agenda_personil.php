<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-10">
              <div class="card">
                <div class="card-header card-header-success">
                  <div class="card-title">
                      <h4>Buat Agenda Personil</h4>
                      <p class="status-edit"></p>
                  </div>
                  <p class="card-category">Data Agenda Kegiatan di bawah ini</p>
                </div>
                <div class="card-body">
                    <span class="small"> <i>Ubah Langsung di kolom yang tersedia</i></span>
                    <div class="row">
                      <div class="col-md-7">
                        <div class="form-group">
                          <label>Nama Kegiatan</label>
                          <input type="text" class="form-control detail-agenda-edit" value="<?= $agenda->nama_kegiatan;?>" name="nama-kegiatan" id="nama-kegiatan" autocomplete="off" required field="nama_kegiatan">
                        </div>
                      </div>
                      <div class="col-md-5">
                        <div class="form-group">
                          <label class="">Tempat Kegiatan</label>
                          <input class="form-control detail-agenda-edit" value="<?= $agenda->tempat;?>" name="tempat-kegiatan" id="tempat" type="text" autocomplete="off" required field="tempat">
                        </div>
                      </div>
                    </div>                   
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label>Tanggal Mulai Kegiatan</label>
                          <input type="date" class="form-control tgl-edit-agenda-personil" field="tanggal_mulai" value="<?= date('Y-m-d',strtotime($agenda->tanggal_mulai));?>" name="tgl-agenda" id="tgl-agenda-mulai-edit" autocomplete="off" required>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label>Tanggal Selesai Kegiatan</label>
                          <input type="date" class="form-control tgl-edit-agenda-personil" field="tanggal_selesai" value="<?= date('Y-m-d',strtotime($agenda->tanggal_selesai));?>" name="tgl-agenda" id="tgl-agenda-selesai-edit" autocomplete="off" required>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group mb-0 pb-0">
                          <label class="">Waktu Kegiatan</label>
                          <input class="form-control detail-agenda-edit" value="<?= $agenda->waktu;?>" name="waktu-kegiatan" id="waktu-agenda-edit" type="time" min="6:00" max="22:00" autocomplete="off" field="waktu">
                        </div>
                        <label for=""><i>isi dengan angka</i> </label>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <label for="">Personil</label>
                        <table class="w-75">
                            <thead>
                                <th class="pt-2 pb-2 text-center">Nama</th>
                                <th class="pt-2 pb-2 text-right">
                                  <button class="btn btn-success add-personil-edit">
                                      <i class="material-icons">add</i>
                                  </button>
                                </th>
                            </thead>
                            <tbody>
                                <?php foreach($personil as $p){
                                  $random = md5(mt_rand(1,10000));
                                  $first = substr($random,0,5);
                                  $last = substr($random,5,10);
                                  $id_person = $first.$p->id.$last;
                                ?>
                                <tr id-personil="<?= $id_person;?>">
                                    <td class="pt-2 pb-2 text-left">
                                      <select class="form-control edit-pilih-personil">
                                        <option selected value="<?= $p->nama_personil?>" id-pegawai="<?= $p->id_personil?>"><?= $p->nama_personil ?></option>
                                        <?php foreach($pegawai as $peg){?>
                                          <option value="<?= $peg->user_name?>" id-pegawai="<?= $peg->user_id?>" nip="<?= $peg->user_nip?>"><?= $peg->user_name?></option>
                                        <?php }?>
                                      </select>
                                    </td>
                                    <td class="pl-3 text-right">
                                        <button class="btn btn-danger delete-personil-edit">
                                            <i class="material-icons">delete</i>
                                        </button>
                                    </td>
                                </tr>
                                <?php }?>
                            </tbody>
                        </table>
                      </div>
                    </div>
                    <?php
                        $random = md5(mt_rand(1,10000));
                        $first = substr($random,0,5);
                        $last = substr($random,5,10);
                        $id = $first.$agenda->id.$last;
                    ?>
                    <input type="hidden" value="<?= $id;?>" id="id-agenda">
                </div>
              </div>
            </div>
            <div class="col-md-2">
              <div class="card card-add-mail">
                <div class="card-body text-center">
                    <div class="td-actions">
                        <a rel="tooltip" class="btn btn-danger hapus-agenda-personil" data-toggle="tooltip" data-placement="left" title="Hapus Agenda Kegiatan" id-agenda="<?= $id;?>">
                            <i class="material-icons" style="color:#fff">delete</i>
                        </a>
                    </div>
                </div>
              </div>
            </div>
    </div>
</div>