<?php

    class RespostaPromocaoController{
        
        private $dao;

        public function __construct(){ $this->dao = new RespostaPromocaoDao(); }

        public function selectAll(){ $this->dao->selectAll(); }
        
    }

?>