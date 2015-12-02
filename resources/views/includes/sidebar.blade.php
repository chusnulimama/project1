        <!--sidebar menu start-->
        <ul class="sidebar-menu" id="nav-accordion">

            <p class="centered"><a href="profile"><img src="assets/img/JPbooks-logo.jpg" class="img-circle" width="80"></a></p>
            <h5 class="centered">JP-Books Store</h5>
            
            <li class="mt">
                <a href="home">
                    <i class="fa fa-dashboard"></i>
                    <span>Home</span>
                </a>
            </li>
            <li class="sub-menu">
                <a href="javascript:;">
                    <i class="fa fa-briefcase"></i>
                    <span>Data Master</span>
                </a>
                <ul class="sub">
                    <li><a href="{{URL::to('/master/employee')}}">Employee's</a></li>
                    <li><a href="{{URL::to('/book')}}">Good's</a></li>
                    <li><a href="{{URL::to('/master/supp')}}">Supplier's</a></li>
                    <li><a href="{{URL::to('/master/pub')}}">Publisher's</a></li>
                    <li><a href="{{URL::to('/master/cust')}}">Customer's</a></li>
                </ul>
            </li>

            <li class="sub-menu">
                <a href="javascript:;">
                    <i class="fa fa-desktop"></i>
                    <span>Transaction</span>
                </a>
                    <ul class="sub">
                        <li><a href="{{URL::to('/trans/receive')}}">Receive Transaction</a></li>
                        <li><a href="{{URL::to('/trans/sale')}}">Sales Transaction</a></li>
                    </ul>
            </li>
            <li class="sub-menu">
                <a href="javascript:;">
                    <i class="fa fa-desktop"></i>
                    <span>Report</span>
                </a>
                    <ul class="sub">
                        <li><a href="{{URL::to('/report/receive')}}">Receipt</a></li>
                        <li><a href="{{URL::to('/report/sale')}}">Sales</a></li>
                    </ul>
            </li>
        </ul>