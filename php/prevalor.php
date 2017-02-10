<?php
    include 'Banco.php';
    session_start();
	if(!isset($_SESSION["IdEquipe"])){header('Location: ../pages/login.php');}
    $Valor = $_POST["Valor"];
   $_teste = $_POST['Id'];
  
     
    foreach($_teste as $_id){
        echo  $Consulta ="UPDATE `encontrista` SET `Valor`= '".$Valor."' WHERE  `IdFicha` = ".$_id;
             $Result = mysql_query($Consulta);
            //echo $_id;
    }echo $Result.mysql_error();
   header("Location: ../pages/listagemPorValor.php"); 
?>