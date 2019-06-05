<?php

//TODO: Selenium testar cadastros;

class MateriaPrima{
 
    private $id;
    private $nome;
    private $imposto;
    private $tempoRessuprimento;
    private $intervaloRessuprimento;
    private $localizacao;
    // private $idCorredor;
    private $nomeCorredor;
    // private $idPrateleira;
    private $numeroPrateleira;
    private $quantidadeEstoque;
    private $idUnidadeMedida;
    private $nomeUnidadeMedida;
    private $abrevUnidadeMedida;

    public function getId(){
        return $this->id;
    }

    public function setId($id){
        $this->id = $id;
    }

    public function getNome(){
        return $this->nome;
    }

    public function setNome($nome){
        $this->nome = $nome;
    }

    public function getImposto(){
        return $this->imposto;
    }

    public function setImposto($imposto){
        $this->imposto = $imposto;
    }

    public function getTempoRessuprimento(){
        return $this->tempoRessuprimento;
    }

    public function setTempoRessuprimento($tempoRessuprimento){
        $this->tempoRessuprimento = $tempoRessuprimento;
    }

    public function getIntervaloRessuprimento(){
        return $this->intervaloRessuprimento;
    }

    public function setIntervaloRessuprimento($intervaloRessuprimento){
        $this->intervaloRessuprimento = $intervaloRessuprimento;
    }

    public function getLocalizacao($valor = "DEF"){
        
        if(strtoupper($valor)  == "DEF"){
            return $this->nomeCorredor.$this->numeroPrateleira;
        }elseif(strtoupper($valor)  == "ID") {
            return $this->localizacao;
        }elseif(strtoupper($valor)  == "ID_COR") {
            return $this->idCorredor;
        }elseif(strtoupper($valor)  == "ID_PRAT") {
            return $this->idPrateleira;
        }
    }

    public function setLocalizacao($valor, $campo = "id"){
        // $this->localizacao = $id;

        if(strtoupper($campo)  == "ID"){
            $this->localizacao = $valor;
        }elseif(strtoupper($campo)  == "PRAT") {
            $this->numeroPrateleira = $valor;
        }elseif(strtoupper($campo)  == "COR") {
            $this->nomeCorredor = $valor;
        }

    }

    public function getQuantidadeEstoque(){
        return $this->quantidadeEstoque;
    }

    public function setQuantidadeEstoque($quantidadeEstoque){
        $this->quantidadeEstoque = $quantidadeEstoque;
    }

    public function getUnidadeMedida($campo = "ID"){
        if(strtoupper($campo)  == "NOME"){
            return $this->nomeUnidadeMedida;
        }elseif(strtoupper($campo)  == "ID") {
            return $this->idUnidadeMedida;
        }elseif(strtoupper($campo)  == "ABREV") {
            return $this->abrevUnidadeMedida;
        }
        
    }

    public function setUnidadeMedida($campo, $valor){

        if(strtoupper($campo)  == "NOME"){
            $this->nomeUnidadeMedida = $valor;
        }elseif(strtoupper($campo)  == "ID") {
            $this->idUnidadeMedida = $valor;
        }elseif(strtoupper($campo)  == "ABREV") {
            $this->abrevUnidadeMedida = $valor;
        }
    }



    
}

?>