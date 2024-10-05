@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-center align-items-center" style="height: 100vh;">
    <div class="text-center">
        <h1>Anda Belum Login, Login terlebih dahulu untuk melihat tagihan anda</h1>
        <li class="nav-item">
            <a href="/logintagihan" class="nav-link"><i class="bi bi-box-arrow-in-right"></i> Login</a>
        </li>
    </div>
</div>
@endsection
