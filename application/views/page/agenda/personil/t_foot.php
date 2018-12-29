<script type="text/javascript">
    $('#btn-tambah-personil').on('click', function(){
        var added_list = $('#list-personil');
        var added_list = $('#list-personil');
        var new_form = "<tr>";
        new_form += "<td><div class='form-group'>";
        new_form += "<select  class='form-control' name='nama-personil' id='nama-personil'>";
        new_form += "<option value='0' disabled selected>Pilih Personil</option>";
        <?php if (!empty($pegawai)){?>
        <?php foreach($pegawai as $p){?>
            new_form += "<option value='<?= $p->user_name?>' id-pegawai='<?= $p->user_id?>' nip='<?= $p->user_nip?>'><?= $p->user_name?></option>";
        <?php }}?>
        new_form += "</select></div></td>";
        new_form += "<td class='text-center'><button class='btn btn-danger delete-personil'><i class='material-icons'>delete_forever</i></button></td></tr>";
        added_list.append(new_form);
    });

    $(document).on('click','.delete-personil', function(){
        $(this).parent().parent().remove();
    });


    $('#btn-tambah-agenda-personil').on('click',function(){
        $(this).attr('disabled','trus');
        document.getElementById('btn-tambah-agenda-personil').innerHTML = 'Menyimpan . . .';
        var nama = $('#nama-kegiatan').val();
        var tgl_mulai = $('#tgl-mulai').val();
        var tgl_selesai = $('#tgl-selesai').val();
        var tempat = $('#tempat').val();
        var waktu = $('#waktu').val();
        
        var personil = [];
        $('[name="nama-personil"]').each(function(){
            if($(this).val() != '')
            {
                personil.push($(this).val());
            }
        });

        var nipArr = [];
        $('[name="nama-personil"]').each(function(){
            var nip = $(this).find(':selected').attr('nip')
            if(nip != '')
            {
                nipArr.push(nip);
            }
        });
        
        var idArr = [];
        $('[name="nama-personil"]').each(function(){
            var id = $(this).find(':selected').attr('id-pegawai')
            if(id != '')
            {
                idArr.push(id);
            }
        });

        $.ajax({
            type:"POST",
            url: "<?php echo base_url()?>agenda/create_agenda_personil",
            data: {
               nama_kegiatan : nama,
               tanggal_mulai : tgl_mulai,
               tanggal_selesai : tgl_selesai,
               tempat_kegiatan : tempat,
               waktu_kegiatan : waktu,
               personil : personil,
               arrNip : nipArr,
               arrId : idArr
            },
            datatype: 'json',
            success: function(data){
                if(data == 1){
                    swal('Berhasil Di Agendakan', 'Data agenda berhasil ditambahkan', 'success')
                    .then((value) => {
                        location.href = '<?php echo site_url('agenda-personil/'); ?>';
                    })
                }else{
                    swal('GAGAL','Gagal menyimpan Agenda. Silahkan hubungi admin','warning');
                    console.log(data); 
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
        var tanggal = $('#tgl').val();
        var tempat = $('#tempat').val();
        var waktu = $('#waktu').val();
        var id = $('#id-agenda').val()
        $.ajax({
            type:"POST",
            url: "<?php echo base_url()?>agenda/update_agenda_kegiatan/"+id,
            data: {
               nama_kegiatan : nama,
               tanggal_kegiatan : tanggal,
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

    var id_agenda = $('#id-agenda').val();
    var timer;
    $('.add-personil-edit').on('click', function(){
        $.ajax({
            type:"POST",
            url: "<?php echo base_url()?>agenda/add_personil_agenda",
            data: {id:id_agenda},
            datatype: 'json',
            success: function(data){    
                if(data == 1){
                    location.reload();
                }else{
                    swal('Gagal','Gagal Menambah Personil. Silahkan hubungi admin','warning');
                    console.log(data);
                }
            }, error:function(error){
                swal(error)
            }
        });
    });
    
    $('.edit-pilih-personil').on('change', function(){
        var personil = $(this).val();
        var nip = $(this).find(':selected').attr('nip');
        var id_user = $(this).find(':selected').attr('id-pegawai');
        var id_personil_agenda = $(this).parent().parent().attr('id-personil');
        $('.status-edit').html('Menyimpan. . .');
        timer = setTimeout(function () {
            $.ajax({
                type:"POST",
                url: "<?php echo base_url()?>agenda/update_personil_agenda/"+id_personil_agenda,
                data: {
                    nama : personil,
                    nip : nip,
                    id_user : id_user
                },
                datatype: 'json',
                success: function(data){    
                    if(data == 1){
                        $('.status-edit').html('Tersimpan!');
                    }else{
                        swal('Gagal','Gagal Menambah Personil. Silahkan hubungi admin','warning');
                        console.log(data);
                    }
                }, error:function(error){
                    swal(error)
                }
            });
        }, 1000);
    });

    $('.detail-agenda-edit').on('keyup', function(){
        var value = $(this).val();
        var field = $(this).attr('field');
        clearTimeout(timer);
        $('.status-edit').html('Menyimpan. . .');
        if (event.keyCode >= 65 && event.keyCode <= 90 || event.keyCode >= 48 && event.keyCode <= 57 || event.keyCode == 8 || event.keyCode == 13){
            timer = setTimeout(function () {
                $.ajax({
                    type:"POST",
                    url: "<?php echo base_url()?>agenda/update_data_agenda",
                    data: {
                        value : value,
                        field : field,
                        id : id_agenda
                    },
                    datatype: 'json',
                    success: function(response){
                        if(response == 1){
                            $('.status-edit').html('Tersimpan!');
                        }else{
                            swal('Gagal!','Gagal Memperbaharui data. Hubungi Bagian IT','warning');
                        }
                    }, error:function(error){
                        swal(error);
                    }
                });
            }, 1000);
        }
    });

    $('.tgl-edit-agenda-personil').on('change', function(){
        var value = $(this).val();
        var field = $(this).attr('field');
        timer = setTimeout(function () {
            $.ajax({
                type:"POST",
                url: "<?php echo base_url()?>agenda/update_data_agenda",
                data: {
                    value : value,
                    field : field,
                    id : id_agenda
                },
                datatype: 'json',
                success: function(response){
                    if(response == 1){
                        $('.status-edit').html('Tersimpan!');
                    }else{
                        swal('Gagal!','Gagal Memperbaharui data. Hubungi Bagian IT','warning');
                    }
                }, error:function(error){
                    swal(error);
                }
            });
        }, 1000);
    });

    $('.delete-personil-edit').on('click', function(){
        var id_personil_agenda = $(this).parent().parent().attr('id-personil');
        swal({
            title: "Anda Yakin?",
            text: "Anda akan menghapus Personil untuk Agenda ini!",
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
                    url: "<?php echo base_url()?>agenda/delete_personil/"+id_personil_agenda,
                    data: {id:id_personil_agenda},
                    datatype: 'json',
                    success: function(data){    
                        if(data == 1){
                            location.reload();
                        }else{
                            swal('GAGAL','Gagal menghapus Personil di Agenda. Silahkan hubungi Bagian IT','warning');
                        }
                    }, error:function(error){
                        swal(error)
                    }
                });
            }
        });
    });

    $('.hapus-agenda-personil').on('click', function(){
        var id_agenda = $(this).attr('id-agenda');
        swal({
            title: "Anda Yakin?",
            text: "Anda akan menghapus untuk Agenda Personil ini!",
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
                    data: {id:id_agenda},
                    datatype: 'json',
                    success: function(data){  
                        if(data == 1){
                            location.href = '<?php echo site_url('agenda-personil'); ?>';
                        }else{
                            swal('GAGAL','Gagal menghapus Personil di Agenda. Silahkan hubungi Bagian IT','warning');
                        }
                    }, error:function(error){
                        swal(error)
                    }
                });
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
            url: "<?php echo base_url()?>agenda/search/",
            data: {
               value : search,
               jenis : 2
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
        var loading = '<img class="loading-search" src="<?= base_url('assets/img')?>/loading_roll.gif">'
        list.empty();
        list.append(loading);
        $.ajax({
            type:"POST",
            url: "<?php echo base_url()?>agenda/search",
            data: {
               value : search,
               jenis : 2
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