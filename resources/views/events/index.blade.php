@extends('dashboard.layouts.main')

@section('container')

    <h1>Halaman Acara</h1> <!-- Menampilkan judul yang disediakan oleh controller -->

    <div class="undangan-container" style="display: flex; flex-wrap: wrap; gap: 20px;">

        @foreach ($events as $event)
            <div class="undangan" style="flex: 1 1 calc(50% - 20px); border: 1px solid #ddd; border-radius: 8px; padding: 20px; background-color: #f9f9f9; box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);">
                <h2>{{ $event->event_name }}</h2>
                <p><strong>Alamat:</strong> {{ $event->address }}</p>
                <p><strong>Tanggal:</strong> {{ \Carbon\Carbon::parse($event->schedule)->format('d-m-Y H:i') }}</p>
                <p><strong>Keterangan:</strong> {{ $event->ket }}</p>
            </div>
        @endforeach

    </div>

@endsection
