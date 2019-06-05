<?php
    class LojaController{
        private $dao;
        
        public function __construct(){ $this->dao = new LojasDao(); }
        public function getAll(){ return $this->dao->selectAll(); }
        public function getOne($id){ return $this->dao->selectOne($id); }
        public function delete($id){ $this->dao->delete($id); }
        public function disable($id, $ativo){ $this->dao->disable($id, $ativo); }
    }
?>