<div class="layout-menu-toggle navbar-nav align-items-xl-center me-4 me-xl-0 d-xl-none">
    <a class="nav-item nav-link px-0 me-xl-6" href="javascript:void(0)">
        <i class="ri-menu-fill ri-24px"></i>
    </a>
</div>

<div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
    <!-- Search -->
    <div class="navbar-nav align-items-center me-3">
        <div class="nav-item d-flex align-items-center">
            <i class="ri-search-line ri-22px me-2"></i>
            <input
                type="text"
                class="form-control border-0 shadow-none"
                placeholder="Search..."
                aria-label="Search..." />
        </div>
    </div>
    <!-- /Search -->

    <ul class="navbar-nav flex-row align-items-center ms-auto">
        <!-- Notifications -->
        <li class="nav-item dropdown me-3">
            <a
                class="nav-link dropdown-toggle hide-arrow d-flex align-items-center"
                href="javascript:void(0);"
                data-bs-toggle="dropdown">
                <div class="position-relative">
                    <i class="ri-notification-3-line ri-22px"></i>
                    @if(Auth::user()->guru)
                    <span class="badge bg-primary badge-number">{{ Auth::user()->guru->notifications->where('is_read', false)->count() }}</span>
                    @else
                    <span class="badge bg-primary badge-number">0</span>
                    @endif
                </div>
            </a>
            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">
                <li class="dropdown-header">
                    @if(Auth::user()->guru)
                    You have {{ Auth::user()->guru->notifications->where('is_read', false)->count() }} new notifications
                    @else
                    You have 0 new notifications
                    @endif
                    <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
                </li>
                <li>
                    <hr class="dropdown-divider">
                </li>

                @if(Auth::user()->guru)
                @foreach(Auth::user()->guru->notifications->where('is_read', false) as $notification)
                <li class="notification-item">
                    <i class="bi bi-exclamation-circle text-warning"></i>
                    <div>
                        <h4>{{ $notification->title }}</h4>
                        <p>{{ $notification->message }}</p>
                        <p>{{ $notification->created_at->diffForHumans() }}</p>
                        <a href="{{ route('validasi.index') }}">Lihat Detail</a>
                    </div>
                </li>
                <li>
                    <hr class="dropdown-divider">
                </li>
                @endforeach
                @endif

                <li class="dropdown-footer">
                    <a href="#">Show all notifications</a>
                </li>
            </ul>
        </li>
        <!-- /Notifications -->

        <!-- User -->
        <li class="nav-item navbar-dropdown dropdown-user dropdown">
            <a
                class="nav-link dropdown-toggle hide-arrow p-0"
                href="javascript:void(0);"
                data-bs-toggle="dropdown">
                <div class="avatar avatar-online">
                    <img src="{{ asset('assets/img/icons/unicons/user.png')}}" alt class="w-px-40 h-auto rounded-circle" />
                </div>
            </a>
            <ul class="dropdown-menu dropdown-menu-end mt-3 py-2">
                @if(Auth::check())
                <li>
                    <a class="dropdown-item" href="#">
                        <div class="d-flex align-items-center">
                            <div class="flex-shrink-0 me-2">
                                <div class="avatar avatar-online">
                                    <img src="{{ asset('assets/img/icons/unicons/user.png')}}" alt class="w-px-40 h-auto rounded-circle" />
                                </div>
                            </div>
                            <div class="flex-grow-1">
                                <h6 class="mb-0 small">{{ session('nama_pengguna', Auth::user()->username) }}</h6>
                                <small class="text-muted">{{ ucfirst(Auth::user()->level) }}</small>
                            </div>
                        </div>
                    </a>
                </li>
                @endif


                <li>
                    <div class="dropdown-divider"></div>
                </li>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <li>
                        <div class="d-grid px-4 pt-2 pb-1">
                            <button type="submit" class="btn btn-danger d-flex align-items-center">
                                <small class="align-middle">Logout</small>
                                <i class="ri-logout-box-r-line ms-2 ri-16px"></i>
                            </button>
                        </div>
                    </li>
                </form>
            </ul>
        </li>
        <!--/ User -->
    </ul>