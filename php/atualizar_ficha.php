<?php
    include 'Banco.php';
    
    $IdFicha = $_POST["IdFicha"];
   echo  $Nome = $_POST["Nome"];
    $Sexo = $_POST["Sexo"];
    $Comunidade = $_POST["Comunidade"];
    $Idade= $_POST["Idade"];
    $Onibus = $_POST["Onibus"];
    $Remedio = $_POST["Remedio"];
    
    echo $consulta = "UPDATE `encontrista` SET `Nome`=".$Nome.",`Sexo`=".$Sexo.",`Idade`=".$Idade.",`Comunidade`=".$Comunidade.",
    `Onibus`=".$Onibus.",`Remedio`=".$Remedio." WHERE `IdFicha`= ".$IdFicha."";
    
	$Result = mysql_query($Consulta);
	
	echo $Result.mysql_error();
    
   // header("Location: ../pages/index.php"); 
?>
