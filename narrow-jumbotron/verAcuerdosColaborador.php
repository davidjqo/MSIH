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
            <?php include "sidebarColaborador.php" ?>
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
                                        <div class="table-data__tool-left">
                                            <div class="rs-select2--light rs-select2--md">
                                                <select class="js-select2" name="property">
                                                    <option selected='selected' disabled>Departamento</option>
                                                    <?php
                                                    $obj->Normal_Query("SELECT * FROM departamentos");
                                                    $message_option = $obj->fetch_all();
                                                    foreach ($message_option as $option) :
                                                    ?>
                                                    <option value="<?php echo $option->nombre; ?>"><?php echo $option->nombre, "<br>"; ?></option>
                                                    <?php 
                                                    endforeach;
                                                    ?>
                                                </select>
                                            <div class="dropDownSelect2"></div>
                                        </div>

                                        <div class="rs-select2--light rs-select2--sm">
                                            <select class="js-select2" name="time">
                                                <option selected="selected" disabled>Sesión</option>
                                                <?php
                                                $obj->Normal_Query("SELECT * FROM sesiones");
                                                $message_option = $obj->fetch_all();
                                                foreach ($message_option as $option) :
                                                ?>
                                                <option value="<?php echo $option->titulo_sesion; ?>"><?php echo $option->titulo_sesion, "<br>"; ?></option>
                                                <?php 
                                                endforeach;
                                                ?>
                                            </select>
                                            <div class="dropDownSelect2"></div>
                                        </div>
                                            <button class="au-btn-filter">
                                            <i class="zmdi zmdi-filter-list"></i>Filtros</button>
                                        </div>
                                    </div>      
                                    <form class="form-header" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
                                        <input class="au-input au-input--xl" type="text" name="buscar" placeholder="Buscar..."/>
                                        <button class="au-btn--submit" type="submit">
                                            <i class="zmdi zmdi-search"></i>
                                        </button>
                                    </form>                            
                                </div>
                                </div>
                                <div class="table-responsive table-responsive-data2">
                                    <table class="table table-data2">
                                        <thead>
                                            <tr>
                                                <th>Sesión</th>
                                                <th>Acuerdo</th>
                                                <th>Archivo</th>
                                                <th>Creación</th>
                                                <th>Finiquito</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            if (isset($_POST['buscar'])) {
                                                $busqueda = trim($_POST['buscar']);
                                                //$busqueda = $_POST['buscar'];
                                                $obj->Normal_Query("SELECT * FROM acuerdos, sesiones WHERE titulo_acuerdo like '%" . $busqueda . "%'");
                                                $message_row = $obj->fetch_all();
                                                foreach ($message_row as $row) :
                                                ?>
                                            <tr class="tr-shadow">                                              
                                                <td>
                                                    <span class="block-email" name="titulo_sesion" method="POST"><?php echo $row->titulo_sesion, "<br>"; ?></span>
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
                                                            <a href="editarAcuerdo.php"> <i class="zmdi zmdi-edit"></i></a>
                                                        </button>
                                                        <button class="item" data-toggle="tooltip" data-placement="top" title="Eliminar">
                                                            <i class="zmdi zmdi-delete"></i>
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
                                        } else {
                                            $obj->Normal_Query("SELECT * FROM acuerdos, sesiones");
                                            $message_row = $obj->fetch_all();
                                            foreach ($message_row as $row) :
                                            ?>
                                            <tr class="tr-shadow">
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
                                                        <button class="item" data-toggle="tooltip" data-placement="top" title="Editar" type='submit' name='editar'>
                                                            <a href="editarAcuerdo.php">  <i class="zmdi zmdi-edit"></i></a>
                                                        </button>
                                                        <button class="item" data-toggle="tooltip" data-placement="top" title="Eliminar">
                                                            <i class="zmdi zmdi-delete"></i>
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
                                        }
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
