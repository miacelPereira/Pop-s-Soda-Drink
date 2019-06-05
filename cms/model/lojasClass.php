<?php 
class Loja{
    private $id;
    private $nome;
    private $endereco;
    private $cidade;
    private $uf;
    private $numero;
    private $imagem;
    private $ativo;
    private $urlMap;

    public function getImagem(){ return $this->imagem; }

    public function setImagem($imagem)
    {
        $this->imagem = $imagem;

    }
 
    public function getNumero()
    {
        return $this->numero;
    }

    public function setNumero($numero)
    {
        $this->numero = $numero;

    }
 
    public function getUf()
    {
        return $this->uf;
    }
 
    public function setUf($uf)
    {
        $this->uf = $uf;
    }

    public function getCidade()
    {
        return $this->cidade;
    }
 
    public function setCidade($cidade)
    {
        $this->cidade = $cidade;

    }

    public function getEndereco()
    {
        return $this->endereco;
    }
 
    public function setEndereco($endereco)
    {
        $this->endereco = $endereco;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    public function getId()
    {
        return $this->id;
    }
 
    public function setId($id)
    {
        $this->id = $id;

    }

    public function getAtivo()
    {
        return $this->ativo;
    }

    public function setAtivo($ativo)
    {
        $this->ativo = $ativo;
    }

    public function getUrlMap()
    {
        return $this->urlMap;
    }

    public function setUrlMap($urlMap)
    {
        $this->urlMap = $urlMap;
    }
}
?>