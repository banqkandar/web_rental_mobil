<?php
session_start();
include 'config.php';
$id_konsumen = $_SESSION['konsumen'];


$servername    = "localhost";
$username      = "root";
$password      = "";
$dbname        = "rental_baru";

$conn    = mysqli_connect ($servername, $username, $password, $dbname);
if (!$conn){
    die ("Connection Failed: ". mysqli_connect_error());
    }

// Koneksi library FPDF
require('fpdf/fpdf.php');
// Setting halaman PDF
$pdf = new FPDF('L','mm','A4');
// Menambah halaman baru
$pdf->AddPage();
// Setting jenis font
$pdf->SetFont('Arial','B',16);
// Membuat string
$pdf->Cell(300,7,'Laporan Transaksi data Booking Mobil',0,1,'C');
$pdf->SetFont('Arial','B',9);
$pdf->Cell(290,7,'===== SYEM RENTCAR =====',0,1,'C');
// Setting spasi kebawah supaya tidak rapat
$pdf->Cell(10,7,'',0,1);

$pdf->SetFont('Arial','B',10);
$pdf->Cell(20,6,'Tanggal :',0,0);
$pdf->Cell(10,6,date('Y-m-d'),0,1);

// Setting spasi kebawah supaya tidak rapat
$pdf->Cell(10,7,'',0,1);
$pdf->Cell(20,6,'Nama',1,0);
$pdf->Cell(23,6,'Id Transaksi',1,0);
$pdf->Cell(25,6,'Kode Booking',1,0);
$pdf->Cell(27,6,'Nama Mobil',1,0);
$pdf->Cell(20,6,'Plat Mobil',1,0);
$pdf->Cell(21,6,'Lama Sewa',1,0);
$pdf->Cell(35,6,'Tanggal Booking',1,0);
$pdf->Cell(25,6,'Biaya Sewa',1,1);
 
$pdf->SetFont('Arial','',10);
$query = mysqli_query($conn, "SELECT * FROM transaksi t
			JOIN mobil m ON t.plat_mobil = m.plat_mobil 
			JOIN konsumen k ON t.id_konsumen = k.id_konsumen WHERE
			(cek_in >= CURRENT_TIMESTAMP) AND t.id_konsumen ='$id_konsumen'");
while ($row = mysqli_fetch_array($query)){
    $pdf->Cell(20,6,$row['nama_konsumen'],1,0);
    $pdf->Cell(23,6,$row['id_transaksi'],1,0);
    $pdf->Cell(25,6,$row['kode_faktur'],1,0);
    $pdf->Cell(27,6,$row['merk_mobil'],1,0);
    $pdf->Cell(20,6,$row['plat_mobil'],1,0);
    $pdf->Cell(21,6,$row['lama_pakai'],1,0);
    $pdf->Cell(35,6,$row['tanggal_transaksi'],1,0);
    $pdf->Cell(25,6,'Rp.'.number_format($row['total_biaya']),1,1);
}

$pdf->Output();
?>