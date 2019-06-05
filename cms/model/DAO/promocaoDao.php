<?php 

    class PromocaoDao{
        private $conn;

        public function __construct(){ $this->conn = new MysqlConn(); }

        public function selectAll(){
            $sql = "select * from tbl_promocao";

            $pdoConn = $this->conn->startConnection();

            $select = $pdoConn->query($sql);
            
            $cont = 0;
            while($rs = $select->fetch(PDO::FETCH_ASSOC)){
                
                $list[] = new Promocao();
              
                $list[$cont]->setIdPromocao($rs['id_promocao']);
                $list[$cont]->setNome($rs['nome']);
                $list[$cont]->setDescricao($rs['descricao']);
                $list[$cont]->setRegulamento($rs['regulamento']);
                $list[$cont]->setFotoPromocao($rs['foto_promocao']);
                $list[$cont]->setIdTipoPromocao($rs['id_tipo']);
                $list[$cont]->setAtivo($rs['ativo']);
              
                $cont++;
            }
            $this->conn->closeConnection();
            return $list;

        }

        public function selectOne($id){
            
            $sql = "select * from tbl_promocao where id_promocao = ".$id;
            
            $pdoConn = $this->conn->startConnection();

            $result = $pdoConn->query($sql);

            if($rs = $result->fetch(PDO::FETCH_ASSOC)){
                $promo = new Promocao();
                $promo->setIdPromocao($rs['id_promocao']);
                $promo->setNome($rs['nome']);
                $promo->setDescricao($rs['descricao']);
                $promo->setRegulamento($rs['regulamento']);
                $promo->setFotoPromocao($rs['foto_promocao']);
                $promo->setIdTipoPromocao($rs['id_tipo']);
                $promo->setAtivo($rs['ativo']);    
            }
            $this->conn->closeConnection();
            return $promo;
        }

        public function disable($id, $ativo){
            if($ativo == 1){
                $sql = "update tbl_promocao set ativo = 0 where id_promocao = ".$id;
            }else{
                $sql = "update tbl_promocao set ativo = 1 where id_promocao = ".$id;
            } 

            $pdoConn = $this->conn->startConnection();
            $pdoConn->query($sql);
            $this->conn->closeConnection();

        }

        public function update($id, $promocao){
            $image = "";
            if($promocao->getFotoPromocao() != null){
                $image = ", foto_promocao = '".$promocao->getFotoPromocao()."' ";
            }

            $sql = "update tbl_promocao set nome = '".str_replace("'", "", $promocao->getNome())."', descricao = '".str_replace("'", "", $promocao->getDescricao())."', regulamento = '".str_replace("'", "", $promocao->getRegulamento())."'".$image." where id_promocao = ".$id;

            echo $sql;

            $pdoConn = $this->conn->startConnection();
            $pdoConn->query($sql);
            $this->conn->closeConnection();

        }

        public function delete($id){
            $sql = "delete from tbl_promocao where id_promocao = ".$id;

            $pdoConn = $this->conn->startConnection();
            $pdoConn->query($sql);
            $this->conn->closeConnection();
            
        }

        public function insert($promocao){

            $sql = "insert into tbl_promocao (nome, descricao, foto_promocao, id_tipo, regulamento, ativo, maxCodigo) values ('{$promocao->getNome()}', '{$promocao->getDescricao()}', '{$promocao->getFotoPromocao()}', {$promocao->getIdTipoPromocao()}, '{$promocao->getRegulamento()}', 0, {$promocao->getMaxCodigo()});";
            
            $pdoConn = $this->conn->startConnection();
            $pdoConn->query($sql);
            $this->conn->closeConnection();
        }
    }
?>