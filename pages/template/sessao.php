<?php 
    include '../php/Banco.php';
    session_start();
    if(isset($_SESSION["IdEquipe"])){
	$_SESSION["Nome"]  = $Nome;
	$_SESSION["IdEquipe"] = $IdEquipe;
    $_SESSION["Status"] = $Status;		
		}

?>