<?php
class UniMedidaDao{
    
    private $conn;
    public function __construct(){
        $this->conn = new MysqlConn();
    }
    public function selectById($id){
        $sql = "select * from tbl_unidade_medida where id = ".$id;
        $pdoConn = $this->conn->startConnection();
        $select = $pdoConn->query($sql);
        if($rs=$select->fetch(PDO::FETCH_ASSOC)){
            $uniMedida = new Unimedida();
            $uniMedida->setId($rs['id']);
            $uniMedida->setDescricao($rs['nome']);
            $uniMedida->setStatus($rs['abrev']);
            $this->conn->closeConnection();
            return $uniMedida;
        }else{
            return "FALHA";
        }
    }
    public function selectAll(){
        $sql = "select * from tbl_unidade_medida";
        $pdoConn = $this->conn->startConnection();
        $select = $pdoConn->query($sql);
        $i = 0;
        
        while($rsPermissoes=$select->fetch(PDO::FETCH_ASSOC)){
            $list[] = new UniMedida();
            $list[$i]->setId($rsPermissoes['id']);
            $list[$i]->setNome($rsPermissoes['nome']);
            $list[$i]->setAbrev($rsPermissoes['abrev']);
            
            $i++;
        }
        $this->conn->closeConnection();
        return $list;
    }
}
?>