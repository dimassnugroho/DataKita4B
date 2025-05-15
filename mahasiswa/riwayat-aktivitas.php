<?php
session_start();
require '../koneksi.php';

// Set timezone ke WIB
date_default_timezone_set('Asia/Jakarta');

if (!isset($_SESSION['id_mahasiswa'])) {
    header('Location: ../masuk.php');
    exit();
}

$id_mahasiswa = $_SESSION['id_mahasiswa'];

$query = "SELECT aktivitas, DATE_FORMAT(waktu, '%H:%i') AS waktu, tanggal, ip FROM log_aktivitas WHERE id_mahasiswa = '$id_mahasiswa'";
$result = mysqli_query($con, $query);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Riwayat Aktivitas</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
    
    <!-- Bootstrap and Font Awesome -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    
    <!-- Main styles CSS -->
    <link rel="stylesheet" href="../styles.css">
    
    <!-- DataTables CSS -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    
    <style>
        /* Custom styles for this page */
        .bg-gradient-primary {
            background: var(--primary-gradient);
        }
        .sidebar-brand-text {
            font-family: 'Montserrat', sans-serif;
            font-weight: 700;
        }
        .page-header {
            padding: 2rem 0 1rem 0;
        }
        .page-header h1 {
            font-weight: bold;
            margin-bottom: 1rem;
        }
        .gradient-text {
            background: var(--primary-gradient);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            text-emphasis-color: transparent;
        }
        body, html {
            padding-top: 0 !important;
            margin-top: 0 !important;
        }
        #content-wrapper, .container-fluid, .page-header {
            margin-top: 0 !important;
            padding-top: 0 !important;
        }
    </style>
</head>

<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
                <div class="sidebar-brand-icon">
                    <i class="fas fa-user-graduate"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Data<span style="color: #fff;">Kita</span></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="index.php">
                    <i class="fas fa-fw fa-user"></i>
                    <span>Profil Mahasiswa</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Fitur
            </div>

            <li class="nav-item">
                <a class="nav-link" href="pencarian.php">
                    <i class="fas fa-fw fa-search"></i>
                    <span>Pencarian</span></a>
            </li>

            <li class="nav-item active">
                <a class="nav-link" href="riwayat-aktivitas.php">
                    <i class="fas fa-fw fa-history"></i>
                    <span>History</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="../keluar.php">
                    <i class="fas fa-fw fa-sign-out-alt"></i>
                    <span>Keluar</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

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
                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Page Header -->
                    <div class="page-header">
                        <button class="features-explore">⚡ Aktivitas</button>
                        <h1>Riwayat <span class="gradient-text">Aktivitas</span></h1>
                        <p class="subtitle">Berikut adalah catatan aktivitas yang telah Anda lakukan pada platform ini.</p>
                    </div>

                    <!-- Tabel Riwayat Aktivitas -->
                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Aktivitas</th>
                                            <th>Tanggal</th>
                                            <th>Waktu</th>
                                            <th>IP Address</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        if ($result && mysqli_num_rows($result) > 0) {
                                            while ($row = mysqli_fetch_assoc($result)) {
                                                echo "<tr>";
                                                echo "<td>" . $row['aktivitas'] . "</td>";
                                                echo "<td>" . $row['tanggal'] . "</td>";
                                                echo "<td>" . $row['waktu'] . "</td>";
                                                echo "<td>" . $row['ip'] . "</td>";
                                                echo "</tr>";
                                            }
                                        } else {
                                            echo "<tr><td colspan='4'>Tidak ada riwayat aktivitas</td></tr>";
                                        }
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- End of Tabel Riwayat Aktivitas -->
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer>
                <p>© 2025 DataKita. All rights reserved.</p>
            </footer>
            <!-- End of Footer -->
        </div>
        <!-- End of Content Wrapper -->
    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script>
        $(document).ready(function() {
            $('#dataTable').DataTable();
        });
    </script>
</body>
</html>
