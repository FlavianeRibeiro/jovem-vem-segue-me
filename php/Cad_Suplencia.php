<?php
    include 'Banco.php';
    
    $Ficha = $_PODT["Ficha"];]
    $IdSuplencia = $_GET["IdSuplencia"];
    if($Ficha == 0){
        $Nome = $_POST["Nome"];
        $Equipe = $_POST["Equipe"];
        $Email = $_POST["Email"];
        $Telefone= $_POST["Telefone"];
        
        $Consulta ="INSERT INTO `Suplencia`(`IdSuplencia`, `Nome`, `Equipe`, `Email`, `Telefone`) VALUES('Null','$Nome','$Equipe','$Email','$Telefone')";
    	$Result = mysql_query($Consulta);
    	echo $Result.mysql_error();
        
        header("Location: ../pages/suplencia.php"); 
    }else{
        
        $alteracao ="UPDATE `Suplencia` SET `Ficha`= '$Ficha' WHERE `IdSuplencia` = '$IdSuplencia'";
    	$Result = mysql_query($alteracao);
        
    }
    
    
?>
