<header class="header-desktop">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="header-wrap">
                <!-- Search -->
                <form class="form-header" action="" method="POST">
                    <input class="au-input au-input--xl" type="text" name="search" placeholder="Buscar..."/>
                    <button class="au-btn--submit" type="submit">
                        <i class="zmdi zmdi-search"></i>
                    </button>
                </form>

                <div class="header-button">
                    <div class="noti-wrap">
                        <div class="noti__item js-item-menu">                                       
                            <div class="mess-dropdown js-dropdown"></div>
                        </div>
                        <div class="noti__item js-item-menu">
                            <div class="email-dropdown js-dropdown">
                                <div class="email__title"></div>
                            </div>
                        </div>            
                        <div class="noti__item js-item-menu">
                            <i class="zmdi zmdi-notifications"></i>
                            <span class="quantity">3</span>
                            <div class="notifi-dropdown js-dropdown">
                                <div class="notifi__title">
                                    <p>Usted tiene 3 notificaciones</p>
                                </div>
                                            
                                <div class="notifi__item">
                                    <div class="bg-c3 img-cir img-40">
                                        <i class="zmdi zmdi-file-text"></i>
                                    </div>
                                    <div class="content">
                                        <p>Al acuerdo número 1000 le quedan 15 días para finalizar</p>
                                        <span class="date">Agosto 10, 2018 06:50</span>
                                    </div>
                                </div>

                                <div class="notifi__item">
                                    <div class="bg-c3 img-cir img-40">
                                        <i class="zmdi zmdi-file-text"></i>
                                    </div>
                                    <div class="content">
                                        <p>Al acuerdo número 1000 le quedan 10 días para finalizar</p>
                                        <span class="date">Agosto 15, 2018 06:50</span>
                                    </div>
                                </div>

                                <div class="notifi__item">
                                    <div class="bg-c3 img-cir img-40">
                                        <i class="zmdi zmdi-file-text"></i>
                                    </div>
                                    <div class="content">
                                        <p>Al acuerdo número 1000 le quedan 5 días para finalizar</p>
                                        <span class="date">Agosto 20, 2018 06:50</span>
                                    </div>
                                </div>

                                <div class="notifi__footer">
                                    <a href="#">Todas las notificaciones</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="account-wrap">
                        <div class="account-item clearfix js-item-menu">
                            <div class="image">
                                <img src="../dist/img/<?php echo $_SESSION['user_image']; ?>" alt=<?php echo $_SESSION['user_name']; ?> />
                            </div>
                            <div class="content">
                                <a class="js-acc-btn" href="#"><?php echo ucfirst($_SESSION['user_name']); ?></a>
                            </div>
                            <div class="account-dropdown js-dropdown">
                                <div class="info clearfix">
                                    <div class="image">
                                        <a href="#">
                                            <img src="../dist/img/<?php echo $_SESSION['user_image']; ?>" alt=<?php echo $_SESSION['user_name']; ?> />
                                        </a>
                                    </div>
                                    <div class="content">
                                        <h5 class="name">
                                            <a href="#"><?php echo ucfirst($_SESSION['user_name']); ?></a>
                                        </h5>
                                        <span class="email"><?php echo $_SESSION['user_email']; ?></span>
                                    </div>
                                </div>
                                <div class="account-dropdown__body">
                                    <div class="account-dropdown__item">
                                        <a href="perfil.php">
                                        <i class="zmdi zmdi-account"></i>Perfil</a>
                                    </div>
                                    <div class="account-dropdown__item">
                                        <a href="perfil.php">
                                        <i class="fas fa-calendar-alt"></i>Calendario</a>
                                    </div>            
                                </div>
                                <div class="account-dropdown__footer">
                                    <a href="logout.php">
                                    <i class="zmdi zmdi-power"></i>Cerrar sesión</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>