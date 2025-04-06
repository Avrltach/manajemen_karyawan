<?php
require 'sidebar.php';
include_once("config.php");
$result = mysqli_query($config, "SELECT a.id, k.nama, k.jabatan, a.waktu, a.keterangan
FROM absensi a
JOIN karyawan k ON a.id = k.id
ORDER BY a.waktu DESC;");
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Daftar Absensi</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<style>
    .content {
        margin-left: 250px;
        padding: 30px;
    }
</style>
<body class="bg-light">
<div class="content">
<div class="container mt-4">
  <h2 class="mb-4">Daftar Absensi Karyawan</h2>
  <div class="table-responsive card shadow-sm">
    <table class="table table-bordered table-hover mb-0">
      <thead class="table-dark">
        <tr>
          <th>No</th>
          <th>Nama</th>
          <th>Jabatan</th>
          <th>Waktu</th>
          <th>Keterangan</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $no = 1;
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>".$no++."</td>";
            echo "<td>".$row['nama']."</td>";
            echo "<td>".$row['jabatan']."</td>";
            echo "<td>".$row['waktu']."</td>";
            echo "<td>".$row['keterangan']."</td>";
            echo "</tr>";
        }
        ?>
      </tbody>
    </table>
  </div>
  <a href="absensi.php" class="btn btn-primary mt-3">Kembali ke Form Absensi</a>
</div>
</div>
</body>
</html>
