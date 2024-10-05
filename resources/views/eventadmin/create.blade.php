@extends('dashmin.layoutin.main')

@section('container')

    <h1>Tambah Acara</h1>

    <form action="{{ route('eventadmin.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="event_name" class="form-label">Judul Acara</label>
            <input type="text" class="form-control" id="event_name" name="event_name" required>
        </div>

        <div class="mb-3">
            <label for="address" class="form-label">Alamat</label>
            <input type="text" class="form-control" id="address" name="address" required>
        </div>

        <div class="mb-3">
            <label for="schedule" class="form-label">Tanggal</label>
            <input type="datetime-local" class="form-control" id="schedule" name="schedule" required>
        </div>

        <div class="mb-3">
            <label for="ket" class="form-label">Keterangan</label>
            <textarea class="form-control" id="ket" name="ket" rows="3" required></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Tambah Acara</button>
    </form>

@endsection
