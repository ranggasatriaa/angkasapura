<script type="text/javascript">
    $(document).ready(function(){
        $('#add-list-atk').on('click',function(){
            var added_list = $('.list-added-atk');
            var new_form = '<div class="row"><div class="col-md-5"><div class="form-group"><label class="bmd-label-floating">Nama Fasilitas</label><input type="text" class="form-control" name="nama-atk" id="nama-atk" autocomplete="off"></div></div><div class="col-md-4"><div class="form-group"><label class="bmd-label-floating">Jumlah Barang</label><input class="form-control" type="number" name="jumlah-atk" id="jumlah-atk"></div></div><div class="col-md-3 pt-3"><button class="btn btn-danger pull-left delete-atk" id="add-list-atk"><i class="material-icons">delete_forever</i></button></div></div>';
            added_list.append(new_form);
        });
        $('.add-atk-edit').on('click',function(){
            var nama_atk = 'Barang';
            var jumlah_atk = 1;
            var id = $(this).attr("id-permintaan");
            $.ajax({
                type: 'POST',
                url: '<?= base_url()?>peminjaman/add_atk/'+id,
                data: {
                    nama_atk : nama_atk,
                    jumlah_atk : jumlah_atk 
                },
                datatype: 'json',
                success: function(data){
                    if(data == 1){
                        location.reload();
                    }else{
                        swal('warning','Gagal Menambahkan', 'ATK gagal ditambahkan, Hubungi Bagian IT');
                    }
                },error:function(error){
                    swal(error)
                }
            });
        });
        $(document).on('click','.delete-atk', function(){
            var parent = $(this).parent().parent();
            parent.remove();
        });
        $(document).on('click','.delete-atk-edit', function(){
            var id = $(this).parent().parent().attr("id-atk");
            swal({
                title: "Anda Yakin?",
                text: "Anda akan menghapus ATK yang telah diajukan!",
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
                        url: "<?php echo base_url()?>peminjaman/delete_atk",
                        data: {id_atk:id},
                        datatype: 'json',
                        success: function(data){   
                            if(data == 1){
                                location.reload();
                            }else{
                                swal('warning','Gagal Hapus', 'ATK gagal dihapus');
                            }
                        }, error:function(error){
                            console.log(error)
                        }
                    });
                }
            });
        });

        // autosave atk
        var timer;
        $(document).on('keyup','.atk_edit', function(){
            var value = $(this).val();
            var id_atk = $(this).parent().parent().attr('id-atk');
            clearTimeout(timer);
            $('.status-edit').html('Menyimpan. . .');
            if (event.keyCode >= 65 && event.keyCode <= 90 || event.keyCode >= 48 && event.keyCode <= 57 || event.keyCode == 8 || event.keyCode == 13){
                timer = setTimeout(function () {
                    $.ajax({
                        type:"POST",
                        url: "<?php echo base_url()?>peminjaman/update_atk_edit",
                        data: {
                            value : value,
                            jenis : 'nama',
                            id : id_atk
                        },
                        datatype: 'json',
                        success: function(response){
                            if(response){
                                $('.status-edit').html('Tersimpan!');
                            }
                        }, error:function(error){
                            console.log('gagal memperharui nama _atk')
                        }
                    });
                }, 1000);
            }
        });
        $(document).on('keyup','.jumlah_edit', function(){
            var value = $(this).val();
            var id_atk = $(this).parent().parent().attr('id-atk');
            clearTimeout(timer);
            $('.status-edit').html('Menyimpan. . .');
            if (event.keyCode >= 65 && event.keyCode <= 90 || event.keyCode >= 48 && event.keyCode <= 57 || event.keyCode == 8 || event.keyCode == 13){
                timer = setTimeout(function () {
                    $.ajax({
                        type:"POST",
                        url: "<?php echo base_url()?>peminjaman/update_atk_edit",
                        data: {
                            value : value,
                            jenis : 'jumlah',
                            id : id_atk
                        },
                        datatype: 'json',
                        success: function(response){
                            if(response){
                                $('.status-edit').html('Tersimpan!');
                            }
                        }, error:function(error){
                            console.log('gagal memperharui nama _atk')
                        }
                    });
                }, 1000);
            }
        });
        // end of autosave atk

        // data pengaju
        $(document).on('keyup','#nama-pengaju', function(){
            var value = $(this).val();
            var id_pinjam = $(this).parent().parent().parent().attr('id-pinjam');
            clearTimeout(timer);
            $('.status-edit').html('Menyimpan. . .');
            if (event.keyCode >= 65 && event.keyCode <= 90 || event.keyCode >= 48 && event.keyCode <= 57 || event.keyCode == 8 || event.keyCode == 13){
                timer = setTimeout(function () {
                    $.ajax({
                        type:"POST",
                        url: "<?php echo base_url()?>peminjaman/update_pengaju_edit",
                        data: {
                            value : value,
                            jenis : 'nama',
                            id : id_pinjam
                        },
                        datatype: 'json',
                        success: function(response){
                            if(response == 1){
                                $('.status-edit').html('Tersimpan!');
                            }else{
                                swal('Gagal Memperbaharui data');
                            }
                        }, error:function(error){
                            console.log('gagal memperharui nama _atk')
                        }
                    });
                }, 1000);
            }
        });
        $(document).on('keyup','#nip-pengaju', function(){
            var value = $(this).val();
            var id_pinjam = $(this).parent().parent().parent().attr('id-pinjam');
            clearTimeout(timer);
            $('.status-edit').html('Menyimpan. . .');
            if (event.keyCode >= 65 && event.keyCode <= 90 || event.keyCode >= 48 && event.keyCode <= 57 || event.keyCode == 8 || event.keyCode == 13){
                timer = setTimeout(function () {
                    $.ajax({
                        type:"POST",
                        url: "<?php echo base_url()?>peminjaman/update_pengaju_edit",
                        data: {
                            value : value,
                            jenis : 'nip',
                            id : id_pinjam
                        },
                        datatype: 'json',
                        success: function(response){
                            if(response == 1){
                                $('.status-edit').html('Tersimpan!');
                            }else{
                                swal('Gagal Memperbaharui data');
                            }
                        }, error:function(error){
                            console.log('gagal memperharui nama _atk')
                        }
                    });
                }, 1000);
            }
        });
        $(document).on('change','#tanggal-pengaju', function(){
            var value = $(this).val();
            var id_pinjam = $(this).parent().parent().parent().attr('id-pinjam');
            clearTimeout(timer);
            $('.status-edit').html('Menyimpan. . .');
            timer = setTimeout(function () {
                $.ajax({
                    type:"POST",
                    url: "<?php echo base_url()?>peminjaman/update_pengaju_edit",
                    data: {
                        value : value,
                        jenis : 'tgl',
                        id : id_pinjam
                    },
                    datatype: 'json',
                    success: function(response){
                        if(response == 1){
                            $('.status-edit').html('Tersimpan!');
                        }else{
                            swal('Gagal Memperbaharui data');
                        }
                    }, error:function(error){
                        console.log('gagal memperharui nama _atk')
                    }
                });
            }, 1000);
        });
        // end of data pengaju
        
        // hapus pengajuan atk
        $(document).on('click','.btn-hapus-pengajuan', function(){
            var id = $(this).attr("id-pinjaman");
            swal({
                title: "Anda Yakin?",
                text: "Anda akan menghapus Pengajuan ATK yang telah diajukan!",
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
                        url: "<?php echo base_url()?>peminjaman/delete_pengajuan_atk",
                        data: {id_ajuan:id},
                        datatype: 'json',
                        success: function(data){ 
                            if(data == 1){
                                location.reload();
                            }else{
                                swal('warning','Gagal Hapus', 'Pengajuan ATK gagal dihapus');
                            }
                        }, error:function(error){
                            console.log(error)
                        }
                    });
                }
            });
        });
        // end of hapus pengajuan atk

        $('#btn-minta-atk').on('click',function(e){
            $(this).html('Mengajukan. . . .');
            $(this).attr('disabled','true');

            var nama = $('#nama-pengaju').val();
            var nip = $('#nip-pengaju').val();
            var tgl = $('#tanggal-ajuan').val();

            var atk = [];
            $('[name="nama-atk"]').each(function(){
                if($(this).val() != '')
                {
                    atk.push($(this).val());
                }
            });
            var jumlah_atk = [];
            $('[name="jumlah-atk"]').each(function(){
                if($(this).val() != '')
                {
                    jumlah_atk.push($(this).val());
                }
            });
            e.preventDefault();
            $.ajax({
                type: 'POST',
                url: '<?= base_url()?>peminjaman/create_minta_atk',
                data: {
                    nama: nama,
                    nip: nip,
                    tgl: tgl,
                    atk : atk,
                    jumlah_atk : jumlah_atk 
                },
                datatype: 'json',
                success: function(data){
                    if(data == 1){
                        location.href = '<?php echo site_url('permintaan-atk'); ?>';
                    }else{
                        swal('warning','Gagal Pengajuan', 'Data gagal dimasukan, Hubungi Bagian IT');
                    }
                },error:function(error){
                    console.log(error)
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
                url: "<?php echo base_url()?>peminjaman/search_minta_atk",
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