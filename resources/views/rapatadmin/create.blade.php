@extends('dashmin.layoutin.main')

@section('container')
<div class="container">
    <h1>Tambah Rapat Baru</h1>
    <form action="{{ route('rapatadmin.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="tanggal" class="form-label">Tanggal</label>
            <input type="date" class="form-control" id="tanggal" name="tanggal" required>
        </div>
        <div class="mb-3">
            <label for="judul" class="form-label">Judul</label>
            <input type="text" class="form-control" id="judul" name="judul" required>
        </div>
        <div class="mb-3">
            <label for="alamat" class="form-label">Lokasi</label>
            <input type="text" class="form-control" id="alamat" name="alamat" required>
        </div>
        <div class="mb-3">
            <label for="keputusan" class="form-label">Keputusan</label>
            <textarea class="form-control" id="keputusan" name="keputusan" required></textarea>
        </div>
        <div class="mb-3">
            <label for="dokumentasi" class="form-label">Dokumentasi (PDF)</label>
            <input type="file" class="form-control" id="dokumentasi" name="dokumentasi" accept="application/pdf">
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
