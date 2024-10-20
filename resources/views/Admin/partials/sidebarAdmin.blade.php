<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
        <a class="sidebar-brand brand-logo" href="index.html">
            <span class="logo-text">Concertly</span>
        </a>

        <a class="sidebar-brand brand-logo-mini" href="index.html"><img src="assets/images/logo-mini.svg"
                alt="logo" /></a>
    </div>
    <ul class="nav">
        <li class="nav-item profile">
            <div class="profile-desc">
                <div class="profile-pic">
                    <div class="count-indicator">
                        <img class="img-xs rounded-circle " src="images/logo-hitam.png" alt="">
                        <span class="count bg-success"></span>
                    </div>
                    <div class="profile-name">
                        <h5 class="mb-0 font-weight-normal">Admin</h5>
                        <span>Admin ConcertLy</span>
                    </div>
                </div>
                <a href="#" id="profile-dropdown" data-bs-toggle="dropdown"><i
                        class="mdi mdi-dots-vertical"></i></a>
                <div class="dropdown-menu dropdown-menu-right sidebar-dropdown preview-list"
                    aria-labelledby="profile-dropdown">
                    <a href="#" class="dropdown-item preview-item">
                        <div class="preview-thumbnail">
                            <div class="preview-icon bg-dark rounded-circle">
                                <i class="mdi mdi-cog text-primary"></i>
                            </div>
                        </div>
                        <div class="preview-item-content">
                            <p class="preview-subject ellipsis mb-1 text-small">Account settings</p>
                        </div>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item preview-item">
                        <div class="preview-thumbnail">
                            <div class="preview-icon bg-dark rounded-circle">
                                <i class="mdi mdi-onepassword  text-info"></i>
                            </div>
                        </div>
                        <div class="preview-item-content">
                            <p class="preview-subject ellipsis mb-1 text-small">Change Password</p>
                        </div>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item preview-item">
                        <div class="preview-thumbnail">
                            <div class="preview-icon bg-dark rounded-circle">
                                <i class="mdi mdi-calendar-today text-success"></i>
                            </div>
                        </div>
                        <div class="preview-item-content">
                            <p class="preview-subject ellipsis mb-1 text-small">To-do list</p>
                        </div>
                    </a>
                </div>
            </div>
        </li>
        <li class="nav-item nav-category">
            <span class="nav-link">Navigation</span>
        </li>
        <li class="nav-item menu-items">
            <a class="nav-link {{ request()->routeIs('dashboard-page') ? 'active' : '' }}"
                href="{{ route('dashboard-page') }}">
                <span class="menu-icon">
                    <i class="mdi mdi-speedometer"></i>
                </span>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        <li class="nav-item menu-items">
            <a class="nav-link {{ request()->routeIs('eventpage') ? 'active' : '' }}" href="{{ route('eventpage') }}">
                <span class="menu-icon">
                    <i class="mdi mdi-calendar-week"></i>
                </span>
                <span class="menu-title">Daftar Event Konser</span>
            </a>
        </li>
        <li class="nav-item menu-items">
            <a class="nav-link {{ request()->routeIs('detailPembelian') ? 'active' : '' }}"
                href="{{ route('detailPembelian') }}">
                <span class="menu-icon">
                    <i class="mdi mdi-basket-outline"></i>
                </span>
                <span class="menu-title">Detail Pembelian Tiket</span>
            </a>
        </li>
        <li class="nav-item menu-items">
            <a class="nav-link {{ request()->routeIs('userpage') ? 'active' : '' }}" href="{{ route('userpage') }}">
                <span class="menu-icon">
                    <i class="mdi mdi-folder-account"></i>
                </span>
                <span class="menu-title">Kelola Pengguna</span>
            </a>
        </li>
        <li class="nav-item menu-items">
            <a class="nav-link {{ request()->routeIs('emailpage') ? 'active' : '' }}" href="{{ route('emailpage') }}">
                <span class="menu-icon">
                    <i class="mdi mdi-email"></i>
                </span>
                <span class="menu-title">Pengaturan Email</span>
            </a>
        </li>
        <li class="nav-item menu-items">
            <a class="nav-link {{ request()->routeIs('reportpage') ? 'active' : '' }}"
                href="{{ route('reportpage') }}">
                <span class="menu-icon">
                    <i class="mdi mdi-book-open-blank-variant-outline"></i>
                </span>
                <span class="menu-title">Laporan Penjualan</span>
            </a>
        </li>
    </ul>
</nav>
