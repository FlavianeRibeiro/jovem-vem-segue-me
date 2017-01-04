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
<div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Jovem vem e segue-me</h3>
                    </div>
                    <div class="panel-body">
                        <form role="form" action="../php/confirmar.php" method="POST">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="E-mail" name="email" type="email" autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="senha" type="password" value="">
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input name="remember" type="checkbox" value="Remember Me">Remember Me
                                    </label>
                                </div>
                                <!-- Change this to a button or input when using this as a form -->
                                <input type="submit" class="btn btn-lg btn-danger btn-block">Login</a>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
