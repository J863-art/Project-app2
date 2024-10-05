@extends('dashmin.layoutin.main')

@section('container')

    <h1>Halaman Himbauan</h1>

    <!-- Tombol Tambah Himbauan -->
    <a href="{{ route('himbauanadmin.create') }}" class="btn btn-success mb-3">Tambah Himbauan</a>

    <table class="table">
        <thead>
            <tr>
                <th>Judul</th>
                <th>Keterangan/Isi</th>
                <th>Dibuat Oleh</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($himbauan as $item)
                <tr>
                    <td>{{ $item->judul }}</td>
                    <td>{{ $item->ket }}</td>
                    <td>{{ $item->created_by }}</td>
                    <td>
                        <!-- Tombol Edit -->
                        <a href="{{ route('himbauanadmin.edit', $item->id) }}" class="btn btn-warning">Edit</a>

                        <form action="{{ route('himbauanadmin.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus himbauan ini?');" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

@endsection
