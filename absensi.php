<?php
require 'sidebar.php';
include_once("config.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = $_POST['nama'];
    $jabatan = $_POST['jabatan'];
    $now = date("H");

    $keterangan = ($now >= 6 && $now <= 18) ? "Karyawan Masuk (Tepat Waktu)" : "Karyawan Telat";

    $query = "INSERT INTO absensi (nama, jabatan, keterangan) VALUES ('$nama', '$jabatan', '$keterangan')";
    mysqli_query($config, $query);
    header("Location: data_absen.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Form Absensi</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<style>
    .content {
            margin-left: 250px;
            padding: 30px;
        }
</style>
<body class="bg-light ">
  <div class="content">
<div class="container mt-4">
  <h2 class="mb-4">Form Absensi Karyawan</h2>
  <div class="card shadow-sm">
    <div class="card-body">
      <form method="POST">
        <div class="mb-3">
          <label for="nama" class="form-label">Nama</label>
          <input type="text" class="form-control" id="nama" name="nama" required>
        </div>
        <div class="mb-3">
          <label for="jabatan" class="form-label">Jabatan</label>
          <input type="text" class="form-control" id="jabatan" name="jabatan" required>
        </div>
        <button type="submit" class="btn btn-primary">Absen Sekarang</button>
        <a href="data_absen.php" class="btn btn-secondary">Lihat Absensi</a>
      </form>
    </div>
  </div>
</div>
</div>
</body>
</html>
