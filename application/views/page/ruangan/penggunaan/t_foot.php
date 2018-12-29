<script type="text/javascript">

$(document).ready(function() {

  //============================================================
  //PROSES PEYIMPANAN SURAT KELUAR
  //============================================================
  $('#simpanPenggunaan').on('click',function(){
    //SET VARIABLE
    var tanggal_mulai = $("input[name='tanggal_mulai']").val();
    var waktu_mulai = $("input[name='waktu_mulai']").val();
    var tanggal_selesai = $("input[name='tanggal_selesai']").val();
    var waktu_selesai = $("input[name='waktu_selesai']").val();
    var tujuan = $("input[name='tujuan']").val();
    var permintaan_ruangan = $("input[name='permintaan_ruangan']").val();
    var peminjam = $("input[name='peminjam']").val();
    var telepon = $("input[name='telepon']").val();

    $('#simpanPenggunaan').html('Mengirim Data . . .');
    $('#simpanPenggunaan').attr('disabled','true');

    dataSend = {
      tanggal_mulai : tanggal_mulai,
      waktu_mulai : waktu_mulai,
      tanggal_selesai : tanggal_selesai,
      waktu_selesai : waktu_selesai,
      tujuan : tujuan,
      permintaan_ruangan : permintaan_ruangan,
      peminjam : peminjam,
      telepon : telepon
    }
    // console.log(dataSend);
    $.ajax({
      type:"POST",
      url: "<?= site_url('ruangan/postBuatPenggunaan')?>",
      data: dataSend,
      datatype: 'json',
      success: function(data){
        if (data == 'Sukses') {
          swal(
            'Sukses',
            'Berhasil membuat pemintaan penggunaan ruang',
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
          $('#simpanPenggunaan').html('SELESAI');
          $('#simpanPenggunaan').removeAttr('disabled');
        }
      }, error:function(error){
        console.log(error);
      }
    });
  });

  //============================================================
  //PROSES PEYIMPANAN EDIT SURAT KELUAR
  //============================================================
  $('#simpanEditPenggunaan').on('click',function(){
    //SET VARIABLE

    var id = $("input[name='id']").val();
    var tanggal_mulai = $("input[name='tanggal_mulai']").val();
    var waktu_mulai = $("input[name='waktu_mulai']").val();
    var tanggal_selesai = $("input[name='tanggal_selesai']").val();
    var waktu_selesai = $("input[name='waktu_selesai']").val();
    var tujuan = $("input[name='tujuan']").val();
    var peminjam = $("input[name='peminjam']").val();
    var telepon = $("input[name='telepon']").val();
    var status = $("input[name='status']").val();
    console.log(status);
    if (status === "0") {
      var permintaan_ruangan = $("input[name='permintaan_ruangan']").val();
    }else {
      var ruangan = $("select[name='ruangan']").val();
    }

    $('#simpanEditPenggunaan').html('Mengirim Data . . .');
    $('#simpanEditPenggunaan').attr('disabled','true');

    if (status === "0") {
      dataSend = {
        id : id,
        tanggal_mulai : tanggal_mulai,
        waktu_mulai : waktu_mulai,
        tanggal_selesai : tanggal_selesai,
        waktu_selesai : waktu_selesai,
        tujuan : tujuan,
        peminjam : peminjam,
        telepon : telepon,
        status : status,
        permintaan_ruangan : permintaan_ruangan,
      }
    }else {
      dataSend = {
        id : id,
        tanggal_mulai : tanggal_mulai,
        waktu_mulai : waktu_mulai,
        tanggal_selesai : tanggal_selesai,
        waktu_selesai : waktu_selesai,
        tujuan : tujuan,
        peminjam : peminjam,
        telepon : telepon,
        status : status,
        ruangan : ruangan,
      }
    }
    console.log(dataSend);
    $.ajax({
      type:"POST",
      url: "<?= site_url('ruangan/postEditPenggunaan')?>",
      data: dataSend,
      datatype: 'json',
      success: function(data){
        if (data == 'Sukses') {
          swal(
            'Sukses',
            'Berhasil mengubah pemintaan penggunaan ruang',
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
          $('#simpanEditPenggunaan').html('SELESAI');
          $('#simpanEditPenggunaan').removeAttr('disabled');
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
function deletePenggunaan(data,message){
  swal({
    title: 'Ada yakin?',
    text: "Data Penggunaan Ruangan ini akan "+message,
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
        url: "<?= site_url('ruangan/deletePenggunaan')?>",
        data: dataSend,
        datatype: 'json',
        success: function(data){
          if (data == 'Sukses') {
            swal(
              'Sukses',
              'Penggunaan ruangan berasil '+message,
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

//============================================================
//UpdatePenggunaan
//============================================================
function ijinkanPenggunaan(id,user){
  var ruangan = $("select[name='ruangan']").val();
  console.log(ruangan);
  if (ruangan.length === 0) {
    swal('Error', 'Pilih ruangan terlebih dahulu', 'error');
  }else {
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
        dataSend = {
          id:id,
          user : user,
          ruangan : ruangan
        }
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
  }

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
