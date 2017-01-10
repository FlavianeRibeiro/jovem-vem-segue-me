<?php
    require_once '../php/EncontristaController.php';
    $encontrista = new EncontristaController();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Jovem vem e segue-me</title>
    <?php
        include './template/styles.html';
        session_start();
        if (isset($_GET['op'])){
            switch ($_GET['op']){
                case 1:
                    $Comunidade = $_GET['op'];
                    $Titulo = "Cristo Rei";
                break;
                case 2:
                    $Comunidade = $_GET['op'];
                    $Titulo = "Jesus Ressuscitado";
                break;
                case 31:
                    $Comunidade = $_GET['op'];
                    $Titulo = "Nossa Senhora do Rosário";
                break;
                case 4:
                    $Comunidade = $_GET['op'];
                    $Titulo = "Sagrada Família";
                break;
                case 5:
                    $Comunidade = $_GET['op'];
                    $Titulo = "Santa Clara de Assis";
                break;
                case 6:
                    $Comunidade = $_GET['op'];
                    $Titulo = "Santuário";
                break;
                case 7:
                    $Comunidade = $_GET['op'];
                    $Titulo = "São Benedito";
                break;
                case 8:
                    $Comunidade = $_GET['op'];
                    $Titulo = "São Marcos";
                break;
                case 8:
                    $Comunidade = $_GET['op'];
                    $Titulo = "São Sebastião";
                break;
            }
        }
    ?>
</head>

<body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <?php 
                include "./template/barraSuperior.php";
                include "./template/barraLateral.php";
            ?>
        </nav>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header"><?php echo $Titulo; ?></h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            
        <!-- ********************************* listagem ****************************************-->
        <?php
            $listaDeEncontristas = $encontrista->listarPorComunidade($Comunidade);
        ?>
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Encontristas (Todos)
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                                <tr>
                                    <th>Nº Ficha</th>
                                    <th>Nome</th>
                                    <th>Idade</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php while($myEncontrista = mysql_fetch_array($listaDeEncontristas)){?>
                               <tr class="odd gradeX">
                                    <td><?php echo $myEncontrista['IdFicha'];?></td>
                                    <td><?php echo $myEncontrista['Nome'];?></td>
                                    <td><?php echo $myEncontrista['Idade']." anos";?></td>
                                </tr>
                                <?php }?>
                            </tbody>
                        </table>
                    <!-- /.table-responsive -->
                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
            </div>
            <!-- /.col-lg-12 -->
        </div>
    <!-- ********************************* listagem ****************************************-->
    </div>
</body>
</html>
