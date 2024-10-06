@extends('dashboard.layouts.main')

@section('container')
    <div class="container-fluid p-4">
        <!-- Hero Section with Background Image -->
        <div class="hero-section position-relative mb-4" style="background: url('/path/to/your/hero-image.jpg') no-repeat center center; background-size: cover; height: 350px; border-radius: 15px;">
            <div class="overlay position-absolute w-100 h-100" style="background: rgba(0, 0, 0, 0.5); border-radius: 15px;"></div>
            <div class="hero-content text-white position-absolute w-100 h-100 d-flex justify-content-center align-items-center flex-column text-center">
                <h1 class="fw-bold display-4">Selamat Datang di Blerentsys</h1>
                <p class="lead">Website sistem informasi dari BlerentVilla</p>
            </div>
        </div>

        <!-- Colorful Cards Section -->
        <div class="row g-4 mb-4">
            <div class="col-md-4">
                <div class="card border-0 shadow-lg h-100" style="background-color: #FF6363;">
                    <div class="card-body text-center text-white py-5">
                        <i class="feather-icon icon-home display-4 mb-3"></i>
                        <h3 class="card-title fw-bold">Informasi</h3>
                        <p class="card-text">Terdapat Informasi seperti acara, himbauan, dan Rapat.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card border-0 shadow-lg h-100" style="background-color: #36B5B0;">
                    <div class="card-body text-center text-white py-5">
                        <i class="feather-icon icon-dollar-sign display-4 mb-3"></i>
                        <h3 class="card-title fw-bold">Mudah Diakses</h3>
                        <p class="card-text">Siapapun dapat mengunjungi website ini dimanapun dan kapanpun.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card border-0 shadow-lg h-100" style="background-color: #FFB236;">
                    <div class="card-body text-center text-white py-5">
                        <i class="feather-icon icon-users display-4 mb-3"></i>
                        <h3 class="card-title fw-bold">Transaksi Mudah</h3>
                        <p class="card-text">Website dapat menyediakan pembayaran seperti Iuran dll dengan mudah.</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Esthetic Section with Background Color and Icons -->
        <div class="d-flex justify-content-between align-items-center p-5 mb-4" style="background-color: #F8F9FA; border-radius: 15px;">
            <div class="text-section">
                <h2 class="fw-bold text-dark">Need Assistance?</h2>
                <p class="text-muted">Silahkan Kontak kami di: 0822815655555.</p>
            </div>
        </div>

        <!-- Footer Section -->
        <footer class="text-center py-4 mt-4" style="border-top: 1px solid #ddd;">
            <p class="mb-0">© 2024 Blerentsys. All Rights Reserved.</p>
        </footer>
    </div>
@else
@endif
@endsection
