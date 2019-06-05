<?php

    class RespostaPromocaoDao{

        private $conn;

        public function __construct(){ $this->conn = new MysqlConn(); }

        public function selectAll(){
            $sql = "select * from tbl_resposta_promocao";

            $pdoConn = $this->conn->startConnection();

            $select = $pdoConn->query($sql);
            
            while($rs = $select->fetch(PDO::FETCH_ASSOC)){
                
                $list[] = new RespostaPromocao();
              
                $list[$cont]->setId($rs['id']);
                $list[$cont]->setIdPesssoaFisica($rs['id_pessoa_fisica']);
                $list[$cont]->setResposta($rs['resposta']);
                $cont++;
            }
            $this->conn->closeConnection();
            return $list;
        }

    
    }
?>