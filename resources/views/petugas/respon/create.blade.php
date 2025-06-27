@extends('layouts.mantis')

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
@endsection
