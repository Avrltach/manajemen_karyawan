<?php
include_once "config.php"; 

try {
    $query = mysqli_query($config, "SELECT nama FROM karyawan");

    if (!$query) {
        throw new Exception(mysqli_error($config));
    }

    $data = mysqli_fetch_all($query, MYSQLI_ASSOC);
    $count = count($data);
} catch (\Throwable $th) {
    echo "
        <script>
        Swal.fire({
            title: 'Gagal',
            text: 'Server error!',
            icon: 'error',
            showConfirmButton: false,
            timer: 2000,
            timerProgressBar: true,
        })
        </script>
    ";
    $count = 0; 
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        .content {
            margin-left: 240px; 
            padding: 20px;
        }
    </style>
</head>
<body>

<?php require 'sidebar.php'; ?>

<div class="content">
    <div class="container-fluid">
        <h3 class="mb-4">Selamat Datang di Manajemen Karyawan</h3>

        <div class="row">
            <div class="col-md-3">
                <div class="card text-white bg-danger mb-3">
                    <div class="card-body text-center">
                        <i class="fas fa-users display-6"></i>
                        <h6 class="font-extrabold mb-0"><?= $count ?></h6>
                        <p class="card-text">Total Karyawan</p>
                    </div>
                </div>
            </div>      
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

</body>
</html>
