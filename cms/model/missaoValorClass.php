<?php 
    class MissaoValor{
        private $id;
        private $missao;
        private $valor;
        private $imagem;
        private $visao;
        private $ativo;

        public function getId(){ return $this->id; }

        public function setId($id){ $this->id = $id; }

        public function getMissao(){ return $this->missao; }

        public function setMissao($missao){ $this->missao = $missao; }

        public function getValor(){ return $this->valor; }

        public function setValor($valor){ $this->valor = $valor; }

        public function getImagem(){ return $this->imagem; }

        public function setImagem($imagem){ $this->imagem = $imagem; }
        
        public function getVisao(){ return $this->visao; }

        public function setVisao($visao){ $this->visao = $visao; }

        public function getAtivo(){ return $this->ativo; }

        public function setAtivo($ativo){ $this->ativo = $ativo; }
    }
?>