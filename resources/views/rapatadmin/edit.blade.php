@extends('dashmin.layoutin.main')

@section('container')

<div class="container">

    <h1>Edit Rapat</h1>

    <form action="{{ route('rapatadmin.update', $rapat) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="tanggal" class="form-label">Tanggal</label>
            <input type="date" class="form-control" id="tanggal" name="tanggal" value="{{ $rapat->tanggal }}" required>
        </div>

        <div class="mb-3">
            <label for="judul" class="form-label">Judul</label>
            <input type="text" class="form-control" id="judul" name="judul" value="{{ $rapat->judul }}" required>
        </div>

        <div class="mb-3">
            <label for="alamat" class="form-label">Lokasi</label>
            <input type="text" class="form-control" id="alamat" name="alamat" value="{{ $rapat->alamat }}" required>
        </div>

        <div class="mb-3">
            <label for="keputusan" class="form-label">Keputusan</label>
            <textarea class="form-control" id="keputusan" name="keputusan" required>{{ $rapat->keputusan }}</textarea>
        </div>

        <div class="mb-3">
            <label for="dokumentasi" class="form-label">Dokumentasi (PDF)</label>
            <input type="file" class="form-control" id="dokumentasi" name="dokumentasi" accept="application/pdf">
        </div>

        <button type="submit" class="btn btn-primary">Perbarui Rapat</button>
        <a href="{{ route('rapatadmin.index') }}" class="btn btn-secondary">Kembali</a>
    </form>

</div>

@endsection
