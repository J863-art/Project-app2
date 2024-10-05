<div class="sidebar border-right col-md-3 col-lg-2 p-0 bg-body-tertiary" style="height: 100vh;">
    <div class="offcanvas-md offcanvas-end bg-body-tertiary" tabindex="-1" id="sidebarMenu" aria-labelledby="sidebarMenuLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="sidebarMenuLabel">Company name</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" data-bs-target="#sidebarMenu" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body d-md-flex flex-column p-0 pt-lg-3 overflow-y-auto">
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center gap-2 {{ Request::is('dashboard') ? 'active text-white bg-primary' : '' }}" href="/dashboard">
                        <i data-feather="home"></i>
                        Dashboard
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center gap-2 {{ Request::is('events') ? 'active text-white bg-primary' : '' }}" href="/events">
                        <i data-feather="calendar"></i>
                        Acara
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center gap-2 {{ Request::is('artikel') ? 'active text-white bg-primary' : '' }}" href="/artikel">
                        <i data-feather="book-open"></i>
                        Artikel
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center gap-2 {{ Request::is('rapat') ? 'active text-white bg-primary' : '' }}" href="/rapat">
                        <i data-feather="archive"></i>
                        Rapat
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center gap-2 {{ Request::is('himbauan') ? 'active text-white bg-primary' : '' }}" href="/himbauan">
                        <i data-feather="alert-circle"></i>
                        Himbauan
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center gap-2 {{ Request::is('tagihan') ? 'active text-white bg-primary' : '' }}" href="/tagihan">
                        <i data-feather="dollar-sign"></i>
                        Tagihan
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
