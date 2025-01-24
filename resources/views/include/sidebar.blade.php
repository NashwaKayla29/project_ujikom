<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="https://smkassalaambandung.sch.id/" class="app-brand-link">
            <img src="{{asset('admin/assets/img/layouts/download.png')}}" width="60%" height="60%">
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
            <a href="{{ route('bahan.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-box"></i>
                <div data-i18n="Layouts">Bahan</div>
            </a>
        </li>
            <li class="menu-item">
            <a href="{{ route('data_pegawai.index') }}" class="menu-link">
                   <i class='menu-icon ft-icons bx bxs-arrow-from-right'></i>
                   <div data-i18n="Barang Masuk">Data pegawai</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="{{ route('data_Qc.index') }}" class="menu-link">
                   <i class='menu-icon ft-icons bx bxs-arrow-from-left'></i>
                   <div data-i18n="Barang Masuk">Data Qc</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="{{ route('potong.index') }}"class="menu-link">
                  <i class='menu-icon ft-icons bx bxs-arrow-to-bottom'></i>
                   <div data-i18n="Barang Masuk">Potong</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="{{ route('jahit.index') }}"class="menu-link">
                  <i class='menu-icon ft-icons bx bxs-arrow-to-top'></i>
                   <div data-i18n="Barang Masuk">Jahit</div>
            </a>
        </li>
         <li class="menu-item">
            <a href="{{ route('Qc.index') }}"class="menu-link">
                 <i class='menu-icon ft-icons bx bxs-file-doc'></i>
                   <div data-i18n="laporan">Qc</div>
            </a>
        </li>
</aside>