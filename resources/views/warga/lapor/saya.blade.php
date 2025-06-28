<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Laporan Saya - SIGAP</title>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

  <style>
    body {
      background: #f0f4f8;
      font-family: 'Segoe UI', sans-serif;
    }

    .container {
      margin-top: 60px;
    }

    .card {
      border-radius: 16px;
      box-shadow: 0 8px 20px rgba(0, 0, 0, 0.05);
    }

    .badge {
      font-size: 0.9rem;
    }

    .img-preview {
      max-height: 200px;
      object-fit: cover;
      border-radius: 10px;
    }

    .alert-info {
      background: #e3f2fd;
      color: #1565c0;
    }

    .footer {
      margin-top: 80px;
      padding: 20px;
      text-align: center;
      color: #888;
    }
  </style>
</head>
<body>

<div class="container">
  <div class="card-header d-flex justify-content-between align-items-center mb-2">
          <h3 class="">Laporan saya</h3>
          <a href="{{ route('warga.index') }}" class="btn btn-secondary">Kembali</a>
      </div>

  @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
  @endif

  @if($laporans->isEmpty())
    <div class="alert alert-warning">Kamu belum mengirim laporan apa pun.</div>
  @else
    @foreach($laporans as $lapor)
    <div class="card mb-4">
      <div class="card-body">
        <h5 class="card-title">{{ $lapor->judul }}</h5>
        <p class="card-text">{{ $lapor->deskripsi }}</p>

        @if($lapor->photo)
          <img src="{{ asset('uploads/reports/' . $lapor->photo) }}" class="img-fluid img-preview mb-2">
        @endif

        <p class="mb-1"><strong>Status:</strong>
          <span class="badge bg-{{ $lapor->status == 'selesai' ? 'success' : ($lapor->status == 'diproses' ? 'warning' : 'secondary') }}">
            {{ ucfirst($lapor->status) }}
          </span>
        </p>

        @if($lapor->response)
        <div class="alert alert-info mt-3">
          <strong><i class="bi bi-chat-dots-fill"></i> Tanggapan Petugas:</strong><br>
          {{ $lapor->response->tanggapan }}
          <br><small class="text-muted">Dibalas: {{ $lapor->response->created_at->format('d M Y H:i') }}</small>
        </div>
        @else
        <div class="alert alert-secondary mt-3">
          <i class="bi bi-clock-history"></i> Belum ada tanggapan dari petugas.
        </div>
        @endif
      </div>
    </div>
    @endforeach
  @endif
</div>

<div class="footer">    
  &copy; {{ date('Y') }} SIGAP - Sistem Informasi Gangguan dan Perbaikan
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>