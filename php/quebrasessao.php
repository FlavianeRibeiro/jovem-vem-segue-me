<?php 
include 'Banco.php';
if(isset($_SESSION['IdEquipe'])) {
     $_SESSION['IdEquipe'];
     unset($_SESSION['IdEquipe']); //repetir para cada sessao
     session_destroy(); 
     header('Location: ../pages/login.php');
}else{echo "teste";}
?>