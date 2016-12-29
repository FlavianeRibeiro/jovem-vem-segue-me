<?php
 require_once 'SuplenciaDao.php';
class SuplenciaControle {
    //Retorna uma lista com todos os encontristas cadastrados
    public function listarsuplencia() {
        $Suplencia = new Suplencia();
        return $Suplencia->getAll();
    }
    
    public function cadastrarFicha($IdSuplencia, $Ficha){
        $suplencia = new Suplencia();
        $suplencia->SaveFicha($IdSuplencia, $Ficha);
    }
    public function cadastrarDesistencia($IdFicha, $justificativa){
        $encontrista = new Encontrista();
        $encontrista->saveDesistencia($IdFicha, $justificativa);
    }
}
?>