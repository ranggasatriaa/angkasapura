
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

$("input[name='password2']").blur(function(){
  if($(this).val() != $("input[name='password1']").val()){
    $('.confirm_message').html('Konfirmasi password tidak sesuai');
    $('.confirm_message').addClass('text-danger');
    $('.cek-input').show();
    $('.simpan').hide();
  }else {
    $('.confirm_message').html('');
    $('.confirm_message').removeClass('text-danger');
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
      return true;
    }else{
      $("#email_message").html("Maaf hanya huruf(a-z), angka(0-9), titik(.), stip(-) dan garis bawah(_) diperbolehkan");
      $("#email_message").removeClass('text-muted');
      $("#email_message").addClass('text-danger');
      $('.cek-input').show();
      $('.simpan').hide();
      return false;
    }
  }else{
    $("#email_message").hide();
  }
}

$(document).ready(function(){
  //SIMPAN PEGAWAI BARU
  $('#simpanAksesBaru').on('click',function(){
    var name = $("input[name='name']").val();
    var username = $("input[name='username']").val();
    var email = $("input[name='email']").val();
    var level = $("select[name='level']").val();
    var password = $("input[name='password1']").val();

    $('#simpanPegawaiBaru').html('Mengirim Data . . .');
    $('#simpanPegawaiBaru').attr('disabled','true');
    dataSend = {
      name : name,
      username : username,
      email : email,
      level : level,
      password : password
    };
    console.log(dataSend);
    $.ajax({
      type:"POST",
      url: "<?=site_url('user/postBuatAkses')?>",
      data: dataSend,
      datatype: 'json',
      success: function(data){
        if (data == 'Sukses') {
          swal(
            'Sukses',
            'Berhasil menambah data akses',
            'success'
          ).then((result) => {
            if (result.value) {
              location.href = '<?= site_url('akses')?>';
            }
          })
        }else {
          swal(
            'Gagal',
            data,
            'error'
          )
        }
      }, error:function(error){
        console.log(error)
      }
    });
  });

  $('#simpanUbahAkses').on('click',function(){
    var name = $("input[name='name']").val();
    var username = $("input[name='username']").val();
    var user_id = $("input[name='user_id']").val();
    var email = $("input[name='email']").val();
    var level = $("select[name='level']").val();
    var password = $("input[name='password1']").val();

    $('#simpanUbahAkses').html('Mengirim Data . . .');
    $('#simpanUbahAkses').attr('disabled','true');
    dataSend = {
      user_id : user_id,
      username : username,
      name : name,
      email : email,
      level : level,
      password : password
    };
    console.log(dataSend);
    $.ajax({
      type:"POST",
      url: "<?php echo base_url()?>user/postUbahAkses",
      data: dataSend,
      datatype: 'json',
      success: function(data){
        if (data == 'Sukses') {
          swal(
            'Sukses',
            'Berhasil mengubah data pegawai',
            'success'
          ).then((result) => {
            if (result.value) {
              location.href = '<?= site_url('detail-akses/')?>'+user_id;
            }
          })
        }else {
          swal(
            'Gagal',
            data,
            'error'
          )
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
function deleteAkses(data){
  swal({
    title: 'Ada yakin?',
    text: "Akses ini akan dihapus",
    type: 'primary',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Ya!'
  }).then((result) => {
    if (result.value) {
      dataSend = {user_id:data}
      console.log(dataSend);
      $.ajax({
        type:"POST",
        url: "<?= site_url('user/deleteAkses')?>",
        data: dataSend,
        datatype: 'json',
        success: function(data){
          if (data == 'Sukses') {
            swal(
              'Sukses',
              'Berhasil menghapus akses',
              'success'
            ).then((result) => {
              if (result.value) {
                location.href = '<?php echo site_url('akses')?>';
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
