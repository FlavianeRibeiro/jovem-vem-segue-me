<?php
		include 'Banco.php';
		$email =$_POST["email"];
		$senha =$_POST["senha"];
		
	$Consulta ="SELECT * FROM  `equipe` WHERE  `Email` =  '".$email."'	AND  `Senha` ='$senha'";
	$ok=mysql_query($Consulta);
	$contador=0;
		
		while($linha=mysql_fetch_array($ok))
		{
			$Nome=$linha["Nome"];
			$IdEquipe=$linha["IdEquipe"];
			$contador++;
		}

		
	if($contador>0){
		session_start();
		echo $_SESSION["Nome"]  = $Nome;
		echo $_SESSION["IdEquipe"] = $IdEquipe;
        echo $_SESSION["Status"] = $Status;
		header('Location: ../pages/index.php');
		
	}else
	{
		echo "erro";
		header('Location: ../pages/login.php');
	}
	

?>