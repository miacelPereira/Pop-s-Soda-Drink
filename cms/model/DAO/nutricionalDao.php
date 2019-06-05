<?php

class NutricionalDao{
    
    private $conn;

    public function __construct(){
        $this->conn = new MysqlConn();
    }

    public function selectAll(){

        // echo "SELECT ALL";

        
        // $sql = "select * from vw_prateleira";

        // $pdoConn = $this->conn->startConnection();

        // $select = $pdoConn->query($sql);

        // $i = 0;
        
        // while($rs=$select->fetch(PDO::FETCH_ASSOC)){

        //     $list[] = new Prateleira();
        //     $list[$i]->setId($rs['id']);
        //     $list[$i]->setNumero($rs['numero']);
        //     $list[$i]->setCorredorId($rs['id_corredor']);
        //     $list[$i]->setCorredorName($rs['nome_corredor']);
            

        //     $i++;
        // }

        // $this->conn->closeConnection();

        // return $list;

    }

    public function insert($nutricional){
        $sql = "INSERT INTO tbl_nutricional (id_produto, elemento, quantidade, vd) 
        VALUES (
        '".$nutricional->getIdProduto()."', 
        '".$nutricional->getElemento()."', 
        '".$nutricional->getQuantidade()."', 
        '".$nutricional->getVd()."');";
        
        $pdoConn = $this->conn->startConnection();
        $pdoConn->query($sql);
        $this->conn->closeConnection();
        return $return;

    }


}

?>