<?php
session_start();
require('../login/config.php');

// Pastikan metode request adalah POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Tangkap data yang dikirimkan melalui form
    $ekstra_id = $_POST['id'];
    $nama = $_POST['nama'];
    $kelas = $_POST['kelas'];
    $ekstra = $_POST['ekstra'];

    // Lakukan operasi SQL untuk menyimpan data pendaftaran
    $query = "INSERT INTO tb_pendaftaran (ekstra_id, nama, kelas, ekstra) VALUES ('$ekstra_id', '$nama', '$kelas', '$ekstra')";

    if (mysqli_query($con, $query)) {
        // Jika data berhasil disimpan, arahkan kembali ke halaman sebelumnya dengan pesan sukses
        header("Location: index.php?status=success");
        exit();
    } else {
        // Jika terjadi kesalahan saat penyimpanan data, tampilkan pesan error
        echo "Error: " . $query . "<br>" . mysqli_error($con);
    }
} else {
    // Jika metode request bukan POST, arahkan kembali ke halaman sebelumnya
    header("Location: index.php");
    exit();
}