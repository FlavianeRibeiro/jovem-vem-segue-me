<?php require_once 'ComunidadeDao.php';
session_start();
	if(!isset($_SESSION["IdEquipe"])){header('Location: ../pages/login.php');}
 
class ComunidadeController {

    //Retorna uma lista com todos os encontristas cadastrados
    public function listarTodas() {
        $comunidade = new Comunidade();
        return $comunidade->getAll();
    }
    
    public function obterComunidadePorNome($Nome) {
        $comunidade = new Comunidade();
        return $comunidade->getComunidadePorNome($Nome);
    }
}