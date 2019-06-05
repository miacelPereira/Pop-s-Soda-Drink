<?php

class UsuarioController{
    
    private $dao;

    public function __construct(){

        $this->dao = new UsuarioDao();
    }

    function autenticar(){
        return $this->dao->autenticar($_POST['txtLogin'], $_POST['txtPass']);
    }

    function cadastrar(){
        
        $user = New Usuario();

        $user->setEmail($_POST['txtEmail']);
        $user->setCnpj($_POST['txtCnpj']);
        $user->setRazaoSocial($_POST['txtRazaoSocial']);
        $user->setNomeFantasia($_POST['txtNomeFantasia']);
        $user->setRenda($_POST['txtRenda']);
        $user->setTipoEstabelecimento($_POST['txtTipo']);
        $user->setCep($_POST['txtCep']);
        $user->setEndereco($_POST['txtEndereco']);
        $user->setBairro($_POST['txtBairro']);
        $user->setCidade($_POST['txtCidade']);
        $user->setUf($_POST['txtUf']);
        $user->setNumero($_POST['txtNumero']);
        $user->setResponsavel($_POST['txtResponsavel']);
        $user->setTelefone($_POST['txtTelefone']);
        $user->setSenha($_POST['txtPass2']);

        return $this->dao->insert($user);
    }
}


?>