<?php

/*
    Projeto: Padronizando CRUD em MVP; ORIENTADO A OBJETOS;
    Criado por: Elimarp
    Data Criação: 11/03/2019
    Última modificação: 
    Conteúdo modificado:
    Modificado por: 

    Objetivo: CRUD da tb_contatos
*/

class UsuarioCmsDao{

    private $conn;

    public function __construct(){

        // require_once('mysqlConn.php');

        $this->conn = new MysqlConn();
    }

    public function selectById($id){

        $sql = "select * from tbl_funcionario where id = ".$id;

        $pdoConn = $this->conn->startConnection();

        $select = $pdoConn->query($sql);

        $this->conn->closeConnection();

        if($rsUsuario=$select->fetch(PDO::FETCH_ASSOC)){
            // echo "AQQQUI <br>";
            // var_dump($rsUsuario);

            // echo "<br>".getcwd()."<br>";

            $user = new UsuarioCms();

            // echo getcwd()." << teste <br>";

            $permissaoDao = new PermissaoDao();

            $user->setId($rsUsuario['id']);
            $user->setNome($rsUsuario['nome']);
            $user->setLogin($rsUsuario['matricula']);
            $user->setSenha($rsUsuario['senha']);
            $user->setIdPermissao($rsUsuario['id_permissao']);
            $user->setPermissao($permissaoDao->getPermissao($rsUsuario['id_permissao']));

            return $user;
        }else{
            return "FALHA";
        }

        

    }

    public function selectAll(){

        $sql = "select * from tbl_funcionario";

        $pdoConn = $this->conn->startConnection();

        $select = $pdoConn->query($sql);

        $i = 0;

        while($rsUsuario=$select->fetch(PDO::FETCH_ASSOC)){

            // require_once('../model/usuarioCmsClass.php');

            $listUsers[] = new UsuarioCms();
            $listUsers[$i]->setId($rsUsuario['id']);
            $listUsers[$i]->setNome($rsUsuario['nome']);
            $listUsers[$i]->setLogin($rsUsuario['matricula']);
            $listUsers[$i]->setSenha($rsUsuario['senha']);
            $listUsers[$i]->setIdPermissao($rsUsuario['id_permissao']);

            $i++;
        }

        $this->conn->closeConnection();

        if(isset($listUsers)){
            return $listUsers;
        }else{
            return "FALHA";
        }

    }

    public function insert(UsuarioCms $usuario){

        $sql = "insert into tbl_funcionario (nome, matricula, senha, id_permissao) 
        VALUES ('".$usuario->getNome()."', '".$usuario->getLogin()."', '".$usuario->getSenha()."', ".$usuario->getIdPermissao().")";

        // echo "AAA".$sql;

        $pdoConn = $this->conn->startConnection();

        if($pdoConn->query($sql)){
            
            $this->conn->closeConnection();

            // RESPOSTA
            return "1";
            
        }else{
            $this->conn->closeConnection();
            
            // RESPOSTA
            return 'Erro no script de INSERT';
        }

        

    }
    
    public function update(UsuarioCms $usuario){

        $sql = "UPDATE tbl_funcionario SET nome = '".$usuario->getNome()."', matricula = '".$usuario->getLogin()."', senha = '".$usuario->getSenha()."' WHERE id = ".$usuario->getId();


        // echo "AAA".$sql;

        $pdoConn = $this->conn->startConnection();

        if($pdoConn->query($sql)){
            $this->conn->closeConnection();
            // header('location:index.php?usuario');
        }else{
            echo 'Erro no script de UPDATE';
        }

        $this->conn->closeConnection();

    }

    public function delete($id){

        $sql = "DELETE FROM tbl_funcionario WHERE id = $id";

        $pdoConn = $this->conn->startConnection();

        if($pdoConn->query($sql)){
            $this->conn->closeConnection();
            // header('location:index.php?usuario');
        }else{
            echo 'Erro no script de DELETE';
        }

        $this->conn->closeConnection();

    }

}

?>