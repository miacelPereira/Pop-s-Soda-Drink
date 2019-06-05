<?php

class Embalagem{
 
    private $id;
    private $nome;
    private $unidade_medida;
    private $peso_bruto;
    private $imposto;
    private $tempo_ressuprimento;
    private $intervalo_ressuprimento;
    private $foto;
    private $localizacao;
    private $quantidade_estoque;

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

    public function getUnidadeMedida(){
        return $this->unidade_medida;
    }

    public function setUnidadeMedida($unidade_medida){
        $this->unidade_medida = $unidade_medida;
    }

    public function getPesoBruto(){
        return $this->peso_bruto;
    }

    public function setPesoBruto($peso_bruto){
        $this->peso_bruto = $peso_bruto;
    }

    public function getImposto(){
        return $this->imposto;
    }

    public function setImposto($imposto){
        $this->imposto = $imposto;
    }

    public function getTempoRessuprimento(){
        return $this->tempo_ressuprimento;
    }

    public function setTempoRessuprimento($tempo_ressuprimento){
        $this->tempo_ressuprimento = $tempo_ressuprimento;
    }

    public function getIntervaloRessuprimento(){
        return $this->intervalo_ressuprimento;
    }

    public function setIntervaloRessuprimento($intervalo_ressuprimento){
        $this->intervalo_ressuprimento = $intervalo_ressuprimento;
    }

    public function getFoto(){
        return $this->foto;
    }

    public function setFoto($foto){
        $this->foto = $foto;
    }

    public function getLocalizacao(){
        return $this->localizacao;
    }

    public function setLocalizacao($localizacao){
        $this->localizacao = $localizacao;
    }

    public function getQuantidadeEstoque(){
        return $this->quantidade_estoque;
    }

    public function setQuantidadeEstoque($quantidade_estoque){
        $this->quantidade_estoque = $quantidade_estoque;
    }

    
}

?>