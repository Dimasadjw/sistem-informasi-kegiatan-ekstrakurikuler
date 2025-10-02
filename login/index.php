    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Login</title>

        <!-- Custom fonts for this template-->
        <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

        <!-- Custom styles for this template-->
        <link href="css/sb-admin-2.min.css" rel="stylesheet">
    </head>

    <body style="background-color: #024040;">


        <?php
        session_start();
        include 'config.php';

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $username = $_POST['username'];
            $password = $_POST['password'];

            // Query untuk memeriksa kredensial pengguna
            $sql = "SELECT * FROM tb_user WHERE username='$username' AND password='$password'";
            $result = $con->query($sql);

            // Jika hasilnya adalah 1, maka login berhasil
            if ($result) {
                $u = mysqli_fetch_assoc($result);

                if ($u) {
                    $_SESSION['id_user'] = $u['id_user'];
                    $_SESSION['nama'] = $u['nama'];
                    $_SESSION['role'] = $u['role'];

                    // Redirect ke halaman sesuai peran (role)
                    switch ($u['role']) {
                        case 'siswa':
                            header("Location: ../siswa/index.php");
                            break;
                        case 'pelatih':
                            header("Location: ../pelatih/index.php");
                            break;
                        case 'kesiswaan':
                            header("Location: ../kesiswaan/index.php");
                            break;
                        default:
                            echo "Role tidak valid.";
                    }
                }
            } else {
                echo "Login gagal. Silakan coba lagi.";
            }
        }
        ?>


        <!-- Your HTML code continues... -->

        <div class="container">
            <!-- Outer Row -->
            <div class="row justify-content-center">

                <div class="col-xl-5 col-lg-12 col-md-9">

                    <div class="card o-hidden border-0 shadow-lg my-5">
                        <div class="card-body p-0">
                            <!-- Nested Row within Card Body -->
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="p-5">
                                        <div class="text-center">
                                            <h1 class="h4 mb-5 text-dark">LOGIN</h1>
                                        </div>
                                        <form class="user" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                                            <div class="form-group">
                                                <input type="text" class="form-control form-control-user" name="username" placeholder="Masukkan Username" required>
                                            </div>
                                            <div class="form-group">
                                                <input type="password" class="form-control form-control-user" placeholder="Masukkan Password" name="password" required>
                                            </div>
                                            <button type="submit" name="login" class="btn btn-user btn-block mt-5" style="background-color: #024040; color:white;">
                                                Login
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
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

    </body>

    </html>