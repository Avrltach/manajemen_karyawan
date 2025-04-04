<?php
include_once("config.php");

// Ambil data karyawan dari database
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

        @media print {
            .no-print {
                display: none !important;
            }

            body {
                margin: 0;
                padding: 0;
            }
        }
    </style>
</head>

<body>
    <?php require 'sidebar.php'; ?>

    <div class="content">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2 class="text-center w-100">Daftar Laporan Karyawan</h2>
                <button onclick="window.print()" class="btn btn-outline-secondary no-print">Cetak</button>
            </div>

            <table class="table table-bordered">
                <thead class="text-center">
                    <tr>
                        <th>Nama</th>
                        <th>Jabatan</th>
                        <th>Email</th>
                        <th>Gaji</th>
                        <th class="no-print">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($data = mysqli_fetch_array($result)) { ?>
                        <tr>
                            <td><?= htmlspecialchars($data['nama']); ?></td>
                            <td><?= htmlspecialchars($data['jabatan']); ?></td>
                            <td><?= htmlspecialchars($data['email']); ?></td>
                            <td>Rp <?= number_format($data['gaji'], 0, ',', '.'); ?></td>
                            <td class="text-center no-print">
                                <a href="edit.php?id=<?= $data['id']; ?>" class="btn btn-warning btn-sm">Edit</a>
                                <a href="delete.php?id=<?= $data['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</a>
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
