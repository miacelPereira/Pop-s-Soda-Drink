<?php

// FUNÇÕES SERÃO REQUISITADAS PELO ROUTER

class FaleConoscoController{
    
    
    private $faleConoscoController;
    //Construtor
    public function __construct(){  
        $this->faleConoscoDao = new FaleConoscoDao();
    }

    public function inserirMensagens(){

        if($_SERVER['REQUEST_METHOD'] == 'POST'){

            $faleClass = new FaleConoscoClass();

            $faleClass->setNome($_POST['txtNome']);
            $faleClass->setSobrenome($_POST['txtSobrenome']);
            $faleClass->setEmail($_POST['txtEmail']);
            $faleClass->setTelefone($_POST['txtTelefone']);
            $faleClass->setCelular($_POST['txtCelular']);
            $faleClass->setCategoria($_POST['txtCategoriaAssunto']);
            $faleClass->setMensagem($_POST['txtMensagem']);
            


            return $this->faleConoscoDao->insert($faleClass);
        }
    }


    public function getMensagem($id){

        return $this->faleConoscoDao->selectById($id);
    }

    public function listUsuarios(){

        return $this->faleConoscoDao->selectAll();
    }

    public function deletarMensagem($id){

       return $this->faleConoscoDao->delete($id);
        
     }

}
   
?>