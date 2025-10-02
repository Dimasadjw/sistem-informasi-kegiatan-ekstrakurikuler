<?php
session_start();
require('../login/config.php');


?>

<?php 


 $tanggal_mulai = $_GET['tanggal_mulai'];
 $tanggal_selesai = $_GET['tanggal_selesai'];
 $ekstrakurikuler_id = $_GET['ekstrakurikuler'];


 $query = "SELECT * FROM jurnal WHERE tanggal BETWEEN '$tanggal_mulai' AND '$tanggal_selesai' AND
 ekstrakurikuler=  '$ekstrakurikuler_id'";
 $result = mysqli_query($con, $query);
 ?>


<!DOCTYPE html>
<html>

<head>
    <title>Cetak laporan PDF Di PHP Dan MySQLi</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .container {
            text-align: center;
            margin-bottom: 20px;
        }

        .header {
            background-color: #f0f0f0;
            padding: 10px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table th,
        table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        table th {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <h1>Laporan Jurnal Ekstrakurikuler <?php ?></h1>
        </div>
    </div>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Pelatih</th>
                    <th>Ekstrakurikuler</th>
                    <th>Tanggal</th>
                    <th>Judul</th>
                    <th>Isi</th>
                </tr>
            </thead>
            <tbody>

                <?php

                if (isset($result) && mysqli_num_rows($result) > 0) {

                    $no = 1;
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . $no . "</td>";
                        echo "<td>" . $row['nama'] . "</td>";
                        echo "<td>" . $row['ekstrakurikuler'] . "</td>";
                        echo "<td>" . $row['tanggal'] . "</td>";
                        echo "<td>" . $row['judul'] . "</td>";
                        echo "<td>" . $row['isi_jurnal'] . "</td>";
                        echo "</tr>";
                        $no++;
                    }
                } else {
                    echo "<tr><td colspan='6'>Tidak ada data yang ditemukan.</td></tr>";
                }

                ?>
            </tbody>
        </table>
    </div>
    <script>
        window.print();
    </script>
</body>

</html>