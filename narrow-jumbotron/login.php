<?php
include "init.php";
$obj = new base_class;
if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    if ($obj->Normal_Query("SELECT * FROM users WHERE email = ?", [$email])) {
        if ($obj->Count_Rows() == 0) {
            header("location: ../narrow-jumbotron/login.php?login=email");
            exit();
        } else {
            $row = $obj->Single_Result();
            $db_email = $row->email;
            $db_password = $row->password;
            $user_id = $row->id;
            $user_name = $row->name;
            $user_image = $row->image;
            if (password_verify($password, $db_password)) {
                $obj->Create_Session("user_name", $user_name);
                $obj->Create_Session("user_id", $user_id);
                $obj->Create_Session("user_email", $db_email);
                $obj->Create_Session("user_image", $user_image);
                header("location:dash.php");
            } else {
                header("location: ../narrow-jumbotron/login.php?login=password");
                exit();
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
    <link href="narrow-jumbotron.css" rel="stylesheet">
</head>

<style>
    h3 {
        text-align: center;
    }
</style>

<body>
    <div class="container">
        <div class="header clearfix">
            <nav>
                <ul class="nav nav-pills float-right">
                    <li class="nav-item">
                        <a class="nav-link active" href="index.php">Inicio <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="registro.php">Registro</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contacto.php">Contacto</a>
                    </li>
                </ul>
            </nav>
            <h3 class="text-muted">Ingreso al sistema MSIH</h3>
        </div>

        <form class="form-horizontal"method="POST" action="">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <h3>Acceso al sistema</h3>
                    <hr>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <div class="form-group has-danger">
                        <label class="sr-only" for="email">E-Mail address</label>
                        <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                            <div class="input-group-addon" style="width: 2.6rem"><i class="fa fa-at"></i></div>
                            <input type="text" name="email" class="form-control" id="email"
                                   placeholder="Email" required autofocus>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-control-feedback">
                        <span class="text-danger align-middle">
                            <!-- Error message -->    
                            <?php 
                            $fullUrl = "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

                            if (strpos($fullUrl, "login=email") == true) {
                                echo "<strong style='color:red;'>Email incorrecto.</strong>";
                            }
                            ?>
                        </span>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="sr-only" for="password">Password</label>
                        <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                            <div class="input-group-addon" style="width: 2.6rem"><i class="fa fa-key"></i></div>
                            <input type="password" name="password" class="form-control" id="password"
                                   placeholder="Contraseña" required>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-control-feedback">
                        <span class="text-danger align-middle">
                            <!-- Error message -->    
                            <?php 
                            $fullUrl = "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

                            if (strpos($fullUrl, "login=password") == true) {
                                echo "<strong style='color:red; align:center;'>Contraseña incorrecta.</strong>";
                            }
                            ?>
                        </span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3"></div>
            </div>
            <div class="row" style="padding-top: 1rem">
                <div class="col-md-4"></div>
                <div class="col-md-6">
                    <button type="submit" name="login"class="btn btn-success"><i class="fa fa-sign-in"></i> Iniciar sesión</button>
                </div>
            </div>
        </form>
    </div>
</body>
</html>
