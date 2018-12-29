<script type="text/javascript">

$(document).ready(function() {

  //============================================================
  //PROSES PEYIMPANAN RUANGAN
  //============================================================
  $('#simpanRuangan').on('click',function(){
    //SET VARIABLE
    var ruangan = $("input[name='ruangan']").val();
    var lokasi = $("input[name='lokasi']").val();
    var kapasitas = $("input[name='kapasitas']").val();

    $('#simpanRuangan').html('Mengirim Data . . .');
    $('#simpanRuangan').attr('disabled','true');

    dataSend = {
      ruangan : ruangan,
      lokasi : lokasi,
      kapasitas : kapasitas
    }
    console.log(dataSend);
    $.ajax({
      type:"POST",
      url: "<?= site_url('ruangan/postBuatRuangan')?>",
      data: dataSend,
      datatype: 'json',
      success: function(data){
        if (data == 'Sukses') {
          swal(
            'Sukses',
            'Berhasil membuat ruangan',
            'success'
          ).then((result) => {
            if (result.value) {
              location.href = '<?php echo site_url('ruangan')?>';
            }
          })
        }else{
          swal(
            'Gagal',
            data,
            'error'
          )
          $('#simpanRuangan').html('SELESAI');
          $('#simpanRuangan').removeAttr('disabled');
        }
      }, error:function(error){
        console.log(error);
      }
    });
  });

  //============================================================
  //PROSES PEYIMPANAN EDIT SURAT KELUAR
  //============================================================
  $('#simpanEditRuangan').on('click',function(){
    //SET VARIABLE
    var id = $("input[name='id']").val();
    var ruangan = $("input[name='ruangan']").val();
    var lokasi = $("input[name='lokasi']").val();
    var kapasitas = $("input[name='kapasitas']").val();
    // $('#simpanEditRuangan').html('Mengirim Data . . .');
    // $('#simpanEditRuangan').attr('disabled','true');

    dataSend = {
      id : id,
      ruangan : ruangan,
      lokasi : lokasi,
      kapasitas : kapasitas
    }
    console.log(dataSend);
    $.ajax({
      type:"POST",
      url: "<?= site_url('ruangan/postEditRuangan')?>",
      data: dataSend,
      datatype: 'json',
      success: function(data){
        if (data == 'Sukses') {
          swal(
            'Sukses',
            'Berhasil mengubah ruangan',
            'success'
          ).then((result) => {
            if (result.value) {
              location.href = '<?php echo site_url('ruangan')?>';
            }
          })
        }else{
          swal(
            'Gagal',
            data,
            'error'
          )
          $('#simpanEditRuangan').html('SELESAI');
          $('#simpanEditRuangan').removeAttr('disabled');
        }
      }, error:function(error){
        console.log(error);
      }
    });
  });
});


//============================================================
//ConfirmDelete
//============================================================
function deleteRuangan(data){
  swal({
    title: 'Ada yakin akan menghapus?',
    text: "Data Ruangan ini akan dihapus",
    type: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Ya!'
  }).then((result) => {
    if (result.value) {
      dataSend = {id:data}
      console.log(dataSend);
      $.ajax({
        type:"POST",
        url: "<?= site_url('ruangan/deleteRuangan')?>",
        data: dataSend,
        datatype: 'json',
        success: function(data){
          if (data == 'Sukses') {
            swal(
              'Sukses',
              'Berhasil menghapus  ruangan',
              'success'
            ).then((result) => {
              if (result.value) {
                location.href = '<?php echo site_url('ruangan')?>';
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

//============================================================
//UpdatePenggunaan
//============================================================
function ijinkanPenggunaan(data){
  swal({
    title: 'Ada yakin akan mengijinkan?',
    text: "Data Penggunaan Ruangan ini akan diijinkan",
    type: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Ya!'
  }).then((result) => {
    if (result.value) {
      dataSend = {id:data}
      console.log(dataSend);
      $.ajax({
        type:"POST",
        url: "<?= site_url('ruangan/ijinkanPenggunaan')?>",
        data: dataSend,
        datatype: 'json',
        success: function(data){
          if (data == 'Sukses') {
            swal(
              'Sukses',
              'Berhasil mengijikan penggunaan ruangan',
              'success'
            ).then((result) => {
              if (result.value) {
                location.href = '<?php echo site_url('penggunaan-ruangan')?>';
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

</body>
</html>
