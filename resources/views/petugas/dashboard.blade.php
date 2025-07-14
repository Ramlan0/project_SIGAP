@extends('layouts.mantis')

@section('content')
<style>
    body {
        background: linear-gradient(to right, #e0ecff, #f8faff);
    }

    .dashboard-wrapper {
        padding: 2rem 0;
    }

    .dashboard-card {
        border-radius: 16px;
        box-shadow: 0 6px 20px rgba(0, 0, 0, 0.08);
        transition: transform 0.4s ease;
        animation: fadeInUp 0.6s ease-in-out both;
        background: #fff;
        border: 1px solid #e2e8f0;
    }

    .dashboard-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 12px 30px rgba(0, 0, 0, 0.12);
    }

    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .icon-box {
        width: 70px;
        height: 70px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 14px;
        color: #fff;
        font-size: 2rem;
        margin: 0 auto 15px auto;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    }

    .icon-box:hover {
        transform: scale(1.05);
        transition: transform 0.3s ease;
    }

    .bg-gradient-blue {
        background: linear-gradient(135deg, #4e54c8, #8f94fb);
    }

    .bg-gradient-orange {
        background: linear-gradient(135deg, #ff9a00, #ff6a00);
    }

    .bg-gradient-green {
        background: linear-gradient(135deg, #38ef7d, #11998e);
    }

    .card-stats h6 {
        margin-top: 0.5rem;
        font-weight: 600;
        color: #333;
        font-size: 1rem;
    }

    .card-stats span {
        font-size: 1.8rem;
        font-weight: bold;
        color: #333;
    }

    .card-header {
        background: linear-gradient(135deg, #6fb1fc, #5ca6f0);
        color: white;
        font-weight: 600;
        border: none;
    }

    .btn-outline-primary:hover {
        background-color: #0d6efd;
        color: white;
        border-color: #0d6efd;
        transition: all 0.3s ease;
    }

    footer {
        font-size: 0.9rem;
    }

    @media (max-width: 768px) {
        .card-stats {
            text-align: center;
        }
    }
</style>

<div class="dashboard-wrapper">
    <div class="container mt-4">
        <div class="card mb-4 shadow-sm border-0">
            <div class="card-header">
                <i class="fas fa-tachometer-alt me-2"></i> Admin Dashboard
            </div>

            <div class="card-body">
                <div class="pb-4">
                    Selamat datang, <strong>{{ Auth::user()->name }}</strong>! Anda login sebagai <strong>Administrator</strong>.
                </div>

                <div class="row g-4 mb-4">
                    <div class="col-md-4">
                        <div class="card dashboard-card text-center p-4 card-stats">
                            <div class="icon-box bg-gradient-blue">
                                <i class="fas fa-users"></i>
                            </div>
                            <h6>Total User</h6>
                            <span>{{ $totalUsers }}</span>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card dashboard-card text-center p-4 card-stats">
                            <div class="icon-box bg-gradient-orange">
                                <i class="fas fa-envelope-open-text"></i>
                            </div>
                            <h6>Laporan Belum Ditanggapi</h6>
                            <span>{{ $pendingReports }}</span>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card dashboard-card text-center p-4 card-stats">
                            <div class="icon-box bg-gradient-green">
                                <i class="fas fa-clipboard-check"></i>
                            </div>
                            <h6>Laporan Ditanggapi</h6>
                            <span>{{ $respondedReports }}</span>
                        </div>
                    </div>
                </div>

                <hr>

                <div class="row">
                    <div class="col-12">
                        <div class="dashboard-card p-4">
                            <h5 class="card-title mb-3">
                                <i class="fas fa-cogs me-2"></i> Manajemen User
                            </h5>
                            <p class="card-text text-muted">
                                Kelola data pengguna sistem, atur hak akses, dan lainnya.
                            </p>
                            <a href="{{ route('users.index') }}" class="btn btn-outline-primary">
                                <i class="fas fa-user-cog me-1"></i> Kelola User
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <footer class="text-center text-muted mt-4">
            &copy; {{ date('Y') }} Sistem Pengaduan Masyarakat. All rights reserved.
        </footer>
    </div>
</div>
@endsection