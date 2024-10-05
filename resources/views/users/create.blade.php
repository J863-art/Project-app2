@extends('dashmin.layoutin.main')

@section('container')

<h1>Tambah User</h1>

<form action="{{ route('users.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="nik" class="form-label">NIK</label>
        <input type="text" name="nik" id="nik" class="form-control" required>
    </div>

    <div class="mb-3">
        <label for="name" class="form-label">Nama</label>
        <input type="text" name="name" id="name" class="form-control" required>
    </div>

    <div class="mb-3">
        <label for="username" class="form-label">Username</label>
        <input type="text" name="username" id="username" class="form-control" required>
    </div>

    <div class="mb-3">
        <label for="no_telp" class="form-label">No Telepon</label>
        <input type="text" name="no_telp" id="no_telp" class="form-control" required>
    </div>

    <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" name="password" id="password" class="form-control" required>
        @error('password')
            <div class="text-danger">{{ $message }}</div> <!-- Menampilkan pesan error -->
        @enderror
    </div>

    <div class="mb-3">
        <label for="role" class="form-label">Role</label>
        <select name="role" id="role" class="form-select" required>
            <option value="admin">Admin</option>
            <option value="user">User</option>
        </select>
    </div>

    <button type="submit" class="btn btn-success">Tambah User</button>
</form>

@endsection
