<?php
session_start();
require '../koneksi.php';

// Set timezone ke WIB
date_default_timezone_set('Asia/Jakarta');

if (!isset($_SESSION['id_admin'])) {
    header('Location: ../masuk.php');
    exit();
}

$id_admin = $_SESSION['id_admin'];

$query = "SELECT aktivitas, DATE_FORMAT(waktu, '%H:%i') AS waktu, tanggal, ip FROM log_aktivitas WHERE id_admin = '$id_admin'";
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

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- AOS CSS -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <!-- DataTables CSS -->
    <link href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css" rel="stylesheet">

    <style>
        :root {
            --primary-gradient: linear-gradient(90deg, #2563eb 0%, #60a5fa 100%);
        }
        .bg-gradient-primary {
            background: var(--primary-gradient) !important;
        }
        .sidebar {
            background: var(--primary-gradient) !important;
        }
        .sidebar-brand-text { font-family: 'Montserrat', sans-serif; font-weight: 700; }
        .page-header { padding: 2rem 0 1rem 0; }
        .page-header h1 { font-weight: bold; margin-bottom: 1rem; }
        .gradient-text { background: var(--primary-gradient); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text; text-emphasis-color: transparent; }
        body, html { padding-top: 0 !important; margin-top: 0 !important; background: #f7f9fb !important; }
        #content-wrapper, .container-fluid, .page-header { margin-top: 0 !important; padding-top: 0 !important; }
        .container-fluid {
            background: #f7f9fb !important;
            border-radius: 18px;
            box-shadow: 0 4px 24px rgba(0,0,0,0.04);
            padding-bottom: 2rem;
        }
        .card, .card-body {
            background: #fff !important;
            border-radius: 18px !important;
            box-shadow: 0 2px 12px rgba(0,0,0,0.04);
        }
        .page-header h1 {
            color: #222;
            font-size: 2.5rem;
            font-weight: 700;
        }
        .page-header .gradient-text {
            background: linear-gradient(90deg, #2563eb 0%, #60a5fa 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        .page-header .subtitle {
            color: #888;
            font-size: 1.15rem;
            margin-bottom: 1.5rem;
        }
        .features-explore {
            background: #fff;
            color: #2563eb;
            border: none;
            border-radius: 999px;
            font-weight: 600;
            font-size: 1rem;
            padding: 0.4rem 1.2rem;
            margin-bottom: 1.2rem;
            box-shadow: 0 2px 8px rgba(37,99,235,0.07);
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }
        .features-explore:focus, .features-explore:hover {
            background: #f0f4ff;
            color: #2563eb;
            outline: none;
        }
    </style>
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar" data-aos="fade-right">

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
            <li class="nav-item active">
                <a class="nav-link" href="index.php">
                    <i class="fas fa-fw fa-cogs"></i>
                    <span>Administrator</span></a>
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
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow" data-aos="fade-down">
                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>
                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid" data-aos="fade-up">

                    <div class="page-header">
                        <button class="features-explore" data-aos="fade-up" data-aos-delay="100">⚡ History</button>
                        <h1 data-aos="fade-up" data-aos-delay="200">Riwayat <span class="gradient-text">Aktivitas</span></h1>
                        <p class="subtitle" data-aos="fade-up" data-aos-delay="300">Lihat riwayat aktivitas yang telah dilakukan oleh admin.</p>
                    </div>

                    <!-- Tabel Riwayat Aktivitas -->
                    <div class="card shadow mb-4" data-aos="fade-up" data-aos-delay="400">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Riwayat Aktivitas</h6>
                        </div>
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
            <footer data-aos="fade-up" data-aos-delay="500">
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
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>

    <!-- AOS JS -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <script>
        // Initialize AOS
        document.addEventListener('DOMContentLoaded', function() {
            AOS.init({
                duration: 1000,
                easing: 'ease-in-out',
                once: true,
                mirror: false
            });
        });
    </script>

</body>

</html>
