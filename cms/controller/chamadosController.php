<?php

    class ChamadosController
    {

        private $chamadosController;

        public function __construct(){
            $this->chamadosDao = new ChamadosDao();
        }

        public function listarChamados(){
            return $this->chamadosDao->selectAll();
        }
        public function chamados($id){
            return $this->chamadosDao->selectOne($id);
        }

        public function deleteChamados($id){
             $this->chamadosDao->deleteChamados($id);
        }
    }
?>