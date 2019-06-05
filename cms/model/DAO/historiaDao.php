<?php 
    class HistoriaDao{

        private $conn;

        public function __construct(){
            $this->conn = new MysqlConn();
        }
        

        public function selectAll(){
            $sql = "SELECT * FROM tbl_historia";
            $pdoConn = $this->conn->startConnection();
            $result = $pdoConn->query($sql);

            $cont = 0;

            while($rs = $result->fetch(PDO::FETCH_ASSOC)){
                $list[] = new Historia();
                $list[$cont]->setId($rs['id_historia']);
                $list[$cont]->setTitulo($rs['titulo']);
                $list[$cont]->setFrase($rs['frase_impacto']);
                $list[$cont]->setPrimeiroTexto($rs['texto1']);
                $list[$cont]->setPrimeiraImagem($rs['imagem1']);
                $list[$cont]->setSegundaTexto($rs['texto2']);
                $list[$cont]->setSegundaImagem($rs['imagem2']);
                $list[$cont]->setAtivo($rs['ativo']);
                $cont++;
            }

            $this->conn->closeConnection();

            return $list;
        }

        public function selectOne($id){
            $sql = "SELECT * FROM tbl_historia where id_historia = ".$id;
            $pdoConn = $this->conn->startConnection();
            $result = $pdoConn->query($sql);

            if($rs = $result->fetch(PDO::FETCH_ASSOC)){
                $historia = new Historia();
                $historia->setId($rs['id_historia']);
                $historia->setTitulo($rs['titulo']);
                $historia->setFrase($rs['frase_impacto']);
                $historia->setPrimeiroTexto($rs['texto1']);
                $historia->setPrimeiraImagem($rs['imagem1']);
                $historia->setSegundaTexto($rs['texto2']);
                $historia->setSegundaImagem($rs['imagem2']);
                $historia->setAtivo($rs['ativo']);
            }
            
            $this->conn->closeConnection();
            return $historia;
        }

        public function delete($id){
            $sql = "delete from tbl_historia where id_historia = ".$id;
            $pdoConn = $this->conn->startConnection();
            $pdoConn->query($sql);
            $this->conn->closeConnection();
        }
        
        public function disable($id, $ativo){
            $sqldisable = "update tbl_historia set ativo = 0 where id_historia != ". $id;
            $sql = "update tbl_historia set ativo = 1 where id_historia = ". $id;
            $pdoConn = $this->conn->startConnection();
            $pdoConn->query($sql);
            $pdoConn->query($sqldisable);
            $this->conn->closeConnection();
        }

        public function add($historia){
            $sql = "insert into tbl_historia (titulo, frase_impacto, texto1, imagem1, texto2, imagem2, ativo ) values ('".$historia->getTitulo()."', '".$historia->getFrase()."', '".$historia->getPrimeiroTexto()."', '".$historia->getPrimeiraImagem()."', '".$historia->getSegundaTexto()."', '".$historia->getSegundaImagem()."', 1)";  
            $pdoConn = $this->conn->startConnection();
            $pdoConn->query($sql);
            $this->conn->closeConnection();
        }
        public function edit($historia){
            if($historia->getPrimeiraImagem() == null and $historia->getSegundaImagem() == null){
                $sql = "update tbl_historia set titulo = '".$historia->getTitulo()."', frase_impacto = '".$historia->getFrase()."', texto1 = '".$historia->getPrimeiroTexto()."', texto2 = '".$historia->getSegundaTexto()."' where id_historia = ".$historia->getId();
            }elseif ($historia->getPrimeiraImagem() == null){
                $sql = "update tbl_historia set titulo = '".$historia->getTitulo()."', frase_impacto = '".$historia->getFrase()."', texto1 = '".$historia->getPrimeiroTexto()."', texto2 = '".$historia->getSegundaTexto()."', imagem2 = '".$historia->getSegundaImagem()."' where id_historia = ".$historia->getId();
            }elseif ($historia->getSegundaImagem() == null){
                $sql = "update tbl_historia set titulo = '".$historia->getTitulo()."', frase_impacto = '".$historia->getFrase()."', texto1 = '".$historia->getPrimeiroTexto()."', imagem1 = '".$historia->getPrimeiraImagem()."', texto2 = '".$historia->getSegundaTexto()."' where id_historia = ".$historia->getId();
            }else{
                $sql = "update tbl_historia set titulo = '".$historia->getTitulo()."', frase_impacto = '".$historia->getFrase()."', texto1 = '".$historia->getPrimeiroTexto()."', imagem1 = '".$historia->getPrimeiraImagem()."', texto2 = '".$historia->getSegundaTexto()."', imagem2 = '".$historia->getSegundaImagem()."' where id_historia = ".$historia->getId();
            }
            $pdoConn = $this->conn->startConnection();
            $pdoConn->query($sql);
            $this->conn->closeConnection();
        }
    }

?>