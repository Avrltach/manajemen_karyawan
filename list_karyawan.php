<?php
include_once("config.php");

$result = mysqli_query($config, "SELECT * FROM karyawan ORDER BY id DESC");
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Karyawan</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .content {
            margin-left: 250px;
            padding: 30px;
        }

        .table th, .table td {
            vertical-align: middle;
        }
    </style>
</head>

<body>
    <?php require 'sidebar.php'; ?>

    <div class="content">
        <div class="container">
            <h2 class="text-center mb-4">Daftar Karyawan</h2>

            <table class="table table-bordered">
                <thead class="text-center">
                    <tr>
                        <th>Nama</th>
                        <th>Jabatan</th>
                        <th>Email</th>
                        <th>Gaji</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($data = mysqli_fetch_array($result)) { ?>
                        <tr>
                            <td><?= htmlspecialchars($data['nama']); ?></td>
                            <td><?= htmlspecialchars($data['jabatan']); ?></td>
                            <td><?= htmlspecialchars($data['email']); ?></td>
                            <td>Rp <?= number_format($data['gaji'], 0, ',', '.'); ?></td>
                            <td class="text-center">
                                <a href="edit_karyawan.php?id=<?= $data['id']; ?>" class="btn btn-warning btn-sm">Edit</a>
                                <a href="delete_karyawan.php?id=<?= $data['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
