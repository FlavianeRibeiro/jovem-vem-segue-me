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
    
    //Retorna uma lista com todos os encontristas que não desistiram
    public function listarEncontristasDesistentes() {
        $encontrista = new Encontrista();
        return $encontrista->getEncontristasDesistentes();
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
    
    //LISTAGEM POR COMUNIDADE FORA DA PAROQUIA
    public function cadastrarComunidade($encontrista) {
        $encontrista = new Encontrista();
        return $encontrista->getBycadcomundade($encontrista);
    }
    
    //LISTAGEM POR COMUNIDADE fora da paroquia
    public function listarPorComun($Comunidade) {
        $encontrista = new Encontrista();
        return $encontrista->getByComun($Comunidade);
    }
    
    //Realiza o cadastro de um novo encontrista 
    public function salvar($encontrista){
        return $encontrista->save($encontrista);
    }
    
    public function cadastrarNovaComunidade($nomeComunidade){
        return $encontrista->cadastrarNovaComunidade($nomeComunidade);
    }
    
    //Realiza o cadastro de um novo encontrista 
    public function atualizar($encontrista){
        return $encontrista->update($encontrista);
    }
    
    //Altera um encontrista para desistente
    public function cadastrarDesistencia($IdFicha, $justificativa,$datadesistencia){
        $encontrista = new Encontrista();
        $encontrista->saveDesistencia($IdFicha, $justificativa,$datadesistencia);
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
  /*  public function obterRemedio(){
        $encontrista = new Encontrista();
        return $encontrista->getRemedio();
    }*/
}