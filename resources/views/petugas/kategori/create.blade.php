@extends('layouts.mantis')

@section('content')
<div class="container">
    <div class="card mt-3">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h3 class="card-title mb-0">Tambah Kategori</h3>

        </div>
        <div class="card-body">
            <form action="{{ route('kategori.store') }}" method="POST">
                @csrf
                
                <!-- Nama Mahasiswa -->
                <div class="form-group my-2">
                    <label for="nama_kategori">Nama Kategori <span class="text-danger">*</span></label>
                    <input type="text" 
                           class="form-control @error('nama_kategori') is-invalid @enderror" 
                           name="nama_kategori" 
                           id="nama_kategori" 
                           value="{{ old('nama_kategori') }}" 
                           placeholder="Masukkan nama KATEGORI"
                           autofocus>
                    @error('nama_kategori')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                   



                <div class="d-flex justify-content-between mt-4">
                    <a href="{{ route('kategori.index') }}" class="btn btn-secondary">Batal</a>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Simpan 
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>



@endsection
