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
                include '../php/Banco.php';
                    $Recebe = mysql_query("SELECT * FROM  `Suplencia`");
                    
                    $IdSuplencia;$Nome;$Equipe;$Email;$Telefone;
                    $contador=0;
                    
                    while($linha = mysql_fetch_array($Recebe)){
                        $IdSuplencia[$contador] = $linha["IdSuplencia"];
                        $Nome[$contador] = $linha["Nome"];
                        $Equipe[$contador] = $linha["Equipe"];
                        $Email[$contador] = $linha["Email"];
                        $Telefone[$contador] = $linha["Telefone"];
                        $contador++;
                    }
            ?>
        </nav>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Listagens de suplência </h1>
                </div>
                <!-- /.col-lg-12 -->
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
                                    <th>Número</th>
                                    <th>Nome</th>
                                    <th>Equipe</th>
                                    <th>E-mail</th>
                                    <th>Telefone</th>
                                    <th>Editar</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                $contador=0;
                                while($contador<count($Nome)){
                                    echo'<tr class="odd gradeX">
                                            <td>'.$IdSuplencia[$contador].'</td>
                                            <td>'.$Nome[$contador].'</td>
                                            <td>'.$Equipe[$contador].'</td>
                                            <td class="center">'.$Email[$contador].'</td>
                                            <td class="center">'.$Telefone[$contador].'</td>
                                            <td align="center"><a href="" type="button" class="btn btn-info btn-circle" ><i class="fa fa-check"></i></a></td>
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
