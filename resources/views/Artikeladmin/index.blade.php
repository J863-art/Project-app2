@extends('dashmin.layoutin.main')

@section('container')

<h1 class="mb-5">Halaman Artikel Admin</h1>

<!-- Tombol Tambah Artikel -->
<a href="/Artikeladmin/create" class="btn btn-primary mb-3">Tambah Artikel</a>

<div class="row">
    @foreach ($artikel as $artik)
        <div class="col-md-6">
            <div class="card mb-4">
                <div class="card-body">
                    <h2>
                        <a href="{{ route('Artikeladmin.show', $artik->slug) }}" class="text-decoration-none">{{ $artik->title }}</a>

                        <!-- Tombol Update -->
                        <a href="{{ route('Artikeladmin.edit', $artik->id) }}" class="btn btn-warning btn-sm float-end">Edit</a>
                    </h2>

                    <!-- Tombol Delete -->
                    <form action="{{ route('Artikeladmin.destroy', $artik->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm float-end" onclick="return confirm('Apakah Anda yakin ingin menghapus artikel ini?');">Hapus</button>
                    </form>

                    <p>
                        By:
                        @if($artik->author)
                            <a href="/admin/authors/{{ $artik->author->username }}" class="text-decoration-none">{{ $artik->author->name }}</a>
                        @else
                            <span class="text-muted">Unknown Author</span>
                        @endif
                    </p>
                    <p>{{ $artik->excerpt }}</p>
                    <a href="{{ route('Artikeladmin.show', $artik->slug) }}" class="btn btn-secondary btn-sm">Read More...</a>
                </div>
            </div>
        </div>
    @endforeach
</div>

@endsection
