<?php

class EventosDao{

    private $conn;

    public function __construct(){
        
        $this->conn = new MysqlConn();
    }
    
    public function insert(EventosClass $evento){
        
//        var_dump($evento);
        
        
        $sql = "INSERT INTO tbl_evento (nome_evento, endereco, data, hora)
        VALUES ('".$evento->getNome()."','".$evento->getEndereco()."','".$evento->getData()."','".$evento->getHora()."')";

      
        
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
    public function update(EventosClass $evento){

        $sql = "UPDATE tbl_evento SET nome_evento = '".$evento->getNome()."', endereco = '".$evento->getEndereco()."', data = '".$evento->getData()."', hora = '".$evento->getHora()."' WHERE id = '".$evento->getId()."'";

        $pdoConn = $this->conn->startConnection();

        if($pdoConn->query($sql)){
            
            $this->conn->closeConnection();
            
            // RESPOSTA
            return "1";
            
        }else{
            echo 'Erro no script de UPDATE';
            
            echo $sql;
            
        }

        $this->conn->closeConnection();

    }
    public function selectById($id){

        $sql = "SELECT * FROM tbl_evento WHERE id = ".$id;

        $pdoConn = $this->conn->startConnection();

        $select = $pdoConn->query($sql);

        $this->conn->closeConnection();

        if($rsEvento=$select->fetch(PDO::FETCH_ASSOC)){

            $eventoClass = new EventosClass();

            $eventoClass->setId($rsEvento['id']);
            $eventoClass->setNome($rsEvento['nome_evento']);
            $eventoClass->setEndereco($rsEvento['endereco']);
            $eventoClass->setData($rsEvento['data']);
            $eventoClass->setHora($rsEvento['hora']);
            

            return $eventoClass;
        }else{
            return "FALHA";
        }        

    }
    public function selectAll(){

        $sql = "SELECT * FROM tbl_evento";

        $pdoConn = $this->conn->startConnection();

        $select = $pdoConn->query($sql);

        $i = 0;

        while($rsEvento=$select->fetch(PDO::FETCH_ASSOC)){

            $listaEventos[] = new EventosClass();
            $listaEventos[$i]->setId($rsEvento['id']);
            $listaEventos[$i]->setNome($rsEvento['nome_evento']);
            $listaEventos[$i]->setEndereco($rsEvento['endereco']);
            $listaEventos[$i]->setData($rsEvento['data']);
            $listaEventos[$i]->setHora($rsEvento['hora']);
            
            $i++;
        }

        $this->conn->closeConnection();

        if(isset($listaEventos)){
            return $listaEventos;
           
        }else{
            return "Erro no banco!";
        }

    }
    
   
    public function delete($id){

        $sql = "DELETE FROM tbl_evento WHERE id = $id";

        $pdoConn = $this->conn->startConnection();

        if($pdoConn->query($sql)){
            $this->conn->closeConnection();
            return 1;
        }else{
            $this->conn->closeConnection();
            return 'Erro no script de DELETE';
        }

        

    }   
}
   
?>
