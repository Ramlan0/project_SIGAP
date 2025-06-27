@extends('layouts.mantis')

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
                {{-- <td>
                    @if($report->response)
    <a href="{{ route('responses.edit', $report->response->id) }}" class="btn btn-sm btn-warning">Edit Tanggapan</a>
@else
    <a href="{{ route('responses.create', $report->id) }}" class="btn btn-sm btn-info">Tanggapi</a>
@endif

                </td> --}}
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endsection