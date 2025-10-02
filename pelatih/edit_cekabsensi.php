<?php
session_start();
require('../login/config.php');

$id = $_GET['id'];
if (isset($_POST['ekstra']) && isset($_POST['kelas'])) {
    // Tangani nilai yang diterima dari $_GET
    $id_ekstra = $_POST['ekstra'];
    $id_kelas = $_POST['kelas'];
    // Lakukan query untuk mengambil data dari database
    $query = "SELECT * FROM absensi b JOIN ekstra_diikuti d ON b.id_ekstra = d.id_ekstra WHERE b.id_ekstra = $id";
    $result = mysqli_query($con, $query);
    $row = mysqli_fetch_assoc($result);


    if ($result && mysqli_num_rows($result) > 0) {
        // Mendapatkan data sebagai array asosiatif

        $kelas = $row['kelas'];
        $ekstrakurikuler = $row['ekstrakurikuler'];
    } else {
        echo "Tidak ada data yang ditemukan: " . mysqli_error($con);
    }
}


// $tanggal = date('Y-m-d');

// // Query untuk memeriksa apakah sudah ada data absensi yang dibuat oleh pelatih
// $query_check_absensi = "SELECT COUNT(*) AS total_absensi FROM buat_absensi WHERE id_ekstra = $id  AND tanggal = $tanggal";
// $result_check_absensi = mysqli_query($con, $query_check_absensi);

// $row = mysqli_fetch_assoc($result_check_absensi);
// 
?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Siswa</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">


        <!-- Sidebar -->
        <ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar" style="background-color: #024040;">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-text mx-3">Sistem Informasi Ekstrakurikuler</div>
            </a>


            <li class="nav-item">
                <a class="nav-link collapsed" href="index.php" aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-home"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item active">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Absensi</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Absensi</h6>
                        <a class="collapse-item" href="buat_absensi.php">Buat Absensi</a>
                        <a class="collapse-item" href="cek_absensi.php">Absensi</a>

                    </div>
                </div>
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="jurnal.php" aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>Jurnal</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#dua" aria-expanded="true" aria-controls="dua">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Laporan</span>
                </a>
                <div id="dua" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Laporan</h6>
                        <a class="collapse-item" href="laporan_absensi.php">Laporan Absensi</a>
                        <a class="collapse-item" href="laporan_jurnal.php">Laporan Jurnal</a>
                    </div>
                </div>
            </li>

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
        </ul>
        <!-- End of Sidebar -->


        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">



            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <a href="javascript:history.go(-1);" style="color:black">
                        <i class="fa fa-arrow-left ml-4 mr-2"></i>Kembali
                    </a>
                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <li class="nav-tem dropdown no-arrow mx-1 mt-3">
                            <a class="nav-link" href="../login/login.php" data-toggle="modal" data-target="#logoutModal">
                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2"></i>
                                Logout
                            </a>
                        </li>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item no-arrow">
                            <a class="nav-link " href="#" id="userDropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo  $_SESSION['nama'] ?></span>
                                <img class="img-profile rounded-circle" src="img/undraw_profile.svg">
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- End of Topbar -->

                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3 ml-2">
                                    <h6 class="m-0 font-weight-bold text-primary">Absensi</h6>
                                </div>
                                <div class="card-body ml-2">

                                    <?php
                                    $id = $_GET['id'];
                                    $query = "SELECT * FROM buat_absensi b JOIN ekstra_diikuti d ON b.id_ekstra = d.id_ekstra WHERE b.id_ekstra = $id";
                                    $result = mysqli_query($con, $query);
                                    $row = mysqli_fetch_assoc($result);
                                    var_dump($row);
                                    if (!$row) {



                                        // $id_buat_absen = $row['id_buat_absen'];
                                        // $id_user = $row['id_user'];
                                        // $query = "SELECT * FROM absensi WHERE id_buat_absensi = $id_buat_absen AND id_user = $id_user";
                                        // $result = mysqli_query($con, $query);
                                        // $r = mysqli_fetch_assoc($result);

                                        // if (!$r) {

                                    ?>

                                        <form method="POST" action="">
                                            <div class="form-group row">

                                                <label for="nama" class="col-sm-2 col-form-label input-group-label">Nama</label>
                                                <div class="col-sm-4">
                                                    <input type="text" class="form-control" id="nama" name="nama" value="<?php echo  $_SESSION['nama'] ?>" readonly>
                                                    <input type="text" class="form-control" id="id" name="id" value="<?php echo  $row['id_user'] ?>" readonly hidden>
                                                </div>
                                            </div>
                                            <div class="form-group row">

                                                <label for="kelas" class="col-sm-2 col-form-label input-group-label">Kelas</label>
                                                <div class="col-sm-4">
                                                    <input type="text" class="form-control" id="kelas" name="kelas" value="<?php echo  $row['kelas']; ?>" readonly>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="ekstra" class="col-sm-2 col-form-label input-group-label">Ekstrakurikuler</label>
                                                <div class="col-sm-4 mb-3">
                                                    <input type="text" class="form-control" id="ekstra" name="ekstra" value="<?php echo $row['ekstrakurikuler']; ?>" readonly>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label input-group-label">Kehadiran</label>
                                                <div class="col-sm-10">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="kehadiran" id="inlineRadio1" value="hadir">
                                                        <label class="form-check-label" for="inlineRadio1">Hadir</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="kehadiran" id="inlineRadio2" value="sakit">
                                                        <label class="form-check-label" for="inlineRadio2">Sakit</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="kehadiran" id="inlineRadio3" value="ijin">
                                                        <label class="form-check-label" for="inlineRadio3">Ijin</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="kehadiran" id="inlineRadio4" value="alpa">
                                                        <label class="form-check-label" for="inlineRadio4">Alpa</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-sm-10">
                                                    <button type="submit" class="btn btn-primary">Absen</button>
                                                </div>
                                            </div>
                                        </form>
                                    <?php
                                    } else {
                                        echo "<div class='centered-text' style= text-align:center;><h4>Absensi tidak tersedia</h4></div>";
                                    }
                                    //     } else {
                                    //         echo "<div class='centered-text' style= text-align:center;><h4>Anda sudah absensi</h4></div>";
                                    //     }
                                    // }
                                    ?>

                                    <?php

                                    require('../login/config.php');

                                    $User_id = $_SESSION['id_user'];
                                    $query = "SELECT * FROM ekstra_diikuti, buat_absensi WHERE buat_absensi.id_ekstra= '$_GET[id]' AND ekstra_diikuti.id_user= '$User_id' ";
                                    $result = mysqli_query($con, $query);
                                    $row = mysqli_fetch_assoc($result);


                                    // // Periksa jika metode request adalah POST
                                    // if ($_SERVER["REQUEST_METHOD"] == "POST") {
                                    //     $id_buat_absen = $row['id_buat_absen'];
                                    //     $id_user = $_POST['id'];
                                    //     $id_ekstra = $_GET['ekstra_id'];
                                    //     $kelas = $_POST['kelas'];
                                    //     $keterangan = $_POST['kehadiran'];

                                    //     // Query untuk menyimpan data absensi ke dalam tabel absensi
                                    //     $query = "INSERT INTO absensi (id_buat_absensi, id_user , id_ekstra, kelas, keterangan) VALUES ('$id_buat_absen', '$id_user', '$id_ekstra', '$kelas', '$keterangan')";

                                    //     // Jalankan query
                                    //     if (mysqli_query($con, $query)) {
                                    //         echo "Data absensi berhasil disimpan";
                                    //     } else {
                                    //         echo "Error: " . $query . "<br>" . mysqli_error($con);
                                    //     }
                                    // }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- End of Main Content -->
            </div>
            <!-- End of Content Wrapper -->

        </div>
        <!-- End of Page Wrapper -->

        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>

        <!-- Logout Modal-->
        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Apakah anda ingin keluar?</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <a class=btn style="background-color: #024040; color:white" href="../login/index.php">Logout</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bootstrap core JavaScript-->
        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!-- Core plugin JavaScript-->
        <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

        <!-- Custom scripts for all pages-->
        <script src="js/sb-admin-2.min.js"></script>

        <!-- Page level plugins -->
        <script src="vendor/chart.js/Chart.min.js"></script>

        <!-- Page level custom scripts -->
        <script src="js/demo/chart-area-demo.js"></script>
        <script src="js/demo/chart-pie-demo.js"></script>

</body>


</html>