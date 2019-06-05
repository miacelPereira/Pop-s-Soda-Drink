<?php

class Produto{
 
    private $id;
    private $nome;
    private $descricao;
    private $img;
    private $pesoBruto;
    private $imposto;
    private $demandaMensal;
    private $tempoRessuprimento;
    private $intervaloRessuprimento;
    private $quantidadeEstoque;
    private $precoUnidade;
    private $quantidadeFardo;
    private $localizacao;
    private $embalagem;
    private $idUnidadeMedida;
    private $quantidadeMedida;
    private $ativo;

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

    public function getDescricao(){
        return $this->descricao;
    }

    public function setDescricao($descricao){
        $this->descricao = $descricao;
    }

    public function getImg(){
        return $this->img;
    }

    public function setImg($img){
        $this->img = $img;
    }

    public function getPeso(){
        return $this->pesoBruto;
    }

    public function setPeso($pesoBruto){
        $this->pesoBruto = $pesoBruto;
    }

    public function getImposto(){
        return $this->imposto;
    }

    public function setImposto($imposto){
        $this->imposto = $imposto;
    }

    public function getDemandaMensal(){
        return $this->demandaMensal;
    }

    public function setDemandaMensal($demandaMensal){
        $this->demandaMensal = $demandaMensal;
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

    public function getQuantidadeEstoque(){
        return $this->quantidadeEstoque;
    }

    public function setQuantidadeEstoque($quantidadeEstoque){
        $this->quantidadeEstoque = $quantidadeEstoque;
    }

    public function getPrecoUnidade(){
        return $this->precoUnidade;
    }

    public function setPrecoUnidade($precoUnidade){
        $this->precoUnidade = $precoUnidade;
    }

    public function getQuantidadeFardo(){
        return $this->quantidadeFardo;
    }

    public function setQuantidadeFardo($quantidadeFardo){
        $this->quantidadeFardo = $quantidadeFardo;
    }

    // public function getPrecoFardo(){
    //     return $this->precoFardo;
    // }

    // public function setPrecoFardo($precoFardo){
    //     $this->precoFardo = $precoFardo;
    // }

    public function getLocalizacao(){
        return $this->localizacao;
    }

    public function setLocalizacao($localizacao){
        $this->localizacao = $localizacao;
    }

    public function getEmbalagem(){
        return $this->embalagem;
    }

    public function setEmbalagem($embalagem){
        $this->embalagem = $embalagem;
    }

    public function getUnidadeMedida(){
        return $this->idUnidadeMedida;
    }

    public function setUnidadeMedida($idUnidadeMedida){
        $this->idUnidadeMedida = $idUnidadeMedida;
    }

    public function getQuantidadeMedida(){
        return $this->quantidadeMedida;
    }

    public function setQuantidadeMedida($quantidadeMedida){
        $this->quantidadeMedida = $quantidadeMedida;
    }

    public function getAtivo(){
        return $this->ativo;
    }

    public function setAtivo($ativo){
        $this->ativo = $ativo;
    }

    
}

?>