<?php
$server = "localhost"; 
$user = "root"; 
$pass = ""; 
$db = "manajemen_karyawan"; 

$config = mysqli_connect($server, $user, $pass, $db);

// Cek koneksi
if (!$config) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>
