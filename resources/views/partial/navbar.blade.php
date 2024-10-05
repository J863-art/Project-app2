<nav class="navbar navbar-expand-lg navbar-dark bg-danger">
    <div class="container">
      <a class="navbar-brand" href="/"></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        {{-- <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link {{ ($title === "Home") ? 'active' : '' }}" href="/">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ ($title === "Acara") ? 'active' : '' }}" href="/acara">Acara</a> <!-- Ubah href -->
          </li>
          <li class="nav-item">
            <a class="nav-link {{ ($title === "Events") ? 'active' : '' }}" href="/events">Events</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ ($title === "Artikel") ? 'active' : '' }}" href="/artikel">Artikel</a> <!-- Ubah href -->
          </li>
          <li class="nav-item">
            <a class="nav-link {{ ($title === "Rapat") ? 'active' : '' }}" href="/rapat">Rapat</a> <!-- Ubah href -->
          </li>
        </ul> --}}

        {{-- <ul class="navbar-nav ms-auto">
            @auth
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Welcome Back, {{ auth()->user()->name }}
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="#"><i class="bi bi-layout-text-sidebar-reverse"></i> My Dashboard</a></li>
                  <li><hr class="dropdown-divider"></li>

                  <form action="/logout" method = "post">
                        @csrf
                        <button type="submit" class="dropdown-item"><i class="bi bi-box-arrow-right"></i> Logout</button>
                  </form>

                </ul>
              </li>


            @else
            <li class="nav-item">
                <a href="/login" class="nav-link {{ ($title === "Login") ? 'active' : '' }}"><i class="bi bi-box-arrow-in-right"></i> Login</a>
            </li>
            @endauth
        </ul> --}}


      </div>
    </div>
  </nav>
