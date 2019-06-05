<?php

    class Historia{
        private $id;
        private $titulo;
        private $frase;
        private $primeiroTexto;
        private $segundaTexto;
        private $primeiraImagem;
        private $segundaImagem;
        private $ativo;

        public function getId(){ return $this->id; }

        public function setId($id){ $this->id = $id; }

        public function getTitulo(){ return $this->titulo; }

        public function setTitulo($titulo){ $this->titulo = $titulo; }

        public function getFrase(){ return $this->frase; }

        public function setFrase($frase){ $this->frase = $frase; }

        public function getPrimeiroTexto(){ return $this->primeiroTexto; }

        public function setPrimeiroTexto($primeiroTexto){ $this->primeiroTexto = $primeiroTexto; }

        public function getSegundaTexto(){ return $this->segundaTexto; }

        public function setSegundaTexto($segundaTexto){ $this->segundaTexto = $segundaTexto; }

        public function getPrimeiraImagem(){ return $this->primeiraImagem; }

        public function setPrimeiraImagem($primeiraImagem){ $this->primeiraImagem = $primeiraImagem; }
 
        public function getSegundaImagem(){ return $this->segundaImagem; }
 
        public function setSegundaImagem($segundaImagem){ $this->segundaImagem = $segundaImagem; }

        public function getAtivo(){ return $this->ativo; }

        public function setAtivo($ativo){ $this->ativo = $ativo; }
    }

?>