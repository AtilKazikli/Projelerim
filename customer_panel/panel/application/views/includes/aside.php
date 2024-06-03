<aside id="menubar" class="menubar light">
    <div class="app-user">
        <div class="media">
            <div class="media-left">
                <div class="avatar avatar-md avatar-circle">
                    <a href="javascript:void(0)"><img class="img-responsive" src="<?php echo base_url("assets"); ?>/assets/images/221.jpg" alt="avatar"/></a>
                </div><!-- .avatar -->
            </div>
            <div class="media-body">
                <div class="foldable">
                    <h5><a href="javascript:void(0)" class="username">John Doe</a></h5>
                    <ul>
                        <li class="dropdown">
                            <a href="javascript:void(0)" class="dropdown-toggle usertitle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <small>Web Developer</small>
                                <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu animated flipInY">
                                <li>
                                <a href="<?php echo base_url("dashboard"); ?>">
                                        <span class="m-r-xs"><i class="fa fa-home"></i></span>
                                        <span>Home</span>
                                    </a>
                                </li>
                                <li>
                                    <a class="text-color" href="#">
                                        <span class="m-r-xs"><i class="fa fa-user"></i></span>
                                        <span>Profile</span>
                                    </a>
                                </li>
                                <li>
                                    <a class="text-color" href="#">
                                        <span class="m-r-xs"><i class="fa fa-gear"></i></span>
                                        <span>Settings</span>
                                    </a>
                                </li>
                                
                                <li role="separator" class="divider"></li>
                                <li>
                                <a href="<?php echo base_url("login"); ?>">
                                        <span class="m-r-xs"><i class="fa fa-power-off"></i></span>
                                        <span>Home</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div><!-- .media-body -->
        </div><!-- .media -->
    </div><!-- .app-user -->

    <div class="menubar-scroll">
        <div class="menubar-scroll-inner">
            <ul class="app-menu">

                <li>
                    <a href="<?php echo base_url("Dashboard"); ?>">
                        <i class="menu-icon zmdi zmdi-view-dashboard zmdi-hc-lg"></i>
                        <span class="menu-text">Dashboard</span>
                    </a>
                </li>

                <li>
                    <a href="<?php echo base_url("Users"); ?>">
                        <i class="menu-icon fa fa-cubes"></i>
                        <span class="menu-text">Kullanıcılar</span>
                    </a>
                </li>

                <li>
                    <a href="<?php echo base_url("customers"); ?>">
                        <i class="menu-icon fa fa-cubes"></i>
                        <span class="menu-text">Müşteriler</span>
                    </a>
                </li>

                <li>
                    <a href="<?php echo base_url("product"); ?>">
                        <i class="menu-icon fa fa-cubes"></i>
                        <span class="menu-text">Ürünler</span>
                    </a>
                </li>

                <li>
                    <a href="<?php echo base_url("sales"); ?>">
                        <i class="menu-icon fa fa-cubes"></i>
                        <span class="menu-text">Satışlar</span>
                    </a>
                </li>

                <li>
                    <a href="<?php echo base_url("reservations"); ?>">
                        <i class="menu-icon fa fa-cubes"></i>
                        <span class="menu-text">Rezervasyonlar</span>
                    </a>
                </li>

                <li>
                    <a href="<?php echo base_url("Adverts"); ?>">
                        <i class="menu-icon fa fa-cubes"></i>
                        <span class="menu-text">İlanlar</span>
                    </a>
                </li>

                

                <li>
            </ul><!-- .app-menu -->
        </div><!-- .menubar-scroll-inner -->
    </div><!-- .menubar-scroll -->
</aside>