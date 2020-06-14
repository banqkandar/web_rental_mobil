<?php
// buka koneksi dengan MySQL
  include("../config.php");
  session_start();
  if (!isset($_SESSION['admin'])) {
        echo '
            <script>
                window.alert("Anda Tidak Berhak Mengakses Halaman Ini Karena Anda Belum Login Sebagai Admin");
                window.location = "../login.php";
            </script>
        ';
  }else{
  //mengecek apakah di url ada GET id
  if (isset($_GET["id"])) {
    // menyimpan variabel id dari url ke dalam variabel $id
    $id = $_GET["id"];

    //jalankan query DELETE untuk menghapus data
    $query = "DELETE FROM akun WHERE id_akun='$id' ";
    $hasil_query = $koneksi->query($query);

    //periksa query, apakah ada kesalahan
    if ($koneksi->errno) {
      echo 'window.alert("Gagal.");';
    }else{
      echo 'window.alert("Karyawan Telah di hapus.");';
    }
  }
  // melakukan redirect ke halaman index.php
  header("location:karyawan.php");
  }
?>
