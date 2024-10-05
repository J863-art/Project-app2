@extends('dashboard.layouts.main')

@section('container')
<div class="container">
    <h1 class="my-4">Himbauan</h1>
    <div class="row">
        @foreach($himbauans as $himbauan)
            <div class="col-md-4 mb-4"> <!-- Ubah ukuran kolom sesuai kebutuhan -->
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ $himbauan->judul }}</h5>
                        <p class="card-text">{{ $himbauan->ket }}</p>
                        <p class="card-text"><small class="text-muted">Dibuat oleh: {{ $himbauan->created_by }}</small></p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
