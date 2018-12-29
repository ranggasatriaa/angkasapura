
<script type="text/javascript">


//==================================================
//VALIDASI INPUT
//==================================================
$('.required').blur(function()
{
  if( $(this).val().length === 0 ) {
    $(this).next().html('');
    $(this).next().html('form ini harus diisi');
    $(this).next().addClass('text-danger');
    $('.cek-input').show();
    $('.simpan').hide();
    console.log('select');
  }else {
    $(this).next().html('');
    $(this).next().removeClass('text-danger');
    $('.cek-input').hide();
    $('.simpan').show();
  }
});

function validateEmail(emailField){
  var reg1 = /^([A-Za-z0-9_\-\.])+\@([A-Za-z])+\.([A-Za-z]{2,4})$/;
  var reg2 = /^([A-Za-z0-9_\-\.])+\@([A-Za-z])+\.([A-Za-z])+\.([A-Za-z]{2,4})$/;
  var reg3 = /^([A-Za-z0-9_\-\.])+\@([A-Za-z])+\.([A-Za-z])+\.([A-Za-z])+\.([A-Za-z]{2,4})$/;

  if (emailField.value !='') {
    if (reg1.test(emailField.value) == true || reg2.test(emailField.value) == true || reg3.test(emailField.value) == true)
    {
      $("#email_message").removeClass('text-danger');
      $("#email_message").addClass('text-muted');
      $("#email_message").html("Contoh: example@example.com");
      $('.cek-input').hide();
      $('.simpan').show();
    }else{
      $("#email_message").html("Maaf hanya huruf(a-z), angka(0-9), titik(.), stip(-) dan garis bawah(_) diperbolehkan");
      $("#email_message").removeClass('text-muted');
      $("#email_message").addClass('text-danger');
      $('.cek-input').show();
      $('.simpan').hide();
    }
  }else {
    $("#email_message").removeClass('text-danger');
    $("#email_message").addClass('text-muted');
    $("#email_message").html("Contoh: example@example.com");
    $('.cek-input').hide();
    $('.simpan').show();
  }
}

function validateNip(nip){
  var reg1 = /^([0-9])$/;
  if (nip.value !='') {
    if (nip.value.match(/[a-z]/i)) {
      $("#nip_message").removeClass('text-muted');
      $("#nip_message").addClass('text-danger');
      $("#nip_message").html("Nip harus angka 0-9");
      $('.cek-input').show();
      $('.simpan').hide();
    }else{
      if (nip.value.indexOf(' ') != -1){
        $("#nip_message").removeClass('text-muted');
        $("#nip_message").addClass('text-danger');
        $("#nip_message").html("Tidak boleh ada 'spasi'!");
        $('.cek-input').show();
        $('.simpan').hide();
      }else{
        if (nip.value.length > 18 | nip.value.length < 18) {
          $("#nip_message").removeClass('text-muted');
          $("#nip_message").addClass('text-danger');
          $("#nip_message").html("Panjang karakter harus 18");
          $('.cek-input').show();
          $('.simpan').hide();
        }else {
          $("#nip_message").removeClass('text-danger');
          $("#nip_message").addClass('text-muted');
          $("#nip_message").html("Masukan nip tanpa spasi");
          $('.cek-input').hide();
          $('.simpan').show();
        }
      }
    }
  }else {
    $("#nip_message").removeClass('text-danger');
    $("#nip_message").addClass('text-muted');
    $("#nip_message").html("Masukan nip tanpa spasi");
    $('.cek-input').hide();
    $('.simpan').show();
  }
}

$(document).ready(function(){
  // TAMBAH MANUAL PEGAWAI
  //=======================================================
  $('#simpanPegawaiBaru').on('click',function(){
    var name = $("input[name='name']").val();
    var nip = $("input[name='nip']").val();
    var position = $("input[name='position']").val();
    var functional = $("input[name='functional']").val();
    var rank = $("select[name='rank']").val();
    var address = $("input[name='address']").val();
    var education = $("input[name='education']").val();
    var email = $("input[name='email']").val();

    $('#simpanPegawaiBaru').html('Mengirim Data . . .');
    $('#simpanPegawaiBaru').attr('disabled','true');
    dataSend = {
      name : name,
      nip : nip,
      position : position,
      functional : functional,
      rank : rank,
      address : address,
      education : education,
      email : email,
    };
    console.log(dataSend);
    $.ajax({
      type:"POST",
      url: "<?php echo base_url()?>user/postBuatPegawai",
      data: dataSend,
      datatype: 'json',
      success: function(data){
        if (data == 'Sukses') {
          swal(
            'Sukses', 'Berhasil menambah data pegawai', 'success'
          ).then((result) => {
            if (result.value) {
              location.href = '<?= site_url('pegawai')?>';
            }
          })
        }else {
          swal( 'Gagal', data, 'error' )
        }
      }, error:function(error){
        console.log(error)
      }
    });
  });

  // UPLOAD EXCEL PEGAWAI
  //=======================================================
  $('#btn-excel').on('click', function(){
    $('#modal-upload').modal('hide');
    $('#modal-excel').modal('show');
  });

  $('#pilih-excel').on('click', function(){
    $( "#file-excel" ).trigger( "click" );
  });

  $('#file-excel').change(function() {
    var label = $('#label-file');
    var file = $('#file-excel')[0].files[0].name;
    label.text('File terpilih: '+file);
  });

  $('#upload-excel').on('click', function(){
    $( "#btn-upload-excel" ).trigger( "click" );
  });

  $("#form-upload-excel").on('submit', function(e){
    $('#upload-excel').html('Mengirim Data . . .');
    $('#upload-excel').attr('disabled','true');
    $('#pilih-excel').attr('disabled','true');
    e.preventDefault();
    $.ajax({
      type: 'POST',
      url: '<?= base_url()?>user/postUploadBuatPegawai',
      data: new FormData(this),
      contentType: false,
      cache: false,
      processData:false,
      success: function(data){
        if(data == 'Sukses'){
          swal(
            'Sukses', 'Berhasil mengubah data pegawai', 'success'
          ).then((result) => {
            if (result.value) {
              location.reload();
            }
          })
        }else{
          swal( 'Gagal', data, 'error')
        }
      },error:function(error){
        swal(error)
      }
    });
  });

  // PERUBAHAN DATA PEGAWAI
  //=======================================================
  $('#simpanUbahPegawai').on('click',function(){
    var user_id = $("input[name='user_id']").val();
    var name = $("input[name='name']").val();
    var nip = $("input[name='nip']").val();
    var position = $("input[name='position']").val();
    var functional = $("input[name='functional']").val();
    var rank = $("select[name='rank']").val();
    var address = $("input[name='address']").val();
    var education = $("input[name='education']").val();
    var email = $("input[name='email']").val();

    // $('#simpanUbahPegawai').html('Mengirim Data . . .');
    // $('#simpanUbahPegawai').attr('disabled','true');
    dataSend = {
      user_id : user_id,
      name : name,
      nip : nip,
      position : position,
      functional : functional,
      rank : rank,
      address : address,
      education : education,
      email : email,
    };
    console.log(dataSend);
    $.ajax({
      type:"POST",
      url: "<?php echo base_url()?>user/postUbahPegawai",
      data: dataSend,
      datatype: 'json',
      success: function(data){
        if (data == 'Sukses') {
          swal(
            'Sukses', 'Berhasil mengubah data pegawai', 'success'
          ).then((result) => {
            if (result.value) {
              location.href = '<?= site_url('detail-pegawai/')?>'+user_id;
            }
          })
        }else {
          swal( 'Gagal', data, 'error')
        }
      }, error:function(error){
        console.log(error)
      }
    });
  });
});

//============================================================
//ConfirmDelete
//============================================================
function deletePegawai(data){
  swal({
    title: 'Ada yakin?',
    text: "Pegawai ini akan dihapus",
    type: 'primary',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Ya!'
  }).then((result) => {
    if (result.value) {
      dataSend = {user_id:data}
      // console.log(dataSend);
      $.ajax({
        type:"POST",
        url: "<?= site_url('user/deletePegawai')?>",
        data: dataSend,
        datatype: 'json',
        success: function(data){
          if (data == 'Sukses') {
            swal(
              'Sukses',
              'Berhasil menghapus pegawai',
              'success'
            ).then((result) => {
              if (result.value) {
                location.href = '<?php echo site_url('pegawai')?>';
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
    }
  })
};

<?php if (!empty($_SESSION['alert'])): ?>
swal(
  "<?=empty($_SESSION['alert'])?'':$_SESSION['alert']?>",
  "<?=empty($_SESSION['message'])?'':$_SESSION['message']?>",
  "<?=empty($_SESSION['type'])?'':$_SESSION['type']?>"
);
<?php endif; ?>
</script>
