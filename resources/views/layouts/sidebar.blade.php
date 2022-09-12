<nav class="pcoded-navbar">
    <div class="pcoded-inner-navbar main-menu">
        <div class="pcoded-navigatio-lavel">Navigation</div>
        <ul class="pcoded-item pcoded-left-item">
            <li class="{{ $link == '/admin' ? ' active' : '' }}">
                <a href="{{ URL::to('/admin') }}">
                    <span class="pcoded-micon"><i class="feather icon-home"></i></span>
                    <span class="pcoded-mtext">Dashboard</span>
                </a>
            </li>
            <li class="{{ $link == '/admin/obat' ? ' active' : '' }}">
                <a href="{{ URL::to('/admin/obat') }}">
                    <span class="pcoded-micon"><i class="icofont icofont-pills"></i></span>
                    <span class="pcoded-mtext">Pilih Obat</span>
                </a>
            </li>
            <li class="{{ $link == '/admin/keranjang' ? ' active' : '' }}">
                <a href="{{ URL::to('/admin/keranjang') }}">
                    <span class="pcoded-micon"><i class="fa fa-shopping-basket"></i></span>
                    <span class="pcoded-mtext">Keranjang</span>
                </a>
            </li>
            <li class="{{ $link == '/admin/resep' ? ' active' : '' }}">
                <a href="{{ URL::to('/admin/resep') }}">
                    <span class="pcoded-micon"><i class="ion-clipboard"></i></span>
                    <span class="pcoded-mtext">Resep Obat</span>
                </a>
            </li>
            <li class="{{ $link == '/admin/transaksi' ? ' active' : '' }}">
                <a href="{{ URL::to('/admin/transaksi') }}">
                    <span class="pcoded-micon"><i class="fa fa-credit-card-alt"></i></span>
                    <span class="pcoded-mtext">Transaksi</span>
                </a>
            </li>
        </ul>
    </div>
</nav>
