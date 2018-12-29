<script type="text/javascript">

$(document).ready(function() {

  // var ss = [];
  // ss.push('this');
  // ss.push('12');
  // console.log(ss);
  // console.log(ss.length);
  // for (var i = 0; i < ss.length; i++) {
  //   ss[]
  // }
  // console.log(ss[1]);
  //============================================================
  //MULTI INPUT MENGINGAT
  //============================================================
  if($("#labelMengingat").length > 0) {
    var labelMengingat = $("#labelMengingat").html().slice(0,-1); //top label input
    //it doesn't exist
  }
  var nameMengingat = $("#inputMengingat").attr("name"); //input name
  var messageMengingat = $("#messageMengingat").html(); // additional message
  var maxFieldMengingat = 10; //Input fields increment limitation
  var addButtonMengingat = $('.add_button_mengingat'); //Add button selector
  var wrapperMengingat = $('#buildyourform'); //Input field wrapper
  var xMengingat = 1; //Initial field counter is 1

  //Once add button is clicked
  addButtonMengingat.click(function(){
    //Check maximum number of input fields
    if(xMengingat < maxFieldMengingat){
      xMengingat++; //Increment field counter
      var fieldHTMLMengingat = '<div class="row"><div class="col-md-10"><div class="form-group" style="margin-top:0px"><label>'+labelMengingat+xMengingat+'</label><input id="inputMengingat" class="form-control ini" type="text" name="'+nameMengingat+'" value="" required/><small class="form-text text-muted">'+messageMengingat+' '+xMengingat+'</small></div></div><a href="javascript:void(0);" class="remove_button_mengingat" rel="tooltip" data-toggle="tooltip" data-placement="left" title="Hapus Poin"><span class="btn btn-danger btn-block"><i class="material-icons">delete</i></span></a></div>'; //New input field html
      $(wrapperMengingat).append(fieldHTMLMengingat); //Add field html
    }
  });

  //Once remove button is clicked
  wrapperMengingat.on('click', '.remove_button_mengingat', function(e){
    e.preventDefault();
    $(this).parent('div').remove(); //Remove field html
    xMengingat--; //Decrement field counter
  });

  //============================================================
  //MULTI INPUT HONOR
  //============================================================
  if($("#labelHonor").length > 0) {
    var labelHonor = $("#labelHonor").html().slice(0,-1); //top label input
    //it doesn't exist
  }
  var nameHonor = $("#inputHonor").attr("name"); //input name
  var messageHonor = $("#messageHonor").html(); // additional message
  var maxFieldHonor = 10; //Input fields increment limitation
  var addButtonHonor = $('.add_button_honor'); //Add button selector
  var wrapperHonor = $('#honorPegawai'); //Input field wrapper
  var xHonor = 1; //Initial field counter is 1

  //Once add button is clicked
  addButtonHonor.click(function(){
    //Check maximum number of input fields
    if(xHonor < maxFieldHonor){
      xHonor++; //Increment field counter
      var label = '<div class="row"><div class="col-md-6"><div class="form-group"><label>'+labelHonor+xHonor+'</label>';
      var select = '<select id="inputHonor" class="form-control" name="'+nameHonor+'" required><option value="">- Pilih Pegawai - </option>';
      <?php foreach ($pegawais as $pegawai): ?>
      select = select+'<option value="<?= $pegawai->user_name?>|<?=empty($pegawai->user_nip) ? '-' : $pegawai->user_nip?>|<?=empty($pegawai->user_position) ? '-' : $pegawai->user_position?>|<?=empty($pegawai->user_functional) ? '-' : $pegawai->user_functional?>|<?=empty($pegawai->user_rank) ? '-' : $pegawai->user_rank?>"><?= $pegawai->user_name?></option>';
      <?php endforeach; ?>
      select = select+'</select>'
      var message = '<small class="form-text text-muted">'+messageHonor+' '+xHonor+'</small></div></div>';
      var jam = '<div class="col-md-2"> <div  class="form-group"> <label for="">Jumlah Jam</label> <input class="form-control" min="1" type="number" name="jam[]" value=""> <small class="form-text text-muted">Jumlah jam </small> </div></div>';
      var honor = '<div class="col-md-2"> <div  class="form-group"> <label for="">Honor per Jam (Rp)</label> <input class="form-control" min="0" type="number" name="honor[]" value=""> <small class="form-text text-muted">Honor Petugas </small> </div></div>';
      var button = '<a href="javascript:void(1);" class="remove_button_Honor" rel="tooltip" data-toggle="tooltip" data-placement="left" title="Hapus Poin"><span class="btn btn-danger btn-block"><i class="material-icons">delete</i></span></a>';

      var html = label+select+message+jam+honor+button;
      $(wrapperHonor).append(html); //Add field html

    }
  });

  //Once remove button is clicked
  wrapperHonor.on('click', '.remove_button_Honor', function(e){
    e.preventDefault();
    $(this).parent('div').remove(); //Remove field html
    xHonor--; //Decrement field counter
  });


  //============================================================
  //MULTI INPUT HONOR
  //============================================================
  if($("#labelPersonil").length > 0) {
    var labelPersonil = $("#labelPersonil").html().slice(0,-1); //top label input
  }
  if($("#messagePersonil").length >1) {
    var messagePersonil = $("#messagePersonil").html(); // additional message
    console.log('message: '+ messagePersonil);
  }
  var namePersonil = $("#inputPersonil").attr("name"); //input name
  var maxFieldPersonil = 10; //Input fields increment limitation
  var addButtonPersonil = $('.add_button_personil'); //Add button selector
  var wrapperPersonil = $('#personil'); //Input field wrapper
  var xPersonil = 1; //Initial field counter is 1

  //Once add button is clicked
  addButtonPersonil.click(function(){
    //Check maximum number of input fields
    if(xPersonil < maxFieldPersonil){
      xPersonil++; //Increment field counter
      var label = '<div class="row"><div class="col-md-10"><div class="form-group"><label>'+labelPersonil+xPersonil+'</label>';
      var select = '<select id="inputPersonil" class="form-control" name="'+namePersonil+'" required><option value="">- Pilih Pegawai - </option>';
      <?php foreach ($pegawais as $pegawai): ?>
      select = select+'<option value="<?= $pegawai->user_name?>|<?=empty($pegawai->user_nip) ? '-' : $pegawai->user_nip?>|<?=empty($pegawai->user_position) ? '-' : $pegawai->user_position?>|<?=empty($pegawai->user_functional) ? '-' : $pegawai->user_functional?>|<?=empty($pegawai->user_rank) ? '-' : $pegawai->user_rank?>"><?= $pegawai->user_name?></option>';
      <?php endforeach; ?>
      select = select+'</select>'
      if($("#messagePersonil").length > 1) {
        var message = '<small class="form-text text-muted">'+messagePersonil+' '+xPersonil+'</small>';
      }else {
        var message = ' ';
      }
      var button = '</div></div><a href="javascript:void(1);" class="remove_button_personil" rel="tooltip" data-toggle="tooltip" data-placement="left" title="Hapus Poin"><span class="btn btn-danger btn-block"><i class="material-icons">delete</i></span></a>';

      var html = label+select+message+button;
      $(wrapperPersonil).append(html); //Add field html

    }
  });

  //Once remove button is clicked
  wrapperPersonil.on('click', '.remove_button_personil', function(e){
    e.preventDefault();
    $(this).parent('div').remove(); //Remove field html
    xPersonil--; //Decrement field counter
  });
});

//============================================================
//PROSES PEYIMPANAN SURAT KELUAR
//============================================================
$('#simpanSuratKeluar').on('click',function(){
  //SET VARIABLE
  var mail_type = $("input[name='mail_type']").val();
  <?php
  if (!empty($sections)){
    foreach ($sections as $section){
      if ($section->type=='multiple'){
        ?>
        var <?= $section->code?> = $("input[name='<?= $section->code?>[]']").map(function() {return $(this).val();}).get();
        <?php
      }elseif ($section->type=='personil') {
        ?>
        var <?= $section->code?> = $("select[name='<?= $section->code?>[]']").map(function() {return $(this).val();}).get();
        <?php
      }elseif ($section->type=='pegawaihonor') {
        ?>
        var jam = $("input[name='jam[]']").map(function() {return $(this).val();}).get();
        var honor = $("input[name='honor[]']").map(function() {return $(this).val();}).get();
        var pegawaihonor = $("select[name='pegawaihonor[]']").map(function() {return $(this).val();}).get();
        <?php
      }elseif ($section->type=='pegawai') {
        ?>
        var <?= $section->code?> = $("select[name='<?=$section->code?>[]']").map(function() {return $(this).val();}).get();
        <?php
      }else{
        ?>
        var <?= $section->code?> = $("input[name='<?= $section->code?>']").val();
        <?php
      }
    }
  }
  ?>

  $('#simpanSuratKeluar').html('Mengirim Data . . .');
  $('#simpanSuratKeluar').attr('disabled','true');

  dataSend = {
    <?php
    if (!empty($sections)){
      foreach ($sections as $section){
        echo $section->code.":".$section->code.",";
        if ($section->type == 'pegawaihonor') {
          echo '
          honor : honor,
          jam : jam,';
        }
      }
    } ?>
    mail_type:mail_type
  }
  // console.log(dataSend);
  $.ajax({
    type:"POST",
    url: "<?= site_url('outmail/postBuatSurat')?>",
    data: dataSend,
    datatype: 'json',
    success: function(data){
      if (data == 'Sukses') {
        swal(
          'Sukses',
          'Berhasil membuat surat',
          'success'
        ).then((result) => {
          if (result.value) {
            location.href = '<?php echo site_url('outmail')?>';
          }
        })
      }else{
        swal(
          'Gagal',
          data,
          'error'
        )
      }
      $('#simpanSuratKeluar').html('SELESAI');
      $('#simpanSuratKeluar').removeAttr('disabled');
    }, error:function(error){
      console.log(error);
    }
  });
});

//============================================================
//PROSES PEYIMPANAN EDIT SURAT KELUAR
//============================================================
$('#simpanUpdateSuratKeluar').on('click',function(){
  //SET VARIABLE
  var mail_type = $("input[name='mail_type']").val();
  var mail_id = $("input[name='mail_id']").val();
  <?php
  if (!empty($contents)){
    foreach ($contents as $content){
      if ($content->type=='multiple'){
        ?>
        var <?php echo $content->code.$content->content_order?> = $("input[name='<?php echo $content->code.$content->content_order?>']").val();
        <?php
      }elseif ($content->type=='pegawai') {
        ?>
        var <?= $content->code?> = $("select[name='<?= $content->code?>']").val();
        <?php
      }else{
        echo "var ".$content->code." = $('input[name=\"".$content->code."\"').val();";
        // echo "console.log(".$content->code.");";
      }
    }
  }
  ?>

  $('#simpanUpdateSuratKeluar').html('Mengirim Data . . .');
  $('#simpanUpdateSuratKeluar').attr('disabled','true');
  dataSend = {
    <?php
    if (!empty($contents)){
      foreach ($contents as $content){
        if ($content->type == 'multiple') {
          echo $content->code.$content->content_order.":".$content->code.$content->content_order.",";
        }else {
          echo $content->code.":".$content->code.",";
        }
      }
    }
    ?>
    mail_type:mail_type,
    mail_id:mail_id
  }
  console.log(dataSend);
  $.ajax({
    type:"POST",
    url: "<?= site_url('outmail/postEditSurat')?>",
    data: dataSend,
    datatype: 'json',
    success: function(data){
      if (data == 'Sukses') {
        swal(
          'Sukses',
          'Berhasil mengubah surat',
          'success'
        ).then((result) => {
          if (result.value) {
            location.href = '<?php echo site_url('outmail')?>';
          }
        })
      }else{
        swal(
          'Gagal',
          data,
          'error'
        )
        $('#simpanUpdateSuratKeluar').html('SELESAI');
        $('#simpanUpdateSuratKeluar').removeAttr('disabled');
      }
    }, error:function(error){
      console.log(error);
    }
  });
});

//============================================================
//ConfirmDelete
//============================================================
function deleteOutmail(data){
  swal({
    title: 'Ada yakin?',
    text: "Surat ini akan dihapus",
    type: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Ya!'
  }).then((result) => {
    if (result.value) {
      dataSend = {mail_id:data}
      console.log(dataSend);
      $.ajax({
        type:"POST",
        url: "<?= site_url('outmail/deleteSurat')?>",
        data: dataSend,
        datatype: 'json',
        success: function(data){
          if (data == 'Sukses') {
            swal(
              'Sukses',
              'Berhasil menghapus surat',
              'success'
            ).then((result) => {
              if (result.value) {
                location.href = '<?php echo site_url('outmail')?>';
              }
            })
          }else{
            swal(
              'Gagal',
              data,
              'error'
            )
          }
        }, error:function(error){
          console.log(error);
        }
      });
      // location.href = '<?php echo site_url('outmail/deleteSurat/')?>'+data;
    }
  })
};
//============================================================
//PREVIEW IMAGE DI UPLOAD IMAGE
//============================================================
$(document).on('click', '#previewImageButtonLink', function(){
  var page=$(this).data('page');
  var directory=$(this).data('directory');
  console.log(page);
  $('#previewTitle').html('Halaman '+page);
  $('#image').attr('src', '<?=base_url(UPLOAD_PATH_OUTMAIL)?>'+directory);
  // $('#userTelephone').attr('href', 'tel:'+phone);
})





<?php if (!empty($_SESSION['alert'])): ?>
swal(
  "<?=empty($_SESSION['alert'])?'':$_SESSION['alert']?>",
  "<?=empty($_SESSION['message'])?'':$_SESSION['message']?>",
  "<?=empty($_SESSION['type'])?'':$_SESSION['type']?>"
);
<?php endif; ?>


</script>

</body>
</html>
