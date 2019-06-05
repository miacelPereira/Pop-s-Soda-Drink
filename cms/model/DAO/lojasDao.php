<?php 
    class LojasDao{
        private $conn;

        public function __construct(){ $this->conn = new MysqlConn(); }

        public function selectAll(){
            $sql = "SELECT * FROM tbl_nossas_lojas";
            
            $pdoConn = $this->conn->startConnection();
            $result = $pdoConn->query($sql);

            $cont = 0;

            while($rs = $result->fetch(PDO::FETCH_ASSOC)){
                $list[] = new Loja();
                $list[$cont]->setId($rs['id_nossas_lojas']);
                $list[$cont]->setNome($rs['nome_estabelecimento']);
                $list[$cont]->setEndereco($rs['endereco']);
                $list[$cont]->setCidade($rs['cidade']);
                $list[$cont]->setUf($rs['uf']);
                $list[$cont]->setNumero($rs['numero']);
                $list[$cont]->setImagem($rs['imagem']);
                $list[$cont]->setAtivo($rs['ativo']);
                $list[$cont]->setUrlMap($rs['urlMaps']);
                $cont++;
            }

            $this->conn->closeConnection();

            return $list;
        }

        public function selectOne($id){
            $sql = "SELECT * FROM tbl_nossas_lojas where id_nossas_lojas = ".$id;
            $pdoConn = $this->conn->startConnection();
            $result = $pdoConn->query($sql);

            if($rs = $result->fetch(PDO::FETCH_ASSOC)){
                $loja = new Loja();
                $loja->setId($rs['id_nossas_lojas']);
                $loja->setNome($rs['nome_estabelecimento']);
                $loja->setEndereco($rs['endereco']);
                $loja->setCidade($rs['cidade']);
                $loja->setUf($rs['uf']);
                $loja->setNumero($rs['numero']);
                $loja->setImagem($rs['imagem']);
                $loja->setAtivo($rs['ativo']);
                $loja->setUrlMap($rs['urlMaps']);
            }
            
            $this->conn->closeConnection();
            return $loja;
        }

        public function delete($id){
            $sql = "delete from tbl_nossas_lojas where id_nossas_lojas = ".$id;
            $pdoConn = $this->conn->startConnection();
            $pdoConn->query($sql);
            $this->conn->closeConnection();
        }
        
        public function disable($id, $ativo){
            if($ativo == 0){
                $sql = "update tbl_nossas_lojas set ativo = 1 where id_nossas_lojas = ". $id;
            }else{
                $sql = "update tbl_nossas_lojas set ativo = 0 where id_nossas_lojas = ". $id;
            }
            $pdoConn = $this->conn->startConnection();
            $pdoConn->query($sql);
            $this->conn->closeConnection();
        }
    }
?>