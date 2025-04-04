<?php
include_once("config.php");

// Ambil ID dari URL
$id = $_GET['id'] ?? null;

if (!$id) {
    echo "ID tidak ditemukan!";
    exit;
}

// Ambil data berdasarkan ID
$result = mysqli_query($config, "SELECT * FROM karyawan WHERE id=$id");

if (mysqli_num_rows($result) === 0) {
    echo "Data tidak ditemukan!";
    exit;
}

$data = mysqli_fetch_assoc($result);

// Proses update jika form disubmit
if (isset($_POST['update'])) {
    $nama = $_POST['nama'];
    $jabatan = $_POST['jabatan'];
    $email = $_POST['email'];
    $gaji = $_POST['gaji'];

    // Update data ke database
    $update = mysqli_query($config, "UPDATE karyawan SET 
        nama='$nama',
        jabatan='$jabatan',
        email='$email',
        gaji='$gaji'
        WHERE id=$id");

    if ($update) {
        header("Location: list_karyawan.php");
        exit;
    } else {
        echo "Gagal mengupdate data: " . mysqli_error($config);
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Karyawan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .content {
            margin-left: 250px;
            padding: 30px;
        }
    </style>
</head>
<body>
    <?php require 'sidebar.php'; ?>

    <div class="content">
        <div class="container">
            <h2 class="mb-4">Edit Karyawan</h2>
            <form method="post">
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" name="nama" class="form-control" id="nama" value="<?= htmlspecialchars($data['nama']); ?>" required>
                </div>
                <div class="mb-3">
                    <label for="jabatan" class="form-label">Jabatan</label>
                    <input type="text" name="jabatan" class="form-control" id="jabatan" value="<?= htmlspecialchars($data['jabatan']); ?>" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" id="email" value="<?= htmlspecialchars($data['email']); ?>" required>
                </div>
                <div class="mb-3">
                    <label for="gaji" class="form-label">Gaji</label>
                    <input type="number" name="gaji" class="form-control" id="gaji" value="<?= htmlspecialchars($data['gaji']); ?>" required>
                </div>
                <button type="submit" name="update" class="btn btn-primary">Simpan Perubahan</button>
                <a href="list_karyawan.php" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
</body>
</html>
