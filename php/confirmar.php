<?php
		include 'Banco.php';
		$email =$_POST["email"];
		$senha =$_POST["senha"];
		
	$Consulta ="SELECT * FROM  `equipe` WHERE  `Email` =  '".$email."'	AND  `Senha` ='$senha'";
	$ok=mysql_query($Consulta);
	$contador=0;
		while($linha=mysql_fetch_array($ok)){
			$NomeEquipe = $linha["NomeEquipe"];
			$IdEquipe   = $linha["IdEquipe"];
		    $Status     = $linha["Status"];
		    $Equipe     = $linha["Equipe"];
			$contador++;
		}
	if($contador>0){
		session_start();
		$_SESSION["NomeEquipe"] = $NomeEquipe;
		$_SESSION["IdEquipe"]	= $IdEquipe;
        $_SESSION["Status"]     = $Status;
        $_SESSION["Equipe"]     = $Equipe;
		header('Location: ../pages/index.php');
	}else{
		header('Location: ../pages/login.php');
	}
?>