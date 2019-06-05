<?php
    class ComunidadeClass
    {
        private $id;
        private $nomeUser;
        private $emailUser;
        private $post;
        private $curtidas;
        private $ativo;


        public function getId()
        {
                return $this->id;
        }

        public function setId($id)
        {
                $this->id = $id;
        }

        public function getNomeUser()
        {
                return $this->nomeUser;
        }

        public function setNomeUser($nomeUser)
        {
                $this->nomeUser = $nomeUser;

        }
 
        public function getEmailUser()
        {
                return $this->emaiUser;
        }

        
        public function setEmailUser($emaiUser)
        {
                $this->emaiUser = $emaiUser;
        }


        public function getPost()
        {
                return $this->post;
        }

        public function setPost($post)
        {
                $this->post = $post;
        }

       
        public function getCurtidas()
        {
                return $this->curtidas;
        }

    
      
        public function setCurtidas($curtidas)
        {
                $this->curtidas = $curtidas;

        }

        public function getAtivo()
        {
                return $this->ativo;
        }

    
      
        public function setAtivo($ativo)
        {
                $this->ativo = $ativo;

        }
    }
    
?>