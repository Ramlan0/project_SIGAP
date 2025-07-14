{{-- @extends('layouts.mantis')

@section('content')
<div class="container mt-4">
    <div class="card shadow">
        <div class="card-header">
            <h5>Beri Tanggapan untuk Laporan: {{ $report->judul }}</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('respon.store') }}" method="POST">
                @csrf
                <input type="hidden" name="report_id" value="{{ $report->id }}">

                <div class="mb-3">
                    <label for="tanggapan" class="form-label">Tanggapan</label>
                    <textarea name="tanggapan" id="tanggapan" class="form-control" rows="4" required></textarea>
                </div>

                <div class="mb-3">
                    <label for="status" class="form-label">Status Laporan</label>
                    <select name="status" id="status" class="form-control" required>
                        <option value="Pending" {{ $report->status == 'Pending' ? 'selected' : '' }}>Pending</option>
                        <option value="Diproses" {{ $report->status == 'Diproses' ? 'selected' : '' }}>Diproses</option>
                        <option value="Selesai" {{ $report->status == 'Selesai' ? 'selected' : '' }}>Selesai</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-success">Kirim Tanggapan</button>
                <a href="{{ route('laporan.index') }}" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
</div>
@endsection --}}    


@extends('layouts.mantis')

@section('content')
<style>
    body {
        background: linear-gradient(to bottom, #e3f2fd, #ffffff);
    }

    .form-container {
        max-width: 1500px;
        margin: 30px auto;
        animation: slideFade 0.6s ease-out forwards;
        opacity: 0;
        transform: translateY(30px);
    }

    @keyframes slideFade {
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .card {
        border-radius: 16px;
        box-shadow: 0 8px 20px rgba(0, 123, 255, 0.15);
        overflow: hidden;
    }

    .card-header {
        background-color:#a2d4ff;
        color: rgb(7, 5, 5);
        padding: 16px 24px;
        font-size: 18px;
        font-weight: bold;
    }

    .form-label {
        font-weight: 500;
        color: #333;
    }

    .form-control {
        border-radius: 8px;
    }

    .btn-success, .btn-secondary {
        border-radius: 8px;
        padding: 8px 16px;
        margin-right: 8px;
    }

    .btn-success {
        background-color: #356cd2;
        border: none;
    }

    .btn-success:hover {
        background-color: #154973;
    }

    .btn-secondary:hover {
        background-color: #6c757d;
    }

    @media (max-width: 576px) {
        .form-container {
            padding: 10px;
        }

        .btn {
            width: 100%;
            margin-top: 10px;
        }
    }
</style>

<div class="container form-container">
    <div class="card shadow">
        <div class="card-header">
            Beri Tanggapan untuk Laporan: {{ $report->judul }}
        </div>

        <div class="card-body">
            <form action="{{ route('respon.store') }}" method="POST">
                @csrf
                <input type="hidden" name="report_id" value="{{ $report->id }}">

                <div class="mb-3">
                    <label for="tanggapan" class="form-label">Tanggapan</label>
                    <textarea name="tanggapan" id="tanggapan" class="form-control" rows="4" required></textarea>
                </div>

                <div class="mb-3">
                    <label for="status" class="form-label">Status Laporan</label>
                    <select name="status" id="status" class="form-control" required>
                        <option value="Pending" {{ $report->status == 'Pending' ? 'selected' : '' }}>Pending</option>
                        <option value="Diproses" {{ $report->status == 'Diproses' ? 'selected' : '' }}>Diproses</option>
                        <option value="Selesai" {{ $report->status == 'Selesai' ? 'selected' : '' }}>Selesai</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-success">Kirim Tanggapan</button>
                <a href="{{ route('laporan.index') }}" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
</div>
@endsection
