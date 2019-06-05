<?php
    class Estabelecimento{
        private $idDivulgacao;
        private $nome;
        private $nomeEvento;
        private $endereco;
        private $imagem;
        private $data;
        private $idPessoaJuridica;
        private $ativo;

        //Getters e Setters
        public function getIdDivulgacao(){ return $this->idDivulgacao; }

        public function setIdDivulgacao($idDivulgacao){ $this->idDivulgacao = $idDivulgacao; }

        public function getNome(){ return $this->nome; }

        public function setNome($nome){ $this->nome = $nome; }

        public function getNomeEvento(){ return $this->nomeEvento; }

        public function setNomeEvento($nomeEvento){ $this->nomeEvento = $nomeEvento; }

        public function getEndereco(){ return $this->endereco; }

        public function setEndereco($endereco){ $this->endereco = $endereco; }
 
        public function getImagem(){ return $this->imagem; }

        public function setImagem($imagem){ $this->imagem = $imagem; }

        public function getData(){ return $this->data; }

        public function setData($data){ $this->data = $data; }

        public function getIdPessoaJuridica(){ return $this->idPessoaJuridica; }

        public function setIdPessoaJuridica($idPessoaJuridica){ $this->idPessoaJuridica = $idPessoaJuridica; }
        
        public function getAtivo(){ return $this->ativo; }

        public function setAtivo($ativo){ $this->ativo = $ativo; }
    }
?>