<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>SIGAP - Sistem Informasi Gangguan dan Perbaikan</title>

  <!-- Bootstrap 5 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"/>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet"/>

  <!-- Google Font -->
  <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;700&display=swap" rel="stylesheet"/>

  <style>
    body {
      font-family: 'DM Sans', sans-serif;
      background: linear-gradient(to bottom, #e3f2fd, #ffffff);
      color: #1b1f29;
      scroll-behavior: smooth;
    }

    .navbar {
      background: transparent;
    }

    .navbar-brand {
      font-weight: 700;
      color: #1976d2 !important;
     
      font-size: 1.5rem;
    }

    .nav-link {
      color: #444 !important;
      margin-right: 15px;
      font-weight: 500;
    }

    .btn-soft {
      background-color: #1976d2;
      color: white;
      border-radius: 30px;
      padding: 10px 25px;
    }

    .btn-soft:hover {
      background-color: #125ea2;
    }

    .hero {
  padding: 140px 20px 100px;
  text-align: center;
  background: linear-gradient(rgba(255,255,255,0.85), rgba(255, 255, 255, 0.784)),
                    url('/template/dist/assets/images/bcsigap.jpg');
  background-repeat: no-repeat;
  background-size: cover;
  background-position: center center;
  border-bottom-left-radius: 80px;
  position: relative;
  overflow: hidden;
}

    .hero h1 {
      font-size: 3.2rem;
      font-weight: 700;
        
      color: #0d47a1;
    }

    .hero p {
      font-size: 1.1rem;
      color: #4a4a4a;
      max-width: 600px;
      margin: 20px auto 30px;
    }

    .hero {
  padding: 140px 20px 100px;
  background: linear-gradient(rgba(255,255,255,0.85), rgba(255,255,255,0.85)),
  background-size: cover;
  text-align: center;
  border-bottom-left-radius: 80px;
  position: relative;
  overflow: hidden;
}


    .feature-section {
      padding: 100px 0;
      background: linear-gradient(to bottom, #ffffff, #f3faff);
    }

    .feature-box {
      padding: 40px;
      background: white;
      border-radius: 24px;
      box-shadow: 0 10px 30px rgba(0,0,0,0.06);
      text-align: center;
      transition: 0.3s ease;
    }

    .feature-box:hover {
      transform: translateY(-5px);
      box-shadow: 0 12px 35px rgba(0,0,0,0.08);
    }

    .feature-icon {
      font-size: 40px;
      color: #1976d2;
      margin-bottom: 20px;
    }

    .cta-section {
      /* background-image: url('/sigap.jpg'); */
      background: linear-gradient(to right, #bbdefb, #e3f2fd);
      text-align: center;
      padding: 80px 20px;
      border-top-right-radius: 80px;
    }

    footer {
      background-color: #0d47a1;
      color: #fff;
      text-align: center;
      padding: 25px 0;
      font-size: 0.95rem;
    }

    .fade-in {
      animation: fadeIn 1s ease-in;
    }

    .slide-up {
      animation: slideUp 1s ease-out;
    }

    @keyframes fadeIn {
      from { opacity: 0; }
      to { opacity: 1; }
    }

    @keyframes slideUp {
      from {
        transform: translateY(50px);
        opacity: 0;
      }
      to {
        transform: translateY(0);
        opacity: 1;
      }
    }
  </style>
</head>
<body>

  <!-- Navbar -->

<nav class="navbar navbar-expand-lg fixed-top">
    <div class="container">
        <img src="/template/dist/assets/images/SIGAP.png" alt="Logo SIGAP" height="100" style="margin-top: -1rem;" class="mb-90">
    
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar">
        <span class="navbar-toggler-icon"></span>
      </button>
  
      <div class="collapse navbar-collapse justify-content-end" id="navbar">
        <ul class="navbar-nav">
          <li class="nav-item"><a class="nav-link" href="#">Beranda</a></li>
          <li class="nav-item"><a class="nav-link" href="#fitur">Fitur</a></li>
          <li class="nav-item"><a class="nav-link" href="#carakerja">Cara Kerja</a></li>
          <li class="nav-item"><a class="nav-link" href="#lapor">Lapor</a></li>
        </ul>
        <a href="/login" class="btn btn-soft ms-3">Login</a>
      </div>
    </div>
  </nav>
  

  <!-- Hero -->
  <section class="hero fade-in">
    <div class="container">
      <h1 class="slide-up">SIGAP </h1>
      <h3 class="slide-up">Sistem Informasi Gangguan dan Perbaikan </h3>
      <p class="slide-up">Laporkan gangguan atau kerusakan fasilitas umum dengan cepat, mudah, dan terpantau secara digital.</p>
      <a href="#lapor" class="btn btn-soft slide-up">Laporkan Sekarang</a>
    </div>
  </section>

  <!-- Features -->
  <section class="feature-section" id="fitur">
    <div class="container">
      <div class="text-center mb-5 fade-in">
        <h2 class="fw-bold text-primary">Fitur SIGAP</h2>
        <p class="text-muted">Dirancang untuk efisiensi pelaporan dan percepatan tindak lanjut perbaikan.</p>
      </div>
      <div class="row g-4">
        <div class="col-md-4">
          <div class="feature-box fade-in">
            <div class="feature-icon"><i class="bi bi-camera-fill"></i></div>
            <h5>Lampirkan Bukti</h5>
            <p>Unggah foto atau video kondisi kerusakan secara langsung.</p>
          </div>
        </div>
        <div class="col-md-4">
          <div class="feature-box fade-in">
            <div class="feature-icon"><i class="bi bi-geo-alt-fill"></i></div>
            <h5>Deteksi Lokasi</h5>
            <p>Sistem kami dapat membaca lokasi Anda untuk laporan yang akurat.</p>
          </div>
        </div>
        <div class="col-md-4">
          <div class="feature-box fade-in">
            <div class="feature-icon"><i class="bi bi-bar-chart-line-fill"></i></div>
            <h5>Monitoring Real-time</h5>
            <p>Lihat status dan perkembangan penanganan dari setiap laporan Anda.</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Cara Kerja -->
  <section class="feature-section bg-light" id="carakerja">
    <div class="container">
      <div class="text-center mb-5 fade-in">
        <h2 class="fw-bold text-primary">Cara Kerja SIGAP</h2>
        <p class="text-muted">Langkah-langkah mudah untuk melaporkan dan memantau gangguan fasilitas.</p>
      </div>
      <div class="row g-4">
        <div class="col-md-4">
          <div class="feature-box fade-in">
            <div class="feature-icon"><i class="bi bi-pencil-square"></i></div>
            <h5>1. Isi Laporan</h5>
            <p>Gunakan formulir pelaporan untuk mengisi data gangguan, lokasi, dan bukti pendukung.</p>
          </div>
        </div>
        <div class="col-md-4">
          <div class="feature-box fade-in">
            <div class="feature-icon"><i class="bi bi-shield-check"></i></div>
            <h5>2. Verifikasi</h5>
            <p>Tim terkait akan meninjau dan memverifikasi laporan yang masuk secara cepat.</p>
          </div>
        </div>
        <div class="col-md-4">
          <div class="feature-box fade-in">
            <div class="feature-icon"><i class="bi bi-tools"></i></div>
            <h5>3. Tindak Lanjut</h5>
            <p>Laporan yang valid akan segera ditangani oleh petugas.</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- CTA -->
  <section class="cta-section" id="lapor">
    <div class="container fade-in">
      <h3 class="mb-3">Bersama SIGAP, Fasilitas Umum Lebih Terjaga</h3>
      <p class="mb-4">Jangan diam. Laporkan sekarang agar kerusakan cepat ditangani oleh pihak terkait.</p>
      <a href="/form-laporan" class="btn btn-soft">Formulir Laporan</a>
    </div>
  </section>

  <!-- Footer -->
  <footer>
    <div class="container">
      <p class="mb-0">&copy; 2025 SIGAP - Sistem Informasi Gangguan dan Perbaikan. Hak Cipta Dilindungi.</p>
    </div>
  </footer>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
