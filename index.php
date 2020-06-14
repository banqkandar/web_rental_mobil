<?php 
require_once "config.php";
session_start();
if (isset($_SESSION['konsumen'])) {
    $konsumen = $_SESSION['konsumen'];
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <?php include "header.php"; ?>
  </head>
  <body>
    <?php include "navbar.php"; ?>
    <?php include "home.php"; ?>

    <?php 
    $query = $koneksi->query("SELECT * FROM mobil");
            while($mobil = $query->fetch_array()){
              $plat_mobil = $mobil['plat_mobil'];
              $query2 = $koneksi -> query("SELECT transaksi.cek_out, mobil.plat_mobil FROM mobil JOIN transaksi 
              WHERE transaksi.plat_mobil = mobil.plat_mobil AND mobil.status_mobil = 'kosong' AND mobil.plat_mobil = '$plat_mobil' 
              AND (SELECT MAX(transaksi.cek_in) FROM transaksi WHERE transaksi.plat_mobil='$plat_mobil') <= CURRENT_TIMESTAMP 
              ORDER BY transaksi.cek_out DESC, transaksi.tanggal_transaksi DESC LIMIT 1");
              $data = $query2 -> fetch_array();
              $plat = $data['plat_mobil'];
              date_default_timezone_set('Asia/Jakarta'); 
	            $now = date('Y-m-d H:i:s', time());
              if ($data['cek_out'] < $now && $data['cek_out'] != null) {
                mysqli_query($koneksi, "UPDATE mobil SET mobil.status_mobil = 'ada' 
                WHERE mobil.plat_mobil = '$plat'");
              }
            }
    ?>

    <!-- Page Content -->
    <div class="container" id="listmobil">

      <h1 class="my-4">Mobil Yang Tersedia</h1>
      <!-- Portfolio Section -->
      <div class="row">
      <?php $cek_mobil = $koneksi->query("SELECT * FROM mobil");
            while($datanya = $cek_mobil->fetch_array()){
      ?>
        <div class="col-md-4">
          <div class="card mb-4 box-shadow">
              <img class="card-img-top" src="<?php echo "img/".$datanya['gambar_mobil'].""; ?>" alt="<?php echo "".$datanya['merk_mobil'].""; ?>">
              <div class="card-body">
                <p class="card-text"><?php echo "".$datanya['merk_mobil'].""; ?></p>
                <div class="d-flex justify-content-between align-items-center">
                  <div class="btn-group">
                    <a href="<?php echo "detail.php?id=".$datanya['plat_mobil']."";?>" class="btn btn-sm btn-outline-secondary">Detail Mobil</a>
                    <a href="<?php echo "pesan.php?id=".$datanya['plat_mobil']."";?>"  class="btn btn-sm btn-outline-secondary <?php if($datanya['status_mobil'] == 'kosong') { echo 'disable'; } ?>">Pesan Mobil</a>
                  </div>
                <small class="text-muted"><?php echo "".$datanya['status_mobil'].""; ?></small>
              </div>
            </div>
          </div>
        </div>
        <?php } ?>
      </div>
      </div>
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
