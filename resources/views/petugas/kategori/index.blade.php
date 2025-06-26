<!-- resources/views/kategori/index.blade.php -->
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
@endsection
