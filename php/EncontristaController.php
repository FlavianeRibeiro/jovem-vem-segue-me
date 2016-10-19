<?php require_once 'EncontristaDao.php';
 
class EncontristaController {

    //Retorna uma lista com todos os encontristas cadastrados
    public function listarTodos() {
        $encontrista = new Encontrista();
        return $encontrista->getAll();
    }
    
    //Retorna uma lista com todos os encontristas que não desistiram
    public function listarEncontristasNaoDesistentes() {
        $encontrista = new Encontrista();
        return $encontrista->getEncontristasNaoDesistentes();
    }
    
    //Realiza o cadastro de um novo encontrista  (falta terminar)
    public function salvar(){
        $encontrista = new Encontrista();
        $encontrista->setNome();
        $encontrista->setSexo();
        $encontrista->setIdade();
    }
    
    //cadastrar desistencia (falta terminar)
    public function registrarDesistencia($IdFicha){
        $encontrista = new Encontrista();
        $encontrista.registrarDesistencia($IdFicha);
        
    }
}

?>
