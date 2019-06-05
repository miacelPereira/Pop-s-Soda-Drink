<?php

/*
    Projeto: Padronizando CRUD em MVP; ORIENTADO A OBJETOS;
    Criado por: Elimarp
    Data Criação: 11/03/2019
    Última modificação: 
    Conteúdo modificado:
    Modificado por: 

    Objetivo:
*/

class AutenticarDao{

    private $conn;

    public function __construct(){

        // require_once('mysqlConn.php');
        

        $this->conn = new MysqlConn();
    }

    public function autenticar(Autenticar $autenticar){

        // $sql = "call autenticar('".$autenticar->getLogin()."', '".$autenticar->getSenha()."')";

        $sql = "select * from tbl_funcionario where matricula = '".$autenticar->getLogin()."' and senha = '".$autenticar->getSenha()."'";

        echo $sql;
        
        $pdoConn = $this->conn->startConnection();

        $select = $pdoConn->query($sql);

        if($rsContatos=$select->fetch(PDO::FETCH_ASSOC)){
            // echo "AQQUI";
            // var_dump($rsContatos);
            
            // require_once('model/usuarioCmsClass.php');
            $user = new UsuarioCms();

            $user->setId($rsContatos['id']);
            $user->setNome($rsContatos['nome']);
            $user->setLogin($rsContatos['matricula']);
            $user->setSenha($rsContatos['senha']);
            $user->setIdPermissao($rsContatos['id_permissao']);

            return $user;
        }else{
            return "FALHA";
        }

        $this->conn->closeConnection();

    }

    
}

?>