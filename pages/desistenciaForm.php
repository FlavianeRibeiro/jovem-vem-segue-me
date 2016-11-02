 <?php
    require_once '../php/EncontristaController.php';
    $encontristaController = new EncontristaController();
    $encontrista = new Encontrista();
    
    
    if (isset($_GET['IdFicha'])){
        $IdFicha = $_GET['IdFicha'];
        $resposta =  $encontristaController->obterEncontristaPorIdFicha($IdFicha);
        $myEncontrista = mysql_fetch_array($resposta);
    }
    
    if (isset($_GET['acao'])){
        if($_GET['acao'] == 'cadastrarDesistencia'){
            
            $encontrista->setNome($_POST['Just']);
            
            $id = $_POST['IdFicha'];
            echo $id;
            $resposta =  $encontristaController->cadastrarDesistencia($id, $just);
        }
        
    }
?>
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
                    <h1 class="page-header">Cadastrar desistência</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <!-- COMEÇO DO FORMULARIO DE CADASTRO  -->
            <div class="row">
                <div class="container">
                    <form action="<?php $SELF_PHP;?>?acao=cadastrarDesistencia" method="POST">
                        <div class="form-group row">
                          <label for="IdFicha" class="col-sm-1 col-form-label">Nº ficha:</label>
                          <div class="col-sm-1">
                            <input type="text" class="form-control" name="IdFicha" value="<?php echo $myEncontrista["IdFicha"]; ?>" disabled>
                          </div>
                         
                          <label for="Nome" class="col-sm-1 col-form-label">Nome:</label>
                          <div class="col-sm-5">
                            <input type="text" class="form-control" name="Nome" value="<?php echo $myEncontrista["Nome"]; ?>" disabled>
                          </div>
                        </div>
                
                        <div class="form-group row">
                            <label for="Sexo" class="col-xs-1 col-form-label" name="justificativa">Justificativa:</label>
                            <div class="col-sm-7">
                                <textarea class="form-control" rows="5" name="justificativa" id="justificativa"></textarea>
                            </div>
                          
                        </div>
                        <button type="submit" class="btn btn-danger">Cadastrar</button> 
                        <button type="button" class="btn btn-primary" id="cancelar" onclick="location.href='index.php';">Cancelar</button>
                    </form>   
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="../vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Flot Charts JavaScript -->
    <script src="../vendor/flot/excanvas.min.js"></script>
    <script src="../vendor/flot/jquery.flot.js"></script>
    <script src="../vendor/flot/jquery.flot.pie.js"></script>
    <script src="../vendor/flot/jquery.flot.resize.js"></script>
    <script src="../vendor/flot/jquery.flot.time.js"></script>
    <script src="../vendor/flot-tooltip/jquery.flot.tooltip.min.js"></script>
    <script src="../data/flot-data.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

</body>

</html>
