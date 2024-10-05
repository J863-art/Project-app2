<div class="sidebar border-right col-md-3 col-lg-2 p-0 bg-body-tertiary" style="height: 100vh;">
    <div class="offcanvas-md offcanvas-end bg-body-tertiary" tabindex="-1" id="sidebarMenu" aria-labelledby="sidebarMenuLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="sidebarMenuLabel">Company name</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" data-bs-target="#sidebarMenu" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body d-md-flex flex-column p-0 pt-lg-3 overflow-y-auto">
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center gap-2 {{ Request::is('dashmin') ? 'active text-white bg-primary' : '' }}" href="/dashmin">
                        <i data-feather="home"></i>
                        Dashboard
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center gap-2 {{ Request::is('eventadmin') ? 'active text-white bg-primary' : '' }}" href="/eventadmin">
                        <i data-feather="calendar"></i>
                        Acara
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center gap-2 {{ Request::is('artikeladmin') ? 'active text-white bg-primary' : '' }}" href="/Artikeladmin">
                        <i data-feather="book-open"></i>
                        Artikel
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center gap-2 {{ Request::is('users') ? 'active text-white bg-primary' : '' }}" href="/users">
                        <i data-feather="users"></i>
                        Data Pengguna
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center gap-2 {{ Request::is('himbauanadmin') ? 'active text-white bg-primary' : '' }}" href="/himbauanadmin">
                        <i data-feather="alert-circle"></i>
                        Himbauan
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center gap-2 {{ Request::is('rapatadmin') ? 'active text-white bg-primary' : '' }}" href="/rapatadmin">
                        <i data-feather="archive"></i>
                        Rapat
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center gap-2 {{ Request::is('tagihanadmin') ? 'active text-white bg-primary' : '' }}" href="/tagihanadmin">
                        <i data-feather="dollar-sign"></i>
                        Tagihan
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
