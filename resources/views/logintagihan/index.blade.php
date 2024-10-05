@extends('layout.main')

@section('Halaman awal')
<div class="row justify-content-center">
    <div class="col-md-4">

        @if (session()->has('loginError'))
            <div class="alert alert-success alert-dismissble fade show" role="alert">
                {{ session('loginError') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                </button>
            </div>
        @endif

        <main class="form-signin w-100 m-auto">
            <h1 class="h3 mb-3 fw-normal text-center">Please Login</h1>
            <form action="/login" method= "post">
                @csrf

              <div class="form-floating">
                <input type="nik" name="nik" class="form-control @error('nik') is-invalid
                @enderror" id="id" placeholder="123.....nikexample" autofocus required>
                <label for="nik" style="left: 0; padding-left: 1px;">NIK</label>
                @error('nik')
                    <div class="invalid-feedback">
                        {{ $mesaage }}
                    </div>
                @enderror
              </div>
              <div class="form-floating">
                <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password" autofocus required>
                <label for="floatingPassword" style="left: 0; padding-left: 1px;">Password</label>
              </div>

              <button class="btn btn-primary w-100 py-2" type="submit">Sign in</button>

            </form>
        </main>
    </div>
</div>
@endsection
