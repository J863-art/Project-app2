@extends('dashmin.layoutin.main')

@section('container')

    <h1>Detail Acara</h1>

    <form action="{{ route('eventadmin.update', $event->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="event_name" class="form-label">Judul Acara</label>
            <input type="text" class="form-control" id="event_name" name="event_name" value="{{ $event->event_name }}" required>
        </div>

        <div class="mb-3">
            <label for="address" class="form-label">Alamat</label>
            <input type="text" class="form-control" id="address" name="address" value="{{ $event->address }}" required>
        </div>

        <div class="mb-3">
            <label for="schedule" class="form-label">Tanggal</label>
            <input type="datetime-local" class="form-control" id="schedule" name="schedule" value="{{ \Carbon\Carbon::parse($event->schedule)->format('Y-m-d\TH:i') }}" required>
        </div>

        <div class="mb-3">
            <label for="ket" class="form-label">Keterangan</label>
            <textarea class="form-control" id="ket" name="ket" rows="3" required>{{ $event->ket }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>

@endsection
