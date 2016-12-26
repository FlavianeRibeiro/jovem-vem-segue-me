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
    
    //LISTAGEM POR VALOR
    public function listarPorValor($Valor_) {
        $encontrista = new Encontrista();
        return $encontrista->getByValor($Valor_);
    }
    //LISTAGEM POR COMUNIDADE
    public function listarPorComunidade($Comunidade) {
        $encontrista = new Encontrista();
        return $encontrista->getByComunidade($Comunidade);
    }
    //LISTAGEM POR COMUNIDADE fora da paroquia
    public function listarPorComun($Comunidade_) {
        $encontrista = new Encontrista();
        return $encontrista->getByComun($Comunidade_);
    }
    
    //Realiza o cadastro de um novo encontrista 
    public function salvar($encontrista){
        return $encontrista->save($encontrista);
    }
    
    
    //Realiza o cadastro de um novo encontrista 
    public function atualizar($encontrista){
        return $encontrista->update($encontrista);
    }
    
    //Altera um encontrista para desistente
    public function cadastrarDesistencia($IdFicha, $justificativa){
        $encontrista = new Encontrista();
        $encontrista->saveDesistencia($IdFicha, $justificativa);
    }
    
    public function obterTotalEncontristasPorIdade(){
        $encontrista = new Encontrista();
        return $encontrista->getTotalEncontristasPorIdade();
    }
    
    public function obterEncontristaPorIdFicha($IdFicha) {
        $encontrista = new Encontrista();
        return $encontrista->getEncontristaById($IdFicha);
    }
    public function obterTotalEncontristasPorValor(){
        $encontrista = new Encontrista();
        return $encontrista->getTotalEncontristasPorValor();
    }
}