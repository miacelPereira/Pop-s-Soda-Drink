<?php

class EmbalagemController{

    private $embalagemDao;

    public function __construct(){
        $this->embalagemDao = new EmbalagemDao();
    }

    public function getAll(){

        return $this->embalagemDao->selectAll();
    }

}

?>