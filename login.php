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
      <h1 class="mt-4 mb-3">Masuk
        <small><?=nama;?></small>
      </h1>

      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="index.php">Home</a>
        </li>
        <li class="breadcrumb-item active">Masuk</li>
      </ol>
      <form method="post" action="" class="form-horizontal">
        <?php
        if($_POST){
            $username   = $_POST['username'];
            $userpass   = $_POST['pswd'];
            $cek_login = $koneksi->query("SELECT * FROM konsumen WHERE email_konsumen = '$username'");
            $f = $cek_login->fetch_assoc();
            $user_password = $f['password_konsumen'];
            if($cek_login->num_rows==1){
              if(password_verify($userpass,$user_password)) {
                session_start();
                $_SESSION['konsumen'] = $f['id_konsumen'];
                echo "<script>alert('Anda berhasil Login !');</script>";
                echo "<script>window.location.replace('./');</script>";
            } else {
                echo '<div class="alert alert-danger">Username atau Password anda salah!</div>';
            }
          }else{
            $cek_admin = $koneksi->query("SELECT * FROM akun WHERE email_akun = '$username' AND password_akun = '$userpass'");
            $z = $cek_admin->fetch_assoc();
            $password = $z['password_akun'];
            if (isset($_SESSION['admin']) || isset($_SESSION['karyawan'])) {
              echo "<script>alert('Anda telah login sebagai admin/karyawan!');</script>";
              echo "<script>window.location.replace('login.php');</script>";
            }
            else {
              if($cek_admin->num_rows==1){
                if ($userpass == $password) {
                  if($z['level_akun']=="admin"){
                    session_start();
                    $_SESSION['admin'] = $z['id_akun'];
                    echo "<script>alert('Anda berhasil Login !');</script>";
                    echo "<script>window.location.replace('home/');</script>";
                  }else{
                    session_start();
                    $_SESSION['karyawan'] = $z['id_akun'];
                    echo "<script>alert('Anda berhasil Login !');</script>";
                    echo "<script>window.location.replace('home/');</script>";
                  }
              }else{
                  echo '<div class="alert alert-danger">Username atau Password anda salah!</div>';
              }
            }
          }
      }
    }
        ?>
        <div class="form-group">
          <label for="emailAdress" class="col-sm-2 control-label">Email</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="username" placeholder="Syemrentcar@gmail.com" required="">
          </div>
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1" class="col-sm-2 control-label">Password</label>
          <div class="col-sm-10">
            <input type="password" class="form-control" name="pswd" placeholder="************" required="">
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-primary">Login</button>
          </div>
        </div>
      </form>
      <p>Belum punya akun ? <a href="daftar.php">klik disini</a> untuk daftar</p>
    </div>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  </body>

</html>