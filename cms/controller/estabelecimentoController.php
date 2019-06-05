<?php 
    class EstabelecimentoController{
        private $dao;
        
        public function __construct(){ $this->dao = new EstabelecimentoDao(); }
        public function getAll(){ return $this->dao->selectAll(); }
        public function getOne($id){ return $this->dao->selectOne($id); }
        public function deleteDivul($id){ $this->dao->delete($id); }
        public function disableDivul($id, $ativo){ $this->dao->disable($id, $ativo); }

    }
?>