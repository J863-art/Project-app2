@extends('dashmin.layoutin.main')

@section('container')

<h1>Edit User</h1>

<form action="{{ route('users.update', $user->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label for="nik" class="form-label">NIK</label>
        <input type="text" name="nik" id="nik" class="form-control" value="{{ $user->nik }}" required>
    </div>

    <div class="mb-3">
        <label for="name" class="form-label">Nama</label>
        <input type="text" name="name" id="name" class="form-control" value="{{ $user->name }}" required>
    </div>

    <div class="mb-3">
        <label for="username" class="form-label">Username</label>
        <input type="text" name="username" id="username" class="form-control" value="{{ $user->username }}" required>
    </div>

    <div class="mb-3">
        <label for="no_telp" class="form-label">No Telepon</label>
        <input type="text" name="no_telp" id="no_telp" class="form-control" value="{{ $user->no_telp }}" required>
    </div>

    <div class="mb-3">
        <label for="password" class="form-label">Password (kosongkan jika tidak diubah)</label>
        <input type="password" name="password" id="password" class="form-control">
    </div>

    <div class="mb-3">
        <label for="role" class="form-label">Role</label>
        <select name="role" id="role" class="form-select" required>
            <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
            <option value="user" {{ $user->role == 'user' ? 'selected' : '' }}>User</option>
        </select>
    </div>

    <button type="submit" class="btn btn-success">Update User</button>
</form>

@endsection
