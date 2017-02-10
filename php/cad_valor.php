<?php
    include 'Banco.php';
    session_start();
	if(!isset($_SESSION["IdEquipe"])){header('Location: ../pages/login.php');}
    
    echo $Nome = $_POST["Nome"];
    echo $Nome = $_POST["Nomeeq"];
    echo $quartp = $_POST["quarto"];
   
    $Consulta ="INSERT INTO `retiro`.`equipe`(`IdEquipe`, `Nome`, `Fixo`, `Celular`, `Operadora`, `Email`, `Senha`, `Comunidade`, `Equipe`, `Status`, `Sexo`) 
    VALUES ('Null','$Nome','$Fixo','$Celular','$Operadora','$Email','$Senha','$Comunidade','$Equipe','$Status','$Sexo')";
	$Result = mysql_query($Consulta);
	
	//echo $Result.mysql_error();
    
    //header("Location: ../pages/equipe.php"); 
?>
