<?php

class Prateleira{
 
    private $id;
    private $numero;
    private $corredorId;
    private $corredorName;

    public function getId(){
        return $this->id;
    }

    public function setId($id){
        $this->id = $id;
    }

    public function getNumero(){
        return $this->numero;
    }

    public function setNumero($numero){
        $this->numero = $numero;
    }

    public function getCorredorId(){
        return $this->corredorId;
    }
    public function setCorredorId($corredorId){
        $this->corredorId = $corredorId;
    }

    public function getCorredorName(){
        return $this->corredorName;
    }
    public function setCorredorName($corredorName){
        $this->corredorName = $corredorName;
    }

    

    
}

?>