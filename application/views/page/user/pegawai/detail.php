<div class="content ">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-10">
        <div class="card" >
          <div class="card-header card-header-danger">
            <h2><?=$user->user_name?></h2>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table">
                <tbody>
                  <tr>
                    <td></td>
                    <td></td>
                  </tr>
                  <tr>
                    <th>NIP</th>
                    <td><?= empty($user->user_nip) ? '-' : $user->user_nip ?></td>
                  </tr>
                  <tr>
                    <th>Jabatan Stuktural</th>
                    <td><?= empty($user->user_position) ? '-' : $user->user_position ?></td>
                  </tr>
                  <th>Jabatan Funsional</th>
                  <td><?= empty($user->user_position) ? '-' : $user->user_functional ?></td>
                </tr>
                  <tr>
                    <th>Golongan</th>
                    <td><?= empty($user->user_rank) ? '-' : $user->user_rank ?></td>
                  </tr>
                  <tr>
                    <th>Alamat</th>
                    <td><?= empty($user->user_address) ? '-' : $user->user_address ?></td>
                  </tr>
                  <tr>
                    <th>Pendidikan Formal</th>
                    <td> <?= empty($user->user_education) ? '-' : $user->user_education ?> </td>
                  </tr>
                  <tr>
                    <th>E-mail</th>
                    <td> <?= empty($user->user_email) ? '-' : $user->user_email?> </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-2">
        <div class="card card-add-mail">
          <div class="card-body text-center">
            <div class="td-actions">
              <a href="<?=site_url('ubah-pegawai/'.$user->user_id)?>" class="btn btn-warning" rel="tooltip" data-toggle="tooltip" data-placement="left" title="Ubah Pergawai">
                <i class="material-icons">edit</i>
              </a>
              <button onclick="deletePegawai(<?=$user->user_id?>)" rel="tooltip" class="btn btn-danger" data-toggle="tooltip" data-placement="left" title="Hapus Pegawai" style="margin:3px">
                <i class="material-icons">close</i>
              </button>
              <!-- <button class="btn btn-danger" onclick="deletePegawai(<?=$user->user_id?>)" rel="tooltip" data-toggle="tooltip" data-placement="left" title="Hapus Pegawai">
                <i class="material-icons">close</i>
              </button> -->
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-header card-header-danger">
            Agenda yang diikuti
          </div>
          <div class="card-body">
            <?php if (empty($agendas)): ?>
              <h4>Belum ada agenda yang pernah diikuti</h4>
            <?php else: ?>
              <table class="table">
                <thead>
                  <tr>
                    <th>Tanggal</th>
                    <th>Agenda</th>
                    <th>Sebagai</th>
                  </tr>
                </thead>
                <tbody>

                </tbody>
              </table>
            <?php endif; ?>

          </div>
        </div>
      </div>
    </div>
  </div>
</div>
