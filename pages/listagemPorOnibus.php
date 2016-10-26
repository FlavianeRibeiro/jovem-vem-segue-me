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
            ?>
        </nav>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Encontrista que irá de Ônibus</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Onibus 01
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table class="table table-hover">
										<thead>
											<tr>
												<th>Nº Ficha</th>
												<th>Nome</th>
												<th>Comunidade</th>
												<th>Valor</th>
											</tr>
										</thead>
										<tbody>
											<?php
												include '../php/Banco.php';
												$Recebe = mysql_query("SELECT * FROM `encontrista` ORDER BY `IdFicha` ASC");
												
												$IdFicha;
												$Nome;
												$Comunidade;
												$Valor;
												$contador=0;
												
												while($linha = mysql_fetch_array($Recebe)){
													$IdFicha[$contador] = $linha["IdFicha"];
													$Nome[$contador] = $linha["Nome"];
													$Comunidade[$contador] = $linha["Comunidade"];
													$Valor[$contador] = $linha["Valor"];
													$contador++;
												}
												$contador=0;
												while($contador == 5){
    												while($contador<count($Nome)){
    													echo'<tr class="odd gradeX">
    															<td>'.$IdFicha[$contador].'</td>
    															<td>'.$Nome[$contador].'</td>
    															<td>'.$Comunidade[$contador].'</td>
    															<td class="center">'.$Valor[$contador].'</td>
    														</tr>';
    													$contador++;
    												}
												}
											?>
										</tbody>
									</table>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-6 -->
                <div class="col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Onibus 02
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-6 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

</body>

</html>
