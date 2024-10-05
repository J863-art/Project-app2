@extends('dashmin.layoutin.main')

@section('container')

    <h1>Edit Himbauan</h1>

    <form action="{{ route('himbauanadmin.update', $himbauan->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="judul" class="form-label">Judul</label>
            <input type="text" name="judul" id="judul" class="form-control" value="{{ $himbauan->judul }}" required>
        </div>

        <div class="mb-3">
            <label for="ket" class="form-label">Keterangan/Isi</label>
            <textarea name="ket" id="ket" class="form-control" required>{{ $himbauan->ket }}</textarea>
        </div>

        <div class="mb-3">
            <label for="created_by" class="form-label">Dibuat Oleh</label>
            <input type="text" name="created_by" id="created_by" class="form-control" value="{{ $himbauan->created_by }}" required>
        </div>

        <button type="submit" class="btn btn-success">Update Himbauan</button>
    </form>

@endsection
