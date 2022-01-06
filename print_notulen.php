<?php
require 'fpdf/fpdf.php';

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
$pdf->Cell(30, 6, '$KEGIATAN', 0, 1, 'L');

$pdf->Cell(10);
$pdf->Cell(30, 6, 'Tanggal', 0, 0, 'L');
$pdf->Cell(3, 6, ':', 0, 0, 'L');
$pdf->Cell(30, 6, '$TANGGAL_MULAI s/d $TANGGAL_AKHIR', 0, 1, 'L');
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
$pdf->Cell(40, 6, '$NAME', 1, 0, 'L');
$pdf->Cell(40, 6, '$NIP', 1, 0, 'L');
$pdf->Cell(82, 6, '$Jabatan', 1, 1, 'L');

$pdf->Cell(11);
$pdf->Cell(8, 6, '2.', 1, 0, 'L');
$pdf->Cell(40, 6, '$PENGIKUT_1', 1, 0, 'L');
$pdf->Cell(40, 6, '$NIP', 1, 0, 'L');
$pdf->Cell(82, 6, '$Jabatan', 1, 1, 'L');

$pdf->Cell(11);
$pdf->Cell(8, 6, '3.', 1, 0, 'L');
$pdf->Cell(40, 6, '$PENGIKUT_2', 1, 0, 'L');
$pdf->Cell(40, 6, '$NIP', 1, 0, 'L');
$pdf->Cell(82, 6, '$Jabatan', 1, 1, 'L');

$pdf->Cell(11);
$pdf->Cell(8, 6, '4.', 1, 0, 'L');
$pdf->Cell(40, 6, '$PENGIKUT_3', 1, 0, 'L');
$pdf->Cell(40, 6, '$NIP', 1, 0, 'L');
$pdf->Cell(82, 6, '$Jabatan', 1, 1, 'L');

$pdf->SetFont('Arial', '', '10');
$pdf->Cell(10);
$pdf->Cell(25, 40, 'Foto Kegiatan', 0, 0, 'L');
$pdf->Cell(7, 40, ':', 0, 1, 'L');
$pdf->Image('image/tes_foto.jpg', 53, 113, 40);
$pdf->Image('image/tes_foto.jpg', 100, 113, 40);

$pdf->SetFont('Arial', '', '10');
$pdf->Cell(10);
$pdf->Cell(25, 6, 'Hasil', 0, 0, 'L');
$pdf->Cell(7, 6, ':', 0, 0, 'L');
$pdf->MultiCell(140, 6, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labo Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labo Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labo Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 0, 'J', '');

$pdf->Ln(10);
$pdf->SetFont('Arial', '', '11');
$pdf->Cell(140);
$pdf->Cell(30, 6, 'Pembuat Notulen', 0, 2, 'C');
$pdf->Cell(30, 6, '', 0, 2, 'C');
$pdf->Cell(30, 6, '', 0, 2, 'C');
$pdf->Cell(30, 6, '', 0, 2, 'C');
$pdf->Cell(30, 3, '$NAME', 0, 2, 'C');
$pdf->Cell(30, 1, '_______________________', 0, 2, 'C');
$pdf->Cell(30, 9, '$NIP', 0, 2, 'C');





$pdf->Output();
