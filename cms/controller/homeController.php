<?php

// FUNÇÕES SERÃO REQUISITADAS PELO ROUTER

class HomeController{
    
    
    private $homeController;
    //Construtor
    public function __construct(){
       
        
        $this->homeDao = new HomeDao();
    }
    public function inserir(){

        if($_SERVER['REQUEST_METHOD'] == 'POST'){

            $homeClass = new HomeClass();

            $homeClass->setTitulo($_POST['txtTitulo']);
            $homeClass->setSubtitulo($_POST['txtSubtitulo']);
            $homeClass->setProdutoUm($_POST['txtProdutoUm']);
            $homeClass->setProdutoDois($_POST['txtProdutoDois']);
            $homeClass->setProdutoTres($_POST['txtProdutoTres']);
            $homeClass->setEnquete($_POST['txtEnquete']);
            $homeClass->setPostUm($_POST['txtPostUm']);
            $homeClass->setPostDois($_POST['txtPostDois']);
            $homeClass->setPostTres($_POST['txtPostTres']);
            $homeClass->setPostQuatro($_POST['txtPostQuatro']);
            $homeClass->setPromocao($_POST['txtMensagemPromocao']);
            $homeClass->setEventoUm($_POST['txtEventoUm']);
            $homeClass->setEventoDois($_POST['txtEventoDois']);
            $homeClass->setEventoTres($_POST['txtEventoTres']);

            return $this->homeDao->inserir($homeClass);
        }
    }
    public function editarPagina(){

        if($_SERVER['REQUEST_METHOD'] == 'POST'){

            $eventosClass = new EventosClass();
            
            $homeClass->setId($_GET['id']);       
            $homeClass->setNome($_POST['txtNome']);
            $homeClass->setEndereco($_POST['txtEndereco']);
            $homeClass->setData($_POST['txtData']);
            $homeClass->setHora($_POST['txtHora']);

            return $this->homeDao->update($homeClass);
        }
    }
    public function deletar($id){

       return $this->homeDao->delete($id);
        
        
     }
    public function getPagina($id){

        return $this->homeDao->selectById($id);
    }
    public function listarPaginas(){

        return $this->homeDao->selectAll();
    }
}
   
?>