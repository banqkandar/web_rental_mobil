<?php 
require_once "config.php";
session_start();

if (!isset($_GET['id'])) {
  echo '<script>window.alert("Anda Harus Memilih Mobil Dahulu");window.location = "index.php";</script>';
}
$id = $_GET['id'];
$get_mobil = $koneksi->query("SELECT * FROM mobil WHERE plat_mobil='$id'");
$mobil = $get_mobil->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="<?=deskripsi;?>">
    <meta name="author" content="<?=admin;?>">
    <title><?php echo $mobil['merk_mobil'];?></title>
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/modern-business.css" rel="stylesheet">
  </head>
  <body>
 <?php include "navbar.php"; ?>

    <div class="container">
      <h1 class="mt-4 mb-3"><?php echo $mobil['merk_mobil'];?>
        <small><?php echo $mobil['plat_mobil'];?></small>
      </h1>

      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="index.php">Home</a>
        </li>
        <li class="breadcrumb-item active"><?php echo $mobil['merk_mobil'].' ('.$mobil['plat_mobil'].')';?></li>
      </ol>
      <!-- Project One -->
      <div class="row">
        <div class="col-md-7">
            <img class="img-fluid rounded mb-3 mb-md-0" src="<?php echo "img/".$mobil['gambar_mobil'].""; ?>" alt="">
        </div>
        <div class="col-md-5">
          <p>
            <label>Merk : </label>
            <?php echo $mobil['merk_mobil'];?>
          </p>
          <p>
            <label>Harga Sewa : </label>
            Rp. <?php echo number_format($mobil['harga_sewa']);?>,-
          </p>
          <p>
            <label>Bahan Bakar : </label>
            <?php echo $mobil['bahan_bakar'];?>
          </p>
          <p>
            <label>Fasilitas Mobil : </label>
            <?php echo $mobil['fasilitas'];?>
          </p>
          <p>
            <label>Kapasitas Penumpang : </label>
            <?php echo $mobil['kapasitas'];?> Orang
          </p>
          <a class="btn btn-primary" href="index.php">Kembali
            <span class="glyphicon glyphicon-chevron-right"></span>
          </a>
        </div>
    </div>
<hr>

  
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  </body>

</html>