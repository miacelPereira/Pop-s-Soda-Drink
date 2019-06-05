<?php

class UsuarioDao{
    
    private $conn;

    public function __construct(){
        $this->conn = new MysqlConn();
    }

    function autenticar($cnpj, $senha){

        $sql = "select * from tbl_pessoa_juridica where cnpj = $cnpj and senha = $senha";

        $pdoConn = $this->conn->startConnection();

        $select = $pdoConn->query($sql);

        $this->conn->closeConnection();

        if($rs=$select->fetch(PDO::FETCH_ASSOC)){

            $user = new Usuario();

            $user->setId($rs['id_pessoa_juridica']);
            // $user->setNome($rs['nome']);
            $user->setSenha($rs['senha']);

            return $user->getId();
        }else{
            return 0;
        }
    }

    function insert($user){

        $sql = "INSERT INTO `tbl_pessoa_juridica` 
        (`cnpj`, `razao_social`, `nome_fantasia`, `renda_mensal`, `tipo_estabelecimento`, `foto`, `endereco`, `bairro`, `cidade`, `uf`, `numero`, `nome_responsavel`, `telefone`, `email`, `senha`, `cep`) 
        VALUES ('".$user->getCnpj()."', '".$user->getRazaoSocial()."', '".$user->getNomeFantasia()."', '".$user->getRenda()."', '".$user->getTipoEstabelecimento()."', '".$user->getFoto()."', '".$user->getEndereco()."', '".$user->getBairro()."', '".$user->getCidade()."', '".$user->getUf()."', '".$user->getNumero()."', '".$user->getResponsavel()."', '".$user->getTelefone()."', '".$user->getEmail()."', '".$user->getSenha()."', '".$user->getCep()."')";

        $pdoConn = $this->conn->startConnection();

        if($pdoConn->query($sql)){
            
            $this->conn->closeConnection();
            return 1;
            
        }else{
            
            $this->conn->closeConnection();
            return 'Erro no script de INSERT';
        }
        

    }
}

?>