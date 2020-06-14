<?php 
require_once "../config.php";
session_start();
if (!isset($_SESSION['karyawan'])) {
        echo '
            <script>
                window.alert("Anda Tidak Berhak Mengakses Halaman Ini Karena Anda Belum Login Sebagai karyawan");
                window.location = "../login.php";
            </script>
        ';
    }else{
      $id_admin = $_SESSION['karyawan'];
    }
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
        <li class="breadcrumb-item active">Data Transaksi</li>
      </ol>
      <!-- Icon Cards-->
       <div class="row">
        <div class="col-lg-12">
          <!-- Example Bar Chart Card-->
          <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Total Transaksi</div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Id Konsumen</th>
                  <th>Tanggal Pemesanan</th>
                  <th>Plat Mobil</th>
                  <th>Cek In</th>
                  <th>Cek Out</th>
                  <th>Lama Pakai</th>
                  <th>Total Biaya</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
              <?php $qyu = $koneksi->query("SELECT * FROM transaksi");
                while($datanya = $qyu->fetch_array()){ ?>
                <tr>
                  <td><?php echo $datanya['id_konsumen']; ?></td>
                  <td><?php echo $datanya['tanggal_transaksi']; ?></td>
                  <td><?php echo $datanya['plat_mobil']; ?></td>
                  <td><?php echo $datanya['cek_in']; ?></td>
                  <td><?php echo $datanya['cek_out']; ?></td>
                  <td><?php echo $datanya['lama_pakai']; ?></td>
                  <td><?php echo $datanya['total_biaya']; ?></td>
                  <td>
                    <a href="hapustransaksi.php?id=<?php echo $datanya['id_transaksi'];?>" onclick="return confirm('Anda yakin akan menghapus data?')">Hapus</a>
                    <a href="cekout_transaksi.php?id=<?php echo $datanya['id_transaksi'];?>" onclick="return confirm('Cek out sekarang? Waktu server : <?php date_default_timezone_set('Asia/Jakarta'); $now = date('d-M-Y H:i', time()); echo $now; ?>')">Cek Out</a>
                  </td>
                </tr>
              <?php } ?>
              </tbody>
            </table>
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
