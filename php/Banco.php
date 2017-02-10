<?php
	    session_start();
		if(isset($_SESSION["IdEquipe"])){
			$IdEquipe= $_SESSION["IdEquipe"];
		    $g= $_SESSION["NomeEquipe"];
		    $Status= $_SESSION["Status"];
		    $Equipe= $_SESSION["Equipe"];
		}else{ header('Location: ../pages/login.php');}
	$conect=mysql_connect("localhost","flavianeribeiro","");
	
	if($conect){
		echo "";
	}else{
		echo "não conectou";
	}
	
	$OB = mysql_select_db("retiro");
?>
