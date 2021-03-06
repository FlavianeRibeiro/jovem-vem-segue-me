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
		if(isset($_SESSION["IdEquipe"])){
			$IdEquipe= $_SESSION["IdEquipe"];
		    $g= $_SESSION["NomeEquipe"];
		    $Status= $_SESSION["Status"];
		    $Equipe= $_SESSION["Equipe"];
		}else{ header('Location: ../pages/login.php');}
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
                <div class="col-lg-12"><h1 class="page-header">Valor</h1></div>
            </div>
            <div class="row">
            	<form action="../php/prevalor.php" method="POST">
                <div class="col-lg-8">
                    <div class="panel panel-default">
                        <div class="panel-heading" >
                        	<div class="col-xs-3">
		                            <select name="Valor" class="form-control" >
		                                    <option> </option>
		                                    <option name="Valor" value="Amizade" >Amizade</option>
		                                    <option name="Valor" value="Amor" >Amor</option>
		                                    <option name="Valor" value="Perdão" >Perdão</option>
		                            </select>
		                    </div>
		                         <button type="sumit" class="btn btn-link">Validar</button>
                        </div>
						<!-- /.panel-heading -->
						<div class="panel-body">
							<div class="row">
								<div class="col-lg-12">
									<table class="table table-hover">
									
										<thead>
											<tr>
												<th>Op</th>
												<th>Nº Ficha</th>
												<th>Nome</th>
												<th>Idade</th>
												<th>Comunidade</th>
												<th>Valor</th>
											</tr>
										</thead>
										<tbody>
											<?php
												include '../php/Banco.php';
												
												$Recebe = mysql_query('SELECT `encontrista`.`IdFicha`, `encontrista`.`NomeEncontrista`,  `encontrista`.`Idade`, `encontrista`.`Valor`, `comunidade`.`Nome` as Comunidade
														                FROM  `encontrista`  INNER JOIN  `comunidade` ON comunidade.IdComunidade = encontrista.Comunidade or comunidade.Nome=encontrista.Outro
														                WHERE  Desistencia = 0  ORDER BY `Idade` ASC');
												$IdFicha;$NomeEncontrista;	$Comunidade;$Idade;	$Valor;$contador=0;
												
												while($linha = mysql_fetch_array($Recebe)){
													$IdFicha[$contador] = $linha["IdFicha"];
													$NomeEncontrista[$contador] = $linha["NomeEncontrista"];
													$Comunidade[$contador] = $linha["Comunidade"];
													$Valor[$contador] = $linha["Valor"];
													$Idade[$contador] = $linha["Idade"];	$contador++;
												}
												$contador=0;
												while($contador<count($NomeEncontrista)){
													echo'<tr class="odd gradeX">
															<td><input type="checkbox" name="Id[]" value="'.$IdFicha[$contador].'"></td>
															<td>'.$IdFicha[$contador].'</td>
															<td>'.$NomeEncontrista[$contador].'</td>
															<td class="center">'.$Idade[$contador].' anos</td>
															<td>'.$Comunidade[$contador].'</td>
															<td>'.$Valor[$contador].'</td>
														</tr>';
													$contador++;
												}
											?>
										</tbody>
										<form>
									</table>
								<!-- /.table-responsive -->
								</div> <!-- /.row -->
								<!-- ********************************* listagem ****************************************-->
							</div>
							<!-- /.panel-body -->
						</div>
						<!-- /.panel -->
					</div>
					<!-- /.col-lg-12 -->
				</div>
				<!-- ********************************* listagem ****************************************-->
				<?php $listaDeEncontristas = $encontrista->obterTotalEncontristasPorValor(); ?>
  				<div class="col-lg-4">
                      <div class="panel panel-default">
                          <div class="panel-heading">
                             <i class="fa fa-bell fa-fw"></i> Total
                          </div>
                          <!-- /.panel-heading -->
                          <div class="panel-body">
                              <div class="list-group">
                             	  <?php while($myEncontrista = mysql_fetch_array($listaDeEncontristas)){?>
                                <tr class="odd gradeX">
                                    <?php  echo '<a href="valor.php?Op='.$myEncontrista['Valor'].'" class="list-group-item">'; echo$myEncontrista['Valor'] ;?> 
 			                             <span class="pull-right text-muted small"><em><?php echo $myEncontrista['total_Valor'];?></em></span>
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
