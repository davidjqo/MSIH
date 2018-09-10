<?php
include "init.php";
$obj = new base_class;
if (isset($_POST['enviar'])) {
    $nombre = $obj->security($_POST['nombre']);
    $apellido = $obj->security($_POST['apellido']);
    $email = $obj->security($_POST['email']);
    $contraseña = $obj->security($_POST['contraseña']);
    $img_name = $_FILES['img']['name'];
    $img_tmp = $_FILES['img']['tmp_name'];
    $img_path = "../dist/img/";
    $extensions = ['jpg', 'jpeg', 'png'];

    $status = 0;
    $rol = 2;
    $clean_status = 0;

    move_uploaded_file($img_tmp, "$img_path/$img_name");

    //Manejo de errores
    //Revisar espacios vacios

    if ($obj->Normal_Query("SELECT * FROM usuarios WHERE email = ?", [$email])) {
        if ($obj->Count_Rows() == 1) {
        } else {
            echo "¡Email ya registrado!";
        }
    }
        //encriptando la contrasenna
    $hashhedPwd = password_hash($contraseña, PASSWORD_DEFAULT);
        //Insertar en la base de datos
    if ($obj->Normal_Query("INSERT INTO usuarios (nombre, primer_apellido, email, password, image, status) 
            VALUES (?,?,?,?,?,?)", [$nombre, $apellido, $email, $hashhedPwd, $img_name, $status])) {
        $obj->Create_Session("account_success", "Your account is successfully created");
        header("location:login.php");
    }

} /*else {
        //Revisar si los caracteres de entrada son validos
        if (!preg_match("/^[a-aA-Z]*$", $nombre)) {
            header("location: ../narrow-jumbotron/registro.php?registro=invalido");
            exit();
        }*/ /*else {
            //Revisar que el email sea valido
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                header("location: ../narrow-jumbotron/registro.php?registro=email");
                exit();
            }*/ 
                
            
        //}
    //}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registro</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
    <link href="narrow-jumbotron.css" rel="stylesheet">
    <link rel="icon" type="image/png" href="../dist/img/logoMuni.png"/>
</head>

<body>
    <div class="container">
        <div class="header clearfix">
            <nav>
              <ul class="nav nav-pills float-right">
                <li class="nav-item">
                  <a class="nav-link active" href="index.php">Inicio<span class="sr-only">(current)</span></a>
                </li>

                <li class="nav-item">
                  <a class="nav-link" href="login.php">Iniciar sesión</a>
                </li>
                
                <li class="nav-item">
                  <a class="nav-link" href="contacto.php">Contacto</a>
                </li>
              </ul>
            </nav>
            <h4 class="text-muted">Crear un nuevo usuario</h4>
          </div>
        
        <div class="row justify-content-center">
        <div class="col-md-6">
        <div class="card">
        <header class="card-header">
            <a href="login.php" class="float-right btn btn-outline-primary mt-1">Iniciar sesión</a>
            <h4 class="card-title mt-2">Registro</h4>
        </header>
        <article class="card-body">
        <form method="POST" action="" enctype="multipart/form-data"><!-- Inicio del formulario-->

        <?php 
        $fullUrl = "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

        if (strpos($fullUrl, "registro=vacio") == true) {
            echo "<strong style='color:red;'>* Complete los espacios vacíos.</strong>";
        }
        ?>

            <div class="form-row">
                <div class="col form-group">
                    <label>* Nombre</label>   
                    <input type="text" name="nombre" class="form-control" placeholder="">
                </div> <!-- form-group end.// -->
                
            </div> <!-- form-row end.// -->
            <?php 
            $fullUrl = "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

            if (strpos($fullUrl, "registro=nombreVacio") == true) {
                echo "<p style='color:red;'>Ingrese un nombre.</p>";
            }
            if (strpos($fullUrl, "registro=invalido") == true) {
                echo "<p style='color:red;'>Ingrese un nombre válido.</p>";
            }
            ?>

            <div class="form-row">
                <div class="col form-group">
                    <label>* Primer apellido</label>   
                    <input type="text" name="apellido" class="form-control" placeholder="">
                </div> <!-- form-group end.// -->
                
            </div> <!-- form-row end.// -->
            <?php 
            $fullUrl = "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

            if (strpos($fullUrl, "registro=nombreVacio") == true) {
                echo "<p style='color:red;'>Ingrese un nombre.</p>";
            }
            if (strpos($fullUrl, "registro=invalido") == true) {
                echo "<p style='color:red;'>Ingrese un nombre válido.</p>";
            }
            ?>
            
            <div class="form-group">
                <label>* Email </label>
                <input type="email" name="email" class="form-control" placeholder="">
            </div> <!-- form-group end.// -->
            <?php 
            $fullUrl = "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

            if (strpos($fullUrl, "registro=emailVacio") == true) {
                echo "<p style='color:red;'>Ingrese un correo electrónico.</p>";
            }
            /*if (strpos($fullUrl, "registro=email") == true) {
                echo "<p style='color:red;'>Ingrese un correo válido.</p>";
            }*/
            if (strpos($fullUrl, "registro=emailUsado") == true) {
                echo "<p style='color:red;'>Correo en uso.</p>";
            }
            ?>
           
            <div class="form-row">
              
            </div> <!-- form-row.// -->

            <div class="form-group">
                <label>* Contraseña</label>
                <input name="contraseña" class="form-control" type="password">
            </div> <!-- form-group end.// -->  
            <?php 
            $fullUrl = "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

            if (strpos($fullUrl, "registro=contrasenaVacia") == true) {
                echo "<p style='color:red;'>Ingrese una contraseña.</p>";
            }
            ?>

            <div class="group">
   				<label for="file" id="file-label"><i class="fas fa-cloud-upload-alt upload-icon"></i>* Imagen</label>
   				<input type="file" name="img" class="file" id="file">
            </div>
            <?php 
            $fullUrl = "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

            if (strpos($fullUrl, "registro=imgVacia") == true) {
                echo "<p style='color:red;'>Cargue una imagen desde su dispositivo.</p>";
            }
            ?>
               
            <br>

            <div class="form-group">
                <button type="submit" name="enviar" class="btn btn-primary btn-block">Crear cuenta</button>
            </div> <!-- form-group// -->   
            <p class="text-muted">
                <strong>*</strong> Espacios obligatorios.
            </p>
            <?php 
            $fullUrl = "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

            if (strpos($fullUrl, "registro=correcto") == true) {
                echo "<p style='color:darkblue;'>¡Cuenta registrada!</p>";
            }
            ?>
                                       
        </form>
        </article> <!-- card-body end .// -->
      
        </div> <!-- card.// -->
        </div> <!-- col.//-->
        
        </div> <!-- row.//-->
        
        </div> 
        <!--container end.//-->
        
</body>
</html>
