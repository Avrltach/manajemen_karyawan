<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
<style>
    .nav-link {
        transition: all 0.3s ease;
        padding: 8px 16px !important;
        margin: 4px 0;
        border-radius: 4px;
    }
    
    .nav-link:hover {
        background-color: rgba(255, 255, 255, 0.1);
        transform: translateX(5px);
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }
    
    .nav-link.active {
        background-color: var(--bs-primary) !important;
    }
    
    .te {
        padding: 10px 0 5px 10px;
        font-size: 0.9rem;
        color: rgba(255, 255, 255, 0.7);
    }
</style>
<div class="d-flex flex-column flex-shrink-0 p-3 bg-dark text-white" style="width: 250px; height: 100vh; position: fixed;">
    <div class="text-center">
        <h5 class="mt-2">Manajemen Karyawan</h5>
    </div>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">
        <li class="nav-item">
            <h6 class=" text-white te">Utama</h6>
            <a href="index.php" class="nav-link text-white">
                <i class="fas fa-home me-3"></i> Dashboard
            </a>
        </li>
        <li>
            <h6 class=" text-white te">Manajemen</h6>
            <a href="list_karyawan.php" class="nav-link text-white">
                <i class="fas fa-list me-3"></i> Data Karyawan
            </a>
        </li>
        <li>
            <a href="tambah_karyawan.php" class="nav-link text-white">
                <i class="fas fa-exchange-alt me-3"></i> Tambah Karyawan
            </a>
        </li>
        <li>
            <h6 class=" text-white te">Absensi</h6>
            <a href="absensi.php" class="nav-link text-white">
                <i class="fas fa-check-to-slot me-3"></i>Absensi disini
            </a>
        </li>
        <li>
            <a href="data_absen.php" class="nav-link text-white">
                <i class="fas fa-user-check me-3"></i>Data absensi
            </a>
        </li>
        <li>
            <h6 class=" text-white te">Lain nya</h6>
            <a href="Laporan.php" class="nav-link text-white">
                <i class="fas fa-file-alt me-3"></i> Laporan
            </a>
        </li>
    </ul>
</div>
