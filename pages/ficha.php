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
                include '../php/Banco.php';
                $aux = $_GET["aux"];
                $Recebe=mysql_query("SELECT * FROM encontrista where IdFicha='$aux'");
                $IdFicha; $Nome; $Sexo; $Idade; $Comunidade; $Onibus; $Carta; $Valor; $Desistencia; $Remedio;
                include "./template/barraSuperior.php";
                include "./template/barraLateral.php";
            ?>
        </nav>
        <?php
            $contador=0;
            while($linha=mysql_fetch_array($Recebe)){
                $IdFicha[$contador]= $linha["IdFicha"];
                $Nome[$contador] = $linha["Nome"];
                $Sexo[$contador] = $linha["Sexo"];
                $Comunidade[$contador] = $linha["Comunidade"];
                $Idade[$contador]= $linha["Idade"];
                $Onibus[$contador] = $linha["Onibus"];
                $Carta[$contador] = $linha["Carta"];
                $Valor[$contador] = $linha["Valor"];
                $Desistencia[$contador] = $linha["Desistencia"];
                $Remedio[$contador] = $linha["Remedio"];
                $contador++;
            }
        
        $cont=0;
		while ($cont<count($IdFicha)){
            echo '<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">'.$Nome[$cont].'</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
             <div class="row">
                <div class="container">
                    <form action="../php/atualizar_ficha.php" method="POST">
                        <div class="form-group row">
                          <label for="IdFicha" class="col-md-1 col-form-label">Nº ficha:</label>
                          <div class="col-sm-2">
                            '.$IdFicha[$cont].'
                          </div>
                          <label for="Nome" class="col-sm-1 col-form-label">Nome:</label>
                          <div class="col-sm-6">
                            '.$Nome[$cont].'
                          </div>
                        </div>
                
                        <div class="form-group row">
                            <label for="Sexo" class="col-xs-1 col-form-label" name="Sexo">Sexo:</label>
                            <div class="col-xs-2">
                                '.$Sexo[$cont].'
                            </div>
                            <label for="Idade" class="col-xs-1 col-form-label" >Idade:</label>
                            <div class="col-sm-2">
                                '.$Idade[$cont].'
                            </div>
                        </div>
                        <div class="form-group row">
                            
                            <label for="Comunidade" class="col-xs-1 col-form-label" name="Comunidade">Comunidade:</label>
                            <div class="col-xs-2">
                                 '.$Comunidade[$cont].'
                            </div>
                            <label for="onibus" class="col-xs-1 col-form-label">Ira de ônibus?</label>
                            <div class="col-sm-1">
                                    '.$Onibus[$cont].'
                            </div>
                                <label for="Remedio" class="col-xs-1 col-form-label">Remedio?</label>
                            <div class="col-sm-1" name="Remedio">
                                '.$Remedio[$cont].'
                            </div>
                            
                        </div>
                    </form>   
                </div>
            </div>
            <!-- /.row -->
        </div>';
        $cont++;
		}
        ?>
        
        <!-- /#page-wrapper -->
        </div>
</body>

</html>