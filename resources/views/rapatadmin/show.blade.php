@extends('dashmin.layoutin.main')

@section('container')
<div class="container">
    <h1>Detail Rapat</h1>
    <p><strong>Tanggal:</strong> {{ $rapat->tanggal }}</p>
    <p><strong>Judul:</strong> {{ $rapat->judul }}</p>
    <p><strong>Lokasi:</strong> {{ $rapat->alamat }}</p>
    <p><strong>Keputusan:</strong> {{ $rapat->keputusan }}</p>

    @if($rapat->dokumentasi)
        <p>
            <strong>Dokumentasi:</strong>
            <a href="{{ route('rapatadmin.download', $rapat->id) }}" class="btn btn-primary">Download PDF</a>
        </p>
    @else
        <p><strong>Dokumentasi:</strong> Tidak ada dokumentasi tersedia.</p>
    @endif

    <a href="{{ route('rapatadmin.index') }}" class="btn btn-secondary mt-3">Kembali ke Daftar Rapat</a>
</div>
@endsection
