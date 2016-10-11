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
                    <h1 class="page-header">Cadastrar encontrista</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <!-- COMEÇO DO FORMULARIO DE CADASTRO  -->
            <div class="row">
                <div class="container">
                    <form action="../php/encontrista.php" method="POST">
                        <div class="form-group row">
                          <label for="IdFicha" class="col-sm-1 col-form-label">Nº ficha:</label>
                          <div class="col-sm-2">
                            <input type="text" class="form-control" id="IdFicha">
                          </div>
                         
                          <label for="nome" class="col-sm-1 col-form-label">Nome:</label>
                          <div class="col-sm-6">
                            <input type="text" class="form-control" id="nome">
                          </div>
                        </div>
                
                        <div class="form-group row">
                            <label for="sexo" class="col-xs-1 col-form-label">Sexo:</label>
                            <div class="col-xs-2">
                                <select  class="form-control">
                                    <option value="F">Feminino</option>
                                    <option value="M">Masculino</option>
                                </select>
                            </div>
                            <label for="idade" class="col-xs-1 col-form-label">Idade:</label>
                            <div class="col-sm-2">
                                <input type="text" class="form-control" id="idade">
                            </div>
                            <label for="IdFicha" class="col-xs-1 col-form-label">Valor:</label>
                            <div class="col-sm-3">
                                <select class="form-control">
                                  <option>Amizade</option>
                                  <option>Amor</option>
                                  <option>Perdão</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            
                            <label for="comunidade" class="col-sm-1 col-form-label">Comunidade</label>
                            <div class="col-sm-2">
                                <input type="text" class="form-control" id="comunidade">
                            </div>
                            <label for="onibus" class="col-xs-1 col-form-label">Ira de ônibus?</label>
                            <div class="col-sm-1">
                                    <label><input type="radio" name="optradio">Sim</label> 
                                    <label><input type="radio" name="optradio">Não</label>
                            </div>
                            <label for="carta" class="col-xs-1 col-form-label">Carta?</label>
                            <div class="col-sm-1">
                                    <label><input type="radio" name="carta">Sim</label> 
                                    <label><input type="radio" name="carta">Não</label>
                            </div>
                            <label for="desistencia" class="col-xs-1 col-form-label">Desistencia?</label>
                            <div class="col-sm-1">
                                    <label><input type="radio" name="desistencia">Sim</label> 
                                    <label><input type="radio" name="desistencia">Não</label>
                            </div>
                            <label for="remedio" class="col-xs-1 col-form-label">Remedio?</label>
                            <div class="col-sm-1">
                                    <label><input type="radio" name="remedio">Sim</label> 
                                    <label><input type="radio" name="remedio">Não</label>
                            </div>
                        </div>
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
