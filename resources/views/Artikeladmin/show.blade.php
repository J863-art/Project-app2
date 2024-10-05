@extends('dashmin.layoutin.main')

@section('container')
    <article>
        <h2>{{ $artik->title }}</h2>

        @if($artik->author)
            <p>By: <a href="/authors/{{ $artik->author->username }}" class="text-decoration-none">{{ $artik->author->name }}</a></p>
        @else
            <p>By: Unknown Author</p>
        @endif

        {!! $artik->body !!}
    </article>

    <a href="/Artikeladmin">Back to Artikel</a>
@endsection
