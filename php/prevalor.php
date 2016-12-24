<?php
    include 'Banco.php';
    $Valor = $_POST["Valor"];
   $_teste = $_POST['Id'];
  
     
    foreach($_teste as $_id){
        echo  $Consulta ="UPDATE `encontrista` SET `Valor`= '".$Valor."' WHERE  `IdFicha` = ".$_id;
             $Result = mysql_query($Consulta);
            //echo $_id;
    }echo $Result.mysql_error();
   header("Location: ../pages/listagemPorValor.php"); 
?>