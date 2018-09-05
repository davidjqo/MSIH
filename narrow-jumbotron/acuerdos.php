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

              
                
                 
                 $obj->Create_Session("num_acuerdo", $num_acuerdo);
                 $obj->Create_Session("num_sesion", $num_sesion);
                 $obj->Create_Session("departamento", $departamento);
                 $obj->Create_Session("fecha_creacion", $fecha_creacion);
                 $obj->Create_Session("fecha_finiquito", $fecha_finiquito);
                 $obj->Create_Session("archivo", $archivo_name);
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

   <!--Lista de CSS-->
  <?php include "librerias.php"  ?>

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
            <?php include "header.php" ?>
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
        

    

   <!--Lista de Scrips-->

<?php include "scripts.php" ?>

</body>

</html>
<!-- end document-->
