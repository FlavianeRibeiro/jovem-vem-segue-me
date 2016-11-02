<?php require_once 'ComunidadeDao.php';
 
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