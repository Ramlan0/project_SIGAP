@extends('layouts.mantis')

@section('content')
<div class="container mt-4">
    <div class="card shadow">
        <div class="card-header">
            <h5>Edit Tanggapan untuk Laporan: {{ $report->judul }}</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('responses.update', $response->id) }}" method="POST">
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
                <a href="{{ route('reports.index') }}" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
</div>
@endsection