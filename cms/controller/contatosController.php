<?php

// FUNÇÕES SERÃO REQUISITADAS PELO ROUTER

class ContatosController{
    
    
    private $contatosController;
    //Construtor
    public function __construct(){
       
        
        $this->contatosDao = new ContatosDao();
    }

    public function inserirContato(){

        if($_SERVER['REQUEST_METHOD'] == 'POST'){

            $contatosClass = new ContatosClass();

            $contatosClass->setNome($_POST['txtNome']);
            $contatosClass->setSobrenome($_POST['txtEmail']);

            return $this->contatosDao->insert($contatosClass);
        }
    }
    public function deletarContato($id){

       return $this->contatosDao->delete($id);
        
        
     }
    public function listarContatos(){

        return $this->contatosDao->selectAll();
    }
}
   
?>