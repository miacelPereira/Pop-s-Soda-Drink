<?php
    class SlidePopComVoceDao{

        private $conn;

        public function __construct(){ $this->conn = new MysqlConn(); }

        public function selectAll(){
            $sql = "select * from tbl_slide_pop_escola";
            $pdoConn = $this->conn->startConnection();
            $result = $pdoConn->query($sql);
            $cont = 0;

            while($rs = $result->fetch(PDO::FETCH_ASSOC)){
                $list[] = new SlidePopComVoce();
                $list[$cont]->setId($rs['id']);
                $list[$cont]->setNome($rs['nome_slider']);
                $list[$cont]->setAtivo($rs['ativo']);
                $cont++;
            }

            return $list;
        }
        public function selectOne($id){
            $sql = "select * from tbl_slide_pop_escola where id = ".$id;
            $pdoConn = $this->conn->startConnection();
            $result = $pdoConn->query($sql);
            if($rs = $result->fetch(PDO::FETCH_ASSOC)){
                $slide = new SlidePopComVoce();
                $slide->setId($rs['id']);
                $slide->setNome($rs['nome_slider']);
                $slide->setAtivo($rs['ativo']);
            }
            $this->conn->closeConnection();
            return $slide;
        }

        public function disable($id, $ativo){
            if($ativo == 1){
                $sql = "update tbl_slide_pop_escola set ativo = 0 where id = {$id}";
            }else{
                $sql = "update tbl_slide_pop_escola set ativo = 1 where id = {$id}";
            }
            echo $sql;
            $pdoConn = $this->conn->startConnection();
            $pdoConn->query($sql);
            $this->conn->closeConnection();

        }

        public function insert($slide){
            $sql = "insert into tbl_slide_pop_escola (nome_slider, ativo) values ('".$slide->getNome()."', 0)";
            $pdoConn = $this->conn->startConnection();
            $pdoConn->query($sql);
            $this->conn->closeConnection();
        }

        public function delete($id){
            $sql_rel = "delete from tbl_rel_slide_imagens_pop_escola where id_slide = {$id}";
            echo $sql_rel;
            $sql_slide = "delete from tbl_slide_pop_escola where id = {$id}";
            echo $sql_slide;
            $pdoConn = $this->conn->startConnection();
            $pdoConn->query($sql_rel);
            $pdoConn->query($sql_slide);
            $this->conn->closeConnection();
        }

        public function update($id, $slide){
            $sql = "update tbl_slide_pop_escola set nome = '{$slide->getNome()}' where id = {$id}";
            $pdoConn = $this->conn->startConnection();
            $pdoConn->query($sql);
            $this->conn->closeConnection();
        }
        
    }

?>


