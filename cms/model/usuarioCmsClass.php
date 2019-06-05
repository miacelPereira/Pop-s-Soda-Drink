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

class UsuarioCms{

    private $id;
    private $nome;
    private $login;
    private $senha;
    private $idPermissao;
    private $permissao;

    public function __construct(){

        // require_once('permissaoCmsClass.php');

        $this->permissao = new PermissaoCms();
    }

    public function getId(){
        return $this->id;
    }
    public function getNome(){
        return $this->nome;
    }
    public function getLogin(){
        return $this->login;
    }
    public function getSenha(){
        return $this->senha;
    }
    public function getIdPermissao(){
        return $this->idPermissao;
    }
    public function getPermissao(){
        return $this->permissao;
    }

    // public function getPermissao(){

    //     require_once('DAO/permissaoDao.php');
    //     $permissaoDao = new PermissaoDao();
        
    //     $this->permissao->$permissaoDao->getPermissao($idPermissao);

    //     //RETORNA objeto permissao;
    //     return $this->permissao;
    // }

    public function setId($id){
        $this->id = $id;
    }
    public function setNome($nome){
        $this->nome = $nome;
    }
    public function setLogin($login){
        $this->login = $login;
    }
    public function setSenha($senha){
        $this->senha = $senha;
    }
    public function setIdPermissao($idPermissao){
        $this->idPermissao = $idPermissao;
    }
    
    public function setPermissao($permissao){
        $this->permissao = $permissao;
    }



}

?>