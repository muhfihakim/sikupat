<?php
session_start();
if (empty($_SESSION['user_autentification'])) {
    echo '<script>alert("Anda belum login! Silakan login terlebih dahulu.");</script>';
    echo '<script>window.location.replace("../../index.php");</script>';
    die();
}
if ($_SESSION['user_autentification'] != "valid") {
    echo '<script>alert("Sesi tidak valid! Silakan login kembali.");</script>';
    echo '<script>window.location.replace("../../index.php");</script>';
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
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="../plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../dist/css/adminlte.min.css">
    <script src="../dist/js/moment.js"></script>
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="../dist/img/diskominfo.png" alt="Diskominfo Logo" width="280px" height="100px" />
        </div>
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="#Dibuat_Oleh_System_Support" class="nav-link">Sistem Informasi Kunjungan Pusat Data</a>
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
                    <a class="nav-link" href="../../logout.php" role="button">
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
                <img src="../dist/img/diskominfo.png" alt="Logo Diskominfo" class="brand-image elevation-3" />
                <span class="brand-text font-weight-light">SIKUPAT</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="../dist/img/user2-160x160.png" class="img-circle elevation-2" alt="User Image" />
                    </div>
                    <?php
                    session_start();

                    // Koneksi ke database
                    include '../koneksi.php';

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
                        <li class="nav-item">
                            <a href="../index.php" class="nav-link">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>Dashboard</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="kunjungan.php" class="nav-link active">
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
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title"><strong>Daftar Kunjungan Pusat Data</strong></h3>
                            <br>
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#previewHTML"><i class="fa fa-print"></i>
                                Cetak Laporan
                            </button>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="kunjungan1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th class="text-center">No</th>
                                            <th class="text-center">Nama</th>
                                            <th class="text-center">Instansi</th>
                                            <th class="text-center">Kota/Kab</th>
                                            <th class="text-center">Jenis</th>
                                            <th class="text-center">Identitas</th>
                                            <th class="text-center">No. Badge</th>
                                            <th class="text-center">Tgl</th>
                                            <th class="text-center">Masuk</th>
                                            <th class="text-center">Keluar</th>
                                            <th class="text-center">Tujuan</th>
                                            <th class="text-center">Prngkt. Masuk</th>
                                            <th class="text-center">Prngkt. Keluar</th>
                                            <th class="text-center">Ket</th>
                                            <th class="text-center">Lampiran</th>
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                </table>
                            </div>
                        </div>

                        <!-- Modal Preview -->
                        <div class="modal fade" id="previewHTML" tabindex="-1" role="dialog" aria-labelledby="previewHTMLLabel">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="#previewHTMLLabel"><i class="fa fa-print"></i>
                                            Cetak Laporan Berdasarkan</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form id="previewHTMLForm" method="get" action="preview.php" target="_blank">
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="dari">Dari Tanggal:</label>
                                                    <input type="date" id="dari" name="dari" class="form-control" required>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="ke">Ke Tanggal:</label>
                                                    <input type="date" id="ke" name="ke" class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-primary btn-block">Cetak</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Modal untuk Foto -->
                        <div class="modal fade" id="fotoModal" tabindex="-1" role="dialog" aria-labelledby="fotoModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="fotoModalLabel">Foto</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <img id="fotoImg" src="" class="img-fluid" alt="Foto">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Modal untuk TTD -->
                        <div class="modal fade" id="ttdModal" tabindex="-1" role="dialog" aria-labelledby="ttdModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="ttdModalLabel">TTD</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <img id="ttdImg" src="" class="img-fluid" alt="TTD">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <script src="../plugins/jquery/jquery.min.js"></script>
                        <script src="https://cdn.datatables.net/1.11.2/js/jquery.dataTables.min.js"></script>
                        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
                        <script>
                            $(document).ready(function() {
                                var table = $('#kunjungan1').DataTable({
                                    "ajax": "data.php",
                                    "columns": [{
                                            "data": "id",
                                            "render": function(data, type, row, meta) {
                                                return '<div class="text-center">' + (meta.row +
                                                    1) + '</div>';
                                            }
                                        },
                                        {
                                            "data": "nama"
                                        },
                                        {
                                            "data": "instansi"
                                        },
                                        {
                                            "data": "kotakab"
                                        },
                                        {
                                            "data": "jenisidentitas",
                                            "render": function(data, type, row) {
                                                return '<div class="text-center">' + data +
                                                    '</div>';
                                            }
                                        },
                                        {
                                            "data": "noidentitas"
                                        },
                                        {
                                            "data": "nobadge"
                                        },
                                        {
                                            "data": "tanggal",
                                            "render": function(data, type, row) {
                                                return '<div class="text-center">' + moment(data)
                                                    .format("DD-MM-YYYY") + '</div>';
                                            }
                                        },
                                        {
                                            "data": "jammasuk",
                                            "render": function(data, type, row) {
                                                return '<div class="text-center">' + moment(data,
                                                    "HH:mm:ss").format("HH:mm") + '</div>';
                                            }
                                        },
                                        {
                                            "data": "jamkeluar",
                                            "render": function(data, type, row) {
                                                return '<div class="text-center">' + moment(data,
                                                    "HH:mm:ss").format("HH:mm") + '</div>';
                                            }
                                        },
                                        {
                                            "data": "tujuan"
                                        },
                                        {
                                            "data": "masukperangkat"
                                        },
                                        {
                                            "data": "keluarperangkat"
                                        },
                                        {
                                            "data": "ket"
                                        },
                                        {
                                            "data": null,
                                            "render": function(data, type, row) {
                                                var lampiranHtml = '';
                                                if (row.ttd && row.foto) {
                                                    lampiranHtml += '<div class="text-center">' +
                                                        '<button class="btn btn-primary btn-sm foto-btn" data-toggle="modal" data-target="#fotoModal" data-foto="' +
                                                        row.foto + '">Foto</button> ' +
                                                        '<button class="btn btn-primary btn-sm ttd-btn" data-toggle="modal" data-target="#ttdModal" data-ttd="' +
                                                        row.ttd + '">TTD</button>' +
                                                        '</div>';
                                                } else {
                                                    lampiranHtml = "Tidak Lengkap";
                                                }
                                                return lampiranHtml;
                                            }
                                        }
                                    ],
                                    "language": {
                                        "url": "//cdn.datatables.net/plug-ins/1.13.5/i18n/id.json"
                                    },
                                    "responsive": true,
                                    "lengthMenu": [10, 30, 50,
                                        100
                                    ] // Menampilkan opsi total entri yang dapat dipilih
                                });

                                // Fungsi untuk menampilkan gambar foto dalam modal
                                $('#kunjungan1').on('click', '.foto-btn', function() {
                                    var foto = $(this).data('foto');
                                    var fotoUrl = '../../daftar_hadir/' + foto;
                                    $('#fotoImg').attr('src', fotoUrl);
                                });

                                // Fungsi untuk menampilkan gambar TTD dalam modal
                                $('#kunjungan1').on('click', '.ttd-btn', function() {
                                    var ttd = $(this).data('ttd');
                                    var ttdUrl = '../../daftar_hadir/' + ttd;
                                    $('#ttdImg').attr('src', ttdUrl);
                                });
                            });
                        </script>

                        <!-- /.card-body -->
                    </div>
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
    </div>
    <!-- Load required libraries -->
    <script src="../dist/js/jquery.min.js"></script>
    <!-- jQuery -->
    <script src="../plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- DataTables  & Plugins -->
    <script src="../plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="../plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="../plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="../plugins/pdfmake/vfs_fonts.js"></script>
    <script src="../plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="../plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="../plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
    <!-- SIKUPAT -->
    <script src="../dist/js/adminlte.min.js"></script>
    <script disable-devtool-auto src="../dist/js/disable-devtool.js"></script>
</body>

</html>