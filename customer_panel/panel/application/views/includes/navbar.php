<nav id="app-navbar" class="navbar navbar-inverse navbar-fixed-top primary">
    <!-- navbar header -->
    <div class="navbar-header">
        <!-- Navbar Toggle Button -->
        <button type="button" id="menubar-toggle-btn" class="navbar-toggle visible-xs-inline-block navbar-toggle-left hamburger hamburger--collapse js-hamburger">
            <span class="sr-only">Toggle navigation</span>
            <span class="hamburger-box"><span class="hamburger-inner"></span></span>
        </button>
        <!-- Navbar Brand -->
        <a href="#" class="navbar-brand">
            <span class="brand-icon"><i class="fa fa-gg"></i></span>
            <span class="brand-name">Infinity</span>
        </a>
    </div><!-- .navbar-header -->

    <div class="navbar-container container-fluid">
        <!-- Navbar Collapse Button -->
        <button type="button" class="navbar-toggle navbar-toggle-right collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="zmdi zmdi-hc-lg zmdi-more"></span>
        </button>
        
        <!-- Navbar Collapse Section -->
        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <!-- Navbar Left Links -->
            <ul class="nav navbar-toolbar navbar-toolbar-left navbar-left">
                <li class="hidden-float hidden-menubar-top">
                    <a href="javascript:void(0)" role="button" id="menubar-fold-btn" class="hamburger hamburger--arrowalt is-active js-hamburger">
                        <span class="hamburger-box"><span class="hamburger-inner"></span></span>
                    </a>
                </li>
                <li>
                    <h5 class="page-title hidden-menubar-top hidden-float">Dashboard</h5>
                </li>
            </ul>
            
            <!-- Navbar Right Links -->
            <ul class="nav navbar-toolbar navbar-toolbar-right navbar-right">
                <li class="nav-item dropdown hidden-float">
                    <a href="javascript:void(0)" data-toggle="collapse" data-target="#navbar-search" aria-expanded="false">
                        <i class="zmdi zmdi-hc-lg zmdi-search"></i>
                    </a>
                </li>
                <!-- Çıkış Yap Butonu -->
                <li>
    <a href="<?php echo base_url('logout'); ?>">
        <i class="fa fa-sign-out"></i>
    </a>
</li>

            </ul>
        </div>
    </div><!-- navbar-container -->
</nav>
