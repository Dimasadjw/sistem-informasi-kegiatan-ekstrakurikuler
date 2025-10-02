<?php
session_start();
require('../login/config.php');

// Periksa apakah ada data yang dikirim dari form
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST["nama"]; 
    $kelas = $_POST['kelas'];
    $ekstra_id = $_POST['ekstra'];
    $id_user = $_SESSION["id_user"];

    // Periksa jumlah ekstrakurikuler yang sudah diikuti oleh siswa
    $sqlCount = "SELECT COUNT(*) AS total_ekstra FROM ekstra_diikuti WHERE id_user = '$id_user'";
    $resultCount = mysqli_query($con, $sqlCount);
    $row = mysqli_fetch_assoc($resultCount);
    $total_ekstra = $row['total_ekstra'];

    // Jika jumlah ekstrakurikuler yang sudah diikuti sudah mencapai 2, tampilkan pesan error
    if ($total_ekstra >= 2) {
        echo "Maaf, Anda sudah mencapai batas maksimal pendaftaran ekstrakurikuler.";
    } else {
        // Lakukan proses pendaftaran ke database
        $query = "INSERT INTO ekstra_diikuti (id_user, id_ekstra, kelas) VALUES ('$id_user', '$ekstra_id', '$kelas')";
        $result = mysqli_query($con, $query);

        if ($result) {
            // Redirect ke halaman sukses atau halaman ekstrakurikuler
            header("Location: index.php");
            exit();
        } else {
            // Jika terjadi kesalahan, tampilkan pesan error
            echo "Gagal melakukan pendaftaran. Silakan coba lagi.";
        }
    }
}
?>
