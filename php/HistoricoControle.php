<?php require_once 'HistoricoaDao.php'; 

class HistoricoControler {
    
    //Realiza o cadastro de um novo historico 
    public function salvar($historico){
        return $historico->save($historico);
    }
}
?>