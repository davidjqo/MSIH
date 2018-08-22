<?php include "init.php"; 
$obj = new base_class;
if(isset($_POST['change_password'])) {
    $current_password = $_POST['current_password'];
	$new_password     = $_POST['new_password'];
	$retype_password  = $_POST['retype_password'];

    $current_status = $new_status = $retype_status = 1;

    if(empty($current_password)) {
		$current_password_error = "No se ha ingresado la contraseña";
		$current_status = "";
	}

	if(empty($new_password)) {
		$new_password_error = "No se ha ingresado una nueva contraseña";
		$new_status = "";
	} else if(strlen($new_password) < 6) {
		$new_password_error = "La contraseña debe tener al menos 6 caracteres";
		$new_status = "";
	}

	if(empty($retype_password)) {
		$retype_password_error = "No se ha ingresado de nuevo la contraseña";
		$retype_status = "";
	} else if($new_password != $retype_password) {
		$retype_password_error = "Las contraseñas no coinciden ";
		$retype_status = "";
    }
    
    if(!empty($current_status) && !empty($new_status) && !empty($retype_status)) {
        $user_id = $_SESSION['user_id'];
        if($obj->Normal_Query("SELECT password FROM users WHERE id = ?", [$user_id])) {
            $row = $obj->Single_Result();
            $db_password = $row->password;
            if(password_verify($current_password, $db_password)){
                if($obj->Normal_Query("UPDATE users SET password = ? WHERE id = ?", [password_hash($new_password,PASSWORD_DEFAULT), $user_id])) {
                    $obj->Create_Session("password_updated", "Su contraseña se cambio correctamente");
                    header("location:dash.php");
                }

            }else{
                $current_password_error = "Por favor ingrese la contrasaña correcta";
            }

        }

    }




}

if(isset($_POST['change_name'])) {
    $user_name = $_POST['user_name'];
    $user_id = $_SESSION['user_id'];
    if(empty($user_name)) {
		$user_name_error = "No se ha ingresado ningun nombre";
	}else {
		if($obj->Normal_Query("UPDATE users SET name = ? WHERE id = ?", [$user_name, $user_id])){
            $obj->Create_Session("user_name", $user_name);
            $obj->Create_Session("name_updated", "Se actualizo el nombre correctamente");
            header("location:dash.php");
        }
}
}

if(isset($_POST['change_image'])) {
    $img_name  = $_FILES['change_img']['name'];
    $img_tmp   = $_FILES['change_img']['tmp_name'];
    $img_path  = "../dist/img/";
    $extensions = ['jpg', 'jpeg', 'png'];
    $img_ext   = explode(".", $img_name);
    $img_extension = end($img_ext);

    if(empty($img_name)) {
        $img_error  = "No se escogio ninguna imagen";
    }else if(!in_array($img_extension, $extensions)) {
        $img_error = "Seleccione un formato de imagen valido";
    }else {
        $user_id = $_SESSION['user_id'];
        move_uploaded_file($img_tmp , "$img_path/$img_name");
        if($obj->Normal_Query("UPDATE users SET image = ? WHERE id = ?", [$img_name, $user_id])){
            $obj->Create_Session("update_image", "Se cambio la imagen de perfil");
            $obj->Create_Session("user_image", $img_name);
   		    header("location:dash.php");
        }
    }


}





?>



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

</head>

<body class="animsition">
    <div class="page-wrapper">
        <!-- HEADER MOBILE-->
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
                            <a href="#">
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
            <!-- HEADER DESKTOP-->

            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                  
                        <div class="row">
                        
                       <div class="col-lg-6">
                       <form method="POST" action="">
                                <div class="card">
                                    <div class="card-header">
                                        <strong>Mi perfil</strong>
                                      
                                    </div>
                                    <div class="card-body card-block">
                                        <div class="form-group">
                                            <label for="company" class=" form-control-label">Nombre</label>
                                            <input type="text" id="company" placeholder="<?php echo $_SESSION['user_name'] ?>" class="form-control" name="user_name">
                                        </div>
                                        <div class="form-group">
                                            <label for="vat" class=" form-control-label">Email</label>
                                            <input type="text" id="vat" placeholder="<?php echo $_SESSION['user_email'] ?>" class="form-control" >
                                        </div>
                                        <div class="form-group">
                                            <label for="street" class=" form-control-label">Departamento</label>
                                            <input type="text" id="disabled-input" name="disabled-input" disabled=""placeholder="Informatica" class="form-control">
                                        </div>
                                     <div>
                                                <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block" name="change_name">
                                                   
                                                   
                                                    <span id="payment-button-amount">Actualizar perfil</span>
                                                    <span id="payment-button-sending" style="display:none;">Sending…</span>
                                                </button>
                                            </div>
                                        
                                    </div>
                                 
                                </div>
                               
                            </div>
                            </form>



  <div class="col-lg-6">
  <form method="POST" action="">
                                <div class="card">
                                    <div class="card-header">
                                        <strong>Cambiar contraseña</strong>
                                       
                                    </div>
                                    <div class="card-body card-block">
                                        <div class="form-group">
                                            
                                            <label for="company" class=" form-control-label">Contraseña actual</label>
<input type="password" id="company" placeholder="" class="form-control" name="current_password" 
>
                                            <div class="name-error error">
                                         <?php if(isset($current_password_error)): ?>

                                      <?php echo $current_password_error; ?>

                                      <?php endif; ?>
                                        </div>
                                        
                                        </div>
                                        <div class="form-group">
                                            <label for="vat" class=" form-control-label">Nueva contraseña</label>
                                            <input type="password" id="vat" placeholder="" class="form-control" name="new_password"
                                           >
                                            <div class="name-error error">
                  <?php if(isset($new_password_error)): ?>

                     <?php echo $new_password_error; ?>

                  <?php endif; ?>
               </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="street" class=" form-control-label">Vuelva a escribir la contraseña</label>
                                            <input type="password" id="street" placeholder="" class="form-control" name="retype_password" 
                                           >
                                            <div class="name-error error">
                  <?php if(isset($retype_password_error)): ?>

                     <?php echo $retype_password_error; ?>

                  <?php endif; ?>
               </div>
                                        </div>
                                      



                                        
                                        


                                        <div>
                                                <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block" name="change_password">
                                                 <span id="payment-button-amount">Actualizar contraseña</span>
                                                    <span id="payment-button-sending" style="display:none;">Sending…</span>
                                                </button>
                                            </div>
                                        
                                    </div>
                                    
                                </div>
                                
                            </div>


</form>




<!--Cambiar Imagen-->
<div class="col-lg-6">
  <form method="POST" action="" enctype="multipart/form-data">
                                <div class="card">
                                    <div class="card-header">
                                        <strong>Cambiar imagen</strong>
                                       
                                    </div>
                                    <div class="card-body card-block">
                                        <div class="form-group">
                                            <label for="change-image" class=" form-control-label"></label>
                                            <input type="file" name="change_img" id="change-image" class="change-img">

                                        
                   
                        
                                        </div>
                                      
                                          
                                        <div>
                                                <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block" name="change_image">
                                                 <span id="payment-button-amount">Actualizar imagen</span>
                                                   
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

</body>

</html>
<!-- end document-->
