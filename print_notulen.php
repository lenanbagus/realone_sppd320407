<?php
require 'fpdf/fpdf.php';
require_once 'process_asn.php';

$notulen_id = $_GET["id"];

$detail_notulen = $mysqli->query("SELECT * FROM data_agenda 
JOIN data_notulen ON data_agenda.id = data_notulen.id_agenda 
JOIN data_asn ON data_asn.id = data_agenda.id_asn
WHERE data_notulen.id=$notulen_id") or die($mysqli->error);

$row = mysqli_fetch_array($detail_notulen);

$hari_mulai = date('l', strtotime($row['tgl_mulai']));
$tanggal_mulai = date('d', strtotime($row['tgl_mulai']));
$bulan_mulai = date('F', strtotime($row['tgl_mulai']));
$tahun_mulai = date('Y', strtotime($row['tgl_mulai']));
$hari_akhir = date('l', strtotime($row['tgl_selesai']));
$tanggal_akhir = date('d', strtotime($row['tgl_selesai']));
$bulan_akhir = date('F', strtotime($row['tgl_selesai']));
$tahun_akhir = date('Y', strtotime($row['tgl_selesai']));
$jam_start = date('H', strtotime($row['jam_mulai']));
$menit_start = date('i', strtotime($row['jam_mulai']));
$jam_end = date('H', strtotime($row['jam_selesai']));
$menit_end = date('i', strtotime($row['jam_selesai']));
// $createddate = date('l', -1 day, strtotime($row['tgl_mulai']));
$createddate = date('d', strtotime('-1 day', strtotime($row['tgl_mulai'])));
// $createdmonth = date('F', strtotime($row['tgl_mulai']));
// $createdyear = date('Y', strtotime($row['tgl_mulai']));

switch ($hari_mulai) {
  case 'Monday':
    $hari_mulai = 'Senin';
    break;
  case 'Tuesday':
    $hari_mulai = 'Selasa';
    break;
  case 'Wednesday':
    $hari_mulai = 'Rabu';
    break;
  case 'Thursday':
    $hari_mulai = 'Kamis';
    break;
  case 'Friday':
    $hari_mulai = 'Jum\'at';
    break;
  case 'Saturday':
    $hari_mulai = 'Sabtu';
    break;
  case 'Sunday':
    $hari_mulai = 'Minggu';
    break;
}
switch ($bulan_mulai) {
  case 'January':
    $bulan_mulai = 'Januari';
    break;
  case 'February':
    $bulan_mulai = 'Februari';
    break;
  case 'March':
    $bulan_mulai = 'Mart';
    break;
  case 'May':
    $bulan_mulai = 'Mei';
    break;
  case 'June':
    $bulan_mulai = 'Juni';
    break;
  case 'July':
    $bulan_mulai = 'Juli';
    break;
  case 'August':
    $bulan_mulai = 'Agustus';
    break;
  case 'October':
    $bulan_mulai = 'Oktober';
    break;
  case 'December':
    $bulan_mulai = 'Desember';
    break;
}
switch ($bulan_akhir) {
  case 'January':
    $bulan_akhir = 'Januari';
    break;
  case 'February':
    $bulan_akhir = 'Februari';
    break;
  case 'March':
    $bulan_akhir = 'Mart';
    break;
  case 'May':
    $bulan_akhir = 'Mei';
    break;
  case 'June':
    $bulan_akhir = 'Juni';
    break;
  case 'July':
    $bulan_akhir = 'Juli';
    break;
  case 'August':
    $bulan_akhir = 'Agustus';
    break;
  case 'October':
    $bulan_akhir = 'Oktober';
    break;
  case 'December':
    $bulan_akhir = 'Desember';
    break;
}


class PDF extends FPDF
{
}

$pdf = new PDF('P', 'mm', 'A4');
$pdf->AliasNbPages();

//PAGE 1
$pdf->AddPage();

$pdf->Image('image/kabbandung.png', 37, 9, 20);
$pdf->SetFont('Arial', 'B', 18);
$pdf->Cell(95);
$pdf->Cell(30, 7, 'PEMERINTAH KABUPATEN BANDUNG', 0, 2, 'C');
$pdf->SetFont('Arial', 'B', 22);
$pdf->Cell(30, 9, 'KECAMATAN CILENGKRANG', 0, 2, 'C');
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(30, 4, 'Jl Pasirjati No 03, Jatiendah 40616 Telp 750 6363', 0, 2, 'C');
$pdf->Cell(-15);
$pdf->SetFont('Arial', 'B', 18);
$pdf->Cell(30, 5, '________________________________________________', 0, 2, 'C');
$pdf->Ln(3);
$pdf->Cell(80);
$pdf->SetFont('Arial', 'B', '12');
$pdf->Cell(30, 10, 'NOTULEN', 0, 1, 'C');
$pdf->Ln(3);

$pdf->SetFont('Arial', '', '10');
$pdf->Cell(10);
$pdf->Cell(30, 6, 'Acara', 0, 0, 'L');
$pdf->Cell(3, 6, ':', 0, 0, 'L');
$pdf->Cell(30, 6, '' . $row['kegiatan'] . '', 0, 1, 'L');

$pdf->Cell(10);
$pdf->Cell(30, 6, 'Tanggal', 0, 0, 'L');
$pdf->Cell(3, 6, ':', 0, 0, 'L');
$pdf->Cell(30, 6, '' . $tanggal_mulai . ' ' . $bulan_mulai . ' - ' . $tanggal_akhir . ' ' . $bulan_akhir . ' ' . $tahun_mulai . ' ', 0, 1, 'L');
$pdf->Ln(5);

$pdf->Cell(10);
$pdf->Cell(30, 10, 'Yang Melaksanakan,', 0, 1, 'L');

$pdf->SetFont('Arial', 'B', '10');
$pdf->Cell(11);
$pdf->Cell(8, 6, 'No', 1, 0, 'C');
$pdf->Cell(40, 6, 'Nama', 1, 0, 'C');
$pdf->Cell(40, 6, 'NIP', 1, 0, 'C');
$pdf->Cell(82, 6, 'Jabatan', 1, 1, 'C');

$pdf->SetFont('Arial', '', '9');
$pdf->Cell(11);
$pdf->Cell(8, 6, '1.', 1, 0, 'L');
$pdf->Cell(40, 6, '' . $row['name'] . '', 1, 0, 'L');
$pdf->Cell(40, 6, '' . $row['nip'] . '', 1, 0, 'L');
$pdf->Cell(82, 6, '' . $row['jabatan'] . '', 1, 1, 'C');

$pdf->Cell(11);
$pdf->Cell(8, 6, '2.', 1, 0, 'L');
$pdf->Cell(40, 6, '' . $row['pengikut_a'] . '', 1, 0, 'L');
$pdf->Cell(40, 6, '' . $row['nip_a'] . '', 1, 0, 'L');
$pdf->Cell(82, 6, '-', 1, 1, 'C');

$pdf->Cell(11);
$pdf->Cell(8, 6, '3.', 1, 0, 'L');
$pdf->Cell(40, 6, '' . $row['pengikut_b'] . '', 1, 0, 'L');
$pdf->Cell(40, 6, '' . $row['nip_b'] . '', 1, 0, 'L');
$pdf->Cell(82, 6, '-', 1, 1, 'C');

$pdf->Cell(11);
$pdf->Cell(8, 6, '4.', 1, 0, 'L');
$pdf->Cell(40, 6, '' . $row['pengikut_c'] . '', 1, 0, 'L');
$pdf->Cell(40, 6, '' . $row['nip_c'] . '', 1, 0, 'L');
$pdf->Cell(82, 6, '-', 1, 1, 'C');

$pdf->SetFont('Arial', '', '10');
$pdf->Cell(10);
$pdf->Cell(25, 40, 'Foto Kegiatan', 0, 0, 'L');
$pdf->Cell(7, 40, ':', 0, 1, 'L');
// $pdf->Image('image/tes_foto.jpg', 53, 113, 40);
// $pdf->Image('image/tes_foto.jpg', 100, 113, 40);

$pdf->SetFont('Arial', '', '10');
$pdf->Cell(10);
$pdf->Cell(25, 6, 'Hasil', 0, 0, 'L');
$pdf->Cell(7, 6, ':', 0, 0, 'L');
$pdf->MultiCell(140, 6, '' . $row['isi_notulen'] . '', 0, 'J', '');

$pdf->Ln(10);
$pdf->SetFont('Arial', '', '11');
$pdf->Cell(140);
$pdf->Cell(30, 6, 'Pembuat Notulen', 0, 2, 'C');
$pdf->Cell(30, 6, '', 0, 2, 'C');
$pdf->Cell(30, 6, '', 0, 2, 'C');
$pdf->Cell(30, 6, '', 0, 2, 'C');
$pdf->SetFont('Arial', 'B', '11');
$pdf->Cell(30, 3, '' . $row['name'] . '', 0, 2, 'C');
$pdf->Cell(30, 1, '_______________________', 0, 2, 'C');
$pdf->SetFont('Arial', '', '10');
$pdf->Cell(30, 9, 'NIP. ' . $row['nip'] . '', 0, 2, 'C');





$pdf->Output();
