<?php include "init.php"; 
$obj = new base_class;
if(isset($_POST['change_password'])) {
    $current_password = $_POST['current_password'];
	$new_password     = $_POST['new_password'];
	$retype_password  = $_POST['retype_password'];

    $current_status = $new_status = $retype_status = 1;

    if(empty($current_password)) {
		$current_password_error = "No se ha ingresado la contraseña.";
		$current_status = "";
	}

	if(empty($new_password)) {
		$new_password_error = "No se ha ingresado una nueva contraseña.";
		$new_status = "";
	} else if(strlen($new_password) < 6) {
		$new_password_error = "La contraseña debe tener al menos 6 caracteres.";
		$new_status = "";
	}

	if(empty($retype_password)) {
		$retype_password_error = "No se ha ingresado de nuevo la contraseña.";
		$retype_status = "";
	} else if ($new_password != $retype_password) {
		$retype_password_error = "Las contraseñas no coinciden.";
		$retype_status = "";
    }
    
    if(!empty($current_status) && !empty($new_status) && !empty($retype_status)) {
        $user_id = $_SESSION['user_id'];
        if($obj->Normal_Query("SELECT password FROM usuarios WHERE id_usuario = ?", [$user_id])) {
            $row = $obj->Single_Result();
            $db_password = $row->password;
            if(password_verify($current_password, $db_password)){
                if($obj->Normal_Query("UPDATE usuarios SET password = ? WHERE id_usuario = ?", [password_hash($new_password,PASSWORD_DEFAULT), $user_id])) {
                    $obj->Create_Session("password_updated", "Su contraseña se cambió correctamente.");
                    header("location:dash.php");
                }
            } else {
                $current_password_error = "Por favor ingrese la contrasaña correcta.";
            }
        }
    }
}

if(isset($_POST['change_name'])) {
    $user_name = $_POST['user_name'];
    $user_id = $_SESSION['user_id'];
    if(empty($user_name)) {
		$user_name_error = "No se ha ingresado ningún nombre.";
	} else {
		if($obj->Normal_Query("UPDATE usuarios SET nombre = ? WHERE id_usuario = ?", [$user_name, $user_id])){
            $obj->Create_Session("user_name", $user_name);
            $obj->Create_Session("name_updated", "Se actualizó el nombre correctamente.");
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
        $img_error  = "No se escogió ninguna imagen.";
    }else if(!in_array($img_extension, $extensions)) {
        $img_error = "Seleccione un formato de imagen válido.";
    }else {
        $user_id = $_SESSION['user_id'];
        move_uploaded_file($img_tmp , "$img_path/$img_name");
        if($obj->Normal_Query("UPDATE usuarios SET image = ? WHERE id_usuario = ?", [$img_name, $user_id])){
            $obj->Create_Session("update_image", "Se cambió la imagen de perfil.");
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
    <!--Lista de CSS-->
    <?php include "librerias.php"  ?>

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
        <?php include "sidebar.php"?>
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
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-user"></i>
                                                </div>
                                                <input type="text" id="company" placeholder="<?php echo $_SESSION['user_name'] ?>" class="form-control" name="user_name">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="vat" class=" form-control-label">Email</label>
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-envelope"></i>
                                                </div>
                                                <input type="text" id="vat" placeholder="<?php echo $_SESSION['user_email'] ?>" class="form-control" >
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="street" class=" form-control-label">Departamento</label>
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-archive"></i>
                                                </div>
                                                <input type="text" id="disabled-input" name="disabled-input" disabled=""placeholder="Informatica" class="form-control">
                                            </div>
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
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-asterisk"></i>
                                                </div>
                                                <input type="password" id="company" placeholder="" class="form-control" name="current_password">
                                        </div>
                                        <div class="name-error error">
                                            <?php if(isset($current_password_error)): ?>
                                            <?php echo "<p>$current_password_error</p>"; ?>
                                            <?php endif; ?>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="vat" class=" form-control-label">Nueva contraseña</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-asterisk"></i>
                                            </div>
                                            <input type="password" id="vat" placeholder="" class="form-control" name="new_password">
                                            <div class="name-error error">
                                        </div>
                                    </div>
                                    <?php if(isset($new_password_error)): ?>
                                    <?php echo "<p>$new_password_error</p>"; ?>
                                    <?php endif; ?>
                                </div>

                                <div class="form-group">
                                    <label for="street" class=" form-control-label">Vuelva a escribir la nueva contraseña</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-asterisk"></i>
                                            </div>
                                            <input type="password" id="street" placeholder="" class="form-control" name="retype_password" >
                                        </div>
                                        <div class="name-error error" >
                                        <?php if(isset($retype_password_error)): ?>
                                        <?php echo "<p>$retype_password_error</p>"; ?>
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
    <!--Lista de Scrips-->
    <?php include "scripts.php" ?>
    </body>
</html>
<!-- end document-->
