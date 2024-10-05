@extends('dashmin.layoutin.main')

@section('container')

<h1 class="mb-5">Edit Artikel</h1>

<form action="{{ route('Artikeladmin.update', $artikel->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label for="title" class="form-label">Judul</label>
        <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $artikel->title) }}" required>
    </div>

    <div class="mb-3">
        <label for="excerpt" class="form-label">Excerpt</label>
        <textarea class="form-control" id="excerpt" name="excerpt" required>{{ old('excerpt', $artikel->excerpt) }}</textarea>
    </div>

    <div class="mb-3">
        <label for="body" class="form-label">Isi</label>
        <textarea class="form-control" id="body" name="body" required>{{ old('body', $artikel->body) }}</textarea>
    </div>

    <button type="submit" class="btn btn-primary">Update Artikel</button>
</form>

@endsection
