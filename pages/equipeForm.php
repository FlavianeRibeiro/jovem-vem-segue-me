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
                include './template/styles.html';
            ?>
        </nav>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Cadastrar equipe</h1>
                </div><!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <!-- COMEÇO DO FORMULARIO DE CADASTRO  -->
            <div class="row">
                <div class="container">
                    <form action="../php/cad_equipe.php" method="POST">
                        <div class="form-group row">
                            <label for="Nome" class="col-sm-1 col-form-label">Nome:</label>
                                <div class="col-md-5">
                                    <input type="text" class="form-control" name="Nome" placeholder="Nome Completo">
                                </div>
                            <label for="Sexo" class="col-xs-1 col-form-label" name="Sexo">Sexo:</label>
                                <div class="col-xs-2">
                                    <select name="Sexo" class="form-control">
                                        <option></option>
                                        <option name="Sexo" value="Feminino">Feminino</option>
                                        <option name="Sexo" value="Masculino">Masculino</option>
                                    </select>
                                </div>
                        </div>
                        <div class="form-group row">
                            <label for="Fixo" class="col-xs-1 col-form-label" >Fixo:</label>
                                <div class="col-sm-2">
                                    <input type="text" class="form-control" name="Fixo" placeholder="(27)3333-3333">
                                </div>
                            <label for="Celular" class="col-xs-1 col-form-label" >Celular:</label>
                                <div class="col-sm-2">
                                    <input type="text" class="form-control" name="Celular" placeholder="(27) 99999-9999">
                                </div>
                            <label for="Operadora" class="col-xs-1 col-form-label" >Operadora:</label>
                                <div class="col-sm-2">
                                    <select name="Operadora" class="form-control">
                                        <option></option>
                                        <option name="Operadora" value="VIVO">VIVO</option>
                                        <option name="Operadora" value="TIM">TIM</option>
                                        <option name="Operadora" value="OI">OI</option>
                                    </select>
                                </div>
                        </div>
                        <div class="form-group row">
                            <label for="Email" class="col-sm-1 col-form-label">Email:</label>
                                <div class="col-md-4">
                                    <input type="text" class="form-control" name="Email" placeholder="exemplo@retiro.com">
                                </div>
                            <label for="Senha" class="col-sm-1 col-form-label">Senha:</label>
                                <div class="col-sm-2">
                            <input type="text" class="form-control" name="Senha" placeholder="Senha">
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
                            
                            <label for="Equipe" class="col-sm-1 col-form-label">Equipe:</label>
                          <div class="col-xs-2">
                            <select name="Equipe" class="form-control">
                                    <option> </option>
                                    <option name="Equipe" value="Bem Estar">Bem Estar</option>
                                    <option name="Equipe" value="CG">CG</option>
                                    <option name="Equipe" value="Comunicação">Comunicação</option>
                                    <option name="Equipe" value="Copa">Copa</option>
                                    <option name="Equipe" value="Casal Apoio">Casal Apoio</option>
                                    <option name="Equipe" value="Cozinha">Cozinha</option>
                                    <option name="Equipe" value="Decoração">Decoração</option>
                                    <option name="Equipe" value="Intercessão e Liturgia">Intercessão e Liturgia</option>
                                    <option name="Equipe" value="Logistica">Logistica</option>
                                    <option name="Equipe" value="Música">Música</option>
                                    <option name="Equipe" value="Ordem e Vigilância">Ordem e Vigilância</option>
                                    <option name="Equipe" value="Sala">Sala</option>
                                    <option name="Equipe" value="Secretaria">Secretaria</option>
                                    
                                </select>
                          </div>
                          <label for="Status" class="col-sm-1 col-form-label">Status:</label>
                          <div class="col-xs-2">
                            <select name="Status" class="form-control">
                                    <option> </option>
                                    <option name="Status" value="CG">CG</option>
                                    <option name="Status" value="Equipe">Equipe</option>
                                    <option name="Status" value="Coordenador">Coordenador</option>
                                    <option name="Status" value="Espiao">Espião</option>
                                    <option name="Status" value="Apresenador">Apresenador</option>
                                    
                                </select>
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
