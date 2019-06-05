<?php

    class FotoPopComVoce{
        private $id;
        private $url_foto;
        private $ativo;
        private $titulo;
        private $slide;

        /* GETTERS E SETTERS */
        public function getId(){ return $this->id; }

        public function setId($id){ $this->id = $id; }

        public function getUrl_foto(){ return $this->url_foto;}

        public function setUrl_foto($url_foto){ $this->url_foto = $url_foto; }

        public function getAtivo(){ return $this->ativo; }

        public function setAtivo($ativo){ $this->ativo = $ativo; }

        public function getTitulo(){ return $this->titulo; }

        public function setTitulo($titulo){ $this->titulo = $titulo; }

        public function getSlide(){ return $this->slide; }

        public function setSlide($slide){ $this->slide = $slide; }
    }

?>