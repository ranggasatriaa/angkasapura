<div class="content ">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-2">
      </div>
      <div class="col-lg-8">
        <div class="card card-profile" >
          <div class="card-avatar">
            <img src="<?=site_url('assets/img/logo.png')?>" alt="">
          </div>
          <div class="card-body">
            <h4 class="card-title">Nama:  <?=ucwords($user->user_name)?></h4>
            <h6 class="card-category text-gray">
              Level Akses:
              <?php if ($user->user_level == 1){
                echo AKSES_1;
              }elseif ($user->user_level == 2){
                echo AKSES_2;
              }elseif ($user->user_level == 3){
                echo AKSES_3;
              }elseif ($user->user_level == 4){
                echo AKSES_4;
              }
              ?>
            </h6>
            <h6 class="card-category text-gray">
              Username: <?=$user->username?>
            </h6>
            <h6 class="card-category text-gray">
              Email: <?= empty($user->user_email) ? '-' : $user->user_email?>
            </h6>
            <!-- <button type="button" class="btn btn-warning btn-round" data-toggle="modal" data-target="#editProfilModal"  rel="tooltip" data-toggle="tooltip" data-placement="top" title="Edit Akses">
            &nbsp<i class="material-icons">edit</i>&nbsp Edit Akses
          </button> -->
          <a href="<?=site_url('ubah-akses/'.$user->user_id)?>" class="btn btn-warning btn-round" rel="tooltip"  data-toggle="tooltip" data-placement="top" title="Edit Akses">
            &nbsp<i class="material-icons">edit</i>&nbsp Edit Akses
          </a>
          <?php if ($user->user_id != $this->session->userdata('user_id')): ?>
            <button onclick="deleteAkses(<?=$user->user_id?>)" rel="tooltip" class="btn btn-danger btn-round" data-toggle="tooltip" data-placement="left" title="Hapus Akses" style="margin:3px">
              <i class="material-icons">close</i>&nbsp Hapus Akses
            </button>
          <?php endif; ?>
        </div>
      </div>
    </div>
    <div class="col-lg-2">
    </div>
  </div>
</div>
</div>

<!-- Modal -->
<div class="modal fade" id="editProfilModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" >Edit Profil</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="form" action="<?=site_url('user/postEditProfil')?>"method="post">
          <!-- <div class="form-group">
          <label class="bmd-label-floating">Nama </label>
          <input class="form-control" type="text" name="" value="">
        </div>
        <div class="form-group">
        <label class="bmd-label-floating">Email </label>
        <input class="form-control" type="text" name="" value="">
      </div>
      <div class="form-group">
      <label class="bmd-label-floating">Konfirmasi password </label>
      <input class="form-control" type="text" name="" value="">
    </div> -->
    <div class="form-group">
      <label class="bmd-label-floating">Password Lama </label>
      <input class="form-control" type="pass" name="old_password" value="" required >
    </div>
    <div class="form-group">
      <label class="bmd-label-floating">Password Baru </label>
      <input class="form-control" type="text" name="new_password1" value="" required>
    </div>
    <div class="form-group">
      <label class="bmd-label-floating">Konfirmasi Password Baru </label>
      <input class="form-control" type="text" name="new_password2" value="" required>
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
      <button type="submit" class="btn btn-primary">Edit</button>
    </div>
  </form>
</div>
</div>
</div>
</div>
