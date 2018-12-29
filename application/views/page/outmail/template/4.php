<table border="1px" style="vertical-align: top;font-family: 'Arial', sans-serif;font-size:11pt">
  <tbody style=" text-align: justify;">
    <tr>
      <td colspan="5" style="text-align:center;">
        <?php
        $url = base_url('assets/img/garuda.png');
        $newheight = 80;
        list($originalwidth, $originalheight) = getimagesize($url);
        $ratio = $originalheight / $newheight;
        $newwidth = $originalwidth / $ratio;
        echo '<img class="cobrandedlogo" src="' . $url . '" height="80" width="' . $newwidth . '" style="margin-bottom:10px;"/>';
        ?>
      </td>
    </tr>
    <tr>
      <td colspan="5" style="text-align:center">
        KEPUTUSAN KEPALA BADAN SIBER DAN SANDI NEGARA
      </td>
    </tr>
    <tr>
      <td colspan="5" style="text-align:center;margin-bottom:10px;">
        NOMOR <?= $nomor?> TAHUN <?=date('Y', strtotime($tanggal))?>
      </td>
    </tr>
    <tr>
      <td colspan="5" style="text-align:center;margin-bottom:10px;">
        TENTANG
      </td>
    </tr>
    <tr>
      <td colspan="5" style="text-align:center">
        <?= strtoupper($perihal)?>
      </td>
    </tr>
    <tr>
      <td colspan="5" style="text-align:center;margin-bottom:10px;">
        TAHUN ANGGARAN <?=date('Y', strtotime($tanggal))?>
      </td>
    </tr>
    <tr>
      <td colspan="5" style="text-align:center;margin-bottom:10px;">
        KEPALA BADAN SIBER DAN SANDI NEGARA,
      </td>
    </tr>
    <tr style="margin-bottom:10px">
      <td width="20%">Menimbang</td>
      <td>:</td>
      <td colspan="3"><?= $menimbang?></td>
    </tr>
    <tr style="margin-bottom:10px">
      <td>Mengingat</td>
      <td>:</td>
      <td colspan="3">
        <ol>
          <?php foreach ($mengingat as $content=>$value): ?>
            <li><?= $value?></li>
          <?php endforeach; ?>
        </ol>
      </td>
    </tr>
    <tr>
      <td colspan="5" style="text-align:center">MEMUTUSKAN:</td>
    </tr>
    <tr style="margin-bottom:10px; vertical-align:top">
      <td>Menetapkan</td>
      <td>:</td>
      <td colspan="3">KEPUTUSAN KEPALA BADAN SIBER DAN SANDI NEGARA TENTANG <?= strtoupper($perihal)?> BADAN SIBER DAN SANDI NEGARA TAHUN ANGGARAN 2018.</td>
    </tr>
    <tr style="margin-bottom:10px; vertical-align:top">
      <td>KESATU</td>
      <td>:</td>
      <td colspan="3"><?= $kesatu?></td>
    </tr>

    <tr style="margin-bottom:10px; vertical-align:top">
      <td>KEDUA</td>
      <td>:</td>
      <td colspan="3"><?= $kedua?></td>
    </tr>
    <tr style="vertical-align:top">
      <td>KETIGA</td>
      <td>:</td>
      <td colspan="3">
        <p>
          Keputusan ini mulai berlaku sejak tanggal ditetapkan, dengan catatan bahwa apabila di kemudian hari ternyata terdapat kekeliruan dalam Keputusan ini, maka akan diadakan perubahan sebagaimana mestinya.
        </p>
        <p>
          Salinan Keputusan ini disampaikan kepada :
          <ol>
            <li>
              Ketua Badan Pemeriksa Keuangan, R.I.;
            </li>
            <li>
              Sekretaris Utama Badan Siber dan Sandi Negara;
            </li>
            <li>
              Inspektur Badan Siber dan Sandi Negara;
            </li>
            <li>
              <?= $unit?>
            </li>
            <li>
              Kepala Biro Perencanaan dan Keuangan Badan Siber dan Sandi Negara Sandi Negara;
            </li>
            <li>
              Kepala Kantor Pelayanan Perbendaharaan Negara Jakarta V.
            </li>
          </ol>
          Petikan : Keputusan ini diberikan kepada yang bersangkutan untuk diketahui dan dipergunakan sebagaimana mestinya.
        </p>
      </td>
    </tr>
    <tr style="margin-top:50px; margin-bottom: 10px;text-align:left">
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td>
        Ditetapkan di Jakarta
        <br>pada tanggal: <?=view_date($tanggal)?>
      </td>
    </tr>
    <tr style="margin-bottom:50px;">
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td>
        KEPALA BADAN SIBER DAN  SANDI NEGARA,
        <br><br><br><br><br><br>
        DJOKO SETIADI
      </td>
    </tr>
    <tr style="text-align:left">
      <td colspan="6"> <strong>
        CATATAN :<br>
        Setelah Salinan dan petikan didistribusi, mohon email di cc ke :
        <ol>
          <li>
            Bagian Keuangan;
          </li>
          <li>
            Bagian Tata Usaha dan Kearsipan;
          </li>
          <li>
            Subbag TU KA.
          </li>
        </ol>
      </strong>
    </td>
  </tr>
</tbody>
</table>
