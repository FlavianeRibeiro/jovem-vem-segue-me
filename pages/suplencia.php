 <?php
        include './template/styles.html';
        require_once '../php/SuplenciaControle.php';
        $suplenciaControle = new SuplenciaControle();
        
        if (isset($_GET['acao'])){
            $acao = $_GET['acao'];
            $Id = $_GET['Id'];
            
            if($acao == 'Editar'){
                $IdSuplencia = $mySuplencia['IdSuplencia'];
                $Nome = $mySuplencia['nome'];
                $Equipe = $mySuplencia['equipe'];
                $Email = $mySuplencia['email'];
                $Telefone = $mySuplencia['telefone'];
                $Carta = $mySuplencia['carta'];
                $Ficha = $mySuplencia['ficha'];
                $Devolvido = $mySuplencia['devolvido'];
                
                $resposta =  $suplenciaControle ->CadastrarFicha($IdSuplencia, $Ficha);
                $mySuplencia = mysql_fetch_array($resposta);  
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
                    <h1 class="page-header">SUPLENCIA</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- COMEÇO DO FORMULARIO DE CADASTRO  -->
            <div class="row">
                <div class="container">
                    <form action="../php/Cad_Suplencia.php" method="POST">
                        <div class="panel panel-default"> 
                            <div class="panel-heading">
                                Suplencia
                            </div>
                            <div class="panel-body">
                            <div class="form-group row">
                            <?php if($acao == 'Editar'){ ?>
                            
                            <label for="Nome" class="col-sm-1 col-form-label">Ficha:</label>
                              <div class="col-sm-2">
                                <input type="text" class="form-control" name="Ficha"  value="<?php echo $Ficha;?>" <?php echo $permissao;?>>
                              </div>
                              <?php }?>
                              <label for="Nome" class="col-sm-1 col-form-label">Nome:</label>
                              <div class="col-sm-4">
                                <input type="text" class="form-control" name="Nome" placeholder="Nome completo" value="<?php echo $Nome;?>" <?php echo $permissao;?>>
                              </div>
                              <label for="Nome" class="col-sm-1 col-form-label">Equipe:</label>
                              <div class="col-sm-2">
                                <select name="Equipe" class="form-control" <?php echo $permissao;?>>
                                        <option> </option>
                                        <option name="Equipe" value="Bem Estar" <?php if($Equipe == 'Bem Estar') echo"selected";?>>Bem Estar</option>
                                        <option name="Equipe" value="CG" <?php if($Equipe == 'CG') echo"selected";?>>CG</option>
                                        <option name="Equipe" value="Comunicação" <?php if($Equipe == 'Comunicação') echo"selected";?>>Comunicação</option>
                                        <option name="Equipe" value="Copa" <?php if($Equipe == 'Copa') echo"selected";?>>Copa</option>
                                        <option name="Equipe" value="Casal Apoio" <?php if($Equipe == 'Casal Apoio') echo"selected";?>>Casal Apoio</option>
                                        <option name="Equipe" value="Cozinha" <?php if($Equipe == 'Cozinha') echo"selected";?>>Cozinha</option>
                                        <option name="Equipe" value="Decoração" <?php if($Equipe == 'Decoração') echo"selected";?>>Decoração</option>
                                        <option name="Equipe" value="Intercessão e Liturgia" <?php if($Equipe == 'Intercessão e Liturgia') echo"selected";?>>Intercessão e Liturgia</option>
                                        <option name="Equipe" value="Logistica" <?php if($Equipe == 'Logistica') echo"selected";?>>Logistica</option>
                                        <option name="Equipe" value="Música" <?php if($Equipe == 'Música') echo"selected";?>>Música</option>
                                        <option name="Equipe" value="Ordem e Vigilância" <?php if($Equipe == '>Ordem e Vigilância') echo"selected";?>>Ordem e Vigilância</option>
                                        <option name="Equipe" value="Sala" <?php if($Equipe == 'Sala') echo"selected";?>>Sala</option>
                                        <option name="Equipe" value="Secretaria" <?php if($Equipe == 'Secretaria') echo"selected";?>>Secretaria</option>
                                        
                                    </select>
                              </div>
                            </div>
                    
                            <div class="form-group row">
                                <label for="Email" class="col-sm-1 col-form-label">Email:</label>
                              <div class="col-sm-4">
                                <input type="text" class="form-control" name="Email" placeholder="exemplo@retiro.com" value="<?php echo $Email;?>" <?php echo $permissao;?>>
                              </div>
                               <label for="Telefone" class="col-sm-1 col-form-label" >Telefone:</label>
                              <div class="col-sm-2">
                                <input type="text" class="form-control" name="Telefone" placeholder="(27)99999-9999" value="<?php echo $Telefone;?>" <?php echo $permissao;?>>
                              </div>
                            </div>
                            
                            <button type="submit" class="btn btn-danger">Cadastrar</button>
                            </div>
                        </div>
                    </form>   
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->
    </div>
</body>
</html>
