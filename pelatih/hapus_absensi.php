<?php
session_start();
require('../login/config.php');

// Pastikan parameter id jurnal telah dikirim melalui URL
if (isset($_GET['id_buat_absen'])) {
    // Tangkap id jurnal dari URL
    $id_buat_absen = $_GET['id_buat_absen'];

    // Escape nilai $id_buat_absensi untuk mencegah SQL Injection
    $id_buat_absen = mysqli_real_escape_string($con, $id_buat_absen);

    // Query untuk menghapus jurnal dari database
    $query = "DELETE FROM buat_absensi WHERE id_buat_absen = $id_buat_absen";

    // Eksekusi query
    if (mysqli_query($con, $query)) {
        // Tambahkan alert 'Berhasil hapus data'
        // Misalnya dengan mengirimkan parameter GET
        header("Location: buat_absensi.php?pesan=berhasilhapus");
        exit(); // Hentikan eksekusi skrip setelah melakukan redirect
    } else {
        echo "Error: " . mysqli_error($con);
    }
} else {
    // Jika parameter id tidak ada dalam URL
    echo "ID absensi tidak valid.";
}
