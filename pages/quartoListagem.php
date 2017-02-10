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
    ?>
</head>

<body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <?php 
                include "./template/barraSuperior.php";
                include "./template/barraLateral.php";
                   session_start();
		if(isset($_SESSION["IdEquipe"])){
			$IdEquipe= $_SESSION["IdEquipe"];
		    $g= $_SESSION["NomeEquipe"];
		    $Status= $_SESSION["Status"];
		    $Equipe= $_SESSION["Equipe"];
		}else{ header('Location: ../pages/login.php');}
            ?>
        </nav>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12"><h1 class="page-header">Listagem do quarto</h1></div>
            </div>
                <div class="col-lg-8">
                    
                    <div class="col-lg-6">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                NUMERO DO QUARTO
                            </div>
                            <!-- /.panel-heading -->
                            <div class="table-responsive table-bordered">
                                <table class="table">
                                    <tr>
                                        <td>NOME COMPLETO ENCONTRISTA</td>
                                        <td>EQUIPE</td>
                                    </tr>
                                    <tr>
                                        <td>NOME COMPLETO ENCONTRISTA</td>
                                        <td>EQUIPE</td>
                                    </tr>
                                    <tr>
                                        <td>NOME COMPLETO ENCONTRISTA</td>
                                        <td>EQUIPE</td>
                                    </tr>
                                    <tr>
                                        <td>NOME COMPLETO ENCONTRISTA</td>
                                        <td>EQUIPE</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.col-lg-6 -->
                <div class="col-lg-4">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Cadastrar Quarto
                        </div>
                          <!-- /.panel-heading -->
                         <?php
							$encontrista = mysql_query("SELECT * FROM `encontrista` WHERE `Desistencia` = 0");
						//	$equipe = mysql_query("SELECT * FROM `equipe`");
							$IdFicha;$Nome;$Idequipe;$contador=0;$cont=0;
							
							while($linha = mysql_fetch_array($encontrista)){
								$IdFicha[$contador] = $linha["IdFicha"];
								$Nome[$contador] = $linha["Nome"];
								$contador++;
							}
						/*	while($ln = mysql_fetch_array($equipe)){
								$Idequipe[$cont] = $ln["Idequipe"];
								$Nomeeq[$cont] = $ln["Nome"];
								$cont++;
							}*/
						?>
                        <div class="panel-body">
                            <div class="list-group">
                                <div class="form-group row">
                                    <label for="Email" class="col-sm-1 col-form-label">Nº:</label>
                                    <div class="col-md-3">
                                        <input type="text" class="form-control" name="Email" placeholder="Nº">
                                    </div>
                                </div>
                                <!-- /. ENCONTRISTA -->
                                <div class="form-group row">
                                    <label for="Email" class="col-sm-1 col-form-label">Encontrista:  </label>
                                        <div class="col-md-12">
                                            <input type="text" class="form-control" name="Nome" placeholder="Digite o nome" list="datalist">
                                        </div>
                                        <datalist id="datalist"> value='3' <?php $add =3; ?> >3
                                            </select>
                                            <?php
                                            $contador=0;
                                            echo $add;
                                            while($contador<count($IdFicha)){
                								echo  '<option name="'.$IdFicha[$contador].'" value="'.$Nome[$contador].'">';
                								$contador++;
                    							} ?>
                    				    </datalist>
                                </div>
                                <!-- /.EQUIPE -->
                                <div class="form-group row">
                                    <label for="Email" class="col-sm-1 col-form-label">Equipe:  </label>
                                        <div class="col-md-12">
                                            <input type="text" class="form-control" name="Nome" placeholder="Digite o nome" list="datalist">
                                        </div>
                                        <datalist id="datalist">
                                            <?php
                                          //  $cont=0;
                                            /*while($cont<count($Nomeeq)){
                								echo '<option name="'.$Idequipe[$cont].'" value="'.$Nomeeq[$cont].'">';
                								$contador++;
                    						}*/	?>
                    				    </datalist>
                                </div>
                            </div>
                    <!-- /.panel -->
                </div>
            </div>
            <!-- /.row -->
		</div>
	</div>
</body>
</html>