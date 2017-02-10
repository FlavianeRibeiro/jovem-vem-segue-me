<?php
    include 'Banco.php';
    session_start();
	if(!isset($_SESSION["IdEquipe"])){header('Location: ../pages/login.php');}
    $Quarto = $_POST["Quarto"];
   $_hue = $_POST['IdFicha'];
   $_teste = $_POST['IdEquipe'];
     
    foreach($_hue as $_id){
        echo  $Consulta ="UPDATE `encontrista` SET `Quarto`= '".$Quarto."' WHERE  `IdFicha` = ".$_id;
        echo '<br>';
             $Result = mysql_query($Consulta);
    }echo $Result.mysql_error();
    foreach($_teste as $_idE){
        echo  $Consulta2 ="UPDATE `retiro`.`equipe` SET `Quarto`= '".$Quarto."' WHERE  `IdEquipe` = ".$_idE;
        echo '<br>';
             $Result = mysql_query($Consulta2);
    }echo $Result.mysql_error();
    header("Location: ../pages/quarto.php"); 
?>
