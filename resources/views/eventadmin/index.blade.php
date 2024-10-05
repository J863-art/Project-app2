@extends('dashmin.layoutin.main')

@section('container')

    <h1>Halaman Acara</h1>

    <!-- Tombol Tambah Acara -->
    <a href="{{ route('eventadmin.create') }}" class="btn btn-success mb-3">Tambah Acara</a>

    <table class="table">
        <thead>
            <tr>
                <th>Judul Acara</th>
                <th>Alamat</th>
                <th>Tanggal</th>
                <th>Keterangan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($events as $event)
                <tr>
                    <td>{{ $event->event_name }}</td>
                    <td>{{ $event->address }}</td>
                    <td>{{ \Carbon\Carbon::parse($event->schedule)->format('d-m-Y H:i') }}</td>
                    <td>{{ $event->ket }}</td>
                    <td>
                        <div class="d-flex">
                            <a href="{{ route('eventadmin.show', $event->id) }}" class="btn btn-info me-2">Detail</a>
                            <form action="{{ route('eventadmin.destroy', $event->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus acara ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

@endsection
