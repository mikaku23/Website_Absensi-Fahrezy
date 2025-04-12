<ul class="menu-inner py-1">
    <!-- Dashboards -->
    <li class="menu-item {{ $menu == 'dashboard' ? 'active' : '' }}">
        <a href="{{ route('dashboard-admin') }}" class="menu-link">
            <i class="menu-icon tf-icons ri-home-smile-line"></i>
            <div data-i18n="Dashboards">Dashboards</div>
        </a>
    </li>
    <li class="menu-item {{ $menu == 'guru' ? 'active' : '' }}">
        <a href="{{ route('guru.index') }}" class="menu-link">
            <i class="menu-icon tf-icons ri-user-2-line"></i>
            <div data-i18n="guru">Guru</div>
        </a>
    </li>
    <li class="menu-item {{ $menu == 'siswa' ? 'active' : '' }}">
        <a href="{{ route('siswa.index') }}" class="menu-link">
            <i class="menu-icon tf-icons ri-user-3-line"></i>
            <div data-i18n="siswa">Siswa</div>
        </a>
    </li>
    <li class="menu-item {{ $menu == 'local' || $menu == 'jurusan' ? 'active' : '' }}">
        <a href="{{ route('local.index') }}" class="menu-link">
            <i class="menu-icon tf-icons ri-building-line"></i>
            <div data-i18n="local">Kelas</div>
        </a>
    </li>
    <li class="menu-item {{ $menu == 'walikelas' ? 'active' : '' }}">
        <a href="{{ route('walikelas.index') }}" class="menu-link">
            <i class="menu-icon tf-icons ri-user-star-line"></i>
            <div data-i18n="walikelas">Walikelas</div>
        </a>
    </li>
    <li class="menu-item {{ $menu == 'ortu' ? 'active' : '' }}">
        <a href="{{ route('ortu.index') }}" class="menu-link">
            <i class="menu-icon tf-icons ri-user-heart-line"></i>
            <div data-i18n="ortu">Orang Tua</div>
        </a>
    </li>
    <li class="menu-item {{ $menu == 'user' ? 'active' : '' }}">
        <a href="{{ route('user.index') }}" class="menu-link">
            <i class="menu-icon tf-icons ri-user-line"></i>
            <div data-i18n="user">User</div>
        </a>
    </li>
    <li class="menu-item {{ $menu == 'absen' ? 'active' : '' }}">
        <a href="{{ route('absenSiswa.index') }}" class="menu-link">
            <i class="menu-icon tf-icons ri-calendar-check-line"></i>
            <div data-i18n="absen">Absensi</div>
        </a>
    </li>
    <li class="menu-item {{ $menu == 'pengajuan' ? 'active' : '' }}">
        <a href="{{ route('pengajuanAdmin.index') }}" class="menu-link">
            <i class="menu-icon tf-icons ri-file-list-3-line"></i>
            <div data-i18n="pengajuan">Pengajuan</div>
        </a>
    </li>
</ul>