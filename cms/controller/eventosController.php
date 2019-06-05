<?php

// FUNÇÕES SERÃO REQUISITADAS PELO ROUTER

class EventosController{
    
    
    private $eventosController;
    //Construtor
    public function __construct(){
       
        
        $this->eventosDao = new EventosDao();
    }
    public function inserirEvento(){

        if($_SERVER['REQUEST_METHOD'] == 'POST'){

            $eventosClass = new EventosClass();

            $eventosClass->setNome($_POST['txtNome']);
            $eventosClass->setEndereco($_POST['txtEndereco']);
            $eventosClass->setData($_POST['txtData']);
            $eventosClass->setHora($_POST['txtHora']);

            return $this->eventosDao->insert($eventosClass);
        }
    }
    public function editarEvento(){

        if($_SERVER['REQUEST_METHOD'] == 'POST'){

            $eventosClass = new EventosClass();
            
            $eventosClass->setId($_GET['id']);       
            $eventosClass->setNome($_POST['txtNome']);
            $eventosClass->setEndereco($_POST['txtEndereco']);
            $eventosClass->setData($_POST['txtData']);
            $eventosClass->setHora($_POST['txtHora']);

            return $this->eventosDao->update($eventosClass);
        }
    }
    public function getPermissao($id){

        return $this->permissaoDao->getPermissao($id);

    }
    public function deletarEvento($id){

       return $this->eventosDao->delete($id);
        
        
     }
    public function getEvento($id){

        return $this->eventosDao->selectById($id);
    }
    public function listarEventos(){

        return $this->eventosDao->selectAll();
    }
}
   
?>