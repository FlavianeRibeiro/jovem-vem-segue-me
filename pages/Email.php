<?php
    require_once '../php/EncontristaController.php';
    $encontrista = new EncontristaController();
    include '../php/Banco.php';
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
    <?php include './template/styles.html'; ?>
</head>
<body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <?php $permissao='';
                if ($Status == 'Equipe'){include "./template/barraLateral.php";$permissao='disabled';}
                else if(($Status == 'Coordenador') && ($Equipe != 'Secretaria')) {include "./template/Barra.Lateral.php";$permissao='';}
                else if(($Status == 'Coordenador') && ($Equipe == 'Secretaria')) {include "./template/BarraLateral.php";$permissao='';}
                else if($Status == 'ADMIN'){include "./template/Barralateral.php"; $permissao=''; }
                include "./template/barraSuperior.php";
            ?>
        </nav>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Jovem Vem e Segue-me</h1>
                </div>
            </div>
            
        <!-- ********************************* listagem ****************************************-->
        <?php
            $listaDeEncontristas = $encontrista->listarEncontristasNaoDesistentes();
        ?>
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Encontristas (Todos exceto desistentes)
                    </div>
                    <div class="panel-body">
                        <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                                <tr>
                                    <th>Nº Ficha</th>
                                    <th>Nome</th>
                                    <th>Comunidade</th>
                                    <th>Confirmação</th>
                                    <th>Eviar</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php while($myEncontrista = mysql_fetch_array($listaDeEncontristas)){ ?>
                               <tr class="odd gradeX">
                                    <td><?php echo $myEncontrista['IdFicha'];?></td>
                                    <td><?php echo $myEncontrista['NomeEncontrista'];?></td>
                                    <td><?php echo $myEncontrista['Comunidade'];?></td>
                                    <td align="center"></td>
                                    <td align="center"><a href="#" type="button" class="btn btn-danger btn-circle <?php echo $permissao;?>"><i class="fa fa-times"></i></a></td>
                                </tr>
                                <?php } ?>
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
</html>