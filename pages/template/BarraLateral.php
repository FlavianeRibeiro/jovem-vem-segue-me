<div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li>
                            <a href="index.php"><i class="fa fa-home fa-fw"></i> Inicio</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-edit fa-fw"></i> Cadastrar<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="encontristaForm.php">Encontrista</a>
                                </li>
                                <li>
                                    <a href="suplencia.php">Suplência</a>
                                </li>
                                <li>
                                    <a href="quarto.php?Sexo=Feminino">Quarto das meninas</a>
                                </li>
                                <li>
                                    <a href="quarto.php?Sexo=Masculino">Quarto dos meninos</a>
                                </li>
                                <?php echo $teste; ?>
                            </ul>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Listagem<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="listagemPorSexo.php?Sexo=F">Meninas</a>
                                </li>
                                <li>
                                    <a href="listagemPorSexo.php?Sexo=M">Meninos</a>
                                </li>
                                <li>
                                    <a href="listagemPorIdade.php">Idade</a>
                                </li>
                                <li>
                                    <a href="listagemPorOnibus.php">Ônibus</a>
                                </li>
                                <li>
                                    <a href="listagemPorValor.php">Valor</a>
                                </li>
                                <li>
                                    <a href="suplenciaListagem.php">Suplência</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Comunidade<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="listagemPorComunidade.php?op=1">Cristo Rei</a>
                                </li>
                                <li>
                                    <a href="listagemPorComunidade.php?op=2">Jesus Ressucitado</a>
                                </li>
                                <li>
                                    <a href="listagemPorComunidade.php?op=3">Nossa Senhora do Rosario</a>
                                </li>
                                <li>
                                    <a href="listagemPorComunidade.php?op=4">Sagrada Familia</a>
                                </li>
                                <li>
                                    <a href="listagemPorComunidade.php?op=5">Santa Clara de Assis</a>
                                </li>
                                <li>
                                    <a href="listagemPorComunidade.php?op=6">Santuáio</a>
                                </li>
                                <li>
                                    <a href="listagemPorComunidade.php?op=7">São Benedito</a>
                                </li>
                                <li>
                                    <a href="listagemPorComunidade.php?op=8">São Marcos</a>
                                </li>
                                <li>
                                    <a href="listagemPorComunidade.php?op=9">São Sebastião</a>
                                </li>
                                <li>
                                    <a href="listagemPorComunidade.php?op=0">Outros</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-table fa-fw"></i> Desistência</a>
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->