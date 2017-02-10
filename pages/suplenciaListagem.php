<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Jovem vem e segue-me</title>
    <?php include './template/styles.html';?>
</head>
<body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <?php 
                include "./template/barraSuperior.php";
                include "./template/barraLateral.php";
                include '../php/Banco.php';
                    session_start();
		if(isset($_SESSION["IdEquipe"])){
			$IdEquipe= $_SESSION["IdEquipe"];
		    $g= $_SESSION["NomeEquipe"];
		    $Status= $_SESSION["Status"];
		    $Equipe= $_SESSION["Equipe"];
		}else{ header('Location: ../pages/login.php');}
                    $Recebe = mysql_query("SELECT * FROM  `Suplencia`");
                    $IdSuplencia;$Nome;$Equipe;$Email;$Telefone;$Ficha;$Devolvido;
                    $contador=0;
                    
                    while($linha = mysql_fetch_array($Recebe)){
                        $Ficha[$contador] = $linha["Ficha"];
                        $IdSuplencia[$contador] = $linha["IdSuplencia"];
                        $Nome[$contador] = $linha["Nome"];
                        $Equipe[$contador] = $linha["Equipe"];
                        $Email[$contador] = $linha["Email"];
                        $Telefone[$contador] = $linha["Telefone"];
                        $Devolvido[$contador] = $linha["Devolvido"];
                        $contador++;
                    }
            ?>
        </nav>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Listagens de suplência </h1>
                </div>
            </div>
        <!-- ********************************* listagem ****************************************-->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <?php echo "Total: ",$contador; ?>
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                       <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Ficha<th>
                                    <th>Número</th>
                                    <th>Nome</th>
                                    <th>Equipe</th>
                                    <th>Telefone</th>
                                    <th>Ver Ficha</th>
                                    <th>Editar</th>
                                    <th>Devolvido</th>
                                </tr>
                            </thead>
                            <tbody>
                                <form action="teste.php" method="POST">
                                <?php
                                    $contador=0;
                                    while($contador<count($Nome)){
                                        echo'<tr class="odd gradeX">';
                                            if ($Ficha[$contador] == 0){
                                                echo '
                                                <td class="col-sm-1"><td></td>
                                                <td>'.$IdSuplencia[$contador].'</td>
                                                <td>'.$Nome[$contador].'</td>
                                                <td>'.$Equipe[$contador].'</td>
                                                <td class="center">'.$Telefone[$contador].'</td>
                                                <td align="center"><a href="s
                                                uplencia.php?acao=Ver&Id='.$IdSuplencia[$contador].'" button type="button" class="btn btn-primary btn-circle"><i class="fa fa-list"></i></button></td>            
                                                <td align="center"><a href="suplencia.php?acao=Editar&Id='.$IdSuplencia[$contador].'" type="button" class="btn btn-info btn-circle" ><i class="fa fa-check"></i></a></td>
                                                <td align="center"><a href="" type="button"class="btn btn-info btn-circle" ><i class="fa fa-times"></i></a></td>
                                            </tr>';
                                            }else {
                                                echo '
                                                <td>'.$Ficha[$contador].'</td><td></td>
                                                <td>'.$IdSuplencia[$contador].'</td>
                                                <td>'.$Nome[$contador].'</td>
                                                <td>'.$Equipe[$contador].'</td>
                                                <td class="center">'.$Telefone[$contador].'</td>
                                                <td align="center"><a href="suplencia.php?acao=Ver&Id='.$IdSuplencia[$contador].'" button type="button" class="btn btn-primary btn-circle"><i class="fa fa-list"></i></button></td>
                                                <td align="center"><a href="suplencia.php?acao=Editar&Id='.$IdSuplencia[$contador].'" type="submit" type="button" class="btn btn-danger btn-circle" ><i class="fa fa-check"></i></a></td>';
                                                if ($Devolvido[$contador] == 0){
                                                    echo '<td align="center"><a href="suplencia.php?acao=ok&Id='.$IdSuplencia[$contador].'" type="button"  class="btn btn-info btn-circle" ><i class="fa fa-times"></i></a></td>';
                                                }else {
                                                    echo '<td align="center"><a href="suplencia.php?acao=&Id='.$IdSuplencia[$contador].'" type="button"  class="btn btn-danger btn-circle" ><i class="fa fa-times"></i></a></td>';
                                                }
                                                
                                            echo '</tr>'; }
                                    $contador++;
                                    }
                                ?>
                                
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
