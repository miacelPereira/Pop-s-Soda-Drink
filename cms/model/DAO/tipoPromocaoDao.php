<?php
    
    class TipoPromocaoDao{
        
        private $conn;

        public function __construct(){ $this->conn = new MysqlConn(); }

        public function selectAll(){
            
            $sql = "select * from tbl_tipo_promocao";

            $pdoConn = $this->conn->startConnection();

            $select = $pdoConn->query($sql);
            
            while($rs = $select->fetch(PDO::FETCH_ASSOC)){
                $list[] = new TipoPromocao();
                $list[$cont]->setId($rs['id']);
                $list[$cont]->setNome($rs['nome_tipo']);
                $cont++;
            }

            return $list;
        }

        public function selectOne($id){
            
            $sql = "select * from tbl_tipo_promocao where id = ".$id;

            $pdoConn = $this->conn->startConnection();

            $result = $pdoConn->query($sql);

            if($rs = $result->fetch(PDO::FETCH_ASSOC)){
                $typePromo = new TipoPromocao();
                $typePromo->setId($rs['id']);
                $typePromo->setNome($rs['nome_tipo']);  
            }
            return $typePromo;
        }

    }

?>