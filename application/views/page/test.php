<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-body">
            <form class="" action="<?=site_url('test/postTestUpload')?>" method="post" enctype="multipart/form-data">
              <div class="row">
              <div class="col-md-6 col-sm-4">
                <img id="imagePreview" src="<?=base_url('assets/img/placeholder2.png')?>" alt="your image" width="100%" />
                <h2><?=empty($error)?'':$error?></h2>
                <button id="pilih-foto" onclick="select()" class="btn btn-warning btn-block" type="button" name="button">Pilih Foto</button>
                <button type="submit" class="btn btn-success btn-block" id="simpanSuratMasuk">Upload File</button>
                <input id="file" type="file" name="userfile" onchange="return fileValidation()" style="opacity:0;">
                <!-- <input type="hidden" name="mail_id" value="<?=$mail_id?>"> -->
                <input type="hidden" name="page" value="<?=empty($images)?1:count($images)+1?>">
              </div>
            </div>
            </form>
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
