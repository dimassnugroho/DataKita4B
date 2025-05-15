<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Masuk</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
<body>
<header>
    <nav class="main-sticky-navbar">
      <div class="navbar-container">
        <div class="logo" data-aos="fade-right" data-aos-duration="1000">Data<span>Kita</span></div>
        <div class="navbar-buttons" data-aos="fade-left" data-aos-duration="1000">
          <a href="index.php" class="btn features-btn-secondary">Kembali</a>
        </div>
      </div>
    </nav>
</header>

<section class="p-3 p-md-4 p-xl-5">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-12 col-xxl-11">
        <div class="card border-light-subtle shadow-sm">
          <div class="row g-0">
            <div class="col-12 col-md-6" data-aos="fade-right" data-aos-duration="1000">
              <img class="img-fluid rounded-start w-100 h-100 object-fit-cover" loading="lazy" src="assets/img/hero-login.jpg" alt="Welcome back you've been missed!">
            </div>
            <div class="col-12 col-md-6 d-flex align-items-center justify-content-center" data-aos="fade-left" data-aos-duration="1000" data-aos-delay="200">
              <div class="col-12 col-lg-11 col-xl-10">
                <div class="card-body p-3 p-md-4 p-xl-5">
                  <div class="row">
                    <div class="col-12">
                      <div class="mb-5 text-center">
                        <button class="features-explore" data-aos="fade-up" data-aos-delay="400">⚡ Akses Akun</button>
                        <h1 style="font-weight: bold;" data-aos="fade-up" data-aos-delay="500">Masuk ke Dashboard <span class="gradient-text">DataKita</span></h1>
                        <p class="subtitle" data-aos="fade-up" data-aos-delay="600">Masukkan informasi NIM dan password anda untuk mengakses dashboard dan mengelola data mahasiswa.</p>
                        <?php
                          session_start();
                          if (isset($_SESSION['error'])) {
                              echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                      ' . $_SESSION['error'] . '
                                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>';
                              unset($_SESSION['error']); // Hapus pesan kesalahan dari session setelah ditampilkan
                          }
                          ?>
                      </div>
                    </div>
                  </div>
                  <form action="masuk-proses.php" method="POST">
                    <div class="row gy-3 overflow-hidden">
                      <div class="col-12" data-aos="fade-up" data-aos-delay="700">
                        <div class="form-floating mb-3">
                          <input type="text" class="form-control" name="nim" id="nim" placeholder="Username / NIM" required>
                          <label for="nim" class="form-label">Username / NIM</label>
                        </div>
                      </div>
                      <div class="col-12" data-aos="fade-up" data-aos-delay="800">
                        <div class="form-floating mb-3">
                          <input type="password" class="form-control" name="password" id="password" value="" placeholder="Password" required>
                          <label for="password" class="form-label">Password</label>
                        </div>
                      </div>
                      <div class="col-12" data-aos="fade-up" data-aos-delay="900">
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" value="" name="remember_me" id="remember_me">
                          <label class="form-check-label text-secondary" for="remember_me">
                            Biarkan saya tetap masuk
                          </label>
                        </div>
                      </div>
                      <div class="col-12" data-aos="fade-up" data-aos-delay="1000">
                        <div class="d-grid">
                          <button class="btn features-btn-primary btn-lg" type="submit"><i class="ri-login-circle-line"></i> Masuk</button>
                        </div>
                      </div>
                    </div>
                  </form>
                  <div class="row">
                    <div class="col-12">
                      <div class="d-flex gap-2 gap-md-1 flex-column flex-md-row justify-content-md-center mt-5" data-aos="fade-up" data-aos-delay="1100">
                        <p>Belum ada akun?</p>
                        <a href="daftar.php" class="link-secondary text-decoration-none">Buat akun disini!</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<footer data-aos="fade-up" data-aos-delay="1200">
  <p>© 2025 DataKita. All rights reserved.</p>
</footer>

<script src="assets/js/main.js"></script>
<script src="https://unpkg.com/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
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