<?php
class VideosClass{

    private $id;
    private $nome;
    private $endereco;
    private $visualizacoes;
    private $status;
 
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
    public function getVisualizacoes(){
        return $this->visualizacoes;
    }

    public function setVisualizacoes($visualizacoes){
        $this->visualizacoes = $visualizacoes;
    }
    public function getStatus(){
        return $this->status;
    }

    public function setStatus($status){
        $this->status = $status;
    }



}
?>