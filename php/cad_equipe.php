<?php
    include 'Banco.php';
    
    $Nome = $_POST["Nome"];
    $Sexo = $_POST["Sexo"];
    $Fixo = $_POST["Fixo"];
    $Celular = $_POST["Celular"];
    $Operadora= $_POST["Operadora"];
    $Email = $_POST["Email"];
    $Senha = $_POST["Senha"];
    $Comunidade = $_POST["Comunidade"];
    $Equipe = $_POST["Equipe"];
    $Status = $_POST["Status"];
   
    $Consulta ="INSERT INTO `retiro`.`equipe`(`IdEquipe`, `Nome`, `Fixo`, `Celular`, `Operadora`, `Email`, `Senha`, `Comunidade`, `Equipe`, `Status`, `Sexo`) 
    VALUES ('Null','$Nome','$Fixo','$Celular','$Operadora','$Email','$Senha','$Comunidade','$Equipe','$Status','$Sexo')";
	$Result = mysql_query($Consulta);
	
	echo $Result.mysql_error();
    
    header("Location: ../pages/equipe.php"); 
?>
