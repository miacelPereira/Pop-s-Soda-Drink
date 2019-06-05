<?php

class HomeDao{

    private $conn;

    public function __construct(){
        
        $this->conn = new MysqlConn();
    }
    
    public function inserir(HomeClass $home){        
        //var_dump($evento);   
        $sql = "INSERT INTO tbl_home (titulo, subtitulo, produto_um, produto_dois, produto_tres, enquete, post_um, post_dois, post_tres, post_quatro, promocao, evento_um, evento_dois, evento_tres)
        VALUES ('".$home->getTitulo()."','".$home->getSubtitulo()."','".$home->getProdutoUm()."','".$home->getProdutoDois()."','".$home->getProdutoTres()."','".$home->getEnquete()."','".$home->getPostUm()."','".$home->getPostDois()."','".$home->getPostTres()."','".$home->getPostQuatro()."','".$home->getPromocao()."','".$home->getEventoUm()."','".$home->getEventoDois()."','".$home->getEventoTres()."')";
    
        $pdoConn = $this->conn->startConnection();

        if($pdoConn->query($sql)){
            
            $this->conn->closeConnection();
            // RESPOSTA
            return 1;
            
        }else{
            $this->conn->closeConnection();
            
            // RESPOSTA
            return 'Erro no script de INSERT';
        }
        
    }
    public function editarPagina(HomeClass $home){

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
    public function getPagina($id){

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
    public function listarPaginas(){

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
    
   
    public function deletar($id){

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
