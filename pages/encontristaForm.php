 <?php
    require_once '../php/EncontristaController.php';
    require_once '../php/ComunidadeController.php';
    $encontristaController = new EncontristaController();
    $comunidadeController = new ComunidadeController();
    include '../php/Banco.php'; 
    session_start();
    if(isset($_SESSION["IdEquipe"])){
		$IdEquipe= $_SESSION["IdEquipe"];
	    $xy= $_SESSION["NomeEquipe"];
		$Status= $_SESSION["Status"];
        $Equipe = $_SESSION["Equipe"];
	}
    $encontrista = new Encontrista();
    $Titulo = 'CADASTRAR ENCONTRISTA';
    $action = 'cadastraEncontrista';$Data = date("d/m/Y");
    echo $Data."'teste";
    // pega a variavel GET que passamos no action do form
    if (isset($_GET['acao'])){
    $acao = $_GET['acao'];
    
    // Verifica qual formulario foi submetido
    if($acao == "cadastraEncontrista"){
        //Atribuindo valores ao objeto
        $encontrista->setId($_POST['IdFicha']);               $encontrista->setNome($_POST['Nome']);
        $encontrista->setDataNasc($_POST['DataNasc']);        $encontrista->setIdade($_POST['Idade']);
        $encontrista->setEstadoCivil($_POST['EstadoCivil']);  $encontrista->setTelResid($_POST['TelResid']);
        $encontrista->setCelular($_POST['Celular']);          $encontrista->setOperadora($_POST['Operadora']);
        $encontrista->setWhats($_POST['Whats']);              $encontrista->setFacebook($_POST['Facebook']);
        $encontrista->setEmail($_POST['Email']);              $encontrista->setConvite($_POST['Convite']);
        $encontrista->setParoquia($_POST['Paroquia']);        $encontrista->setComunidade($_POST['Comunidade']);
        $encontrista->setOutro($_POST['Outro']);              $encontrista->setServico($_POST['Servico']);
        $encontrista->setQ_Servico($_POST['Q_Servico']);      $encontrista->setOnibus($_POST['Onibus']);
        $encontrista->setRua($_POST['Rua']);                  $encontrista->setNumero($_POST['Numero']);
        $encontrista->setBairro($_POST['Bairro']);            $encontrista->setCidade($_POST['Cidade']);
        $encontrista->setEstado($_POST['Estado']);            $encontrista->setCep($_POST['Cep']);
        $encontrista->setReferencia($_POST['Referencia']);    $encontrista->setComplemento($_POST['Complemento']);
        $encontrista->setNumApt($_POST['NumApt']);            $encontrista->setNomeApt($_POST['NomeApt']);
        $encontrista->setNomePai($_POST['NomePai']);          $encontrista->setContatoPai($_POST['ContatoPai']);
        $encontrista->setNomeMae($_POST['NomeMae']);          $encontrista->setContatoMae($_POST['ContatoMae']);
        $encontrista->setResponsavel($_POST['Responsavel']);  $encontrista->setContatoResponsavel($_POST['ContatoResponsavel']);
        $encontrista->setProcurar($_POST['Procurar']);        $encontrista->setContatoProcurar($_POST['ContatoProcurar']);
        $encontrista->setRemedio($_POST['Remedio']);          $encontrista->setQ_Remedio($_POST['Q_Remedio']);
        $encontrista->setHorario($_POST['Horario']);          $encontrista->setAlergia($_POST['Alergia']);
        $encontrista->setQ_Alergia($_POST['Q_Alergia']);      $encontrista->setSexo($_POST['Sexo']);
        $encontrista->setComunidade($_POST['Comunidade']);
        
       //se comunidade for igual a 0, selecionou "Outros", o campo 'Outros contem o nome da nova comunidade'
       if($_POST['Comunidade'] == 0){ $x =$_POST['Outro'];
         //vai retornar o maior id cadastrado e somar mais um
        $sql = "(SELECT MAX(`IdComunidade`) FROM `comunidade`)"; $novoId = mysql_query($sql);
        //cadastra a nova cumunidade e retorna o codigo
        $sql2 = "INSERT INTO  `retiro`.`comunidade` (`IdComunidade` ,  `Nome`) VALUES ('.$novoId.', '$x') "; mysql_query($sql2);
       }
       // CADASTRAR HISTORICO
       $idficha = $_POST['IdFicha'];
       $sql0 ="INSERT INTO `Historico`(`Id`, `Nome`, `Descricao`, `Ficha`, `Data`, `Equipe`, `Status`) VALUES ('Null','$xy','Cadastrou a ficha','$idficha','$Data','$Equipe','$Status')";
       mysql_query($sql0);
       
       //chamando a funcao que faz o insert
       $resposta =  $encontristaController->salvar($encontrista);
    }elseif($acao == 'AtualizarCadastro'){
        //Atribuindo valores ao objeto
        $encontrista->setId($_POST['IdFicha']);               $encontrista->setNome($_POST['Nome']);
        $encontrista->setDataNasc($_POST['DataNasc']);        $encontrista->setIdade($_POST['Idade']);
        $encontrista->SetEstadoCivil($_POST['EstadoCivil']);  $encontrista->setTelResid($_POST['TelResid']);
        $encontrista->setCelular($_POST['Celular']);          $encontrista->setOperadora($_POST['Operadora']);
        $encontrista->setWhats($_POST['Whats']);              $encontrista->setFacebook($_POST['Facebook']);
        $encontrista->setEmail($_POST['Email']);              $encontrista->setConvite($_POST['Convite']);
        $encontrista->setParoquia($_POST['Paroquia']);        $encontrista->setComunidade($_POST['Comunidade']);
        $encontrista->setOutro($_POST['Outro']);              $encontrista->setServico($_POST['Servico']);
        $encontrista->setQ_Servico($_POST['Q_Servico']);      $encontrista->setOnibus($_POST['Onibus']);
        $encontrista->setRua($_POST['Rua']);                  $encontrista->setNumero($_POST['Numero']);
        $encontrista->setBairro($_POST['Bairro']);            $encontrista->setCidade($_POST['Cidade']);
        $encontrista->setEstado($_POST['Estado']);            $encontrista->setCep($_POST['Cep']);
        $encontrista->setReferencia($_POST['Referencia']);    $encontrista->setComplemento($_POST['Complemento']);
        $encontrista->setNumApt($_POST['NumApt']);            $encontrista->setNomeApt($_POST['NomeApt']);
        $encontrista->setNomePai($_POST['NomePai']);          $encontrista->setContatoPai($_POST['ContatoPai']);
        $encontrista->setNomeMae($_POST['NomeMae']);          $encontrista->setContatoMae($_POST['ContatoMae']);
        $encontrista->setResponsavel($_POST['Responsavel']);  $encontrista->setContatoResponsavel($_POST['ContatoResponsavel']);
        $encontrista->setProcurar($_POST['Procurar']);        $encontrista->setContatoProcurar($_POST['ContatoProcurar']);
        $encontrista->setRemedio($_POST['Remedio']);          $encontrista->setQ_Remedio($_POST['Q_Remedio']);
        $encontrista->setHorario($_POST['Horario']);          $encontrista->setAlergia($_POST['Alergia']);
        $encontrista->setQ_Alergia($_POST['Q_Alergia']);      $encontrista->setSexo($_POST['Sexo']);
       
       //chamando a funcao que faz o insert
       $resposta =  $encontristaController->atualizar($encontrista);
       
    }else if(($acao == "verFicha") || ($acao == "editarFicha")){
        $IdFicha = $_GET['Id'];
        if($acao == "verFicha"){
            $Titulo = 'VER FICHA';
            $permissao='disabled';
            $resposta =  $encontristaController->obterEncontristaPorIdFicha($IdFicha);
            $myEncontrista = mysql_fetch_array($resposta);
        }else{
            $Titulo = 'EDITAR FICHA';
            $action='AtualizarCadastro';
            $resposta =  $encontristaController->obterEncontristaPorIdFicha($IdFicha);
            $myEncontrista = mysql_fetch_array($resposta); 
            $idficha = $myEncontrista['IdFicha'];  
            $sql0 ="INSERT INTO `Historico`(`Id`, `Nome`, `Descricao`, `Ficha`, `Data`, `Equipe`, `Status`) VALUES ('Null','$xy','Editou a ficha','$idficha','$Data','$Equipe','$Status')";
       mysql_query($sql0);
            
        }
        $IdFicha = $myEncontrista['IdFicha'];            $Nome = $myEncontrista['Nome'];
        $DataNasc = $myEncontrista['DataNasc'];          $Idade = $myEncontrista['Idade'];
        $Sexo = $myEncontrista['Sexo'];                  $EstadoCivil = $myEncontrista['EstadoCivil'];
        $TelResid = $myEncontrista['TelResid'];          $Celular = $myEncontrista['Celular'];
        $Operadora = $myEncontrista['Operadora'];        $Whats = $myEncontrista['Whats'];
        $Facebook = $myEncontrista['Facebook'];          $Email = $myEncontrista['Email'];
        $Convite = $myEncontrista['Convite'];            $Paroquia = $myEncontrista['Paroquia'];
        $Comunidade = $myEncontrista['Comunidade'];      $Outro = $myEncontrista['Outro'];
        $Servico = $myEncontrista['Servico'];            $Q_Servico = $myEncontrista['Q_Servico'];
        $Rua = $myEncontrista['Rua'];                    $Numero = $myEncontrista['Numero'];
        $Bairro = $myEncontrista['Bairro'];              $Cidade = $myEncontrista['Cidade'];
        $Estado = $myEncontrista['Estado'];              $Cep = $myEncontrista['Cep'];
        $Referencia = $myEncontrista['Referencia'];      $Complemento = $myEncontrista['Complemento'];
        $NumApt = $myEncontrista['NumApt'];              $NomeApt = $myEncontrista['NomeApt'];
        $NomePai = $myEncontrista['NomePai'];            $ContatoPai = $myEncontrista['ContatoPai'];
        $NomeMae = $myEncontrista['NomeMae'];            $ContatoMae = $myEncontrista['ContatoMae'];
        $Responsavel = $myEncontrista['Responsavel'];    $ContatoResponsavel = $myEncontrista['ContatoResponsavel'];
        $Procurar = $myEncontrista['Procurar'];          $ContatoProcurar = $myEncontrista['ContatoProcurar'];
        $Remedio = $myEncontrista['Remedio'];            $Q_Remedio = $myEncontrista['Q_Remedio'];
        $Horario = $myEncontrista['Horario'];            $Alergia = $myEncontrista['Alergia'];
        $Q_Alergia = $myEncontrista['Q_Alergia'];        $Comunidade = $myEncontrista['Comunidade'];
        $Onibus = $myEncontrista['Onibus'];
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
     <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Adicionando JQuery -->
    <script src="//code.jquery.com/jquery-3.1.1.min.js"></script>
    <!-- Adicionando Javascript -->
    <script type="text/javascript" >
        $(document).ready(function() {
            function limpa_formulário_cep() {
                // Limpa valores do formulário de cep.
                $("#Rua").val("");
                $("#Bairro").val("");
                $("#Cidade").val("");
                $("#Estado").val("");
            }
            //Quando o campo cep perde o foco.
            $("#Cep").blur(function() {
                //Nova variável "cep" somente com dígitos.
                var Cep = $(this).val().replace(/\D/g, '');
                //Verifica se campo cep possui valor informado.
                if (Cep != "") {
                    //Expressão regular para validar o CEP.
                    var validacep = /^[0-9]{8}$/;
                    //Valida o formato do CEP.
                    if(validacep.test(Cep)) {
                        //Preenche os campos com "..." enquanto consulta webservice.
                        $("#Rua").val("...");$("#Bairro").val("...");$("#Cidade").val("...");$("#Estado").val("...");
                        //Consulta o webservice viacep.com.br/
                        $.getJSON("//viacep.com.br/ws/"+ Cep +"/json/?callback=?", function(dados) {
                            if (!("erro" in dados)) {
                                //Atualiza os campos com os valores da consulta.
                                $("#Rua").val(dados.logradouro);
                                $("#Bairro").val(dados.bairro);
                                $("#Cidade").val(dados.localidade);
                                $("#Estado").val(dados.uf);
                            } //end if.
                            else {//CEP pesquisado não foi encontrado.
                                limpa_formulário_cep(); alert("CEP não encontrado.");
                            }
                        });
                    } //end if.
                    else {//cep é inválido.
                        limpa_formulário_cep(); alert("Formato de CEP inválido.");
                    }
                } //end if.
                else {//cep sem valor, limpa formulário.
                    limpa_formulário_cep();
                }
            });
        });
    </script>
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
            </div>
            <!-- COMEÇO DO FORMULARIO DE CADASTRO  -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default"> 
                        <div class="panel-heading">
                            DADOS PESSOAIS
                        </div>
                        <div class="panel-body">
                            <form action="<?php $SELF_PHP;?>?acao=<?php echo $action;?>" method="POST">
                                <div class="form-group row">
                                    <label for="IdFicha" class="col-sm-1 col-form-label" name="IdFicha"><font color="red">*</font> Nº ficha:</label>
                                    <div class="col-sm-1">
                                        <input type="text" class="form-control" name="IdFicha" id="IdFicha" value="<?php echo $IdFicha;?>" <?php echo $permissao;?>>
                                    </div>
                                    <label for="Nome" class="col-sm-1 col-form-label" name="Nome"><font color="red">*</font>Nome:</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" name="Nome" id="Nome"  value="<?php echo $Nome;?>" <?php echo $permissao;?>>
                                        </div>
                                </div>
                                <div class="form-group row">
                                    <label for="DataNasc" class="col-sm-2 col-form-label" name="DataNasc">Data Nascimento:</label>
                                    <div class="col-sm-3">
                                        <input type="Date" class="form-control" name="DataNasc" id="DataNasc" value="<?php echo $DataNasc;?>" <?php echo $permissao;?>>
                                    </div>
                                    <label for="Idade" class="col-sm-1 col-form-label" name="Idade"><font color="red">*</font>Idade:</label>
                                    <div class="col-sm-1">
                                        <input type="text" class="form-control" name="Idade" id="Idade" value="<?php echo $Idade;?>" <?php echo $permissao;?>>
                                    </div>
                                    <label for="Sexo" class="col-sm-1 col-form-label" name="Sexo">Sexo:</label>
                                    <div class="col-xs-2">
                                        <select name="Sexo" class="form-control"  <?php echo $permissao;?>>
                                            <option> </option>
                                            <option name="Sexo" id="Sexo" value="Feminino" <?php if($Sexo == 'Feminino') echo"selected";?>>Feminino</option>
                                            <option name="Sexo" id="Sexo" value="Masculino" <?php if($Sexo == 'Masculino') echo"selected";?>>Masculino</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="EstadoCivil" class="col-xs-1 col-form-label" name="EstadoCivil">Estado Civil:</label>
                                    <div class="col-sm-2">
                                        <select name="EstadoCivil" class="form-control"  <?php echo $permissao;?>>
                                            <option> </option>
                                            <option name="EstadoCivil"  value="Solteiro" <?php if($EstadoCivil == 'Solteiro') echo"selected";?>>Solteiro</option>
                                            <option name="EstadoCivil"  value="Namorando" <?php if($EstadoCivil == 'Namorando') echo"selected";?>>Namorando</option>
                                            <option name="EstadoCivil"  value="Casado" <?php if($EstadoCivil == 'Casado') echo"selected";?>>Casado</option>
                                        </select>
                                    </div>
                                    <label for="TelResid" class="col-xs-1 col-form-label" name="TelResid">Tel. Resid.:</label>
                                        <div class="col-sm-2" name="TelResid" <?php echo $permissao;?>>
                                            <input type="text" class="form-control" name="TelResid" id="TelResid" placeholder="(DDD) 3333-3333" value="<?php echo $TelResid;?>" <?php echo $permissao;?>>
                                        </div>
                                    <label for="Celular" class="col-xs-1 col-form-label" name="Celular">Celular.:</label>
                                        <div class="col-sm-2" name="Celular" <?php echo $permissao;?>>
                                            <input type="text" class="form-control" name="Celular" id="Celular" placeholder="(DDD) 99999-9999" value="<?php echo $Celular;?>" <?php echo $permissao;?>>
                                        </div>
                                </div>
                                <div class="form-group row">
                                    <label for="Operadora" class="col-xs-1 col-form-label" name="Operadora">Operadora:</label>
                                    <div class="col-sm-2">
                                        <select name="Operadora" class="form-control"  <?php echo $permissao;?>>
                                            <option> </option>
                                            <option name="Operadora" value="VIVO" <?php if($Operadora == 'VIVO') echo"selected";?>>VIVO</option>
                                            <option name="Operadora" value="TIM"<?php if($Operadora == 'TIM') echo"selected";?>>TIM</option>
                                            <option name="Operadora" value="CLARO" <?php if($Operadora == 'CLARO') echo"selected";?>>CLARO</option>
                                            <option name="Operadora" value="OI" <?php if($Operadora == 'OI') echo"selected";?>>OI</option>
                                        </select>
                                    </div>
                                    <label for="Whats" class="col-xs-1 col-form-label" name="Whats">Possui WhatsApp:</label>
                                    <div class="col-sm-2">
                                        <select name="Whats" class="form-control"  <?php echo $permissao;?>>
                                            <option></option>
                                            <option name="Whats" id="Whats" value="SIM" <?php if($Whats == 'SIM') echo"selected";?>>Sim</option>
                                            <option name="Whats" id="Whats" value="NÃO" <?php if($Whats == 'NÂO') echo"selected";?>>Não</option>
                                        </select>
                                    </div>
                                    <label for="Facebook" class="col-sm-1 col-form-label" name="Facebook">Facebook:</label>
                                        <div class="col-sm-3">
                                            <input type="text" class="form-control" name="Facebook" id="Facebook"  value="<?php echo $Facebook;?>" <?php echo $permissao;?>>
                                        </div>
                                </div>
                                
                                <div class="form-group row">
                                    <label for="Email" class="col-sm-1 col-form-label" name="Email">Email:</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" name="Email" id="Email"  value="<?php echo $Email;?>" <?php echo $permissao;?>>
                                        </div>
                                    <label for="Convite" class="col-sm-2 col-form-label" name="Convite">Responsável pelo convite:</label>
                                        <div class="col-sm-3">
                                            <input type="text" class="form-control" name="Convite" id="Convite" placeholder="Pessoa responsável pelo convite" value="<?php echo $Convite;?>" <?php echo $permissao;?>>
                                        </div>
                                </div>
                                <div class="form-group row">
                                    <label for="Paroquia" class="col-sm-2 col-form-label" name="Paroquia">Qual Paróquia você participa?</label>
                                        <div class="col-sm-5">
                                            <input type="text" class="form-control" name="Paroquia" id="Paroquia" value="<?php echo $Paroquia;?>" <?php echo $permissao;?>>
                                        </div>
                                </div>
                                <div class="form-group row">
                                 <?php $listComunidade = $comunidadeController->listarTodas();?>
                                    <label for="Comunidade" class="col-sm-2 col-form-label" name="Comunidade"><font color="red">*</font>Qual comnunidade você participa ?:</label>
                                        <div class="col-sm-2">
                                            <select name="Comunidade" class="form-control" <?php echo $permissao;?>  onchange="this.value=='0' ? Outro.disabled=false : Outro.disabled=true;">
                                                <option ></option>
                                                <?php while($myComunidade = mysql_fetch_array($listComunidade)){
                                                    ($Comunidade == $myComunidade['IdComunidade']) ? $selected = "selected" : $selected = "";
                                                    echo "<option name='Comunidade' value='".$myComunidade['IdComunidade']."'".$selected.">".$myComunidade['Nome']."</option>";
                                                 }
                                                 ?>
                                                <option name="Comunidade" value="0">Outros</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-5">
                                            <input type="text" class="form-control" name="Outro" id="Outro" placeholder="Outras comunidades"value="<?php echo $Outro;?>" <?php echo $permissao;?>>
                                        </div>
                                </div>
                                
                                <div class="form-group row">
                                    <label for="Servico" class="col-sm-3 col-form-label" name="Servico">Participa de serviço(s) dentro da igreja?</label>
                                        <div class="col-sm-2">
                                            <select name="Servico" class="form-control" <?php echo $permissao;?>  onchange="this.value=='Sim'? Q_Servico.disabled=false : Q_Servico.disabled=true;">
                                                 <option></option>
                                                <option name="Servico"<?php if($Servico == 'Sim') echo"selected";?> value="Sim">Sim</option>
                                                <option name="Servico"<?php if($Servico == 'Nao') echo"selected";?>  value="Nao">Não</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-5">
                                            <input type="text" class="form-control" name="Q_Servico"  placeholder="Serviços realizados"value="<?php echo $Q_Servico;?>" <?php echo $permissao;?>>
                                        </div>
                                </div>
                                <div class="form-group row">
                                    <label for="Onibus" class="col-sm-1 col-form-label" name="Onibus"><font color="red"><b>*</b></font>Irá de ônibus?</label>
                                    <div class="col-sm-2">
                                            <input type="radio" name="Onibus" id="Onibus" value="1" <?php echo $permissao; if($Onibus == 1) echo "checked";?>>Sim
                                            <input type="radio" name="Onibus" id="Onibus" value="0" <?php echo $permissao; if($Onibus == 0) echo "checked";?>>Não
                                    </div>
                                </div>
                        </div><!-- FIM DADOS PESSOAIS-->
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            ENDEREÇO
                        </div>
                        <div class="panel-body">
                            <div class="form-group row">
                                <label for="Rua" class="col-sm-1 col-form-label" name="Rua">Rua:</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" placeholder="Rua/Avenida" name="Rua" id="Rua"  value="<?php echo $Rua;?>" <?php echo $permissao;?>>
                                    </div>
                            </div>
                            <div class="form-group row">
                                <label for="Numero" class="col-sm-1 col-form-label" name="Numero">Número:</label>
                                    <div class="col-sm-1">
                                        <input type="text" class="form-control" name="Numero" id="Numero"  value="<?php echo $Numero;?>" <?php echo $permissao;?>>
                                    </div>
                                <label for="Bairro" class="col-sm-1 col-form-label" name="Bairro">Bairro:</label>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control" name="Bairro" id="Bairro"  value="<?php echo $Bairro;?>" <?php echo $permissao;?>>
                                    </div>
                                <label for="Cidade" class="col-sm-1 col-form-label" name="Cidade">Cidade:</label>
                                    <div class="col-sm-2">
                                        <input type="text" class="form-control" name="Cidade" id="Cidade"  value="<?php echo $Cidade;?>" <?php echo $permissao;?>>
                                    </div>
                                <label for="Estado" class="col-sm-1 col-form-label" name="Estado">Estado:</label>
                                    <div class="col-sm-1">
                                        <input type="text" class="form-control" name="Estado" id="Estado"  value="<?php echo $Estado;?>" <?php echo $permissao;?>>
                                    </div>
                            </div>
                            <div class="form-group row">
                                <label for="Cep" class="col-sm-1 col-form-label" name="Cep">Cep:</label>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control" name="Cep" id="Cep"  value="<?php echo $Cep;?>" <?php echo $permissao;?>>
                                    </div>
                                <label for="Referencia" class="col-sm-2 col-form-label" name="Referencia">Ponto de referência:</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" name="Referencia" id="Referencia"  value="<?php echo $Referencia;?>" <?php echo $permissao;?>>
                                    </div>
                            </div>
                            <div class="form-group row">
                                <label for="Complemento" class="col-sm-2 col-form-label" name="Complemento">Complemento:</label>
                                <div class="col-sm-2">
                                        <select name="Complemento" class="form-control"  <?php echo $permissao;?>>
                                             <option></option>
                                            <option name="Complemento" id="Complemento" value="Casa" <?php if($Complemento == 'Casa') echo"selected";?>>Casa</option>
                                            <option name="Complemento" id="Complemento" value="Apartamento" <?php if($Complemento == 'Apartamento') echo"selected";?>>Apartamento</option>
                                        </select>
                                    </div>
                                    <label for="NumApt" class="col-sm-1 col-form-label" name="NumApt">Nº Apart.:</label>
                                        <div class="col-sm-1">
                                            <input type="text" class="form-control" name="NumApt" id="NumApt" value="<?php echo $NumApt;?>" <?php echo $permissao;?>>
                                        </div>
                                    <label for="NomeApt" class="col-sm-2 col-form-label" id="NomeAp">Nome do prédio:</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" name="NomeApt" id="NomeApt" value="<?php echo $NomeApt;?>" <?php echo $permissao;?>>
                                        </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            FILIAÇÃO
                        </div>
                        <div class="panel-body">
                            <div class="form-group row">
                                <label for="NomePai" class="col-sm-1 col-form-label" name="NomePai">Nome do Pai:</label>
									<div class="col-sm-5">
										<input type="text" class="form-control" name="NomePai" id="NomePai" value="<?php echo $NomePai;?>" <?php echo $permissao;?>>
									</div>
								<label for="ContatoPai" class="col-sm-1 col-form-label" name="ContatoPai">Contato:</label>
									<div class="col-sm-2">
										<input type="text" class="form-control" name="ContatoPai" id="ContatoPai" value="<?php echo $ContatoPai;?>" <?php echo $permissao;?>>
									</div>
                            </div>
                            <div class="form-group row">
								<label for="NomeMae" class="col-sm-1 col-form-label" name="NomeMae">Nome da Mãe:</label>
									<div class="col-sm-5">
										<input type="text" class="form-control" name="NomeMae" id="NomeMae" value="<?php echo $NomeMae;?>" <?php echo $permissao;?>>
									</div>
								<label for="ContatoMae" class="col-sm-1 col-form-label" name="ContatoMae">Contato:</label>
									<div class="col-sm-2">
										<input type="text" class="form-control" name="ContatoMae" id="ContatoMae" value="<?php echo $ContatoMae;?>" <?php echo $permissao;?>>
									</div>
                            </div>
                            <div class="form-group row">
								<label for="Responsavel" class="col-sm-2 col-form-label" name="Responsavel">Nome do Responsavel:</label>
									<div class="col-sm-5">
										<input type="text" class="form-control" name="Responsavel" id="Responsavel" value="<?php echo $Responsavel;?>" <?php echo $permissao;?>>
									</div>
								<label for="ContatoResponsavel" class="col-sm-1 col-form-label" name="ContatoResponsavel">Contato:</label>
									<div class="col-sm-2">
										<input type="text" class="form-control" name="ContatoResponsavel"  value="<?php echo $ContatoResponsavel;?>" <?php echo $permissao;?>>
									</div>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            DADOS COMPLEMENTARES
                        </div>
                        <div class="panel-body">
                            <div class="form-group row">
                                <label for="Procurar" class="col-sm-3 col-form-label" name="Procurar">Em caso de emergência, procurar:</label>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control" name="Procurar" id="Procurar" value="<?php echo $Procurar;?>" <?php echo $permissao;?>>
                                    </div>
                                <label for="ContatoProcurar" class="col-sm-1 col-form-label" name="ContatoProcurar">Contato:</label>
                                    <div class="col-sm-2">
                                        <input type="text" class="form-control" name="ContatoProcurar" id="ContatoProcurar"  value="<?php echo $ContatoProcurar;?>" <?php echo $permissao;?>>
                                    </div>
                            </div>
                            <div class="form-group row">
                            <label for="Remedio" class="col-sm-2 col-form-label" name="Remedio">Toma algum medicamento?</label>
                                <div class="col-sm-2">
                                    <select name="Remedio" class="form-control" <?php echo $permissao;?>  onchange="this.value=='Sim'? Q_Remedio.disabled=false : Q_Remedio.disabled=true; this.value=='Sim'? Horario.disabled=false : Horario.disabled=true;">
                                        <option></option>
                                        <option name="Remedio" value="Sim" <?php if($Remedio == 'Sim')  echo"selected";?>>Sim</option>
                                        <option name="Remedio" value="Nao" <?php if($Remedio == 'Nao')  echo"selected";?>>Não</option>
                                    </select>
                                </div>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" name="Q_Remedio" placeholder="Qual(is) medicamento(s)"value="<?php echo $Q_Remedio;?>" <?php echo $permissao;?>>
                                </div>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" name="Horario" id="Horario" placeholder="Horários(De manhã / De Tarde / De Noite)" value="<?php echo $Horario;?>" <?php echo $permissao;?>>
                                </div>
                            </div>
                            <div class="form-group row">
                            <label for="Alergia" class="col-sm-2 col-form-label" name="Alergia">Possui alguma alergia ?</label>
                                <div class="col-sm-2">
                                    <select name="Alergia" class="form-control" <?php echo $permissao;?>  onchange="this.value=='Sim' ? Q_Alergia.disabled=false : Q_Alergia.disabled=true;">
                                        <option></option>
                                        <option name="Alergia" value="Sim" <?php if($Alergia == 'Sim')  echo"selected";?>>Sim</option>
                                        <option name="Alergia" value="Nao"  <?php if($Alergia == 'Nao')  echo"selected";?>>Não</option>
                                    </select>
                                </div>
                                 <div class="col-sm-4">
                                    <input type="text" class="form-control" name="Q_Alergia" id="Q_Alergia"placeholder="Quail(s) medicamento(s)" value="<?php echo $Q_Alergia;?>" <?php echo $permissao;?>>
                                </div>
                        </div>
                        </div>
                    </div>
                    <?php if(!isset($permissao)) echo "<button type='submit' class='btn btn-danger'>Cadastrar</button>";?>
                                <button type="button" class="btn btn-primary" id="cancelar" onclick="location.href='index.php';">Voltar</button>
								<br>
                            </form> 
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

</body>

</html>
