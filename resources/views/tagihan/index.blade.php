@extends('dashboard.layouts.main')

@section('container')

<div class="container">

    <h2>Daftar Tagihan</h2>

    <table class="table">
        <thead>
            <tr>
                <th>Jenis Tagihan</th>
                <th>Status</th>
                <th>Jatuh Tempo</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tagihans as $tagihan)
            <tr>
                <td>{{ $tagihan->jenis_tagihan }}</td>
                <td>{{ $tagihan->status }}</td>
                <td>{{ $tagihan->jatuh_tempo }}</td>
                <td>
                    <a href="{{ route('tagihan.show', $tagihan->id) }}" class="btn btn-primary">Detail</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

</div>
@endsection
