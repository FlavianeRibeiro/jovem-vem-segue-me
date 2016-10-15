<?php require_once 'EncontristaDao.php';
 
class EncontristaController {

    public function listarTodos() {
        $encontrista = new Encontrista();
        return $encontrista->getAll();
    }
    
    public function salvar(){
        $encontrista = new Encontrista();
        $encontrista->setNome();
        $encontrista->setSexo();
        $encontrista->setIdade();
    }
    
    public function registrarDesistencia($IdFicha){
        $encontrista = new Encontrista();
        $encontrista.registrarDesistencia($IdFicha);
    }
}

?>