<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Formulir Laporan Kerusakan</title>

  <!-- Bootstrap 5 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

  <style>
    body {
      background: linear-gradient(135deg, #e3f2fd, #ffffff);
      font-family: 'Segoe UI', sans-serif;
      min-height: 100vh;
    }

    .form-card {
      max-width: 800px;
      margin: 60px auto;
      padding: 40px;
      background-color: #ffffff;
      border-radius: 20px;
      box-shadow: 0 12px 30px rgba(0, 0, 0, 0.1);
      animation: slideUp 0.6s ease-in-out;
    }

    .form-header {
      font-weight: 700;
      color: #1565c0;
      text-align: center;
      margin-bottom: 30px;
    }

    .form-header i {
      font-size: 40px;
      color: #1976d2;
      margin-bottom: 10px;
    }

    label {
      font-weight: 500;
      color: #333;
    }

    .btn-primary {
      background-color: #1976d2;
      border: none;
      transition: background-color 0.3s ease;
    }

    .btn-primary:hover {
      background-color: #125ea2;
    }

    .btn-secondary {
      transition: background-color 0.3s ease;
    }

    .btn-secondary:hover {
      background-color: #b0bec5;
    }

    @keyframes slideUp {
      from {
        transform: translateY(40px);
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

  <div class="container">
    <div class="form-card">
      <div class="form-header">
        <i class="bi bi-exclamation-triangle-fill"></i>
        <h3>Formulir Laporan Kerusakan</h3>
        <p class="text-muted">Laporkan kerusakan fasilitas umum di sekitar Anda</p>
      </div>

      @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
      @endif

      @if($errors->any())
        <div class="alert alert-danger">
          <ul class="mb-0">
            @foreach ($errors->all() as $err)
              <li>{{ $err }}</li>
            @endforeach
          </ul>
        </div>
      @endif

      <form action="{{ route('lapor.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
          <label for="judul" class="form-label">Judul Laporan</label>
          <input type="text" name="judul" id="judul" class="form-control" placeholder="Contoh: Lampu Jalan Mati" required>
        </div>

        <div class="mb-3">
          <label for="category_id" class="form-label">Kategori</label>
          <select name="category_id" id="category_id" class="form-select" required>
            <option value="">-- Pilih Kategori --</option>
            @foreach ($categories as $cat)
              <option value="{{ $cat->id }}">{{ $cat->nama_kategori }}</option>
            @endforeach
          </select>
        </div>

        <div class="mb-3">
          <label for="deskripsi" class="form-label">Alamat / Deskripsi Masalah</label>
          <textarea name="deskripsi" id="deskripsi" class="form-control" rows="4" placeholder="Tuliskan lokasi dan detail kerusakan..." required></textarea>
        </div>

        <div class="mb-3">
          <label for="photo" class="form-label">Upload Foto Bukti (Opsional)</label>
          <input type="file" name="photo" id="photo" class="form-control">
        </div>

        <div class="d-flex justify-content-between mt-4">
          <a href="{{ route('warga.index') }}" class="btn btn-secondary"><i class="bi bi-arrow-left-circle"></i> Kembali</a>
          <button type="submit" class="btn btn-primary"><i class="bi bi-send-fill"></i> Kirim Laporan</button>
        </div>
      </form>
    </div>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>