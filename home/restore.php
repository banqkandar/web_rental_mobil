<?php 
require_once "../config.php";
session_start();
if (!isset($_SESSION['admin'])) {
        echo '
            <script>
                window.alert("Anda Tidak Berhak Mengakses Halaman Ini Karena Anda Belum Login Sebagai Admin");
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
        <li class="breadcrumb-item active">Restore Data</li>
      </ol>

      <?php
        $conn = mysqli_connect("localhost", "root", "", "rental_baru");
        if (! empty($_FILES)) {
            // Validating SQL file type by extensions
            if (! in_array(strtolower(pathinfo($_FILES["backup_file"]["name"], PATHINFO_EXTENSION)), array(
                "sql"
            ))) {
                $response = array(
                    "type" => "error",
                    "message" => "Invalid File Type"
                );
            } else {
                if (is_uploaded_file($_FILES["backup_file"]["tmp_name"])) {
                    move_uploaded_file($_FILES["backup_file"]["tmp_name"], $_FILES["backup_file"]["name"]);
                    $response = restoreMysqlDB($_FILES["backup_file"]["name"], $conn);
                }
            }
        }

        function restoreMysqlDB($filePath, $conn)
        {
            $sql = '';
            $error = '';
            
            if (file_exists($filePath)) {
                $lines = file($filePath);
                
                foreach ($lines as $line) {
                    
                    // Ignoring comments from the SQL script
                    if (substr($line, 0, 2) == '--' || $line == '') {
                        continue;
                    }
                    
                    $sql .= $line;
                    
                    if (substr(trim($line), - 1, 1) == ';') {
                        $result = mysqli_query($conn, $sql);
                        if (! $result) {
                            $error .= mysqli_error($conn) . "\n";
                        }
                        $sql = '';
                    }
                } // end foreach
                
                if ($error) {
                    $response = array(
                        "type" => "error",
                        "message" => $error
                    );
                } else {
                    $response = array(
                        "type" => "success",
                        "message" => "Database Restore Completed Successfully."
                    );
                }
                exec('rm ' . $filePath);
            } // end if file exists
            
            return $response;
        }

        ?>
        <h3>Restore</h3>
        <?php
        if (! empty($response)) {
            ?>
        <div class="response <?php echo $response["type"]; ?>">
          <?php echo nl2br($response["message"]); ?>
        </div>
        <?php
          }
        ?>
            <form method="post" action="" enctype="multipart/form-data"
                id="frm-restore">
                <div class="form-control ">
                    <div>Choose Backup File</div>
                    <div>
                        <input type="file" name="backup_file" class="input-file" />
                    </div>
                </div>
                <div>
                    <input type="submit" name="restore" value="Restore"
                        class="btn btn-primary mb-2" />
                </div>
            </form>
      </div>
    </div>
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