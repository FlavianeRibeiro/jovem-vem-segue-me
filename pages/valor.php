<?php
    require_once '../php/EncontristaController.php';
    $encontrista = new EncontristaController();
        session_start();
		if(isset($_SESSION["IdEquipe"])){
			$IdEquipe= $_SESSION["IdEquipe"];
		    $g= $_SESSION["NomeEquipe"];
		    $Status= $_SESSION["Status"];
		    $Equipe= $_SESSION["Equipe"];
		}else{ header('Location: ../pages/login.php');}
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
        
        if (isset($_GET['Op'])){
            if($_GET['Op'] == 'Amizade'){
                $Valor = 'Amizade'; 
            }else if($_GET['Op'] == 'Amor'){
                $Valor = 'Amor';    
            }else if ($_GET['Op'] == 'Perdão'){
                $Valor = 'Perdão';   
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
                    <h1 class="page-header"><?php echo $Valor; ?></h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            
        <!-- ********************************* listagem ****************************************-->
        <?php
            $listaDeEncontristas = $encontrista->listarPorValor($Valor);
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
                                    <th>Comunidade</th>
                                    <th>Idade</th>
                                    <th>Valor</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php while($myEncontrista = mysql_fetch_array($listaDeEncontristas)){?>
                               <tr class="odd gradeX">
                                    <td><?php echo $myEncontrista['IdFicha'];?></td>
                                    <td><?php echo $myEncontrista['NomeEncontrista'];?></td>
                                    <td><?php echo $myEncontrista['Comunidade'];?></td>
                                    <td><?php echo $myEncontrista['Idade'];?></td>
                                    <td><?php echo $myEncontrista['Valor'];?></td>
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
