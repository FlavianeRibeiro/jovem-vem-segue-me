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
}
?>