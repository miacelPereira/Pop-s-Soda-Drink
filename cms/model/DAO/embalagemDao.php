<?php

class EmbalagemDao{
    
    private $conn;

    public function __construct(){
        $this->conn = new MysqlConn();
    }

    public function selectAll(){

        $sql = "select * from tbl_embalagem";

        $pdoConn = $this->conn->startConnection();

        $select = $pdoConn->query($sql);

        $i = 0;
        
        while($rs=$select->fetch(PDO::FETCH_ASSOC)){

            $list[] = new Embalagem();
            $list[$i]->setId($rs['id_embalagem']);
            $list[$i]->setNome($rs['descricao']);
            $list[$i]->setUnidadeMedida($rs['unidade_medida']);
            $list[$i]->setPesoBruto($rs['peso_bruto']);
            $list[$i]->setImposto($rs['imposto']);
            $list[$i]->setTempoRessuprimento($rs['tempo_ressuprimento']);
            $list[$i]->setIntervaloRessuprimento($rs['intervalo_ressuprimento']);
            $list[$i]->setFoto($rs['foto']);
            $list[$i]->setLocalizacao($rs['localizacao']);
            $list[$i]->setQuantidadeEstoque($rs['quantidade_estoque']);

            $i++;
        }

        $this->conn->closeConnection();

        return $list;

    }



}

?>