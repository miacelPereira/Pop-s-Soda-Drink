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

class Autenticar{

    private $login;
    private $senha;

    public function getLogin(){
        return $this->login;
    }
    public function getSenha(){
        return $this->senha;
    }

    public function setLogin($login){
        $this->login = $login;
    }
    public function setSenha($senha){
        $this->senha = $senha;
    }

}

?>