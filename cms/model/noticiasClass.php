<?php
    class Noticias{
        private $id;
        private $titulo;
        private $subTitulo;
        private $introducao;
        private $imagem;
        private $texto;
        private $ativo;

        public function getTitulo(){ return $this->titulo; }

        public function setTitulo($titulo){ $this->titulo = $titulo; }

        public function getIntroducao(){ return $this->introducao; }

        public function setIntroducao($introducao){ $this->introducao = $introducao; }

        public function getImagem(){ return $this->imagem; }

        public function setImagem($imagem){ $this->imagem = $imagem; }

        public function getTexto(){ return $this->texto; }

        public function setTexto($texto){ $this->texto = $texto; }

        public function getId(){ return $this->id; }

        public function setId($id){ $this->id = $id; }

        public function getAtivo(){ return $this->ativo; }

        public function setAtivo($ativo){ $this->ativo = $ativo; }
    
        public function getSubTitulo(){ return $this->subTitulo; }

        public function setSubTitulo($subTitulo){ $this->subTitulo = $subTitulo; }
    }
?>