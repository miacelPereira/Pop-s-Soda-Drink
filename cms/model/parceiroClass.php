<?php 
    Class Parceiro{
        private $id;
        private $imagem;
        private $nome;
        private $modalidade;
        private $ativo;
        private $pais;

        public function getId(){ return $this->id; }

        public function setId($id){ $this->id = $id; }

        public function getImagem(){ return $this->imagem; }

        public function setImagem($imagem){ $this->imagem = $imagem; }

        public function getNome(){ return $this->nome; }

        public function setNome($nome){ $this->nome = $nome; }

        public function getModalidade(){ return $this->modalidade; }

        public function setModalidade($modalidade){ $this->modalidade = $modalidade; }

        public function getAtivo(){ return $this->ativo; }

        public function setAtivo($ativo){ $this->ativo = $ativo; }

        public function getPais(){ return $this->pais; }

        public function setPais($pais){ $this->pais = $pais; }
    }
?>