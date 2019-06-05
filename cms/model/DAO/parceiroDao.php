<?php 
    Class ParceiroDao{

        private $conn;

        public function __construct(){
            $this->conn = new MysqlConn();
        }
        

        public function selectAll(){
            $sql = "SELECT * FROM tbl_patrocinadores";
            $pdoConn = $this->conn->startConnection();
            $result = $pdoConn->query($sql);

            $cont = 0;

            while($rs = $result->fetch(PDO::FETCH_ASSOC)){
                $list[] = new Parceiro();
                $list[$cont]->setId($rs['id_patrocinador']);
                $list[$cont]->setImagem($rs['imagem']);
                $list[$cont]->setNome($rs['nome_equipe']);
                $list[$cont]->setModalidade($rs['modalidade']);
                $list[$cont]->setAtivo($rs['ativo']);
                $list[$cont]->setPais($rs['pais']);
                $cont++;
            }

            $this->conn->closeConnection();

            return $list;
        }

        public function selectOne($id){
            $sql = "SELECT * FROM tbl_patrocinadores where id_patrocinador = ".$id;
            $pdoConn = $this->conn->startConnection();
            $result = $pdoConn->query($sql);

            if($rs = $result->fetch(PDO::FETCH_ASSOC)){
                $parceiro = new Parceiro();
                $parceiro->setId($rs['id_patrocinador']);
                $parceiro->setImagem($rs['imagem']);
                $parceiro->setNome($rs['nome_equipe']);
                $parceiro->setModalidade($rs['modalidade']);
                $parceiro->setAtivo($rs['ativo']);
                $parceiro->setPais($rs['pais']);
            }
            
            $this->conn->closeConnection();
            return $parceiro;
        }

        public function delete($id){
            $sql = "delete from tbl_patrocinadores where id_patrocinador = ".$id;
            $pdoConn = $this->conn->startConnection();
            $pdoConn->query($sql);
            $this->conn->closeConnection();
        }
        
        public function disable($id, $ativo){
            if($ativo == 0){
                $sql = "update tbl_patrocinadores set ativo = 1 where id_patrocinador = ". $id;
            }else{
                $sql = "update tbl_patrocinadores set ativo = 0 where id_patrocinador = ". $id;
            }
            $pdoConn = $this->conn->startConnection();
            $pdoConn->query($sql);
            $this->conn->closeConnection();
        }

        public function insert($parceiro){
            $sql = "insert into tbl_patrocinadores (nome_equipe, modalidade, pais, imagem, ativo) values ('".$parceiro->getNome()."', '".$parceiro->getModalidade()."', '".$parceiro->getPais()."', '".$parceiro->getImagem()."', 1 )";
            $pdoConn = $this->conn->startConnection();
            $pdoConn->query($sql);
            $this->conn->closeConnection();
        }
        public function update($parceiro){
            $img = "";
            if($parceiro->getImagem() != null){
                $img = "imagem = '".$parceiro->getImagem()."',";   
            }

            $sql = "update tbl_patrocinadores set nome_equipe = '".$parceiro->getNome()."', modalidade = '".$parceiro->getModalidade()."', pais = '".$parceiro->getPais()."', ".$img." ativo = 1 where id_patrocinador = ".$parceiro->getId();
            echo $sql;
            $pdoConn = $this->conn->startConnection();
            $pdoConn->query($sql);
            $this->conn->closeConnection();
        }

    }
?>