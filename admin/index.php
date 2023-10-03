<?php
session_start();
if (empty($_SESSION['user_autentification'])) {
    echo '<script>alert("Anda belum login! Silakan login terlebih dahulu.");</script>';
    echo '<script>window.location.replace("../index.php");</script>';
    die();
}
if ($_SESSION['user_autentification'] != "valid") {
    echo '<script>alert("Sesi tidak valid! Silakan login kembali.");</script>';
    echo '<script>window.location.replace("../index.php");</script>';
    die();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>SIKUPAT | Diskominfo</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="./plugins/fontawesome-free/css/all.min.css" />
    <!-- Ionicons -->
    <link rel="stylesheet" href="./dist/css/ionicons.min.css" />
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="./plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css" />
    <!-- iCheck -->
    <link rel="stylesheet" href="./plugins/icheck-bootstrap/icheck-bootstrap.min.css" />
    <!-- JQVMap -->
    <link rel="stylesheet" href="./plugins/jqvmap/jqvmap.min.css" />
    <!-- Theme style -->
    <link rel="stylesheet" href="./dist/css/adminlte.min.css" />
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="./plugins/overlayScrollbars/css/OverlayScrollbars.min.css" />
    <!-- Daterange picker -->
    <link rel="stylesheet" href="./plugins/daterangepicker/daterangepicker.css" />
    <!-- summernote -->
    <link rel="stylesheet" href="./plugins/summernote/summernote-bs4.min.css" />
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src=" dist/img/diskominfo.png" alt="Diskominfo Logo" width="280px" height="100px" />
        </div>

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="index3.html" class="nav-link">Sistem Informasi Kunjungan Pusat Data</a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Notifications Dropdown Menu -->
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <span>Dikelola Oleh Tim Infratek</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../logout.php" role="button">
                        <i class="fas fa-sign-out-alt"></i>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="index3.html" class="brand-link">
                <img src="dist/img/diskominfo.png" alt="Logo Diskominfo" class="brand-image elevation-3" />
                <span class="brand-text font-weight-light">SIKUPAT</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="dist/img/user2-160x160.png" class="img-circle elevation-2" alt="User Image" />
                    </div>
                    <?php
                    session_start();

                    // Koneksi ke database
                    include './koneksi.php';

                    // Mengambil data user yang sedang login
                    $username = $_SESSION['username'];
                    $query = mysqli_query($koneksi, "SELECT * FROM user WHERE user='$username'");
                    $user = mysqli_fetch_array($query);

                    ?>
                    <div class="info">
                        <a href="#" class="d-block"><?php echo $user['nama']; ?></a>
                    </div>
                </div>

                <!-- SidebarSearch Form -->
                <div class="form-inline">
                    <div class="input-group" data-widget="sidebar-search">
                        <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search" />
                        <div class="input-group-append">
                            <button class="btn btn-sidebar">
                                <i class="fas fa-search fa-fw"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                        <li class="nav-item menu-open">
                            <a href="#" class="nav-link active">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>Dashboard</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/kunjungan.php" class="nav-link">
                                <i class="nav-icon fas fa-table"></i>
                                <p>List Kunjungan</p>
                            </a>
                        </li>
                        <li class="nav-header">DISKOMINFO</li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Dashboard</h1>
                        </div>
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <!-- Small boxes (Stat box) -->
                    <div class="row">
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-info">
                                <div class="inner">
                                    <?php
                                    // Koneksi ke database
                                    include 'koneksi.php';

                                    // Mendapatkan tanggal saat ini
                                    $tanggalSekarang = date('Y-m-d');

                                    // Query untuk menghitung jumlah data pada tanggal saat ini
                                    $sql = "SELECT COUNT(*) AS total FROM sikupat WHERE tanggal = '$tanggalSekarang'";
                                    $result = $koneksi->query($sql);

                                    if ($result) {
                                        // Mendapatkan hasil query
                                        $row = $result->fetch_assoc();
                                        $totalData = $row['total'];
                                        // Menampilkan total data dalam elemen <h3>
                                        echo '<div class="inner">';
                                        echo '<h3>' . $totalData . '</h3>';
                                        echo '<p>Kunjungan</p>';
                                        echo '</div>';
                                    } else {
                                        echo "Error: " . $koneksi->error;
                                    }

                                    $koneksi->close();
                                    ?>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-sign-in-alt"></i>
                                </div>
                                <a href="#" class="small-box-footer">Hari Ini <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-success">
                                <?php
                                // Koneksi ke database
                                include 'koneksi.php';

                                // Mendapatkan tanggal awal dan akhir minggu saat ini
                                $mingguSekarang = date('W');
                                $tahunSekarang = date('Y');

                                // Menghitung tanggal awal dan akhir minggu saat ini
                                $firstDayOfWeek = date('Y-m-d', strtotime($tahunSekarang . 'W' . $mingguSekarang));
                                $lastDayOfWeek = date('Y-m-d', strtotime($tahunSekarang . 'W' . $mingguSekarang . '7'));

                                // Query untuk menghitung jumlah data pada minggu saat ini
                                $sql = "SELECT COUNT(*) AS total FROM sikupat WHERE tanggal >= '$firstDayOfWeek' AND tanggal <= '$lastDayOfWeek'";
                                $result = $koneksi->query($sql);

                                if ($result) {
                                    // Mendapatkan hasil query
                                    $row = $result->fetch_assoc();
                                    $totalData = $row['total'];

                                    // Menampilkan total data dalam elemen <h3>
                                    echo '<div class="inner">';
                                    echo '<h3>' . $totalData . '</h3>';
                                    echo '<p>Keluar/Masuk</p>';
                                    echo '</div>';
                                } else {
                                    echo "Error: " . $koneksi->error;
                                }

                                $koneksi->close();
                                ?>

                                <div class="icon">
                                    <i class="fas fa-sign-in-alt"></i>
                                </div>
                                <a href="#" class="small-box-footer">Minggu Ini <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-warning">
                                <?php
                                // Koneksi ke database
                                include 'koneksi.php';

                                // Mendapatkan bulan dan tahun saat ini
                                $bulanSekarang = date('m');
                                $tahunSekarang = date('Y');

                                // Query untuk menghitung jumlah data pada bulan dan tahun saat ini
                                $sql = "SELECT COUNT(*) AS total FROM sikupat WHERE MONTH(tanggal) = '$bulanSekarang' AND YEAR(tanggal) = '$tahunSekarang'";
                                $result = $koneksi->query($sql);

                                if ($result) {
                                    // Mendapatkan hasil query
                                    $row = $result->fetch_assoc();
                                    $totalData = $row['total'];

                                    // Menampilkan total data dalam elemen <h3>
                                    echo '<div class="inner">';
                                    echo '<h3>' . $totalData . '</h3>';
                                    echo '<p>Keluar/Masuk</p>';
                                    echo '</div>';
                                } else {
                                    echo "Error: " . $koneksi->error;
                                }

                                $koneksi->close();
                                ?>
                                <div class="icon">
                                    <i class="fas fa-sign-in-alt"></i>
                                </div>
                                <a href="#" class="small-box-footer">Bulan Ini <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-danger">
                                <div class="inner">
                                    <h3>???</h3>

                                    <p>Comingsoon</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-sign-in-alt"></i>
                                </div>
                                <a href="#" class="small-box-footer">??? <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->

                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <footer class="main-footer">
            <strong>
                <a href="https://subang.go.id">Pemerintah Daerah Kab. Subang</a>.</strong>
            Diskominfo
            <div class="float-right d-none d-sm-inline-block">
                <b>Version</b> 1.0.0
            </div>
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="plugins/jquery-ui/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge("uibutton", $.ui.button);
    </script>
    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Summernote -->
    <script src="plugins/summernote/summernote-bs4.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- SIKUPAT -->
    <script src="dist/js/adminlte.js"></script>
    <script disable-devtool-auto src="dist/js/disable-devtool.js"></script>
</body>

</html>