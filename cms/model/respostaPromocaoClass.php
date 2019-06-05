<?php
    class RespostaPromocao{
        
        private $id;
        private $idPesssoaFisica;
        private $resposta;

        /* GETTERS E SETTERS */
        public function getId(){ return $this->id; }

        public function setId($id){ $this->id = $id; }

        public function getIdPesssoaFisica(){ return $this->idPesssoaFisica; }

        public function setIdPesssoaFisica($idPesssoaFisica){ $this->idPesssoaFisica = $idPesssoaFisica; }

        public function getResposta(){ return $this->resposta; }

        public function setResposta($resposta){ $this->resposta = $resposta; }
        
    }
?>