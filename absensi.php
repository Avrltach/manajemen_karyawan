<?php
require 'sidebar.php';
include_once("config.php");

// Ambil data karyawan untuk dropdown
$karyawan = mysqli_query($config, "SELECT * FROM karyawan");

// Proses submit
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_karyawan = $_POST['id_karyawan'];
    $now = date("H");

    // Tentukan keterangan absensi
    $keterangan = ($now >= 6 && $now <= 18) ? "Karyawan Masuk (Tepat Waktu)" : "Karyawan Telat";

    // Simpan ke tabel absensi
    $query = "INSERT INTO absensi (id_karyawan, keterangan) VALUES ('$id_karyawan', '$keterangan')";
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
<body class="bg-light">
  <div class="content">
    <div class="container mt-4">
      <h2 class="mb-4">Form Absensi Karyawan</h2>
      <div class="card shadow-sm">
        <div class="card-body">
          <form method="POST">
            <div class="mb-3">
              <label for="id_karyawan" class="form-label">Pilih Karyawan</label>
              <select class="form-select" name="id_karyawan" id="id_karyawan" required>
                <option value="">-- Pilih Nama Karyawan --</option>
                <?php while ($row = mysqli_fetch_assoc($karyawan)): ?>
                  <option value="<?= $row['id'] ?>">
                    <?= $row['nama'] ?> (<?= $row['jabatan'] ?>)
                  </option>
                <?php endwhile; ?>
              </select>
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
