<?php

class ChamadosDao
    {
        private $conn;

        public function __construct(){
            $this->conn = new MysqlConn();
        }


        public function selectAll(){
            $sql = "SELECT * FROM tbl_chamados";

            $pdoConn = $this->conn->startConnection();

            $select = $pdoConn->query($sql);

            $i = 0;

            while($rsChamados=$select->fetch(PDO::FETCH_ASSOC)){
    
                $listaChamados[] = new ChamadosClass();
                $listaChamados[$i]->setId($rsChamados['idChamado']);
                $listaChamados[$i]->setEmpresa($rsChamados['empresa']);
                $listaChamados[$i]->setProduto($rsChamados['produto']);
                $listaChamados[$i]->setQuantidade($rsChamados['quantidade']);
                $listaChamados[$i]->setDescricao($rsChamados['descricao']);
    
                $i++;
            }
    
            $this->conn->closeConnection();
    
            if(isset($listaChamados)){
                return $listaChamados;
               
            }else{
                return "Erro no banco!";
            }
        }

        public function selectOne($id){
            $sql = "SELECT * FROM tbl_chamados where idChamado = ".$id;
            $pdoConn = $this->conn->startConnection();
            $result = $pdoConn->query($sql);

            if($rsChamado = $result->fetch(PDO::FETCH_ASSOC)){
                $chamados = new ChamadosClass();
                $chamados->setId($rsChamado['idChamado']);
                $chamados->setEmpresa($rsChamado['empresa']);
                $chamados->setProduto($rsChamado['produto']);
                $chamados->setQuantidade($rsChamado['quantidade']);
                $chamados->setDescricao($rsChamado['descricao']);
            }
            
            $this->conn->closeConnection();
            return $chamados;
        }


        public function deleteChamados($id){
            $sql = "delete from tbl_chamados where idChamado = ".$id;
            $pdoConn = $this->conn->startConnection();
            $pdoConn->query($sql);
            $this->conn->closeConnection();
        }
        



    }

?>