<?php
    class Promocao{

        private $idPromocao;
        private $nome;
        private $descricao;
        private $regulamento;
        private $fotoPromocao;
        private $idTipoPromocao;
        private $ativo;
        private $maxCodigo;

        /* GETTERS E SETTERS */

        public function getIdPromocao(){ return $this->idPromocao; }

        public function setIdPromocao($idPromocao){ $this->idPromocao = $idPromocao; }

        public function getNome(){ return $this->nome; }

        public function setNome($nome){ $this->nome = $nome; }

        public function getDescricao(){ return $this->descricao; }

        public function setDescricao($descricao){ $this->descricao = $descricao; }

        public function getRegulamento(){ return $this->regulamento; }

        public function setRegulamento($regulamento){ $this->regulamento = $regulamento; }

        public function getFotoPromocao(){ return $this->fotoPromocao; }

        public function setFotoPromocao($fotoPromocao){ $this->fotoPromocao = $fotoPromocao; }

        public function getIdTipoPromocao(){ return $this->idTipoPromocao; }

        public function setIdTipoPromocao($idTipoPromocao){ $this->idTipoPromocao = $idTipoPromocao; }

        public function getAtivo(){ return $this->ativo; }

        public function setAtivo($ativo){ $this->ativo = $ativo; }

        public function getMaxCodigo(){ return $this->maxCodigo; }

        public function setMaxCodigo($maxCodigo){ $this->maxCodigo = $maxCodigo; }
    }
?>