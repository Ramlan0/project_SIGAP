{{-- <!-- resources/views/kategori/index.blade.php -->
@extends('layouts.mantis') <!-- atau sesuaikan dengan layout yang kamu pakai -->

@section('content')
<div class="container">
    <h1>Daftar Kategori</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('kategori.create') }}" class="btn btn-primary mb-3">Tambah Kategori</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Kategori</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($kategori as $index => $item)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $item->nama_kategori }}</td>
                <td>
                    <a href="{{ route('kategori.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('kategori.destroy', $item->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button onclick="return confirm('Yakin hapus kategori ini?')" class="btn btn-danger btn-sm">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach

            @if(count($kategori) == 0)
            <tr>
                <td colspan="3" class="text-center">Belum ada kategori.</td>
            </tr>
            @endif
        </tbody>
    </table>
</div>
@endsection --}}


@extends('layouts.mantis')

@section('content')
<style>
    body {
        background: linear-gradient(to bottom, #e0f7ff, #ffffff);
    }

    .kategori-container {
        width: 100%;
        padding: 40px 30px;
    }

    .kategori-card {
        background: #fff;
        border-radius: 16px;
        box-shadow: 0 6px 20px rgba(0, 123, 255, 0.15);
        padding: 30px;
        animation: fadeSlideUp 0.5s ease forwards;
        opacity: 0;
        transform: translateY(20px);
    }

    @keyframes fadeSlideUp {
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .btn-primary {
        background: #a2d4ff;
        border: none;
        border-radius: 8px;
        transition: background 0.3s;    
    }

    .btn-primary:hover {
        background: #a2d4ff
        ;
    }

    .table {
        border-radius: 12px;
        overflow: hidden;
    }

    .table thead {
        background-color: #a2d4ff;
        color: white;   
        text-align: center;



    }

    .table tbody tr {
        transition: transform 0.2s, box-shadow 0.2s;
    }

    .table tbody tr:hover {
        transform: scale(1.01);
        box-shadow: 0 4px 10px rgba(0,0,0,0.08);
    }

    .alert {
        border-radius: 12px;
    }

    @media (max-width: 768px) {
        .table thead {
            font-size: 14px;
        }

        .table tbody td {
            font-size: 13px;
        }

        .btn-sm {
            font-size: 12px;
            padding: 4px 10px;
        }
    }
</style>

<div class="kategori-container">
    <div class="kategori-card">
        <h2 class="mb-4">Daftar Kategori</h2>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <a href="{{ route('kategori.create') }}" class="btn btn-primary mb-4 text-dark fw-bold ">+ Tambah Kategori</a>
        <div class="table-responsive">
            <table class="table table-bordered w-100">
                <thead>
                    <tr>
                        <th style="width: 60px;">No</th>
                        <th>Nama Kategori</th>
                        <th style="width: 180px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($kategori as $index => $item)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $item->nama_kategori }}</td>
                            <td class="text-center align-middle">
                                <div class="d-flex justify-content-center gap-2">
                                    <a href="{{ route('kategori.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{ route('kategori.destroy', $item->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button onclick="return confirm('Yakin hapus kategori ini?')" class="btn btn-danger btn-sm">Hapus</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="text-center">Belum ada kategori.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection