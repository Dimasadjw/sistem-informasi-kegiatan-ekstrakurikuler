<?php
session_start();
require('../login/config.php');

// Pastikan parameter id jurnal telah dikirim melalui URL
if (isset($_GET['id'])) {
    // Tangkap id jurnal dari URL
    $id_jurnal = $_GET['id'];

    // Query untuk menghapus jurnal dari database
    $query = "DELETE FROM jurnal WHERE id_jurnal = $id_jurnal";

    // Eksekusi query
    if (mysqli_query($con, $query)) {

        // Tambahkan alert 'Berhasil hapus data'
        
        // Redirect ke halaman jurnal.php setelah berhasil menghapus
        header("Location: jurnal.php");
        exit(); // Hentikan eksekusi skrip setelah melakukan redirect
    } else {
        echo "Error: " . mysqli_error($con);
    }
} else {
    // Jika parameter id tidak ada dalam URL
    echo "ID jurnal tidak valid.";
}
?>
