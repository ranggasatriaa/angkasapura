<table style="vertical-align: top;font-family: 'Arial', sans-serif;font-size:10.5pt">
  <tbody style=" text-align: left;">
    <tr border="0px">
      <td colspan="3">BADAN SIBER DAN SANDI NEGARA</td>
      <td></td>
      <td colspan="4">LAMPIRAN KEPUTUSAN KEPALA BADAN SIBER DAN SANDI NEGARA</td>
    </tr>
    <tr border="0px">
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td colspan="4">NOMOR <?= $nomor?></td>
    </tr>
    <tr border="0px">
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td colspan="4">TANGGAL : <?= view_date($tanggal)?></td>
    </tr>
    <tr>
      <td colspan="8"></td>
    </tr>
    <tr>
      <td colspan="8"></td>
    </tr>
    <?php
    if (strpos(strtoupper($perihal), 'PADA') !== false) {
      $arr = explode("PADA", strtoupper($perihal), 2);
      $perihal1 = $arr[0];
      $perihal2 = $arr[1];
      ?>
      <tr>
        <td colspan="8" style="text-align:center">
          DAFTAR NAMA <?php echo strtoupper($perihal1)?>
        </td>
      </tr>
      <tr>
        <td colspan="8" style="text-align:center">
          PADA <?php echo strtoupper($perihal2) ?>
        </td>
      </tr>
      <?php
    }else {
      ?>
      <tr>
        <td colspan="8" style="text-align:center">
          DAFTAR NAMA <?php echo strtoupper($perihal)?>
        </td>
      </tr>
      <?php
    }
    ?>
    <tr>
      <td colspan="8" style="text-align:center">
        BADAN SIBER DAN SANDI NEGAAR TAHUN ANGGARAN 2018
      </td>
    </tr>
    <tr>
      <td colspan="8"></td>
    </tr>
    <tr>
      <td colspan="8"></td>
    </tr>
  </tbody>
</table>
<table border="1px" style="vertical-align: top;font-family: 'Arial', sans-serif;font-size:10.5pt; text-align: center;">
  <tbody>
    <tr border="1px" style="text-align:center">
      <td width="26.98">NO</td>
      <td width="203.03">NAMA</td>
      <td width="166">NIP</td>
      <td width="165">PANGKAT/GOL. RUANG</td>
      <td width="330">JABATAN</td>
      <td width="56">JUMLAH <br> JAM</td>
      <td width="105">HONORIUM <br> PER JAM</td>
      <td width="105">JUMLAH <br> HONORIUM</td>
    </tr>
    <tr border="1px" style="text-align:center">
      <td>1</td>
      <td>2</td>
      <td>3</td>
      <td>4</td>
      <td>5</td>
      <td>6</td>
      <td>7</td>
      <td>8</td>
    </tr>
    <?php
    // print_r($pegawaihonor);
    ?>
    <?php $i=1; foreach ($pegawaihonor as $pegawai):
      list($nama, $nip, $position, $functional, $pangkat, $jam, $honor) = preg_split("/[|]+/", $pegawai);
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
        <td><?php echo $jam?> jam</td>
        <td>Rp. <?php echo number_format($honor,0) ?>,-</td>
        <td>Rp. <?php echo number_format($jam*$honor, 0) ?>,-</td>
      </tr>
      <?php $i++; endforeach; ?>

    </tbody>
  </table>
  <table style="vertical-align: top;font-family: 'Arial', sans-serif;font-size:10.5pt">
    <tbody>
      <tr>
        <td colspan="8"></td>
      </tr>
      <tr>
        <td colspan="8"></td>
      </tr>
      <tr>
        <td></td>
        <td colspan="2">
          <br>
          <br>
          Salinan sesuai dengan aslinya <br>
          Eselon II Unit Kerja,
          <br>
          <br>
          <br>
          <br>
          <?php echo $pejabat ?>
        </td>
        <td></td>
        <td colspan="4">KEPALA BADAN SIBER DAN SANDI NEGARA,
          <br>
          <br>
          <br>
          <br>
          DJOKO SETIADI
        </td>
      </tr>
    </tbody>
  </table>
