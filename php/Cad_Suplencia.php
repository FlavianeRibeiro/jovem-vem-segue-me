<?php
    include 'Banco.php';
    session_start();
	if(!isset($_SESSION["IdEquipe"])){header('Location: ../pages/login.php');}
    
        $NomeSuplencia = $_POST["NomeSuplencia"];
        $Equipe = $_POST["Equipe"];  echo'<br>';
        $Email = $_POST["Email"];
        $Telefone= $_POST["Telefone"];
        $Ficha= $_POST["Ficha"];
        $Consulta ="INSERT INTO `Suplencia`(`IdSuplencia`, `NomeSuplencia`, `Equipe`, `Email`, `Telefone`, `Ficha`, `Devolvido`) VALUES ('Null','$NomeSuplencia','$Equipe','$Email','$Telefone','','0')";
    	$Result = mysql_query($Consulta);
        $Result.mysql_error();
    	header("Location: ../pages/suplencia.php");
    
    
    
?>