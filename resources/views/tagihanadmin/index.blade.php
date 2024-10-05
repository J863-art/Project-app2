@extends('dashmin.layoutin.main')

@section('container')

<div class="container">

    <h2>Daftar Tagihan</h2>

    <!-- Tombol untuk membuat tagihan baru -->
    <a href="{{ route('tagihanadmin.create') }}" class="btn btn-success mb-3">Buat Tagihan Baru</a>

    <table class="table">
        <thead>
            <tr>
                <th>NIK</th>
                <th>Jenis Tagihan</th>
                <th>Status</th>
                <th>Jatuh Tempo</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tagihans as $tagihan)
            <tr>
                <td>{{ $tagihan->nik }}</td>
                <td>{{ $tagihan->jenis_tagihan }}</td>
                <td>{{ $tagihan->status }}</td>
                <td>{{ $tagihan->jatuh_tempo }}</td>
                <td>
                    <a href="{{ route('tagihanadmin.edit', $tagihan->id) }}" class="btn btn-primary">Detail</a>

                    <!-- Tombol Delete -->
                    <form action="{{ route('tagihanadmin.destroy', $tagihan->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus tagihan ini?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

</div>
@endsection
