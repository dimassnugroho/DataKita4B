<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css">
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <style>
        #map {
            height: 500px; /* Ensure map container has a height */
        }
        .suggestion-item {
            padding: 5px;
            cursor: pointer;
        }
        .suggestion-item:hover {
            background-color: #e9e9e9;
        }
    </style>
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
            <div class="col-12">
              <div class="card-body p-3 p-md-4 p-xl-5">
                <div class="row justify-content-center">
                  <div class="col-12 col-md-8">
                    <div class="mb-5 text-center" data-aos="fade-up" data-aos-duration="1000">
                      <button class="features-explore">⚡ Akun Baru</button>
                      <h1 style="font-weight: bold;">Daftarkan Akun Baru Untuk <span class="gradient-text">Bergabung Dalam Dashboard</span> </h1>
                      <p class="subtitle">Masukkan data-data yang diperlukan seperti Nama, NIM, Tanggal Lahir, Jenis Kelamin, Alamat, Telepon dan Kesukaan untuk mendaftarkan diri anda. </p>
                    </div>
                  </div>
                </div>
                <?php 
                session_start();
                if(isset($_SESSION['error'])): ?>
                  <div class="alert alert-danger" role="alert">
                    <?= $_SESSION['error']; unset($_SESSION['error']); ?>
                  </div>
                <?php endif; ?>
                <form action="daftar-proses.php" method="POST">
                  <input type="hidden" class="form-control" name="id_mahasiswa" id="id_mahasiswa" placeholder="id_mahasiswa">
                  <div class="row justify-content-center gy-3">
                    <div class="col-md-6" data-aos="fade-right" data-aos-delay="200">
                      <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama Lengkap" required>
                        <label for="nama" class="form-label">Nama Lengkap</label>
                      </div>
                    </div>
                    <div class="col-md-6" data-aos="fade-left" data-aos-delay="200">
                      <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="nim" id="nim" placeholder="NIM" required>
                        <label for="nim" class="form-label">NIM</label>
                      </div>
                    </div>
                    <div class="col-md-6" data-aos="fade-right" data-aos-delay="300">
                      <div class="form-floating mb-3">
                        <input type="date" class="form-control" name="tanggal_lahir" id="tanggal_lahir" placeholder="Tanggal Lahir" required>
                        <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                      </div>
                    </div>
                    <div class="col-md-6" data-aos="fade-left" data-aos-delay="300">
                      <div class="form-floating mb-3">
                        <select class="form-select" name="jenis_kelamin" id="jenis_kelamin" required>
                          <option value="" selected disabled>Pilih Jenis Kelamin</option>
                          <option value="Laki-laki">Laki-laki</option>
                          <option value="perempuan">Perempuan</option>
                        </select>
                        <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                      </div>
                    </div>
                    <div class="col-md-6" data-aos="fade-right" data-aos-delay="400">
                      <div class="input-group mb-3" style="height: 55px;">
                          <input type="text" class="form-control" name="alamat" id="alamat" placeholder="Alamat" required>
                          <button class="btn btn-secondary" type="button" id="locationButton" data-bs-toggle="modal" data-bs-target="#locationModal"><i class="ri-map-pin-line"></i> Pilih Lokasi</button>
                      </div>
                      <input type="hidden" class="form-control" name="latitude" id="latitude" required>
                      <input type="hidden" class="form-control" name="longitude" id="longitude" required>
                    </div>
                    <div class="col-md-6" data-aos="fade-left" data-aos-delay="400">
                      <div class="form-floating mb-3">
                        <input type="tel" class="form-control" name="telepon" id="telepon" placeholder="Nomor Telepon" required>
                        <label for="telepon" class="form-label">Nomor Telepon</label>
                      </div>
                    </div>
                    <div class="col-md-6" data-aos="fade-right" data-aos-delay="500">
                      <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="kesukaan" id="kesukaan" placeholder="Kesukaan" required>
                        <label for="kesukaan" class="form-label">Kesukaan</label>
                      </div>
                    </div>
                    <div class="col-md-6" data-aos="fade-left" data-aos-delay="500">
                      <div class="form-floating mb-3">
                        <input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
                        <label for="password" class="form-label">Password</label>
                      </div>
                    </div>
                    <div class="col-md-12 text-center" data-aos="fade-up" data-aos-delay="600">
                      <div class="d-grid gap-1 d-md-flex justify-content-md-end mb-2">
                        <button class="btn features-btn-secondary me-md-2 mb-2 mb-md-0" id="resetForm" style="width: 260px;"><i class="ri-refresh-line"></i> Reset</button>
                        <button class="btn features-btn-primary" name="submit" type="submit" style="width: 260px;"><i class="ri-user-add-line"></i> Daftar</button>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
              <div class="row">
                <div class="col-12">
                  <div class="d-flex gap-md-1 flex-column flex-md-row justify-content-center mb-3" data-aos="fade-up" data-aos-delay="700">
                    <p>Sudah ada akun?</p>
                    <a href="masuk.php" class="link-secondary text-decoration-none">Masuk disini!</a>
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

<!-- Modal -->
<div class="modal fade" id="locationModal" tabindex="-1" aria-labelledby="locationModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="locationModalLabel">Pilih Lokasi</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div id="map"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
        <button type="button" class="btn btn-primary" id="saveLocation">Simpan Lokasi</button>
      </div>
    </div>
  </div>
</div>

<footer>
  <p>© 2025 DataKita. All rights reserved.</p>
</footer>

<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
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

  // Map initialization
  let map;
  let marker;
  let selectedLat = -7.9666204;
  let selectedLng = 112.6326321;

  document.getElementById('locationModal').addEventListener('shown.bs.modal', function () {
    if (!map) {
      map = L.map('map').setView([selectedLat, selectedLng], 13);
      L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '© OpenStreetMap contributors'
      }).addTo(map);

      marker = L.marker([selectedLat, selectedLng], {
        draggable: true
      }).addTo(map);

      marker.on('dragend', function(e) {
        selectedLat = e.target.getLatLng().lat;
        selectedLng = e.target.getLatLng().lng;
      });

      map.on('click', function(e) {
        selectedLat = e.latlng.lat;
        selectedLng = e.latlng.lng;
        marker.setLatLng([selectedLat, selectedLng]);
      });
    }
    setTimeout(() => {
      map.invalidateSize();
    }, 100);
  });

  document.getElementById('saveLocation').addEventListener('click', function() {
    document.getElementById('latitude').value = selectedLat;
    document.getElementById('longitude').value = selectedLng;
    
    // Reverse geocoding to get address
    fetch(`https://nominatim.openstreetmap.org/reverse?format=json&lat=${selectedLat}&lon=${selectedLng}`)
      .then(response => response.json())
      .then(data => {
        document.getElementById('alamat').value = data.display_name;
      })
      .catch(error => {
        console.error('Error:', error);
      });

    let modal = bootstrap.Modal.getInstance(document.getElementById('locationModal'));
    modal.hide();
  });

  // Reset form
  document.getElementById('resetForm').addEventListener('click', function(e) {
    e.preventDefault();
    document.querySelector('form').reset();
    document.getElementById('latitude').value = '';
    document.getElementById('longitude').value = '';
  });
</script>
</body>
</html>
