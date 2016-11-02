<?php
include 'Banco.php';

class Comunidade{
    
    private $id='';
    private $nome='';
    
    //Retorna uma lista com todas as comunidades cadastradas
    public function getAll(){
        $sql = 'select * from retiro.comunidade';
        return mysql_query($sql);
    }
    
    public function ComunidadePorNome($Nome){
        $sql = "SELECT * FROM  comunidade where Nome=".$Nome;
        return mysql_query($sql);
    }
    
    /*----------------------------
        Getters e Setters 
    ----------------------------*/
    public function getId(){
        return $this->$id; 
    }
    
    public function setId($id){
        $this->id = $id;
    }

    public function getNome(){
        return $this->$nome; 
    }
    
    public function setNome($nome){
        $this->nome = $nome;
    }
}
