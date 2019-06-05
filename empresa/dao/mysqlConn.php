<?php

// Classe para conexão com o DB MySQL
class MysqlConn{
    private $host;
    private $user;
    private $password;
    private $database;

    public function __construct(){

        // $this->host = "10.107.144.29";
        $this->user = "remoto";
        $this->password = "bcd127";
        $this->database = "db_oncreate";
        $this->host = "127.0.0.1";
        // $this->user = "root";
        // $this->password = "";
        // $this->database = "db_oncreate";
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