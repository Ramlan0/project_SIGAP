{{-- @extends('layouts.mantis')
 
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Manajemen Users</h4>
                </div>
 
                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
 
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Tanggal Daftar</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        <span class="badge bg-{{ $user->petugas() ? 'danger' : 'primary' }}">
                                            {{ $user->role->name ?? 'No Role' }}
                                        </span>
                                    </td>
                                    <td>{{ $user->created_at->format('d/m/Y') }}</td>
                                    <td>
                                        <a href="{{ route('users.show', $user) }}" class="btn btn-sm btn-info">Detail</a>
                                        @if($user->id !== auth()->id())
                                            <form action="{{ route('users.destroy', $user) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus user ini?')">Hapus</button>
                                            </form>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
 
                    {{ $users->links() }}
                </div>
            </div>
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

    .user-card {
        background: #fff;
        border-radius: 16px;
        box-shadow: 0 6px 18px rgba(0, 123, 255, 0.1);
        padding: 20px;
        margin-bottom: 20px;
        animation: fadeUp 0.5s ease forwards;
        opacity: 0;
        transform: translateY(20px);
    }

    @keyframes fadeUp {
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .user-card h5 {
        color: #0d6efd;
        font-weight: bold;
    }

    .user-info {
        margin-bottom: 10px;
    }

    .badge {
        font-size: 13px;
        padding: 6px 10px;
        border-radius: 12px;
    }

    .btn {
        border-radius: 8px;
        font-size: 13px;
        margin-right: 5px;
    }

    .btn-info {
        background-color: #0dcaf0;
        border: none;
    }

    .btn-danger {
        background-color: #dc3545;
        border: none;
    }

    .card-header h4 {
        color: #0d6efd;
    }

    @media (max-width: 768px) {
        .user-card {
            padding: 15px;
        }

        .btn {
            display: block;
            margin-bottom: 5px;
        }
    }
</style>

<div class="container my-4">
    <div class="card border-0 shadow-sm p-3">
        <div class="card-header bg-transparent border-0">
            <h4 class="mb-0">Manajemen Users</h4>
        </div>

        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            @foreach($users as $user)
                <div class="user-card">
                    <h5>{{ $user->name }}</h5>

                    <div class="user-info"><strong>Email:</strong> {{ $user->email }}</div>
                    <div class="user-info">
                        <strong>Role:</strong> 
                        <span class="badge bg-{{ $user->petugas() ? 'danger' : 'primary' }}">
                            {{ $user->role->name ?? 'No Role' }}
                        </span>
                    </div>
                    <div class="user-info"><strong>Tanggal Daftar:</strong> {{ $user->created_at->format('d/m/Y') }}</div>

                    <div class="d-flex flex-wrap mt-3">


                        @if($user->id !== auth()->id())
                            <form action="{{ route('users.destroy', $user) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus user ini?')" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                            </form>
                        @endif
                    </div>
                </div>
            @endforeach

            <div class="mt-4">
                {{ $users->links() }}
            </div>
        </div>
    </div>
</div>
@endsection 
