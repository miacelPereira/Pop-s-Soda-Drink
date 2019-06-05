<?php

class pagHistoria{

    private $id;

    private $descricao;
    private $titulo;
    private $frase;
    private $imagem1;
    private $imagem2;
    private $texto1;
    private $texto2;
 

    public function __construct(){

    }

    public function getId(){
        return $this->id;
    }

    public function setId($id){
        $this->id = $id;
    }


}

?>