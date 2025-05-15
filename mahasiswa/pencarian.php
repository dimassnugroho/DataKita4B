<?php
// mahasiswa/index.php
session_start();
include('../koneksi.php');

// Cek apakah pengguna sudah login
if (!isset($_SESSION['is_logged_in']) || !$_SESSION['is_logged_in']) {
    header('Location: ../masuk.php');
    exit;
}

// Get student data
$nim = $_SESSION['nim']; // Assuming 'nim' is stored in session
$sql = "SELECT * FROM mahasiswa WHERE nim = '$nim'";
$result = $con->query($sql);

if ($result->num_rows > 0) {
    $student = $result->fetch_assoc();
} else {
    echo "No profile found!";
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Pencarian Mahasiswa</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
    
    <!-- Bootstrap and Font Awesome -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    
    <!-- Main styles CSS -->
    <link rel="stylesheet" href="../styles.css">
    
    <!-- DataTables -->
    <link href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    
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

            <li class="nav-item active">
                <a class="nav-link" href="pencarian.php">
                    <i class="fas fa-fw fa-search"></i>
                    <span>Pencarian</span></a>
            </li>

            <li class="nav-item">
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
                        <button class="features-explore">⚡ Data Mahasiswa</button>
                        <h1>Pencarian <span class="gradient-text">Mahasiswa</span></h1>
                        <p class="subtitle">Anda dapat mencari data mahasiswa berdasarkan nama atau NIM di halaman ini.</p>
                    </div>

                    <!-- Tabel Data Mahasiswa -->
                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Nama</th>
                                            <th>NIM</th>
                                            <th>Tanggal Lahir</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Alamat</th>
                                            <th>Telepon</th>
                                            <th>Kesukaan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    include('../koneksi.php');

                                    // Tentukan halaman saat ini
                                    $page = isset($_GET['page']) ? $_GET['page'] : 1;

                                    $query = "SELECT * FROM mahasiswa";
                                    if(isset($_GET['query'])) {
                                        $search_query = $_GET['query'];
                                        $query = "SELECT * FROM mahasiswa WHERE nama LIKE '%$search_query%' OR nim LIKE '%$search_query%'";
                                    }

                                    $result = $con->query($query);

                                    if ($result->num_rows > 0) {    
                                        while($row = $result->fetch_assoc()) {
                                            echo "<tr>";
                                            echo "<td>" . $row['nama'] . "</td>";
                                            echo "<td>" . $row['nim'] . "</td>";
                                            echo "<td>" . $row['tanggal_lahir'] . "</td>";
                                            echo "<td>" . $row['jenis_kelamin'] . "</td>";
                                            echo "<td><a href='https://www.google.com/maps?q=" . $row['latitude'] . ",+" . $row['longitude'] . "' target='_blank'>" . $row['alamat'] . "</a></td>";
                                            echo "<td>" . $row['telepon'] . "</td>";
                                            echo "<td>" . $row['kesukaan'] . "</td>";
                                            echo "</tr>";
                                        }
                                    } else {
                                        echo "<tr><td colspan='7'>Tidak ada data mahasiswa</td></tr>";
                                    }
                                    ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- End of Tabel Data Mahasiswa -->
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
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script>
        $(document).ready(function() {
            $('#dataTable').DataTable();
        });
    </script>
</body>
</html>
