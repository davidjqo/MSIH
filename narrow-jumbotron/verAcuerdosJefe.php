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
        <title>Acuerdos</title>
        <!--Lista de CSS-->
        <?php include "librerias.php" ?>
    </head>

    <body class="animsition">
        <div class="page-wrapper">
            <!-- HEADER MOBILE-->
            
            <!-- END HEADER MOBILE-->

            <!-- MENU SIDEBAR-->
            <?php include "sidebarJefe.php" ?>
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
                                <div class="col-md-12">
                                    <!-- DATA TABLE -->
                                    <h3 class="title-5 m-b-35">Acuerdos registrados</h3>
                                    <div class="table-data__tool">
                                        <div class="table-data__tool-left">
                                            <div class="rs-select2--light rs-select2--md">
                                                <select class="js-select2" name="property">
                                                    <option selected="selected">Departamento</option>
                                                    <option value="">Option 1</option>
                                                    <option value="">Option 2</option>
                                                </select>
                                                <div class="dropDownSelect2"></div>
                                            </div>
                                            <div class="rs-select2--light rs-select2--sm">
                                                <select class="js-select2" name="time">
                                                    <option selected="selected">Sesión</option>
                                                    <option value="">3 Days</option>
                                                    <option value="">1 Week</option>
                                                </select>
                                                <div class="dropDownSelect2"></div>
                                            </div>
                                            <button class="au-btn-filter">
                                            <i class="zmdi zmdi-filter-list"></i>Filtros</button>
                                        </div>
                                    </div>
                                    <div class="table-responsive table-responsive-data2">
                                        <table class="table table-data2">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Sesión</th>
                                                    <th>Acuerdo</th>
                                                    <th>Archivo</th>
                                                    <th>Creación</th>
                                                    <th>Finiquito</th>
                                                </tr>
                                            </thead>
                                        <tbody>
                                            <?php
                                            $obj->Normal_Query("SELECT  * FROM acuerdos, sesiones");
                                            $message_row = $obj->fetch_all();
                                            foreach ($message_row as $row) :
                                            ?>
                                            <tr class="tr-shadow">
                                                <td><?php echo $row->id_acuerdo, "<br>"; ?></td>
                                                <td>
                                                    <span class="block-email"><?php echo $row->titulo_sesion, "<br>"; ?></span>
                                                </td>
                                                <td class="desc"><?php echo $row->titulo_acuerdo, "<br>"; ?></td>
                                                <td class="desc"><?php echo $row->archivo, "<br>"; ?></td>
                                                <td><?php echo $row->fecha_acuerdo, "<br>"; ?></td>
                                                <td>
                                                    <span class="status--process"><?php echo $row->fecha_finiquito, "<br>"; ?></span>
                                                </td>                                                  
                                                <td>
                                                    <div class="table-data-feature">                                                       
                                                        <button class="item" data-toggle="tooltip" data-placement="top" title="Editar">
                                                            <i class="zmdi zmdi-edit"></i>
                                                        </button>                                                       
                                                        <button class="item" data-toggle="tooltip" data-placement="top" title="Ver">
                                                            <a href="cargar.php"> <i class="zmdi zmdi-more"></i></a>
                                                        </button>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr class="spacer"></tr>
                                            <?php
                                            endforeach;
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- END DATA TABLE -->
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
