<?php
    include 'Banco.php';
    
    $Nome = $_POST["Nome"];
    $Equipe = $_POST["Equipe"];
    $Email = $_POST["Email"];
    $Telefone= $_POST["Telefone"];
    
    $Consulta ="INSERT INTO `Suplencia`(`IdSuplencia`, `Nome`, `Equipe`, `Email`, `Telefone`) VALUES('Null','$Nome','$Equipe','$Email','$Telefone')";
    echo $Consulta;
	$Result = mysql_query($Consulta);
	
	echo $Result.mysql_error();
    
    header("Location: ../pages/suplencia.php"); 
?>
