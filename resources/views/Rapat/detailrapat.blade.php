@extends('dashboard.layouts.main')

@section('container')
<div class="container mt-4">
    <div class="card shadow-lg border-primary mb-3">
        <div class="card-body">
            <h5 class="card-title">Detail Rapat</h5>
            <ul class="list-unstyled">
                <li><strong>Tanggal:</strong> {{ $rapat->tanggal }}</li>
                <li><strong>Judul:</strong> {{ $rapat->judul }}</li>
                <li><strong>Alamat:</strong> {{ $rapat->alamat }}</li>
                <li><strong>Keputusan:</strong> {{ $rapat->keputusan }}</li>
                @if($rapat->dokumentasi)
                    <li>
                        <strong>Dokumentasi:</strong>
                        <a href="{{ route('rapat.download', $rapat->id) }}" class="btn btn-primary">Download PDF</a>
                    </li>
                @else
                    <li><strong>Dokumentasi:</strong> Tidak ada dokumentasi tersedia.</li>
                @endif
            </ul>
            <a href="{{ route('rapat.index') }}" class="btn btn-primary mt-3">Kembali</a>
        </div>
    </div>
</div>
@endsection
