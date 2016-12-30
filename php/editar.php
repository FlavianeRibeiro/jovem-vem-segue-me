<?php
include 'Banco.php';
 if(isset($_POST["button"])){
     echo "teste";
 }else{
     echo "burra";
 }
    $Id =$_GET['Id'];
    $Nome   = $_POST["Nome"];
    $Equipe = $_POST["Equipe"];
    $Email  = $_POST["Email"];
    $Telefone= $_POST["Telefone"];
    $Ficha= $_POST["Ficha"];
        
    echo $sqlinsert ="UPDATE `Suplencia` SET `Nome`='$Nome',`Equipe`='$Equipe',`Email`='$Email',`Telefone`='$Telefone',`Ficha`='$Ficha' WHERE `IdSuplencia` = '$Id'";
    //$Result = mysql_query($Consulta);
	//$Result.mysql_error();
	mysql_query($sqlinsert) or die(mysql_error());
     mysql_query($sqlinsert) or die(mysql_error());
?>