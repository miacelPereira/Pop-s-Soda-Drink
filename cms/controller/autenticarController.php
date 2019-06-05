<?php

// FUNÇÕES SERÃO REQUISITADAS PELO ROUTER

class AutenticarController{
    
    //atributo do tipo objeto que será utilizado por todos os métodos
    //(a instância desse objeto está sendo criada no construtor);
    private $autenticarDao;

    public function __construct(){

        // require_once('model/autenticarClass.php');
        // require_once('model/DAO/autenticarDao.php');

        //instância do contatoDao que foi criado como atributo da classe
        $this->autenticarDao = new AutenticarDao();
    }

    public function autenticar(){

        if($_SERVER['REQUEST_METHOD'] == 'POST'){

            $autenticar = new Autenticar();

            $autenticar->setLogin($_POST['txtLogin']);
            $autenticar->setSenha($_POST['txtPass']);

            //RETORNA obj $user;
            return $this->autenticarDao->autenticar($autenticar);

        }
        

    }

    
}

?>