<ul class="menu-inner py-1">
    <!-- Dashboards -->
    <li class="menu-item {{ $menu == 'dashboard' ? 'active' : '' }}">
        <a href="{{ route('dashboard-walikelas') }}" class="menu-link">
            <i class="menu-icon tf-icons ri-home-smile-line"></i>
            <div data-i18n="Dashboards">Dashboards</div>
        </a>
    </li>
    <li class="menu-item {{ $menu == 'absen' ? 'active' : '' }}">
        <a href="{{ route('absenWalikelas.index') }}" class="menu-link">
            <i class="menu-icon tf-icons ri-calendar-check-line"></i>
            <div data-i18n="absen">Absensi</div>
        </a>
    </li>

</ul>