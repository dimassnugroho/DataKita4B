<?php
require 'koneksi.php';
require 'components/skeleton-loader.php';
  if (isset($_GET['q'])) {
    $q = $_GET['q'];

    $sql = "SELECT id, nama, nim, alamat FROM mahasiswa WHERE nama LIKE '%$q%' OR nim LIKE '%$q%' OR alamat LIKE '%$q%'";
    $result = $con->query($sql);

    $suggestions = array();
    while ($row = $result->fetch_assoc()) {
      $suggestions[] = $row;
    }

    echo json_encode($suggestions);
    exit();
  }

  $con->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>DataKita Landing Page</title>
  <!-- CSS Files -->
  <link rel="stylesheet" href="styles.css" />
  <link rel="stylesheet" href="skeleton-loader.css" />
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  
  <!-- Preload JavaScript -->
  <script>
    // Hide content immediately before any rendering
    document.documentElement.style.visibility = 'hidden';
  </script>
</head>
<body>
  <!-- Skeleton Loader -->
  <div class="skeleton-loader" id="skeletonLoader">
    <div class="skeleton-content">
      <!-- Navbar Skeleton -->
      <div class="skeleton-navbar">
        <div class="skeleton-logo"></div>
        <div class="skeleton-nav-items">
          <div class="skeleton-nav-item"></div>
          <div class="skeleton-nav-item"></div>
          <div class="skeleton-nav-item"></div>
          <div class="skeleton-nav-item"></div>
        </div>
        <div class="skeleton-nav-buttons">
          <div class="skeleton-button-small"></div>
          <div class="skeleton-button-small"></div>
        </div>
      </div>

      <!-- Hero Section Skeleton -->
      <div class="skeleton-hero-section">
        <div class="skeleton-hero-content">
          <div class="skeleton-badge"></div>
          <div class="skeleton-hero-title"></div>
          <div class="skeleton-hero-text"></div>
          <div class="skeleton-hero-text"></div>
          <div class="skeleton-button-medium"></div>
        </div>
        <div class="skeleton-hero-image"></div>
      </div>

      <!-- About Section Skeleton -->
      <div class="skeleton-about-section">
        <div class="skeleton-badge"></div>
        <div class="skeleton-section-title"></div>
        <div class="skeleton-section-text"></div>
        <div class="skeleton-section-text"></div>
      </div>

      <!-- Features Section Skeleton -->
      <div class="skeleton-features-section">
        <div class="skeleton-features-grid">
          <div class="skeleton-feature-card"></div>
          <div class="skeleton-feature-card"></div>
          <div class="skeleton-feature-card"></div>
        </div>
      </div>

      <!-- Access Section Skeleton -->
      <div class="skeleton-access-section">
        <div class="skeleton-access-content">
          <div class="skeleton-badge"></div>
          <div class="skeleton-section-title"></div>
          <div class="skeleton-tabs">
            <div class="skeleton-tab"></div>
            <div class="skeleton-tab"></div>
          </div>
          <div class="skeleton-access-card"></div>
        </div>
      </div>

      <!-- FAQ Section Skeleton -->
      <div class="skeleton-faq-section">
        <div class="skeleton-badge"></div>
        <div class="skeleton-section-title"></div>
        <div class="skeleton-faq-list">
          <div class="skeleton-faq-item"></div>
          <div class="skeleton-faq-item"></div>
          <div class="skeleton-faq-item"></div>
          <div class="skeleton-faq-item"></div>
        </div>
      </div>
    </div>
  </div>

  <!-- Main Content -->
  <div id="mainContent">
    <header>
      <nav class="main-sticky-navbar">
        <div class="navbar-container">
          <div class="logo" data-aos="fade-right" data-aos-duration="1000">Data<span>Kita</span></div>
          <ul class="navbar-menu" data-aos="fade-down" data-aos-duration="1000" data-aos-delay="100">
            <li><a href="#home">Home</a></li>
            <li><a href="#about-us">About Us</a></li>
            <li><a href="#learn-more">Why Choose Us</a></li>
            <li><a href="#features">Features</a></li>
            <li><a href="#access">Access</a></li>
            <li><a href="#faq">FAQ</a></li>
          </ul>
          <div class="navbar-buttons" data-aos="fade-left" data-aos-duration="1000" data-aos-delay="200">
            <a href="daftar.php" class="btn features-btn-primary">Sign Up</a>
            <a href="masuk.php" class="btn features-btn-secondary">Login</a>
          </div>
        </div>
      </nav>
      <div class="hero" id="home">
        <div class="hero-content" data-aos="fade-right" data-aos-duration="1200">
          <button class="features-explore">⚡ DataKita</button>
          <h1>Website Data Mahasiswa Teknik Informatika <span class="gradient-text">Kelas 4B</span> </h1>
          <p class="subtitle">Kumpulan Data Mahasiswa Teknik Informatika kelas 4B yang terdiri dari Nama, NIM, Tanggal Lahir, Jenis Kelamin, Alamat, Telepon dan Kesukaan</p>
          <div style="margin-top:2rem;">
            <a href="masuk.php" class="btn features-btn-primary">Try For Free</a>
          </div>
        </div>
        <div class="hero-img" data-aos="fade-left" data-aos-duration="1200" data-aos-delay="200">
          <img src="assets/img/Group 1.png" alt="Dashboard Preview" />
        </div>
      </div>
    </header>

    <!-- About Us Section -->
    <section class="about-us" id="about-us" data-aos="fade-up" data-aos-duration="1000">
      <div class="about-us-inner">
        <div>
          <button class="features-explore">⚡ Tentang DataKita</button>
          <h2 class="about-us-title"> <span class="gradient-text"> Lebih Kenal </span> Tentang <br>DataKita</h2>
          <div class="about-us-underline"></div>
        </div>
        <div class="about-us-desc" data-aos="fade-up" data-aos-delay="200">
          Website ini merupakan platform untuk mengelola data mahasiswa kelas seperti nama, alamat, NIM, tanggal lahir, jenis kelamin, nomor telepon, dan kesukaan. Fitur utamanya meliputi menu login dan registrasi untuk mahasiswa dan admin, tampilan daftar mahasiswa, fitur edit, hapus, cari data mahasiswa, tautan alamat terintegrasi Google Maps, serta histori login user. Dalam pengembangannya, website menerapkan 10 prinsip Heuristik Usability Jacob Nielsen.
        </div>
      </div>
    </section>

    <section class="advantages" id="learn-more">
      <button class="features-explore" data-aos="fade-up">⚡Kelebihan DataKita</button>
      <h2 data-aos="fade-up" data-aos-delay="100">Mengapa Harus <span class="gradient-text"> Memilih DataKita ?</span></h2>
      <p class="desc" data-aos="fade-up" data-aos-delay="200">DataKita menyediakan berbagai macam fitur yang sangat membantu untuk dapat memanejeminisasi Mahasiswa</p>
      <div class="advantage-list">
        <div class="advantage-card" data-aos="fade-up" data-aos-delay="300">
          <div class="advantage-icon">
            <img src="https://img.icons8.com/?size=100&id=9761&format=png&color=ffffff" alt="icon" />
          </div>
          <h3>Dapat Digunakan Dengan Mudah</h3>
          <p>DataKita dapat digunakan dengan mudah oleh semua Mahasiswa-Mahasiswi.</p>
        </div>
        <div class="advantage-card" data-aos="fade-up" data-aos-delay="400">
          <div class="advantage-icon">
            <img src="https://img.icons8.com/ios-filled/50/ffffff/conference-call.png" alt="icon" />
          </div>
          <h3>Digunakan Banyak Orang</h3>
          <p>DataKita dapat digunakan banyak orang.</p>
        </div>
        <div class="advantage-card" data-aos="fade-up" data-aos-delay="500">
          <div class="advantage-icon">
            <img src="https://img.icons8.com/ios-filled/50/ffffff/money-bag.png" alt="icon" />
          </div>
          <h3>Hemat Biaya</h3>
          <p>Menggunakan DataKita gratis dan tidak dipungut biaya sepeserpun.</p>
        </div>
      </div>
    </section>

    <section class="features" id="features">
      <div class="features-header" data-aos="fade-up">
        <button class="features-explore">⚡ Explorasi Fitur</button>
        <h2>Mendukung Kebutuhan Pengguna dengan <br><span class="gradient-text">Fitur Inovatif.</span></h2>
        <p class="features-desc">All-in-one recruiting platform. Evaluating candidates smartly, attracting passive job seekers.</p>
        <div class="features-actions">
          <a href="daftar.php" class="btn features-btn-primary">Try for free!</a>
        </div>
      </div>
      <div class="feature-list modern">
        <div class="feature-card modern" data-aos="fade-up" data-aos-delay="100">
          <div class="feature-icon blue-bg">1</div>
          <div class="feature-title">Login dan Registrasi</div>
          <div class="feature-desc">Menu login dan registrasi bagi para Mahasiswa-Mahasiswi dan Admin.</div>
        </div>
        <div class="feature-card modern" data-aos="fade-up" data-aos-delay="200">
          <div class="feature-icon blue-bg">2</div>
          <div class="feature-title">Tampilan Daftar</div>
          <div class="feature-desc">Tampilan daftar Mahasiswa dan Mahasiswi beserta informasi yang lengkap.</div>
        </div>
        <div class="feature-card modern" data-aos="fade-up" data-aos-delay="300">
          <div class="feature-icon blue-bg">3</div>
          <div class="feature-title">Edit, Cari dan Hapus</div>
          <div class="feature-desc">Fitur edit, cari dan hapus untuk data Mahasiswa-Mahasiswi dapat diakses dengan baik oleh Mahasiswa/Admin.</div>
        </div>
        <div class="feature-card modern" data-aos="fade-up" data-aos-delay="400">
          <div class="feature-icon blue-bg">4</div>
          <div class="feature-title">Tautan Alamat </div>
          <div class="feature-desc">Tautan alamat yang terintegrasi dengan Google Maps untuk memudahkan navigasi.</div>
        </div>
        <div class="feature-card modern" data-aos="fade-up" data-aos-delay="500">
          <div class="feature-icon blue-bg">5</div>
          <div class="feature-title">History User</div>
          <div class="feature-desc">Fitur History login user yang dapat meningkatkan keamananan dan transparansi.</div>
        </div>
      </div>
    </section>

    <!-- Account Info Section -->
    <section class="account-info-section" id="access" data-aos="fade-up">
      <div class="account-info-inner">
        <div class="account-info-left">
          <div class="account-info-img-bg" data-aos="fade-right" data-aos-delay="200">
            <img src="assets/img/Group 23.svg" style="width: 450;" alt="User Demo" class="account-info-img" />
          </div>
        </div>
        <div class="account-info-right" data-aos="fade-left" data-aos-delay="300">
          <button class="features-explore">⚡ Explorasi Akses</button>
          <h2 class="account-info-title">Ayo <span class="gradient-text"> Langsung Coba Akses </span> <br>Ke dalam Dashboard-nya!</h2>
          <p class="account-info-subtitle">Gunakan gmail dan password yang tertera dibawah ini untuk mengakses Dashboard DataKita.</p>
          <div class="account-dropdowns-horizontal">
            <button class="account-tab" id="tab-admin" type="button">Admin</button>
            <button class="account-tab" id="tab-mahasiswa" type="button">Mahasiswa</button>
          </div>
          <div class="account-info-card" id="info-admin">
            <div class="account-info-label">Admin</div>
            <div class="account-row">Gmail : admin</div>
            <div class="account-row">Password : admin</div>
          </div>
          <div class="account-info-card blue" id="info-mahasiswa" style="display:none;">
            <div class="account-info-label">Mahasiswa</div>
            <div class="account-row">Gmail : 11230910000006</div>
            <div class="account-row">Password : 123</div>
          </div>
        </div>
      </div>
    </section>

    <section class="faq" id="faq">
      <button class="features-explore" data-aos="fade-up">⚡ Daftar Pertanyaan</button>
      <h2 data-aos="fade-up" data-aos-delay="100">Frequently Asked Questions</h2>
      <p class="account-info-subtitle" data-aos="fade-up" data-aos-delay="200">Daftar pertanyaan yang sering ditanyakan oleh pengguna DataKita.</p>
      <div class="faq-list">
        <div class="faq-item" data-aos="fade-up" data-aos-delay="300">
          <div class="faq-question">Apa Itu DataKita ?<span class="faq-toggle">+</span></div>
          <div class="faq-answer">DataKita adalah platform manajemen data mahasiswa yang memudahkan dalam pengelolaan informasi data mahasiswa Teknik Informatika Kelas 4B.</div>
        </div>
        <div class="faq-item" data-aos="fade-up" data-aos-delay="400">
          <div class="faq-question">Bagaimana Cara Daftar Akun?<span class="faq-toggle">+</span></div>
          <div class="faq-answer">Anda dapat mendaftar dengan mengunjungi halaman pendaftaran dan mengisi form yang disediakan dengan data yang valid.</div>
        </div>
        <div class="faq-item" data-aos="fade-up" data-aos-delay="500">
          <div class="faq-question">Bagaimana Cara Menambah Data Mahasiswa?<span class="faq-toggle">+</span></div>
          <div class="faq-answer">Anda dapat menambah data mahasiswa melalui halaman tambah data dengan mengisi form yang telah disediakan.</div>
        </div>
        <div class="faq-item" data-aos="fade-up" data-aos-delay="600">
          <div class="faq-question">Bagaimana Cara Memilih Lokasi Alamat Mahasiswa Menggunakan Peta?<span class="faq-toggle">+</span></div>
          <div class="faq-answer">Di modal edit, klik tombol "Pilih Lokasi" yang ada di sebelah kolom alamat. Anda akan diarahkan ke modal peta di mana Anda bisa memilih lokasi alamat dengan mengklik pada peta. Koordinat latitude dan longitude akan diisi secara otomatis.</div>
        </div>
      </div>
    </section>

    <footer data-aos="fade-up">
      <p>© 2025 DataKita. All rights reserved.</p>
    </footer>
  </div>

  <!-- Hamburger Button -->
  <button class="navbar-hamburger" id="navbar-hamburger" aria-label="Open menu" data-aos="fade-left" data-aos-duration="800">
    <span></span>
    <span></span>
    <span></span>
  </button>

  <!-- Mobile Menu Overlay -->
  <div class="navbar-mobile-overlay" id="navbar-mobile-overlay">
    <div class="navbar-mobile-menu">
      <button class="navbar-mobile-close" id="navbar-mobile-close" aria-label="Close menu">&times;</button>
      <ul>
        <li><a href="#home">Home</a></li>
        <li><a href="#about-us">Tentang</a></li>
        <li><a href="#learn-more">Why Choose Us</a></li>
        <li><a href="#features">Fitur</a></li>
        <li><a href="#access">Access</a></li>
        <li><a href="#faq">FAQ</a></li>
        <li><a href="daftar.php">Daftar</a></li>
        <li><a href="masuk.php">Login</a></li>
      </ul>
    </div>
  </div>

  <!-- JavaScript Files -->
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/js/main.js"></script>
  
  <!-- Initialize Skeleton Loader -->
  <script>
    // Show page when everything is loaded
    window.addEventListener('load', function() {
      document.documentElement.style.visibility = 'visible';
    });
  </script>
  <script src="assets/js/skeleton-loader.js"></script>
  
  <!-- AOS JS -->
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script>
    // Initialize AOS
    document.addEventListener('DOMContentLoaded', function() {
      setTimeout(() => {
        AOS.init({
          duration: 1000,
          easing: 'ease-in-out',
          once: true,
          mirror: false
        });
      }, 1500); // Initialize AOS after skeleton loader
    });

    // FAQ Dropdown
    document.querySelectorAll('.faq-question').forEach(q => {
      q.addEventListener('click', function() {
        const item = this.parentElement;
        item.classList.toggle('active');
        // Close others
        document.querySelectorAll('.faq-item').forEach(i => {
          if(i !== item) i.classList.remove('active');
        });
      });
    });

    // Tab logic for account info
    const tabAdmin = document.getElementById('tab-admin');
    const tabMhs = document.getElementById('tab-mahasiswa');
    const infoAdmin = document.getElementById('info-admin');
    const infoMhs = document.getElementById('info-mahasiswa');
    
    tabAdmin.onclick = function() {
      tabAdmin.classList.add('active');
      tabMhs.classList.remove('active');
      infoAdmin.style.display = '';
      infoMhs.style.display = 'none';
      infoAdmin.classList.add('admin-blue');
    };
    
    tabMhs.onclick = function() {
      tabMhs.classList.add('active');
      tabAdmin.classList.remove('active');
      infoAdmin.style.display = 'none';
      infoMhs.style.display = '';
      infoAdmin.classList.remove('admin-blue');
    };
    
    // Set default
    tabAdmin.classList.add('active');
    infoAdmin.style.display = '';
    infoMhs.style.display = 'none';
    infoAdmin.classList.add('admin-blue');

    // Hamburger Menu
    const hamburger = document.getElementById('navbar-hamburger');
    const mobileOverlay = document.getElementById('navbar-mobile-overlay');
    const mobileClose = document.getElementById('navbar-mobile-close');

    hamburger.addEventListener('click', () => {
      mobileOverlay.classList.add('active');
      document.body.style.overflow = 'hidden';
    });

    mobileClose.addEventListener('click', () => {
      mobileOverlay.classList.remove('active');
      document.body.style.overflow = '';
    });

    // Close mobile menu on link click
    document.querySelectorAll('.navbar-mobile-menu a').forEach(link => {
      link.addEventListener('click', () => {
        mobileOverlay.classList.remove('active');
        document.body.style.overflow = '';
      });
    });

    // Close mobile menu on outside click
    mobileOverlay.addEventListener('click', (e) => {
      if (e.target === mobileOverlay) {
        mobileOverlay.classList.remove('active');
        document.body.style.overflow = '';
      }
    });
  </script>
</body>
</html>