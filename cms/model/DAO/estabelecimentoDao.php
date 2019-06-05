<?php 
    class EstabelecimentoDao{
        private $conn;

        public function __construct(){ $this->conn = new MysqlConn(); }

        public function selectAll(){
            $sql = "SELECT * FROM tbl_divulgacao";
            
            $pdoConn = $this->conn->startConnection();
            $result = $pdoConn->query($sql);

            $cont = 0;

            while($rs = $result->fetch(PDO::FETCH_ASSOC)){
                $list[] = new Estabelecimento();
                $list[$cont]->setIdDivulgacao($rs['id_divulgacao']);
                $list[$cont]->setNome($rs['nome_estabelecimento']);
                $list[$cont]->setNomeEvento($rs['nome_evento']);
                $list[$cont]->setEndereco($rs['endereco_evento']);
                $list[$cont]->setImagem($rs['imagem']);
                $list[$cont]->setData($rs['data']);
                $list[$cont]->setIdPessoaJuridica($rs['id_pessoa_juridica']);
                $list[$cont]->setAtivo($rs['ativo']);
                $cont++;
            }

            $this->conn->closeConnection();

            return @$list;
        }

        public function selectOne($id){
            $sql = "SELECT * FROM tbl_divulgacao where id_divulgacao = ".$id;
            $pdoConn = $this->conn->startConnection();
            $result = $pdoConn->query($sql);

            if($rs = $result->fetch(PDO::FETCH_ASSOC)){
                $estabelecimento = new Estabelecimento();
                $estabelecimento->setIdDivulgacao($rs['id_divulgacao']);
                $estabelecimento->setNome($rs['nome_estabelecimento']);
                $estabelecimento->setNomeEvento($rs['nome_evento']);
                $estabelecimento->setEndereco($rs['endereco_evento']);
                $estabelecimento->setImagem($rs['imagem']);
                $estabelecimento->setData($rs['data']);
                $estabelecimento->setIdPessoaJuridica($rs['id_pessoa_juridica']);
                $estabelecimento->setAtivo($rs['ativo']);
            }
            
            $this->conn->closeConnection();
            return $estabelecimento;
        }

        public function delete($id){
            $sql = "delete from tbl_divulgacao where id_divulgacao = ".$id;
            $pdoConn = $this->conn->startConnection();
            $pdoConn->query($sql);
            $this->conn->closeConnection();
        }
        
        public function disable($id, $ativo){
            if($ativo == 0){
                $sql = "update tbl_divulgacao set ativo = 1 where id_divulgacao = ". $id;
            }else{
                $sql = "update tbl_divulgacao set ativo = 0 where id_divulgacao = ". $id;
            }
            $pdoConn = $this->conn->startConnection();
            $pdoConn->query($sql);
            $this->conn->closeConnection();
        }
    }
?>