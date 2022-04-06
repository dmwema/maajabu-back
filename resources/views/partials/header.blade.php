    <!-- ============================================================== -->
    <!-- Topbar header - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <header class="topbar" data-navbarbg="skin5">
        <nav class="navbar top-navbar navbar-expand-md navbar-dark">
            <div class="navbar-header" data-logobg="skin5">
                <!-- ============================================================== -->
                <!-- Logo -->
                <!-- ============================================================== -->
                <a class="navbar-brand" href="/admin">
                    <!-- Logo icon -->
                    <b class="logo-icon">
                        <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                        <!-- Dark Logo icon 
                            <img src="assets/images/logo-icon.png" alt="homepage" class="dark-logo" />
                            -->
                        <!-- Light Logo icon 
                            <img src="assets/images/logo-light-icon.png" alt="homepage" class="light-logo" />-->
                    </b>
                    <!--End Logo icon -->
                    <!-- Logo text -->
                    <span class="logo-text" style="font-weight: bold;">
                        <img src="{{ asset('img/logo.svg') }}" alt="logo" style="width: 100px">
                        <!-- dark Logo text
                            <img src="assets/images/logo-text.png" alt="homepage" class="dark-logo" /> -->
                        <!-- Light Logo text 
                            <img src="assets/images/logo-light-text.png" class="light-logo" alt="homepage" />-->
                    </span>
                </a>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <!-- This is for the sidebar toggle which is visible on mobile only -->
                <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i
                        class="ti-menu ti-close"></i></a>
            </div>
            <!-- ============================================================== -->
            <!-- End Logo -->
            <!-- ============================================================== -->
            <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">
                <!-- ============================================================== -->
                <!-- toggle and nav items -->
                <!-- ============================================================== -->
                <ul class="navbar-nav float-start me-auto">
                    <!-- ============================================================== -->
                    <!-- Search -->
                    <!-- ============================================================== -->
                    <li class="nav-item search-box"> <a class="nav-link waves-effect waves-dark"
                            href="javascript:void(0)"><i class="ti-search"></i></a>
                        <form class="app-search position-absolute">
                            <input type="text" class="form-control" placeholder="Search &amp; enter"> <a
                                class="srh-btn"><i class="ti-close"></i></a>
                        </form>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <!-- ============================================================== -->
    <!-- End Topbar header -->
    <!-- ============================================================== -->
