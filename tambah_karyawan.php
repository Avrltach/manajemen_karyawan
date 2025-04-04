<?php
include_once("config.php");

// Proses jika form disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'];
    $jabatan = $_POST['jabatan'];
    $email = $_POST['email'];
    $gaji = $_POST['gaji'];

    $query = "INSERT INTO karyawan (Nama, Jabatan, Email, Gaji) 
              VALUES ('$nama', '$jabatan', '$email', '$gaji')";

    if (mysqli_query($config, $query)) {
        echo "<script>
            alert('Karyawan berhasil ditambahkan!');
            window.location.href = 'list_karyawan.php';
        </script>";
    } else {
        echo "<script>
            alert('Gagal menambahkan karyawan!');
        </script>";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Karyawan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .content {
            margin-left: 250px;
            padding: 20px;
        }
    </style>
</head>
<body>

<?php require 'sidebar.php'; ?>

<div class="content">
    <div class="container mt-4">
        <h2>Tambah Karyawan Baru</h2>
        <form method="post" action="">

            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama" required>
            </div>

            <div class="mb-3">
                <label for="jabatan" class="form-label">Jabatan</label>
                <input type="text" class="form-control" id="jabatan" name="jabatan" required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>

            <div class="mb-3">
                <label for="gaji" class="form-label">Gaji</label>
                <input type="number" class="form-control" id="gaji" name="gaji" required>
            </div>

            <button type="submit" class="btn btn-success">Simpan</button>
            <a href="list_karyawan.php" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</div>

</body>
</html>
