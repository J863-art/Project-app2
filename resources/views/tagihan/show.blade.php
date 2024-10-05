@extends('dashboard.layouts.main')

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
                    <a href="{{ route('tagihan.download', $tagihan->id) }}" class="btn btn-primary">Download Bukti Pembayaran</a>
                @else
                    <span>Tidak ada bukti pembayaran</span>
                @endif
            </td>
        </tr>
    </table>

    @if(!$tagihan->bukti_pembayaran)
    <!-- Form untuk upload bukti pembayaran -->
    <form action="{{ route('tagihan.upload', $tagihan->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="bukti_pembayaran">Upload Bukti Pembayaran (PNG only):</label>
            <input type="file" name="bukti_pembayaran" class="form-control" accept="image/png" required>
        </div>
        <button type="submit" class="btn btn-success mt-2">Upload</button>
    </form>
    @endif

    @if($tagihan->bukti_pembayaran)
    <!-- Form untuk edit bukti pembayaran -->
    <form action="{{ route('tagihan.upload', $tagihan->id) }}" method="POST" enctype="multipart/form-data" class="mt-3">
        @csrf
        <div class="form-group">
            <label for="bukti_pembayaran">Edit Bukti Pembayaran (PNG only):</label>
            <input type="file" name="bukti_pembayaran" class="form-control" accept="image/png" required>
        </div>
        <button type="submit" class="btn btn-warning mt-2">Update</button>
    </form>
    @endif

    <a href="/tagihan" class="btn btn-secondary mt-3">Kembali</a>
</div>
@endsection
