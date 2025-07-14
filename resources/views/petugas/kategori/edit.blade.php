@extends('layouts.mantis')

@section('content')
<style>
    body {
        background: linear-gradient(to bottom, #e3f2fd, #ffffff);
    }

    .card {
        border-radius: 16px;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.05);
        animation: fadeSlide 0.5s ease forwards;
        opacity: 0;
        transform: translateY(30px);
    }

    @keyframes fadeSlide {
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .card-title {
        font-weight: bold;
        color: #0d6efd;
    }

    label {
        font-weight: 600;
        color: #000000;
    }

    .form-control {
        border-radius: 10px;
    }

    .btn-primary {
        background-color: #0d6efd;
        border: none;
        border-radius: 10px;
        padding: 8px 16px;
        transition: background-color 0.3s ease;
    }

    .btn-primary:hover {
        background-color: #0b5ed7;
    }

    .btn-secondary {
        border-radius: 10px;
        padding: 8px 16px;
    }

    @media (max-width: 576px) {
        .d-flex.justify-content-between {
            flex-direction: column;
            gap: 10px;
        }
    }
</style>

<div class="container">
    <div class="card mt-3 p-3">
        <div class="card-header d-flex justify-content-between align-items-center bg-transparent border-0">
            <h3 class="card-title mb-0">Edit Kategori</h3>
            <a href="{{ route('kategori.index') }}" class="btn btn-secondary">Kembali</a>
        </div>

        <div class="card-body pt-0">
            <form action="{{ route('kategori.update', $kategori->id) }}" method="POST">
                @csrf
                @method('PUT')
                
                <!-- Nama kategori -->
                <div class="form-group my-2">
                    <label for="nama_kategori">Nama Kategori <span class="text-danger">*</span></label>
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