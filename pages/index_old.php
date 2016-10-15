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
                    <h1 class="page-header">Jovem Vem e Segue-me</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            
            
                <!-- ********************************* listagem ****************************************-->
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
                                    <th>Ver Fichas</th>
                                    <th>Editar</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                include '../php/Banco.php';
                                $Recebe = mysql_query("SELECT * FROM  `encontrista`");
                                
                                $IdFicha;
                                $Nome;
                                $Comunidade;
                                $Idade;
                                $Valor;
                                $contador=0;
                                
                                while($linha = mysql_fetch_array($Recebe)){
                                    $IdFicha[$contador] = $linha["IdFicha"];
                                    $Nome[$contador] = $linha["Nome"];
                                    $Comunidade[$contador] = $linha["Comunidade"];
                                    $Idade[$contador] = $linha["Idade"];
                                    $Valor[$contador] = $linha["Valor"];
                                    $contador++;
                                }
                                $contador=0;
                                while($contador<count($Nome)){
                                    echo'<tr class="odd gradeX">
                                            <td>'.$IdFicha[$contador].'</td>
                                            <td>'.$Nome[$contador].'</td>
                                            <td>'.$Comunidade[$contador].'</td>
                                            <td class="center">'.$Idade[$contador].'</td>
                                            <td class="center">'.$Valor[$contador].'</td>
                                            <td align="center"><button type="button" class="btn btn-primary btn-circle"><i class="fa fa-list"></i></button></td>
                                            <td align="center"><a href="editar.php?aux='.$IdFicha[$contador].' "type="button" class="btn btn-info btn-circle" ><i class="fa fa-check"></i></a></td>
                                        </tr>';
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
