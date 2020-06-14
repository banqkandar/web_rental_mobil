<?php 
require_once "config.php";
session_start();
if (!isset($_SESSION['konsumen'])) {
    header("location:index.php");
}
$username = $_SESSION['konsumen'];
$id_konsumen = $_SESSION['konsumen'];
?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="<?=deskripsi;?>">
    <meta name="author" content="<?=admin;?>">

    <title><?=nama;?></title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/modern-business.css" rel="stylesheet">

  </head>

  <body>
 <?php include "navbar.php"; ?>

    <!-- Page Content -->
    <div class="container">

      <!-- Page Heading/Breadcrumbs -->
      <h1 class="mt-4 mb-3">Dashboard
        <small><?=nama;?></small>
      </h1>

      <ol class="breadcrumb">
        <li class="breadcrumb-item active">
          Home
        </li>
        <li class="breadcrumb-item"><a href="history.php">History Pemesanan</a></li>
        <li class="breadcrumb-item"><a href="ubah.php">Ubah Password</a></li>
        <li class="breadcrumb-item"><a href="edit.php">Edit Profil</a></li>
        <li class="breadcrumb-item"><a href="contact.php">Contact</a></li>
      </ol>

<h2>Detail Transaksi</h2>
<hr>

<?php
$id_transaksi=mysqli_real_escape_string($koneksi,$_GET['id']);


$det=mysqli_query($koneksi,"select * from transaksi where id_transaksi='$id_transaksi'")or die(mysqli_error($koneksi));
if($d=mysqli_fetch_array($det)){
	?>					
    <div class="table-responsive">
	<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
		<tr>
			<td>Kode Faktur</td>
			<td><?php echo $d['kode_faktur'] ?></td>
		</tr>
		<tr>
			<td>Plat Mobil</td>
			<td><?php echo $d['plat_mobil'] ?></td>
		</tr>
		<tr>
			<td>Cek In</td>
			<td><?php echo $d['cek_in'] ?></td>
		</tr>
		<tr>
			<td>Lama Sewa</td>
			<td><?php echo $d['lama_pakai'] ?></td>
		</tr>
		<tr>
			<td>Tanggal Transaksi</td>
			<td><?php echo $d['tanggal_transaksi'] ?></td>
		</tr>
		<tr>
			<td>Total Biaya </td>
			<td>Rp.<?php echo number_format($d['total_biaya']); ?>,-</td>
		</tr>
	</table>
    </div>
	<?php 
}
?>
    <a href="akunsaya.php" class="btn btn-md btn-warning">Kembali</a>
<!-- Bootstrap core JavaScript -->
<script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  </body>

</html>