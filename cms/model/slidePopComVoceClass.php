<?php
    class SlidePopComVoce{
        private $id;
        private $nome;
        private $ativo;

        /* GETTERS E SETTERS */
        public function getId(){ return $this->id; }

        public function setId($id){ $this->id = $id; }

        public function getNome(){ return $this->nome; }

        public function setNome($nome){ $this->nome = $nome; }

        public function getAtivo(){ return $this->ativo; }

        public function setAtivo($ativo){ $this->ativo = $ativo; }

    }
?>