<!-- header-area -->
<header>
    <div id="sticky-header" class="menu__area transparent-header">
        <div class="container custom-container">
            <div class="row">
                <div class="col-12">
                    <div class="mobile__nav__toggler">
                        <i class="fas fa-bars"></i>
                    </div>
                    <div class="menu__wrap">
                        <nav class="menu__nav">
                            <div class="logo">
                                <a href="{{route("home.nagcarlan")}}" class="logo__black"><img
                                        src="{{ asset('home/logo/nagcarlan.webp') }}" height="80px" alt="" /></a>
                            </div>
                            <div class="navbar__wrap main__menu d-none d-xl-flex">
                                <ul class="navigation">
                                    <li class="active"><a href="{{route("home.nagcarlan")}}">Home</a></li>
                                    <li class="menu-item-has-children">
                                        <a href="#">About {{$city->value}}</a>
                                        <ul class="sub-menu">
                                            <li>
                                                <a href="{{route('nagcarlan.historical_background')}}">Historical
                                                    Background</a>
                                            </li>
                                            <li>
                                                <a href="{{route("nagcarlan.profile")}}">Municipal Profile</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="menu-item-has-children">
                                        <a href="#">Transparency</a>
                                        <ul class="sub-menu">
                                            <li><a href="{{route("nagcarlan.officials")}}">Local Officials</a></li>
                                            <li>
                                                <a href="{{route("nagcarlan.offices")}}">LGU Offices</a>
                                            </li>
                                            <li>
                                                <a href="{{route("nagcarlan.directory")}}">Barangay Directory</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="menu-item-has-children">
                                        <a>Barangays</a>
                                        <ul class="sub-menu">

                                            <li><a href="#">ABO</a></li>
                                            <li><a href="#">ALIBUNGBUNGAN</a></li>
                                            <li><a href="#">ALUMBRADO</a></li>
                                            <li><a href="#">BALAYONG</a></li>
                                            <li><a href="#">BALIMBING</a></li>
                                            <li><a href="#">BALINACON</a></li>
                                            <li><a href="#">BAMBANG</a></li>
                                            <li><a href="#">BANAGO</a></li>
                                            <li><a href="#">BANCA-BANCA</a></li>
                                            <li><a href="#">BANGCURO</a></li>
                                            <li><a href="#">BANILAD</a></li>
                                            <li><a href="#">BAYAQUITOS</a></li>
                                            <li><a href="#">BUBOY</a></li>
                                            <li><a href="#">BUENAVISTA</a></li>
                                            <li><a href="#">BUHANGINAN</a></li>
                                            <li><a href="#">BUKAL</a></li>
                                            <li><a href="#">BUNGA</a></li>
                                            <li><a href="#">CABUYEW</a></li>
                                            <li><a href="#">CALUMPANG</a></li>
                                            <li><a href="#">KAN. KABUBUHAYAN</a></li>
                                            <li><a href="#">KAN. LAZAAN</a></li>
                                            <li><a href="#">LABANGAN</a></li>
                                            <li><a href="#">LAGULO</a></li>
                                            <li><a href="#">LAWAGUIN</a></li>
                                            <li><a href="#">MAIIT</a></li>
                                            <li><a href="#">MALAYA</a></li>
                                            <li><a href="#">MALINAO</a></li>
                                            <li><a href="#">MANAOL</a></li>
                                            <li><a href="#">MARAVILLA</a></li>
                                            <li><a href="#">NAGCALBANG</a></li>
                                            <li><a href="#">OPLES</a></li>
                                            <li><a href="#">PALAYAN</a></li>
                                            <li><a href="#">PALINA</a></li>
                                            <li><a href="#">POBLACION 1</a></li>
                                            <li><a href="#">POBLACION II</a></li>
                                            <li><a href="#">POBLACION III</a></li>
                                            <li><a href="#">SABANG</a></li>
                                            <li><a href="#">SAN FRANCISCO</a></li>
                                            <li><a href="#">STA. LUCIA</a></li>
                                            <li><a href="#">SIBULAN</a></li>
                                            <li><a href="#">SIL. ILAYA</a></li>
                                            <li><a href="#">SIL. KABUBUHAYAN</a></li>
                                            <li><a href="#">SIL. LAZAAN</a></li>
                                            <li><a href="#">SIL. NAPAPATID</a></li>
                                            <li><a href="#">SINIPIAN</a></li>
                                            <li><a href="#">SULSUGUIN</a></li>
                                            <li><a href="#">TALAHIB</a></li>
                                            <li><a href="#">TALANGAN</a></li>
                                            <li><a href="#">TAYTAY</a></li>
                                            <li><a href="#">TIPACAN</a></li>
                                            <li><a href="#">WAKAT</a></li>
                                            <li><a href="#">YUKOS</a></li>
                                        </ul>
                                    </li>

                                </ul>
                            </div>
                        </nav>
                    </div>
                    <!-- Mobile Menu  -->
                    <div class="mobile__menu">
                        <nav class="menu__box">
                            <div class="close__btn"><i class="fal fa-times"></i></div>
                            <div class="nav-logo">
                                <a href="index.html" class="logo__black"><img src="assets/img/logo/logo_black.png"
                                        alt="" /></a>
                                <a href="index.html" class="logo__white"><img src="assets/img/logo/logo_white.png"
                                        alt="" /></a>
                            </div>
                            <div class="menu__outer"></div>
                            <div class="social-links">
                                <ul class="clearfix">
                                    <li>
                                        <a href="#"><span class="fab fa-twitter"></span></a>
                                    </li>
                                    <li>
                                        <a href="#"><span class="fab fa-facebook-square"></span></a>
                                    </li>
                                    <li>
                                        <a href="#"><span class="fab fa-pinterest-p"></span></a>
                                    </li>
                                    <li>
                                        <a href="#"><span class="fab fa-instagram"></span></a>
                                    </li>
                                    <li>
                                        <a href="#"><span class="fab fa-youtube"></span></a>
                                    </li>
                                </ul>
                            </div>
                        </nav>
                    </div>
                    <div class="menu__backdrop"></div>
                    <!-- End Mobile Menu -->
                </div>
            </div>
        </div>
    </div>
</header>
<!-- header-area-end -->
