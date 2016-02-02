        <!--sidebar menu start-->
        <ul class="sidebar-menu" id="nav-accordion">

            <p class="centered"><a href="profile"><img src="assets/img/book_logo.png" class="img-circle" width="80"></a></p>
            <h5 class="centered">IBOE Mitra Media</h5>
            
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
                    <li><a href="{{URL::to('/supplier')}}">Pemasok</a></li>
                    <li><a href="{{URL::to('/publisher')}}">Penerbit</a></li>
                    <li><a href="{{URL::to('/customer')}}">Pelanggan</a></li>
                    <li><a href="{{URL::to('/book')}}">Buku</a></li>
                </ul>
            </li>

            <li class="sub-menu">
                <a href="javascript:;">
                    <i class="fa fa-desktop"></i>
                    <span>Transaksi</span>
                </a>
                    <ul class="sub">
                        <li><a href="{{URL::to('/receive')}}">Pembelian Buku</a></li>
{{--                        <li><a href="{{URL::to('/delivery')}}">Pengiriman Buku</a></li>--}}
                        <li><a href="{{URL::to('/sale')}}">Penjualan Buku</a></li>
                    </ul>
            </li>
            <li class="sub-menu">
                <a href="javascript:;">
                    <i class="fa fa-desktop"></i>
                    <span>Laporan</span>
                </a>
                    <ul class="sub">
                        <li><a href="{{route('reportReceive')}}">Pemasukkan</a></li>
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