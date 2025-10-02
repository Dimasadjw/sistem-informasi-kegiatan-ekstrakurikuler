<?php
// Sambungkan ke database
include '../login/config.php';

// Periksa apakah parameter ID telah diterima
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    // Lakukan operasi penghapusan di sini, sesuai dengan kebutuhan Anda
    $query = "DELETE FROM tb_ekstra WHERE id = $id";
    $result = mysqli_query($con, $query);
        // Redirect kembali ke halaman sebelumnya atau halaman lain setelah penghapusan berhasil
        header('Location: ekstrakurikuler.php');
        exit();
} else {
    // Redirect ke halaman lain jika tidak ada parameter ID yang diterima
    header('Location: halaman_error.php');
    exit();
}
?>
