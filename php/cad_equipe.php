<?php
    include 'Banco.php';
    session_start();
	if(!isset($_SESSION["IdEquipe"])){header('Location: ../pages/login.php');}
    $NomeEquipe = $_POST["NomeEquipe"];
    $Sexo = $_POST["Sexo"];
    $Fixo = $_POST["Fixo"];
    $Celular = $_POST["Celular"];
    $Operadora= $_POST["Operadora"];
    $Email = $_POST["Email"];
    $Senha = $_POST["Senha"];
    $Comunidade = $_POST["Comunidade"];
    $Equipe = $_POST["Equipe"];
    $Status = $_POST["Status"];
   
    $Consulta ="INSERT INTO `retiro`.`equipe`(`IdEquipe`, `NomeEquipe`, `Fixo`, `Celular`, `Operadora`, `Email`, `Senha`, `Comunidade`, `Equipe`, `Status`, `Sexo`) 
    VALUES ('Null','$Nome','$Fixo','$Celular','$Operadora','$Email','$Senha','$Comunidade','$Equipe','$Status','$Sexo')";
	$Result = mysql_query($Consulta);
	
	$Result=mysql_error();
    
    header("Location: ../pages/equipe.php"); 
?>
