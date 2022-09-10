<nav class="pcoded-navbar">
    <div class="pcoded-inner-navbar main-menu">
        <div class="pcoded-navigatio-lavel">Navigation</div>
        <ul class="pcoded-item pcoded-left-item">
            <li class="{{ $link == '/admin' ? ' active' : '' }}">
                <a href="{{ URL::to('/') }}">
                    <span class="pcoded-micon"><i class="feather icon-home"></i></span>
                    <span class="pcoded-mtext">Dashboard</span>
                </a>
            </li>
            <li class="pcoded-hasmenu {{ $link == '/admin/dpr-ri' || $link == '/admin/dprd-prov' || $link == '/admin/dprd-kab-kota' || $link == '/admin/fungsionaris' || $link == '/admin/dpr-ri' || $link == '/admin/kategori' ? 'active pcoded-trigger' : '' }}">
                <a href="javascript:void(0)">
                    <span class="pcoded-micon"><i class="fa fa-database"></i></span>
                    <span class="pcoded-mtext">Master data</span>
                </a>
                <ul class="pcoded-submenu">
                    <li class="{{ $link == '/admin/dpr-ri' ? ' active' : '' }}">
                        <a href="{{ URL::to('admin/dpr-ri') }}">
                            <span class="pcoded-mtext">DPR RI</span>
                        </a>
                    </li>
                    <li class="{{ $link == '/admin/dprd-prov' ? ' active' : '' }}">
                        <a href="{{ URL::to('admin/dprd-prov') }}">
                            <span class="pcoded-mtext">DPRD Prov</span>
                        </a>
                    </li>
                    <li class="{{ $link == '/admin/dprd-kab-kota' ? ' active' : '' }}">
                        <a href="{{ URL::to('admin/dprd-kab-kota') }}">
                            <span class="pcoded-mtext">DPRD Kab/Kota</span>
                        </a>
                    </li>
                    <li class="{{ $link == '/admin/fungsionaris' ? ' active' : '' }}">
                        <a href="{{ URL::to('admin/fungsionaris') }}">
                            <span class="pcoded-mtext">Fungsionaris</span>
                        </a>
                    </li>
                    <li class="{{ $link == '/admin/kategori' ? ' active' : '' }}">
                        <a href="{{ URL::to('admin/kategori') }}">
                            <span class="pcoded-mtext">Kategori Produk</span>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
        <div class="pcoded-navigatio-lavel">Management</div>
        <ul class="pcoded-item pcoded-left-item">
            <li class="">
                <a href="{{ URL::to('admin/progress-pembayaran') }}">
                    <span class="pcoded-micon"><i class="fa fa-credit-card-alt"></i></span>
                    <span class="pcoded-mtext">Progress Pembayaran</span>
                </a>
            </li>
        </ul>
    </div>
</nav>
