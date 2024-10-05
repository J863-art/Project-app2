@extends('dashmin.layoutin.main')

@section('container')
<div class="container">
    <h1>Daftar Rapat Admin</h1>
    <a href="{{ route('rapatadmin.create') }}" class="btn btn-primary mb-3">Tambah Rapat</a>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Tanggal</th>
                <th>Judul</th>
                <th>Lokasi</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>
            @foreach($rapat as $r)
                <tr>
                    <td>{{ $r->tanggal }}</td>
                    <td>{{ $r->judul }}</td>
                    <td>{{ $r->alamat }}</td>
                    <td>
                        <a href="{{ route('rapatadmin.show', $r->id) }}">Detail Rapat</a> <!-- Perbaikan di sini -->
                        <a href="{{ route('rapatadmin.edit', $r->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('rapatadmin.destroy', $r->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus himbauan ini?');" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
