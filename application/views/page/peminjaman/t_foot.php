<script type="text/javascript">
    $(document).ready(function(){
        // simpan data peminjaman
        $("#btn-pinjam-fasilitas").on('click', function(e){
            var nama_pinjam = $('#nama-pinjam').val();
            var tgl_pinjam = $('#tanggal-pinjam').val();
            var tgl_kembali = $('#tanggal-kembali').val();
            var tujuan = $('#tujuan-pinjam').val();
            var barang_akan_pinjam = $('#barang-akan-pinjam').val();
            var telp = $('#no-telp').val();
            <?php if($this->session->userdata('user_level') == 1 || $this->session->userdata('user_level') == 0){?>
                var barang = [];
                $('[name="nama-barang"]').each(function(){
                    if($(this).val() != '')
                    {
                        barang.push($(this).val());
                    }
                });
                var jumlah_barang = [];
                $('[name="jumlah-barang"]').each(function(){
                    if($(this).val() != '')
                    {
                        jumlah_barang.push($(this).val());
                    }
                });
                var id_barang = [];
                $('[name="nama-barang"]').each(function(){
                    var id_barang_item = $(this).find(':selected').attr('id-barang')
                    if(id_barang_item != '')
                    {
                        id_barang.push(id_barang_item);
                    }
                });

                var jenis_barang = [];
                $('[name="nama-barang"]').each(function(){
                    var jenis_barang_item = $(this).find(':selected').attr('jenis-barang');
                    if(jenis_barang_item != '')
                    {
                        jenis_barang.push(jenis_barang_item);
                    }
                });
                
                var nomor_barang = [];
                $('[name="nama-barang"]').each(function(){
                    var nomor_barang_item = $(this).find(':selected').attr('nomor-barang');
                    if(nomor_barang_item != '')
                    {
                        nomor_barang.push(nomor_barang_item);
                    }
                });
            <?php }?>

            e.preventDefault();
            $(this).attr('disabled','true');
            document.getElementById('btn-pinjam-fasilitas').innerHTML = 'Mengajukan . . .';
            $.ajax({
                type: 'POST',
                url: '<?= base_url()?>peminjaman/create_peminjaman',
                data: {
                    nama_pinjam : nama_pinjam,
                    tgl_pinjam : tgl_pinjam,
                    tgl_kembali : tgl_kembali,
                    tujuan : tujuan,
                    barang_akan_pinjam : barang_akan_pinjam,
                    telp : telp,
                    <?php if($this->session->userdata('user_level') == 1 || $this->session->userdata('user_level') == 0) {?>
                        nama_barang : barang,
                        jumlah_barang : jumlah_barang,
                        arrId : id_barang,
                        arrJenis : jenis_barang,
                        arrNomor : nomor_barang
                    <?php }?>
                },
                datatype: 'json',
                success: function(data){
                    if(data == 1){
                        swal('BERHASIL','Peminjaman berhasil dilakukan. Silahkan tunggu untuk konfirmasi','success')
                        .then((value) =>{
                            location.href = '<?= base_url('')?>peminjaman';
                        })
                    }else{
                        swal('GAGAL','Gagal Untuk mengajukan. Silahkan hubungi admin','warning');
                    }
                },error:function(error){
                        console.log(error)
                }
            });
        });

        // tambah barang dipinjam
        $('#btn-add-barang-pinjam').on('click', function(){
            var added_list = $('#table-barang-dipinjam');
            // var new_item = '<tr><td class="pt-2 pb-2 form-group"><input type="text" class="form-control" name="nama-barang" id="nama-barang"></td><td class="pt-2 pb-2 pl-4 form-group"><input type="number" class="form-control" name="jumlah-barang" id="jumlah-barang"></td><td class="text-center"><button class="btn btn-danger delete-peminjaman-item"><i class="material-icons">delete_forever</i></button></td></tr>';
            var new_item = '<tr><td><select class="form-control" name="nama-barang" id="nama-barang">';
            new_item += '<option value="null" disabled selected>Pilih Barang</option>';
            <?php if (!empty($list_data)){?>
            <?php foreach($list_data as $data){?>
            new_item += '<option value="<?= $data->nama_barang?>" id-barang="<?= $data->id?>" jenis-barang="<?= $data->jenis?>" nomor-barang="<?= $data->nomor?>"><?= $data->nama_barang ?></option>';
            <?php }}?>
            new_item += '</select></td>';
            new_item += '<td class="pt-2 pb-2 pl-4 form-group">';  
            new_item += '   <input type="number" min="0" class="form-control" name="jumlah-barang" id="jumlah-barang">';  
            new_item += '</td>';  
            new_item += '<td class="text-center">';  
            new_item += '   <button class="btn btn-danger delete-peminjaman-item"><i class="material-icons">delete_forever</i></button>';  
            new_item += '</td>';  
            // new_item .= '</tr>';  
            new_item += '</tr>';  
            added_list.append(new_item);
        })
        // end of tambah barang dipinjam

        // hapus barang
        $(document).on('click', '.delete-peminjaman-item', function(){
            $(this).parent().parent().remove();
        });
        // end of hapus barang

        // edit barang dipinjam
        var timer;
        var id_pinjam = $('#id-pinjam').val();
        $(document).on('keyup','.field-text-pinjam', function(){
            var value = $(this).val();
            var jenis = $(this).attr('jenis');
            clearTimeout(timer);
            $('.status-edit').html('Menyimpan. . .');
            if (event.keyCode >= 65 && event.keyCode <= 90 || event.keyCode >= 48 && event.keyCode <= 57 || event.keyCode == 8 || event.keyCode == 13){
                timer = setTimeout(function () {
                    $.ajax({
                        type:"POST",
                        url: "<?php echo base_url()?>peminjaman/update_peminjaman",
                        data: {
                            value : value,
                            jenis : jenis,
                            id : id_pinjam
                        },
                        datatype: 'json',
                        success: function(response){
                            if(response == 1){
                                $('.status-edit').html('Tersimpan!');
                            }else{
                                $('.status-edit').html('Gagal tersimpan! , Hubungi bagian IT');
                            }
                        }, error:function(error){
                            console.log('gagal memperharui data pinjaman');
                        }
                    });
                }, 1000);
            }
        });
        $(document).on('change','.data-pinjaman', function(){
            var value = $(this).val();
            var jenis = $(this).attr('jenis');
            clearTimeout(timer);
            $('.status-edit').html('Menyimpan. . .');
            timer = setTimeout(function () {
                $.ajax({
                    type:"POST",
                    url: "<?php echo base_url()?>peminjaman/update_peminjaman",
                    data: {
                        value : value,
                        jenis : jenis,
                        id : id_pinjam
                    },
                    datatype: 'json',
                    success: function(response){
                        if(response == 1){
                            $('.status-edit').html('Tersimpan!');
                        }else{
                            $('.status-edit').html('Gagal tersimpan! , Hubungi bagian IT');
                        }
                    }, error:function(error){
                        console.log('gagal memperharui data pinjaman');
                    }
                });
            }, 1000);
        });
        $(document).on('change', '.nama-barang-dipinjam', function(){
            var value = $(this).val()
            var id = $(this).parent().parent().attr('id-item');
            var id_barang = $(this).find(':selected').attr('id-barang')
            var jenis_barang = $(this).find(':selected').attr('jenis-barang');
            var nomor_barang = $(this).find(':selected').attr('nomor-barang');
            clearTimeout(timer);
            $('.status-edit').html('Menyimpan. . .');
            timer = setTimeout(function () {
                $.ajax({
                    type:"POST",
                    url: "<?php echo base_url()?>peminjaman/update_barang_peminjaman",
                    data: {
                        value_input : value,
                        jenis_input : 'barang',
                        id_pinjam : id,
                        id_barang : id_barang,
                        jenis_barang : jenis_barang,
                        nomor_barang : nomor_barang
                    },
                    datatype: 'json',
                    success: function(response){
                        if(response == 1){
                            $('.status-edit').html('Tersimpan!');
                        }else{
                            $('.status-edit').html('Gagal tersimpan! , Hubungi bagian IT');
                        }
                    }, error:function(error){
                        $('.status-edit').html('Gagal tersimpan! , Hubungi bagian IT');
                        console.log('gagal memperharui data pinjaman');
                    }
                });
            }, 1000);
            if(jenis_barang == 3){
                $(this).parent().siblings().children('.jumlah_barang_dipinjam ').val(1)
                $(this).parent().siblings().children('.jumlah_barang_dipinjam ').attr('disabled','disable')
            }else{
                $(this).parent().siblings().children('.jumlah_barang_dipinjam ').removeAttr('disabled')
            }
        });
        $('.add-barang-edit').on('click',function(){
            var nama_barang = 'Barang';
            var jumlah_barang = 1;
            $.ajax({
                type: 'POST',
                url: '<?= base_url()?>peminjaman/add_barang_pinjam',
                data: {
                    nama_barang : nama_barang,
                    jumlah_barang : jumlah_barang,
                    id : id_pinjam
                },
                datatype: 'json',
                success: function(data){
                    if(data == 1){
                        location.reload();
                    }else{
                        swal('warning','Gagal Menambahkan', 'Barang gagal ditambahkan, Hubungi Bagian IT');
                    }
                },error:function(error){
                    swal(error)
                }
            });
        });
        $('.btn-hapus-barang').on('click', function(){
            var id = $(this).parent().parent().attr('id-item');
            swal({
                title: "Anda Yakin?",
                text: "Anda akan menghapus barang berikut ini!",
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
                        url: "<?php echo base_url()?>peminjaman/delete_barang_dipinjam",
                        data: {id:id},
                        datatype: 'json',
                        success: function(data){   
                            if(data == 1){
                                location.reload();
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
        $(document).on('keyup','.jumlah_barang_dipinjam', function(){
            var value = $(this).val();
            var id = $(this).parent().parent().attr('id-item');
            var jenis = 'jumlah';
            clearTimeout(timer);
            $('.status-edit').html('Menyimpan. . .');
            if (event.keyCode >= 65 && event.keyCode <= 90 || event.keyCode >= 48 && event.keyCode <= 57 || event.keyCode == 8 || event.keyCode == 13){
                timer = setTimeout(function () {
                    $.ajax({
                        type:"POST",
                        url: "<?php echo base_url()?>peminjaman/update_barang_peminjaman",
                        data: {
                            value_input : value,
                            jenis_input : jenis,
                            id_pinjam : id
                        },
                        datatype: 'json',
                        success: function(response){
                            if(response == 1){
                                $('.status-edit').html('Tersimpan!');
                            }else{
                                $('.status-edit').html('Gagal tersimpan! , Hubungi bagian IT');
                            }
                        }, error:function(error){
                            console.log('gagal memperharui data pinjaman');
                        }
                    });
                }, 1000);
            }
        });
        // end of edit barang dipinjam

        $('.btn-hapus-pengajuan').on('click', function(){
            var id = $(this).attr('id-pinjaman');
            swal({
                title: "Anda Yakin?",
                text: "Anda akan menghapus pengajuan peminjaman ini!",
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
                        url: "<?php echo base_url()?>peminjaman/delete_pinjaman",
                        data: {id:id},
                        datatype: 'json',
                        success: function(data){   
                            if(data == 1){
                                location.href = '<?php echo site_url(''); ?>peminjaman';
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
        $('.btn-cek-kembali').on('click', function(){
            var id = $(this).attr('id-pinjaman');
            swal({
                title: "Peminjaman Telah Selesai?",
                text: "Anda akan menandai pengajuan peminjaman ini!",
                type: 'info',
                showCancelButton: true,
                confirmButtonText: 'Sudah Kembali',
                cancelButtonText: 'Batal',
                confirmButtonColor: '#43a047',
                cancelButtonColor: '#3085d6',
                })
            .then((kembali) => {
                if (kembali.value) {
                    $.ajax({
                        type:"POST",
                        url: "<?php echo base_url()?>peminjaman/tandai_pinjaman",
                        data: {id:id},
                        datatype: 'json',
                        success: function(data){   
                            if(data == 1){
                                swal('Berhasil Dikembalikan', 'Pinjaman telah dikembalikan', 'success');
                                location.href = '<?php echo site_url(''); ?>peminjaman';
                            }else{
                                swal('warning','Gagal Menandai', 'Gagal untuk menandai telah dikembalikan');
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
                url: "<?php echo base_url()?>peminjaman/search_peminjaman",
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
        
        $('.approved-pinjam').on('click', function(){
            swal({
                title: "Setujui Pinjaman?",
                text: "Anda akan menyetujui pengajuan peminjaman ini!",
                type: 'info',
                showCancelButton: true,
                confirmButtonText: 'Setujui',
                cancelButtonText: 'Batal',
                confirmButtonColor: '#43a047',
                cancelButtonColor: '#3085d6',
                })
            .then((kembali) => {
                if (kembali.value) {
                    $.ajax({
                        type:"POST",
                        url: "<?php echo base_url()?>peminjaman/setujui_pinjaman",
                        data: {id:id_pinjam},
                        datatype: 'json',
                        success: function(data){   
                            if(data == 1){
                                swal('Berhasil Di Approved', 'Pinjaman Setujui', 'success')
                                .then((value) => {
                                    location.href = '<?php echo site_url(''); ?>peminjaman';
                                })
                            }else{
                                swal('warning','Gagal Menandai', 'Gagal untuk menandai telah dikembalikan');
                            }
                        }, error:function(error){
                            console.log(error)
                        }
                    });
                }
            });
        });
    });
</script>