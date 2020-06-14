<?php 
require_once "../config.php";
session_start();
if (!isset($_SESSION['admin'])) {
        echo '
            <script>
                window.alert("Anda Tidak Berhak Mengakses Halaman Ini Karena Anda Belum Login Sebagai karyawan");
                window.location = "../login.php";
            </script>
        ';
    }else{
      $id_admin = $_SESSION['admin'];
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
        <li class="breadcrumb-item active">Tambah Karyawan</li>
      </ol>
      <!-- Icon Cards-->
       <div class="row">
        <div class="col-lg-8">
          <!-- Example Bar Chart Card-->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fa fa-bar-chart"></i> Total Karyawan</div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Id Karyawan</th>
                  <th>Nama Karyawan</th>
                  <th>Email Karyawan</th>
                  <th>Pilihan</th>
                </tr>
              </thead>
              <tbody>
              <?php $qyu = $koneksi->query("SELECT * FROM akun WHERE level_akun='karyawan'");
                while($datanya = $qyu->fetch_array()){ ?>
                <tr>
                  <td><?php echo $datanya['id_akun']; ?></td>
                  <td><?php echo $datanya['nama_akun']; ?></td>
                  <td><?php echo $datanya['email_akun']; ?></td>
                  <td><a href="editkaryawan.php?id=<?php echo $datanya['id_akun'];?>">Ubah</a> /
                      <a href="hapuskaryawan.php?id=<?php echo $datanya['id_akun'];?>" onclick="return confirm('Anda yakin akan menghapus data?')">Hapus</a>
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

        <div class="col-lg-4">
          <!-- Example Pie Chart Card-->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fa fa-pie-chart"></i> Tambah Karyawan</div>
            <div class="card-body">
              <form action="" method="post">
              <?php if($_POST['nama']){
                  $nama      = ucfirst($_POST['nama']);
                  $email     = $_POST['email'];
                  $password  = $_POST['password'];
                  $cek_email = $koneksi->query("SELECT * FROM akun WHERE email_akun ='".$email."'");
                  $has    = $cek_email->fetch_array();
                  if($has){
                    echo '<div class="alert alert-danger">Email yang anda masukkan sudah di gunakan Karyawan lain!</div>';
                  }else{
                  $daftar = "INSERT INTO akun(nama_akun,email_akun,password_akun,level_akun) VALUES ('$nama','$email','$password','karyawan')";
                  $submit = $koneksi->query($daftar);
                      echo '<script>window.alert("Sukses..");window.location = "karyawan.php";</script>';
                  }
              }
                ?>

              <div class="form-group">
                <label for="nama" class="col-sm-12 control-label">Nama Lengkap</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" name="nama" placeholder="karyawan" required="">
                </div>
              </div>
              <div class="form-group">
                <label for="nama" class="col-sm-12 control-label">Email</label>
                <div class="col-sm-8">
                  <input type="email" class="form-control" name="email" placeholder="krw@gmail.com" required="">
                </div>
              </div>
              <div class="form-group">
                <label for="nama" class="col-sm-12 control-label">Password</label>
                <div class="col-sm-8">
                  <input type="password" class="form-control" name="password" placeholder="*******" required="">
                </div>
              </div>
              <button type="submit" class="btn btn-success">Submit</button>
            </form>
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
