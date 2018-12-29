<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-10">
        <div class="card">
          <div class="card-header card-header-info">
            <h4 class="card-title">Detail Surat Masuk</h4>
          </div>
          <div class="card-body detail-surat-masuk">
            <div class="row">
              <div class="col-md-12">
                <h3>No Surat <?php echo $detailsurat->nomor;?></h3>
                <table>
                  <tbody>
                    <tr>
                      <td>Perihal</td>
                      <td>:</td>
                      <td><?php echo $detailsurat->perihal;?></td>
                    </tr>
                    <tr>
                      <td>Tanggal</td>
                      <td>:</td>
                      <td><?php echo $this->customlib->format_date_indonesia($detailsurat->tanggal);?></td>
                    </tr>
                    <tr>
                      <td>Pengirim</td>
                      <td>:</td>
                      <td><?php echo $detailsurat->dari;?></td>
                    </tr>
                    <tr>
                      <td>Kepada</td>
                      <td>:</td>
                      <td><?php echo $detailsurat->untuk;?></td>
                    </tr>
                  </tbody>
                </table>
                <p><b>Isi Surat</b></p>
                <p><?php echo $detailsurat->isi;?></p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-2">
        <div class="card card-add-mail">
          <div class="card-body text-center">
            <?php
            $random = md5(mt_rand(1,10000));
            $first = substr($random,0,5);
            $last = substr($random,5,10);
            $id = $first.$detailsurat->id.$last;
            ?>
            <div class="td-actions">
              <a data-toggle="modal" data-target="#modalImageInmail" rel="tooltip" class="btn btn-info" data-toggle="tooltip" data-placement="left" title="Lihat Gambar Surat">
                <i class="material-icons" style="color:#fff">panorama</i>
              </a>
              <?php if($this->session->userdata('user_level') == 1){?>
                <a href="<?php echo base_url('editsurat/'.$id)?>" rel="tooltip" class="btn btn-success" data-toggle="tooltip" data-placement="left" title="Edit Data Surat ">
                  <i class="material-icons">edit</i>
                </a>
                <a rel="tooltip" class="btn btn-danger" data-toggle="tooltip" data-placement="left" title="Hapus Surat" id="hapusInmail" id-inmail="<?php echo $id;?>">
                  <i class="material-icons" style="color:#fff">close</i>
                </a>
              <?php }?>
            </div>
          </div>
        </div>
        <!-- Modal image -->
        <div class="modal fade" id="modalImageInmail" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <?php if($detailsurat->gambar == null){?>
                <?php if($this->session->userdata('user_level') == 1){?>
                  <div class="modal-body text-center">
                    <p>Hasil Scan belum tersedia</p>
                    <p>Silahkan tambahkan hasil Scan Surat Masuk di bagian</p>
                    <a href="<?php echo base_url('editsurat/'.$id)?>" class="btn btn-success">
                      <i class="material-icons">edit</i> Edit Surat
                    </a>
                  </div>
                <?php }else{?>
                  <div class="modal-body text-center">
                    <p>Hasil Scan belum tersedia</p>
                    <h4>Silahkan Hubungi admin anda</h4>
                  </div>
                <?php }?>
              <?php }else{ ?>
                <img src="<?php echo base_url(UPLOAD_PATH_INMAIL.$detailsurat->gambar);?>" alt="" width="900" style="margin-left:-40%;">
              <?php } ?>
            </div>
          </div>
        </div>
        <!-- Modal image -->
      </div>
    </div>
  </div>
</div>
