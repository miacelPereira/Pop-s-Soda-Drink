<?php

/*
    Projeto: Padronizando CRUD em MVP; ORIENTADO A OBJETOS;
    Criado por: Elimarp
    Data Criação: 11/03/2019
    Última modificação: 
    Conteúdo modificado:
    Modificado por: 

    Objetivo: CRUD da 
*/

class PermissaoDao{

    private $conn;

    public function __construct(){

        // require_once('mysqlConn.php');
        

        $this->conn = new MysqlConn();
    }
    
    public function getPermissao($id){

        $sql = "select * from tbl_permissao where id = ".$id;

        $pdoConn = $this->conn->startConnection();

        $select = $pdoConn->query($sql);

        if($rsPermissao=$select->fetch(PDO::FETCH_ASSOC)){
            // echo "AQQQUI";
            // var_dump($rsPermissao);

            // echo "<br>".getcwd()."<br>";

            // require_once('../model/usuarioCmsClass.php');
            $permissao = new PermissaoCms();

            $permissao->setId($rsPermissao['id']);
            $permissao->setStatus($rsPermissao['status']);
            $permissao->setDescricao($rsPermissao['nome']);
            $permissao->setPadrao($rsPermissao['padrao']);

            $permissao->setPfHome($rsPermissao['pg_pf_home']);
            $permissao->setPfHistoria($rsPermissao['pg_pf_historia']);
            $permissao->setPfProduto($rsPermissao['pg_pf_produto']);
            $permissao->setPfBrindes($rsPermissao['pg_pf_brindes']);
            $permissao->setPfNoticias($rsPermissao['pg_pf_noticias']);
            $permissao->setPfDivulgacao($rsPermissao['pg_pf_divulgacao']);
            $permissao->setPfVideos($rsPermissao['pg_pf_videos']);
            $permissao->setPfPatrocinados($rsPermissao['pg_pf_patrocinados']);
            $permissao->setPfEventos($rsPermissao['pg_pf_eventos']);
            $permissao->setPfNossasLojas($rsPermissao['pg_pf_nossaslojas']);
            $permissao->setPfPromocoes($rsPermissao['pg_pf_promocoes']);
            $permissao->setPfFaleConosco($rsPermissao['pg_pf_faleconosco']);
            $permissao->setPfPopsNaEscola($rsPermissao['pg_pf_popsnaescola']);
            $permissao->setPfMissaoValores($rsPermissao['pg_pf_missaovalores']);

            $permissao->setCmsUser($rsPermissao['pg_cms_user']);

            return $permissao;
        }else{
            return "FALHA";
        }

        $this->conn->closeConnection();

    }

    public function selectAll(){

        $sql = "select * from tbl_permissao where padrao = 1 order by nome";

        $pdoConn = $this->conn->startConnection();

        $select = $pdoConn->query($sql);

        $i = 0;
        
        while($rsPermissoes=$select->fetch(PDO::FETCH_ASSOC)){

            $listPermissoes[] = new PermissaoCms();
            $listPermissoes[$i]->setId($rsPermissoes['id']);
            $listPermissoes[$i]->setDescricao($rsPermissoes['nome']);
            $listPermissoes[$i]->setPadrao($rsPermissoes['padrao']);
            
            $listPermissoes[$i]->setPfHome($rsPermissoes['pg_pf_home']);
            $listPermissoes[$i]->setPfHistoria($rsPermissoes['pg_pf_historia']);
            $listPermissoes[$i]->setCmsUser($rsPermissoes['pg_cms_user']);
            

            $i++;
        }

        $this->conn->closeConnection();

        return $listPermissoes;

    }

    public function insert(PermissaoCms $permissao){

        // echo "TESTEEEE<br><br><br><br>";
        // var_dump($permissao);
        // echo "TESTEEEE<br><br><br><br>";

        $sql = "INSERT INTO tbl_permissao (`nome`, `pg_pf_home`, `pg_pf_historia`, `pg_pf_produto`, `pg_pf_brindes`, `pg_pf_noticias`, `pg_pf_divulgacao`, `pg_pf_videos`, `pg_pf_patrocinados`, `pg_pf_eventos`, `pg_pf_nossaslojas`, `pg_pf_promocoes`, `pg_pf_faleconosco`, `pg_pf_popsnaescola`, `pg_pf_missaovalores`, `pg_cms_user`, `padrao`) 
        VALUES ('".$permissao->getDescricao()."', 
        '".$permissao->getPfHome()."', 
        '".$permissao->getPfHistoria()."', 
        '".$permissao->getPfProduto()."', 
        '".$permissao->getPfBrindes()."', 
        '".$permissao->getPfNoticias()."', 
        '".$permissao->getpfDivulgacao()."', 
        '".$permissao->getPfVideos()."', 
        '".$permissao->getPfPatrocinados()."', 
        '".$permissao->getPfEventos()."', 
        '".$permissao->getPfNossasLojas()."', 
        '".$permissao->getPfPromocoes()."', 
        '".$permissao->getPfFaleConosco()."',  
        '".$permissao->getPfPopsNaEscola()."', 
        '".$permissao->getPfMissaoValores()."', 
        '".$permissao->getCmsUser()."', 
        '".$permissao->getPadrao()."');";

        // echo "INSERT: $sql <br>";

        $pdoConn = $this->conn->startConnection();

        if($pdoConn->query($sql)){
            // header('location:index.php?usuario');

            $sql = "select id from tbl_permissao order by id desc limit 1";

            $select = $pdoConn->query($sql);

            $this->conn->closeConnection();

            if($rsPermissao=$select->fetch(PDO::FETCH_ASSOC)){
                return $rsPermissao['id'];
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

        // $sql = "UPDATE `tbl_permissao` SET `nome`='".$permissao->getDescricao()."', `pg_pf_home`='".$permissao->getPgHome()."', `pg_pf_historia`='".$permissao->getPgHistoria()."', `pg_cms_user`='".$permissao->getPgUser()."' WHERE `id`=".$permissao->getId()."";
        // echo "AAA".$sql;

        $pdoConn = $this->conn->startConnection();

        if($pdoConn->query($sql)){
            $this->conn->closeConnection();
            // header('location:index.php?usuario');
            echo "1";
        }else{
            echo 'Erro no script de UPDATE';
        }

        $this->conn->closeConnection();

    }

    public function delete($id){

        $sql = "DELETE FROM tbl_permissao WHERE id = $id AND id != 1";

        $pdoConn = $this->conn->startConnection();

        if($pdoConn->query($sql)){
            $this->conn->closeConnection();
            return "1";
        }else{
            return '0';
        }

        $this->conn->closeConnection();

    }

    
}

?>