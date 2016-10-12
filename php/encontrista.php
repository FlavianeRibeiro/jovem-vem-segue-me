<?php
    include 'Banco.php';
    
    $IdFicha = $_POST["IdFicha"];
    $Nome = $_POST["Nome"];
    $Sexo = $_POST["Sexo"];
    $Comunidade = $_POST["Comunidade"];
    $Idade= $_POST["Idade"];
    $Onibus = $_POST["Onibus"];
    $Carta = $_POST["Carta"];
    $Valor = $_POST["Valor"];
    $Desistencia = $_POST["Desistencia"];
    $Remedio = $_POST["Remedio"];
    
    $Consulta ="INSERT INTO `encontrista`(`IdFicha`, `Nome`, `Sexo`, `Idade`, `Comunidade`, `Onibus`, `Carta`, `Valor`, `Desistencia`, `Remedio`) 
    VALUES('$IdFicha','$Nome','$Sexo','$Idade','$Comunidade','$Onibus','$Carta','$Valor','$Desistencia','$Remedio')";
    echo $Consulta;
	$Result = mysql_query($Consulta);
	
	echo $Result.mysql_error();
    
    header("Location: ../pages/index.php"); 
?>
