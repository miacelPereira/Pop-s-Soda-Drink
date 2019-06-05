<?php

/*
    Projeto: Padronizando CRUD em MVP; ORIENTADO A OBJETOS;
    Criado por: Elimarp
    Data Criação: 11/03/2019
    Última modificação: 
    Conteúdo modificado:
    Modificado por: 

    Objetivo: Classe de contatos
*/

class PermissaoCms{

    private $id;

    //nome
    private $descricao;

    //Descrição padrão ou personalizada (1 ou 0);
    private $padrao;

    // Ativo ou Desativo (0 ou 1);
    private $status;

    //SITE PESSOA FISICA
    private $pfHome;
    private $pfHistoria;
    private $pfProduto;
    private $pfBrindes;
    private $pfNoticias;
    private $pfDivulgacao;
    private $pfVideos;
    private $pfPatrocinados;
    private $pfEventos;
    private $pfNossasLojas;
    private $pfPromocoes;
    private $pfFaleConosco;
    private $pfPopsNaEscola;
    private $pfMissaoValores;
    
    //CMS
    private $cmsUser;
    

    public function __construct(){

    }

    public function getId(){
        return $this->id;
    }

    public function setId($id){
        $this->id = $id;
    }

    public function getDescricao(){
        return $this->descricao;
    }

    public function setDescricao($descricao){
        $this->descricao = $descricao;
    }

    public function getPadrao(){
        return $this->padrao;
    }

    public function setPadrao($padrao){
        $this->padrao = $padrao;
    }

    public function getStatus(){
        return $this->status;
    }

    public function setStatus($status){
        $this->status = $status;
    }
 
    // GETTERs and SETTERs - PF
    public function getPfHome(){
        return $this->pfHome;
    }

    public function setPfHome($pfHome){
        $this->pfHome = $pfHome;
    }
    
    public function getPfHistoria(){
        return $this->pfHistoria;
    }

    public function setPfHistoria($pfHistoria){
        $this->pfHistoria = $pfHistoria;
    }
    public function getPfProduto(){
        return $this->pfProduto;
    }

    public function setPfProduto($pfProduto){
        $this->pfProduto = $pfProduto;
    }
    public function getPfBrindes(){
        return $this->pfBrindes;
    }

    public function setPfBrindes($pfBrindes){
        $this->pfBrindes = $pfBrindes;
    }
    public function getPfNoticias(){
        return $this->pfNoticias;
    }

    public function setPfNoticias($pfNoticias){
        $this->pfNoticias = $pfNoticias;
    }
    public function getPfDivulgacao(){
        return $this->pfDivulgacao;
    }

    public function setPfDivulgacao($pfDivulgacao){
        $this->pfDivulgacao = $pfDivulgacao;
    }
    public function getPfVideos(){
        return $this->pfVideos;
    }

    public function setPfVideos($pfVideos){
        $this->pfVideos = $pfVideos;
    }
    public function getPfPatrocinados(){
        return $this->pfPatrocinados;
    }

    public function setPfPatrocinados($pfPatrocinados){
        $this->pfPatrocinados = $pfPatrocinados;
    }
    public function getPfEventos(){
        return $this->pfEventos;
    }

    public function setPfEventos($pfEventos){
        $this->pfEventos = $pfEventos;
    }
    public function getPfNossasLojas(){
        return $this->pfNossasLojas;
    }

    public function setPfNossasLojas($pfNossasLojas){
        $this->pfNossasLojas = $pfNossasLojas;
    }
    public function getPfPromocoes(){
        return $this->pfPromocoes;
    }

    public function setPfPromocoes($pfPromocoes){
        $this->pfPromocoes = $pfPromocoes;
    }
    public function getPfFaleConosco(){
        return $this->pfFaleConosco;
    }

    public function setPfFaleConosco($pfFaleConosco){
        $this->pfFaleConosco = $pfFaleConosco;
    }
    public function getPfPopsNaEscola(){
        return $this->pfPopsNaEscola;
    }

    public function setPfPopsNaEscola($pfPopsNaEscola){
        $this->pfPopsNaEscola = $pfPopsNaEscola;
    }
    public function getPfMissaoValores(){
        return $this->pfMissaoValores;
    }

    public function setPfMissaoValores($pfMissaoValores){
        $this->pfMissaoValores = $pfMissaoValores;
    }

    // GETTERs and SETTERs - CMS
    public function getCmsUser(){
        return $this->cmsUser;
    }

    public function setCmsUser($cmsUser){
        $this->cmsUser = $cmsUser;
    }

}

?>