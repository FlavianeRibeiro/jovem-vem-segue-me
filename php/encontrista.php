<?php
    include 'Banco.php';
    
    $Idficha = $_POST["Idficha"];
    $Nome = $_POST["Nome"];
    $Sexo = $_POST["sexo"];
    $Comunidade = $_POST["comunidade"];
    $Idade= $_POST["idade"];
    $Onibus = $_POST["onibus"];
    $Carta = $_POST["carta"];
    $Valor = $_POST["valor"];
    $Desistencia = $_POST["desistencia"];
    $Remedio = $_POST["remedio"];
    
    $Consulta ="INSERT INTO `retiro`.`encontrista`(`IdFicha`, `Nome`, `Sexo`, `Idade`, `Comunidade`, `Onibus`, `Carta`, `Valor`, `Desistencia`, `Remedio`) 
    VALUES ('$Idficha','$Nome','$Sexo','$Idade','$Comunidade','$Onibus','$Carta','$Valor','$Desistencia','$Remedio')";
    echo $Consulta;
	$Result = mysql_query($Consulta);
	
	echo $Result.mysql_error();
    
    header("Location: index.php"); 
?>
