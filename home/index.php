<?php 
require_once "../config.php";
session_start();
if (!(isset($_SESSION['admin']) || isset($_SESSION['karyawan']))) {
        echo '
            <script>
                window.alert("Anda Tidak Berhak Mengakses Halaman Ini Karena Anda Belum Login Sebagai karyawan");
                window.location = "../login.php";
            </script>
        ';
}else{
  $id_admin = $_SESSION['admin'];
  $id_kasir = $_SESSION['karyawan'];
}
$mobil = $koneksi->query("SELECT * FROM mobil WHERE status_mobil='ada'");
$jumlahmobil = $mobil->num_rows;
$konsumen = $koneksi->query("SELECT * FROM konsumen");
$jumlahkonsumen = $konsumen->num_rows;
$transaksi = $koneksi->query("SELECT * FROM transaksi");
$jumlahtransaksi = $transaksi->num_rows;
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
        <li class="breadcrumb-item active">Halaman Utama</li>
      </ol>
      <!-- Icon Cards-->
      <div class="row">
        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-primary o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-comments"></i>
              </div>
              <div class="mr-5"><?php echo $jumlahmobil." Mobil Bisa Di Sewa!";?>!</div>
            </div>
            <?php if($_SESSION['karyawan']){?>
            <a class="card-footer text-white clearfix small z-1" href="mobil.php">
              <span class="float-left">Lihat Data</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          <?php } ?>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-warning o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-list"></i>
              </div>
              <div class="mr-5"><?php echo $jumlahkonsumen." Konsumen Telah Terdaftar!";?>!</div>
            </div>
            <?php if($_SESSION['karyawan']){?>
            <a class="card-footer text-white clearfix small z-1" href="konsumen.php">
              <span class="float-left">Lihat Data</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
            <?php } ?>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-success o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-shopping-cart"></i>
              </div>
              <div class="mr-5"><?php echo $jumlahtransaksi." Transaksi";?>!</div>
            </div>
            <?php if($_SESSION['karyawan']){?>
            <a class="card-footer text-white clearfix small z-1" href="transaksi.php">
              <span class="float-left">Lihat Data</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
            <?php } ?>
          </div>
        </div>
      </div>
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Total Konsumen</div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Nama</th>
                  <th>Email</th>
                  <th>Alamat</th>
                  <th>No Ktp</th>
                </tr>
              </thead>
              <tbody>
              <?php $qyu = $koneksi->query("SELECT * FROM konsumen");
                while($datanya = $qyu->fetch_array()){ ?>
                <tr>
                  <td><?php echo $datanya['nama_konsumen']; ?></td>
                  <td><?php echo $datanya['email_konsumen']; ?></td>
                  <td><?php echo $datanya['alamat_konsumen']; ?></td>
                  <td><?php echo $datanya['noktp_konsumen']; ?></td>
                </tr>
              <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
        <div class="card-footer small text-muted"><?=nama;?> 2018</div>
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
