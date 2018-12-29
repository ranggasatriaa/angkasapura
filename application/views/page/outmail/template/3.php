<table border="1px" style="vertical-align: top;font-family: 'Arial', sans-serif;font-size:11pt">
  <tbody style=" text-align: justify;">
    <tr>
      <td colspan="6" style="text-align:right">
        <?php
        $url = base_url('assets/img/petikan.jpg');
        $newheight = 33;
        list($originalwidth, $originalheight) = getimagesize($url);
        $ratio = $originalheight / $newheight;
        $newwidth = $originalwidth / $ratio;
        echo '<img class="cobrandedlogo" src="' . $url . '" height="30" width="' . $newwidth . '" style="margin-bottom:10px;"/>';
        ?>
      </td>
    </tr>
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
        <br>LEMBAGA SANDI NEGARA
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
      <td colspan="3">dan seterusnya;</td>
    </tr>
    <tr style="margin-bottom:10px; vertical-align:top">
      <td>Mengingat</td>
      <td>:</td>
      <td colspan="3">dan seterusnya;</td>
    </tr>
    <tr style="margin-bottom:10px; vertical-align:top">
      <td>Memperhatikan</td>
      <td>:</td>
      <td colspan="3">dan seterusnya;</td>
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
      <td colspan="3">Mengangkat</td>
    </tr>
    <tr>
      <td></td>
      <td></td>
      <td>Nama</td>
      <td>:</td>
      <td><?= $pegawai['nama']?></td>
    </tr>
    <tr>
      <td></td>
      <td></td>
      <td>NIP</td>
      <td>:</td>
      <td><?= $pegawai['nip']?></td>
    </tr>
    <tr>
      <td></td>
      <td></td>
      <td>Pangkat/Gol. Ruang</td>
      <td>:</td>
      <td><?= $pegawai['pangkat']?></td>
    </tr>
    <tr style="margin-bottom:10px">
      <td></td>
      <td></td>
      <td>Jabatan</td>
      <td>:</td>
      <td><?= $pegawai['jabatan']?></td>
    </tr>
    <tr style="margin-bottom:10px">
      <td></td>
      <td></td>
      <td colspan="3">sebagai <?= $sebagai?></td>
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
          Salinan :  dan seterusnya;
        </p>
        <p>
          Petikan :	Keputusan ini diberikan kepada yang bersangkutan untuk diketahui dan dipergunakan sebagaimana mestinya.
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
    <tr style="margin-bottom:10px;">
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
    <tr>
      <td colspan="4">Yth. Sdr</td>
      <td>Salinan sesuai dengan aslinya</td>
    </tr>
    <tr>
      <td colspan="4">Di tempat</td>
      <td>Eselon II Unit Kerja</td>
    </tr>
    <tr>
      <td colspan="4"></td>
      <td>
        <br><br><br><br><br>
        <?= $pejabat?>
        <br><br>
      </td>
    </tr>
    <tr style="text-align:left">
      <td colspan="6">
        <strong>
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
