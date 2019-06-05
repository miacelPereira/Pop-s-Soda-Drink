<?php

class PrateleiraController{

    private $prateleiraDao;

    public function __construct(){
        $this->prateleiraDao = new PrateleiraDao();
    }

    public function getAll(){

        return $this->prateleiraDao->selectAll();
    }

}

?>