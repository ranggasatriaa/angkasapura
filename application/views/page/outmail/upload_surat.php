<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-body">
            <form class="" action="<?=site_url('outmail/postuploadSurat')?>" method="post" enctype="multipart/form-data">
              <div class="row">
                <?php foreach ($images as $image): ?>
                  <div class="col-md-6 col-sm-4">
                    <img src="<?=base_url().UPLOAD_PATH_OUTMAIL.$image->directory?>" width="100%" alt="">
                    <br>
                    <a href="<?=site_url('outmail/cancelUpload/'.$image->id)?>" class="btn btn-danger btn-sm"><i class="material-icons">close</i> Hapus gambar</a>
                  </div>
                <?php endforeach; ?>
              <div class="col-md-6 col-sm-4">
                <img id="imagePreview" src="<?=base_url('assets/img/placeholder2.png')?>" alt="your image" width="100%" />
                <h2><?=empty($error)?'':$error?></h2>
                <button id="pilih-foto" onclick="select()" class="btn btn-warning btn-block" type="button" name="button">Pilih Foto</button>
                <button type="submit" class="btn btn-success btn-block" id="simpanSuratMasuk">Upload File</button>
                <input id="file" type="file" name="userfile" onchange="return fileValidation()" style="opacity:0;">
                <input type="hidden" name="mail_id" value="<?= $mail_id?>">
                <input type="hidden" name="page" value="<?=empty($images)?1:count($images)+1?>">
              </div>
            </div>
            </form>
            <a class="btn btn-danger btn-block" href="<?=site_url('outmail/detail/'.$mail_id)?>">Selesai</a>
            <div class="clearfix"></div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- END CONTAINER -->
</div>
<script>
function select(){
  $( "#file" ).trigger( "click" );
}

function fileValidation(){
    var fileInput = document.getElementById('file');
    var filePath = fileInput.value;
    // var filePath = fileInput.value;
    var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif)$/i;
    if(!allowedExtensions.exec(filePath)){
        swal('Format salah','Hanya bisa menerima file .jpeg/.jpg/.png/.gif only.','error');
        document.getElementById('imagePreview').innerHTML = '';
        fileInput.value = '';
        return false;
    }else{
        //Image preview
        if (fileInput.files && fileInput.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
              $('#pilih-foto').html('Pilih foto lain');
                $('#imagePreview').attr('src', e.target.result);
            };
            reader.readAsDataURL(fileInput.files[0]);
        }
    }
}



</script>
