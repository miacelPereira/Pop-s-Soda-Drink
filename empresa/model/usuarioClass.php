<?php

class Usuario{

    private $id;
    private $cnpj;
    private $email;
    private $senha;

    private $razaoSocial;
    private $nomeFantasia;
    private $rendaMensal;
    private $tipoEstabelecimento;
    private $foto;
    private $cep;
    private $endereco;
    private $bairro;
    private $cidade;
    private $uf;
    private $numero;
    private $nomeResponsavel;
    private $telefone;
    private $verificacao;
    
    

    public function getId(){
        return $this->id;
    }
    public function setId($id){
        $this->id = $id;
    }

    public function getEmail(){
        return $this->email;
    }
    public function setEmail($email){
        $this->email = $email;
    }
    public function getSenha(){
        return $this->senha;
    }
    public function setSenha($senha){
        $this->senha = $senha;
    }
    public function getCnpj(){
        return $this->senha;
    }
    public function setCnpj($cnpj){
        $this->cnpj = $cnpj;
    }
    public function getRazaoSocial(){
        return $this->razaoSocial;
    }
    public function setRazaoSocial($razaoSocial){
        $this->razaoSocial = $razaoSocial;
    }
    public function getNomeFantasia(){
        return $this->nomeFantasia;
    }
    public function setNomeFantasia($nomeFantasia){
        $this->nomeFantasia = $nomeFantasia;
    }
    public function getRenda(){
        return $this->rendaMensal;
    }
    public function setRenda($rendaMensal){
        $this->rendaMensal = $rendaMensal;
    }
    public function getTipoEstabelecimento(){
        return $this->tipoEstabelecimento;
    }
    public function setTipoEstabelecimento($tipoEstabelecimento){
        $this->tipoEstabelecimento = $tipoEstabelecimento;
    }
    public function getCep(){
        return $this->cep;
    }
    public function setCep($cep){
        $this->cep = $cep;
    }
    public function getFoto(){
        return $this->foto;
    }
    public function setFoto($foto){
        $this->foto = $foto;
    }
    public function getEndereco(){
        return $this->endereco;
    }
    public function setEndereco($endereco){
        $this->endereco = $endereco;
    }
    public function getBairro(){
        return $this->bairro;
    }
    public function setBairro($bairro){
        $this->bairro = $bairro;
    }
    public function getCidade(){
        return $this->cidade;
    }
    public function setCidade($cidade){
        $this->cidade = $cidade;
    }
    public function getUf(){
        return $this->uf;
    }
    public function setUf($uf){
        $this->uf = $uf;
    }
    public function getNumero(){
        return $this->numero;
    }
    public function setNumero($numero){
        $this->numero = $numero;
    }
    public function getResponsavel(){
        return $this->nomeResponsavel;
    }
    public function setResponsavel($nomeResponsavel){
        $this->nomeResponsavel = $nomeResponsavel;
    }
    public function getTelefone(){
        return $this->telefone;
    }
    public function setTelefone($telefone){
        $this->telefone = $telefone;
    }
    public function getVerificacao(){
        return $this->verificacao;
    }
    public function setVerificacao($verificacao){
        $this->verificacao = $verificacao;
    }
}

?>