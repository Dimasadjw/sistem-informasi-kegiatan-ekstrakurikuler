<?php
session_start();
require('../login/config.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update'])) {
    $id = $_POST['id'];
    $namaEkstrakurikuler = $_POST['nama_ekstra'];
    $namaPelatih = $_POST['pelatih'];
    $hari = $_POST['hari'];
    $waktu = $_POST['waktu'];

    // Query untuk mengupdate data ekstrakurikuler
    $query = "UPDATE tb_ekstra SET nama_ekstra = '$namaEkstrakurikuler', id_user = '$namaPelatih', hari = '$hari', waktu = '$waktu' WHERE id = $id";

    if (mysqli_query($con, $query)) {
        // Redirect ke halaman ekstrakurikuler atau tampilkan pesan sukses
        header('Location: ekstrakurikuler.php');
        exit;
    } else {
        // Tampilkan pesan error jika query gagal
        echo "Error: " . $query . "<br>" . mysqli_error($con);
    }
    // Tutup koneksi database
    mysqli_close($con);
}
?>
