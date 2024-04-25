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
                                <a href="#" class="logo__black"><img src="{{asset('storage/'.$barangay->logo)}}" height="80px"
                                        alt="" /></a>
                            </div>
                            <div class="navbar__wrap main__menu d-none d-xl-flex">
                                <ul class="navigation">
                                </ul>
                            </div>
                            <div class="header__btn d-none d-md-block">
                                <a href="{{ route('login.page', ['barangay_id' => $barangay->id]) }}"
                                    class="btn">Login</a>
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
