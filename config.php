<?php
error_reporting(0);
session_start();
$server = 'localhost'; // e.g 'localhost' or '192.168.1.100'
$user   = 'root'; // username database
$pass   = ''; // password database
$db   = 'rental_baru'; // nama database
$koneksi = new mysqli($server, $user, $pass, $db);
if ($koneksi->connect_error) {
  trigger_error('Database connection failed: '  . $koneksi->connect_error, E_USER_ERROR);
}
// Nama Website
define("nama","Syem RentCar");
// Kata kata di homepage
define("headline","Nyaman, Aman, dan Terbaik");
// Author
define("admin","Black");
?>