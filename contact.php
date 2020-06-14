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
      <h1 class="mt-4 mb-3">Ubah Password
        <small><?=nama;?></small>
      </h1>

      <ol class="breadcrumb">
        <li class="breadcrumb-item active">
          <a href="akunsaya.php">Home</a>
        </li>
        <li class="breadcrumb-item"><a href="history.php">History Tiket</a></li>
        <li class="breadcrumb-item"><a href="ubah.php">Ubah Password</a></li>
        <li class="breadcrumb-item"><a href="edit.php">Edit Profil</a></li>
        <li class="breadcrumb-item">Contact</a></li>
      </ol>
      <div class="row">
        <div class="col-lg-8">
          <!-- Example Bar Chart Card-->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fa fa-bar-chart"></i> Contact</div>
                <div class="card-body">
                <form action="validatecaptcha.php" method="POST">
                  <div class="form-group">
                    <input type="text" class="form-control" id="name" name="nama" placeholder="Name" required>
                  </div>
                  <div class="form-group">
                    <input type="text" class="form-control" id="email" name="email" placeholder="Email" required>
                  </div>
                  <div class="form-group">
                    <input type="text" class="form-control" id="subject" name="subject" placeholder="Subject" required>
                  </div>
                  <div class="form-group">
                    <textarea class="form-control" type="textarea" id="message" name="pesan" placeholder="Message" maxlength="140" rows="7"></textarea>            
                  </div>
                  <div class="form-group">
                    Masukkan CAPTCHA<input  type="text" class="form-control" name="captcha" ><img src="captcha.php" /><br>
                  </div>
                  <button class="btn btn-success" type="submit" name="submit">Kirim</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
  </div><br>
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
