<?php
	$conect=mysql_connect("localhost","flavianeribeiro","");
	
	if($conect){
		echo "";
	}else{
		echo "não conectou";
	}
	
	$OB = mysql_select_db("retiro");
?>