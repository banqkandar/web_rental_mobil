<?php 
require_once "config.php";
session_start();
if (!isset($_SESSION['konsumen'])) {
  echo '<script>window.alert("Anda Harus Login Dahulu");window.location = "login.php";</script>';
}
if (!isset($_GET['id'])) {
  echo '<script>window.alert("Anda Harus Memilih Mobil Dahulu");window.location = "index.php";</script>';
}

$id_konsumen = $_SESSION['konsumen'];
$cek_user = $koneksi->query("SELECT * FROM konsumen WHERE id_konsumen='$id_konsumen'");
$user = $cek_user->fetch_assoc();

$id = $_GET['id'];
$get_mobil = $koneksi->query("SELECT * FROM mobil WHERE plat_mobil='$id'");
$mobil = $get_mobil->fetch_assoc();

if ($mobil['status_mobil'] == "kosong") {
  echo '<script>window.alert("Mobil Sedang Kosong! Silahkan Pesan Mobil Lain");window.location = "./";</script>';
}
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
      <form method="post" action="">
                <?php
                $curdate=strtotime(date('Y-m-d'));
                $cek_tgl=strtotime($_POST['tgl_cekin']);
        if($_POST['tgl_cekin']){
            if($cek_tgl < $curdate) {
              echo "<script>alert('Masukkan Tanggal yang VALID!');</script>";
            } else{
              $lama_pakai  = $_POST['lama_pakai'];
              $harga_sewa  = $_POST['harga_mobil'];
              $totalbiaya  = $lama_pakai*$harga_sewa;
              $tgl_cekin   = $_POST['tgl_cekin'];
              $jam_cekin   = $_POST['jam_cekin'];
              $cekin       = date('Y-m-d H:i', strtotime("$tgl_cekin $jam_cekin"));
              $kode_faktur = "SEM".substr(str_shuffle(str_repeat("0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ", 5)), 0, 5);
              $plat        = $mobil['plat_mobil'];
              $a = $koneksi->query("INSERT INTO transaksi (kode_faktur,plat_mobil,id_konsumen,cek_in,lama_pakai,tanggal_transaksi,total_biaya) VALUES ('$kode_faktur','$plat','$id_konsumen','$cekin','$lama_pakai',CURRENT_TIMESTAMP,'$totalbiaya')");
              if ($a) {
                $update = $koneksi->query("UPDATE mobil SET status_mobil = 'kosong' WHERE plat_mobil = '$plat'");
                if ($update) {
                  echo "<script>alert('Pemesanan Rental Mobil Sukses!');</script>";
                  echo "<script>location='akunsaya.php';</script>";
                }else{
                  echo '<div class="alert alert-danger">Pemesanan Rental Mobil Gagal!</div>';
                }
              }else{
                echo '<div class="alert alert-danger">Pemesanan Rental Mobil Gagal!</div>';
              }
            }
            
        }
        ?>
          <div class="form-group">
              <label for="nama" class="col-sm-12 control-label">Plat Nomor Mobil :</label>
              <div class="col-sm-12">
                <input type="text" class="form-control" name="plat_mobil" readonly value="<?php echo $mobil['plat_mobil'];?>">
              </div>
          </div>
          <div class="form-group">
              <label for="nama" class="col-sm-12 control-label">Harga Sewa perHari :</label>
              <div class="col-sm-12">
                <input type="text" class="form-control" name="harga_mobil" readonly value="<?php echo $mobil['harga_sewa'];?>">
              </div>
          </div>
          <div class="form-group">
              <label for="nama" class="col-sm-12 control-label">Lama Pakai :</label>
              <div class="col-sm-12">
                <select name="lama_pakai" class="form-control" required>
                  <option value="1">1 Hari</option>
                  <option value="2">2 Hari</option>
                  <option value="3">3 Hari</option>
                  <option value="4">4 Hari</option>
                  <option value="5">5 Hari</option>
                  <option value="6">6 Hari</option>
                  <option value="7">7 Hari</option>
                </select>
              </div>
          </div>
          <div class="form-group">
            <label for="nama" class="col-sm-12 control-label">Tanggal Check In :</label>
            <div class="col-sm-12">
              <input class="form-control" type="date" name="tgl_cekin" required>
            </div>
          </div>
          
          <div class="form-group">
            <label for="nama" class="col-sm-12 control-label">Jam Check In :</label>
            <div class="col-sm-12">
              <select name="jam_cekin" class="form-control" required>
                  <option value="09:00">09:00</option>
                  <option value="10:00">10:00</option>
                  <option value="11:00">11:00</option>
                  <option value="12:00">12:00</option>
                  <option value="13:00">13:00</option>
                  <option value="14:00">14:00</option>
                  <option value="15:00">15:00</option>
                  <option value="16:00">16:00</option>
                  <option value="17:00">17:00</option>
                  <option value="18:00">18:00</option>
                  <option value="19:00">19:00</option>
                  <option value="20:00">20:00</option>
                  <option value="21:00">21:00</option>
                  <option value="22:00">22:00</option>
                </select>
            </div>
        <div class="form-group">
          <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-primary">Booking Sekarang</button>
          </div>
        </div>
        </form>
    </div>
<hr>
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>