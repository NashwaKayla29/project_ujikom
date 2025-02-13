<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">

        <img src="{{ asset('admin/assets/logo/lunera.png') }}" width="100%" height="150%">
        <span class="app-brand-text demo menu-text fw-bolder ms-3"></span>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        <!-- Dashboard -->
        <li class="menu-item">
            <a href="{{ route('home') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bxs-dashboard"></i>
                <div data-i18n="Analytics">Dashboard</div>
            </a>
        </li>


        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-table"></i>
                <div data-i18n="Form Layouts">Tabel</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="{{ route('bahan.index') }}" class="menu-link">
                        <div data-i18n="Layouts">Bahan</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{ route('data_pegawai.index') }}" class="menu-link">
                        <div data-i18n="Barang Masuk">Data pegawai</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{ route('data_Qc.index') }}" class="menu-link">
                        <div data-i18n="data_Qc">Data Qc</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{ route('potong.index') }}"class="menu-link">
                        <div data-i18n="potong">Potong</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{ route('jahit.index') }}"class="menu-link">
                        <div data-i18n="jahit">Jahit</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{ route('Qc.index') }}"class="menu-link">
                        <div data-i18n="Qc">Qc</div>
                    </a>
                </li>
            </ul>
        </li>

        <li class="menu-item">
            <a href="{{ route('laporan.index') }}"class="menu-link">
                 <i class='menu-icon ft-icons bx bxs-file-doc'></i>
                   <div data-i18n="laporan">Laporan</div>
            </a>
        </li>

</aside>
