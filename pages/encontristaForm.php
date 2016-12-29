 <?php
    require_once '../php/EncontristaController.php';
    require_once '../php/ComunidadeController.php';
    $encontristaController = new EncontristaController();
    $comunidadeController = new ComunidadeController();
    
    $encontrista = new Encontrista();
    $Titulo = 'CADASTRAR ENCONTRISTA';
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
            $Titulo = 'VER FICHA';
            $permissao='disabled';
            $resposta =  $encontristaController->obterEncontristaPorIdFicha($IdFicha);
            $myEncontrista = mysql_fetch_array($resposta);
           
        }else{
            $Titulo = 'EDITAR FICHA';
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
                        $("#Rua").val("...");
                        $("#Bairro").val("...");
                        $("#Cidade").val("...");
                        $("#Estado").val("...");
                        //Consulta o webservice viacep.com.br/
                        $.getJSON("//viacep.com.br/ws/"+ Cep +"/json/?callback=?", function(dados) {
                            if (!("erro" in dados)) {
                                //Atualiza os campos com os valores da consulta.
                                $("#Rua").val(dados.logradouro);
                                $("#Bairro").val(dados.bairro);
                                $("#Cidade").val(dados.localidade);
                                $("#Estado").val(dados.uf);
                            } //end if.
                            else {
                                //CEP pesquisado não foi encontrado.
                                limpa_formulário_cep();
                                alert("CEP não encontrado.");
                            }
                        });
                    } //end if.
                    else {
                        //cep é inválido.
                        limpa_formulário_cep();
                        alert("Formato de CEP inválido.");
                    }
                } //end if.
                else {
                    //cep sem valor, limpa formulário.
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
                                        <input type="text" class="form-control" name="IdFicha" value="<?php echo $IdFicha;?>" <?php echo $permissao;?>>
                                    </div>
                                    <label for="Nome" class="col-sm-1 col-form-label" name="Nome"><font color="red">*</font>Nome:</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" name="Nome"  value="<?php echo $Nome;?>" <?php echo $permissao;?>>
                                        </div>
                                </div>
                        
                                <div class="form-group row">
                                    <label for="DataNasc" class="col-xs-2 col-form-label" name="DataNasc">Data Nascimento:</label>
                                    <div class="col-sm-2">
                                        <input type="Date" class="form-control" name="DataNasc"  value="<?php echo $DataNasc;?>" <?php echo $permissao;?>>
                                    </div>
                                    <label for="Idade" class="col-sm-1 col-form-label" name="Idade"><font color="red">*</font>Idade:</label>
                                    <div class="col-sm-1">
                                        <input type="text" class="form-control" name="Idade"  value="<?php echo $Idade;?>" <?php echo $permissao;?>>
                                    </div>
                                    <label for="Sexo" class="col-xs-1 col-form-label" name="Sexo">Sexo:</label>
                                    <div class="col-xs-2">
                                        <select name="Sexo" class="form-control"  <?php echo $permissao;?>>
                                            <option> </option>
                                            <option name="Sexo" value="Feminino" <?php if($Sexo == 'Feminino') echo"selected";?>>Feminino</option>
                                            <option name="Sexo" value="Masculino" <?php if($Sexo == 'Masculino') echo"selected";?>>Masculino</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="EstadoCivil" class="col-xs-1 col-form-label" name="EstadoCivil">Estado Civil:</label>
                                    <div class="col-sm-2">
                                        <select name="EstadoCivil" class="form-control"  <?php echo $permissao;?>>
                                            <option> </option>
                                            <option name="EstadoCivil" value="Solteiro" <?php if($EstadoCivil == 'Solteiro') echo"selected";?>>Solteiro</option>
                                            <option name="EstadoCivil" value="Namorando" <?php if($EstadoCivil == 'Namorando') echo"selected";?>>Namorando</option>
                                            <option name="EstadoCivil" value="Casado" <?php if($EstadoCivil == 'Casado') echo"selected";?>>Casado</option>
                                        </select>
                                    </div>
                                    <label for="TelResid" class="col-xs-1 col-form-label" name="TelResid">Tel. Resid.:</label>
                                        <div class="col-sm-2" name="TelResid" <?php echo $permissao;?>>
                                            <input type="text" class="form-control" name="TelResid"  placeholder="(DDD) 3333-3333" value="<?php echo $TelResid;?>" <?php echo $permissao;?>>
                                        </div>
                                    <label for="Celular" class="col-xs-1 col-form-label" name="Celular">Celular.:</label>
                                        <div class="col-sm-2" name="Celular" <?php echo $permissao;?>>
                                            <input type="text" class="form-control" name="Celular"  placeholder="(DDD) 99999-9999" value="<?php echo $Celular;?>" <?php echo $permissao;?>>
                                        </div>
                                </div>
                                <div class="form-group row">
                                    <label for="Operadora" class="col-xs-1 col-form-label" name="Operadora">Operadora:</label>
                                    <div class="col-sm-2">
                                        <select name="Operadora" class="form-control"  <?php echo $permissao;?>>
                                            <option> </option>
                                            <option name="Operadora" value="Solteiro" <?php if($Operadora == 'VIVO') echo"selected";?>>VIVO</option>
                                            <option name="Operadora" value="Namorando"<?php if($Operadora == 'TIM') echo"selected";?>>TIM</option>
                                            <option name="Operadora" value="Casado" <?php if($Operadora == 'CLARO') echo"selected";?>>CLARO</option>
                                            <option name="Operadora" value="Casado" <?php if($Operadora == 'OI') echo"selected";?>>OI</option>
                                        </select>
                                    </div>
                                    <label for="Whats" class="col-xs-1 col-form-label" name="Whats">Possui WhatsApp:</label>
                                    <div class="col-sm-2">
                                        <select name="Sexo" class="form-control"  <?php echo $permissao;?>>
                                            <option></option>
                                            <option name="Whats" value="1" <?php if($Whats == '1') echo"selected";?>>Sim</option>
                                            <option name="Whats" value="0" <?php if($Whats == '0') echo"selected";?>>Não</option>
                                        </select>
                                    </div>
                                    <label for="Facebook" class="col-sm-1 col-form-label" name="Facebook">Facebook:</label>
                                        <div class="col-sm-3">
                                            <input type="text" class="form-control" name="Facebook"  value="<?php echo $Facebook;?>" <?php echo $permissao;?>>
                                        </div>
                                </div>
                                
                                <div class="form-group row">
                                    <label for="Email" class="col-sm-1 col-form-label" name="Email">Email:</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" name="Email"  value="<?php echo $Email;?>" <?php echo $permissao;?>>
                                        </div>
                                    <label for="Convite" class="col-sm-2 col-form-label" name="Convite">Responsável pelo convite:</label>
                                        <div class="col-sm-3">
                                            <input type="text" class="form-control" name="Convite" placeholder="Pessoa responsável pelo convite" value="<?php echo $Convite;?>" <?php echo $permissao;?>>
                                        </div>
                                </div>
                                
                                <div class="form-group row">
                                    <label for="Paroquia" class="col-sm-2 col-form-label" name="Paroquia">Qual Paróquia você participa?</label>
                                        <div class="col-sm-5">
                                            <input type="text" class="form-control" name="Paroquia"  value="<?php echo $Paroquia;?>" <?php echo $permissao;?>>
                                        </div>
                                </div>
                                <div class="form-group row">
                                 <?php $listComunidade = $comunidadeController->listarTodas();?>
                                    <label for="Comunidade" class="col-sm-2 col-form-label" name="Comunidade"><font color="red">*</font>Qual comnunidade você participa ?:</label>
                                        <div class="col-sm-2">
                                            <select name="Comunidade" class="form-control" <?php echo $permissao;?>  onchange="this.value=='x' ? Outro.disabled=false : Outro.disabled=true;">
                                                <option ></option>
                                                <?php while($myComunidade = mysql_fetch_array($listComunidade)){
                                                        
                                                    ($Comunidade == $myComunidade['IdComunidade']) ? $selected = "selected" : $selected = "";
                                                    echo "<option name='Comunidade' value='".$myComunidade['IdComunidade']."'".$selected.">".$myComunidade['Nome']."</option>";
                                                 }
                                                 ?>
                                                <option name="Comunidade" value="x">Outros</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-5">
                                            <input type="text" class="form-control" name="Outro"  placeholder="Outras comunidades"value="<?php echo $Outro;?>" <?php echo $permissao;?>>
                                        </div>
                                </div>
                                
                                <div class="form-group row">
                                    <label for="Servico" class="col-sm-3 col-form-label" name="Servico">Participa de serviço(s) dentro da igreja?</label>
                                        <div class="col-sm-2">
                                            <select name="Servico" class="form-control" <?php echo $permissao;?>  onchange="this.value=='Sim'? Q_Servico.disabled=false : Q_Servico.disabled=true;">
                                                 <option></option>
                                                <option name="Servico" <?php if($Servico == '1') echo"selected";?> value="1">Sim</option>
                                                <option name="Servico"<?php if($Servico == '0') echo"selected";?>  value="0">Não</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-5">
                                            <input type="text" class="form-control" name="Q_Servico"  placeholder="Serviços realizados"value="<?php echo $Q_Servico;?>" <?php echo $permissao;?>>
                                        </div>
                                </div>
                                <div class="form-group row">
                                    <label for="Onibus" class="col-xs-1 col-form-label" name="Onibus"><font color="red"><b>*</b></font>Irá de ônibus?</label>
                                    <div class="col-sm-2">
                                            <input type="radio" name="Onibus" value="1" <?php echo $permissao; if($Onibus == 1) echo "checked";?>>Sim
                                            <input type="radio" name="Onibus" value="0" <?php echo $permissao; if($Onibus == 0) echo "checked";?>>Não
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
                                        <input type="text" class="form-control" name="Referencia"  value="<?php echo $Referencia;?>" <?php echo $permissao;?>>
                                    </div>
                            </div>
                            <div class="form-group row">
                                <label for="Complemento" class="col-sm-2 col-form-label" name="Complemento">Complemento:</label>
                                <div class="col-sm-2">
                                        <select name="Complemento" class="form-control"  <?php echo $permissao;?>>
                                             <option></option>
                                            <option name="Complemento" value="Casa" <?php if($Complemento == 'Casa') echo"selected";?>>Casa</option>
                                            <option name="Complemento" value="Apartamento" <?php if($Complemento == 'Apartamento') echo"selected";?>>Apartamento</option>
                                        </select>
                                    </div>
                                    <label for="NumApt" class="col-sm-1 col-form-label" name="NumApt">Nº Apart.:</label>
                                        <div class="col-sm-1">
                                            <input type="text" class="form-control" name="NumApt"  value="<?php echo $NumApt;?>" <?php echo $permissao;?>>
                                        </div>
                                    <label for="NomeAp" class="col-sm-2 col-form-label" name="NomeAp">Nome do prédio:</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" name="NomeAp"  value="<?php echo $NomeAp;?>" <?php echo $permissao;?>>
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
                                            <input type="text" class="form-control" name="NomePai"  value="<?php echo $NomePai;?>" <?php echo $permissao;?>>
                                        </div>
                                    <label for="ContatoPai" class="col-sm-1 col-form-label" name="ContatoPai">Contato:</label>
                                        <div class="col-sm-2">
                                            <input type="text" class="form-control" name="ContatoPai"  value="<?php echo $ContatoPai;?>" <?php echo $permissao;?>>
                                        </div>
                            </div>
                            <div class="form-group row">
                                    <label for="NomeMae" class="col-sm-1 col-form-label" name="NomeMae">Nome da Mãe:</label>
                                        <div class="col-sm-5">
                                            <input type="text" class="form-control" name="NomeMae"  value="<?php echo $NomeMae;?>" <?php echo $permissao;?>>
                                        </div>
                                    <label for="ContatoMae" class="col-sm-1 col-form-label" name="ContatoMae">Contato:</label>
                                        <div class="col-sm-2">
                                            <input type="text" class="form-control" name="ContatoMae"  value="<?php echo $ContatoMae;?>" <?php echo $permissao;?>>
                                        </div>
                            </div>
                            <div class="form-group row">
                                    <label for="Responsavel" class="col-sm-1 col-form-label" name="Responsavel">Nome do Respesponsavel:</label>
                                        <div class="col-sm-5">
                                            <input type="text" class="form-control" name="Responsavel"  value="<?php echo $Responsavel;?>" <?php echo $permissao;?>>
                                        </div>
                                    <label for="ContatoResposavel" class="col-sm-1 col-form-label" name="ContatoResposavel">Contato:</label>
                                        <div class="col-sm-2">
                                            <input type="text" class="form-control" name="ContatoResposavel"  value="<?php echo $ContatoResposavel;?>" <?php echo $permissao;?>>
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
                                        <input type="text" class="form-control" name="Procurar"  value="<?php echo $Procurar;?>" <?php echo $permissao;?>>
                                    </div>
                                <label for="ContatoProcurar" class="col-sm-1 col-form-label" name="ContatoProcurar">Contato:</label>
                                    <div class="col-sm-2">
                                        <input type="text" class="form-control" name="ContatoProcurar"  value="<?php echo $ContatoProcurar;?>" <?php echo $permissao;?>>
                                    </div>
                            </div>
                            <div class="form-group row">
                            <label for="Medicamento" class="col-sm-2 col-form-label" name="Medicamento">Toma algum medicamento?</label>
                                <div class="col-sm-2">
                                    <select name="Medicamento" class="form-control" <?php echo $permissao;?>  onchange="this.value=='Sim'? Q_Remedio.disabled=false : Q_Remedio.disabled=true; this.value=='Sim'? Horario.disabled=false : Horario.disabled=true;">
                                        <option></option>
                                        <option name="Medicamento"  value="Sim" <?php if($Medicamento == 'Sim')  echo"selected";?>>Sim</option>
                                        <option name="Medicamento"  value="Nao" <?php if($Medicamento == 'Nao')  echo"selected";?>>Não</option>
                                    </select>
                                </div>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" name="Q_Remedio" placeholder="Qual(is) medicamento(s)"value="<?php echo $Q_Remedio;?>" <?php echo $permissao;?>>
                                </div>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" name="Horario" placeholder="Horários(De manhã / De Tarde / De Noite)"value="<?php echo $Horario;?>" <?php echo $permissao;?>>
                                </div>
                            </div>
                            <div class="form-group row">
                            <label for="Alergia" class="col-sm-2 col-form-label" name="Alergia">Possui alguma alergia ?</label>
                                <div class="col-sm-2">
                                    <select name="Alergia" class="form-control" <?php echo $permissao;?>  onchange="this.value=='Sim' ? Q_Alergia.disabled=false : Q_Alergia.disabled=true;">
                                        <option></option>
                                        <option name="Alergia" <?php if($Alergia == 'Sim')  echo"selected";?>value="Sim">Sim</option>
                                        <option name="Alergia" <?php if($Alergia == 'Nao')  echo"selected";?> value="Nao">Não</option>
                                    </select>
                                </div>
                                 <div class="col-sm-4">
                                    <input type="text" class="form-control" name="Q_Alergia" placeholder="Quail(s) medicamento(s)"value="<?php echo $Q_Alergia;?>" <?php echo $permissao;?>>
                                </div>
                        </div>
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

</body>

</html>
