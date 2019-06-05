<?php

/*
    Projeto: Padronizando CRUD em MVP; ORIENTADO A OBJETOS;
    Criado por: Elimarp
    Data Criação: 11/03/2019
    Última modificação: 
    Conteúdo modificado:
    Modificado por: 

    Objetivo: Classe ConnMySql para conectar ao DB utilizando a biblioteca PDO
*/

// Classe para conexão com o DB MySQL 'tb_oncreate'
class MysqlConn{
    private $host;
    private $user;
    private $password;
    private $database;

    public function __construct(){

        $this->host = "10.107.144.29";
        // $this->host = "localhost";
        $this->user = "remoto";
        //$this->user = "root";
        $this->password = "bcd127";
        $this->database = "db_oncreate";
    }

    //Abre a conexao com o DB
    public function startConnection(){
        try{

            return $conn = new PDO("mysql:dbname=".$this->database.";host=".$this->host, $this->user, $this->password);

        }catch(PDOException $error){

            echo "<br/>Erro ao conectar-se com o DB. <br/>
            <br/>
            Linha:".$error->getLine()."; <br>Mensagem: ".$error->getMessage();
        }
        
    }

    //Encerra a conexao com o DB
    public function closeConnection(){
        unset($conn);
    }
}

?>