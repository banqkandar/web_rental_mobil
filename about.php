<?php 
  session_start();
  //koneksi ke database
  include 'config.php';
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <?php include "header.php"; ?>
  </head>
  <body>
    <?php include "navbar.php"; ?>
  <!-- /.col-lg-3 -->
  <div class="container">
    <div class="col-md-12 col-lg-offset-5">
      <div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">
        <div class="carousel-inner" role="listbox">
          <div class="carousel-item active">
            <img class="d-block img-fluid" src="img/cover3.png" style="width: 100%;">
          </div>
        </div>
      </div>

      <!-- konten -->
      <section class="konten">
        <div class="container">
          <h1>Tentang Kami :</h1> <br>
            <span class="subheading"><i><b><?=nama;?></b></i></span>
              <p align="justify"><?=nama;?> Menyediakan layanan order mobil sesuai keinginan pelanggan. <?=nama;?> menawarkan website dengan pembayaran bulanan bahkan gratis. Dilengkapi fitur pembayaran dengan paypal dan tarnsfer bank, dapat memilih template sendiri serta dilengkapi dengan database ongkos kirim dari JNE dan Pos Indonesia.</p>
              <p align="justify">Blog <?=nama;?> hadir untuk media informasi bagi yang ingin Booking mobil dengan Online. Anda tidak perlu cape-cape lagi kesana kemari untuk mencari mobil, anda hanya buka Web <?=nama;?> kami, kemudian order.</p>
        </div>
      </section>
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
