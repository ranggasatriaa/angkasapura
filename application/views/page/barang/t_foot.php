<script type="text/javascript">
    $(document).ready(function(){
        // $('.date').datepicker();
        function readURL(input) {
            if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('#pictview').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
            }
        }

        $('#pilih-foto-barang').on('click',function(){
            $( "#file-barang" ).trigger( "click" );
        });
        $('#edit-foto-barang').on('click',function(){
            $( "#edit-file-barang" ).trigger( "click" );
        });

        $("#file-barang").change(function() {
            readURL(this);
            $('#hapus-foto-barang').css('display','block');
            $('#pilih-foto-barang').css('width','45%');
            $('#pilih-foto-barang').addClass('btn-sm float-right');
        });
        
        $("#edit-file-barang").change(function() {
            readURL(this);
            $('#edit-foto-barang').addClass('btn-sm');
        });
        
        $('#hapus-foto-barang').on('click', function(){
            $('#pictview').attr('src','');
            $('#hapus-foto-barang').css('display','none');
            $('#pilih-foto-barang').removeClass('btn-sm float-right');
        });

        $('#hapus-foto-barang-edit').on('click', function(){
            var id = $('#laporan-id').val();
            swal({
                title: "Anda Yakin?",
                text: "Anda akan menghapus gambar laporan ini!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Hapus!',
                cancelButtonText: 'Batal',
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                })
            .then((hapus) => {
                if (hapus.value) {
                    $.ajax({
                        type:"POST",
                        url: "<?php echo base_url()?>kerusakan/delete_image",
                        data: {id:id},
                        datatype: 'json',
                        success: function(data){    
                            if(data == 1){
                                location.href = '<?php echo site_url('edit-laporan/'); ?>'+id;
                            }else{
                                swal('warning','Gagal Hapus', 'Gambar gagal dihapus');
                            }
                        }, error:function(error){
                            console.log(error)
                        }
                    });
                }
            });
        });

        $("#form-lapor-rusak").on('submit', function(e){
            e.preventDefault();
            $.ajax({
                type: 'POST',
                url: '<?= base_url()?>kerusakan/create_laporan',
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData:false,
                beforeSend: function(){
                    $('#lapor-kerusakan').attr('disabled','true');
                    $('#lapor-kerusakan').val('Melapor. . . .');
                },
                success: function(data){
                    if(data == 1){
                        location.href = '<?= base_url('')?>lapor-rusak';
                    }else{
                        swal('GAGAL','Gagal Untuk melapor. Silahkan hubungi admin','warning');
                    }
                },error:function(error){
                        console.log(error)
                }
            });
        });

        $("#form-update-laporan").on('submit', function(e){
            e.preventDefault();
            $.ajax({
                type: 'POST',
                url: '<?= base_url()?>kerusakan/update_laporan',
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData:false,
                beforeSend: function(){
                    $('#lapor-kerusakan').attr('disabled','true');
                    $('#lapor-kerusakan').val('Melapor. . . .');
                },
                success: function(data){
                    if(data == 1){
                        // location.href = '<?= base_url('')?>lapor-rusak';
                        swal('BERHASIL','Berhasil memperbaharui data laporan','success');
                    }else{
                        swal('GAGAL','Gagal Untuk melapor. Silahkan hubungi admin','warning');
                    }
                },error:function(error){
                        console.log(error)
                }
            });
        });

        $(document).on('click','.hapus-laporan', function(){
            var id = $(this).attr('laporan-id');
            swal({
                    title: "Anda Yakin?",
                    text: "Anda akan menghapus Laporan Kerusakan ini!",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Hapus!',
                    cancelButtonText: 'Batal',
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                })
            .then((hapus) => {
                if (hapus.value) {
                    $.ajax({
                        type:"POST",
                        url: "<?php echo base_url()?>kerusakan/delete_laporan",
                        data: {id:id},
                        datatype: 'json',
                        success: function(data){    
                            if(data == 1){
                                location.href = '<?php echo site_url('lapor-rusak/'); ?>';
                            }else{
                                swal('warning','Gagal Hapus', 'Laporan gagal dihapus');
                            }
                        }, error:function(error){
                            console.log(error)
                        }
                    });
                }
            });
        });

        $('.btn-diperbaiki').on('click',function(){
            var id = $(this).attr('laporan-id');
            swal({
                    title: "Anda Yakin?",
                    text: "Anda akan menandai bahwa fasilitas ini telah diperbaiki!",
                    type: 'info',
                    showCancelButton: true,
                    confirmButtonText: 'Telah diperbaiki!',
                    cancelButtonText: 'Batal',
                    confirmButtonColor: '#00c645',
                    cancelButtonColor: '#3085d6',
                })
            .then((hapus) => {
                if (hapus.value) {
                    $.ajax({
                        type:"POST",
                        url: "<?php echo base_url()?>kerusakan/perbaikan_kerusakan",
                        data: {id:id},
                        datatype: 'json',
                        success: function(data){    
                            if(data == 1){
                                location.href = '<?php echo site_url('lapor-rusak/'); ?>';
                            }else{
                                swal('warning','Gagal Hapus', 'Laporan gagal dihapus');
                            }
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
                $('.btn-search-laporan').trigger('click');
            }
        });
        $('.btn-search-laporan').on('click', function(){
            var search = $('#search-input').val();
            var list = $('#list-laporan');
            var hasil = $('#list-laporan-cari');
            var loading = '<img class="loading-search" src="<?= base_url('assets/img')?>/loading_roll.gif">'
            list.remove();
            hasil.append(loading);
            $.ajax({
                type:"POST",
                url: "<?php echo base_url()?>kerusakan/search/",
                data: {
                    value : search
                },
                datatype: 'json',
                success: function(data){
                    $('.loading-search').remove();
                    $('#list-laporan-cari').html(data);
                }, error:function(error){
                    console.log(error)
                }
            });
        });

    });
</script>