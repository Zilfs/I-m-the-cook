<aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 "
    id="sidenav-main">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
            aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0" href="{{ route('index') }}">
            <img src="/template/assets/img/app-icon.png" class="navbar-brand-img h-100" alt="main_logo">
            <span class="ms-1 font-weight-bold">I'm the cook restaurant</span>
        </a>
    </div>
    <hr class="horizontal dark mt-0">
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
        <ul class="navbar-nav">
            @if (Auth::user()->role == 'ADMIN')
                <li class="nav-item">
                    <a class="nav-link " href="{{ route('menu.index') }}">
                        <div
                            class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="fa fa-book text-success text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Menu</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="{{ route('meja.index') }}">
                        <div
                            class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="fa fa-table text-warning text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Meja</span>
                    </a>
                </li>
            @endif

            @if (Auth::user()->role == 'WAITER')
                <li class="nav-item">
                    <a class="nav-link " href="{{ route('menu.index') }}">
                        <div
                            class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="fa fa-book text-success text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Menu</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('customer.create') }}">
                        <div
                            class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="fa fa-file-pen text-primary text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Buat Pesanan</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('pesanan.index') }}">
                        <div
                            class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="fa fa-list text-primary text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Pesanan</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('export-pesanan') }}">
                        <div
                            class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="fa fa-download text-warning text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Generate Pesanan Report</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('export-menu') }}">
                        <div
                            class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="fa fa-download text-warning text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Generate Menu Report</span>
                    </a>
                </li>
            @endif

            @if (Auth::user()->role == 'KASIR')
                <li class="nav-item">
                    <a class="nav-link " href="{{ route('transaksi.index') }}">
                        <div
                            class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-credit-card text-success text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Transaksi</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="{{ route('export-transaksi') }}">
                        <div
                            class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="fa fa-download text-warning text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Generate Transaksi Report</span>
                    </a>
                </li>
            @endif

            @if (Auth::user()->role == 'OWNER')
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('export-pesanan') }}">
                        <div
                            class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="fa fa-download text-warning text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Generate Pesanan Report</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('export-menu') }}">
                        <div
                            class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="fa fa-download text-warning text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Generate Menu Report</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="{{ route('export-transaksi') }}">
                        <div
                            class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="fa fa-download text-warning text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Generate Transaksi Report</span>
                    </a>
                </li>
            @endif

            <li class="nav-item px-3 mt-5">
                <a class="nav-link btn btn-danger" href="{{ route('logout') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center text-white">
                        <i class="fa-solid fa-right-from-bracket"></i>
                    </div>
                    <span class="text-white">Logout</span>
                </a>
            </li>

        </ul>
    </div>

</aside>
