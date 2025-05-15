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
$nim = $_SESSION['nim'];
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

    <title>Dashboard Mahasiswa</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
    
    <!-- Bootstrap and Font Awesome -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    
    <!-- Main styles CSS -->
    <link rel="stylesheet" href="../styles.css">
    
    <!-- Leaflet Maps -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
    <script src="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.css" />
    
    <style>
        /* Custom styles for this page */
        .bg-gradient-primary {
            background: var(--primary-gradient);
        }
        .sidebar-brand-text {
            font-family: 'Montserrat', sans-serif;
            font-weight: 700;
        }
        #map {
            height: 500px;
        }
        .suggestion-item {
            padding: 5px;
            cursor: pointer;
        }
        .suggestion-item:hover {
            background-color: #e9e9e9;
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
            <li class="nav-item active">
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
                        <button class="features-explore">⚡ Profil Anda</button>
                        <h1>Selamat Datang, <span class="gradient-text"><?php echo $student['nama']; ?></span></h1>
                        <p class="subtitle">Anda dapat melihat dan mengelola informasi data diri Anda di halaman ini.</p>
                    </div>

                    <!-- Profile Information -->
                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <?php
                                if (isset($_SESSION['message'])) {
                                    echo "<div class='alert alert-info alert-dismissible fade show' role='alert'>
                                            " . $_SESSION['message'] . "
                                            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                                <span aria-hidden='true'>&times;</span>
                                            </button>
                                        </div>";
                                    unset($_SESSION['message']);
                                }
                            ?>
                            <div class="table-responsive">
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <td><strong>Nama</strong></td>
                                            <td><?php echo $student['nama']; ?></td>
                                        </tr>
                                        <tr>
                                            <td><strong>NIM</strong></td>
                                            <td><?php echo $student['nim']; ?></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Tanggal Lahir</strong></td>
                                            <td><?php echo $student['tanggal_lahir']; ?></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Jenis Kelamin</strong></td>
                                            <td><?php echo $student['jenis_kelamin']; ?></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Alamat</strong></td>
                                            <td><a href="https://www.google.com/maps/place/<?php echo $student['latitude']; ?>,+<?php echo $student['longitude']; ?>" target="_blank"><?php echo $student['alamat']; ?></a></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Telepon</strong></td>
                                            <td><?php echo $student['telepon']; ?></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Kesukaan</strong></td>
                                            <td><?php echo $student['kesukaan']; ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <button class="btn features-btn-primary" data-toggle="modal" data-target="#editProfileModal" style="width: 110px;">Edit Profil</button>
                        </div>
                    </div>
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

    <!-- Edit Profile Modal -->
    <div class="modal fade" id="editProfileModal" tabindex="-1" role="dialog" aria-labelledby="editProfileModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editProfileModalLabel">Edit Profil</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="profil-edit.php" method="POST">
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $student['nama']; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="tanggal_lahir">Tanggal Lahir</label>
                            <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="<?php echo $student['tanggal_lahir']; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="jenis_kelamin">Jenis Kelamin</label>
                            <select class="form-control" id="jenis_kelamin" name="jenis_kelamin" required>
                                <option value="Laki-laki" <?php if($student['jenis_kelamin'] == 'Laki-laki') echo 'selected'; ?>>Laki-laki</option>
                                <option value="perempuan" <?php if($student['jenis_kelamin'] == 'perempuan') echo 'selected'; ?>>Perempuan</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <input type="text" class="form-control" id="alamat" name="alamat" value="<?php echo $student['alamat']; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="telepon">Telepon</label>
                            <input type="tel" class="form-control" id="telepon" name="telepon" value="<?php echo $student['telepon']; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="kesukaan">Kesukaan</label>
                            <input type="text" class="form-control" id="kesukaan" name="kesukaan" value="<?php echo $student['kesukaan']; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Password Baru (Biarkan kosong jika tidak ingin mengubah)</label>
                            <input type="password" class="form-control" id="password" name="password">
                        </div>
                        <input type="hidden" name="latitude" id="latitude" value="<?php echo $student['latitude']; ?>">
                        <input type="hidden" name="longitude" id="longitude" value="<?php echo $student['longitude']; ?>">
                        <div class="modal-footer">
                            <button type="button" class="btn features-btn-secondary" data-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn features-btn-primary">Simpan Perubahan</button>
                        </div>
                    </form>
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