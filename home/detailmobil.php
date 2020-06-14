<?php 
require_once "../config.php";
session_start();
if (!isset($_SESSION['karyawan'])) {
        echo '
            <script>
                window.alert("Anda Tidak Berhak Mengakses Halaman Ini Karena Anda Belum Login Sebagai Karyawan");
                window.location = "../login.php";
            </script>
        ';
}elseif(!isset($_GET["id"])){
        echo '
            <script>
                window.alert("Anda Tidak Berhak Mengakses Halaman Ini");
                window.location = "../login.php";
            </script>
        ';
}
$id_karyawan = $_SESSION['karyawan'];
$id_mobil = $_GET['id'];
$qyu = $koneksi->query("SELECT * FROM mobil WHERE plat_mobil='$id_mobil'");
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
        <li class="breadcrumb-item active">Detail Data Mobil</li>
      </ol>
      <!-- Icon Cards-->
       <div class="row">
        <div class="col-lg-6">
          <!-- Example Bar Chart Card-->
          <div class="card mb-3">
            <div class="card-header">
            <i class="fa fa-bar-chart"></i> Detail Data Mobil</div>
            <div class="card-body">
             <div class="form-group">
                <label for="nama" class="col-sm-12 control-label">Nama Mobil :</label>
                <div class="col-sm-12">
                  <p><?php echo $hasil['merk_mobil']; ?></p>
                </div>
              </div>
              <div class="form-group">
                <label for="nama" class="col-sm-12 control-label">Plat Mobil :</label>
                <div class="col-sm-12">
                  <p><?php echo $hasil['plat_mobil']; ?></p>
                </div>
              </div>
              <div class="form-group">
                <label for="nama" class="col-sm-12 control-label">Gambar Mobil:</label>
                <div class="col-sm-12">
                  <img class="card-img-top" src="<?php echo "../img/".$hasil['gambar_mobil']; ?>">
                </div>
              </div>
              <div class="form-group">
                <label for="nama" class="col-sm-12 control-label">Harga Sewa :</label>
                <div class="col-sm-12">
                  <p>Rp. <?php echo number_format($hasil['harga_sewa']); ?>.-</p>
                </div>
              </div>
              <div class="form-group">
                <label for="nama" class="col-sm-12 control-label">Tahun Pajak :</label>
                <div class="col-sm-12">
                  <p><?php echo $hasil['tahun_pajak']; ?></p>
                </div>
              </div>
              <div class="form-group">
                <label for="nama" class="col-sm-12 control-label">Bahan Bakar :</label>
                <div class="col-sm-12">
                  <p><?php echo $hasil['bahan_bakar']; ?></p>
                </div>
              </div>
              <div class="form-group">
                <label for="nama" class="col-sm-12 control-label">Fasilitas :</label>
                <div class="col-sm-12">
                  <p><?php echo $hasil['fasilitas']; ?></p>
                </div>
              </div>
              <div class="form-group">
                <label for="nama" class="col-sm-12 control-label">Kapasitas :</label>
                <div class="col-sm-12">
                  <p><?php echo $hasil['kapasitas']; ?> Orang</p>
                </div>
              </div>
            </div>
            <div class="card-footer small text-muted"><?=nama;?> 2018</div>
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
