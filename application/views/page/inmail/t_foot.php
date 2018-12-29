<script type="text/javascript">
        $(document).ready(function(){
            function readURL(input) {
                if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#fotosurat').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
                }
            }

            $('#pilih-foto-surat').on('click',function(){
                $( "#gambar-surat" ).trigger( "click" );
            });
            $('#btn-foto-surat-masuk').on('click',function(){
                $( "#edit-foto-surat-masuk" ).trigger( "click" );
            });

            $("#gambar-surat").change(function() {
                readURL(this);
                $('#hapus-foto-surat').css('visibility','visible');
                $('#pilih-foto-surat').addClass('btn-sm');
            });
            $("#edit-foto-surat-masuk").change(function() {
                readURL(this);
            });

            $('#hapus-foto-surat').on('click', function(){
                $('#fotosurat').attr('src','');
                $('#hapus-foto-surat').css('visibility','hidden');
                $('#pilih-foto-surat').removeClass('btn-sm');
            });

            $('#edit-hapus-foto-surat').on('click', function(){
                var id = $(this).attr("id-surat");
                swal({
                    title: "Anda Yakin?",
                    text: "Anda akan menghapus hasil scan surat ini!",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Hapus!',
                    cancelButtonText: 'Batal',
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    })
                .then((hapus) => {
                    if (hapus.value) {
                        $.ajax({
                            type:"POST",
                            url: "<?php echo base_url()?>inmail/deleteHasilScan",
                            data: {id:id},
                            datatype: 'json',
                            success: function(data){  
                                if(data == 1){
                                    swal('Berhasil','Hasil Scan Surat Masuk berhasil dihapus','success');
                                    location.reload();
                                }else{
                                    swal('Gagal','Hasil Scan Gagal dihapus','warning')
                                }
                            }, error:function(error){
                                swal(error)
                            }
                        });
                    }
                });
            });

            $("#form-surat-masuk").on('submit', function(e){
                e.preventDefault();
                $.ajax({
                    type: 'POST',
                    url: '<?= base_url()?>inmail/buatSuratBaru',
                    data: new FormData(this),
                    contentType: false,
                    cache: false,
                    processData:false,
                    beforeSend: function(){
                        $('#simpanSuratMasuk').attr('disabled','true');
                        $('#simpanSuratMasuk').val('Menyimpan . . .');
                    },
                    success: function(data){
                        if(data == 1){
                            location.href = '<?= base_url('')?>inmail';
                        }else{
                            swal('GAGAL',data,'warning');
                        }
                    },error:function(error){
                            swal('ERROR',error,'warning');
                    }
                });
            });

            $('#form-edit-surat-masuk').on('submit', function(e){
                e.preventDefault();
                var gambar = $('#edit-foto-surat-masuk').val();
                if(gambar !== ''){
                    $.ajax({
                        type: 'POST',
                        url: '<?= base_url()?>inmail/updateDataSurat',
                        data: new FormData(this),
                        contentType: false,
                        cache: false,
                        processData:false,
                        beforeSend: function(){
                            $('#update-surat-masuk').attr('disabled','true');
                            $('#update-surat-masuk').html('Menyimpan . . .');
                        },
                        success: function(data){
                            if(data == 1){
                                location.href = '<?= base_url('')?>inmail';
                            }else{
                                swal('GAGAL',data,'warning');
                            }
                        },error:function(error){
                                swal('ERROR',error,'warning');
                        }
                    });
                }else{
                    swal('Silahkan pilih Gambar hasil scan surat masuk');
                }
            });
            

            $('#hapusInmail').on('click',function(){
                var id = $(this).attr("id-inmail");
                swal({
                    title: "Anda Yakin?",
                    text: "Anda akan menghapus surat ini!",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Hapus!',
                    cancelButtonText: 'Batal',
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    })
                .then((hapus) => {
                    if (hapus.value) {
                        $.ajax({
                        type:"POST",
                        url: "<?php echo base_url()?>inmail/deleteSurat",
                        data: {id:id},
                        datatype: 'json',
                        success: function(data){    
                                swal(data);                     
                                location.href = '<?php echo site_url('inmail'); ?>';
                            }, error:function(error){
                                console.log(error)
                            }
                        });
                    }
                });
            });
            $('#search-input').on('keyup',function(){
                if(event.keyCode == 13)
                {
                    $('.btn-search-inmail').trigger('click');
                }
            });
            $('.btn-search-inmail').on('click', function(){
                var search = $('#search-input').val();
                var list = $('#list-inmail-kegiatan');
                var hasil = $('#list-inmail-cari');
                var loading = '<img class="loading-search" src="<?= base_url('assets/img')?>/loading_roll.gif">'
                list.remove();
                hasil.append(loading);
                $.ajax({
                    type:"POST",
                    url: "<?php echo base_url()?>inmail/search/",
                    data: {
                        value : search
                    },
                    datatype: 'json',
                    success: function(data){
                        $('.loading-search').remove();
                        $('#list-inmail-cari').html(data);
                    }, error:function(error){
                        console.log(error)
                    }
                });
            });


            <?php if (!empty($_SESSION['alert'])): ?>
            swal(
            "<?=empty($_SESSION['alert'])?'':$_SESSION['alert']?>",
            "<?=empty($_SESSION['message'])?'':$_SESSION['message']?>",
            "<?=empty($_SESSION['type'])?'':$_SESSION['type']?>"
            )
            <?php endif; ?>
        })
    </script>