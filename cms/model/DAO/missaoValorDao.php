<?php 
    class MissaoValorDao{

        private $conn;

        public function __construct(){
            $this->conn = new MysqlConn();
        }
        

        public function selectAll(){
            $sql = "SELECT * FROM tbl_missao_valores";
            $pdoConn = $this->conn->startConnection();
            $result = $pdoConn->query($sql);

            $cont = 0;

            while($rs = $result->fetch(PDO::FETCH_ASSOC)){
                $list[] = new MissaoValor();
                $list[$cont]->setId($rs['id_missao_valores']);
                $list[$cont]->setMissao($rs['missao']);
                $list[$cont]->setValor($rs['valores']);
                $list[$cont]->setImagem($rs['imagem']);
                $list[$cont]->setVisao($rs['visao']);
                $list[$cont]->setAtivo($rs['ativo']);
                $cont++;
            }

            $this->conn->closeConnection();

            return $list;
        }

        public function selectOne($id){
            $sql = "SELECT * FROM tbl_missao_valores where id_missao_valores  = ".$id;
            $pdoConn = $this->conn->startConnection();
            $result = $pdoConn->query($sql);

            if($rs = $result->fetch(PDO::FETCH_ASSOC)){
                $missao = new MissaoValor();
                $missao->setId($rs['id_missao_valores']);
                $missao->setMissao($rs['missao']);
                $missao->setValor($rs['valores']);
                $missao->setImagem($rs['imagem']);
                $missao->setVisao($rs['visao']);
                $missao->setAtivo($rs['ativo']);
            }
            
            $this->conn->closeConnection();
            return $missao;
        }

        public function delete($id){
            $sql = "delete from tbl_missao_valores where id_missao_valores = ".$id;
            $pdoConn = $this->conn->startConnection();
            $pdoConn->query($sql);
            $this->conn->closeConnection();
        }
        
        public function disable($id, $ativo){
            $sqldisable = "update tbl_missao_valores set ativo = 0 where id_missao_valores != ". $id;
            $sql = "update tbl_missao_valores set ativo = 1 where id_missao_valores = ". $id;
            $pdoConn = $this->conn->startConnection();
            $pdoConn->query($sql);
            $pdoConn->query($sqldisable);
            $this->conn->closeConnection();
        }

        public function add($missao){
            $sql = "insert into tbl_missao_valores (missao, valores, imagem, visao, ativo) values ('".$missao->getMissao()."', '".$missao->getValor()."', '".$missao->getImagem()."', '".$missao->getVisao()."', 1 )";
            $pdoConn = $this->conn->startConnection();
            $pdoConn->query($sql);
            $this->conn->closeConnection();

        }

        public function update($missao){
            $img = "";
            if($missao->getImagem() != null){
                $img = "imagem = '".$missao->getImagem()."',";   
            }

            $sql = "update tbl_missao_valores set missao = '".$missao->getMissao()."', valores = '".$missao->getValor()."', visao = '".$missao->getVisao()."', ".$img." ativo = 1 where id_missao_valores =".$missao->getId();
            echo $sql;
            $pdoConn = $this->conn->startConnection();
            if($pdoConn->query($sql)){
                echo "teste";
            }
            $this->conn->closeConnection();

        }
    }

?>