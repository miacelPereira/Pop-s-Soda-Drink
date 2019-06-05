<?php
     function conexaoBD(){
        //$host = "192.168.0.2";
//        $host = "localhost";
//        $database = "db_oncreate";
//        $user = "root";
//        $password = "";
        $host = "10.107.144.29";
        // $this->host = "localhost";
        $user = "remoto";
        // $this->user = "root";
        $password = "bcd127";
        $database = "db_oncreate";
        if(!$conexao = mysqli_connect($host, $user, $password, $database)){
            echo("ERRO! Não foi possível fazer a conexão com o banco de dados");
        }
    return $conexao;
    }
