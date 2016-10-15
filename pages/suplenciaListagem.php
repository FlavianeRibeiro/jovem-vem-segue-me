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
                    <h1 class="page-header">Suplencia</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <!-- COMEÇO DO FORMULARIO DE CADASTRO  -->
            <div class="row">
                <div class="container">
                    <form action="../php/encontrista.php" method="POST">
                        <div class="form-group row">
                          <label for="Nome" class="col-sm-1 col-form-label">Nome:</label>
                          <div class="col-md-4">
                            <input type="text" class="form-control" name="Nome">
                          </div>
                          <label for="Nome" class="col-sm-1 col-form-label">Equipe:</label>
                          <div class="col-xs-2">
                            <select name="Equipe" class="form-control">
                                    <option> </option>
                                    <option name="Equipe" value="">Bem Estar</option>
                                    <option name="Equipe" value="">CG</option>
                                    <option name="Equipe" value="">Comunicação</option>
                                    <option name="Equipe" value="">Copa</option>
                                    <option name="Equipe" value="">Casal Apoio</option>
                                    <option name="Equipe" value="">Copa</option>
                                    <option name="Equipe" value="">Cozinha</option>
                                    <option name="Equipe" value="">Decoração</option>
                                    <option name="Equipe" value="">Intercessão e Liturgia</option>
                                    <option name="Equipe" value="">Logistica</option>
                                    <option name="Equipe" value="">Música</option>
                                    <option name="Equipe" value="">Ordem e Vigilância</option>
                                    <option name="Equipe" value="">Sala</option>
                                    <option name="Equipe" value="">Secretaria</option>
                                    
                                </select>
                          </div>
                        </div>
                
                        <div class="form-group row">
                            <label for="Nome" class="col-sm-1 col-form-label">Email:</label>
                          <div class="col-md-4">
                            <input type="text" class="form-control" name="Email">
                          </div>
                           <label for="Nome" class="col-sm-1 col-form-label">Telefone:</label>
                          <div class="col-xs-2">
                            <input type="text" class="form-control" name="Telefone">
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
</body>

</html>
