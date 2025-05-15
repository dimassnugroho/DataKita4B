<?php
// admin/index.php
session_start();
include('../koneksi.php');

// Cek apakah pengguna sudah login
if (!isset($_SESSION['is_logged_in']) || !$_SESSION['is_logged_in']) {
    header('Location: ../masuk.php');
    exit;
}

// Get admin data
$id_admin = $_SESSION['id_admin']; 
$sql = "SELECT * FROM akun WHERE id_admin = '$id_admin'";
$result = $con->query($sql);

if ($result->num_rows > 0) {
    $admin = $result->fetch_assoc();
} else {
    echo "Silahkan masuk terlebih dahulu!";
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
    <title>Dashboard Admin</title>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
    <!-- Bootstrap and Font Awesome -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <!-- AOS CSS -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <!-- Main styles CSS -->
    <link rel="stylesheet" href="../styles.css">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
    <script src="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.css" />
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
        .page-header { padding: 2rem 0 1rem 0; margin-top: 1.5rem; }
        .page-header h1 { font-weight: bold; margin-bottom: 1rem; }
        .gradient-text { background: var(--primary-gradient); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text; text-emphasis-color: transparent; }
        body, html { padding-top: 0 !important; margin-top: 0 !important; }
        #content-wrapper, .container-fluid, .page-header { margin-top: 0 !important; padding-top: 0 !important; }
        .container-fluid {
            margin-top: 2.5rem !important;
            background: #f7f9fb !important;
            border-radius: 18px;
            box-shadow: 0 4px 24px rgba(0,0,0,0.04);
            padding-bottom: 2rem;
        }
    </style>
</head>
<body id="page-top">
    <div id="wrapper">
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar" data-aos="fade-right">
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
                <div class="sidebar-brand-icon">
                    <i class="fas fa-user-graduate"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Data<span style="color: #fff;">Kita</span></div>
            </a>
            <hr class="sidebar-divider my-0">
            <li class="nav-item active">
                <a class="nav-link" href="index.php">
                    <i class="fas fa-fw fa-cogs"></i>
                    <span>Administrator</span></a>
            </li>
            <hr class="sidebar-divider">
            <div class="sidebar-heading">Fitur</div>
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
            <hr class="sidebar-divider d-none d-md-block">
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
        </ul>
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <div class="container-fluid" data-aos="fade-up">
                    <div class="page-header">
                        <button class="features-explore" data-aos="fade-up" data-aos-delay="100">⚡ Admin</button>
                        <h1 data-aos="fade-up" data-aos-delay="200">Selamat Datang, <span class="gradient-text"><?php echo $admin['username']; ?></span></h1>
                        <p class="subtitle" data-aos="fade-up" data-aos-delay="300">Kelola data mahasiswa dan aktivitas pengguna melalui dashboard admin ini.</p>
                    </div>
                    <?php
                    if (isset($_SESSION['message'])) {
                        echo "<div class='alert alert-info' data-aos='fade-up' data-aos-delay='400'>" . $_SESSION['message'] . "</div>";
                        unset($_SESSION['message']);
                    }
                    ?>
                    <div class="card mb-4" data-aos="fade-up" data-aos-delay="500">
                        <div class="card-body">
                            <p><strong>Username:</strong> <?php echo $admin['username']; ?></p>
                            <button class="btn features-btn-primary" data-toggle="modal" data-target="#editProfileModal" style="width: 150px;">Edit Profil Admin</button>
                        </div>
                    </div>
                </div>
            </div>
            <footer data-aos="fade-up" data-aos-delay="600">
                <p>© 2025 DataKita. All rights reserved.</p>
            </footer>
        </div>
    </div>
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
    <div class="modal fade" id="editProfileModal" tabindex="-1" role="dialog" aria-labelledby="editProfileModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form method="POST" action="admin-edit.php">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editProfileModalLabel">Edit Profil Admin</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" id="username" name="username" value="<?php echo $admin['username']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="password">Password Baru</label>
                            <input type="password" class="form-control" id="password" name="password" autocomplete="new-password">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn features-btn-secondary" data-dismiss="modal">Batal</button>
                            <button type="submit" class="btn features-btn-primary">Simpan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="js/sb-admin-2.min.js"></script>
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