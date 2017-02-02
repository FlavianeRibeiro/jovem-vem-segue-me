<?php
    include 'Banco.php';
    
    class Historico{
        private $id='';
        private $nome='';
        private $descricao='';
        private $ficha='';
        
        public function save($historico){
            
        } 
    
    
    
     //ID HISTORICO
    public function getId(){  return $this->$id; }
    public function setId($id){ $this->id = $id; }
    
    //NOME
    public function getNome(){ return $this->$nome; }
    public function setNome($nome){  $this->nome = $nome;}
    
    //DESCRIÇÃO
    public function getDescricao(){ return $this->$descricao; }
    public function setDescricao($descricao){$this->descricao = $descricao; }
    
    //FICHA
    public function getFicha(){  $this->$ficha; }
    public function setFicha($ficha){ $this->ficha = $ficha;}
    
    }
?>