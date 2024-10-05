

@extends('layout.main')

@section('Halaman awal')
<h1 class="mb-5">Kategori Artikel</h1>
    @foreach ($categories as $category )
    <ul>
        <li>
            <a href="/categories/{{ $category->slug }}">{{ $category->name }}</a></h2>
        </li>
    </ul>

        <h2>




    @endforeach
@endsection
