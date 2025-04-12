<ul class="menu-inner py-1">
    <!-- Dashboards -->
    <li class="menu-item {{ $menu == 'dashboard' ? 'active' : '' }}">
        <a href="{{ route('rekap.index') }}" class="menu-link">
            <i class="menu-icon tf-icons ri-home-smile-line"></i>
            <div data-i18n="Dashboards">Dashboards</div>
        </a>
    </li>
    <li class="menu-item {{ $menu == 'pengajuan' ? 'active' : '' }}">
        <a href="{{ route('pengajuan.index') }}" class="menu-link">
            <i class="menu-icon tf-icons ri-file-list-3-line"></i>
            <div data-i18n="pengajuan">Pengajuan Sakit</div>
        </a>
    </li>

</ul>