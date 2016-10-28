<!DOCTYPE html>
<html lang="en">

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
    <script type="text/javascript" >
    alert('teste');
    $(document).ready(function(){
    	var input = '<label>Nome: <input type="text" name="foto[]" class="form-control" /> <a href="#" class="remove">X</a></label>';
        
    	$("input[name='add']").click(function( e ){
    		$('#adicionar').append( input );
    	});
    
    	$('#adicionar').delegate('a','click',function( e ){
    		e.preventDefault();
    		$( this ).parent('label').remove();
    	});
    
    });
    </script>
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
                    <h1 class="page-header">Quartos:</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="panel panel-default">
                        <div class="panel-heading">
                            Cadastro dos Quartos: 
                        </div>
                        <!-- .panel-heading -->
                        <div class="panel-body">
                            <form action="../php/cad_quarto.php" method="POST">
                                
                                <label for="IdQuarto" class="col-sm-1 col-form-label">Nº do Quarto:</label>
                                    <div class="col-sm-2">
                                        <input type="text" class="form-control" name="IdQuarto">
                                    </div>
                                 
                                <label for="Nome" class="col-sm-1 col-form-label">Adicionar input:</label>
                                        
                                   <label><input type="button" name="add" value="+" class="btn btn-info btn-circle"/></label>
                    				
                    
                    			<fieldset id="adicionar">
                    			</fieldset>
                                   
                            </form>
                        </div>
                        <!-- .panel-body -->
                    </div>
                    <?php
                        for($i=0;$i<10;$i++){
                         echo '<div class="col-lg-4">
                            <div class="panel panel-red">
                                <div class="panel-heading">
                                    NUMERO DO QUARTO
                                </div>
                                <div class="panel-body">
                                    <p>NOME DO ENCONTRISTA - VALOR</p>
                                    <p>NOME DO ENCONTRISTA - VALOR</p>
                                    <p>NOME DO ENCONTRISTA - VALOR</p>
                                    <p>NOME DA EQUIPE - EQUIPE</p>
                                </div>
                                <div class="panel-footer">
                                    QUANTIDADE 
                                </div>
                            </div>
                            <!-- /.col-lg-4 -->
                        </div>';
                    }
                    ?>
                    
                    
                    
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->
</body>

</html>
