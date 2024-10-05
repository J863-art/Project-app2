<header class="navbar sticky-top bg-dark flex-md-nowrap p-0 shadow" data-bs-theme="dark">
    <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6 text-white" href="#">Blerentsys</a>

    <ul class="navbar-nav ms-auto">
        @auth
        <li class="nav-item dropdown position-relative">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Welcome Back, {{ auth()->user()->name }}
            </a>
            <ul class="dropdown-menu dropdown-menu-end">
              <!-- Menampilkan profile -->
              <li><a class="dropdown-item" href="#">
                <i class="bi bi-person-circle"></i> Username: {{ auth()->user()->username }}
              </a></li>
              <li><a class="dropdown-item" href="#">
                <i class="bi bi-key"></i> Password: ••••••••
              </a></li>
              <li><a class="dropdown-item" href="#">
                <i class="bi bi-phone"></i> No. Telp: {{ auth()->user()->no_telp }}
              </a></li>

              <!-- Link ke halaman edit profil -->
              <li><a class="dropdown-item" href="{{ route('dashmin.profile.edit') }}">
                <i class="bi bi-pencil"></i> Edit Profile
              </a></li>

              <li><hr class="dropdown-divider"></li>
              <!-- Tombol logout -->
              <form action="/logout" method="POST">
                  @csrf
                  <button type="submit" class="dropdown-item">
                    <i class="bi bi-box-arrow-right"></i> Logout
                  </button>
              </form>
            </ul>
        </li>
        @else
        <li class="nav-item">
            <a href="/login" class="nav-link"><i class="bi bi-box-arrow-in-right"></i> Login</a>
        </li>
        @endauth
    </ul>
</header>
