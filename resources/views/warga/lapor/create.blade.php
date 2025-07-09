{{-- 
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
  background: linear-gradient(135deg, rgba(227, 242, 253, 0.95), rgba(255, 255, 255, 0.95)),
              url('/template/dist/assets/images/SIGAP_LOGO.png');
  background-repeat: no-repeat;
  background-position: left center;
  background-size: 50% auto; /* Hanya setengah lebar layar */
  font-family: 'Segoe UI', sans-serif;
  min-height: 100vh;
  padding: 20px;
}

.form-card {  

  max-width: 720px;
  margin: 60px auto;
  padding: 40px;
  background: linear-gradient(180deg, rgba(255, 255, 255, 0.6), rgba(241, 248, 255, 0.6));
  border-radius: 16px;
  box-shadow: 0 10px 40px rgba(0, 0, 0, 0.08);
  animation: fadeInUp 0.6s ease-out;
  transition: box-shadow 0.3s ease-in-out;
  backdrop-filter: blur(8px);
}



.form-card:hover {
  box-shadow: 0 16px 50px rgba(0, 0, 0, 0.1);
}

.form-header {
  text-align: center;
  margin-bottom: 30px;
}

.form-header i {
  font-size: 48px;
  color: #0288d1;
  margin-bottom: 10px;
}

.form-header h3 {
  font-weight: 700;
  color: #01579b;
}

.form-header p {
  color: #546e7a;
  font-size: 14px;
}

label {
  font-weight: 600;
  color: #37474f;
  margin-bottom: 5px;
}

input.form-control,
select.form-select,
textarea.form-control {
  border-radius: 10px;
  padding: 12px 14px;
  border: 1px solid #cfd8dc;
  transition: all 0.3s ease-in-out;
  background-color: #f9f9f9;
}

input:focus,
select:focus,
textarea:focus {
  border-color: #0288d1;
  background-color: #ffffff;
  box-shadow: 0 0 0 3px rgba(2, 136, 209, 0.2);
  outline: none;
}

.btn-primary {
  background: linear-gradient(135deg, #2196f3, #1e88e5);
  border: none;
  border-radius: 8px;
  padding: 12px 20px;
  font-weight: 600;
  transition: background 0.3s ease;
}

.btn-primary:hover {
  background: linear-gradient(135deg, #1e88e5, #1565c0);
}

.btn-secondary {
  background-color: #cfd8dc;
  border: none;
  border-radius: 8px;
  padding: 12px 20px;
  font-weight: 500;
  color: #37474f;
  transition: background-color 0.3s ease;
}

.btn-secondary:hover {
  background-color: #b0bec5;
  color: #263238;
}

.alert {
  border-radius: 10px;
  padding: 12px 16px;
}

@keyframes fadeInUp {
  from {
    opacity: 0;
    transform: translateY(30px);
  }
  to {
    opacity: 1;
    transform: translateY(0);
  }
}

/* Responsif untuk layar kecil */
@media (max-width: 576px) {
  .form-card {
    padding: 25px 20px;
    margin: 40px 10px;
  }

  .form-header i {
    font-size: 36px;
  }

  .form-header h3 {
    font-size: 20px;
  }

  .btn {
    width: 100%;
    margin-top: 10px;
  }

  .d-flex.justify-content-between {
    flex-direction: column;
    gap: 10px;
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
          <input type="text" name="judul" id="judul" class="form-control" placeholder="Contoh: Lampu Jalan Mati" required autofocus>
        </div>

        <div class="mb-3">
          <label for="category_id" class="form-label">Kategori</label>
          <select name="category_id" id="category_id" class="form-select" required autofocus>
            <option value="">-- Pilih Kategori --</option>
            @foreach ($categories as $cat)
              <option value="{{ $cat->id }}">{{ $cat->nama_kategori }}</option>
            @endforeach
          </select>
        </div>

        <div class="mb-3">
          <label for="deskripsi" class="form-label">Alamat / Deskripsi Masalah</label>
          <textarea name="deskripsi" id="deskripsi" class="form-control" rows="4" placeholder="Tuliskan lokasi dan detail kerusakan..." required autofocus></textarea>
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
</html> --}}  


<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />  
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Formulir Laporan Kerusakan</title>

  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

  <style>
    body {
      margin: 0;
      padding: 0;
      min-height: 100vh;
      font-family: 'Segoe UI', sans-serif;
      background: linear-gradient(to bottom right, #93c1ea, #ffffff);
      position: relative;
      overflow-x: hidden;
    }

    body::before {
      content: "";
      position: fixed;
      top: 0;
      left: 0;
      width: 50%;
      height: 100%;
      background: url('/template/dist/assets/images/SIGAP_LOGO.png') no-repeat left center;
      background-size: contain;
      opacity: 0.1;
      z-index: 0;
    }

    .form-card {
      max-width: 720px;
      margin: 60px auto;
      padding: 40px;
      background: rgba(255, 255, 255, 0.3);
      border-radius: 16px;
      box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
      backdrop-filter: blur(10px);
      position: relative;
      z-index: 1;

      /* Animasi */
      opacity: 0;
      transform: translateY(40px);
      animation: fadeSlideUp 0.8s ease-out forwards;
    }

    @keyframes fadeSlideUp {
      0% {
        opacity: 0;
        transform: translateY(40px);
      }
      100% {
        opacity: 1;
        transform: translateY(0);
      }
    }

    label {
      font-weight: 600;
    }

    .btn {
      border-radius: 10px;
    }

    @media (max-width: 768px) {
      body::before {
        width: 100%;
        background-position: center top;
        background-size: 80%;
      }

      .form-card {
        margin: 30px 15px;
        padding: 25px 20px;
      }
    }
  </style>
</head>
<body>

  <div class="container">
    <div class="form-card animate-in">  
      <div class="text-center mb-4">
        <i class="bi bi-exclamation-triangle-fill text-primary" style="font-size: 48px;"></i>
        <h3 class="fw-bold text-primary">Formulir Laporan Kerusakan</h3>
        <p class="text-muted">Laporkan kerusakan fasilitas umum di sekitar Anda</p>
      </div>

      {{-- @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
      @endif --}} 
      @if (session('success'))
  <div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Berhasil!</strong> {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
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
          <label for="judul">Judul Laporan</label>
          <input type="text" name="judul" id="judul" class="form-control" placeholder="Contoh: Lampu Jalan Mati" required>
        </div>

        <div class="mb-3">
          <label for="category_id">Kategori</label>
          <select name="category_id" id="category_id" class="form-select" required>
            <option value="">-- Pilih Kategori --</option>
            @foreach ($categories as $cat)
              <option value="{{ $cat->id }}">{{ $cat->nama_kategori }}</option>
            @endforeach
          </select>
        </div>

        {{-- <div class="mb-3">
          <label for="deskripsi">Alamat / Deskripsi Masalah</label>
          <textarea name="deskripsi" id="deskripsi" class="form-control" rows="4" required></textarea>
        </div> --}} 


        <div class="mb-3">
          <label for="alamat" class="form-label">Alamat Lengkap</label>
          <input type="text" name="alamat" id="alamat" class="form-control" placeholder="Contoh: Jl. Merdeka No.10, Bandung" required>
        </div>
        
  

     {{-- end --}}



        <div class="mb-3">
          <label for="photo">Upload Foto Bukti (Opsional)</label>
          <input type="file" name="photo" id="photo" class="form-control">
        </div>  

        <div class="mb-3">
          <label for="deskripsi">Deskripsi Masalah</label>
          <textarea name="deskripsi" id="deskripsi" class="form-control" rows="4" required></textarea>
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