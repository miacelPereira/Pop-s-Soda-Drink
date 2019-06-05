<?php

class UniMedida{
 
    private $id;
    private $nome;
    private $abrev;

    public function getId(){
        return $this->id;
    }

    public function setId($id){
        $this->id = $id;
    }

    public function getNome(){
        return $this->nome;
    }

    public function setNome($nome){
        $this->nome = $nome;
    }

    public function getAbrev(){
        return $this->abrev;
    }

    public function setAbrev($abrev){
        $this->abrev = $abrev;
    }

    
}

?>