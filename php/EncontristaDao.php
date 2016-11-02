<?php
include 'Banco.php';

class Encontrista{
    
    private $id;
    private $nome;
    private $sexo;
    private $dataNascimento;
    private $comunidade;
    private $onibus;
    private $carta;
    private $valor;
    private $desistencia;
    private $remedio;
    
    public function save($encontrista){
        $Consulta ="INSERT INTO `encontrista`(`IdFicha`, `Nome`, `Sexo`, `Idade`, `Comunidade`, `Onibus`, `Carta`, `Valor`, `Desistencia`, `Remedio`) 
        VALUES('$encontrista->id','$encontrista->nome','$encontrista->sexo','$encontrista->dataNascimento','$encontrista->comunidade','$encontrista->onibus','$encontrista->carta','$encontrista->valor','$encontrista->desistencia','$encontrista->remedio')";
    
        $insertProdutos = mysql_query($Consulta);

        if($insertProdutos){
            $resposta="Inserido com sucesso";
        }else{
            $resposta ="Erro ao inserir";
        }
        
        return $resposta;
    }
    
    public function update($encontrista){
        
        $Consulta ="INSERT INTO `encontrista`(`IdFicha`, `Nome`, `Sexo`, `Idade`, `Comunidade`, `Onibus`, `Carta`, `Valor`, `Desistencia`, `Remedio`) 
        VALUES('$encontrista->id','$encontrista->nome','$encontrista->sexo','$encontrista->dataNascimento','$encontrista->comunidade','$encontrista->onibus','$encontrista->carta','$encontrista->valor','$encontrista->desistencia','$encontrista->remedio')";
    
        $insertProdutos = mysql_query($Consulta);

        if($insertProdutos){
            $resposta="Inserido com sucesso";
        }else{
            $resposta ="Erro ao inserir";
        }
        
        return $resposta;
    }
    
    //Retorna uma lista com todos os encontristas cadastrados
    public function getAll(){
        $sql = 'select * from retiro.encontrista';
        return mysql_query($sql);
    }
    
    //Retorna uma lista com todos os encontristas que não desistiram
    public function getEncontristasNaoDesistentes(){
        $sql = 'select * from retiro.encontrista where Desistencia=0';
        return mysql_query($sql);
    }
    
    
    public function getBySexo($Sexo_){
        $sql = "select * from retiro.encontrista where Sexo='".$Sexo_."'";
        return mysql_query($sql);
    }
    
    public function getTotalEncontristasPorIdade(){
        $sql = 'SELECT DISTINCT idade, (SELECT COUNT( * ) FROM encontrista enc WHERE encontrista.idade = enc.idade) AS total_idade FROM  encontrista ORDER BY idade';
        return mysql_query($sql);
    }
    
    public function getEncontristaById($IdFicha){
        $sql = "SELECT IdFicha, Nome FROM  encontrista where IdFicha=".$IdFicha;
        return mysql_query($sql);
    }
    
    public function saveDesistencia($IdFicha, $Justificativa){
        $sql = "UPDATE encontrista SET Desistencia=1, Justificativa='".$Justificativa."' where IdFicha=".$IdFicha;
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

    public function getDataNascimento(){
        return $this->$dataNascimento; 
    }
    
    public function setDataNascimento($dataNascimento){
        $this->dataNascimento = $dataNascimento;
    }
    
    public function getIdade(){
        $this->dataNascimento = $dataNascimento;
    }
    
    public function getComunidade(){
        return $this->$comunidade; 
    }
    
    public function setComunidade($comunidade){
        $this->comunidade = $comunidade;
    }
    
    public function getOnibus(){
        return $this->$onibus; 
    }
    
    public function setOnibus($onibus){
        $this->onibus = $onibus;
    }
    
    public function getCarta(){
        return $this->$carta; 
    }
    
    public function setCarta($carta){
        $this->carta = $carta;
    }
    
    public function getValor(){
        return $this->$valor; 
    }
    
    public function setValor($valor){
        $this->valor = $valor;
    }
    
    public function getDesistencia(){
        return $this->$desistencia; 
    }
    
    public function setDesistencia($desistencia){
        $this->valor = $desistencia;
    }
    
    public function getRemedio(){
        return $this->$remedio; 
    }
    
    public function setRemedio($remedio){
        $this->remedio = $remedio;
    }
}
