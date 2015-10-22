<?php
include_once 'server.conf.php';
include_once 'fpdf/fpdf.php';
$user = new user();
$absen = new absen();
if(isset($_POST['pdf'])){
	$dari_tgl = $_POST['dari'];
	$sampai_tgl = $_POST['sampai'];
	$id_krywn = $_POST['id_krywn'];
	
$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(18, 10, '', 0);
$pdf->Cell(120, 10, '', 0);
$pdf->SetFont('Arial', '', 9);
$pdf->Cell(50, 10, 'Tanggal: '.tgl_indo(date('Y-m-d')).'', 0);
$pdf->Ln(15);
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(0, 8, 'LAPORAN ABSEN', 0, 1,"C");
$pdf->SetFont('Arial', '', 11);
$pdf->Cell(0, 8, tgl_indo($dari_tgl)." - ".tgl_indo($sampai_tgl), 0, 1,"C");
$pdf->Ln(23);
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(15, 8, 'No.', 1, 0, "C");
$pdf->Cell(60, 8, 'Nama Karyawan', 1, 0, "C");
$pdf->Cell(52, 8, 'Tanggal', 1, 0, "C");
$pdf->Cell(25, 8, 'Jam', 1, 0, "C");
$pdf->Cell(25, 8, 'Status', 1, 0, "C");
$pdf->Ln(8);
$pdf->SetFont('Arial', '', 11);

$no = 0;
$data = $absen->cetakAbsen($id_krywn, $dari_tgl, $sampai_tgl);
foreach ($data as $row){
	$no = $no+1;
	$pdf->Cell(15, 8, $no, 1, 0, "C");
	$pdf->Cell(60, 8, $row->nama_karyawan, 1, 0, "C");
	$pdf->Cell(52, 8, tgl_indo($row->waktu), 1, 0, "C");
	$pdf->Cell(25, 8, jam($row->waktu), 1, 0, "C");
	$pdf->Cell(25, 8, $row->status, 1, 0, "C");
	$pdf->Ln(8);
}
$pdf->Output();
}
?>