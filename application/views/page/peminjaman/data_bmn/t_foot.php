<script type="text/javascript">
    $(document).ready(function(){
        $('#btn-tambah-data-master').on('click', function(){
            var nomor_barang = $('#nomor').val();
            var nama_barang = $('#nama-barang').val();
            var jumlah = $('#jumlah').val();
            var tahun_kontrak = $('#tahun-kontrak').val();
            var rekanan = $('#rekanan').val();
            var status = $('#status-barang').val();
            var jenis = $('#jenis-barang').val();
            document.getElementById('btn-tambah-data-master').innerHTML = 'Menyimpan . . .';
            $(this).attr('disabled','true');
            $.ajax({
                type: 'POST',
                url: '<?= base_url()?>peminjaman/manage_data_master',
                data: {
                    nomor_barang : nomor_barang,
                    nama_barang : nama_barang,
                    jumlah : jumlah,
                    tahun_kontrak : tahun_kontrak,
                    rekanan : rekanan,
                    status : status,
                    jenis : jenis,
                    fungsi : 'create'
                },
                datatype: 'json',
                success: function(data){
                    if(data == 1){
                        swal('BERHASIL','Data berhasil ditambahkan','success');
                        location.href = '<?= base_url('')?>list-data-bmn';
                    }else{
                        swal('GAGAL','Gagal Untuk mengajukan. Silahkan hubungi admin','warning');
                    }
                },error:function(error){
                        console.log(error)
                }
            });
        });
        $('#btn-update-data-master').on('click', function(){
            var nomor_barang = $('#edit-nomor').val();
            var nama_barang = $('#edit-nama-barang').val();
            var jumlah = $('#edit-jumlah').val();
            var tahun_kontrak = $('#edit-tahun-kontrak').val();
            var rekanan = $('#edit-rekanan').val();
            var status = $('#edit-status-barang').val();
            var jenis = $('#edit-jenis-barang').val();
            var id = $(this).attr('id-data');
            document.getElementById('btn-update-data-master').innerHTML = 'Menyimpan . . .';
            $(this).attr('disabled','true');
            $.ajax({
                type: 'POST',
                url: '<?= base_url()?>peminjaman/manage_data_master/'+id,
                data: {
                    nomor_barang : nomor_barang,
                    nama_barang : nama_barang,
                    jumlah : jumlah,
                    tahun_kontrak : tahun_kontrak,
                    rekanan : rekanan,
                    status : status,
                    jenis : jenis,
                    fungsi : 'edit'
                },
                datatype: 'json',
                success: function(data){
                    if(data == 1){
                        swal('BERHASIL','Data berhasil ditambahkan','success');
                        location.href = '<?= base_url('')?>list-data-bmn';
                    }else{
                        swal('GAGAL','Gagal Untuk mengajukan. Silahkan hubungi admin','warning');
                    }
                },error:function(error){
                        console.log(error)
                }
            });
        });

        $('.btn-hapus-data').on('click', function(){
            var id = $(this).attr('id-data');
            swal({
                title: "Hapus Data Item?",
                text: "Anda akan menghapus data ini!",
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
                        url: "<?php echo base_url()?>peminjaman/hapus_data_master",
                        data: {id:id},
                        datatype: 'json',
                        success: function(data){   
                            if(data == 1){
                                swal('Berhasil Hapus', 'Data berhasil dihapus', 'success');
                                location.reload();
                            }else{
                                swal('warning','Gagal Menghapus', 'Gagal untuk menghapus data master ini');
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