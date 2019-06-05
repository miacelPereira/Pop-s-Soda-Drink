<?php

class PrateleiraDao{
    
    private $conn;

    public function __construct(){
        $this->conn = new MysqlConn();
    }

    public function selectAll(){

        $sql = "select * from vw_prateleira";

        $pdoConn = $this->conn->startConnection();

        $select = $pdoConn->query($sql);

        $i = 0;
        
        while($rs=$select->fetch(PDO::FETCH_ASSOC)){

            $list[] = new Prateleira();
            $list[$i]->setId($rs['id']);
            $list[$i]->setNumero($rs['numero']);
            $list[$i]->setCorredorId($rs['id_corredor']);
            $list[$i]->setCorredorName($rs['nome_corredor']);
            
            $i++;
        }

        $this->conn->closeConnection();

        return $list;

    }



}

?>