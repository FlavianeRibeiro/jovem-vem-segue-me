<?php
	$conect=mysql_connect("localhost","ju_carvalh0","");
	
	if($conect){
		echo "";
	}else{
		echo "não conectou";
	}
	
	$OB = mysql_select_db("retiro");
?>
