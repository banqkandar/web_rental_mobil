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
        <li class="breadcrumb-item active">Data Konsumen</li>
      </ol>
      <!-- Icon Cards-->
       <div class="row">
        <div class="col-lg-12">
          <!-- Example Bar Chart Card-->
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
                  <th>Pilihan</th>
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
                  <td><a href="editkonsumen.php?id=<?php echo $datanya['id_konsumen'];?>">Ubah</a> /
                      <a href="hapuskonsumen.php?id=<?php echo $datanya['id_konsumen'];?>" onclick="return confirm('Anda yakin akan menghapus data?')">Hapus</a>
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

    <div class="row">
        <div class="col-lg-12">
          <!-- Example Pie Chart Card-->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fa fa-pie-chart"></i> Tambah Konsumen</div>
            <div class="card-body">
              <form action="" method="post" enctype="multipart/form-data">
              <?php if($_POST['nama_konsumen']){
                  $nama_konsumen  = $_POST['nama_konsumen'];
                  $email_konsumen     = $_POST['email_konsumen'];
                  $password_konsumen  = $_POST['password_konsumen'];
                  $alamat_konsumen  = $_POST['alamat_konsumen'];
                  $telepon_konsumen  = $_POST['telepon_konsumen'];
                  $noktp_konsumen  = $_POST['noktp_konsumen'];
                  $cek_email = $koneksi->query("SELECT * FROM konsumen WHERE email_konsumen ='".$email_konsumen."'");
                  $has    = $cek_email->fetch_array();
                  if($has){
                    echo '<div class="alert alert-danger">Email yang anda masukkan sudah di gunakan konsumen lain!</div>';
                  }else{
                  $daftar = "INSERT INTO konsumen(nama_konsumen,email_konsumen,password_konsumen,alamat_konsumen,telepon_konsumen,noktp_konsumen) VALUES ('$nama_konsumen','$email_konsumen','$password_konsumen','$alamat_konsumen','$telepon_konsumen','$noktp_konsumen')";
                  $submit = $koneksi->query($daftar);
                      echo '<script>window.alert("Sukses..");window.location = "konsumen.php";</script>';
                  }
              }
              ?>
              <div class="form-group">
                <label for="nama" class="col-sm-12 control-label">Nama Konsumen</label>
                <div class="col-sm-12">
                  <input type="text" class="form-control" name="nama_konsumen" placeholder="Syem RentCar" required>
                </div>
              </div>
              <div class="form-group">
                <label for="nama" class="col-sm-12 control-label">Email Konsumen</label>
                <div class="col-sm-12">
                  <input type="text" class="form-control" name="email_konsumen" placeholder="Syemrentcar@gmail.com" required>
                </div>
              </div>
              <div class="form-group">
                <label for="nama" class="col-sm-12 control-label">Password Konsumen</label>
                <div class="col-sm-12">
                  <input type="Password" class="form-control" name="email_konsumen" placeholder="*************" required>
                </div>
              </div>
              <div class="form-group">
                <label for="nama" class="col-sm-12 control-label">Alamat</label>
                <div class="col-sm-12">
                  <textarea class="form-control" style="resize:vertical;" name="alamat_konsumen" placeholder=" " required></textarea>
                </div>
              </div>
              <div class="form-group">
                <label for="nama" class="col-sm-12 control-label">No Telepon</label>
                <div class="col-sm-12">
                  <input type="text" class="form-control" name="telepon_konsumen" placeholder="081238123688" required>
                </div>
              </div>
              <div class="form-group">
                <label for="nama" class="col-sm-12 control-label">No KTP</label>
                <div class="col-sm-12">
                  <input type="text" class="form-control" name="noktp_konsumen" placeholder="123924923840982" required>
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
