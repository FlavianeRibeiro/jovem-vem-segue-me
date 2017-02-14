 <?php
    include './template/styles.html';
    include '../php/Banco.php';
        session_start();
		if(!isset($_SESSION["IdEquipe"])){ header('Location: ../pages/login.php');}
    if (isset($_GET['acao'])){
        $acao = $_GET['acao'];
        $hue = $_GET['Id'];
        $x = mysql_query("SELECT `NomeSuplencia`, `EquipeSuplencia`, `Email`, `Telefone`, `Ficha` FROM `Suplencia`   WHERE `IdSuplencia` = '".$hue."'");
        $NomeSuplencia;$EquipeSuplencia;$Email;$Telefone;$Ficha;
        if($acao == 'Editar'){
            $contador=0;
                while($linha = mysql_fetch_array($x)){
                    $Ficha = $linha["Ficha"];
                    $NomeSuplencia = $linha["NomeSuplencia"];
                    $EquipeSuplencia= $linha["EquipeSuplencia"];
                    $Email = $linha["Email"];
                    $Telefone = $linha["Telefone"];
                    $contador++;
                }
        }else if($acao == 'Ver'){
            $permissao='disabled';
            while($linha = mysql_fetch_array($x)){
                    $Ficha = $linha["Ficha"];
                    $NomeSuplencia = $linha["NomeSuplencia"];
                    $EquipeSuplencia= $linha["EquipeSuplencia"];
                    $Email = $linha["Email"];
                    $Telefone = $linha["Telefone"];
                    $contador++;
                }
        }
        if($acao == 'ok'){  
            $y = mysql_query("UPDATE `Suplencia` SET `Devolvido`= 1 WHERE `IdSuplencia` ='".$hue."'");$Result = mysql_query($y);header("Location: ../pages/suplenciaListagem.php");
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
                    <?php if ($acao == 'Editar'){ echo "teste";
                echo '<form action="../php/editar.php?Id='.$hue.'" method="POST">';
                     }else{ ?>
                         <form action="../php/Cad_Suplencia.php" method="POST">
                    <?php } ?>
                        <div class="panel panel-default"> 
                            <div class="panel-heading">
                                Suplencia
                            </div>
                            <div class="panel-body">
                            <div class="form-group row">
                            <?php if($acao == 'Editar' || $acao == 'Ver' ){ ?>
                            <label for="Ficha" class="col-sm-1 col-form-label">Ficha:</label>
                              <div class="col-sm-1">
                                <input type="text" class="form-control" name="Ficha" id="Ficha"  value="<?php echo $Ficha;?>" <?php echo $permissao;?>>
                              </div>
                              <?php }?>
                              <label for="NomeSuplencia" class="col-sm-1 col-form-label">Nome:</label>
                              <div class="col-sm-4">
                                <input type="text" class="form-control" name="NomeSuplencia" id="NomeSuplencia" placeholder="Nome completo" value="<?php echo $NomeSuplencia;?>" <?php echo $permissao;?>>
                              </div>
                              <label for="EquipeSuplencia" class="col-sm-1 col-form-label">Equipe:</label>
                              <div class="col-sm-2">
                                <select name="EquipeSuplencia" id="EquipeSuplencia" class="form-control" <?php echo $permissao;?>>
                                    <option> </option>
                                    <option name="EquipeSuplencia" value="Bem Estar" <?php if($EquipeSuplencia == 'Bem Estar') echo"selected";?>>Bem Estar</option>
                                    <option name="EquipeSuplencia" value="CG" <?php if($EquipeSuplencia == 'CG') echo"selected";?>>CG</option>
                                    <option name="EquipeSuplencia" value="Comunicação" <?php if($EquipeSuplencia == 'Comunicação') echo"selected";?>>Comunicação</option>
                                    <option name="EquipeSuplencia" value="Copa" <?php if($EquipeSuplencia == 'Copa') echo"selected";?>>Copa</option>
                                    <option name="EquipeSuplencia" value="Casal Apoio" <?php if($EquipeSuplencia == 'Casal Apoio') echo"selected";?>>Casal Apoio</option>
                                    <option name="EquipeSuplencia" value="Cozinha" <?php if($EquipeSuplencia == 'Cozinha') echo"selected";?>>Cozinha</option>
                                    <option name="EquipeSuplencia" value="Decoração" <?php if($EquipeSuplencia == 'Decoração') echo"selected";?>>Decoração</option>
                                    <option name="EquipeSuplencia" value="Intercessão e Liturgia" <?php if($EquipeSuplencia == 'Intercessão') echo"selected";?>>Intercessão e Liturgia</option>
                                    <option name="EquipeSuplencia" value="Logistica" <?php if($EquipeSuplencia == 'Logistica') echo"selected";?>>Logistica</option>
                                    <option name="EquipeSuplencia" value="Música" <?php if($EquipeSuplencia == 'Música') echo"selected";?>>Música</option>
                                    <option name="EquipeSuplencia" value="Ordem e Vigilância" <?php if($EquipeSuplencia == '>Ordem') echo"selected";?>>Ordem e Vigilância</option>
                                    <option name="EquipeSuplencia" value="Sala" <?php if($EquipeSuplencia == 'Sala') echo"selected";?>>Sala</option>
                                    <option name="EquipeSuplencia" value="Secretaria" <?php if($EquipeSuplencia == 'Secretaria') echo"selected";?>>Secretaria</option>
                                </select>
                              </div>
                            </div>
                    
                            <div class="form-group row">
                                <label for="Email" class="col-sm-1 col-form-label">Email:</label>
                              <div class="col-sm-4">
                                <input type="text" class="form-control" name="Email" id="Email" placeholder="exemplo@retiro.com" value="<?php echo $Email;?>" <?php echo $permissao;?>>
                              </div>
                               <label for="Telefone" class="col-sm-1 col-form-label" >Telefone:</label>
                              <div class="col-sm-2">
                                <input type="text" class="form-control" name="Telefone" id="Telefone" placeholder="(27)99999-9999" value="<?php echo $Telefone;?>" <?php echo $permissao;?>>
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
