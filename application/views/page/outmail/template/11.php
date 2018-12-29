<table border="1px" style="vertical-align: top;font-family: 'Arial', sans-serif;font-size:11pt">
  <tbody style=" text-align: justify;">
    <tr style="text-align:center">
      <td style="border-bottom:2px solid #000">
        <?php
        $url = base_url('assets/img/avatar.jpg');
        $newheight = 80;
        list($originalwidth, $originalheight) = getimagesize($url);
        $ratio = $originalheight / $newheight;
        $newwidth = $originalwidth / $ratio;
        echo '<img class="cobrandedlogo" src="' . $url . '" height="80" width="' . $newwidth . '" style="margin-bottom:10px;"/>';
        ?>
      </td>
      <td colspan="6" style="font-family: 'Times new roman', sans-serif;font-size:12pt; font-weight:bold; border-bottom:2px solid #000">
        <div style="font-size:16pt">BADAN SIBER DAN SANDI NEGARA</div>
        <span>Jalansono R.M. No.70, Ragunan, Jakarta 12550
          <br>Telepon (021) 7805814, Faksimile (021) 78844104,
          <br>Website: http://www.bssn.go.id, E-mail: humas@bssn.go.id
        </span>
      </td>
    </tr>
    <tr>
      <td colspan="6" style="text-align:center">
        SURAT PERINTAH
      </td>
    </tr>
    <tr>
      <td colspan="6" style="text-align:center;margin-bottom:10px;">
        NOMOR <?= $nomor?>
      </td>
    </tr>
    <tr style="margin-bottom:10px; vertical-align:top">
      <td width="20%">Menimbang</td>
      <td>:</td>
      <td colspan="4">bahwa sehubungan dengan kegiatan <?= $kegiatan?>, perlu dikeluarkan Surat Perintah bagi Pegawai Negeri Sipil Badan Siber dan Sandi Negara.</td>
    </tr>
    <tr style="vertical-align:top">
      <td>Dasar</td>
      <td>:</td>
      <td colspan="4">
        <ol>
          <li><?= $dasar1?></li>
          <li><?= $dasar2?></li>
          <li><?= $dasar3?></li>
          <li>Pertimbangan Pimpinan Badan Siber dan Sandi Negara.</li>
        </ol>
      </td>
    </tr>
    <tr>
      <td colspan="6" style="text-align:center">
        MEMBERI PERINTAH
      </td>
    </tr>
    <tr style="vertical-align:top">
      <td>Kepada</td>
      <td>:</td>
      <td>1. </td>
      <td width="14%">Nama</td>
      <td width="1%">:</td>
      <td width="70%"><?= $pegawai1['nama']?></td>
    </tr>
    <tr>
      <td></td>
      <td></td>
      <td></td>
      <td>NIP</td>
      <td width="1%">:</td>
      <td><?= $pegawai1['nip']?></td>
    </tr>
    <tr>
      <td></td>
      <td></td>
      <td></td>
      <td>Pangkat/Gol.Ruang</td>
      <td width="1%">:</td>
      <td><?= $pegawai1['pangkat']?></td>
    </tr>
    <tr style="margin-bottom:10px">
      <td></td>
      <td></td>
      <td></td>
      <td>Jabatan</td>
      <td width="1%">:</td>
      <td><?= $pegawai1['jabatan']?></td>
    </tr>
    <tr>
      <td></td>
      <td></td>
      <td>2. </td>
      <td width="14%">Nama</td>
      <td width="1%">:</td>
      <td width="70%"><?= $pegawai2['nama']?></td>
    </tr>
    <tr>
      <td></td>
      <td></td>
      <td></td>
      <td>NIP</td>
      <td width="1%">:</td>
      <td><?= $pegawai2['nip']?></td>
    </tr>
    <tr>
      <td></td>
      <td></td>
      <td></td>
      <td>Pangkat/Gol.Ruang</td>
      <td width="1%">:</td>
      <td><?= $pegawai2['pangkat']?></td>
    </tr>
    <tr style="margin-bottom:10px">
      <td></td>
      <td></td>
      <td></td>
      <td>Jabatan</td>
      <td width="1%">:</td>
      <td><?= $pegawai2['jabatan']?></td>
    </tr>
    <tr style="margin-bottom:10px; vertical-align:top">
      <td>Untuk</td>
      <td>:</td>
      <td colspan="4">
        <ol>
          <li><?= $untuk1?></li>
          <li>Melaksanakan perintah ini dengan sebaik-baiknya dan penuh tanggung jawab;</li>
          <li>Membuat  laporan  penugasan  setelah melaksanakan kegiatan dimaksud.</li>
        </ol>
      </td>
    </tr>
    <tr style="text-align:left">
      <td colspan="5"><br><br><br><br><br></td>
      <td>
        <br><br><br><br>
        Jakarta, <?=view_date($tanggal)?>
      </td>
    </tr>
    <tr>
      <td colspan="5" style="text-align:right">a.n</td>
      <td>
        Kepala Badan Siber dan Sandi Negara
      </td>
    </tr>
    <tr style="text-align: left;">
      <td colspan="5"></td>
      <td>
        <?= $eselon1?>
        <br>u.b.
        <br><?=$eselon2?>
        <br><br><br><br><br><br>
        <?= $ttd?>
      </td>
    </tr>
    <tr style="text-align:left">
      <td colspan="6">
          CATATAN :<br>
          Setelah Salinan dan petikan didistribusi, mohon email di cc ke :
          <ol>
            <li>
              Kepala Badan Siber dan Sandi Negara;
            </li>
            <li>
              Sekretaris Utama BSSN; (tembusan untuk eselon I terkait, jika yang tanda tangan eselon II)
            </li>
            <li>
              Inspektur BSSN;
            </li>
            <li>
              Kepala Biro Perencanaan dan Keuangan BSSN;
            </li>
            <li>
              Kepala Biro Organisasi dan Sumber Daya Manusia BSSN.
            </li>
          </ol>
      </td>
    </tr>

  </tbody>
</table>
