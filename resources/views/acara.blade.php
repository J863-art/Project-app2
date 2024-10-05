@extends('layout.main')

@section('Halaman awal')
    <h1>Halaman Acara</h1>
    <h3>{{ $nama }}</h3>
    <p>{{ $email }}</p>
    <img src="img/{{ $image }}" alt="{{ $nama }}" width="100">
@endsection
