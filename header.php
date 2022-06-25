<?php require_once('link_meta_head.php');?>

<div id="pcoded" class="pcoded">
    <div class="pcoded-overlay-box"></div>
    <div class="pcoded-container navbar-wrapper">
        <nav class="navbar header-navbar pcoded-header">
            <div class="navbar-wrapper">
                <div class="navbar-logo">
                    <a class="mobile-menu waves-effect waves-light" id="mobile-collapse" href="#!">
                        <i class="ti-menu"></i>
                    </a>
                    <div class="mobile-search waves-effect waves-light">
                        <div class="header-search">
                            <div class="main-search morphsearch-search">
                                <div class="input-group">
                                    <span class="input-group-prepend search-close"><i class="ti-close input-group-text"></i></span>
                                    <input type="text" class="form-control" placeholder="Enter Keyword">
                                    <span class="input-group-append search-btn"><i class="ti-search input-group-text"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <a href="index.php">
                            
                            <img class="img-fluid" src="assets/images/itel.png" alt="Theme-Logo" />&nbsp;<b style="font-weight: bolder; font-size:16px;">ITELSOCIAL</b>
                        </a>
                    </div>
                    
                </div>
                <div class="navbar-container container-fluid">
                    <ul class="nav-left">
                        <li>
                            <div class="sidebar_toggle"><a href="javascript:void(0)"><i class="ti-menu"></i></a></div>
                        </li>
                        <li>
                            <a href="#!" onclick="javascript:toggleFullScreen()" class="waves-effect waves-light">
                                <i class="ti-fullscreen"></i>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav-right">
                        <li class="header-notification">
                            <a href="#!" class="waves-effect waves-light">
                                <i class="ti-bell"></i>
                                <span class="badge bg-c-red"></span>
                            </a>
                            <ul class="show-notification">
                                <li>
                                    <h6>Notificações</h6>
                                    <label class="label label-danger">Novas</label>
                                </li>
                                <li class="waves-effect waves-light">
                                    <div class="media">
                                        <img class="d-flex align-self-center img-radius" src="assets/images/fititel.jpg" alt="Generic placeholder image">
                                        <div class="media-body">
                                            <h5 class="notification-user">ITELSOCIAL</h5>
                                            <p class="notification-msg">Thank you for use ITELSOCIAL.</p>
                                            <span class="notification-time">3 minutes ago</span>
                                        </div>
                                    </div>
                                </li>
                                <li class="waves-effect waves-light">
                                    <div class="media">
                                        <img class="d-flex align-self-center img-radius" src="assets/images/fititel.jpg" alt="Generic placeholder image">
                                        <div class="media-body">
                                            <h5 class="notification-user">ITELSOCIAL</h5>
                                            <p class="notification-msg">We'll update soon.</p>
                                            <span class="notification-time">30 minutes ago</span>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </li>
                        <li class="user-profile header-notification">
                            <a href="#!" class="waves-effect waves-light">
                                <img id="img_r" src="assets/images/user_gender_male.jpg" class="img-radius" alt="User-Profile-Image">
                                <span id="username">userName</span>
                                <i class="ti-angle-down"></i>
                            </a>
                            <ul class="show-notification profile-notification">
                                <li class="waves-effect waves-light">
                                    <a href="#!">
                                        <i class="ti-settings"></i> Configurações
                                    </a>
                                </li>

                                <li class="waves-effect waves-light">
                                    <a id="user_profile" href="user-profile.php" target="_self">
                                        <i class="ti-user"></i> Perfil
                                    </a>
                                </li>
                                <li class="waves-effect waves-light">
                                    <a href="email-inbox.php">
                                        <i class="ti-email"></i> Minhas Mensagens
                                    </a>
                                </li>
                                <li class="waves-effect waves-light">
                                        <i class="ti-layout-sidebar-left"></i><span id="logout"> Terminar Sessão</span>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="pcoded-main-container">
            <div class="pcoded-wrapper">
                <nav class="pcoded-navbar">
                    <div class="sidebar_toggle"><a href="#"><i class="icon-close icons"></i></a></div>
                    <div class="pcoded-inner-navbar main-menu">
                        <div class="">
                            <div class="main-menu-header">
                                <img id="img_l" class="img-80 img-radius" src="assets/images/user_gender_male.jpg" alt="User-Profile-Image" style="height: 70px; width: 90px;">
                                <div class="user-details">
                                    <span id="username2">userName</span>
                                    <span id="more-details"><i class="fa fa-caret-down"></i></span>
                                </div>
                            </div>
                            <div class="main-menu-content">
                                <ul>
                                    <li class="more-details">
                                        <a href="user-profile.php"><i class="ti-user"></i>Ver o perfil</a>
                                        <a href="#!"><i class="ti-settings"></i>Configurações</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                                                

                        <div class="pcoded-navigation-label">Navegação</div>
                        <ul class="pcoded-item pcoded-left-item">
                            <li class="active">
                                <a href="index.php" class="waves-effect waves-dark">
                                    <span class="pcoded-micon"><i class="ti-home"></i><b>D</b></span>
                                    <span class="pcoded-mtext">Página Inicial</span>
                                    <span class="pcoded-mcaret"></span>
                                </a>
                            </li>
                        </ul>


                        <div class="pcoded-navigation-label">Usuários</div>
                        <ul class="pcoded-item pcoded-left-item">
                            <li class="pcoded-hasmenu">
                                <a href="javascript:void(0)" class="waves-effect waves-dark">
                                    <span class="pcoded-micon"><i class="fas fa-user-circle"></i><b>BC</b></span>
                                    <span class="pcoded-mtext">Usuários</span>
                                    <span class="pcoded-mcaret"></span>
                                </a>
                                <ul class="pcoded-submenu">
                                    
                                    <li class="">
                                        <a href="pensioner_list.php" class="waves-effect waves-dark">
                                            <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                            <span class="pcoded-mtext">Lista de Usuarios</span>
                                            <span class="pcoded-mcaret"></span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>

                        
                        <div class="pcoded-navigation-label">Administrador</div>
                        <ul class="pcoded-item pcoded-left-item">
                            <li class="pcoded-hasmenu">
                                <a href="javascript:void(0)" class="waves-effect waves-dark">
                                    <span class="pcoded-micon"><i class="fas fa-user-circle"></i><b>BC</b></span>
                                    <span class="pcoded-mtext">Administrador</span>
                                    <span class="pcoded-mcaret"></span>
                                </a>
                                <ul class="pcoded-submenu">
                                    <li class=" ">
                                        <a href="signup_operator.php" class="waves-effect waves-dark">
                                            <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                            <span class="pcoded-mtext">Cadastrar Administrador</span>
                                            <span class="pcoded-mcaret"></span>
                                        </a>
                                    </li>
                                </ul>
                                <ul class="pcoded-submenu">
                                    <li class=" ">
                                        <a href="operator_list.php" class="waves-effect waves-dark">
                                            <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                            <span class="pcoded-mtext">Lista de Administradores</span>
                                            <span class="pcoded-mcaret"></span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>

                        
                        <!--<div class="pcoded-navigation-label">Factura</div>
                        <ul class="pcoded-item pcoded-left-item">
                            <li class="">
                                <a href="invoice.php" class="waves-effect waves-dark">
                                    <span class="pcoded-micon"><i class="ti-receipt"></i><b>B</b></span>
                                    <span class="pcoded-mtext">Factura</span>
                                    <span class="pcoded-mcaret"></span>
                                </a>
                            </li>
                        </ul>-->
                        <div class="pcoded-navigation-label">Gráfico e Mapas</div>
                        <ul class="pcoded-item pcoded-left-item">
                            <li class="">
                                <a href="chart-morris.php" class="waves-effect waves-dark">
                                    <span class="pcoded-micon"><i class="ti-bar-chart-alt"></i><b>C</b></span>
                                    <span class="pcoded-mtext">Gráfico</span>
                                    <span class="pcoded-mcaret"></span>
                                </a>
                            </li>
                        </ul>

                        <!--<div class="pcoded-navigation-label">Entrar e Inscrever-se</div>
                        <ul class="pcoded-item pcoded-left-item">
                            <li class="pcoded-hasmenu ">
                                <a href="javascript:void(0)" class="waves-effect waves-dark">
                                    <span class="pcoded-micon"><i class="ti-id-badge"></i><b>A</b></span>
                                    <span class="pcoded-mtext">Entrar/Inscrever-se</span>
                                    <span class="pcoded-mcaret"></span>
                                </a>
                                <ul class="pcoded-submenu">
                                    <li class="">
                                        <a href="auth-normal-sign-in.php" class="waves-effect waves-dark">
                                            <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                            <span class="pcoded-mtext">Entrar</span>
                                            <span class="pcoded-mcaret"></span>
                                        </a>
                                    </li>
                                    <li class="">
                                        <a href="auth-sign-up.php" class="waves-effect waves-dark">
                                            <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                            <span class="pcoded-mtext">Inscrever-se</span>
                                            <span class="pcoded-mcaret"></span>
                                        </a>
                                    </li>
                                    
                                </ul>
                            </li>
                        </ul>-->
                    </div>
                </nav>
                <!-- Page-header start -->

                <!-- Page-header end -->
