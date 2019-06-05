<?php

    class ComunidadeController
    {

        private $comunidadeController;

        public function __construct(){
            $this->comunidadeDao = new ComunidadeDao();
        }

        public function listarComunidade(){
            return $this->comunidadeDao->selectAll();
        }

        public function comunidade($id){
            return $this->comunidadeDao->selectOne($id);
        }

        public function deletePost($id){
             $this->comunidadeDao->deletePost($id);
        }
        public function disablePost($id, $ativo){
             $this->comunidadeDao->disablePost($id, $ativo);
        }





    }


?>