<?php

class Nutricional{
 
    private $id;
    private $idProduto;
    private $elemento;
    private $quantidade;
    private $vd;

    public function getId(){
        return $this->id;
    }
    public function setId($id){
        $this->id = $id;
    }
    
    public function getElemento(){
        return $this->elemento;
    }
    public function setElemento($elemento){
        $this->elemento = $elemento;
    }
    public function getQuantidade(){
        return $this->quantidade;
    }
    public function setQuantidade($quantidade){
        $this->quantidade = $quantidade;
    }
    public function getVd(){
        return $this->vd;
    }
    public function setVd($vd){
        $this->vd = $vd;
    }

    public function getIdProduto(){
        return $this->idProduto;
    }

    public function setIdProduto($idProduto){
        $this->idProduto = $idProduto;
    }
}

?>