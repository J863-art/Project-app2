@extends('dashmin.layoutin.main')

@section('container')

<h1>Halaman Users</h1>
<a href="{{ route('users.create') }}" class="btn btn-success mb-3">Tambah User</a>

<table class="table">
    <thead>
        <tr>
            <th>NIK</th>
            <th>Nama</th>
            <th>Username</th>
            <th>No Telepon</th>
            <th>Role</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)
        <tr>
            <td>{{ $user->nik }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->username }}</td>
            <td>{{ $user->no_telp }}</td>
            <td>{{ $user->role }}</td>
            <td>
                <form action="{{ route('users.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus user ini?');">
                    @csrf
                    @method('DELETE')
                    <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning">Edit</a>
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection
