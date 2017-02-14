<?php
include 'Banco.php';

class Encontrista{
    
    private $id='';
    private $nomeencontrista='';
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
    private $convite='';
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
    private $remedio='';
    private $q_remedio='';
    private $horario='';
    private $arlegia='';
    private $q_alergia='';
    private $carta='';
    private $valor='';
    private $desistencia='';
    private $quarto='';
    private $justificativa='';
    private $datadesistencia='';
    
    public function save($encontrista){ 
    $Consulta ="INSERT INTO `encontrista`(`IdFicha`, `NomeEncontrista`, `DataNasc`, `Idade`, `Sexo`, `EstadoCivil`, `TelResid`, `Celular`, `Operadora`, `Whats`, 
        `Facebook`, `Email`, `Convite`, `Paroquia`, `Comunidade`, `Outro`, `Servico`, `Q_Servico`, `Onibus`, `Rua`, `Numero`, `Bairro`, `Cidade`, 
        `Estado`, `Cep`, `Referencia`, `Complemento`, `NumApt`, `NomeApt`, `NomePai`, `ContatoPai`, `NomeMae`, `ContatoMae`, `Responsavel`, 
        `ContatoResponsavel`, `Procurar`, `ContatoProcurar`, `Remedio`, `Q_Remedio`, `Horario`, `Alergia`, `Q_Alergia`, `Carta`, `Desistencia`) 
        VALUES ('$encontrista->id','$encontrista->nomeencontrista','$encontrista->datanasc','$encontrista->idade','$encontrista->sexo','$encontrista->estadocivil',
        '$encontrista->telresid','$encontrista->celular','$encontrista->operadora','$encontrista->whats','$encontrista->facebook','$encontrista->email',
        '$encontrista->convite','$encontrista->paroquia','$encontrista->comunidade','$encontrista->outro','$encontrista->servico','$encontrista->q_servico',
        '$encontrista->onibus','$encontrista->rua','$encontrista->numero','$encontrista->bairro','$encontrista->cidade','$encontrista->estado','$encontrista->cep',
        '$encontrista->referencia','$encontrista->complemento','$encontrista->numapt','$encontrista->nomeapt','$encontrista->nomepai','$encontrista->contatopai',
        '$encontrista->nomemae','$encontrista->contatomae','$encontrista->responsavel','$encontrista->contatoresponsavel','$encontrista->procurar',
        '$encontrista->contatoprocurar','$encontrista->remedio','$encontrista->q_remedio','$encontrista->horario','$encontrista->alergia','$encontrista->q_alergia',0,0)";
    return mysql_query($Consulta);
    }
    public function update($encontrista){
    $Consulta =$Consulta = "UPDATE `retiro`.`encontrista` SET `NomeEncontrista`='$encontrista->nomeencontrista',`DataNasc`='$encontrista->datanasc',`Idade`='$encontrista->idade',
`Sexo`='$encontrista->sexo',`EstadoCivil`='$encontrista->estadocivil',`TelResid`='$encontrista->telresid',`Celular`='$encontrista->celular',
`Operadora`='$encontrista->operadora',`Whats`='$encontrista->whats',`Facebook`='$encontrista->facebook',`Email`='$encontrista->email',`Convite`='$encontrista->convite',
`Paroquia`='$encontrista->paroquia',`Comunidade`='$encontrista->comunidade',`Outro`='$encontrista->outro',`Servico`='$encontrista->servico',
`Q_Servico`='$encontrista->q_servico',`Onibus`='$encontrista->onibus',`Rua`='$encontrista->rua',`Numero`='$encontrista->numero',`Bairro`='$encontrista->bairro',
`Cidade`='$encontrista->cidade',`Estado`='$encontrista->estado',`Cep`='$encontrista->cep',`Referencia`='$encontrista->referencia',`Complemento`='$encontrista->complemento',
`NumApt`='$encontrista->numapt',`NomeApt`='$encontrista->nomeapt',`NomePai`='$encontrista->nomepai',`ContatoPai`='$encontrista->contatopai',`NomeMae`='$encontrista->nomemae',
`ContatoMae`='$encontrista->contatomae',`Responsavel`='$encontrista->responsavel',`ContatoResponsavel`='$encontrista->contatoresponsavel',`Procurar`='$encontrista->procurar',
`ContatoProcurar`='$encontrista->contatoprocurar',`Remedio`='$encontrista->remedio',`Q_Remedio`='$encontrista->q_remedio',`Horario`='$encontrista->horario',
`Alergia`='$encontrista->alergia',`Q_Alergia`='$encontrista->q_alergia' WHERE `IdFicha`= '$encontrista->id'";
        return mysql_query($Consulta);
    }
    
    //Retorna uma lista com todos os encontristas cadastrados
    public function getAll(){
        $sql = 'select * from encontrista';
        return mysql_query($sql);
    }
    
    //Retorna uma lista com todos os encontristas que não desistiram
    public function getEncontristasNaoDesistentes(){
        $sql = "SELECT  `encontrista`.`IdFicha` ,  `encontrista`.`NomeEncontrista` ,  `encontrista`.`Idade` ,  `encontrista`.`Comunidade` ,  `encontrista`.`Valor` , `comunidade`.`Nome` AS Comunidade
                FROM  `encontrista` 
                INNER JOIN  `comunidade` ON comunidade.IdComunidade = encontrista.Comunidade
                OR encontrista.Outro = comunidade.Nome
                WHERE Desistencia =0";
        return mysql_query($sql);
    }
    
    //Retorna uma lista com todos os encontristas que desistiram
    public function getEncontristasDesistentes(){
        $sql = "SELECT  `encontrista`.`IdFicha`,  `encontrista`.`NomeEncontrista`,  `encontrista`.`Justificativa`,  `encontrista`.`DataDesistencia`, `comunidade`.`Nome` AS Comunidade
                FROM  `encontrista` 
                INNER JOIN  `comunidade` ON comunidade.IdComunidade = encontrista.Comunidade
                OR encontrista.Outro = comunidade.Nome
                WHERE Desistencia = 1";
        return mysql_query($sql);
    }

    public function getByComunidade($Comunidade){
            $sql = "SELECT  `encontrista`.`IdFicha` ,  `encontrista`.`Outro` ,  `encontrista`.`NomeEncontrista` ,  `encontrista`.`Idade` ,  `comunidade`.`Nome` AS Comunidade
                    FROM  `encontrista` 
                    INNER JOIN  `comunidade` ON comunidade.Nome = encontrista.Outro
                    OR comunidade.IdComunidade = encontrista.Comunidade
                    WHERE Desistencia = 0
                    AND Comunidade='".$Comunidade."'";
        return mysql_query($sql);
        
    }
    
    public function getByComun($Comunidade_){
        $sql = "select  `encontrista`.`IdFicha`, `encontrista`.`NomeEncontrista`, `encontrista`.`Idade`,  `comunidade`.`Nome` as Comunidade
                FROM  `encontrista` 
                INNER JOIN  `comunidade` ON comunidade.IdComunidade = encontrista.Comunidade
                WHERE  Desistencia=0 AND Comunidade !='".$Comunidade_."'";
        return mysql_query($sql);
    }
    
    public function getBySexo($Sexo){
        $sql = "select  `encontrista`.`IdFicha`, `encontrista`.`NomeEncontrista`, `encontrista`.`Idade`, `encontrista`.`Valor`, `comunidade`.`Nome` as Comunidade
                FROM  `encontrista` 
                INNER JOIN  `comunidade` ON comunidade.IdComunidade = encontrista.Comunidade
                WHERE  Desistencia=0 AND Sexo='".$Sexo." '";
        return mysql_query($sql);
    }
    
    public function getByValor($Valor_){
        $sql = "select  `encontrista`.`IdFicha`, `encontrista`.`NomeEncontrista`, `encontrista`.`Idade`, `encontrista`.`Valor`, `comunidade`.`Nome` as Comunidade
                FROM  `encontrista` 
                INNER JOIN  `comunidade` ON comunidade.IdComunidade = encontrista.Comunidade
                WHERE  Desistencia=0 AND Valor='".$Valor_." '";
        return mysql_query($sql);
    }
    
    public function getTotalEncontristasPorIdade(){
        $sql = 'SELECT DISTINCT idade, (SELECT COUNT( * ) FROM encontrista enc WHERE encontrista.idade = enc.idade AND Desistencia =0) AS total_idade FROM encontrista ORDER BY idade';
        return mysql_query($sql);
    }
    
    public function getEncontristaById($IdFicha){
        $sql = "SELECT * FROM  encontrista where IdFicha=".$IdFicha;
        return mysql_query($sql);
    }
    
    public function saveDesistencia($IdFicha, $Justificativa,$datadesistencia){
        $sql = "UPDATE encontrista SET Desistencia=1, Justificativa='".$Justificativa."',DataDesistencia='".$DataDesistencia."' where IdFicha=".$IdFicha;
        return mysql_query($sql);
    }
    public function getTotalEncontristasPorValor(){
        $sql = 'SELECT DISTINCT Valor, (SELECT COUNT( * ) FROM encontrista enc WHERE encontrista.Valor = enc.Valor) AS total_Valor FROM  encontrista ORDER BY Valor';
        return mysql_query($sql);
    }
    
    
    /*----------------------------
        Getters e Setters 
    
    ----------------------------*/
    //ID FICHA
    public function getId(){  return $this->$id; }
    public function setId($id){ $this->id = $id; }
    
    //NOME
    public function getNomeEncontrista(){ return $this->$nomeencontrista; }
    public function setNomeEncontrista($nomeencontrista){  $this->nomeencontrista = $nomeencontrista;}
    
    //DATA DE NASCIMENTO
    public function getDataNasc(){ return $this->$datanasc; }
    public function setDataNasc($datanasc){$this->datanasc = $datanasc; }
    
    //IDADE
    public function getIdade(){  $this->$idade; }
    public function setIdade($idade){ $this->idade = $idade;}
    
    //SEXO
    public function getSexo(){    return $this->$sexo; }
    public function setSexo($sexo){    $this->sexo = $sexo;}
    
    //ESTADO CIVIL
    public function getEstadoCivil(){ return $this->$estadocivil; }
    public function setEstadoCivil($estadocivil){ $this->estadocivil = $estadocivil;}
    
    //TELEFONE RESIDENCIAL
    public function getTelResid (){ return $this->$telresid; }
    public function setTelResid ($telresid){ $this->telresid = $telresid;}

    //CELULAR
    public function getCelular (){ return $this->$celular; }
    public function setCelular ($celular){ $this->celular = $celular;}
    
    //OPERADORA
    public function getOperadora (){ return $this->$operadora; }
    public function setOperadora ($operadora){ $this->operadora = $operadora;}   
    
    //WHAST
    public function getWhats (){ return $this->$whats; }
    public function setWhats ($whats){ $this->whats = $whats;}   
    
    //FACEBOOK
    public function getFacebook (){ return $this->$facebook; }
    public function setFacebook ($facebook){ $this->facebook = $facebook;}   

    //EMAIL
    public function getEmail (){ return $this->$email; }
    public function setEmail ($email){ $this->email = $email;} 
    
    //CONVITE
    public function getConvite  (){ return $this->$convite; }
    public function setConvite ($convite){ $this->convite = $convite;} 
    
    //PAROQUIA
    public function getParoquia (){ return $this->$paroquia; }
    public function setParoquia ($paroquia){ $this->paroquia = $paroquia;} 

    //COMUNIDADE
    public function getComunidade(){    return $this->$comunidade; }
    public function setComunidade($comunidade){ $this->comunidade = $comunidade;}

    //OUTRO
    public function getOutro (){ return $this->$outro; }
    public function setOutro ($outro){ $this->outro = $outro;} 

    //SERVIÇO
    public function getServico (){ return $this->$servico; }
    public function setServico ($servico){ $this->servico = $servico;} 

    //QUAL SERVIÇOS
    public function getQ_Servico (){ return $this->$q_servico; }
    public function setQ_Servico ($q_servico){ $this->q_servico = $q_servico;} 
    
    //ONIBUS
    public function getOnibus(){  return $this->$onibus; }
    public function setOnibus($onibus){ $this->onibus = $onibus; }
    
    //RUA
    public function getRua (){ return $this->$rua; }
    public function setRua ($rua){ $this->rua = $rua;} 
    
    //NUMERO
    public function getNumero (){ return $this->$numero; }
    public function setNumero ($numero){ $this->numero = $numero;} 
    
    //BAIRRO
    public function getBairro (){ return $this->$bairo; }
    public function setBairro ($bairro){ $this->bairro = $bairro;} 
    
    //CIDADE
    public function getCidade (){ return $this->$cidade; }
    public function setCidade ($cidade){ $this->cidade = $cidade;} 
    
    //ESTADO
    public function getEstado (){ return $this->$estado; }
    public function setEstado ($estado){ $this->estado = $estado;} 
    
    //CEP
    public function getCep (){ return $this->$cep; }
    public function setCep ($cep){ $this->cep = $cep;} 
    
    //REFERENCIA
    public function getReferencia (){ return $this->$referencia; }
    public function setReferencia ($referencia){ $this->referencia = $referencia;} 
    
    //COMPLEMENTO
    public function getComplemento (){ return $this->$complemento; }
    public function setComplemento ($complemento){ $this->complemento = $complemento;} 
    
    //NUMERO DO APARTAMENTO
    public function getNumApt (){ return $this->$numapt; }
    public function setNumApt ($numapt){ $this->numapt = $numapt;} 
    
    //NOME DO APARTAMENTO
    public function getNomeApt (){ return $this->$nomeapt; }
    public function setNomeApt ($nomeapt){ $this->nomeapt = $nomeapt;} 
    
    //NOME DO PAI 
    public function getNomePai (){ return $this->$nomepai; }
    public function setNomePai ($nomepai){ $this->nomepai = $nomepai;} 
    
    //CONTATO DO PAI
    public function getContatoPai (){ return $this->$contatopai; }
    public function setContatoPai ($contatopai){ $this->contatopai = $contatopai;} 
    
    //NOME DA MÃE
    public function getNomeMae (){ return $this->$nomemae; }
    public function setNomeMae ($nomemae){ $this->nomemae = $nomemae;} 
    
    //CONTATO DA MÃE
    public function getContatoMae (){ return $this->$contatomae; }
    public function setContatoMae ($contatomae){ $this->contatomae = $contatomae;} 
    
    //RESPONSAVEL
    public function getResponsavel (){ return $this->$responsavel; }
    public function setResponsavel ($responsavel){ $this->responsavel = $responsavel;} 
    
    //CONTATO DO RESPONSAVEL 
    public function getContatoResponsavel(){ return $this->$contatoresponsavel; }
    public function setContatoResponsavel($contatoresponsavel){ $this->contatoresponsavel = $contatoresponsavel;} 
    
    //PROCURAR
    public function getProcurar(){ return $this->$procurar;  }
    public function setProcurar($procurar){ $this->procurar = $procurar;}
    
    //CONTATO DO PROCURAR
    public function getContatoProcurar(){ return $this->$contatoprocurar;  }
    public function setContatoProcurar($contatoprocurar){ $this->contatoprocurar = $contatoprocurar;}
    
    //REMEDIO
    public function getRemedio(){ return $this->$remedio; }
    public function setRemedio($remedio){   $this->remedio = $remedio; }

    //QUAL REMEDIO
    public function getQ_Remedio(){ return $this->$q_remedio;  }
    public function setQ_Remedio($q_remedio){ $this->q_remedio = $q_remedio;}
    
    //HORARIO
    public function getHorario(){ return $this->$horario;  }
    public function setHorario($horario){ $this->horario = $horario;}
    
    //ALEGRIA
    public function getAlergia(){ return $this->$alergia;  }
    public function setAlergia($alergia){ $this->alergia = $alergia;}
    
    //QUAL ALERGIA
    public function getQ_Alergia(){ return $this->$q_alergia; }
    public function setQ_Alergia($q_alergia){ $this->q_alergia = $q_alergia;}
   
    //CARTA
    public function getCarta(){ return $this->$carta;  }
    public function setCarta($carta){ $this->carta = $carta;}
    
    //VALOR
    public function getValor(){  return $this->valor;  }
    public function setValor($valor){   $this->valor = $valor;  }
    
    //DESISTENCIA
    public function getDesistencia(){   return $this->$desistencia;  }
    public function setDesistencia($desistencia){   $this->desistencia = $desistencia;}

    //DATADESISTENCIA
    public function getDataDesistencia(){   return $this->$datadesistencia;  }
    public function setDataDesistencia($datadesistencia){   $this->datadesistencia = $datadesistencia;}
    
    //QUARTO
    public function getQuarto(){   return $this->$quarto;  }
    public function setQuarto($quarto){   $this->quarto = $quarto;}
    
}