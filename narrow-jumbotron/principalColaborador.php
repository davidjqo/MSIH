<?php include "init.php";
$obj = new base_class;
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
    <title>Dashboard</title>

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
                        <div class="row m-t-25">

                            <div class="col-lg-6">
                                <div class="au-card m-b-30">
                                    <div class="au-card-inner">
                                        <h3 class="title-2 m-b-40">Acuerdos terminados</h3>
                                        <canvas id="singelBarChart"></canvas>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="au-card m-b-30">
                                    <div class="au-card-inner">
                                        <h3 class="title-2 m-b-40">Finalizados por departamento</h3>
                                        <canvas id="pieChart"></canvas>
                                    </div>
                                </div>
                            </div>
 
                        </div>

                        <!--final del contenedor-->

                        <!--
                        <div>
                        <p>Mostrando usuarios registrados en el sistema</p>

                        Consulta a la base de datos en PDO
                        $obj->Normal_Query("SELECT  * FROM users");
                        $message_row=$obj-> fetch_all();

                        foreach($message_row as $row):
                            echo $row->name,"<br>";
                            echo $row->id,"<br>";
                            echo $row->email,"<br>";
                            echo $row->image,"<br>";
                            echo $row->status,"<br>";
                        endforeach;
                        -->
                    <div class="row">
                            <div class="col-md-12">
                                <!-- DATA TABLE -->
                                <h3 class="title-5 m-b-35">Usuarios registrados</h3>
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
                                                <option selected="selected">Nombre</option>
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
                                                <th>Nombre</th>
                                                <th>Correo</th>
                                                <th>Imagen</th>
                                                <th>Estado</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $obj->Normal_Query("SELECT  * FROM usuarios");
                                        $message_row = $obj->fetch_all();
                                        foreach ($message_row as $row) :
                                        ?>
                                        <tr class="tr-shadow">
                                
                                            <td><?php echo $row->id_usuario, "<br>"; ?></td>
                                            <td>
                                                <span class="block-email"><?php echo $row->nombre, "<br>"; ?></span>
                                            </td>
                                            <td class="desc"><?php echo $row->email, "<br>"; ?></td>
                                            <td><?php echo $row->image, "<br>"; ?></td>
                                            <td>
                                                <span class="status--process"><?php echo $row->status, "<br>"; ?></span>
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

                        <div class="row">
                            <div class="col-md-12">
                                <div class="copyright">
                                    <p>Copyright © 2018 Municipalidad de San Isidro de Heredia.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END MAIN CONTENT-->
            <!-- END PAGE CONTAINER-->
        </div>

    </div>

<!--Lista de Scrips-->

<?php include "scripts.php" ?>

</body>

</html>
<!-- end document-->
