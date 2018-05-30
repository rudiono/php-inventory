<?php
include 'koneksi.php';
require('assets/pdf/fpdf.php');

$pdf = new FPDF("L","cm","A4");

$pdf->SetMargins(2,1,1);
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','B',11);
$pdf->Image('img/user.png',1,1,2,2);
$pdf->SetX(4);
$pdf->MultiCell(19.5,0.5,'SISTEM INVENTORYKU',0,'L');
$pdf->SetX(4);
$pdf->MultiCell(19.5,0.5,'Telepon : 0812000000',0,'L');
$pdf->SetFont('Arial','B',10);
$pdf->SetX(4);
$pdf->MultiCell(19.5,0.5,'JL. Mana Aja Boleh No.123 Yogyakarta',0,'L');
$pdf->SetX(4);
$pdf->MultiCell(19.5,0.5,'website : www.sisteminventoryku.com email : sisteminventoryku@gmail.com',0,'L');
$pdf->Line(1,3.1,28.5,3.1);
$pdf->SetLineWidth(0.1);
$pdf->Line(1,3.2,28.5,3.2);
$pdf->SetLineWidth(0);
$pdf->ln(1);
$pdf->SetFont('Arial','B',14);
$pdf->Cell(25.5,0.7,"Laporan Data Barang",0,10,'C');
$pdf->ln(1);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(5,0.7,"Di cetak pada : ".date("D-d/m/Y"),0,0,'C');
$pdf->ln(1);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(1, 0.8, 'NO', 1, 0, 'C');
$pdf->Cell(3, 0.8, 'Kode Barang', 1, 0, 'C');
$pdf->Cell(7, 0.8, 'Nama Barang', 1, 0, 'C');
$pdf->Cell(3, 0.8, 'Harga Jual', 1, 0, 'C');
$pdf->Cell(4, 0.8, 'Harga Beli', 1, 0, 'C');
$pdf->Cell(2, 0.8, 'Stok', 1, 1, 'C');
$pdf->SetFont('Arial','',10);
$no=1;
$query=mysqli_query($koneksi, "SELECT * FROM barang");
while($lihat=mysqli_fetch_array($query)){
	$pdf->Cell(1, 0.8, $no , 1, 0, 'C');
	$pdf->Cell(3, 0.8, $lihat['kode_brg'],1, 0, 'C');
	$pdf->Cell(7, 0.8, $lihat['nama_brg'],1, 0, 'C');
	$pdf->Cell(3, 0.8, $lihat['hrg_jual'], 1, 0,'C');
	$pdf->Cell(4, 0.8, $lihat['hrg_beli'],1, 0, 'C');
	$pdf->Cell(2, 0.8, $lihat['stok'], 1, 1,'C');

	$no++;
}

$pdf->Output("laporan_barang.pdf","I");

?>
