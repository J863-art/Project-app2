

@extends('layout.main')

@section('Halaman awal')
<h1 class="mb-5">Kategori Artikel : {{ $category }} </h1>
    @foreach ($artikel as $artik )
    <article class="mb-5">
        <h2>
            <a href="/artikel/{{ $artik->slug }}">{{ $artik->title }}</a></h2>
            <p>{{ $artik->excerpt }}</p>

    </article>
    @endforeach
@endsection
