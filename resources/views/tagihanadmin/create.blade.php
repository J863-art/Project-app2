@extends('dashmin.layoutin.main')

@section('container')
<div class="container">
    <h2>Buat Tagihan Baru</h2>

    <form action="{{ route('tagihanadmin.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nik">NIK:</label>
            <input type="text" name="nik" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="jenis_tagihan">Jenis Tagihan:</label>
            <input type="text" name="jenis_tagihan" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="status">Status:</label>
            <input type="text" name="status" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="jatuh_tempo">Jatuh Tempo:</label>
            <input type="date" name="jatuh_tempo" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success mt-2">Simpan Tagihan</button>
    </form>

    <a href="{{ route('tagihanadmin.index') }}" class="btn btn-secondary mt-3">Kembali</a>
</div>
@endsection
