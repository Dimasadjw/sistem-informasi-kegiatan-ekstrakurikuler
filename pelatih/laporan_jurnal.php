<?php
session_start();
require('../login/config.php');


$tanggal_mulai = "";
$tanggal_selesai = "";

?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Kesiswaan</title>

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
        <ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar" style="background-color:  #024040;">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon">
                    <img src="" alt="">
                </div>
            </a>

            <!-- Nav Item - Dashboard -->
            <li class="nav-item ">
                <a class="nav-link" href="index.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item ">
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
            <li class="nav-item active">
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
                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-tem dropdown no-arrow mx-1 mt-3">
                            <a class="nav-link" href="index.php" data-toggle="modal" data-target="#logoutModal">
                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2"></i>
                                Logout
                            </a>
                        </li>

                        <div class="topbar-divider d-none d-sm-block"></div>

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
                    <!-- Page Heading -->
                    <div class="d-flex justify-content-end mb-2 mr-5">

                    </div>

                    <div class="card mb-3">
                        <div class="card-body">
                            <form method="POST" action="">
                                <div class=row style="color:black">
                                    <div class="col md-3 mb-3">
                                        <label>Tanggal Mulai</label>
                                        <input type="date" name="tanggal_mulai" class="form-control">
                                    </div>
                                    <div class="col md-3 mb-3">
                                        <label>Tanggal selesai</label>
                                        <input type="date" name="tanggal_selesai" class="form-control">
                                    </div>

                                    <!-- <div class="col md-3 mb-3">
                                        <label>Ekstra</label>
                                        <select class="custom-select" name="ekstrakurikuler">
                                            <option selected disabled>Pilih Ekstrakurikuler</option> -->

                                    <?php
                                    // include '../login/config.php';

                                    // // Query untuk mengambil data ekstrakurikuler
                                    // $query = "SELECT id, nama_ekstra FROM tb_ekstra";
                                    // $result = mysqli_query($con, $query);

                                    // // Periksa apakah query berhasil dieksekusi
                                    // if (!$result) {
                                    //     echo "Error: " . $query . "<br>" . mysqli_error($con);
                                    //     exit();
                                    // }

                                    // // Tampilkan data dalam dropdown
                                    // while ($row = mysqli_fetch_assoc($result)) {
                                    //     echo "<option value='" . $row['nama_ekstra'] . "'>" . $row['nama_ekstra'] . "</option>";
                                    // }

                                    // // Tutup koneksi database
                                    // mysqli_close($con);
                                    ?>

                                    <!-- </select>
                                    </div> -->
                                    <div class="col-md-10 mb-3">
                                        <button type="submit" name="submit" class=btn style="background-color: #024040; color:white">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-gray-800">Laporan Bulanan</h6>
                        </div>
                        <div class="card-body shadow">
                            <div class="table-responsive">
                                <table class="table table-striped" id="dataTable" width="100%" cellspacing="0" style="color:black">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name Pelatih</th>
                                            <th>Ekstrakurikuler</th>
                                            <th>Tanggal</th>
                                            <th>Judul</th>
                                            <th>Isi</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php
                                        include '../login/config.php';

                                        if (isset($_POST['submit'])) {
                                            // Pastikan data form telah dikirimkan dan tersedia
                                            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                                                // Ambil nilai dari form
                                                $tanggal_mulai = $_POST['tanggal_mulai'];
                                                $tanggal_selesai = $_POST['tanggal_selesai'];

                                                
                                            if ($tanggal_mulai > $tanggal_selesai) {
                                                // alert('error', 'Tanggal mulai tidak dapat lebih besar dari tanggal selesai!');
                                            } elseif ($tanggal_mulai == $tanggal_selesai) {
                                                // alert('error', 'Tanggal tidak dapat sama!');
                                            } else {

                                            }
                                         }
                                        }
                                        $id_user = $_SESSION['id_user'];
                                        $query = "SELECT * FROM jurnal a join tb_ekstra b on a.id_ekstra = b.id WHERE a.tanggal BETWEEN '$tanggal_mulai' AND '$tanggal_selesai' AND b.id_user = $id_user";
                                        $result = mysqli_query($con, $query);

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
                        </div>
                    </div>

                    <a href="cetaklaporan.php?tanggal_mulai=<?php echo $tanggal_mulai ?>&tanggal_selesai=<?php echo $tanggal_selesai ?>&ekstrakurikuler=<?php echo $ekstrakurikuler_id ?>" class=" d-none d-sm-inline-block btn btn-sm shadow-sm " target="_blank" style="background-color: #024040; color:white">
                        <i class="fas fa-download fa-sm"></i> Cetak Laporan</a>
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