<?php
class HomeClass{

    private $id;
    private $titulo;
    private $subtitulo;
    private $produtoUm;
    private $produtoDois;
    private $produtoTres;
    private $enquete;
    private $postUm;
    private $postDois;
    private $postTres;
    private $postQuatro;
    private $promocao;
    private $eventoUm;
    private $eventoDois;
    private $eventoTres;

 
    //Construtor da página home
    public function __construct(){

    }

    public function getId(){
        return $this->id;
    }

    public function setId($id){
        $this->id = $id;
    }
    public function getTitulo(){
        return $this->titulo;
    }

    public function setTitulo($titulo){
        $this->titulo = $titulo;
    }
    public function getSubtitulo(){
        return $this->subtitulo;
    }

    public function setSubtitulo($subtitulo){
        $this->subtitulo = $subtitulo;
    }
    public function getProdutoUm(){
        return $this->produtoUm;
    }

    public function setProdutoUm($produtoUm){
        $this->produtoUm = $produtoUm;
    }
    public function getProdutoDois(){
        return $this->produtoDois;
    }

    public function setProdutoDois($produtoDois){
        $this->produtoDois = $produtoDois;
    }
    public function getProdutoTres(){
        return $this->produtoTres;
    }

    public function setProdutoTres($produtoTres){
        $this->produtoTres = $produtoTres;
    }
    public function getEnquete(){
        return $this->enquete;
    }

    public function setEnquete($enquete){
        $this->enquete = $enquete;
    }
    public function getPostUm(){
        return $this->postUm;
    }

    public function setPostUm($postUm){
        $this->postUm = $postUm;
    }
    public function getPostDois(){
        return $this->postDois;
    }

    public function setPostDois($postDois){
        $this->postDois = $postDois;
    }
    public function getPostTres(){
        return $this->postTres;
    }

    public function setPostTres($postTres){
        $this->postTres = $postTres;
    }
    public function getPostQuatro(){
        return $this->postQuatro;
    }

    public function setPostQuatro($postQuatro){
        $this->postQuatro = $postQuatro;
    }
    public function getPromocao(){
        return $this->promocao;
    }

    public function setPromocao($promocao){
        $this->promocao = $promocao;
    }
    public function getEventoUm(){
        return $this->eventoUm;
    }

    public function setEventoUm($eventoUm){
        $this->eventoUm = $eventoUm;
    }
    public function getEventoDois(){
        return $this->eventoDois;
    }

    public function setEventoDois($eventoDois){
        $this->eventoDois = $eventoDois;
    }
    public function getEventoTres(){
        return $this->eventoTres;
    }

    public function setEventoTres($eventoTres){
        $this->eventoTres = $eventoTres;
    }



}
?>