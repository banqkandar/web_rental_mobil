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
        <li class="breadcrumb-item active">Tambah Mobil</li>
      </ol>
      <!-- Icon Cards-->
       <div class="row">
        <div class="col-lg-12">
          <!-- Example Bar Chart Card-->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fa fa-bar-chart"></i> Total Mobil</div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Plat Mobil</th>
                  <th>Merk Mobil</th>
                  <th>Harga Sewa</th>
                  <th>Status</th>
                  <th>Pilihan</th>              
                </tr>
              </thead>
              <tbody>
              <?php $qyu = $koneksi->query("SELECT * FROM mobil");
                while($datanya = $qyu->fetch_array()){ ?>
                <tr>
                  <td><?php echo $datanya['plat_mobil']; ?></td>
                  <td><?php echo $datanya['merk_mobil']; ?></td>
                  <td><?php echo $datanya['harga_sewa']; ?></td>
                  <td><?php echo $datanya['status_mobil']; ?></td>
                  <td><a href="detailmobil.php?id=<?php echo $datanya['plat_mobil'];?>">Detail</a> /
                      <a href="editmobil.php?id=<?php echo $datanya['plat_mobil'];?>">Ubah</a> /
                      <a href="hapusmobil.php?id=<?php echo $datanya['plat_mobil'];?>" onclick="return confirm('Anda yakin akan menghapus data?')">Hapus</a>
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
              <i class="fa fa-pie-chart"></i> Tambah Mobil</div>
            <div class="card-body">
              <form action="" method="post" enctype="multipart/form-data">
              <?php 
                if (isset($_POST['save'])) {
                  $plat_mobil = $_POST['plat_mobil'];
                  $merk_mobil = $_POST['merk_mobil'];
                  $harga_sewa = $_POST['harga_sewa'];
                  $tahun_pajak = $_POST['tahun_pajak'];
                  $bahan_bakar = $_POST['bahan_bakar'];
                  $fasilitas = $_POST['fasilitas'];
                  $kapasitas = $_POST['kapasitas'];
                  $nama = $_FILES['myfile']['name'];
                  $lokasi = $_FILES['myfile']['tmp_name'];
                  move_uploaded_file($lokasi, "../img/".$nama);
                  $koneksi->query("INSERT INTO mobil (plat_mobil,merk_mobil,gambar_mobil,harga_sewa,tahun_pajak,bahan_bakar,fasilitas, kapasitas, status_mobil) VALUES ('$plat_mobil','$merk_mobil','$nama','$harga_sewa','$tahun_pajak','$bahan_bakar','$fasilitas','$kapasitas','ada')");
                  echo '<script>window.alert("Sukses..");window.location = "mobil.php";</script>';
                }
              ?>

              <div class="form-group">
                <label for="nama" class="col-sm-12 control-label">Nama Mobil :</label>
                <div class="col-sm-12">
                  <input type="text" class="form-control" name="merk_mobil" placeholder="Avanza" required>
                </div>
              </div>
              <div class="form-group">
                <label for="nama" class="col-sm-12 control-label">Plat Mobil :</label>
                <div class="col-sm-12">
                  <input type="text" class="form-control" name="plat_mobil" placeholder="D 326 OO" required>
                </div>
              </div>
              <div class="form-group">
                <label for="nama" class="col-sm-12 control-label">Gambar Mobil:</label>
                <div class="col-sm-12">
                  <input class="form-control" type="file" name="myfile" required>
                </div>
              </div>
              <div class="form-group">
                <label for="nama" class="col-sm-12 control-label">Harga Sewa :</label>
                <div class="col-sm-12">
                  <input type="number" class="form-control" placeholder="1200000" name="harga_sewa" required>
                </div>
              </div>
              <div class="form-group">
                <label for="nama" class="col-sm-12 control-label">Tahun Pajak :</label>
                <div class="col-sm-12">
                  <input type="number" class="form-control" placeholder="2004" name="tahun_pajak" required>
                </div>
              </div>
              <div class="form-group">
                <label for="nama" class="col-sm-12 control-label">Bahan Bakar :</label>
                <div class="col-sm-12">
                  <input type="text" class="form-control" name="bahan_bakar" placeholder="Bensin" required>
                </div>
              </div>
              <div class="form-group">
                <label for="nama" class="col-sm-12 control-label">Fasilitas :</label>
                <div class="col-sm-12">
                  <textarea class="form-control" style="resize:vertical;" name="fasilitas" placeholder="TV, AC, Radio" required></textarea>
                </div>
              </div>
              <div class="form-group">
                <label for="nama" class="col-sm-12 control-label">Kapasitas Penumpang :</label>
                <div class="col-sm-12">
                <input type="text" class="form-control" name="kapasitas" placeholder="6" required>
                </div>
              </div>
              <button type="submit" class="btn btn-success" name="save">Submit</button>
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
