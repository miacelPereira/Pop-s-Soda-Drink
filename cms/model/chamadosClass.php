<?php

    class ChamadosClass
    {
        private $id;
        private $empresa;
        private $produto;
        private $quantidade;
        private $descricao;

        public function getId()
        {
                return $this->id;
        }

        public function setId($id)
        {
                $this->id = $id;
        }

        public function getEmpresa()
        {
                return $this->empresa;
        }

        public function setEmpresa($empresa)
        {
                $this->empresa = $empresa;
        }


        public function getProduto()
        {
                return $this->produto;
        }

       
        public function setProduto($produto)
        {
                $this->produto = $produto;
        }
        public function getQuantidade()
        {
                return $this->quantidade;
        }
 
        public function setQuantidade($quantidade)
        {
                $this->quantidade = $quantidade;
        }

        public function getDescricao()
        {
                return $this->descricao;
        }

        public function setDescricao($descricao)
        {
                $this->descricao = $descricao;
        }
    }



?>
