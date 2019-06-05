<?php
class EventosClass{

    private $id;
    private $nome;
    private $endereco;
    private $data;
    private $hora;

 
    //Construtor
    public function __construct(){

    }

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
    public function getEndereco(){
        return $this->endereco;
    }

    public function setEndereco($endereco){
        $this->endereco = $endereco;
    }
    public function getData(){
        return $this->data;
    }

    public function setData($data){
        $this->data = $data;
    }
    public function getHora(){
        return $this->hora;
    }

    public function setHora($hora){
        $this->hora = $hora;
    }



}
?>