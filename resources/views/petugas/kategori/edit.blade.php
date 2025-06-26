@extends('layouts.mantis')

@section('content')
<div class="container">
    <div class="card mt-3">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h3 class="card-title mb-0">Edit kategori</h3>
            <a href="{{ route('kategori.index') }}" class="btn btn-secondary">Kembali</a>
        </div>
        <div class="card-body">

            <form action="{{ route('kategori.update', $kategori->id) }}" method="POST">
                @csrf
                @method('PUT')
                
                <!-- Nama kategori -->
                <div class="form-group my-2">
                    <label for="nama_kategori">Nama Kategori<span class="text-danger">*</span></label>
                    <input type="text" 
                           class="form-control @error('nama_kategori') is-invalid @enderror" 
                           name="nama_kategori" 
                           id="nama_kategori" 
                           value="{{ old('nama_kategori', $kategori->nama_kategori) }}" 
                           placeholder="Masukkan Nama Kategori"
                           autofocus
                           required>
                    @error('nama_kategori')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="d-flex justify-content-between mt-4">
                    <a href="{{ route('kategori.index') }}" class="btn btn-secondary">Batal</a>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Update Kategori
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>


@endsection