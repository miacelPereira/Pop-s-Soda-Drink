<?php

/*
    Projeto: Padronizando CRUD em MVP; ORIENTADO A OBJETOS;
    Criado por: Stéfany
    Data Criação: 28/04/2019
    Última modificação: 
    Conteúdo modificado:
    Modificado por: 

    Objetivo: Classe de brinde
*/

class BrindeCms{

    private $id;
    private $nome;
    private $descricao;
    private $preco;
    private $foto;
    private $status;


    public function __construct(){

    }


    //get
    public function getId(){
        return $this->id;
    }

    public function getNome(){
        return $this->nome;
    }

    public function getDescricao(){
        return $this->descricao;
    }

    public function getPreco(){
        return $this->preco;
    }

    public function getFoto(){
        return $this->foto;
    }

    public function getStatus(){
        return $this->status;
    }

    // set
    public function setId($id){
        $this->id = $id;
    }

    public function setNome($nome){
        $this->nome = $nome;
    }

    public function setDescricao($descricao){
        $this->descricao = $descricao;
    }

    public function setPreco($preco){
        $this->preco = $preco;
    }

    public function setFoto($foto){
        $this->foto = $foto;
    }

    public function setStatus($status){
        $this->status = $status;
    }

}

?>
