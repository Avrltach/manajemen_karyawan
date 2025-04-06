<?php
require 'sidebar.php';
include_once("config.php");

$id = $_GET['id'];
$result = mysqli_query($conn, "SELECT * FROM absensi WHERE id = $id");
$data = mysqli_fetch_assoc($result);

if (isset($_POST['submit'])) {
    $keterangan = $_POST['keterangan'];
    mysqli_query($conn, "UPDATE absensi SET keterangan='$keterangan' WHERE id=$id");
    header("Location: laporan.php");
}
?>

<form method="POST" class="container mt-4">
  <h3>Edit Keterangan Absensi</h3>
  <div class="mb-3">
    <label>Keterangan</label>
    <input type="text" name="keterangan" class="form-control" value="<?= $data['keterangan'] ?>" required>
  </div>
  <button type="submit" name="submit" class="btn btn-success">Simpan</button>
  <a href="laporan.php" class="btn btn-secondary">Kembali</a>
</form>
