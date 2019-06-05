<?php

class MateriaPrimaDao{

    private $conn;

    public function __construct(){
        $this->conn = new MysqlConn();
    }

    public function selectAll(){

        $sql = "select * from vw_materia_prima";

        $pdoConn = $this->conn->startConnection();

        $select = $pdoConn->query($sql);

        $i = 0;
        
        while($rs=$select->fetch(PDO::FETCH_ASSOC)){

            $list[] = new MateriaPrima();
            $list[$i]->setId($rs['id_materia_prima']);
            // $list[$i]->setNome(utf8_encode($rs['descricao']));
            $list[$i]->setNome($rs['descricao']);
            $list[$i]->setImposto($rs['imposto']);
            $list[$i]->setTempoRessuprimento($rs['tempo_ressuprimento']);
            $list[$i]->setintervaloRessuprimento($rs['intervalo_ressuprimento']);
            $list[$i]->setLocalizacao($rs['localizacao']);
            $list[$i]->setLocalizacao($rs['numero_prateleira'], 'prat');
            $list[$i]->setLocalizacao($rs['nome_corredor'], 'cor');
            $list[$i]->setQuantidadeEstoque($rs['quantidade_estoque']);
            $list[$i]->setUnidadeMedida('id', $rs['id_unidade_medida']);
            $list[$i]->setUnidadeMedida('nome', utf8_encode($rs['nome_unidade_medida']));
            $list[$i]->setUnidadeMedida('abrev', utf8_encode($rs['abrev_unidade_medida']));

            $i++;
            
            $this->conn->closeConnection();

            
        }
        
        $this->conn->closeConnection();

        if(isset($list)){
            return $list;
           
        }else{
            return "Erro no banco!";
        }
    }

    public function selectById($id){

        $sql = "select * from vw_materia_prima where id_materia_prima = ".$id;

        $pdoConn = $this->conn->startConnection();

        $select = $pdoConn->query($sql);

        $this->conn->closeConnection();

        if($rs=$select->fetch(PDO::FETCH_ASSOC)){

            $matprima = new MateriaPrima();

            $matprimaDao = new MateriaPrimaDao();

            $matprima->setId($rs['id_materia_prima']);
            $matprima->setNome(utf8_encode($rs['descricao']));
            $matprima->setImposto($rs['imposto']);
            $matprima->setTempoRessuprimento($rs['tempo_ressuprimento']);
            $matprima->setIntervaloRessuprimento($rs['intervalo_ressuprimento']);
            $matprima->setLocalizacao($rs['localizacao']);
            $matprima->setQuantidadeEstoque($rs['quantidade_estoque']);
            $matprima->setUnidadeMedida("id", $rs['id_unidade_medida']);
            $matprima->setUnidadeMedida("nome", $rs['nome_unidade_medida']);
            $matprima->setUnidadeMedida("abrev", $rs['abrev_unidade_medida']);

            return $matprima;
        }else{
            return "FALHA";
        }

        

    }

    public function insert(MateriaPrima $matprima){

        $sql = "INSERT INTO `db_oncreate`.`tbl_materia_prima` (`descricao`, `imposto`, `tempo_ressuprimento`, `intervalo_ressuprimento`, `localizacao`, `quantidade_estoque`, `id_unidade_medida`)
        VALUES ('".$matprima->getNome()."', 
        '".$matprima->getImposto()."', 
        '".$matprima->getTempoRessuprimento()."', 
        '".$matprima->getIntervaloRessuprimento()."', 
        '".$matprima->getLocalizacao("id")."', 
        '".$matprima->getQuantidadeEstoque()."', 
        '".$matprima->getUnidadeMedida()."');";

        $pdoConn = $this->conn->startConnection();

        if($pdoConn->query($sql)){
            
           
            
            $this->conn->closeConnection();

            // RESPOSTA
          return "1";
            
            
        }else{
            
            //var_dump($sql);
            return 'Erro no script de INSERT!';
        }

    }

    public function update(MateriaPrima $matprima){

        $sql = "UPDATE `tbl_materia_prima` SET 
        `descricao`='".$matprima->getNome()."', 
        `imposto`='".$matprima->getImposto()."', 
        `tempo_ressuprimento`='".$matprima->getTempoRessuprimento()."', 
        `intervalo_ressuprimento`='".$matprima->getIntervaloRessuprimento()."', 
        `localizacao`='".$matprima->getLocalizacao("id")."', 
        `quantidade_estoque`='".$matprima->getQuantidadeEstoque()."', 
        `id_unidade_medida`='".$matprima->getUnidadeMedida()."' 
        WHERE `id_materia_prima`='".$matprima->getId()."';";

        $pdoConn = $this->conn->startConnection();

        if($pdoConn->query($sql)){
            $this->conn->closeConnection();
            return 1;
        }else{
            $this->conn->closeConnection();
            return "ERRO: $sql";
        }    

    }

    public function delete($id){
        
        $sql = "DELETE FROM tbl_materia_prima WHERE id_materia_prima = ".$id;
        
        $pdoConn = $this->conn->startConnection();
        
//        var_dump($sql);
        
        if($pdoConn->query($sql)){
            
            $this->conn->closeConnection();
            return 1;
            
        }else{
            echo 'Erro no script de DELETE';
        }

        $this->conn->closeConnection();

    }
}

?>