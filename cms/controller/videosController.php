<?php

// FUNÇÕES SERÃO REQUISITADAS PELO ROUTER

class VideosController{
    
    
    private $videosController;
    //Construtor
    public function __construct(){
       
        
        $this->videosDao = new VideosDao();
    }

    public function inserirVideo(){

        if($_SERVER['REQUEST_METHOD'] == 'POST'){

            $videosClass = new VideosClass();

            $videosClass->setNome($_POST['txtNome']);
            $videosClass->setEndereco($_POST['txtEndereco']);
            


            return $this->videosDao->insert($videosClass);
        }
    }
    public function deletarVideo($id){

       return $this->videosDao->delete($id);
        
        
     }
    public function editarVideo(){

        if($_SERVER['REQUEST_METHOD'] == 'POST'){

            $videosClass = new VideosClass();
            
            $videosClass->setId($_GET['id']);       
            $videosClass->setNome($_POST['txtNome']);
            $videosClass->setEndereco($_POST['txtEndereco']);

            return $this->videosDao->update($videosClass);
        }
    }
    public function getVideo($id){

        return $this->videosDao->selectById($id);
    }
    public function listarVideos(){

        return $this->videosDao->selectAll();
    }
}
   
?>