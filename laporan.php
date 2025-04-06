<?php
require 'sidebar.php';
include_once("config.php");

$tanggal = date('Y-m-d'); // filter per hari ini

$query = "
    SELECT a.id, k.nama, k.jabatan, k.email, k.gaji, a.waktu, a.keterangan
    FROM karyawan k
    JOIN absensi a ON k.id = a.id
    WHERE DATE(a.waktu) = '$tanggal'
    ORDER BY a.waktu DESC
";

$result = mysqli_query($config, $query);
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Laporan Karyawan Hari Ini</title>
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
  <h2 class="mb-4">Laporan Kehadiran Karyawan - <?= date("d M Y") ?></h2>
  <div class="table-responsive card shadow-sm">
    <table class="table table-bordered table-hover mb-0">
      <thead class="table-dark">
        <tr>
          <th>Nama</th>
          <th>Jabatan</th>
          <th>Email</th>
          <th>Gaji</th>
          <th>Waktu Absen</th>
          <th>Keterangan</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php while ($row = mysqli_fetch_assoc($result)): ?>
          <tr>
            <td><?= $row['nama'] ?></td>
            <td><?= $row['jabatan'] ?></td>
            <td><?= $row['email'] ?></td>
            <td>Rp<?= number_format($row['gaji'], 0, ',', '.') ?></td>
            <td><?= $row['waktu'] ?></td>
            <td><?= $row['keterangan'] ?></td>
            <td>
              <a href="edit_laporan.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-warning">Edit</a>
              <a href="hapus_laporan.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin hapus?')">Hapus</a>
            </td>
          </tr>
        <?php endwhile; ?>
      </tbody>
    </table>
  </div>
</div>
</div>
</body>
</html>
