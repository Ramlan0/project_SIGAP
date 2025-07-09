{{-- @extends('layouts.mantis')

@section('content')
<div class="container mt-4">
    <div class="card shadow">
        <div class="card-header">
            <h5>Edit Tanggapan untuk Laporan: {{ $report->judul }}</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('respon.update', $response->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label">Tanggapan</label>
                    <textarea name="tanggapan" class="form-control" rows="4" required>{{ $response->tanggapan }}</textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">Status Laporan</label>
                    <select name="status" class="form-control" required>
                        <option value="Pending" {{ $report->status == 'Pending' ? 'selected' : '' }}>Pending</option>
                        <option value="Diproses" {{ $report->status == 'Diproses' ? 'selected' : '' }}>Diproses</option>
                        <option value="Selesai" {{ $report->status == 'Selesai' ? 'selected' : '' }}>Selesai</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-success">Simpan Perubahan</button>
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
        background: linear-gradient(to bottom, #d0e8ff, #ffffff);
    }

    .edit-form-container {
        max-width: 1500px;
        margin: 40px auto;
        animation: fadeSlide 0.6s ease-out forwards;
        opacity: 0;
        transform: translateY(30px);
    }

    @keyframes fadeSlide {
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .card {
        border-radius: 16px;
        box-shadow: 0 8px 24px rgba(0, 123, 255, 0.15);
    }

    .card-header {
        background-color: #a2d4ff;
        color: #151515;
        font-size: 18px;
        font-weight: 600;
        padding: 16px 24px;
    }

    .form-label {
        font-weight: 500;
        color: #333;
    }

    .form-control {
        border-radius: 8px;
        padding: 10px;
    }

    .btn-success, .btn-secondary {
        border-radius: 8px;
        padding: 10px 18px;
        font-weight: 500;
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
        .edit-form-container {
            padding: 10px;
        }

        .btn {
            width: 100%;
            margin-top: 10px;
        }
    }
</style>

<div class="container edit-form-container">
    <div class="card shadow">
        <div class="card-header">
            Edit Tanggapan untuk Laporan: {{ $report->judul }}
        </div>

        <div class="card-body">
            <form action="{{ route('respon.update', $response->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label">Tanggapan</label>
                    <textarea name="tanggapan" class="form-control" rows="4" required>{{ $response->tanggapan }}</textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">Status Laporan</label>
                    <select name="status" class="form-control" required>
                        <option value="Pending" {{ $report->status == 'Pending' ? 'selected' : '' }}>Pending</option>
                        <option value="Diproses" {{ $report->status == 'Diproses' ? 'selected' : '' }}>Diproses</option>
                        <option value="Selesai" {{ $report->status == 'Selesai' ? 'selected' : '' }}>Selesai</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-success">Simpan Perubahan</button>
                <a href="{{ route('laporan.index') }}" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
</div>
@endsection