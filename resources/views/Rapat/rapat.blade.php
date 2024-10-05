@extends('dashboard.layouts.main')

@section('container')
<div class="container">
    <h1>Daftar Rapat</h1>
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
                        <a href="{{ route('rapat.show', $r->id) }}" class="btn btn-info">Lihat Detail</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
