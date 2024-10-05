@extends('dashboard.layouts.main')

@section('container')

<div class="bg-white py-24 sm:py-32">
  <div class="mx-auto max-w-7xl px-6 lg:px-8">
    <div class="mx-auto max-w-2xl lg:mx-0">
      <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Halaman Artikel</h2>
      <p class="mt-2 text-lg leading-8 text-gray-600">Temukan artikel terbaru kami di bawah ini.</p>
    </div>
    <div class="mx-auto mt-10 grid grid-cols-1 gap-x-8 gap-y-16 sm:grid-cols-2 lg:grid-cols-3">
      @foreach ($artikel as $artik)
      <div class="max-w-sm rounded overflow-hidden shadow-lg">
        <article class="flex flex-col items-start justify-between p-4">
          <div class="flex items-center gap-x-4 text-xs mb-2">
            <time datetime="{{ $artik->created_at->format('Y-m-d') }}" class="text-gray-500">{{ $artik->created_at->format('M d, Y') }}</time>
          </div>
          <div class="group relative">
            <h3 class="mt-2 text-lg font-semibold leading-6 text-gray-900 group-hover:text-gray-600">
              <a href="/artikel/{{ $artik->slug }}">
                <span class="absolute inset-0"></span>
                {{ $artik->title }}
              </a>
            </h3>
            @if($artik->author)
              <p class="mt-1 text-sm leading-6 text-gray-600">
                By: <a href="/authors/{{ $artik->author->username }}" class="text-decoration-none">{{ $artik->author->name }}</a>
              </p>
            @else
              <p class="mt-1 text-sm leading-6 text-gray-600">By: Unknown Author</p>
            @endif
            <p class="mt-5 line-clamp-3 text-sm leading-6 text-gray-600">{{ $artik->excerpt }}</p>
          </div>
          <div class="relative mt-4">
            <a href="/artikel/{{ $artik->slug }}" class="text-decoration-none text-blue-600 hover:underline">Read More...</a>
          </div>
        </article>
      </div>
      @endforeach
    </div>
  </div>
</div>

@endsection
