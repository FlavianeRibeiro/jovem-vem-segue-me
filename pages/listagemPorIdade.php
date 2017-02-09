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
		if(isset($_SESSION["Idusuario"])){
			$IdEquipe= $_SESSION["IdEquipe"];
		    $g= $_SESSION["NomeEquipe"];
		}else{ header('Location: ../pages/login.php');}
    	 $listaDeEncontristas = $encontrista->listarEncontristasNaoDesistentes();
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
                <div class="col-lg-12"><h1 class="page-header">Idade</h1></div>
            </div>
            <div class="row">
                <div class="col-lg-8">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-bar-chart-o fa-fw"></i> Listagem por Idade
                        </div>
						<div class="panel-body">
							<div class="row">
								<div class="col-lg-12">
									<table class="table table-hover">
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
											<?php
											 while($myEncontrista = mysql_fetch_array($listaDeEncontristas)){
												echo'<tr class="odd gradeX">
														<td>'.$myEncontrista['IdFicha'].'</td>
														<td>'.$myEncontrista['Nome'].'</td>
														<td>'.$myEncontrista['Comunidade'].'</td>
														<td class="center">'.$myEncontrista['Idade'].'</td>
														<td class="center">'.$myEncontrista['Valor'].'</td>
													</tr>';
											}	?>
										</tbody>
									</table>
								</div>
								<!-- ********************************* listagem ****************************************-->
							</div>
						</div>
					</div>
				</div>
				<!-- ********************************* listagem ****************************************-->
				<?php $listaDeEncontristas = $encontrista->obterTotalEncontristasPorIdade(); ?>
  				<div class="col-lg-4">
                    <div class="panel panel-default">
                          <div class="panel-heading">
                             <i class="fa fa-bell fa-fw"></i> Total por Idade
                          </div>
                          <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="list-group">
                             	  <?php while($myEncontrista = mysql_fetch_array($listaDeEncontristas)){?>
                                <tr class="odd gradeX">
                                    <a href="#" class="list-group-item"><?php echo $myEncontrista['idade'];?> anos
 			                             <span class="pull-right text-muted small"><em><?php echo $myEncontrista['total_idade'];?></em></span>
 			                        </a>
                                 </tr>
                                 <?php }?>
                            </div>
                            <!-- /.list-group -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-4 -->
            </div>
            <!-- /.row -->
			</div>
		</div>
	</div>
</body>
</html>