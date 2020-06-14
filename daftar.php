<?php 
require_once "config.php";
session_start();
if (isset($_SESSION['konsumen'])) {
    header("location:index.php");
}
 ?>
<!DOCTYPE html>
<html lang="en">

  <head>
    <?php include "header.php"; ?>
  </head>
  <body>
    <?php include "navbar.php"; ?>


    <!-- Page Content -->
    <div class="container">

      <!-- Page Heading/Breadcrumbs -->
      <h1 class="mt-4 mb-3">Daftar
        <small><?=nama;?></small>
      </h1>

      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="index.php">Home</a>
        </li>
        <li class="breadcrumb-item active">Daftar</li>
      </ol>
      <form method="post" action="" class="form-horizontal">
        <?php
        if($_POST){
          $nama = ucwords($_POST['nama']);
          $email = $_POST['username'];
          $password = $_POST['password'];
          $encrypt = password_hash($password,PASSWORD_DEFAULT);
          $email = $_POST['email'];
          $phone = $_POST['notelp'];
          $noktp = $_POST['no_ktp'];
          $alamat = $_POST['alamat'];
          $cek_email = $koneksi->query("SELECT * FROM konsumen WHERE email_konsumen ='".$email."'");
          $has    = $cek_email->fetch_array();
          if($has){
                echo '<div class="alert alert-danger">Email yang anda masukkan sudah di gunakan user lain!</div>';
              }
          elseif($hasi){
                echo '<div class="alert alert-danger">Username yang anda masukkan sudah di gunakan user lain!</div>';
              }
          else{
            echo '<div class="alert alert-success">Sukses...Silahkan ke halaman login</div>';

            echo '<a href="login.php">klik disini</a> untuk Login</p>';
                $daftar = "INSERT INTO konsumen (nama_konsumen,email_konsumen,password_konsumen,alamat_konsumen,telepon_konsumen,noktp_konsumen) VALUES ('$nama','$email','$encrypt','$alamat','$phone','$noktp')";
                $submit = $koneksi->query($daftar);
          }

        }
        ?>
        <div class="form-group">
          <label for="nama" class="col-sm-2 control-label">Nama Lengkap</label>
          <div class="col-sm-4">
            <input type="text" class="form-control" name="nama" placeholder="Syem Rent Car" required="">
          </div>
        </div>
        <div class="form-group">
          <label for="nama" class="col-sm-2 control-label">Email</label>
          <div class="col-sm-4">
            <input type="email" class="form-control" name="email" placeholder="Syemrentcar@gmail.com" required="">
          </div>
        </div>
        <div class="form-group">
          <label for="nama" class="col-sm-2 control-label">Password</label>
          <div class="col-sm-4">
            <input type="password" class="form-control" name="password" placeholder="*********" required="">
          </div>
        </div>
        <div class="form-group">
          <label for="noktp" class="col-sm-2 control-label">No KTP</label>
          <div class="col-sm-4">
            <input type="text" class="form-control" name="no_ktp" placeholder="1298324843782399" required="">
          </div>
        </div>
        <div class="form-group">
          <label for="nama" class="col-sm-2 control-label">No Telepon</label>
          <div class="col-sm-4">
            <input type="text" class="form-control" name="notelp" placeholder="08xxxxxxxx" required="">
          </div>
        </div>
        <div class="form-group">
          <label for="nama" class="col-sm-2 control-label">Alamat</label>
          <div class="col-sm-4">
            <textarea class="form-control" name="alamat" required=""></textarea>
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-primary">Daftar</button>
          </div>
        </div>
      </form>
    </div>
    <!-- /.container -->
    <!-- Footer -->
    <footer class="py-5 bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; <?=nama;?> 2018</p>
      </div>
      <!-- /.container -->
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  </body>

</html>
