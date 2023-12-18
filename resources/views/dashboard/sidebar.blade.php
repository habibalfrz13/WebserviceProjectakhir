<nav class="sidebar-nav scroll-sidebar" data-simplebar="">
    <ul id="sidebarnav">
        <li class="nav-small-cap">
            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
            <span class="hide-menu">Beranda</span>
        </li>
        <li class="sidebar-item">
            <a class="sidebar-link" href="{{ route('home') }}" aria-expanded="false">
                <span>
                    <i class="ti ti-layout-dashboard"></i>
                </span>
                <span class="hide-menu">Dashboard</span>
            </a>
        </li>
        {{-- Konten --}}
        <li class="nav-small-cap">
            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
            <span class="hide-menu">Konten</span>
        </li>
      
            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('users.index') }}" aria-expanded="false">
                    <span>
                        <i class="bi bi-person-lines-fill"></i>
                    </span>
                    <span class="hide-menu">User</span>
                </a>
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('kategoris.index') }}" aria-expanded="false">
                    <span>
                        <i class="bi bi-bookmarks"></i>
                    </span>
                    <span class="hide-menu">Kategori</span>
                </a>
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('kerajinans.index') }}" aria-expanded="false">
                    <span>
                        <i class="bi bi-postcard-heart-fill"></i>
                    </span>
                    <span class="hide-menu">Kerajinan</span>
                </a>
            </li>
     
        

    </ul>
</nav>
<!-- End Sidebar navigation -->