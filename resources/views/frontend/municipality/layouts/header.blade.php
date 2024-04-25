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
                                <a href="{{route("home.municipality")}}" class="logo__black"><img src="{{ asset($logo->value) }}"
                                        height="80px" alt="" /></a>
                            </div>
                            <div class="navbar__wrap main__menu d-none d-xl-flex">
                                <ul class="navigation">
                                    <li class="active"><a href="{{route("home.municipality")}}">Home</a></li>
                                    <li class="menu-item-has-children">
                                        <a href="#">About {{$city->value}}</a>
                                        <ul class="sub-menu">
                                            <li>
                                                <a href="#about">Mission & Vision</a>
                                            </li>
                                            <li>
                                                <a href="{{route('municipality.historical_background')}}">Historical Background</a>
                                            </li>
                                            <li>
                                                <a href="{{route("municipality.profile")}}">Municipal Profile</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="menu-item-has-children">
                                        <a href="#">Transparency</a>
                                        <ul class="sub-menu">
                                            <li><a href="{{route("municipality.officials")}}">Local Officials</a></li>
                                            <li>
                                                <a href="{{route("municipality.offices")}}">LGU Offices</a>
                                            </li>
                                            <li>
                                                <a href="{{route("municipality.directory")}}">Barangay Directory</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="menu-item-has-children">
                                        <a>Barangays</a>
                                        <ul class="sub-menu">
                                            @foreach($barangays as $barangay)
                                            <li> <a href="{{ route('home.barangay', ['barangay_id' => $barangay->id]) }}">{{
                                                    $barangay->name
                                                    }}</a></li>
                                            @endforeach
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
