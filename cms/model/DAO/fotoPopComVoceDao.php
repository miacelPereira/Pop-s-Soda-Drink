<?php
    class FotoPopComVoceDao{

        private $conn;

        public function __construct(){ $this->conn = new MysqlConn(); }

        public function selectAll($id){
            $sql = "select * from tbl_imagens_slide_pop_escola where slide = ".$id;
            $pdoConn = $this->conn->startConnection();
            $result = $pdoConn->query($sql);
            $cont = 0;

            while($rs = $result->fetch(PDO::FETCH_ASSOC)){
                $list[] = new FotoPopComVoce();
                $list[$cont]->setId($rs['id_foto']);
                $list[$cont]->setUrl_foto($rs['url_imagem']);
                $list[$cont]->setAtivo($rs['ativado']);
                $list[$cont]->setTitulo($rs['titulo']);
                $list[$cont]->setSlide($rs['slide']);
                $cont++;
            }
            return $list;
        }
        public function disable($id, $ativo){
            if($ativo == 0){
                $sql = "update tbl_imagens_slide_pop_escola set ativado = 1 where id_foto = {$id}";
            }else{
                $sql = "update tbl_imagens_slide_pop_escola set ativado = 0 where id_foto = {$id}";
            }
            $pdoConn = $this->conn->startConnection();
            $pdoConn->query($sql);
            $this->conn->closeConnection();

        }

        public function insert($slide){
            $sql = "insert into tbl_imagens_slide_pop_escola (url_imagem, ativado, titulo, slide) values ('".$slide->getUrl_foto()."', 0, '".$slide->getTitulo()."', '".$slide->getSlide()."')";
            echo $sql;
            $pdoConn = $this->conn->startConnection();
            $pdoConn->query($sql);
            $this->conn->closeConnection();
        }

        public function select($id){
            $sql = "select * from tbl_imagens_slide_pop_escola where id_foto = {$id}";
            $pdoConn = $this->conn->startConnection();
            $result = $pdoConn->query($sql);
            $this->conn->closeConnection();
            while($rs = $result->fetch(PDO::FETCH_ASSOC)){
                $list = new FotoPopComVoce();
                $list->setId($rs['id_foto']);
                $list->setUrl_foto($rs['url_imagem']);
                $list->setAtivo($rs['ativado']);
                $list->setTitulo($rs['titulo']);
                $list->setSlide($rs['slide']);
            }
            return $list;
        }

        public function delete($id){
            $sql = "delete from tbl_imagens_slide_pop_escola where id_foto = {$id}";
            $pdoConn = $this->conn->startConnection();
            $pdoConn->query($sql);
            $this->conn->closeConnection();
        }

        public function update($id, $foto){
            $sql = "update tbl_imagens_slide_pop_escola set url_imagem = '{$foto->getUrl_foto()}' where id_foto = {$id}";
            echo $sql;
            $pdoConn = $this->conn->startConnection();
            $pdoConn->query($sql);
            $this->conn->closeConnection();
        }
        
    }

?>


