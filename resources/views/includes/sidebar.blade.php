        <!--sidebar menu start-->
        <ul class="sidebar-menu" id="nav-accordion">

            <p class="centered"><a href="profile"><img src="assets/img/JPbooks-logo.jpg" class="img-circle" width="80"></a></p>
            <h5 class="centered">JP-Books Store</h5>
            
            <li class="mt">
                <a href="/home">
                    <i class="fa fa-dashboard"></i>
                    <span>Beranda</span>
                </a>
            </li>
            <li class="sub-menu">
                <a href="javascript:;">
                    <i class="fa fa-briefcase"></i>
                    <span>Data Master</span>
                </a>
                <ul class="sub">
                    <li><a href="{{URL::to('/employee')}}">Pegawai</a></li>
                    <li><a href="{{URL::to('/book')}}">Buku</a></li>
                    <li><a href="{{URL::to('/supp')}}">Pemasok</a></li>
                    <li><a href="{{URL::to('/pub')}}">Penerbit</a></li>
                    <li><a href="{{URL::to('/customer')}}">Pelanggan</a></li>
                </ul>
            </li>

            <li class="sub-menu">
                <a href="javascript:;">
                    <i class="fa fa-desktop"></i>
                    <span>Transaksi</span>
                </a>
                    <ul class="sub">
                        <li><a href="{{URL::to('/trans/receive')}}">Barang Masuk</a></li>
                        <li><a href="{{URL::to('/trans/sale')}}">Barang Keluar</a></li>
                    </ul>
            </li>
            <li class="sub-menu">
                <a href="javascript:;">
                    <i class="fa fa-desktop"></i>
                    <span>Laporan</span>
                </a>
                    <ul class="sub">
                        <li><a href="{{URL::to('/report/receive')}}">Pemasukkan</a></li>
                        <li><a href="{{URL::to('/report/sale')}}">Penjualan</a></li>
                    </ul>
            </li>
            <li class="sub-menu">
                <a href="javascript:;">
                    <i class="fa fa-gears"></i>
                    <span>Pengaturan</span>
                </a>
                <ul class="sub">
                    <li><a href="{{URL::to('/user')}}">Pengguna</a></li>
                    <li><a href="{{URL::to('/role')}}">Role</a></li>
                </ul>
            </li>
        </ul>