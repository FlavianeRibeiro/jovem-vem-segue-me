 <?php
    require_once '../php/EncontristaController.php';
    $encontristaController = new EncontristaController();
    $encontrista = new Encontrista();
    
    // pega a variavel GET que passamos no action do form
    if (isset($_GET['acao'])){
    $acao = $_GET['acao'];
    
    // Verifica qual formulario foi submetido
    switch($acao) {
        case "cadastraEncontrista":{
            //Atribuindo valores ao objeto
            $encontrista->setId($_POST['IdFicha']);
            $encontrista->setNome($_POST['Nome']);
            $encontrista->setSexo($_POST['Sexo']);
            $encontrista->setComunidade($_POST['Comunidade']);
            $encontrista->setCarta($_POST['Idade']);
            $encontrista->setOnibus($_POST['Onibus']);
            $encontrista->setCarta($_POST['Carta']);
            $encontrista->setValor($_POST['Valor']);
            $encontrista->setDesistencia($_POST['Desistencia']);
            $encontrista->setRemedio($_POST['Remedio']);
            
            //chamando a funcao que faz o insert
           $resposta =  $encontristaController->salvar($encontrista);
           echo $resposta;
        }
            break;
        //se for setProduto
        case "getProduto": {
            $getProduto = new Produto;
            $getProduto->cat_id = $_POST['Categoria'];
            $getProduto->getProduto();
        }
        break;
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
                    <h1 class="page-header">Cadastrar encontrista</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <!-- COMEÇO DO FORMULARIO DE CADASTRO  -->
            <div class="row">
                <div class="container">
                    <form action="<?php $SELF_PHP;?>?acao=cadastraEncontrista" method="POST">
                        <div class="form-group row">
                          <label for="IdFicha" class="col-sm-1 col-form-label">Nº ficha:</label>
                          <div class="col-sm-2">
                            <input type="text" class="form-control" name="IdFicha">
                          </div>
                         
                          <label for="Nome" class="col-sm-1 col-form-label">Nome:</label>
                          <div class="col-sm-6">
                            <input type="text" class="form-control" name="Nome">
                          </div>
                        </div>
                
                        <div class="form-group row">
                            <label for="Sexo" class="col-xs-1 col-form-label" name="Sexo">Sexo:</label>
                            <div class="col-xs-2">
                                <select name="Sexo" class="form-control">
                                    <option> </option>
                                    <option name="Sexo" value="Feminino">Feminino</option>
                                    <option name="Sexo" value="Masculino">Masculino</option>
                                </select>
                            </div>
                            <label for="Idade" class="col-xs-1 col-form-label" >Idade:</label>
                            <div class="col-sm-2">
                                <input type="text" class="form-control" name="Idade">
                            </div>
                            <label for="Valor" class="col-xs-1 col-form-label">Valor:</label>
                            <div class="col-sm-3">
                                <select class="form-control" name="Valor">
                                  <option name="Valor" value="Amizade">Amizade</option>
                                  <option name="Valor" value="Amor">Amor</option>
                                  <option name="Valor" value="Perdao">Perdão</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            
                            <label for="Comunidade" class="col-xs-1 col-form-label" name="Comunidade">Comunidade:</label>
                            <div class="col-xs-2">
                                <select name="Comunidade" class="form-control">
                                    <option > </option>
                                    <option name="Comunidade" value="Cristo Rei">Cristo Rei</option>
                                    <option name="Comunidade" value="Jesus Ressuscitado">Jesus Ressuscitado</option>
                                    <option name="Comunidade" value="Nossa Senhora do Rosário">Nossa Senhora do Rosário</option>
                                    <option name="Comunidade" value="Sagrada Família">Sagrada Família</option>
                                    <option name="Comunidade" value="Santa Clara de Assis">Santa Clara de Assis</option>
                                    <option name="Comunidade" value="Santuário">Santuário</option>
                                    <option name="Comunidade" value="São Benedito">São Benedito</option>
                                    <option name="Comunidade" value="São Marcos">São Marcos</option>
                                    <option name="Comunidade" value="São Sebastião">São Sebastião</option>
                                    <option name="Comunidade" value="">Outros</option>
                                </select>
                            </div>
                            <label for="onibus" class="col-xs-1 col-form-label">Ira de ônibus?</label>
                            <div class="col-sm-1">
                                    <label><input type="radio" name="Onibus" value="1">Sim</label> 
                                    <label><input type="radio" name="Onibus" value="0">Não</label>
                            </div>
                            <label for="Carta" class="col-xs-1 col-form-label">Carta:</label>
                            <div class="col-sm-1" name="Carta">
                                    <label><input type="radio" name="Carta" value="1">Sim</label> 
                                    <label><input type="radio" name="Carta" value="0">Não</label>
                            </div>
                            <label for="Desistencia" class="col-xs-1 col-form-label">Desistencia?</label>
                            <div class="col-sm-1" name="Desistencia">
                                    <label><input type="radio" name="Desistencia" value="1">Sim</label> 
                                    <label><input type="radio" name="Desistencia"value="0">Não</label>
                            </div>
                            <label for="Remedio" class="col-xs-1 col-form-label">Remedio?</label>
                            <div class="col-sm-1" name="Remedio">
                                    <label><input type="radio" name="Remedio" value="Sim">Sim</label> 
                                    <label><input type="radio" name="Remedio" value="Não">Não</label>
                            </div>
                            
                        </div>
                        <button type="submit" class="btn btn-danger">Cadastrar</button>
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
