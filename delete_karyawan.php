<?php
include_once("config.php");
error_reporting(E_ALL);
ini_set('display_errors', 1);

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Hapus data dari database
    $result = mysqli_query($config, "DELETE FROM karyawan WHERE id='$id'");

    if ($result) {
        echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>";
        echo "<script>
                document.addEventListener('DOMContentLoaded', function() {
                    Swal.fire({
                        title: 'Berhasil!',
                        text: 'Data berhasil dihapus.',
                        icon: 'success',
                        confirmButtonText: 'OK'
                    }).then(() => {
                        window.location.href = 'index.php';
                    });
                });
              </script>";
    } else {
        echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>";
        echo "<script>
                document.addEventListener('DOMContentLoaded', function() {
                    Swal.fire({
                        title: 'Gagal!',
                        text: 'Data gagal dihapus.',
                        icon: 'error',
                        confirmButtonText: 'Coba lagi'
                    }).then(() => {
                        window.location.href = 'index.php';
                    });
                });
              </script>";
    }
}
?>