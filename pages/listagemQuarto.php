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
	    $g= $_SESSION["NomeEquipe"];$Status= $_SESSION["Status"]; $Equipe= $_SESSION["Equipe"];
	}else{ header('Location: ../pages/login.php');}
		$op = $_GET['Sexo'];
    if($op == 'Feminino'){$titulo = "LISTAGEM QUARTO DAS MENINAS";$incio=101;$fim=130;}
    	else if($op == 'Masculino' ){$titulo = "LISTAGEM QUARTO DOS MENINOS";$incio=201;$fim=230;}
    ?>
</head>
<body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <?php 
                if ($Status == 'Equipe'){include "./template/barraLateral.php";$permissao='disabled';}
                else if(($Status == 'Coordenador') && ($Equipe != 'Secretaria')) {include "./template/Barra.Lateral.php";$permissao='';}
                else if(($Status == 'Coordenador') && ($Equipe == 'Secretaria')) {include "./template/BarraLateral.php";$permissao='';}
                else if($Status == 'ADMIN'){include "./template/Barralateral.php"; $permissao=''; }
                include "./template/barraSuperior.php";
            ?>
        </nav>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12"><h1 class="page-header">Listagem de Quarto</h1></div>
            </div>
            <div class="row">
            	<form action="../php/prevalor.php" method="POST">
                <div class="col-lg-8">
                    <div class="panel panel-default">
                        <div class="panel-heading" >
                    		Listagem
                        </div>
						<!-- /.panel-heading -->
						<div class="panel-body">
							<div class="row">
								<div class="col-lg-12">
									<table class="table table-striped table-bordered table-hover">
										<thead>
											<tr>
												<th>Quarto</th>
												<th>Nome</th>
												<th>Tipo</th>
											</tr>
										</thead>
										<tbody>
											<?php
												include '../php/Banco.php';
												
												$Recebe = mysql_query("SELECT NomeEncontrista, Valor,  'E' AS Tipo
                                                                        FROM encontrista
                                                                        WHERE Quarto =  '101'
                                                                        UNION ALL 
                                                                        SELECT NomeEquipe, Equipe,  'EQ' AS Tipo
                                                                        FROM equipe
                                                                        WHERE Quarto = '101' ");
												$Tipo;$Nome;	$Valor;$contador=0;
												
												while($linha = mysql_fetch_array($Recebe)){
													$Nome[$contador] = $linha["NomeEncontrista"];
													$Valor[$contador] = $linha["Valor"];	$contador++;
												}$contador=0;
												
												while($contador<count($Nome)){
													echo'<tr class="odd gradeX">
															<td>'..'</td>
															<td>'.$Nome[$contador].'</td>
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
				
            </div>
            <!-- /.row -->
			</div>
			
		</div>
		
	</div>
</body>
</html>
