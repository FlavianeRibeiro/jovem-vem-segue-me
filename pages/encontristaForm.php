 <?php
    require_once '../php/EncontristaController.php';
    require_once '../php/ComunidadeController.php';
    $encontristaController = new EncontristaController();
    $comunidadeController = new ComunidadeController();
    
    
    $encontrista = new Encontrista();
    $Titulo = 'Cadastrar encontrista';
    $action = 'cadastraEncontrista';
    
    
    // pega a variavel GET que passamos no action do form
    if (isset($_GET['acao'])){
    $acao = $_GET['acao'];
    
    // Verifica qual formulario foi submetido
    if($acao == "cadastraEncontrista"){
        
            echo "cadastrar".$_POST['IdFicha'];
            
            //Atribuindo valores ao objeto
            $encontrista->setId($_POST['IdFicha']);
            $encontrista->setNome($_POST['Nome']);
            $encontrista->setSexo($_POST['Sexo']);
            $encontrista->setComunidade($_POST['Comunidade']);
            $encontrista->setIdade($_POST['Idade']);
            $encontrista->setOnibus($_POST['Onibus']);
            $encontrista->setCarta($_POST['Carta']); 
            $encontrista->setValor($_POST['Valor']); 
            $encontrista->setDesistencia($_POST['Desistencia']);
            $encontrista->setRemedio($_POST['Remedio']);
            
            //chamando a funcao que faz o insert
           $resposta =  $encontristaController->salvar($encontrista);
           
    }elseif($acao == 'AtualizarCadastro'){
            //Atribuindo valores ao objeto
            
            $encontrista->setId($_POST['IdFicha']);
            $encontrista->setNome($_POST['Nome']);
            $encontrista->setSexo($_POST['Sexo']);
            $encontrista->setComunidade($_POST['Comunidade']);
            $encontrista->setIdade($_POST['Idade']);
            $encontrista->setOnibus($_POST['Onibus']);
            $encontrista->setRemedio($_POST['Remedio']);
            
            //chamando a funcao que faz o insert
           $resposta =  $encontristaController->atualizar($encontrista);
        
    }else if(($acao == "verFicha") || ($acao == "editarFicha")){
        $IdFicha = $_GET['Id'];
        
        if($acao == "verFicha"){
            $Titulo = 'Ver Ficha';
            $permissao='disabled';
            
            $resposta =  $encontristaController->obterEncontristaPorIdFicha($IdFicha);
            $myEncontrista = mysql_fetch_array($resposta);
           
        }else{
            $Titulo = 'Editar Ficha';
            $action='AtualizarCadastro';
            
            $resposta =  $encontristaController->obterEncontristaPorIdFicha($IdFicha);
            $myEncontrista = mysql_fetch_array($resposta);
            
        }
        $IdFicha = $myEncontrista['IdFicha'];
        $Nome = $myEncontrista['Nome'];
        $Sexo = $myEncontrista['Sexo'];
        $Comunidade = $myEncontrista['Comunidade'];
        $Idade = $myEncontrista['Idade'];
        $Onibus = $myEncontrista['Onibus'];
        $Carta = $myEncontrista['Carta'];
        $Valor = $myEncontrista['Valor'];
        $Desistencia = $myEncontrista['Desistencia'];
        $Remedio = $myEncontrista['Remedio'];
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
    <?php include './template/styles.html'; ?>
    
    <title>Jovem vem e segue-me</title>
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
                    <h1 class="page-header"><?php echo $Titulo?></h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <!-- COMEÇO DO FORMULARIO DE CADASTRO  -->
            <div class="row">
                <div class="container">
                    <form action="<?php $SELF_PHP;?>?acao=<?php echo $action;?>" method="POST">
                        <div class="form-group row">
                          <label for="IdFicha" class="col-sm-1 col-form-label">Nº ficha:</label>
                          <div class="col-sm-2">
                            <input type="text" class="form-control" name="IdFicha" value="<?php echo $IdFicha;?>" <?php echo $permissao;?>>
                          </div>
                         
                          <label for="Nome" class="col-sm-1 col-form-label">Nome:</label>
                          <div class="col-sm-6">
                            <input type="text" class="form-control" name="Nome"  value="<?php echo $Nome;?>" <?php echo $permissao;?>>
                          </div>
                        </div>
                
                        <div class="form-group row">
                            <label for="Sexo" class="col-xs-1 col-form-label" name="Sexo">Sexo:</label>
                            <div class="col-xs-2">
                                <select name="Sexo" class="form-control"  <?php echo $permissao;?>>
                                    <option> </option>
                                    <option name="Sexo" value="Feminino" <?php if($Sexo == 'Feminino') echo"selected";?>>Feminino</option>
                                    <option name="Sexo" value="Masculino" <?php if($Sexo == 'Masculino') echo"selected";?>>Masculino</option>
                                </select>
                            </div>
                            <label for="Idade" class="col-xs-1 col-form-label" >Idade:</label>
                            <div class="col-sm-2">
                                <input type="text" class="form-control" name="Idade"  value="<?php echo $Idade;?>" <?php echo $permissao;?>>
                            </div>
                            <label for="Valor" class="col-xs-1 col-form-label">Valor:</label>
                            <div class="col-sm-3">
                                <select class="form-control" name="Valor" <?php echo $permissao;?>>
                                  <option name="Valor" value="Amizade" >Amizade</option>
                                  <option name="Valor" value="Amor" <?php if($Valor == 'Amor') echo"selected";?>>Amor</option>
                                  <option name="Valor" value="Perdao"<?php if($Valor == 'Perdao') echo"selected";?>>Perdão</option>
                                </select>
                            </div>
                        </div>
                        
                        <?php $listComunidade = $comunidadeController->listarTodas();?>
                         
                        <div class="form-group row">
                            
                            <label for="Comunidade" class="col-xs-1 col-form-label" name="Comunidade">Comunidade:</label>
                            <div class="col-xs-2">
                                <select name="Comunidade" class="form-control" <?php echo $permissao;?>>
                                    <option > </option>
                                    <?php while($myComunidade = mysql_fetch_array($listComunidade)){
                                            
                                        ($Comunidade == $myComunidade['IdComunidade']) ? $selected = "selected" : $selected = "";
                                        echo "<option name='Comunidade' value='".$myComunidade['IdComunidade']."'".$selected.">".$myComunidade['Nome']."</option>";
                                     }
                                     ?>
                                    <option name="Comunidade" value="">Outros</option>
                                </select>
                            </div>
                            <label for="onibus" class="col-xs-1 col-form-label">Ira de ônibus?</label>
                            <div class="col-sm-1">
                                    <label><input type="radio" name="Onibus" value="1" <?php echo $permissao;?>>Sim</label> 
                                    <label><input type="radio" name="Onibus" value="0" <?php echo $permissao;?>>Não</label>
                            </div>
                            <label for="Carta" class="col-xs-1 col-form-label">Carta:</label>
                            <div class="col-sm-1" name="Carta" <?php echo $permissao;?>>
                                    <label><input type="radio" name="Carta" value="1" <?php echo $permissao;?>>Sim</label> 
                                    <label><input type="radio" name="Carta" value="0" <?php echo $permissao;?>>Não</label>
                            </div>
                            <label for="Desistencia" class="col-xs-1 col-form-label">Desistencia?</label>
                            <div class="col-sm-1" name="Desistencia" <?php echo $permissao;?>>
                                    <label><input type="radio" name="Desistencia" value="1" <?php echo $permissao;?>>Sim</label> 
                                    <label><input type="radio" name="Desistencia"value="0" <?php echo $permissao;?>>Não</label>
                            </div>
                            <label for="Remedio" class="col-xs-1 col-form-label">Remedio?</label>
                            <div class="col-sm-1" name="Remedio" <?php echo $permissao;?>>
                                    <label><input type="radio" name="Remedio" value="Sim" <?php echo $permissao;?>>Sim</label> 
                                    <label><input type="radio" name="Remedio" value="Não" <?php echo $permissao;?>>Não</label>
                            </div>
                            
                        </div>
                        <?php if(!isset($permissao)) echo "<button type='submit' class='btn btn-danger'>Cadastrar</button>";?>
                        <button type="button" class="btn btn-primary" id="cancelar" onclick="location.href='index.php';">Voltar</button>
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
