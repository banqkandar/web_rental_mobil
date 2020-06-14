<?php 
require_once "config.php";
session_start();
if (!isset($_SESSION['konsumen'])) {
    header("location:index.php");
}
$username = $_SESSION['konsumen'];
$id_konsumen = $_SESSION['id_konsumen'];
$qyu = $koneksi->query("SELECT * FROM konsumen WHERE id_konsumen = '$id_konsumen'");
$cek = $qyu->fetch_assoc();
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
      <h1 class="mt-4 mb-3">Edit Profil
        <small><?=nama;?></small>
      </h1>

      <ol class="breadcrumb">
        <li class="breadcrumb-item active">
          <a href="akunsaya.php">Home</a>
        </li>
        <li class="breadcrumb-item"><a href="history.php">History Tiket</a></li>
        <li class="breadcrumb-item"><a href="ubah.php">Ubah Password</a></li>
        <li class="breadcrumb-item">Edit Profil</li>
        <li class="breadcrumb-item"><a href="contact.php">Contact</a></li>
      </ol>
      <div class="row">
        <div class="col-lg-8">
          <!-- Example Bar Chart Card-->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fa fa-bar-chart"></i> Ubah Password</div>
        <div class="card-body">
          <form action="" method="post">
          <?php if($_POST){
          $fname = $_POST['fname'];
          $email = $_POST['email'];
          $phone = $_POST['notelp'];
          $alamat = $_POST['alamat'];
            $submit = $conn->query("UPDATE konsumen SET nama_konsumen='$fname', email_konsumen='$email', telepon_konsumen='$phone', alamat_konsumen='$alamat'  WHERE id_konsumen='$id_konsumen'");
             echo '<div class="alert alert-success">Data Berhasil Di Ubah</div>';
          }
          ?>
          <div class="form-group">
            <label for="nama" class="col-sm-12 control-label">Nama Lengkap :</label>
            <div class="col-sm-12">
              <input type="text" class="form-control" name="fname" value="<?php echo $cek['nama_konsumen'];?>" required="">
            </div>
          </div>
          <div class="form-group">
            <label for="nama" class="col-sm-12 control-label">Email :</label>
            <div class="col-sm-12">
              <input type="email" class="form-control" name="email" value="<?php echo $cek['email_konsumen'];?>" required="">
            </div>
          </div>
          <div class="form-group">
            <label for="nama" class="col-sm-12 control-label">Nomer Telepon :</label>
            <div class="col-sm-12">
              <input type="text" class="form-control" name="notelp" value="<?php echo $cek['telepon_konsumen'];?>" required="">
            </div>
          </div>
          <div class="form-group">
            <label for="nama" class="col-sm-12 control-label">Alamat :</label>
            <div class="col-sm-12">
              <textarea class="form-control" name="alamat" required=""><?php echo $cek['alamat_konsumen'];?></textarea>
            </div>
          </div>
              <button type="submit" class="btn btn-success col-sm-12">Ubah</button>
          </form>          
        </div>
            <div class="card-footer small text-muted"><?=nama;?> 2018</div>
          </div>
        </div>


    </div>
    <!-- /.container -->

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  </body>

</html>
