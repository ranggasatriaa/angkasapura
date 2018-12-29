<script type="text/javascript">
    $('#btn-tambah-agenda-kegiatan').on('click',function(){
        $(this).attr('disabled','trus');
        document.getElementById('btn-tambah-agenda-kegiatan').innerHTML = 'Menyimpan . . .';
        var nama = $('#nama-kegiatan').val();
        var tgl_mulai = $('#tgl-mulai').val();
        var tgl_selesai = $('#tgl-selesai').val();
        var tempat = $('#tempat').val();
        var waktu = $('#waktu').val();
        $.ajax({
            type:"POST",
            url: "<?php echo base_url()?>agenda/create_agenda_kegiatan",
            data: {
               nama_kegiatan : nama,
               tanggal_mulai : tgl_mulai,
               tanggal_selesai : tgl_selesai,
               tempat_kegiatan : tempat,
               waktu_kegiatan : waktu
            },
            datatype: 'json',
            success: function(data){    
                if(data == 1){
                    location.href = '<?php echo site_url('agenda-kegiatan/'); ?>';
                }else{
                    swal('warning','GAGAL', 'Agenda Gagal disimpan');
                }
            }, error:function(error){
                console.log(error)
            }
        });
    });

    $('#btn-edit-agenda-kegiatan').on('click',function(){
        $(this).attr('disabled','trus');
        document.getElementById('btn-edit-agenda-kegiatan').innerHTML = 'Memperbarui . . .';
        var nama = $('#nama-kegiatan').val();
        var tgl_mulai = $('#tgl-agenda-mulai').val();
        var tgl_selesai = $('#tgl-agenda-selesai').val();
        var tempat = $('#tempat').val();
        var waktu = $('#waktu').val();
        var id = $('#id-agenda').val()
        $.ajax({
            type:"POST",
            url: "<?php echo base_url()?>agenda/update_agenda_kegiatan/"+id,
            data: {
               nama_kegiatan : nama,
               tanggal_mulai : tgl_mulai,
               tanggal_selesai : tgl_selesai,
               tempat_kegiatan : tempat,
               waktu_kegiatan : waktu
            },
            datatype: 'json',
            success: function(data){    
                if(data == 1){
                    location.href = '<?php echo site_url('agenda-kegiatan/'); ?>';
                }else{
                    swal('GAGAL','Gagal memperbarui. Silahkan hubungi admin','warning');
                }
            }, error:function(error){
                swal(error)
            }
        });
    });

    $(document).on('click','.hapus-agenda-kegiatan', function(){
        var id  = $(this).attr('id-agenda');
        swal({
                title: "Anda Yakin?",
                text: "Anda akan menghapus Agenda ini!",
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
                    url: "<?php echo base_url()?>agenda/delete_agenda",
                    data: {id:id},
                    datatype: 'json',
                    success: function(data){    
                        if(data == 1){
                            location.href = '<?php echo site_url('agenda-kegiatan'); ?>';
                        }else{
                            swal('GAGAL','Gagal menghapus Agenda. Silahkan hubungi admin','warning');
                        }
                    }, error:function(error){
                        swal(error)
                    }
                });
            }
        });
    });

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
        label.text(file);
    });

    $('#upload-excel').on('click', function(){
        $( "#btn-upload-excel" ).trigger( "click" );
    });

    $("#form-upload-excel").on('submit', function(){
        $.ajax({
            type: 'POST',
            url: '<?= base_url()?>agenda/upload_excel',
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData:false,
            success: function(data){
                if(data == 1){
                    location.href = '<?= base_url('agenda-kegiatan')?>';
                }else{
                    swal('Gagal','Gagal untuk upload file excel. Hubungi Bagian IT','warning');
                }
            },error:function(error){
                swal(error)
            }
        });
    });
    $('#search-input').on('keyup',function(){
        if(event.keyCode == 13)
        {
            $('.btn-search-agenda').trigger('click');
        }
    });
    $('#tanggal-cari').on('change',function(){
        var search = $(this).val();
        var list = $('#list-agenda-kegiatan');
        var loading = '<img class="loading-search" src="<?= base_url('assets/img')?>/loading_roll.gif">';
        list.empty();
        list.append(loading);
        $.ajax({
            type:"POST",
            url: "<?php echo base_url()?>agenda/search",
            data: {
               value : search,
               jenis : 1
            },
            datatype: 'json',
            success: function(data){
                $('.loading-search').remove();
                $('#list-agenda-kegiatan').html(data);
            }, error:function(error){
                console.log(error)
            }
        });
    });
    $('.btn-search-agenda').on('click', function(){
        var search = $('#search-input').val();
        var list = $('#list-agenda-kegiatan');
        var loading = '<img class="loading-search" src="<?= base_url('assets/img')?>/loading_roll.gif">';
        list.empty();
        list.append(loading);
        $.ajax({
            type:"POST",
            url: "<?php echo base_url()?>agenda/search",
            data: {
               value : search,
               jenis : 1
            },
            datatype: 'json',
            success: function(data){
                $('.loading-search').remove();
                $('#list-agenda-kegiatan').html(data);
            }, error:function(error){
                console.log(error)
            }
        });
    });
</script>