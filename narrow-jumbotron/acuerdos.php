<?php include "init.php"; 
$obj = new base_class;

if(isset($_POST['send_a'])){
    $num_sesion = $_POST['num_sesion'];
    $num_acuerdo = $_POST['num_acuerdo'];
    $departamento = $_POST['departamento'];
    $descripcion = $_POST['descripcion'];
    $archivo_name = $_FILES['archivo']['name'];
    $archivo_tmp   = $_FILES['archivo']['tmp_name'];
    $fecha_creacion = $_POST['fecha_creacion'];
    $fecha_finiquito = $_POST['fecha_finiquito'];
    $file_path  = "../dist/img/";
    $extensions = ['pdf', 'txt', 'docx'];

    $status = 0;
    $clean_status = 0;
    move_uploaded_file($archivo_tmp, "$file_path/$archivo_name");
    if($obj->Normal_Query("INSERT INTO acuerdos (num_sesion,num_acuerdo, departamento, descripcion, archivo,fecha_creacion,fecha_finiquito) 
      VALUES (?,?,?,?,?,?,?)", [$num_sesion, $num_acuerdo,$departamento , $descripcion, $archivo_name,$fecha_creacion,$fecha_finiquito])) {

<<<<<<< HEAD
              
                
                 
=======
                
                
>>>>>>> 5c840d11ee52d915ef5b386464b2818502a2b4cd
                 $obj->Create_Session("num_acuerdo", $num_acuerdo);
                 $obj->Create_Session("num_sesion", $num_sesion);
                 $obj->Create_Session("departamento", $departamento);
                 $obj->Create_Session("fecha_creacion", $fecha_creacion);
                 $obj->Create_Session("fecha_finiquito", $fecha_finiquito);
<<<<<<< HEAD
                 $obj->Create_Session("archivo", $archivo_name);
=======
               
>>>>>>> 5c840d11ee52d915ef5b386464b2818502a2b4cd
            }

}




?>

<?php if(!isset($_SESSION["user_id"])): ?>

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
    <title>Acuerdos</title>

<<<<<<< HEAD
   <!--Lista de CSS-->
  <?php include "librerias.php"  ?>
=======
    <!-- Fontfaces CSS-->
    <link href="css/font-face.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/theme.css" rel="stylesheet" media="all">
>>>>>>> 5c840d11ee52d915ef5b386464b2818502a2b4cd

</head>

<body class="animsition">
    <div class="page-wrapper">
        <!-- HEADER MOBILE-->
<<<<<<< HEAD
       
        <!-- END HEADER MOBILE-->

        <!-- MENU SIDEBAR-->
       <?php include "sidebar.php"?>
=======
        <header class="header-mobile d-block d-lg-none">
            <div class="header-mobile__bar">
                <div class="container-fluid">
                    <div class="header-mobile-inner">
                       
                        <button class="hamburger hamburger--slider" type="button">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <nav class="navbar-mobile">
                <div class="container-fluid">
                    <ul class="navbar-mobile__list list-unstyled">
                        <li class="has-sub">
                            <a class="js-arrow" href="dash.php">
                                <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                       
                        </li>
                        <li>
                            <a href="chart.html">
                                <i class="fas fa-chart-bar"></i>Charts</a>
                        </li>
                        <li>
                            <a href="table.html">
                                <i class="fas fa-table"></i>Tables</a>
                        </li>
                        <li>
                            <a href="form.html">
                                <i class="far fa-check-square"></i>Forms</a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fas fa-calendar-alt"></i>Calendar</a>
                        </li>
                        <li>
                            <a href="map.html">
                                <i class="fas fa-map-marker-alt"></i>Maps</a>
                        </li>
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-copy"></i>Pages</a>
                            <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                                <li>
                                    <a href="login.html">Login</a>
                                </li>
                                <li>
                                    <a href="register.html">Register</a>
                                </li>
                                <li>
                                    <a href="forget-pass.html">Forget Password</a>
                                </li>
                            </ul>
                        </li>
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-desktop"></i>UI Elements</a>
                            <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                                <li>
                                    <a href="button.html">Button</a>
                                </li>
                                <li>
                                    <a href="badge.html">Badges</a>
                                </li>
                                <li>
                                    <a href="tab.html">Tabs</a>
                                </li>
                                <li>
                                    <a href="card.html">Cards</a>
                                </li>
                                <li>
                                    <a href="alert.html">Alerts</a>
                                </li>
                                <li>
                                    <a href="progress-bar.html">Progress Bars</a>
                                </li>
                                <li>
                                    <a href="modal.html">Modals</a>
                                </li>
                                <li>
                                    <a href="switch.html">Switchs</a>
                                </li>
                                <li>
                                    <a href="grid.html">Grids</a>
                                </li>
                                <li>
                                    <a href="fontawesome.html">Fontawesome Icon</a>
                                </li>
                                <li>
                                    <a href="typo.html">Typography</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- END HEADER MOBILE-->

        <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar d-none d-lg-block">
            <div class="logo">
            <p>Control de acuerdos MSIH</p>
            </div>
            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">
                        <li class="active has-sub">
                            <a class="js-arrow" href="dash.php">
                                <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                            
                        </li>
                        <li>
                            <a href="perfil.php">
                                <i class="fas fa-chart-bar"></i>Perfil</a>
                        </li>
                        <li  class="has-sub">
                        <a class="js-arrow" href="#">
                                <i class="fas fa-copy"></i>Acuerdos</a>
                                <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                                <li>
                                    <a href="acuerdos.php"> 1 .Crear acuerdos</a>
                                </li>
                                <li>
                                    <a href="verAcuerdos.php"> 2 .ver acuerdos </a>
                                </li>
                                
                            </ul>
                        </li>
                        
                        <li>
                            <a href="#">
                                <i class="fas fa-calendar-alt"></i>Calendario</a>
                        </li>
                        
                        
                    </ul>
                </nav>
            </div>
        </aside>
>>>>>>> 5c840d11ee52d915ef5b386464b2818502a2b4cd
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->
<<<<<<< HEAD
            <?php include "header.php" ?>
=======
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
                                            <div class="email__title">
                                               
                                            </div>
                                            
                                           
                                              
                                           
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
                                                    <p>Al acuerdo numero 1000 le quedan 15 
                                                    dias para finalizar </p>
                                                    <span class="date">Agosto 10, 2018 06:50</span>
                                                </div>
                                            </div>


                                               <div class="notifi__item">
                                                <div class="bg-c3 img-cir img-40">
                                                    <i class="zmdi zmdi-file-text"></i>
                                                </div>
                                                <div class="content">
                                                <p>Al acuerdo numero 1000 le quedan 10
                                                    dias para finalizar </p>
                                                    <span class="date">Agosto 15, 2018 06:50</span>
                                                </div>
                                            </div>


                                               <div class="notifi__item">
                                                <div class="bg-c3 img-cir img-40">
                                                    <i class="zmdi zmdi-file-text"></i>
                                                </div>
                                                <div class="content">
                                                <p>Al acuerdo numero 1000 le quedan 5
                                                    dias para finalizar </p>
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
                                            <img src="../dist/img/<?php  echo $_SESSION['user_image']; ?>" alt="John Doe" />
                                        </div>
                                        <div class="content">
                                            <a class="js-acc-btn" href="#"><?php echo ucfirst($_SESSION['user_name']); ?></a>
                                        </div>
                                        <div class="account-dropdown js-dropdown">
                                            <div class="info clearfix">
                                                <div class="image">
                                                    <a href="#">
                                                        <img src="../dist/img/<?php  echo $_SESSION['user_image']; ?>" alt="John Doe" />
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
>>>>>>> 5c840d11ee52d915ef5b386464b2818502a2b4cd
            <!-- HEADER DESKTOP-->

            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-8">
                                <div class="card">
                                    
                                    <div class="card-body">
                                        <div class="card-title">
                                            <h3 class="text-center title-2">Nuevo acuerdo</h3>
                                        </div>
                                        <hr>
                                        <form form method="POST" action="" enctype="multipart/form-data">
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Numero de sesión</label>
                                                <input id="cc-pament" name="num_sesion" type="text" class="form-control" aria-required="true" aria-invalid="false" >
                                            </div>
                                            <div class="form-group has-success">
                                                <label for="cc-name" class="control-label mb-1">Numero de acuerdo</label>
                                                <input id="cc-name" name="num_acuerdo" type="text" class="form-control cc-name valid" data-val="true" data-val-required="Please enter the name on card"
                                                    autocomplete="cc-name" aria-required="true" aria-invalid="false" aria-describedby="cc-name-error">
                                                <span class="help-block field-validation-valid" data-valmsg-for="cc-name" data-valmsg-replace="true"></span>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="select" class=" form-control-label">DPT</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <select id="select" class="form-control" name="departamento">
                                                        <option value="0">Alcaldía</option>
                                                        <option value="1">Ambiente</option>
                                                        <option value="2">Proveeduría</option>
                                                        <option value="3">Recursos Humanos</option>
                                                        <option value="4">Oficina de Gestión Social</option>
                                                        <option value="5">Departamento Legal</option>
                                                        <option value="6">Informática</option>
                                                        <option value="7">CECUDI</option>
                                                        <option value="8">Contabilidad</option>
                                                        <option value="9">Tesorería</option>
                                                        <option value="10">Planificación Urbana</option>

                                                    </select>
                                                </div>
                                            </div>
                                            

                                                 <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="textarea-input" class=" form-control-label">Descripción</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <textarea name="descripcion" id="textarea-input" rows="9" placeholder="" class="form-control"></textarea>
                                                </div>
                                            </div>

                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                <i class="fa fa-print"></i>
                                                <label for="file-input" class=" form-control-label">Archivo</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="file" id="file-input" name="archivo" class="form-control-file">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="cc-exp" class="control-label mb-1">Fecha creación</label>
                                                        <input id="cc-pament" name="fecha_creacion" type="date" class="form-control" aria-required="true" aria-invalid="false" >
                                                        <span class="help-block" data-valmsg-for="cc-exp" data-valmsg-replace="true"></span>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <label for="x_card_code" class="control-label mb-1">Fecha finiquito</label>
                                                    <div class="input-group">
                                                    <input id="cc-pament" name="fecha_finiquito" type="date" class="form-control" aria-required="true" aria-invalid="false" >
                                                        

                                                    </div>
                                                </div>
                                            </div>
                                            <div>
                                                <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block" name="send_a">
                                                   
                                                    <i class="fa fa-folder"></i>
                                                    <span id="payment-button-amount">Crear nuevo acuerdo</span>
                                                    
                                                </button>
                                            </div>
                                        </form>
                                    </div>

                                    
                                </div>
                                
                            </div>
                           
                            <div class="col-sm-6 col-lg-3">
                                <div class="overview-item overview-item--c3">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                <i class="zmdi zmdi-calendar-note"></i>
                                            </div>
                                            <div class="text">
                                      

                                                <h2>157</h2>
                                       
                                                <span>Acuerdos</span>
                                                
                                      
                                            </div>
                                        </div>
                                        <div class="overview-chart">
                                            <canvas id="widgetChart3"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                         
                            
                          






                        
                            
                          
                           
                           
                           
                            
                            
                        </div>
                      
                    </div>
                </div>
            </div>

            <!-- END PAGE CONTAINER-->
        

    

<<<<<<< HEAD
   <!--Lista de Scrips-->

<?php include "scripts.php" ?>
=======
    <!-- Jquery JS-->
    <script src="vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="vendor/slick/slick.min.js">
    </script>
    <script src="vendor/wow/wow.min.js"></script>
    <script src="vendor/animsition/animsition.min.js"></script>
    <script src="vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="vendor/circle-progress/circle-progress.min.js"></script>
    <script src="vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="vendor/select2/select2.min.js">
    </script>

    <!-- Main JS-->
    <script src="js/main.js"></script>
>>>>>>> 5c840d11ee52d915ef5b386464b2818502a2b4cd

</body>

</html>
<!-- end document-->
