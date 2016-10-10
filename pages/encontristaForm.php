<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Bootstrap Admin Theme</title>
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
            <div class="table">
                  <table class="table">
                    <tr>
                        <form action="../php/encontrista.php" method="POST">
                        <td>Nº ficha:</td>
                        <td><input type="text" style="width: 50px" name="Idficha" id="Idficha" class="form-control" ></td>
                        <td>Nome encontrista:</td>
                        <td><input type="text" style="width: 450px" name="Nome" id="Nome" class="form-control"></td>
                        <td>Sexo:</td>
                        <td>1
                        <label class="radio-inline">
                            <input type="radio" name="sexo" id="sexo" value="F"> Feminino
                            </label>
                            <label class="radio-inline">
                              <input type="radio" name="sexo" id="sexo" value="M"> Masculino
                            </label>
                        </td>
                    </tr><!-- FIM DO PRIMEIRO Tr  -->
                    <tr>
                        <td>comunidade:</td>
                        <td><input type="text" style="width: 70px" name="comunidade" id="comunidade" class="form-control"></td>
                        <td>idade:</td>
                        <td><input type="text" style="width: 45px" name="idade" id="idade" class="form-control"></td>
                         <td>Ira de ônibus:</td>
                        <td>
                        <label class="radio-inline">
                            <input type="radio" name="onibus" id="onibus" value="1"> Sim
                            </label>
                            <label class="radio-inline">
                              <input type="radio" name="onibus" id="onibus" value="0"> Não
                            </label>
                        </td>
                        
                    </tr>
                        <td>Carta:</td>
                        <td>
                        <label class="radio-inline">
                            <input type="radio" name="carta"  value="1"> Sim
                            </label>
                            <label class="radio-inline">
                              <input type="radio" name="carta" value="0"> Não
                            </label>
                        </td>
                        <td>valor:</td>
                        <td><input type="text" style="width: 70px" name="valor" id="valor" class="form-control" ></td>
                        <td>desistencia:</td>
                        <td><input type="text" style="width: 80px" name="desistencia" id="desistencia" class="form-control"></td>
                    <tr>
                    </tr>
                    <tr>
                       <td><button type="submit" class="btn btn-danger" >Cadastrar</button><td>
                    </tr>
                    </form>
                  </table>
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
