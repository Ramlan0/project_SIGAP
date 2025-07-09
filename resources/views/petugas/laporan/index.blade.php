{{-- @extends('layouts.mantis')

@section('content')
<div class="container">
    <h4>Dashboard Petugas</h4>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>Pelapor</th>
                <th>Judul</th>
                <th>Alamat</th>
                <th>Kategori</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
        @foreach($reports as $report)
            <tr>
                <td>{{ $report->user->name }}</td>
                <td>{{ $report->judul }}</td>
                <td>{{ $report->deskripsi }}</td>
                <td>{{ $report->category->nama_kategori }}</td>
                <td>
                    @if($report->status == 'Selesai')
                        <span class="badge bg-success">Selesai</span>
                    @elseif($report->status == 'Diproses')
                        <span class="badge bg-primary">Diproses</span>
                    @else
                        <span class="badge bg-warning text-dark">Pending</span>
                    @endif
                </td>
                <td>
                    @if($report->response)
    <a href="{{ route('respon.edit', $report->response->id) }}" class="btn btn-sm btn-warning">Edit Tanggapan</a>
@else
    <a href="{{ route('respon.create', $report->id) }}" class="btn btn-sm btn-info">Tanggapi</a>
@endif

                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endsection --}}    


{{-- @extends('layouts.mantis')

@section('content')
<style>
    body {
        background: linear-gradient(to bottom right, #e0f0ff, #ffffff);
    }

    .laporan-card {
        background: rgba(255, 255, 255, 0.85);
        backdrop-filter: blur(8px);
        border-radius: 16px;
        padding: 24px;
        margin-bottom: 24px;
        box-shadow: 0 10px 20px rgba(0,0,0,0.08);
        transition: transform 0.3s ease, box-shadow 0.3s ease, opacity 0.6s ease;
        animation: fadeInUp 0.7s ease both;
    }

    .laporan-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 12px 28px rgba(0,0,0,0.12);
    }

    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .laporan-header {
        font-weight: 700;
        font-size: 20px;
        color: #145ea8;
        margin-bottom: 14px;
    }

    .laporan-info {
        font-size: 15px;
        color: #444;
        line-height: 1.7;
    }

    .laporan-info span {
        font-weight: 600;
        color: #1e3a8a;
    }

    .laporan-actions {
        margin-top: 18px;
    }

    .laporan-badge {
        font-size: 13px;
        padding: 6px 14px;
        border-radius: 20px;
    }

    @media (max-width: 576px) {
        .laporan-card {
            padding: 18px;
        }

        .laporan-header {
            font-size: 17px;
        }

        .laporan-info {
            font-size: 14px;
        }
    }
</style>

<div class="container py-4">
    <h4 class="mb-4 text-primary">Dashboard Petugas</h4>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Berhasil!</strong> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @foreach($reports as $report)
        <div class="laporan-card">
            <div class="laporan-header">{{ $report->judul }}</div>

            <div class="laporan-info">
                <p><span>Pelapor:</span> {{ $report->user->name }}</p>
                <p><span>Alamat:</span> {{ $report->deskripsi }}</p>
                <p><span>Kategori:</span> {{ $report->category->nama_kategori }}</p>
                <p><span>Tanggal Laporan:</span>
                    {{ $report->tanggal_laporan ? \Carbon\Carbon::parse($report->tanggal_laporan)->translatedFormat('d F Y'):'-'}}
                </p>
                <p><span>Status:</span>
                    @if($report->status == 'Selesai')
                        <span class="badge bg-success laporan-badge">Selesai</span>
                    @elseif($report->status == 'Diproses')
                        <span class="badge bg-primary laporan-badge">Diproses</span>
                    @else
                        <span class="badge bg-warning text-dark laporan-badge">Pending</span>
                    @endif
                </p>
            </div>

            <div class="laporan-actions">
                @if($report->response)
                    <a href="{{ route('respon.edit', $report->response->id) }}" class="btn btn-sm btn-warning">Edit Tanggapan</a>
                @else
                    <a href="{{ route('respon.create', $report->id) }}" class="btn btn-sm btn-info">Tanggapi</a>
                @endif
            </div>
        </div>
    @endforeach
</div>
@endsection --}}    


@extends('layouts.mantis')

@section('content')
<style>
    body {
        background: linear-gradient(to bottom right, #e0f0ff, #ffffff);
    }

    .laporan-card {
        background: rgba(255, 255, 255, 0.85);
        backdrop-filter: blur(8px);
        border-radius: 16px;
        padding: 24px;
        margin-bottom: 24px;
        box-shadow: 0 10px 20px rgba(0,0,0,0.08);
        transition: transform 0.3s ease, box-shadow 0.3s ease, opacity 0.6s ease;
        animation: fadeInUp 0.7s ease both;
    }

    .laporan-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 12px 28px rgba(0,0,0,0.12);
    }

    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .laporan-header {
        font-weight: 700;
        font-size: 20px;
        color: #145ea8;
        margin-bottom: 14px;
    }

    .laporan-info {
        font-size: 15px;
        color: #444;
        line-height: 1.7;
    }

    .laporan-info span {
        font-weight: 600;
        color: #1e3a8a;
    }

    .laporan-actions {
        margin-top: 18px;
    }

    .laporan-badge {
        font-size: 13px;
        padding: 6px 14px;
        border-radius: 20px;
    }

    @media (max-width: 576px) {
        .laporan-card {
            padding: 18px;
        }

        .laporan-header {
            font-size: 17px;
        }

        .laporan-info {
            font-size: 14px;
        }
    }
</style>

<div class="container py-4">
    <h4 class="mb-4 text-primary">Dashboard Petugas</h4>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Berhasil!</strong> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @foreach($reports as $report)
        <div class="laporan-card">
            <div class="laporan-header">{{ $report->judul }}</div>

            <div class="laporan-info">
                <p><span>Pelapor:</span> {{ $report->user->name }}</p>
                <p><span>Alamat:</span> {{ $report->deskripsi }}</p>
                <p><span>Kategori:</span> {{ $report->category->nama_kategori }}</p>
                <p><span>Tanggal Laporan:</span>
                    {{ \Carbon\Carbon::parse($report->tanggal_laporan)->locale('id')->translatedFormat('d F Y') }}
                </p>
                <p><span>Status:</span>
                    @if($report->status == 'Selesai')
                        <span class="badge bg-success laporan-badge">Selesai</span>
                    @elseif($report->status == 'Diproses')
                        <span class="badge bg-primary laporan-badge">Diproses</span>
                    @else
                        <span class="badge bg-warning text-dark laporan-badge">Pending</span>
                    @endif
                </p>
            </div>

            <div class="laporan-actions">
                @if($report->response)
                    <a href="{{ route('respon.edit', $report->response->id) }}" class="btn btn-sm btn-warning">Edit Tanggapan</a>
                @else
                    <a href="{{ route('respon.create', $report->id) }}" class="btn btn-sm btn-info">Tanggapi</a>
                @endif
            </div>
        </div>
    @endforeach
</div>
@endsection
