@extends('dashmin.layoutin.main')

@section('container')
<div class="container">
    <h2>Detail Tagihan</h2>
    <table class="table">
        <tr>
            <th>NIK</th>
            <td>{{ $tagihan->nik }}</td>
        </tr>
        <tr>
            <th>Jenis Tagihan</th>
            <td>{{ $tagihan->jenis_tagihan }}</td>
        </tr>
        <tr>
            <th>Status</th>
            <td>{{ $tagihan->status }}</td>
        </tr>
        <tr>
            <th>Jatuh Tempo</th>
            <td>{{ $tagihan->jatuh_tempo }}</td>
        </tr>
        <tr>
            <th>Bukti Pembayaran</th>
            <td>
                @if($tagihan->bukti_pembayaran)
                    <a href="{{ route('tagihanadmin.download', $tagihan->id) }}" class="btn btn-primary">Download Bukti Pembayaran</a>
                @else
                    <span>Tidak ada bukti pembayaran</span>
                @endif
            </td>
        </tr>
    </table>

    {{-- <!-- Form untuk upload bukti pembayaran jika belum ada -->
    @if(!$tagihan->bukti_pembayaran)
    <form action="{{ route('tagihanadmin.upload', $tagihan->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="bukti_pembayaran">Upload Bukti Pembayaran (PNG only):</label>
            <input type="file" name="bukti_pembayaran" class="form-control" accept="image/png" required>
        </div>
        <button type="submit" class="btn btn-success mt-2">Upload</button>
    </form>
    @endif --}}



    <!-- Form untuk update detail tagihan -->
    <form action="{{ route('tagihanadmin.update', $tagihan->id) }}" method="POST" class="mt-5">
        @csrf
        @method('PUT')
        <h3>Update Detail Tagihan</h3>
        <div class="form-group">
            <label for="nik">NIK:</label>
            <input type="text" name="nik" class="form-control" value="{{ $tagihan->nik }}" required readonly>
        </div>
        <div class="form-group">
            <label for="jenis_tagihan">Jenis Tagihan:</label>
            <input type="text" name="jenis_tagihan" class="form-control" value="{{ $tagihan->jenis_tagihan }}" required>
        </div>
        <div class="form-group">
            <label for="status">Status:</label>
            <input type="text" name="status" class="form-control" value="{{ $tagihan->status }}" required>
        </div>
        <div class="form-group">
            <label for="jatuh_tempo">Jatuh Tempo:</label>
            <input type="date" name="jatuh_tempo" class="form-control" value="{{ $tagihan->jatuh_tempo }}" required>
        </div>
        <button type="submit" class="btn btn-info mt-2">Update Tagihan</button>
    </form>

    <a href="{{ route('tagihanadmin.index') }}" class="btn btn-secondary mt-3">Kembali</a>
</div>
@endsection
