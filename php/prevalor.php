<?php
    include 'Banco.php';
    $Valor = $_POST["Valor"];
 
   $_teste = $_POST['Id'];
    foreach($_teste as $_id){
        echo $_id;
       echo  $Consulta ="INSERT INTO `retiro`.`valor`(`Valor`, `Id`) VALUES ('$Valor','$_id')";
        $Result = mysql_query($Consulta);
    }echo $Result.mysql_error();
    header("Location: ../pages/listagemPorValor.php"); 
?>