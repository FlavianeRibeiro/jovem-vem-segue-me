<?php
include 'Banco.php';

class Suplencia{
    
    private $idSuplencia='';
    private $Nome='';
    private $Equipe='';
    private $Email='';
    private $Telefone='';
    private $Ficha='';
    private $Devolvido='';
    
    //Retorna uma lista com todas as comunidades cadastradas
    public function getAll(){
        $sql = 'select * from retiro.Suplencia';
        return mysql_query($sql);
    }
    
    public function SaveFicha($IdSuplencia, $Ficha){
        $sql = "UPDATE Suplencia SET Ficha =".$Ficha." WHERE IdSuplencia = ".$IdSuplencia."";
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

    public function getSexo(){
        return $this->$sexo; 
    }
    
    public function setSexo($sexo){
        $this->sexo = $sexo;
    }

    public function getTelefome(){
        return $this->$telefone; 
    }
    
    public function setTelefome($telefone){
        $this->telefone = $telefone;
    }
    
    public function getEmail(){
        $this->$email;
    }
    
    public function setIdade($email){
        $this->email = $email;
    }
    
    public function getEquipe(){
        return $this->$equipe; 
    }
    
    public function setEquipe($equipe){
        $this->equipe = $equipe;
    }
    
    public function getFicha(){
        return $this->$ficha; 
    }
    
    public function setFicha($ficha){
        $this->ficha = $ficha;
    }
    
    public function getDevolvido(){
        return $this->$devolvido; 
    }
    
    public function setDevolvido($devolvido){
        $this->devolvido = $devolvido;
    }
    
}
