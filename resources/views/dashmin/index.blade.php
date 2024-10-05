@extends('dashmin.layoutin.main')

@section('container')
@php
    if(auth()->guest()) {
        abort(403); // Jika tamu, blokir akses
    }

    if(auth()->user()->role !== 'admin') {
        abort(403); // Jika bukan admin, blokir akses
    }
@endphp
<div class="container-fluid p-4">
    <!-- Hero Section -->
    <div class="hero-section mb-4" style="background-color: #343a40; color: white; padding: 40px; border-radius: 15px;">
        <h1 class="fw-bold">Admin Dashboard</h1>
        <p class="lead">Selamat datang Admin Blerentsys, disini tugas anda adalah untuk mengurus dan mengelola sistm informasi ini.</p>
    </div>

    <!-- Information Cards Section -->
    <div class="row g-4 mb-4">
        <div class="col-md-4">
            <div class="card border-0 shadow-lg h-100" style="background-color: #007bff; color: white;">
                <div class="card-body text-center py-4">
                    <h2 class="fw-bold">Overview</h2>
                    <p class="card-text">Tetap aktif memantau informasi dan menambahkan atau update informasi terbaru.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card border-0 shadow-lg h-100" style="background-color: #28a745; color: white;">
                <div class="card-body text-center py-4">
                    <h2 class="fw-bold">User Management</h2>
                    <p class="card-text">Mengatur data-data user atau warga BlerentVilla.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card border-0 shadow-lg h-100" style="background-color: #ffc107; color: white;">
                <div class="card-body text-center py-4">
                    <h2 class="fw-bold">Payment Oversight</h2>
                    <p class="card-text">Memantau, membuat, dan mengkonfirmasi setiap pembayaran atau transaksi.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Admin Tasks Section -->
    <div class="mb-4">
        <h2 class="fw-bold">Current Admin Tasks</h2>
        <div class="card shadow-sm">
            <div class="card-body">
                <ul class="list-unstyled">
                    <li class="mb-2">
                        <span class="badge bg-info">Monitoring Informasi</span>
                    </li>
                    <li class="mb-2">
                        <span class="badge bg-success">Create, Update, and delet</span>
                    </li>
                    <li class="mb-2">
                        <span class="badge bg-warning">User Suport and Privacy </span>
                    </li>
                    <li class="mb-2">
                        <span class="badge bg-danger">Reporting</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Footer Section -->
    <footer class="text-center py-4" style="border-top: 1px solid #ddd;">
        <p class="mb-0">© 2024 Blerentsys. All Rights Reserved.</p>
        <small class="text-muted">Your trusted partner in rental management.</small>
    </footer>
</div>
@endsection
