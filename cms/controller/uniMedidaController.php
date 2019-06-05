<?php

class UniMedidaController{
    private $uniMedidaDao;
    public function __construct(){
        $this->uniMedidaDao = new UniMedidaDao();
    }
    public function getAll(){
        return $this->uniMedidaDao->selectAll();
    }
}

?>