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
    
    public function listarPorSexo($Sexo) {
        $encontrista = new Encontrista();
        return $encontrista->getBySexo($Sexo);
    }
    
    //Realiza o cadastro de um novo encontrista  (falta terminar)
    public function salvar($encontrista){
        //$encontrista = new Encontrista();
        //$encontrista->setNome("Ju");
        return $encontrista->save($encontrista);
        
    }
    
    //cadastrar desistencia (falta terminar)
    public function cadastrarDesistencia($IdFicha, $justificativa){
        $encontrista = new Encontrista();
        $encontrista.cadastrarDesistencia($IdFicha,$justificativa);
    }
    
    public function obterTotalEncontristasPorIdade(){
        $encontrista = new Encontrista();
        return $encontrista->getTotalEncontristasPorIdade();
    }
    
    public function obterEncontristaPorIdFicha($IdFicha) {
        $encontrista = new Encontrista();
        return $encontrista->getEncontristaById($IdFicha);
    }
}