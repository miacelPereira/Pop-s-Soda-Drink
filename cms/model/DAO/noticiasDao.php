<?php
    class NoticiasDao{

        private $conn;

        public function __construct(){ $this->conn = new MysqlConn(); }

        public function selectAll(){
            $sql = "select * from tbl_noticias";
            $pdoConn = $this->conn->startConnection();
            $result = $pdoConn->query($sql);

            $cont = 0;

            while($rs = $result->fetch(PDO::FETCH_ASSOC)){
                $list[] = new Noticias();
                $list[$cont]->setId($rs['id_noticias']);
                $list[$cont]->setTitulo($rs['titulo']);
                $list[$cont]->setIntroducao($rs['introducao']);
                $list[$cont]->setSubTitulo($rs['subtitulo']);
                $list[$cont]->setImagem($rs['imagem']);
                $list[$cont]->setTexto($rs['texto']);
                $list[$cont]->setAtivo($rs['ativo']);
                $cont++;
            }

            $this->conn->closeConnection();
            return $list;
        }

        public function selectOne($id){
            $sql = "select * from tbl_noticias where id_noticias = ".$id;
            $pdoConn = $this->conn->startConnection();
            $result = $pdoConn->query($sql);

            if($rs = $result->fetch(PDO::FETCH_ASSOC)){
                $noticia = new Noticias();
                $noticia->setId($rs['id_noticias']);
                $noticia->setTitulo($rs['titulo']);
                $noticia->setIntroducao($rs['introducao']);
                $noticia->setSubTitulo($rs['subtitulo']);
                $noticia->setImagem($rs['imagem']);
                $noticia->setTexto($rs['texto']);
                $noticia->setAtivo($rs['ativo']);
            }
            $this->conn->closeConnection();
            return $noticia;
        }

        public function delete($id){
            $sql = "delete from tbl_noticias where id_noticias = ".$id;
            $pdoConn = $this->conn->startConnection();
            $pdoConn->query($sql);
            $this->conn->closeConnection();
        }

        public function disable($id, $ativo){
            if ($ativo == 1){
                $ativo = 0;    
            }else{
                $ativo = 1;
            }
            $sql = "update tbl_noticias set ativo = ".$ativo." where id_noticias = ".$id;
            $pdoConn = $this->conn->startConnection();
            $pdoConn->query($sql);
            $this->conn->closeConnection();
        }

        public function insert($noticias){
            $sql = "insert into tbl_noticias (titulo, subtitulo, introducao, imagem, texto, ativo) values ('".$noticias->getTitulo()."', '".$noticias->getSubTitulo()."' , '".$noticias->getIntroducao()."', '".$noticias->getImagem()."', '".$noticias->getTexto()."', 1)";
            echo $sql;
            $pdoConn = $this->conn->startConnection();
            $pdoConn->query($sql);
            $this->conn->closeConnection();
        }

        public function update($noticia){
            $img = "";
            if($noticia->getImagem() != null){
                $img = "imagem = '".$noticia->getImagem()."',";   
            }

            $sql = "update tbl_noticias set titulo = '".$noticia->getTitulo()."', subtitulo = '".$noticia->getSubTitulo()."', texto = '".$noticia->getTexto()."', introducao = '".$noticia->getIntroducao()."', ".$img." ativo = 1 where id_noticias = ".$noticia->getId();
            echo $sql;
            $pdoConn = $this->conn->startConnection();
            if($pdoConn->query($sql)){
                echo "teste";
            }
            $this->conn->closeConnection();
        }
    }
?>