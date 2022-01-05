<?php
require 'fpdf/fpdf.php';

class PDF extends FPDF
{
}

$pdf = new PDF();
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
$pdf->Ln(3);
$pdf->Cell(80);
$pdf->SetFont('Arial', 'B', '12');
$pdf->Cell(30, 10, 'NOTULEN', 0, 1, 'C');
$pdf->Ln(3);

$pdf->SetFont('Arial', '', '11');
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

$pdf->SetFont('Arial', 'B', '11');
$pdf->Cell(11);
$pdf->Cell(8, 6, 'No', 1, 0, 'C');
$pdf->Cell(40, 6, 'Nama', 1, 0, 'C');
$pdf->Cell(40, 6, 'NIP', 1, 0, 'C');
$pdf->Cell(82, 6, 'Jabatan', 1, 1, 'C');

$pdf->SetFont('Arial', '', '10');
$pdf->Cell(11);
$pdf->Cell(8, 6, '1.', 1, 0, 'L');
$pdf->Cell(40, 6, '$NAMA', 1, 0, 'L');
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

$pdf->Ln(5);

$pdf->SetFont('Arial', '', '11');
$pdf->Cell(10);
$pdf->Cell(20, 6, 'Hasil', 0, 0, 'L');
$pdf->Cell(3, 6, ':', 0, 0, 'L');
$pdf->MultiCell(147, 6, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 0, 'J', '');








$pdf->Output();
