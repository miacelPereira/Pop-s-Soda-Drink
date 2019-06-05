<?php

class ProdutoDao{

    private $conn;

    public function __construct(){
        $this->conn = new MysqlConn();
    }

    public function selectAll(){

        $sql = "select * from vw_produtos";

        $pdoConn = $this->conn->startConnection();

        $select = $pdoConn->query($sql);

        $i = 0;
        
        while($rs=$select->fetch(PDO::FETCH_ASSOC)){

            $list[] = new Produto();
            $list[$i]->setId($rs['id_produto_acabado']);
            $list[$i]->setNome($rs['nome']);
            $list[$i]->setDescricao($rs['descricao']);
            $list[$i]->setImg($rs['img']);
            $list[$i]->setPeso($rs['peso_bruto']);
            $list[$i]->setImposto($rs['imposto']);
            $list[$i]->setDemandaMensal($rs['demanda_mensal']);
            $list[$i]->setTempoRessuprimento($rs['tempo_ressuprimento']);
            $list[$i]->setIntervaloRessuprimento($rs['intervalo_ressuprimento']);
            $list[$i]->setQuantidadeEstoque($rs['quantidade_estoque']);
            $list[$i]->setPrecoUnidade($rs['preco_unidade']);
            $list[$i]->setQuantidadeFardo($rs['quantidade_fardo']);
            $list[$i]->setLocalizacao($rs['localizacao']);
            $list[$i]->setEmbalagem($rs['embalagem']);
            $list[$i]->setUnidadeMedida($rs['abrev']);
            $list[$i]->setQuantidadeMedida($rs['quantidade_medida']);
            $list[$i]->setAtivo($rs['ativo']);

            $i++;
        }

        $this->conn->closeConnection();

        return $list;

    }

    public function selectOne($id){
        $sql = "select * from vw_produtos where id_produto_acabado =".$id;

        $pdoConn = $this->conn->startConnection();

        $select = $pdoConn->query($sql);

        if($rs = $select->fetch(PDO::FETCH_ASSOC)){
            $produto = new Produto();
            $produto->setId($rs['id_produto_acabado']);
            $produto->setNome($rs['nome']);
            $produto->setDescricao($rs['descricao']);
            $produto->setImg($rs['img']);
            $produto->setPeso($rs['peso_bruto']);
            $produto->setImposto($rs['imposto']);
            $produto->setDemandaMensal($rs['demanda_mensal']);
            $produto->setTempoRessuprimento($rs['tempo_ressuprimento']);
            $produto->setIntervaloRessuprimento($rs['intervalo_ressuprimento']);
            $produto->setQuantidadeEstoque($rs['quantidade_estoque']);
            $produto->setPrecoUnidade($rs['preco_unidade']);
            $produto->setQuantidadeFardo($rs['quantidade_fardo']);
            $produto->setLocalizacao($rs['localizacao']);
            $produto->setEmbalagem($rs['embalagem']);
            $produto->setUnidadeMedida($rs['abrev']);
            $produto->setQuantidadeMedida($rs['quantidade_medida']);
            $produto->setAtivo($rs['ativo']);
        }
        
        $this->conn->closeConnection();

        return $produto;
    }

    public function insert(Produto $produto){

        $sql = "INSERT INTO tbl_produto_acabado (nome, descricao, img, peso_bruto, imposto, demanda_mensal, tempo_ressuprimento, intervalo_ressuprimento, quantidade_estoque, preco_unidade, quantidade_fardo, localizacao, embalagem, id_unidade_medida, quantidade_medida, ativo) 
        VALUES ('".$produto->getNome()."', 
        '".$produto->getDescricao()."', 
        '".$produto->getImg()."', 
        '".$produto->getPeso()."', 
        '".$produto->getImposto()."', 
        '".$produto->getDemandaMensal()."', 
        '".$produto->getTempoRessuprimento()."', 
        '".$produto->getIntervaloRessuprimento()."', 
        '".$produto->getQuantidadeEstoque()."', 
        '".$produto->getPrecoUnidade()."', 
        '".$produto->getQuantidadeFardo()."', 
        '".$produto->getLocalizacao()."', 
        '".$produto->getEmbalagem()."', 
        '".$produto->getUnidadeMedida()."',  
        '".$produto->getQuantidadeMedida()."', 0);";

        echo $sql;

        $pdoConn = $this->conn->startConnection();

        if($pdoConn->query($sql)){

            $sql = "select id_produto_acabado from tbl_produto_acabado order by id_produto_acabado desc limit 1";

            $select = $pdoConn->query($sql);

            $this->conn->closeConnection();

            if($rs=$select->fetch(PDO::FETCH_ASSOC)){
                return $rs['id_produto_acabado'];
            }else{
                return "0";
            }
        }else{
            return 'Erro no script de INSERT';
        }

    }

    public function update(PermissaoCms $permissao){

        $sql = "UPDATE `tbl_permissao` SET 
        `nome`='".$permissao->getDescricao()."', 
        `pg_pf_home`='".$permissao->getPfHome()."', 
        `pg_pf_historia`='".$permissao->getPfHistoria()."', 
        `pg_cms_user`='".$permissao->getCmsUser()."', 
        `pg_pf_produto`='".$permissao->getPfProduto()."', 
        `pg_pf_brindes`='".$permissao->getPfBrindes()."', 
        `pg_pf_noticias`='".$permissao->getPfNoticias()."', 
        `pg_pf_divulgacao`='".$permissao->getPfDivulgacao()."', 
        `pg_pf_videos`='".$permissao->getPfVideos()."', 
        `pg_pf_patrocinados`='".$permissao->getPfPatrocinados()."', 
        `pg_pf_eventos`='".$permissao->getPfEventos()."', 
        `pg_pf_nossaslojas`='".$permissao->getPfNossasLojas()."', 
        `pg_pf_promocoes`='".$permissao->getPfPromocoes()."', 
        `pg_pf_faleconosco`='".$permissao->getPfFaleConosco()."', 
        `pg_pf_popsnaescola`='".$permissao->getPfPopsNaEscola()."', 
        `pg_pf_missaovalores`='".$permissao->getPfMissaoValores()."' 
        WHERE `id`='".$permissao->getId()."'";

        $pdoConn = $this->conn->startConnection();

        if($pdoConn->query($sql)){
            $this->conn->closeConnection();
            echo "1";
        }else{
            echo 'Erro no script de UPDATE';
        }

        $this->conn->closeConnection();

    }

    public function delete($id){
        $sql1 = "DELETE FROM tbl_nutricional WHERE id_produto = $id";
        $sql = "DELETE FROM tbl_produto_acabado WHERE id_produto_acabado = $id";
        $pdoConn = $this->conn->startConnection();

        if($pdoConn->query($sql1) && $pdoConn->query($sql)){
            $this->conn->closeConnection();
            return "1";
        }else{
            return '0';
        }
        $this->conn->closeConnection();
    }
    
    public function disable($id, $ativo){
        if($ativo == 1){
            $sql = "update tbl_produto_acabado set ativo = 0 where id_produto_acabado = ".$id;
        }else{
            $sql = "update tbl_produto_acabado set ativo = 1 where id_produto_acabado = ".$id;
        }
        $pdoConn = $this->conn->startConnection();

        $pdoConn->query($sql);

        $this->conn->closeConnection();

    }
}

?>