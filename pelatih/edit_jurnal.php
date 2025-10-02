<?php
session_start();
require('../login/config.php');

if (isset($_POST['update'])) {
    // Tangkap data yang dikirimkan melalui POST
    $id_jurnal = $_POST['id_jurnal'];
    $judul_jurnal = $_POST['judul'];
    $isi_jurnal = $_POST['isi'];

    // Query untuk melakukan update data jurnal berdasarkan id_jurnal
    $query_update = "UPDATE jurnal SET judul = '$judul_jurnal', isi_jurnal = '$isi_jurnal' WHERE id_jurnal = $id_jurnal";

    // Eksekusi query update
    if (mysqli_query($con, $query_update)) {
        // Redirect ke halaman jurnal.php setelah berhasil mengupdate
        header("Location: jurnal.php");
        exit(); // Hentikan eksekusi skrip setelah melakukan redirect
    } else {
        echo '<script>alert("Gagal mengupdate data jurnal");</script>';
        echo "Error: " . mysqli_error($con);
    }
} else {
    // Jika tidak ada permintaan update yang dikirimkan
    echo "Akses tidak valid.";
}
?>
