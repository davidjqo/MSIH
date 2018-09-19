<?php include "init.php";
$obj = new base_class;
?>
<?php if (!isset($_SESSION["user_id"])) : ?>
<?php header("location:login.php"); ?>
<?php endif; ?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <!-- Required meta tags-->
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="au theme template">
        <meta name="keywords" content="au theme template">

        <!-- Title Page-->
        <title>Perfil</title>

        <!--Lista de CSS-->
        <?php include "librerias.php" ?>

        <style>
            p {
                color:red;
            }
        </style>
    </head>

    <body class="animsition">
        <div class="page-wrapper">
            <!-- HEADER MOBILE-->
        
            <!-- END HEADER MOBILE-->

            <!-- MENU SIDEBAR-->
            <?php include "sidebar.php" ?>
            <!-- END MENU SIDEBAR-->

            <!-- PAGE CONTAINER-->
                <div class="page-container">
                <!-- HEADER DESKTOP-->
                    <header class="header-desktop">
                        <div class="section__content section__content--p30">
                            <div class="container-fluid">
                                <div class="header-wrap">
                                    <form class="form-header" action="" method="POST">
                                        <input class="au-input au-input--xl" type="text" name="search" placeholder="" />
                                        <button class="au-btn--submit" type="submit">
                                            <i class="zmdi zmdi-search"></i>
                                        </button>
                                    </form>
                                    <div class="header-button">
                                        <div class="noti-wrap">
                                            <div class="noti__item js-item-menu">
                                                <div class="mess-dropdown js-dropdown">   
                                            </div>
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
                                                        <p>Al acuerdo número 1000 le quedan 15 días para finalizar </p>
                                                        <span class="date">Agosto 10, 2018 06:50</span>
                                                    </div>
                                                </div>

                                                <div class="notifi__item">
                                                    <div class="bg-c3 img-cir img-40">
                                                        <i class="zmdi zmdi-file-text"></i>
                                                    </div>
                                                    <div class="content">
                                                        <p>Al acuerdo número 1000 le quedan 10 días para finalizar </p>
                                                        <span class="date">Agosto 15, 2018 06:50</span>
                                                    </div>
                                                </div>

                                                <div class="notifi__item">
                                                    <div class="bg-c3 img-cir img-40">
                                                        <i class="zmdi zmdi-file-text"></i>
                                                    </div>
                                                    <div class="content">
                                                        <p>Al acuerdo número 1000 le quedan 5 días para finalizar </p>
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
                                                        <a href="#">
                                                        <i class="zmdi zmdi-account"></i>Perfil</a>
                                                    </div>
                                                    <div class="account-dropdown__item">
                                                        <a href="#">
                                                        <i class="zmdi zmdi-settings"></i>Configuración</a>
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

                <div class="main-content">
                    <div class="section__content section__content--p30">
                        <div class="container-fluid">   
                            <div class="row">
                                <div class="col-lg-8">
                                    <form method="POST" action="">
                                        <div class="card">
                                            <div class="card-header">
                                                <strong>Acuerdo</strong>
                                            </div>
                                            <div class="card-body card-block">
                                            
                                            <div class="form-group">
                                                <label for="street" class=" form-control-label">Sesión</label>
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-archive"></i>
                                                    </div>
                                                    <input type="text" id="disabled-input" name="disabled-input" disabled="" placeholder="verAcuerdos.php?titulo_sesion=<?php echo $titulo_sesion ?>" class="form-control">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="street" class=" form-control-label">Acuerdo</label>
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-archive"></i>
                                                    </div>
                                                    <input type="text" id="disabled-input" name="disabled-input" disabled="" placeholder="<?php echo $_SESSION['titulo_acuerdo']; ?>" class="form-control">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="street" class=" form-control-label">Departamento</label>
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-archive"></i>
                                                    </div>
                                                    <input type="text" id="disabled-input" name="disabled-input" disabled="" placeholder="Informática" class="form-control">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="street" class=" form-control-label">Fecha creación</label>
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-calendar-o"></i>
                                                    </div>
                                                    <input type="text" id="disabled-input" name="disabled-input" disabled="" placeholder="<?php echo $_SESSION['fecha_acuerdo']; ?>" class="form-control">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="x_card_code" class="control-label mb-1">Fecha finiquito</label>
                                                    <div class="input-group">
                                                        <div class="input-group-addon">
                                                            <i class="fa fa-calendar-o"></i>
                                                        </div>
                                                        <input type="text" id="disabled-input" name="disabled-input" disabled="" placeholder="<?php echo $_SESSION['fecha_finiquito']; ?>" class="form-control">
                                                        <input id="cc-pament" name="fecha_finiquito" type="date" class="form-control" aria-required="true" aria-invalid="false" placeholder="Dia">
                                                    </div>
                                                </div>
                                            </div>

                                            <div>
                                                <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block" name="change_name">       
                                                    <span id="payment-button-amount">Actualizar Acuerdo</span>
                                                    <span id="payment-button-sending" style="display:none;">Sending…</span>
                                                </button>
                                            </div>                                       
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END PAGE CONTAINER-->
        </div>
        <!--Lista de Scrips-->
        <?php include "scripts.php" ?>

    </body>

</html>
<!-- end document-->