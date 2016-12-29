<?php
    include 'Banco.php';
    
        $Nome = $_POST["Nome"];
        $Equipe = $_POST["Equipe"];
        $Email = $_POST["Email"];
        $Telefone= $_POST["Telefone"];
        
       echo $Consulta ="INSERT INTO `Suplencia`(`IdSuplencia`, `Nome`, `Equipe`, `Email`, `Telefone`,`Devolvido`) VALUES('Null','$Nome','$Equipe','$Email','$Telefone','0')";
    	$Result = mysql_query($Consulta);
    	echo $Result.mysql_error();
        
       // header("Location: ../pages/suplencia.php"); 
    
    
    
?>
