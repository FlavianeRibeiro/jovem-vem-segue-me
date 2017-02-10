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
	$op = $_GET['Sexo'];
    if($op == 'Feminino'){
    	$titulo = "CADASTRAR QUARTO DAS MENINAS";$incio=101;$fim=130;
    	}else if($op == 'Masculino' ){
		$titulo = "CADASTRAR QUARTO DOS MENINOS";$incio=201;$fim=230;
    	}
    $Recebe = mysql_query('SELECT IdFicha, NomeEncontrista, Valor FROM encontrista WHERE Sexo =  "'.$op.'" AND `Quarto` = 0 AND Desistencia =0');
	    $IdFicha;$NomeEncontrista;$Valor;$contador=0;
	    while($linha = mysql_fetch_array($Recebe)){
	    	$IdFicha[$contador] = $linha["IdFicha"];
			$NomeEncontrista[$contador] = $linha["NomeEncontrista"];
			$Valor[$contador] = $linha["Valor"];
			$contador++;
	    }
	$Recebe2 = mysql_query('SELECT `IdEquipe`,`NomeEquipe`,`Status` FROM `equipe` WHERE `Sexo` = "'.$op.'" AND `Quarto` = 0');
	    $IdEquipe;$NomeEquipe;$Status;$contador=0;
	    while($linha = mysql_fetch_array($Recebe2)){
	    	$IdEquipe[$contador] = $linha["IdEquipe"];
			$NomeEquipe[$contador] = $linha["NomeEquipe"];
			$Status[$contador] = $linha["Status"];
			$contador++;
	    }
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
    <?php  include './template/styles.html'; ?>
</head>
<body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <?php 
            	$permissao='';
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
                    <h1 class="page-header"><?php echo$titulo;?></h1>
                </div>
            </div>
            <div class="row">
            	<form action="../php/cad_quarto.php" method="POST">
                <div class="col-lg-12">
                    <div class="panel panel-default"> 
                        <div class="panel-heading">
                            <div class="panel-heading" >
                            	<div class="col-xs-2">
		                         <select name="Quarto" class="form-control" >
										<option> </option><?php
										for($i=$incio;$i<$fim;$i++){ ?>
										<?php 	echo '<option name="Quarto" value="'.$i.'" >'.$i.'</option>';} ?>
		                            </select>
		                        </div>
		                         <button type="sumit" class="btn btn-link">Validar</button>
							</div>
                        </div>
                        <div class="panel-body">
                        	<!-- ENCONTRISTA -->
                        	<div class="col-lg-6">
			                    <div class="panel panel-default">
			                        <div class="panel-heading">
			                            ENCONTRISTA
			                        </div>
			                        <!-- LISTANDO -->
			                        <div class="panel-body">
			                        	<div class="table-responsive">
			                                <table class="table table-hover">
			                                    <thead>
			                                        <tr>
			                                            <th>Op</th>
			                                            <th>Nome</th>
			                                            <th>Valor</th>
			                                        </tr>
			                                    </thead>
			                                    <tbody>
			                                    <?php $contador=0;
			                                    while($contador<count($NomeEncontrista)){
													echo'<tr class="odd gradeX">
														<td><input type="checkbox" name="IdFicha[]" value="'.$IdFicha[$contador].'"></td>
														<td>'.$NomeEncontrista[$contador].'</td>
														<td>'.$Valor[$contador].'</td>
														</tr>';
													$contador++;
												} ?>
			                                    </tbody>
			                                </table>
			                            </div>
			                        </div>
			                    </div>
			                </div>
			                <!-- EQUIPE -->
			                <div class="col-lg-6">
			                    <div class="panel panel-default">
			                        <div class="panel-heading">
			                            EQUIPE
			                        </div>
			                        <!-- LISTANDO -->
			                        <div class="panel-body">
			                        	<div class="table-responsive">
			                                <table class="table table-hover">
			                                    <thead>
			                                        <tr>
			                                            <th>Op</th>
			                                            <th>Nome</th>
			                                            <th>Status</th>
			                                        </tr>
			                                    </thead>
			                                    <tbody>
			                                    <?php $contador=0;
			                                    while($contador<count($IdEquipe)){
													echo'<tr class="odd gradeX">
														<td><input type="checkbox" name="IdEquipe[]" value="'.$IdEquipe[$contador].'"></td>
														<td>'.$NomeEquipe[$contador].'</td>
														<td>'.$Status[$contador].'</td>
														</tr>';
													$contador++;
												} ?>
			                                    </tbody>
			                                </table></form>
			                            </div>
			                        </div>
			                    </div>
			                </div>
			            </div>
                    </div>
                </div>
            </div>
        </div>        
    </div>
</body>
</html>
