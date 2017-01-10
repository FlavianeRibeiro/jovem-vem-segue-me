<?php
include '../php/Banco.php';
$ok=mysql_query('SELECT * FROM  `retiro`.`equipe` ');
					$Nome;$IdEquipe;$Comunidade;$Status;$
					$contador=0;
					while($linha=mysql_fetch_array($ok))
					{
						$Nome[$contador]=$linha["Nome"];
						$IdEquipe[$contador]=$linha["IdEquipe"];
							$contador++;
					}
					$cont=0;
					while ($cont<COUNT($IdEquipe))
						{
						    
							echo '***<br>'.$Nome[$cont];
									$cont++;
						}

?>