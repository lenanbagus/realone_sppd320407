<?php
require 'fpdf/fpdf.php';
require_once 'process_asn.php';

$sppd_id = $_GET["id"];

$detail_sspd = $mysqli->query("SELECT * FROM data_asn INNER JOIN data_agenda ON data_asn.id = data_agenda.id_asn WHERE data_agenda.id=$sppd_id") or die($mysqli->error);
$row = mysqli_fetch_array($detail_sspd);

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

$pdf->Image('image/kabbandung.png', 40, 9, 20);
$pdf->SetFont('Arial', 'B', 16);
$pdf->Cell(95);
$pdf->Cell(30, 6, 'PEMERINTAH KABUPATEN BANDUNG', 0, 2, 'C');
$pdf->SetFont('Arial', 'B', 18);
$pdf->Cell(30, 8, 'KECAMATAN CILENGKRANG', 0, 2, 'C');
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(30, 4, 'Jl Pasirjati No 03, Jatiendah 40616 Telp 750 6363', 0, 2, 'C');
$pdf->Cell(-15);
$pdf->SetFont('Arial', 'B', 18);
$pdf->Cell(30, 5, '________________________________________________', 0, 2, 'C');
$pdf->Ln(5);
$pdf->Cell(80);
$pdf->SetFont('Arial', 'B', '12');
$pdf->Cell(30, 10, 'SURAT TUGAS', 0, 2, 'C');
$pdf->Ln(1);
$pdf->Cell(80);
$pdf->SetFont('Arial', 'B', '11');
$pdf->Cell(30, 0, 'Nomor : 800/00' . $row['id'] . '/Kec/2022', 0, 2, 'C');
$pdf->Ln(10);

$pdf->Cell(9);
$pdf->SetFont('Arial', '', '11');
$pdf->Cell(35, 7, 'Dasar Surat', 0, 0, 'L');
$pdf->Cell(50, 7, ': ' . $row['dasar_surat'] . ' ', 0, 1, 'L');

$pdf->Cell(9);
$pdf->Cell(30, 7, 'Atas dasar diatas , dengan ini Camat Cilengkrang Kabupaten Bandung menugaskan kepada :', 0, 2, 'L');
$pdf->Ln(3);
$pdf->Cell(9);
$pdf->Cell(35, 7, 'Nama', 0, 0, 'L');
$pdf->Cell(30, 7, ': ' . $row['name'] . ' ', 0, 1, 'L');

$pdf->Cell(9);
$pdf->Cell(35, 7, 'NIP', 0, 0, 'L');
$pdf->Cell(30, 7, ': ' . $row['nip'] . ' ', 0, 1, 'L');

$pdf->Cell(9);
$pdf->Cell(35, 7, 'Jabatan', 0, 0, 'L');
$pdf->Cell(30, 7, ': ' . $row['jabatan'] . ' ', 0, 1, 'L');

$pdf->Cell(9);
$pdf->Cell(35, 7, 'Kegiatan', 0, 0, 'L');
$pdf->Cell(30, 7, ': ' . $row['kegiatan'] . ' ', 0, 1, 'L');

$pdf->Ln(3);

$pdf->Cell(9);
$pdf->Cell(35, 7, 'Hari', 0, 0, 'L');
$pdf->Cell(30, 7, ': ' . $hari_mulai . ' ', 0, 1, 'L');

$pdf->Cell(9);
$pdf->Cell(35, 7, 'Tanggal', 0, 0, 'L');
$pdf->Cell(30, 7, ': ' . $tanggal_mulai . ' ' . $bulan_mulai . ' ' . $tahun_mulai . ' ', 0, 1, 'L');

$pdf->Cell(9);
$pdf->Cell(35, 7, 's/d Tanggal', 0, 0, 'L');
$pdf->Cell(30, 7, ': ' . $tanggal_akhir . ' ' . $bulan_akhir . ' ' . $tahun_akhir . ' ', 0, 1, 'L');

$pdf->Cell(9);
$pdf->Cell(35, 7, 'Waktu', 0, 0, 'L');
$pdf->Cell(30, 7, ': ' . $row['jam_mulai'] . ' - ' . $row['jam_selesai'] . ' ', 0, 1, 'L');

$pdf->Cell(9);
$pdf->Cell(35, 7, 'Lokasi', 0, 0, 'L');
$pdf->Cell(30, 7, ': ' . $row['lokasi'] . ' ', 0, 1, 'L');

$pdf->Ln(3);
$pdf->Cell(9);
$pdf->MultiCell(171, 7, '         Demikian Surat Tugas ini agar dilaksanakan dengan penuh rasa tanggungjawab dan melaporkan hasilnya kepada pimpinan.', '', 'J', '');

$pdf->Ln(10);
$pdf->Cell(112);
$pdf->Cell(30, 7, 'Cilengkrang,', 0, 0, 'C');
$pdf->Cell(30, 7, '' . $createddate . ' ' . $bulan_mulai . ' ' . $tahun_mulai . '', 0, 1, 'C');
$pdf->Cell(130);
$pdf->Cell(30, 7, 'Camat Cilengkrang', 0, 2, 'C');

$pdf->Image('image/ttd.png', 146, 182, 19);

$pdf->Cell(30, 10, '', 0, 2, 'C');
$pdf->Cell(30, 10, '', 0, 2, 'C');
$pdf->SetFont('Arial', 'B', '12');
$pdf->Cell(30, 1, 'Mohamad Dani, SH., MM.', 0, 2, 'C');
$pdf->Cell(30, 2, '______________________', 0, 2, 'C');
$pdf->SetFont('Arial', 'I', '10');
$pdf->Cell(30, 7, 'NIP. 197110232009011001', 0, 2, 'C');

$pdf->Image('image/lock.jpg', 12, 275, 150);



//PAGE 2
$pdf->AddPage();
$pdf->Image('image/kabbandung.png', 40, 9, 20);
$pdf->SetFont('Arial', 'B', 16);
$pdf->Cell(95);
$pdf->Cell(30, 6, 'PEMERINTAH KABUPATEN BANDUNG', 0, 2, 'C');
$pdf->SetFont('Arial', 'B', 18);
$pdf->Cell(30, 8, 'KECAMATAN CILENGKRANG', 0, 2, 'C');
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(30, 4, 'Jl Pasirjati No 03, Jatiendah 40616 Telp 780 6363', 0, 2, 'C');
$pdf->Cell(-15);
$pdf->SetFont('Arial', 'B', 18);
$pdf->Cell(30, 5, '________________________________________________', 0, 2, 'C');
$pdf->Ln(5);
$pdf->Cell(80);
$pdf->SetFont('Arial', 'B', '12');
$pdf->Cell(30, 7, 'SURAT PERINTAH PERJALANAN DINAS', 0, 2, 'C');
$pdf->Cell(30, 5, 'S.P.P.D', 0, 2, 'C');
$pdf->Cell(30, 5, '', 0, 1, 'C');

$pdf->SetFont('Arial', '', '9.5');
$pdf->Cell(9);
$pdf->Cell(5, 6, '1.', 'L,T', 0, 'L');
$pdf->Cell(65, 6, 'Nama Pengguna Anggaran / Kuasa', 'R,T', 0, 'L');
$pdf->Cell(101, 6, ' Camat Cilengkrang', 'R,T', 1, 'L');

$pdf->Cell(9);
$pdf->Cell(5, 6, '', 'L', 0, 'L');
$pdf->Cell(65, 6, 'Pengguna Anggaran', 'R,B', 0, 'L');
$pdf->Cell(101, 6, '', 'R,B', 1, 'L');

$pdf->Cell(9);
$pdf->Cell(5, 6, '2.', 'L,T', 0, 'L');
$pdf->Cell(65, 6, 'Nama /NIP Pengguna Anggaran /Kuasa', 'R,T', 0, 'L');
$pdf->Cell(101, 6, ' Mohamad Dani, SH., MM.', 'R,T', 1, 'L');
$pdf->Cell(9);
$pdf->Cell(5, 6, '', 'L', 0, 'L');
$pdf->Cell(65, 6, 'Pengguna Anggaran', 'R,B', 0, 'L');
$pdf->Cell(101, 6, ' 197205041993031008', 'R,B', 1, 'L');

$pdf->Cell(9);
$pdf->Cell(5, 6, '3.', 'L,T', 0, 'L');
$pdf->Cell(65, 6, 'Nama/NIP pegawai yang melaksanakan', 'R,T', 0, 'L');
$pdf->Cell(101, 6, ' ' . $row['name'] . '', 'R,T', 1, 'L');
$pdf->Cell(9);
$pdf->Cell(5, 6, '', 'L', 0, 'L');
$pdf->Cell(65, 6, 'perjalanan dinas', 'R,B', 0, 'L');
$pdf->Cell(101, 6, ' ' . $row['nip'] . '', 'R,B', 1, 'L');

$pdf->Cell(9);
$pdf->Cell(5, 8, '4.', 'L,T', 0, 'L');
$pdf->Cell(65, 8, 'a. Pangkat/Golongan', 'R,T', 0, 'L');
$pdf->Cell(101, 8, ' ' . $row['golongan'] . '', 'R,T', 1, 'L');
$pdf->Cell(9);
$pdf->Cell(5, 8, '', 'L', 0, 'L');
$pdf->Cell(65, 8, 'b. Jabatan/Instansi', 'R,B', 0, 'L');
$pdf->Cell(101, 8, ' ' . $row['jabatan'] . '', 'R,B', 1, 'L');

$pdf->Cell(9);
$pdf->Cell(5, 8, '5.', 'L,T,B', 0, 'L');
$pdf->Cell(65, 8, 'Maksud Perjalanan Dinas', 'R,T,B', 0, 'L');
$pdf->Cell(101, 8, ' ' . $row['kegiatan'] . '', 'R,B', 1, 'L');
$pdf->Cell(9);
$pdf->Cell(5, 8, '6.', 'L,T,B', 0, 'L');
$pdf->Cell(65, 8, 'Alat angkut yang digunakan', 'R,T,B', 0, 'L');
$pdf->Cell(101, 8, '-', 'R,B,T', 1, 'L');

$pdf->Cell(9);
$pdf->Cell(5, 7, '7. ', 'L,T', 0, 'L');
$pdf->Cell(65, 7, 'a. Tempat Berangkat', 'R,T', 0, 'L');
$pdf->Cell(101, 7, ' Kantor Kecamatan Cilengkrang', 'R,T', 1, 'L');
$pdf->Cell(9);
$pdf->Cell(5, 7, '', 'L,B', 0, 'L');
$pdf->Cell(65, 7, 'b. Tempat Tujuan', 'R,B', 0, 'L');
$pdf->Cell(101, 7, ' ' . $row['lokasi'] . ' ', 'R,B', 1, 'L');

$pdf->Cell(9);
$pdf->Cell(5, 7, '8. ', 'L,T', 0, 'L');
$pdf->Cell(65, 7, 'a. Lama Perjalanan Dinas', 'R,T', 0, 'L');
$pdf->Cell(101, 7, '', 'R,T', 1, 'L');
$pdf->Cell(9);
$pdf->Cell(5, 7, '', 'L', 0, 'L');
$pdf->Cell(65, 7, 'b. Tanggal berangkat', 'R', 0, 'L');
$pdf->Cell(101, 7, ' ' . $tanggal_mulai . ' ' . $bulan_mulai . ' ' . $tahun_mulai . ' ', 'R', 1, 'L');
$pdf->Cell(9);
$pdf->Cell(5, 7, '', 'L,B', 0, 'L');
$pdf->Cell(65, 7, 'c. Tanggal kembali /tiba di tempat baru ', 'R,B', 0, 'L');
$pdf->Cell(101, 7, ' ' . $tanggal_akhir . ' ' . $bulan_akhir . ' ' . $tahun_akhir . ' ', 'R,B', 1, 'L');

$pdf->Cell(9);
$pdf->Cell(5, 7, '9.', 'L,B', 0, 'L');
$pdf->Cell(65, 7, 'Nama Pengikut', 'R,B', 0, 'L');
$pdf->Cell(53, 7, 'N I P', 'R,B', 0, 'C');
$pdf->Cell(48, 7, 'Keterangan', 'R,B', 1, 'C');

$pdf->Cell(9);
$pdf->Cell(5, 7, '', 'L', 0, 'L');
$pdf->Cell(65, 7, '1. ' . $row['pengikut_a'] . '', 'R', 0, 'L');
$pdf->Cell(53, 7, '', 'R', 0, 'C');
$pdf->Cell(48, 7, '', 'R', 1, 'C');
$pdf->Cell(9);
$pdf->Cell(5, 7, '', 'L', 0, 'L');
$pdf->Cell(65, 7, '2. ' . $row['pengikut_b'] . '', 'R', 0, 'L');
$pdf->Cell(53, 7, '', 'R', 0, 'C');
$pdf->Cell(48, 7, '', 'R', 1, 'C');
$pdf->Cell(9);
$pdf->Cell(5, 7, '', 'L,B', 0, 'L');
$pdf->Cell(65, 7, '3. ' . $row['pengikut_c'] . '', 'B,R', 0, 'L');
$pdf->Cell(53, 7, '', 'B,R', 0, 'C');
$pdf->Cell(48, 7, '', 'B,R', 1, 'C');

$pdf->Cell(9);
$pdf->Cell(6, 7, '10. ', 'L,T', 0, 'L');
$pdf->Cell(64, 7, 'Pembebanan Anggaran', 'R,T', 0, 'L');
$pdf->Cell(101, 7, '', 'R,T', 1, 'L');
$pdf->Cell(9);
$pdf->Cell(6, 7, '', 'L', 0, 'L');
$pdf->Cell(64, 7, 'a. Instansi', 'R', 0, 'L');
$pdf->Cell(101, 7, ' Kecamatan Cilengkrang', 'R', 1, 'L');
$pdf->Cell(9);
$pdf->Cell(6, 7, '', 'L,B', 0, 'L');
$pdf->Cell(64, 7, 'b. Akun', 'R,B', 0, 'L');
$pdf->Cell(101, 7, ' -', 'R,B', 1, 'L');

$pdf->Cell(9);
$pdf->Cell(6, 7, '11. ', 'L,T,B', 0, 'L');
$pdf->Cell(64, 7, 'Keterangan lain - lain', 'R,T,B', 0, 'L');
$pdf->Cell(101, 7, '', 'R,T,B', 1, 'L');

$pdf->Ln(10);
$pdf->Cell(100);
$pdf->Cell(25, 6, 'Dikeluarkan di', 0, 0, 'L');
$pdf->Cell(10, 6, ':', 0, 0, 'L');
$pdf->Cell(30, 6, 'Kecamatan Cilengkrang', 0, 1, 'L');
$pdf->Cell(100);
$pdf->Cell(25, 6, 'Pada Tanggal', 0, 0, 'L');
$pdf->Cell(10, 6, ':', 0, 0, 'L');
$pdf->Cell(30, 6, '' . $createddate . ' ' . $bulan_mulai . ' ' . $tahun_mulai . '', 0, 1, 'L');
$pdf->Ln(5);

$pdf->Cell(122);
$pdf->Cell(30, 6, 'Pengguna Anggaran / Kuasa Pengguna Anggaran', 0, 2, 'C');
$pdf->Ln(20);
$pdf->Cell(122);
$pdf->Image('image/ttd.png', 137, 247, 19);
$pdf->SetFont('Arial', 'B', '10');
$pdf->Cell(30, 1, 'Mohamad Dani, SH., MM.', 0, 2, 'C');
$pdf->Cell(30, 2, '______________________', 0, 2, 'C');
$pdf->SetFont('Arial', 'I', '10');
$pdf->Cell(30, 6, 'NIP. 197110232009011001', 0, 2, 'C');

$pdf->Image('image/lock.jpg', 12, 275, 150);




//PAGE 3
$pdf->AddPage();
$pdf->SetFont('Arial', '', '9');

$pdf->Cell(80);
$pdf->Cell(35, 6, 'Berangkat Dari', 0, 0, 'L');
$pdf->Cell(2, 6, ':', 0, 0, 'C');
$pdf->Cell(63, 6, 'Kecamatan Cilengkrang', 0, 1, 'L');

$pdf->Cell(80);
$pdf->Cell(35, 6, '(tempat kedudukan)', 0, 0, 'L');
$pdf->Cell(2, 6, '', 0, 0, 'C');
$pdf->Cell(63, 6, '', 0, 1, 'L');

$pdf->Cell(80);
$pdf->Cell(35, 6, 'Ke', 0, 0, 'L');
$pdf->Cell(2, 6, ':', 0, 0, 'C');
$pdf->Cell(63, 6, '' . $row['lokasi'] . '', 0, 1, 'L');

$pdf->Cell(80);
$pdf->SetFont('Arial', 'B', '10');
$pdf->Cell(100, 6, 'Pengguna Anggaran / Kuasa Pengguna Anggaran', 0, 1, 'C');
$pdf->Ln(15);
$pdf->Cell(80);
$pdf->SetFont('Arial', 'B', '10');
$pdf->Cell(100, 1, 'Mohammad Dani, SH., MM.', 0, 1, 'C');
$pdf->Cell(80);
$pdf->Cell(100, 2, '_________________________', 0, 1, 'C');
$pdf->SetFont('Arial', 'I', '9');
$pdf->Cell(80);
$pdf->Cell(100, 6, 'NIP. 197110232009011001', 0, 1, 'C');
$pdf->Ln(5);

$pdf->SetFont('Arial', '', '10');
$pdf->Cell(9);
$pdf->Cell(5, 6, 'I.', '', 0, 'C');
$pdf->Cell(30, 6, 'Berangkat dari', 'T,L', 0, 'L');
$pdf->Cell(50, 6, 'Kec Cilengkrang', 'T', 0, 'L');
$pdf->Cell(30, 6, 'Tiba di', 'T', 0, 'L');
$pdf->Cell(56, 6, '' . $row['lokasi'] . '', 'T,R', 1, 'L');
$pdf->Cell(9);
$pdf->Cell(5, 2, '', 'R', 0, 'C');
$pdf->Cell(30, 2, '', '', 0, 'L');
$pdf->Cell(50, 2, '', '', 1, 'L');
$pdf->Cell(9);
// $pdf->Cell(30, 2, '', '', 0, 'L');
// $pdf->Cell(50, 2, '', 'R', 1, 'L');
// $pdf->Cell(9);
$pdf->Cell(5, 6, '', '', 0, 'C');
$pdf->Cell(30, 6, 'Pada Tanggal', 'L', 0, 'L');
$pdf->Cell(50, 6, '' . $tanggal_mulai . ' ' . $bulan_mulai . ' ' . $tahun_mulai . '', 0, 0, 'L');
$pdf->Cell(30, 6, 'Pada Tanggal', 0, 0, 'L');
$pdf->Cell(56, 6, '' . $tanggal_akhir . ' ' . $bulan_akhir . ' ' . $tahun_akhir . '', 'R', 1, 'L');
$pdf->Cell(9);
$pdf->Cell(5, 17, '', '', 0, 'C');
$pdf->Cell(30, 17, '', 'L', 0, 'L');
$pdf->Cell(50, 17, '', 0, 0, 'L');
$pdf->Cell(30, 17, '', 0, 0, 'L');
$pdf->Cell(56, 17, '', 'R', 1, 'L');

$pdf->Cell(9);
$pdf->Cell(5, 6, 'II.', '', 0, 'C');
$pdf->Cell(30, 6, 'Berangkat dari', 'T,L', 0, 'L');
$pdf->Cell(50, 6, '', 'T', 0, 'L');
$pdf->Cell(30, 6, 'Tiba di', 'T', 0, 'L');
$pdf->Cell(56, 6, '', 'T,R', 1, 'L');
$pdf->Cell(9);
$pdf->Cell(5, 2, '', '', 0, 'C');
$pdf->Cell(30, 2, '', 'L', 0, 'L');
$pdf->Cell(50, 2, '', '', 0, 'L');
$pdf->Cell(30, 2, '', '', 0, 'L');
$pdf->Cell(56, 2, '', 'R', 1, 'L');
$pdf->Cell(9);
$pdf->Cell(5, 6, '', '', 0, 'C');
$pdf->Cell(30, 6, 'Pada Tanggal', 'L', 0, 'L');
$pdf->Cell(50, 6, '', 0, 0, 'L');
$pdf->Cell(30, 6, 'Pada Tanggal', 0, 0, 'L');
$pdf->Cell(56, 6, '', 'R', 1, 'L');
$pdf->Cell(9);
$pdf->Cell(5, 2, '', '', 0, 'C');
$pdf->Cell(30, 2, '', 'L', 0, 'L');
$pdf->Cell(50, 2, '', 0, 0, 'L');
$pdf->Cell(30, 2, '', 0, 0, 'L');
$pdf->Cell(56, 2, '', 'R', 1, 'L');
$pdf->Cell(9);
$pdf->Cell(5, 6, '', '', 0, 'C');
$pdf->Cell(30, 6, 'Kepala', 'L', 0, 'L');
$pdf->Cell(50, 6, '', 0, 0, 'L');
$pdf->Cell(30, 6, 'Kepala', 0, 0, 'L');
$pdf->Cell(56, 6, '', 'R', 1, 'L');
$pdf->Cell(9);
$pdf->Cell(5, 17, '', '', 0, 'C');
$pdf->Cell(30, 17, '', 'L', 0, 'L');
$pdf->Cell(50, 17, '', 0, 0, 'L');
$pdf->Cell(30, 17, '', 0, 0, 'L');
$pdf->Cell(56, 17, '', 'R', 1, 'L');

$pdf->Cell(9);
$pdf->Cell(5, 6, 'III.', '', 0, 'C');
$pdf->Cell(30, 6, 'Berangkat dari', 'T,L', 0, 'L');
$pdf->Cell(50, 6, '', 'T', 0, 'L');
$pdf->Cell(30, 6, 'Tiba di', 'T', 0, 'L');
$pdf->Cell(56, 6, '', 'T,R', 1, 'L');

$pdf->Cell(9);
$pdf->Cell(5, 2, '', '', 0, 'C');
$pdf->Cell(30, 2, '', 'L', 0, 'L');
$pdf->Cell(50, 2, '', '', 0, 'L');
$pdf->Cell(30, 2, '', '', 0, 'L');
$pdf->Cell(56, 2, '', 'R', 1, 'L');
$pdf->Cell(9);
$pdf->Cell(5, 6, '', '', 0, 'C');
$pdf->Cell(30, 6, 'Pada Tanggal', 'L', 0, 'L');
$pdf->Cell(50, 6, '', 0, 0, 'L');
$pdf->Cell(30, 6, 'Pada Tanggal', 0, 0, 'L');
$pdf->Cell(56, 6, '', 'R', 1, 'L');
$pdf->Cell(9);
$pdf->Cell(5, 2, '', '', 0, 'C');
$pdf->Cell(30, 2, '', 'L', 0, 'L');
$pdf->Cell(50, 2, '', 0, 0, 'L');
$pdf->Cell(30, 2, '', 0, 0, 'L');
$pdf->Cell(56, 2, '', 'R', 1, 'L');
$pdf->Cell(9);
$pdf->Cell(5, 6, '', '', 0, 'C');
$pdf->Cell(30, 6, 'Kepala', 'L', 0, 'L');
$pdf->Cell(50, 6, '', 0, 0, 'L');
$pdf->Cell(30, 6, 'Kepala', 0, 0, 'L');
$pdf->Cell(56, 6, '', 'R', 1, 'L');
$pdf->Cell(9);
$pdf->Cell(5, 17, '', '', 0, 'C');
$pdf->Cell(30, 17, '', 'L', 0, 'L');
$pdf->Cell(50, 17, '', '', 0, 'L');
$pdf->Cell(30, 17, '', 0, 0, 'L');
$pdf->Cell(56, 17, '', 'R', 1, 'L');

$pdf->Cell(9);
$pdf->Cell(5, 6, 'IV.', '', 0, 'C');
$pdf->Cell(30, 24, 'Berangkat dari', 'T,L', 0, 'L');
$pdf->Cell(50, 24, ': Kec Cilengkrang', 'T', 0, 'L');
$pdf->Cell(5, 6, 'V.', 'T', 0, 'C');
$pdf->MultiCell(81, 6, 'Telah diperiksa dengan keterangan bahwa perjalanan tersebut benar dilakukan atas semata-mata untuk kepentingan jabatan dalam waktu yang sesingkat-singkatnya.', 'T,R', 'J', '');
$pdf->Cell(14);
$pdf->Cell(166, 8, '', 'L,R', 1, 'C');

$pdf->Cell(9);
$pdf->Cell(5, 6, '', '', 0, 'C');
$pdf->Cell(83, 6, 'Pengguna Anggaran / Kuasa Pengguna Anggaran', 'L', 0, 'C');
$pdf->Cell(83, 6, 'Pengguna Anggaran / Kuasa Pengguna Anggaran', 'R', 1, 'C');
$pdf->Cell(9);
$pdf->Cell(5, 6, '', '', 0, 'C');
$pdf->Cell(170, 20, '', 'L,R', 1, 'C');

$pdf->SetFont('Arial', 'B', '10');
$pdf->Cell(14);
$pdf->Cell(83, 1, 'Mohammad Dani, SH., MM.', 'L', 0, 'C');
$pdf->Cell(83, 1, 'Mohammad Dani, SH., MM.', 'R', 1, 'C');
$pdf->Image('image/ttd.png', 131, 33, 15);
$pdf->Image('image/ttd.png', 138, 209, 19);
$pdf->Image('image/ttd.png', 55, 209, 19);
$pdf->Cell(14);
$pdf->Cell(83, 2, '_________________________', 'L', 0, 'C');
$pdf->Cell(83, 2, '_________________________', 'R', 1, 'C');

$pdf->SetFont('Arial', 'I', '9');
$pdf->Cell(14);
$pdf->Cell(83, 6, 'NIP. 197110232009011001', 'B,L', 0, 'C');
$pdf->Cell(83, 6, 'NIP. 197110232009011001', 'B,R', 1, 'C');

$pdf->SetFont('Arial', '', '10');
$pdf->Cell(9);
$pdf->Cell(5, 6, 'VI.', '', 0, 'C');
$pdf->Cell(166, 6, 'Catatan lain - lain', 'L,R', 1, 'L');
$pdf->Cell(9);
$pdf->Cell(5, 6, 'VII.', '', 0, 'C');
$pdf->Cell(166, 6, 'PERHATIAN', 'R,L', 1, 'L');
$pdf->Cell(9);
$pdf->Cell(5, 6, '', '', 0, 'C');
$pdf->MultiCell(166, 6, 'PA / KPA yang menerbitkan SPPD, Pegawai yang melakukan perjalanan Dinas, pada Pejabat yang mengesahkan tanggal berangkat / tiba serta Bendahara Pengeluaran bertanggung jawab berdasarkan peraturan-peraturan keuangan Negara apabila negara menderita rugi akibat kesalahan, kelalaian dan kealfaannya.', 'L,B,R', 'J', '');
$pdf->Image('image/lock.jpg', 12, 275, 150);

$pdf->Output();
