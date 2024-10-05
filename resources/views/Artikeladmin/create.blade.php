@extends('dashmin.layoutin.main')

@section('container')

<h1 class="mb-5">Tambah Artikel</h1>

<form action="/Artikeladmin" method="POST">
    @csrf

    <div class="mb-3">
        <label for="title" class="form-label">Judul Artikel</label>
        <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" required value="{{ old('title') }}">
        @error('title')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="excerpt" class="form-label">Excerpt</label>
        <textarea class="form-control @error('excerpt') is-invalid @enderror" id="excerpt" name="excerpt" required>{{ old('excerpt') }}</textarea>
        @error('excerpt')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="body" class="form-label">Isi Artikel</label>
        <textarea class="form-control @error('body') is-invalid @enderror" id="body" name="body" required>{{ old('body') }}</textarea>
        @error('body')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>

    <button type="submit" class="btn btn-primary">Tambah Artikel</button>
</form>

@endsection
