<!DOCTYPE html>
<html lang="pt">
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
    <?php
        include '../php/Banco.php';
            $op =$_GET["op"];
            switch ($op) {
                case '1':
                    $op = "Cristo Rei";
                break;
                case '2':
                    $op = "Jesus Ressuscitado";
                break;
                case '3':
                    $op = "Nossa Senhora do Rosário";
                break;
                case '4':
                    $op = "Sagrada Família";
                break;
                case '5':
                    $op = "Santa Clara de Assis";
                break;
                case '6':
                    $op = "Santuário";
                break;
                case '7':
                    $op = "São Benedito";
                break;
                case '8':
                    $op = "São Marcos";
                break;
                case '9':
                    $op = "São Sebastião";
                break;
            }
    ?>
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
                    <h1 class="page-header">Comunidades</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            
        <!-- ********************************* listagem ****************************************-->
        <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Encontristas da Comunidade: <?php echo $op; ?>
                        </div>
                        <!-- .panel-heading -->
                        <div class="panel-body">
                            <table class="table table-bordered">
                                <tr>
                                    <th>Nº Ficha</th>
                                    <th>Nome</th>
                                    <th>Idade</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                if ( $op == 10){
                                    $Recebe = mysql_query("SELECT * FROM  `encontrista` WHERE  `Comunidade` !=  'Cristo Rei'
                                        AND  `Comunidade` !=  'Jesus Ressuscitado'AND  `Comunidade` !=  'Nossa Senhora do Rosário'
                                        AND  `Comunidade` !=  'Sagrada Família' AND  `Comunidade` !=  'Santa Clara de Assis'
                                        AND  `Comunidade` !=  'Santuário' AND  `Comunidade` !=  'São Benedito'
                                        AND  `Comunidade` !=  'São Marco' AND  `Comunidade` !=  'São Sebastião'");
                                }else{
                                    $Recebe = mysql_query("SELECT * FROM  `encontrista` WHERE  `Comunidade` =  '$op'");
                                }
                               
                                
                                $IdFicha;$Nome;$Idade;
                                $contador=0;
                                
                                while($linha = mysql_fetch_array($Recebe)){
                                    $IdFicha[$contador] = $linha["IdFicha"];
                                    $Nome[$contador] = $linha["Nome"];
                                    $Idade[$contador] = $linha["Idade"];
                                    $contador++;
                                }
                                $contador=0;
                                while($contador<count($Nome)){
                                    echo'<tr class="odd gradeX">
                                            <td>'.$IdFicha[$contador].'</td>
                                            <td>'.$Nome[$contador].'</td>
                                            <td class="center">'.$Idade[$contador].'</td>
                                        </tr>';
                                    $contador++;
                                }
                            ?>
                            </tbody>
                        </table>
                        </div>
                        <!-- .panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
        <!-- ********************************* listagem ****************************************-->
    </div>
</body>
</html>