<?php 
require_once "../config.php";
session_start();
if (isset($_SESSION['konsumen'])) {
  $id_kasir = $_SESSION['karyawan'];
}
if (!isset($_SESSION['karyawan'])) {
        echo '
            <script>
                window.alert("Anda Tidak Berhak Mengakses Halaman Ini Karena Anda Belum Login Sebagai Karyawan");
                window.location = "login.php";
            </script>
        ';
    }
$id_a = $_SESSION['konsumen'];
$id_konsumen = $_GET['id'];
$qyu = $koneksi->query("SELECT * FROM konsumen WHERE id_konsumen='$id_konsumen'");
$hasil = $qyu->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="<?=deskripsi;?>">
  <meta name="author" content="<?=admin;?>">
  <title><?=nama;?></title>
  <!-- Bootstrap core CSS-->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Page level plugin CSS-->
  <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">
</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
<?php include 'header.php'; ?>
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="index.php"><?=nama;?></a>
        </li>
        <li class="breadcrumb-item active">Ubah Data Konsumen</li>
      </ol>
      <!-- Icon Cards-->
       <div class="row">
        <div class="col-lg-6">
          <!-- Example Bar Chart Card-->
          <div class="card mb-3">
            <div class="card-header">
            <i class="fa fa-bar-chart"></i> Ubah Data Konsumen</div>
            <div class="card-body">
              <form action="" method="post">
              <?php if($_POST['nama_konsumen']){
                  $nama_konsumen  = $_POST['nama_konsumen'];
                  $email_konsumen     = $_POST['email_konsumen'];
                  $password_konsumen  = $_POST['password_konsumen'];
                  $alamat_konsumen  = $_POST['alamat_konsumen'];
                  $telepon_konsumen  = $_POST['telepon_konsumen'];
                  $noktp_konsumen  = $_POST['noktp_konsumen'];
                  $update = "UPDATE konsumen SET nama_konsumen='$nama_konsumen', email_konsumen='$email_konsumen', password_konsumen='$password_konsumen', alamat_konsumen='$alamat_konsumen', telepon_konsumen='$telepon_konsumen', noktp_konsumen='$noktp_konsumen' WHERE id_konsumen='$id_konsumen'";
                  $submit = $koneksi->query($update);
                  echo '<script>window.alert("Sukses ubah data diri konsumen");window.location = "konsumen.php";</script>';
              }?>
              <div class="form-group">
                <label for="nama" class="col-sm-12 control-label">Nama Konsumen</label>
                <div class="col-sm-12">
                  <input type="text" class="form-control" name="nama_konsumen" value="<?php echo $hasil['nama_konsumen'];?>" required>
                </div>
              </div>
              <div class="form-group">
                <label for="nama" class="col-sm-12 control-label">Email Konsumen</label>
                <div class="col-sm-12">
                  <input type="text" class="form-control" name="email_konsumen" value="<?php echo $hasil['email_konsumen'];?>" required>
                </div>
              </div>
              <div class="form-group">
                <label for="nama" class="col-sm-12 control-label">Password Konsumen</label>
                <div class="col-sm-12">
                  <input type="Password" class="form-control" name="email_konsumen" value="<?php echo $hasil['password_konsumen'];?>" required>
                </div>
              </div>
              <div class="form-group">
                <label for="nama" class="col-sm-12 control-label">Alamat</label>
                <div class="col-sm-12">
                  <textarea class="form-control" style="resize:vertical;" name="alamat_konsumen" required><?php echo $hasil['alamat_konsumen'];?>"</textarea>
                </div>
              </div>
              <div class="form-group">
                <label for="nama" class="col-sm-12 control-label">No Telepon</label>
                <div class="col-sm-12">
                  <input type="text" class="form-control" name="telepon_konsumen" value="<?php echo $hasil['telepon_konsumen'];?>" required>
                </div>
              </div>
              <div class="form-group">
                <label for="nama" class="col-sm-12 control-label">No KTP</label>
                <div class="col-sm-12">
                  <input type="text" class="form-control" name="noktp_konsumen" value="<?php echo $hasil['noktp_konsumen'];?>" required>
                </div>
              </div>
              <button type="submit" class="btn btn-success">Submit</button>
            </form>
            </div>
            <div class="card-footer small text-muted"><?=nama;?> 2018</div>
          </div>
        </div>
      </div>
      </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    <footer class="sticky-footer">
      <div class="container">
        <div class="text-center">
          <small>Copyright © <?=nama;?> 2018</small>
        </div>
      </div>
    </footer>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>
    <!-- Logout Modal-->
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Page level plugin JavaScript-->
    <script src="vendor/chart.js/Chart.min.js"></script>
    <script src="vendor/datatables/jquery.dataTables.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin.min.js"></script>
    <!-- Custom scripts for this page-->
    <script src="js/sb-admin-datatables.min.js"></script>
    <script src="js/sb-admin-charts.min.js"></script>
  </div>
</body>

</html>
