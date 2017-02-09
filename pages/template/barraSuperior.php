<div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <?php 
        include '../php/Banco.php'; 
        session_start();
        if(isset($_SESSION["IdEquipe"])){
			$IdEquipe= $_SESSION["IdEquipe"];
			$xy= $_SESSION["NomeEquipe"];
			$Status= $_SESSION["Status"];
            $Equipe = $_SESSION["Equipe"];
		}else{
		    
		}
		
        echo '<a class="navbar-brand" href="index.html">Bem vindo, '. $_SESSION['NomeEquipe'].'</a>';?>
            </div>
            <!-- /.navbar-header -->
            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-bell fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-alerts">
                        <?php  
                        $Recebe = mysql_query("SELECT * FROM  `Historico`");
                    $Nome;$Descricao;$Ficha;$Data;$Equipe;$Status;$contador=0;
                        while($linha = mysql_fetch_array($Recebe)){
                            $Nome[$contador] = $linha["Nome"];      $Descricao[$contador] = $linha["Descricao"];
                            $Ficha[$contador] = $linha["Ficha"];    $Data[$contador]= $linha["Data"];
                            $Equipe[$contador] = $linha["Equipe"];  $Status[$contador] = $linha["Status"];
                            $contador++;
                        }$cont=0;
                            while($cont<count($Nome)){
                                echo '<li>
                                    <a href="#">
                                        <div>
                                            <i class="fa fa-comment fa-fw"></i> '.$Nome[$cont].' '.$Descricao[$cont].'('.$Ficha[$cont].')
                                           <span class="pull-right text-muted small">'.$Data[$cont].'</span>
                                        </div>
                                    </a>
                                </li> <br>
                                <li class="divider"></li>';$cont++;
                         } ?>
                        <li>
                            <a class="text-center" href="#">
                                <strong>Ver todo o historico</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                    <!-- /.dropdown-alerts -->
                </li>
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li>
                            <a href="login.html"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->