<?php
include 'Banco.php';

class Encontrista{
    
    private $id='';
    private $nome='';
    private $datanasc='';
    private $idade='';
    private $sexo='';
    private $estadocivil='';
    private $telresid='';
    private $celular='';
    private $operadora='';
    private $whats='';
    private $facebook='';
    private $email='';
    private $paroquia='';
    private $comunidade='';
    private $outro='';
    private $servico='';
    private $q_servico='';
    private $onibus='';
    private $rua='';
    private $numero='';
    private $bairro;
    private $cidade='';
    private $estado='';
    private $cep='';
    private $referencia='';
    private $complemento='';
    private $numapt='';
    private $nomeapt='';
    private $nomepai='';
    private $contatopai='';
    private $nomemae='';
    private $contatomae='';
    private $responsavel='';
    private $contatoresponsavel='';
    private $procurar='';
    private $contatoprocurar='';
    private $medicamento='';
    private $q_remedio='';
    private $horario='';
    private $arlegia='';
    private $q_alergia='';
    private $carta='';
    private $valor='';
    private $desistencia='';
    private $remedio='';
   
Q_Alergia
    
    public function save($encontrista){
        $Consulta ="INSERT INTO `encontrista`(`IdFicha`, `Nome`, `Sexo`, `Idade`, `Comunidade`, `Onibus`, `Carta`, `Valor`, `Desistencia`, `Remedio`) 
        VALUES('$encontrista->id','$encontrista->nome','$encontrista->sexo','$encontrista->idade','$encontrista->comunidade','$encontrista->onibus','$encontrista->carta','$encontrista->valor','$encontrista->desistencia','$encontrista->remedio')";
        return mysql_query($Consulta);
    }
    
    public function update($encontrista){
        
        $Consulta = "UPDATE `retiro`.`encontrista` SET `Nome`='$encontrista->nome',`Sexo`='$encontrista->sexo',`Idade`= '$encontrista->idade',
        `Comunidade`= '$encontrista->comunidade',`Onibus`='$encontrista->onibus',`Remedio`= '$encontrista->remedio' WHERE `IdFicha`= '$encontrista->id'";

        return mysql_query($Consulta);
       
    }
    
    //Retorna uma lista com todos os encontristas cadastrados
    public function getAll(){
        $sql = 'select * from retiro.encontrista';
        return mysql_query($sql);
    }
    
    //Retorna uma lista com todos os encontristas que não desistiram
    public function getEncontristasNaoDesistentes(){
    
        $sql = "SELECT `encontrista`.`IdFicha`, `encontrista`.`Nome`, `encontrista`.`Sexo`, `encontrista`.`Idade`, `encontrista`.`Onibus`, `encontrista`.`Carta`, `encontrista`.`Valor`, `encontrista`.`Desistencia`, `encontrista`.`Remedio`, `encontrista`.`Justificativa`, `comunidade`.`Nome` as Comunidade
                FROM  `encontrista` 
                INNER JOIN  `comunidade` ON comunidade.IdComunidade = encontrista.Comunidade
                WHERE  Desistencia=0";
        return mysql_query($sql);
    }
    
    
    public function getByComunidade($Comunidade_){
        $sql = "select  `encontrista`.`IdFicha`, `encontrista`.`Nome`, `encontrista`.`Idade`, `comunidade`.`Nome` as Comunidade
                FROM  `encontrista` 
                INNER JOIN  `comunidade` ON comunidade.IdComunidade = encontrista.Comunidade
                WHERE  Desistencia = 0 AND Comunidade='".$Comunidade_."'";
        return mysql_query($sql);
    }
    
    public function getByComun($Comunidade_){
        $sql = "select  `encontrista`.`IdFicha`, `encontrista`.`Nome`, `encontrista`.`Idade`,  `comunidade`.`Nome` as Comunidade
                FROM  `encontrista` 
                INNER JOIN  `comunidade` ON comunidade.IdComunidade = encontrista.Comunidade
                WHERE  Desistencia=0 AND Comunidade !='".$Comunidade_."'";
        return mysql_query($sql);
    }
    
    public function getBySexo($Sexo_){
        $sql = "select  `encontrista`.`IdFicha`, `encontrista`.`Nome`, `encontrista`.`Idade`, `encontrista`.`Valor`, `comunidade`.`Nome` as Comunidade
                FROM  `encontrista` 
                INNER JOIN  `comunidade` ON comunidade.IdComunidade = encontrista.Comunidade
                WHERE  Desistencia=0 AND Sexo='".$Sexo_." '";
        return mysql_query($sql);
    }
    
    public function getByValor($Valor_){
        $sql = "select  `encontrista`.`IdFicha`, `encontrista`.`Nome`, `encontrista`.`Idade`, `encontrista`.`Valor`, `comunidade`.`Nome` as Comunidade
                FROM  `encontrista` 
                INNER JOIN  `comunidade` ON comunidade.IdComunidade = encontrista.Comunidade
                WHERE  Desistencia=0 AND Valor='".$Valor_." '";
        return mysql_query($sql);
    }
    
    public function getTotalEncontristasPorIdade(){
        $sql = 'SELECT DISTINCT idade, (SELECT COUNT( * ) FROM encontrista enc WHERE encontrista.idade = enc.idade) AS total_idade FROM  encontrista ORDER BY idade';
        return mysql_query($sql);
    }
    
    public function getEncontristaById($IdFicha){
        $sql = "SELECT * FROM  encontrista where IdFicha=".$IdFicha;
        return mysql_query($sql);
    }
    
    public function saveDesistencia($IdFicha, $Justificativa){
        $sql = "UPDATE encontrista SET Desistencia=1, Justificativa='".$Justificativa."' where IdFicha=".$IdFicha;
        return mysql_query($sql);
    }
    public function getTotalEncontristasPorValor(){
        $sql = 'SELECT DISTINCT Valor, (SELECT COUNT( * ) FROM encontrista enc WHERE encontrista.Valor = enc.Valor) AS total_Valor FROM  encontrista ORDER BY Valor';
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
        $this->$idade;
    }
    
    public function setIdade($idade){
        $this->idade = $idade;
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
        return $this->valor; 
    }
    
    public function setValor($valor){
        $this->valor = $valor;
    }
    
    public function getDesistencia(){
        return $this->$desistencia; 
    }
    
    public function setDesistencia($desistencia){
        $this->desistencia = $desistencia;
    }
    
    public function getRemedio(){
        return $this->$remedio; 
    }
    
    public function setRemedio($remedio){
        $this->remedio = $remedio;
    }
}
