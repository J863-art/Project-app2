@extends('dashboard.layouts.main')

@section('container')
    <div class="container mt-4">
        <div class="card shadow-lg border-primary" style="background-color: #f8f9fa;">
            <div class="card-body">
                <h2 class="card-title">{{ $artik->title }}</h2>
                <h6 class="card-subtitle mb-2 text-muted">
                    By: <a href="/authors/{{ $artik->author->username }}" class="text-decoration-none">{{ $artik->author->name }}</a>
                    | Created at: {{ $artik->created_at->format('d M Y') }}
                </h6>
                <div class="card-text">
                    {!! $artik->body !!}
                </div>
            </div>
        </div>
        <a href="/artikel" class="btn btn-primary mt-3">Back to Artikel</a>
    </div>
@endsection
