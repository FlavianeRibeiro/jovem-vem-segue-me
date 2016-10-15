<?php
    include 'Banco.php';
    
    $IdFicha = $_POST["IdFicha"];
   echo  $Nome = $_POST["Nome"];
    $Sexo = $_POST["Sexo"];
    $Comunidade = $_POST["Comunidade"];
    $Idade= $_POST["Idade"];
    $Onibus = $_POST["Onibus"];
    $Remedio = $_POST["Remedio"];
    switch ($Comunidade) {
                case '1':
                    $op = "Cristo Rei";
                break;
                case '2':
                    $op = "Jesus Ressuscitado";
                break;
                case '3':
                    $op = "Nossa Senhora do Rosário";
                break;
                case '4':
                    $op = "Sagrada Família";
                break;
                case '5':
                    $op = "Santa Clara de Assis";
                break;
                case '6':
                    $op = "Santuário";
                break;
                case '7':
                    $op = "São Benedito";
                break;
                case '8':
                    $op = "São Marco";
                break;
                case '9':
                    $op = "São Sebastião";
                break;
            }
    echo $Consulta = "UPDATE `retiro`.`encontrista` SET `Nome`='$Nome',`Sexo`='$Sexo',`Idade`= '$Idade',`Comunidade`= '$Comunidade',
    `Onibus`='$Onibus',`Remedio`= '$Remedio' WHERE `IdFicha`= '$IdFicha'";
    
	$Result = mysql_query($Consulta);
	echo "<br><br><br>";
	echo $Result.mysql_error();
    header("Location: ../pages/index.php"); 
?>
