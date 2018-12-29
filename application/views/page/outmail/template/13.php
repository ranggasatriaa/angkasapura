<table style="vertical-align: top;font-family: 'Arial', sans-serif;font-size:10.5pt">
  <tbody style=" text-align: left;">
    <tr border="0px">
      <td colspan="2">BADAN SIBER DAN SANDI NEGARA</td>
      <td></td>
      <td>LAMPIRAN SURAT PERINTAH</td>
    </tr>
    <tr border="0px">
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td>NOMOR <?= $nomor?></td>
    </tr>
    <tr border="0px">
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td>TANGGAL : <?= view_date($tanggal)?></td>
    </tr>
    <tr>
      <td colspan="5"></td>
    </tr>
    <?php
    if (strpos(strtoupper($kegiatan), 'PADA') !== false) {
      $arr = explode("PADA", strtoupper($kegiatan), 2);
      $kegiatan1 = $arr[0];
      $kegiatan2 = $arr[1];
      ?>
      <tr>
        <td colspan="5" style="text-align:center">
          DAFTAR NAMA <?php echo strtoupper($kegiatan1)?>
        </td>
      </tr>
      <tr>
        <td colspan="5" style="text-align:center">
          PADA <?php echo strtoupper($kegiatan2) ?>
        </td>
      </tr>
      <?php
    }else {
      ?>
      <tr>
        <td colspan="5" style="text-align:center">
          DAFTAR NAMA <?php echo strtoupper($kegiatan)?>
        </td>
      </tr>
      <?php
    }
    ?>
    <tr>
      <td colspan="5" style="text-align:center">
        BADAN SIBER DAN SANDI NEGAAR TAHUN ANGGARAN 2018
      </td>
    </tr>
    <tr>
      <td colspan="5"></td>
    </tr>
  </tbody>
</table>
<table border="1px" style="vertical-align: top;font-family: 'Arial', sans-serif;font-size:10.5pt; text-align: center;">
  <tbody>
    <tr border="1px" style="text-align:center">
      <td width="2%">NO</td>
      <td width="18%">NAMA</td>
      <td width="15%">NIP</td>
      <td width="20%">PANGKAT/GOL. RUANG</td>
      <td width="50%">JABATAN</td>
    </tr>
    <tr border="1px" style="text-align:center">
      <td>1</td>
      <td>2</td>
      <td>3</td>
      <td>4</td>
      <td>5</td>
    </tr>
    <?php
    // print_r($pegawaihonor);
    ?>
    <?php $i=1; foreach ($personil as $pegawai):
      list($nama, $nip, $position, $functional  , $pangkat) = preg_split("/[|]+/", $pegawai);
      ?>
      <tr border="1px" style="text-align:center;  vertical-align:top">
        <td><?php echo $i ?></td>
        <td style="text-align:left"><?= $nama?></td>
        <td><?= view_nip($nip)?></td>
        <td><?php echo $pangkat?></td>
        <td style="text-align:left;">
          <?php
          if (strpos(strtolower($position), 'kepala') !== false) {
            echo $position;
          }else {
            if ($functional == '-') {
              echo $position;
            }else {
              echo $functional.' pada '.$position;
            }
          }
          ?>
        </td>
      </tr>
      <?php $i++; endforeach; ?>

    </tbody>
  </table>
  <table style="vertical-align: top;font-family: 'Arial', sans-serif;font-size:10.5pt">
    <tbody>
      <tr>
        <td colspan="5"></td>
      </tr>
      <tr>
        <td colspan="5"></td>
      </tr>
      <tr>
        <td width="2%"> </td>
        <td width="18%"> </td>
        <td width="15%" style="text-align:right;vertical-align:top">a.n.</td>
        <td width="70%" colspan="2">KEPALA BADAN SIBER DAN SANDI NEGARA,
          <br>
          Eselon I Unit Kerja
          <br>
          u.b.
          <br>
          Eselon II Unit Kerja
          <br>
          <br>
          <br>
          <?php echo strtoupper($ttd) ?>I
        </td>
      </tr>
    </tbody>
  </table>
