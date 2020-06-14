<?php
	include '../config.php';
	$id_transaksi = $_GET['id'];
	$sql = "SELECT * FROM transaksi WHERE id_transaksi = '$id_transaksi'";
	$query = $koneksi->query($sql);
	$data = $query->fetch_array();

	$plat_mobil = $data['plat_mobil'];

	$query2 = $koneksi-> query("SELECT * FROM mobil WHERE plat_mobil = '$plat_mobil'");
	$mobil = $query2->fetch_array();
	
	date_default_timezone_set('Asia/Jakarta'); 
	$now = date('Y-m-d H:i:s', time());
	$cek_in = $data['cek_in'];
	if($cek_in < $now) {
		$pinjam = abs(  ( strtotime($cek_in) - strtotime($now) ) / ( 60*60*24 ) );
		if ($pinjam > 0 && $pinjam < 1) {
			$telat = 1;
		} else {
			$telat = ceil($pinjam) - $data['lama_pakai'];
		}
		$denda = $telat * $mobil['harga_sewa'];
	} else {
		$telat = 0;
		$denda = 0;
	}
	
	
	$update = "UPDATE transaksi SET cek_out='$now', keterlambatan='$telat', biaya_denda='$denda' WHERE id_transaksi='$id_transaksi'";
	$submit = $koneksi->query($update);
	if($update) {
		echo '<script>window.alert("Cek Out Sukses");
		window.location.replace("transaksi.php");</script>';
	} else {
		echo '<script>window.alert("Cek Out Gagal");
		window.location.replace("transaksi.php");</script>';
	}
