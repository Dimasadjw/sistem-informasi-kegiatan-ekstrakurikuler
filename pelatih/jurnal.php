<?php
session_start();
require('../login/config.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Pelatih</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
</head>

<body id="page-top">

    <?php
    require('../login/config.php');

    // Proses form submission
    if (isset($_POST['submit'])) {
        // Tangkap data yang dikirim melalui POST
        $nama_pelatih = $_POST['nama'];
        $judul_jurnal = $_POST['judul'];
        $isi_jurnal = $_POST['isi'];
        $id_user = $_SESSION["id_user"];
        $nama_ekstra = $_POST['ekstra'];

        // Ambil id_ekstra dari database berdasarkan id_user
        $query = "SELECT * FROM tb_ekstra WHERE id_user = $id_user";
        $result = mysqli_query($con, $query);

        if ($result) {
            $ekstra = mysqli_fetch_assoc($result);
            $id_ekstra = $ekstra['id']; // Ambil id_ekstra dari hasil query
        } else {
            echo "Error: " . mysqli_error($con);
            exit(); // Stop eksekusi jika terjadi kesalahan
        }

        // Query untuk menyimpan data ke dalam database
        $query_insert = "INSERT INTO jurnal (id_user, id_ekstra, nama, ekstrakurikuler, judul, isi_jurnal) 
                     VALUES ('$id_user', '$id_ekstra', '$nama_pelatih', '$nama_ekstra', '$judul_jurnal', '$isi_jurnal')";

        // Eksekusi query insert
        if (mysqli_query($con, $query_insert)) {
            // Redirect ke halaman yang sama setelah data berhasil disimpan
            header("Location: jurnal.php");
            exit(); // Hentikan eksekusi skrip setelah melakukan redirect
        } else {
            echo '<script>alert("Gagal menyimpan data jurnal");</script>';
            echo "Error: " . mysqli_error($con);
        }
    }

    // Query untuk mengambil data jurnal dari database
    $query_select_jurnal = "SELECT * FROM jurnal WHERE id_user = " . $_SESSION['id_user'];
    $result_jurnal = mysqli_query($con, $query_select_jurnal);
    ?>


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
            <li class="nav-item">
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
            <li class="nav-item active">
                <a class="nav-link collapsed" href="jurnal.php" aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>Jurnal</span>
                </a>
            </li>

            <li class="nav-item022222dsa">
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
                        <li class="nav-tem dropdown no-arrow mx-1">
                            <a class="nav-link" href="logout.php" data-toggle="modal" data-target="#logoutModal">
                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 mt-4"></i>
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


                <h3 class="mb-4 ml-5 text-gray-800">Jurnal Ekstrakurikuler</h3>
                <div class="card ml-4 mr-4">
                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <form action="" method="POST">
                                <div class="row ml-2 mr-2">
                                    <div class="col-md-5 mb-3">
                                        <label>Nama Pelatih</label>
                                        <input type="text" name="nama" class="form-control" value="<?php echo  $_SESSION['nama'] ?>" readonly>
                                    </div>
                                    <div class="col-md-5 mb-3">
                                        <label>Ekstrakurikuler</label>

                                        <?php
                                        $id = $_SESSION["id_user"];
                                        // Ambil nama ekstrakurikuler dari database
                                        $r = $con->query("SELECT nama_ekstra FROM tb_ekstra WHERE id_user = $id");
                                        $nm  = $r->fetch_assoc();
                                        $nama_ekstra = $nm['nama_ekstra']; // Simpan nama ekstrakurikuler ke dalam variabel
                                        ?>

                                        <input type="text" name="ekstra" class="form-control" value="<?php echo $nm['nama_ekstra'] ?>" readonly>
                                    </div>
                                    <div class="form-floating col-md-10 mb-3">
                                        <label>Judul Jurnal</label>
                                        <textarea class="form-control" name="judul" id="floatingTextarea" required></textarea>
                                    </div>

                                    <div class="form-floating col-md-10 mb-3">
                                        <label>Isi Jurnal</label>
                                        <textarea class="form-control" name="isi" id="floatingTextarea" required></textarea>
                                    </div>
                                </div>
                                <div class="col-md-10 mb-3 ml-2">
                                    <button type="submit" name="submit" class=btn style="background-color: #024040; color:white">Submit</button>
                                </div>
                            </form>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped" id="dataTable" width="100%" cellspacing="0" style="background-color:  #024040; color: white">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama Pelatih</th>
                                                <th>Ekstrakurikuler</th>
                                                <th>tanggal</th>
                                                <th>Judul jurnal</th>
                                                <th>Isi Jurnal</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php
                                            $no = 1;
                                            while ($row = mysqli_fetch_assoc($result_jurnal)) {
                                            ?>
                                                <tr>
                                                    <td><?= $no++ ?></td>
                                                    <td><?= $_SESSION['nama'] ?></td>
                                                    <td><?= $nama_ekstra ?></td>
                                                    <td><?= $row['tanggal'] ?></td>
                                                    <td><?= $row['judul'] ?></td>
                                                    <td><?= $row['isi_jurnal'] ?></td>


                                                    <td>
                                                        <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editModal<?= $row['id_jurnal'] ?>">Edit</button>
                                                        <a href="hapus_jurnal.php?id=<?= $row['id_jurnal'] ?>" class="btn btn-danger btn-sm">Hapus</a>
                                                    </td>
                                                </tr>

                                                <!-- Modal Edit untuk setiap baris data -->
                                                <div class="modal fade" id="editModal<?= $row['id_jurnal'] ?>" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="editModalLabel">Edit Jurnal</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form action="edit_jurnal.php" method="POST">
                                                                    <input type="hidden" name="id_jurnal" value="<?= $row['id_jurnal'] ?>">
                                                                    <div class="form-group">
                                                                        <label>Judul Jurnal</label>
                                                                        <input type="text" class="form-control" name="judul" value="<?= $row['judul'] ?>">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>Isi Jurnal</label>
                                                                        <textarea class="form-control" name="isi"><?= $row['isi_jurnal'] ?></textarea>
                                                                    </div>
                                                            </div>
                                                            <div class="modal-footer d-grid justify-content-end">
                                                                <button class='btn btn-secondary mr-2' type='button' data-dismiss='modal'>Cancel</button>
                                                                <button type="submit" name="update" class="btn btn-primary">Update</button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php
                                            }
                                            ?>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
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
                    <h5 class="modal-title" style="color:black; " id="exampleModalLabel">Apakah anda ingin keluar?</h5>
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