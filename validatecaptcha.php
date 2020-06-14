<?php
session_start();
require_once("config.php");
if(count($_POST)>0) {
	if(isset($_POST["captcha"])&&$_POST["captcha"]!=""&&$_SESSION["code"]==$_POST["captcha"]) {
		
		$nama = $_POST['nama'];
		$email = $_POST['email'];
		$subject = $_POST['subject'];
		$pesan = $_POST['pesan'];
		$koneksi->query("INSERT INTO contact(nama,email,subjek,pesan)
                                    VALUES ('$nama','$email','$subject','$pesan')");
		echo "<script>alert('Pesan berhasil terkirim !');</script>";
		echo "<script>location='contact.php'</script>";
	} else {
		echo "<script>alert('Masukkkan Kode CAPTCHA dengan Benar !');</script>";
		echo "<script>location='contact.php'</script>";
	}
}
?>
 