@extends('dashmin.layoutin.main')

@section('container')

    <h1>Tambah Himbauan</h1>

    <form action="{{ route('himbauanadmin.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="judul" class="form-label">Judul</label>
            <input type="text" name="judul" id="judul" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="ket" class="form-label">Keterangan</label>
            <textarea name="ket" id="ket" class="form-control" required></textarea>
        </div>

        <div class="mb-3">
            <label for="created_by" class="form-label">Dibuat Oleh</label>
            <input type="text" name="created_by" id="created_by" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-success">Tambah Himbauan</button>
    </form>

@endsection
