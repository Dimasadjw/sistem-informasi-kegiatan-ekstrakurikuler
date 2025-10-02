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

    <title>Kesiswaan</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<!-- tambah data -->
<?php
// sambungkan ke database
include '../login/config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $namaEkstrakurikuler = $_POST['ekstrakurikuler'];
    $namaPelatih = $_POST['pelatih'];
    $hari = $_POST['hari'];
    $waktu = $_POST['waktu'];

    // Query untuk menambahkan data kedalam tabel ekstrakurikuler
    $query = "INSERT INTO tb_ekstra(nama_ekstra, id_user, hari, waktu) VALUES ('$namaEkstrakurikuler', '$namaPelatih', '$hari', '$waktu')";

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
<!-- end -->

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar" style="background-color: #024040;">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-text mx-3">Sistem Informasi Ekstrakurikuler</div>
            </a>

            <!-- Nav Item - Dashboard -->
            <li class="nav-item ">
                <a class="nav-link" href="index.php">
                    <i class="fas fa-home"></i>
                    <span>Dashboard</span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="ekstrakurikuler.php">
                    <i class="fas fa-user"></i>
                    <span>Ekstrakurikuler</span></a>
            </li>
            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Laporan</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
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
                            <a class="nav-link" href="login.php" data-toggle="modal" data-target="#logoutModal">
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


                <div class="d-flex justify-content-end mb-2 mr-5">
                    <button class=btn style="background-color: #024040; color:white" type="submit" data-toggle="modal" data-target="#tambahEkstra">
                        <i class="fas fa-plus"></i> Tambah
                    </button>
                </div>

                <!-- Modal tambah ekstra-->
                <form action="" method="POST">
                    <div class="modal fade" id="tambahEkstra" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" style="color:black" id="exampleModalLabel">Tambah Ekstrakurikuler</h5>
                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                <div class="form-group col-md-12 mb-3" style="color:black">
                                    <label>Nama Ekstrakurikuler</label>
                                    <input type="text" name="ekstrakurikuler" class="form-control" required>
                                </div>

                                <div class="form-group col-md-12 mb-3" style="color:black">
                                    <label>Pelatih</label>
                                    <select class="custom-select" name="pelatih">
                                        <option selected disabled>Pilih pelatih</option>

                                        <?php

                                        // Query untuk mengambil data ekstrakurikuler
                                        $q = "SELECT id_user, nama FROM tb_user where role= 'pelatih'";
                                        $r = mysqli_query($con, $q);

                                        // Tampilkan data dalam dropdown
                                        while ($dt = mysqli_fetch_assoc($r)) {
                                            echo "<option value=' $dt[id_user] '>$dt[nama]</option>";
                                        }

                                        // Tutup koneksi database
                                        mysqli_close($con);
                                        ?>

                                    </select>
                                </div>
                                <div class="form-group col-md-12 mb-3" style="color:black">
                                    <label>Hari</label>
                                    <select class="form-control" name="hari" required>
                                        <option value="" selected disabled>Pilih hari</option>
                                        <option value="Senin">Senin</option>
                                        <option value="Selasa">Selasa</option>
                                        <option value="Rabu">Rabu</option>
                                        <option value="Kamis">Kamis</option>
                                        <option value="Jumat">Jumat</option>
                                        <option value="Sabtu">Sabtu</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-12 mb-3" style="color:black">
                                    <label>Waktu</label>
                                    <input type="time" name="waktu" class="form-control" required>
                                </div>
                                <div class="modal-footer mr-2">
                                    <button class="btn btn-secondary" type="submit" data-dismiss="modal">Cancel</button>
                                    <button type="submit" class=btn style="background-color: #024040; color:white">Tambah</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <!-- end -->

                <!-- DataTales -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-gray-800">Data Ekstrakurikuler</h6>
                    </div>
                    <div class="card-body shadow">
                        <div class="table-responsive">
                            <table class="table table-striped" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Ekstrakurikuler</th>
                                        <th>Pelatih</th>
                                        <th>hari</th>
                                        <th>waktu</th>
                                        <th colspan="2">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    // Sambungkan ke database
                                    include '../login/config.php';

                                    // Query untuk mengambil data ekstrakurikuler beserta nama pelatih
                                    $query = "SELECT e.id, e.nama_ekstra, u.nama AS nama_pelatih, e.hari, e.waktu FROM tb_ekstra AS e INNER JOIN tb_user AS u ON e.id_user = u.id_user";
                                    $result = mysqli_query($con, $query);

                                    // Cek apakah query berhasil dieksekusi
                                    if ($result) {
                                        // Jika terdapat data, tampilkan dalam tabel
                                        if (mysqli_num_rows($result) > 0) {
                                            $no = 1; // Variable untuk penomoran baris
                                            while ($row = mysqli_fetch_assoc($result)) {
                                    ?>
                                                <tr>
                                                    <td><?= $no ?></td>
                                                    <td><?= $row['nama_ekstra'] ?></td>
                                                    <td><?= $row['nama_pelatih'] ?></td>
                                                    <td><?= $row['hari'] ?></td>
                                                    <td><?= $row['waktu'] ?></td>
                                                    <td><button class='btn btn-primary' data-toggle='modal' data-target='#editModal<?= $row['id'] ?>'>Edit</button></td>
                                                    <td><a class='btn btn-danger btn-hapus' href='hapus.php?id=<?= $row['id'] ?>'>Hapus</a></td>
                                                </tr>

                                                <!-- Modal edit untuk setiap baris data -->
                                                <div class='modal fade' id='editModal<?= $row['id'] ?>' tabindex='-1' role='dialog' aria-labelledby='editModalLabel' aria-hidden='true'>
                                                    <div class='modal-dialog' role='document'>
                                                        <div class='modal-content'>
                                                            <div class='modal-header'>
                                                                <h5 class='modal-title' id='editModalLabel'>Edit Ekstrakurikuler</h5>
                                                                <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                                                                    <span aria-hidden='true'>&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class='modal-body'>
                                                                <form action='editekstra.php' method='POST'>
                                                                    <input type='hidden' name='id' value='<?= $row['id'] ?>'>
                                                                    <div class='form-group'>
                                                                        <label for='nama_ekstra'>Ekstrakurikuler</label>
                                                                        <input type='text' class='form-control' id='nama_ekstra' name='nama_ekstra' value='<?= $row['nama_ekstra'] ?>'>
                                                                    </div>
                                                                    <div class='form-group'>
                                                                        <label for='pelatih'>Pelatih</label>
                                                                        <select class="custom-select" name="pelatih">
                                                                            <option selected disabled>Pilih pelatih</option>
                                                                            <?php
                                                                            // Query untuk mengambil data ekstrakurikuler
                                                                            $q = "SELECT id_user, nama FROM tb_user WHERE role = 'pelatih'";
                                                                            $r = mysqli_query($con, $q);

                                                                            // Tampilkan data dalam dropdown
                                                                            while ($dt = mysqli_fetch_assoc($r)) {
                                                                                echo "<option value='$dt[id_user]'>$dt[nama]</option>";
                                                                            }
                                                                            ?>
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>Hari</label>
                                                                        <select class="form-control" name="hari" required>
                                                                            <option selected disabled>Pilih hari</option>
                                                                            <option value="Senin">Senin</option>
                                                                            <option value="Selasa">Selasa</option>
                                                                            <option value="Rabu">Rabu</option>
                                                                            <option value="Kamis">Kamis</option>
                                                                            <option value="Jumat">Jumat</option>
                                                                            <option value="Sabtu">Sabtu</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>Waktu</label>
                                                                        <input type="time" name="waktu" class="form-control" value="<?= $row['waktu'] ?>" required>
                                                                    </div>
                                                                    <div class='d-grid gap-2 d-md-flex justify-content-md-end'>
                                                                        <button class='btn btn-secondary mr-2' type='button' data-dismiss='modal'>Cancel</button>
                                                                        <button type="submit" name="update" class="btn btn-primary">Update</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                    <?php
                                                $no++; // Increment nomor baris
                                            }
                                        } else {
                                            // Jika tidak ada data
                                            echo "<tr><td colspan='5'>Tidak ada data yang tersedia</td></tr>";
                                        }
                                    } else {
                                        // Jika query gagal dieksekusi
                                        echo "<tr><td colspan='5'>Error: " . mysqli_error($con) . "</td></tr>";
                                    }

                                    // Tutup koneksi database
                                    mysqli_close($con);
                                    ?>

                                </tbody>
                            </table>
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