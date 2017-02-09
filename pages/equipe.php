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
    ?>
</head>
<body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <?php 
                include "./template/barraSuperior.php";
                include "./template/barraLateral.php";
                include '../php/Banco.php';
                    $Recebe = mysql_query("SELECT * FROM  `equipe`");
                    $Nome;$Sexo;$Fixo;$Celular;$Operadora;$Email;$Senha;$Comunidade;$Equipe;$Status;
                    
                    $contador=0;
                    
                    while($linha = mysql_fetch_array($Recebe)){
                        $Nome[$contador] = $linha["Nome"];
                        $Fixo[$contador] = $linha["Fixo"];
                        $Celular[$contador] = $linha["Celular"];
                        $Operadora[$contador]= $linha["Operadora"];
                        $Email[$contador] = $linha["Email"];
                        $Senha[$contador] = $linha["Senha"];
                        $Comunidade[$contador] = $linha["Comunidade"];
                        $Equipe[$contador] = $linha["Equipe"];
                        $Status[$contador] = $linha["Status"];
                        $contador++;
                    }
            ?>
        </nav>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Listagens das equipes </h1>
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
                       <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                                <tr>
                                    <th>Nome</th>
                                    <th>Fixo</th>
                                    <th>Celular</th>
                                    <th>Operadora</th>
                                    <th>Email</th>
                                    <th>Comunidade</th>
                                    <th>Equipe</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                $contador=0;
                                while($contador<count($Nome)){
                                    if($Status[$contador] == "Coordenador"){
                                        echo'<tr class="danger">
                                            <td>'.$Nome[$contador].'</td>
                                            <td>'.$Fixo[$contador].'</td>
                                            <td>'.$Celular[$contador].'</td>
                                            <td>'.$Operadora[$contador].'</td>
                                            <td>'.$Email[$contador].'</td>
                                            <td>'.$Comunidade[$contador].'</td>
                                            <td>'.$Equipe[$contador].'</td>
                                        </tr>';  
                                    }else if ($Equipe[$contador] == "Casal Apoio"){
                                        echo'<tr class="info">
                                            <td>'.$Nome[$contador].'</td>
                                            <td>'.$Fixo[$contador].'</td>
                                            <td>'.$Celular[$contador].'</td>
                                            <td>'.$Operadora[$contador].'</td>
                                            <td>'.$Email[$contador].'</td>
                                            <td>'.$Comunidade[$contador].'</td>
                                            <td>'.$Equipe[$contador].'</td>
                                        </tr>';  
                                    }else if($Status[$contador]=="Equipe"){
                                        echo'<tr class="odd gradeX">
                                            <td>'.$Nome[$contador].'</td>
                                            <td>'.$Fixo[$contador].'</td>
                                            <td>'.$Celular[$contador].'</td>
                                            <td>'.$Operadora[$contador].'</td>
                                            <td>'.$Email[$contador].'</td>
                                            <td>'.$Comunidade[$contador].'</td>
                                            <td>'.$Equipe[$contador].'</td>
                                        </tr>';  
                                    }else if($Status[$contador]=="Espiao"){
                                        echo'<tr class="warning">
                                            <td>'.$Nome[$contador].'</td>
                                            <td>'.$Fixo[$contador].'</td>
                                            <td>'.$Celular[$contador].'</td>
                                            <td>'.$Operadora[$contador].'</td>
                                            <td>'.$Email[$contador].'</td>
                                            <td>'.$Comunidade[$contador].'</td>
                                            <td>'.$Equipe[$contador].'</td>
                                        </tr>';  
                                    }else if($Status[$contador]=="Apresentador"){
                                        echo'<tr class="success">
                                            <td>'.$Nome[$contador].'</td>
                                            <td>'.$Fixo[$contador].'</td>
                                            <td>'.$Celular[$contador].'</td>
                                            <td>'.$Operadora[$contador].'</td>
                                            <td>'.$Email[$contador].'</td>
                                            <td>'.$Comunidade[$contador].'</td>
                                            <td>'.$Equipe[$contador].'</td>
                                        </tr>';  
                                    }
                                    
                                    
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