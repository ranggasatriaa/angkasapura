<?php
ob_start();
$this->load->library('tcpdf/tcpdf');

$pdf = new Tcpdf('P', 'mm', 'A4', true, 'UTF-8', false);
$pdf->SetTitle('Data Peminjaman oleh ');
$pdf->SetAutoPageBreak(true);
$pdf->SetAuthor('BSSN Pusdiklat');
$pdf->SetDisplayMode('real', 'default');
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
$pdf->setPrintHeader(false);
$pdf->AddPage();

$pdf->SetFont('timesB', '', 14);
$pdf->MultiCell(180, 20, 'LEMBAR PEMINJAMAN BMN INVENTARIS BAGIAN UMUM', 0, 'C', 0, 1, 15, 10, true);

// Header tabel
$heightHeader = 8;
$pdf->SetFont('times', '', 11);
$pdf->MultiCell(12,$heightHeader, 'NO', 1,'C',0,0,8,'',true, 0, false, true, 8, 'M');
$pdf->MultiCell(45,$heightHeader, 'NAMA BARANG', 1,'C',0,0,'','',true, 0, false, true, 8, 'M');
$pdf->MultiCell(12,$heightHeader, 'JML', 1,'C',0,0,'','',true, 0, false, true, 8, 'M');
$pdf->MultiCell(25,$heightHeader, 'TGL PINJAM', 1,'C',0,0,'','',true, 0, false, true, 8, 'M');
$pdf->MultiCell(35,$heightHeader, 'NAMA & PARAF', 1,'C',0,0,'','',true, 0, false, true, 8, 'M');
$pdf->MultiCell(30,$heightHeader, 'TGL KEMBALI', 1,'C',0,0,'','',true, 0, false, true, 8, 'M');
$pdf->MultiCell(35,$heightHeader, 'NAMA & PARAF', 1,'C',0,1,'','',true, 0, false, true, 8, 'M');
// end of Header tabel

// content table
$heightContent = 13;
$a = 1;
foreach($list_barang as $lb){
    $pdf->MultiCell(12,$heightContent, $a, 1,'C',0,0,8,'',true, 0, false, true, $heightContent, 'M');
    $pdf->MultiCell(45,$heightContent, $lb->nama, 1,'L',0,0,'','',true, 0, false, true, $heightContent, 'M');
    $pdf->MultiCell(12,$heightContent, $lb->jumlah, 1,'C',0,0,'','',true, 0, false, true, $heightContent, 'M');
    $pdf->MultiCell(25,$heightContent, date("d/m/Y", strtotime($detail_pinjam->tgl_pinjam)), 1,'C',0,0,'','',true, 0, false, true, $heightContent, 'M');
    $pdf->MultiCell(35,$heightContent, $detail_pinjam->nama_peminjam, 1,'C',0,0,'','',true, 0, false, true, $heightContent, 'M');
    if($detail_pinjam->tgl_kembali === '0000-00-00 00:00:00'){
        $pdf->MultiCell(30,$heightContent, '', 1,'C',0,0,'','',true, 0, false, true, $heightContent, 'M');
        $pdf->MultiCell(35,$heightContent, '', 1,'C',0,1,'','',true, 0, false, true, $heightContent, 'M');
    }else{
        $pdf->MultiCell(30,$heightContent, date("d/m/Y", strtotime($detail_pinjam->tgl_kembali)), 1,'C',0,0,'','',true, 0, false, true, $heightContent, 'M');
        $pdf->MultiCell(35,$heightContent, $detail_pinjam->nama_peminjam, 1,'C',0,1,'','',true, 0, false, true, $heightContent, 'M');
    }
    $a++;
}
// end of content table
$pdf->Output('wuwuwuw', 'I');
?>