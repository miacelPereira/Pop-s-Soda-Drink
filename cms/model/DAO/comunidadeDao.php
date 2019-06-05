<?php

// select po.*, pf.nome , pf.email FROM tbl_posts as po
//inner join tbl_pessoa_fisica as pf ON po.id_pessoa_fisica = pf.id_pessoa_fisica;

    class ComunidadeDao
    {
        private $conn;

        public function __construct(){
            $this->conn = new MysqlConn();
        }

        public function selectAll(){
            $sql = "SELECT * FROM vw_comunidade";

            $pdoConn = $this->conn->startConnection();

            $select = $pdoConn->query($sql);

            $i = 0;

            while($rsComunidade=$select->fetch(PDO::FETCH_ASSOC)){
    
                $listaComunidade[] = new ComunidadeClass();
                $listaComunidade[$i]->setId($rsComunidade['id_post']);
                $listaComunidade[$i]->setNomeUser($rsComunidade['nome']);
                $listaComunidade[$i]->setEmailUser($rsComunidade['email']);
                $listaComunidade[$i]->setPost($rsComunidade['post']);
                $listaComunidade[$i]->setCurtidas($rsComunidade['curtidas_post']);
                $listaComunidade[$i]->setAtivo($rsComunidade['ativo']);
    
                $i++;
            }
    
            $this->conn->closeConnection();
    
            if(isset($listaComunidade)){
                return $listaComunidade;
               
            }else{
                return "Erro no banco!";
            }
        }

        public function selectOne($id){
            $sql = "SELECT * FROM vw_comunidade where id_post = ".$id;
            $pdoConn = $this->conn->startConnection();
            $result = $pdoConn->query($sql);

            if($rsComu = $result->fetch(PDO::FETCH_ASSOC)){
                $comunidade = new ComunidadeClass();
                $comunidade->setId($rsComu['id_post']);
                $comunidade->setNomeUser($rsComu['nome']);
                $comunidade->setEmailUser($rsComu['email']);
                $comunidade->setPost($rsComu['post']);
                $comunidade->setCurtidas($rsComu['curtidas_post']);
                $comunidade->setAtivo($rsComu['ativo']);
            }
            
            $this->conn->closeConnection();
            return $comunidade;
        }


        public function deletePost($id){
            $sql = "delete from tbl_posts where id_post = ".$id;
            $pdoConn = $this->conn->startConnection();
            $pdoConn->query($sql);
            $this->conn->closeConnection();
        }
        
        public function disablePost($id, $ativo){
            if($ativo == 0){
                $sql = "update tbl_posts set ativo = 1 where id_post = ". $id;
            }else{
                $sql = "update tbl_posts set ativo = 0 where id_post = ". $id;
            }
            $pdoConn = $this->conn->startConnection();
            $pdoConn->query($sql);
            $this->conn->closeConnection();
        }


    }
    


?>