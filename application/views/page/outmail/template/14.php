<table border="1px" style="vertical-align: top;font-family: 'Arial', sans-serif;font-size:11pt">
  <tbody style=" text-align: justify;">

    <tr>
      <td colspan="4" style="text-align:center;font-size:14pt">
        BADAN SIBER DAN SANDI NEGARA
      </td>
    </tr>
    <tr  style="margin-top:20px;">
      <td colspan="4" style="text-align:center;font-size:12pt">
        NOTA DINAS
      </td>
    </tr>
    <tr>
      <td colspan="4" style="text-align:center;font-size:12pt">
        Nomor: <?= $nomor?>
      </td>
    </tr>
    <tr  style="margin-top:20px;">
      <td width="4%"></td>
      <td width="18%">Yth</td>
      <td>:</td>
      <td><?= $kepada?></td>
    </tr>
    <tr>
      <td></td>
      <td>Dari</td>
      <td>:</td>
      <td><?= $dari?></td>
    </tr>
    <tr>
      <td></td>
      <td>Hal</td>
      <td>:</td>
      <td><?= strtoupper($perihal)?></td>
    </tr>
    <tr>
      <td></td>
      <td>Tanggal</td>
      <td>:</td>
      <td><?= view_date($tanggal)?></td>
    </tr>
    <tr>
      <td colspan="4" style="border-bottom:2px solid #000"></td>
    </tr>
    <tr style="margin-top:10px;">
      <td>1.</td>
      <td>Dasar:</td>
    </tr>
    <tr>
      <td></td>
      <td colspan="3" style="margin-bottom:10px;">
        <ol type="a">
          <li>DIPA Badan Siber dan Sandi Negara Tahun Anggaran 2018;</li>
          <li><?= $dasarb?></li>
          <li>Pertimbangan Pimpinan Lembaga Sandi Negara.</li>
        </ol>
      </td>
    </tr>
    <tr>
      <td>2.</td>
      <td colspan="3"><?= $poin2?></td>
    </tr>
    <tr>
      <td></td>
      <td>
        <strong>Semula:</strong>
      </td>
    </tr>
    <tr>
      <td></td>
      <td>Nama</td>
      <td>:</td>
      <td><?= $pegawai1['nama']?></td>
    </tr>
    <tr>
      <td></td>
      <td>NIP</td>
      <td>:</td>
      <td><?= $pegawai1['nip']?></td>
    </tr>
    <tr>
      <td></td>
      <td>Pangkat/Gol</td>
      <td>:</td>
      <td><?= $pegawai1['pangkat']?></td>
    </tr>
    <tr>
      <td></td>
      <td>Jabatan</td>
      <td>:</td>
      <td><?= $pegawai1['jabatan']?></td>
    </tr>
    <tr style="margin-top:10px;">
      <td></td>
      <td>
        <strong>Menjadi:</strong>
      </td>
    </tr>
    <tr>
      <td></td>
      <td>Nama</td>
      <td>:</td>
      <td><?= $pegawai2['nama']?></td>
    </tr>
    <tr>
      <td></td>
      <td>NIP</td>
      <td>:</td>
      <td><?= $pegawai2['nip']?></td>
    </tr>
    <tr>
      <td></td>
      <td>Pangkat/Gol</td>
      <td>:</td>
      <td><?= $pegawai2['pangkat']?></td>
    </tr>
    <tr>
      <td></td>
      <td>Jabatan</td>
      <td>:</td>
      <td><?= $pegawai2['jabatan']?></td>
    </tr>
    <tr style="margin-top:10px;">
      <td>3.</td>
      <td colspan="3"><?= $poin3?></td>
    </tr>
    <tr>
      <td>4.</td>
      <td colspan="4">Demikian, atas perhatiannya diucapkan terima kasih.</td>
    </tr>
    <tr>
      <td style="text-align:right" colspan="4"><br><br><br><br><br><?= $pejabat?></td>
    </tr>
    <tr>
      <td colspan="4">
        Tembusan:<br>
        <?= $tembusan?>
      </td>
    </tr>
  </tbody>
</table>
