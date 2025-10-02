<?php
session_start();
require('../login/config.php')
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
                <div class="sidebar-brand-icon">
                    <img src="" alt="">
                </div>
            </a>

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="index.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Daftar Ekstrakurikuler</span></a>
            </li>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item ">
                <a class="nav-link collapsed" href="ekstradiikuti.php" aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Ekstra yang diikuti</span>
                </a>
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


                <div class="row ml-4 mr-4">
                    <div class="row">

                        <?php
                        // Lakukan query untuk mengambil data dari database
                        $sql = "SELECT * FROM tb_ekstra left join tb_user on tb_ekstra.id_user = tb_user.id_user";
                        $result = mysqli_query($con, $sql);

                        // Periksa apakah terdapat data yang diambil
                        if (mysqli_num_rows($result) > 0) {
                            // Loop melalui setiap baris data
                            while ($row = mysqli_fetch_assoc($result)) {
                        ?>

                                <div class="col-auto">
                                    <div class="card shadow">
                                        <div class="card-body shadow">
                                            <h5 class="card-title text-center"><?php echo $row['nama_ekstra']; ?></h5>
                                            <p class="card-text">Pelatih: <?php echo $row['nama']; ?></p>
                                            <p class="card-text">Hari: <?php echo $row['hari']; ?></p>
                                            <p class="card-text">Waktu: <?php echo $row['waktu']; ?></p>
                                            <a href="daftar_ekstra.php?ekstra_id=<?php echo $row['id']; ?>" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#daftarEkstra<?php echo $row['nama_ekstra']; ?>">Daftar</a>
                                        </div>
                                    </div>
                                </div>

                                <!-- modal daftar ekstra -->
                                <div class="modal fade" id="daftarEkstra<?php echo $row['nama_ekstra']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Daftar Ekstrakurikuler</h5>
                                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">×</span>
                                                </button>
                                            </div>
                                            <form method="POST" action="daftar_ekstra.php">
                                                <div class="modal-body">
                                                    <div class="form-group col-md-12 mb-3" style="color:black">
                                                        <label>Nama</label>
                                                        <input type="text" name="nama" class="form-control" value="<?php echo  $_SESSION['nama'] ?>" readonly>
                                                    </div>
                                                    <div class="form-group col-md-12 mb-3" style="color:black">
                                                        <label>Kelas</label>
                                                        <input type="text" name="kelas" class="form-control">
                                                    </div>
                                                    <div class="form-group col-md-12 mb-3" style="color:black">
                                                        <label>Ekstrakurikuler</label>
                                                        <input type="text" class="form-control" value="<?php echo $row['nama_ekstra']; ?>" readonly>
                                                    </div>
                                                    <input type="text" name="ekstra" class="form-control" value="<?php echo $row['id']; ?>" readonly hidden>
                                                </div>
                                                <div class="modal-footer">
                                                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                                    <button type="submit" class="btn btn-primary" name="daftar">Daftar</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!-- end modal daftar ekstra -->
                        <?php
                            }
                        } else {
                            echo "Tidak ada data yang ditemukan";
                        }
                        ?>

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