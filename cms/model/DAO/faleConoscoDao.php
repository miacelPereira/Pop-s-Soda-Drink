<?php

class FaleConoscoDao{

    private $conn;

    public function __construct(){
        
        $this->conn = new MysqlConn();
    }
    
    public function insert(FaleConoscoClass $mensagemFale){
 
        $sql = "INSERT INTO tbl_fale_conosco (primeiro_nome, sobrenome, email, telefone, celular, mensagem, tipo_mensagem)
        VALUES ('".$mensagemFale->getNome()."', '".$mensagemFale->getSobrenome()."', '".$mensagemFale->getEmail()."', '".$mensagemFale->getTelefone()."','".$mensagemFale->getCelular()."', '".$mensagemFale->getMensagem()."', 1)";
        
        $pdoConn = $this->conn->startConnection();

        if($pdoConn->query($sql)){
            
            $this->conn->closeConnection();
            
            return 1;
            
        }else{
            $this->conn->closeConnection();
            
            // RESPOSTA
            return 'Erro no script de INSERT';
        }
        
    }
    
    public function selectById($id){

        $sql = "SELECT * FROM tbl_fale_conosco WHERE id = ".$id;

        $pdoConn = $this->conn->startConnection();

        $select = $pdoConn->query($sql);

        $this->conn->closeConnection();

        if($rsFale=$select->fetch(PDO::FETCH_ASSOC)){

            $faleClass = new FaleConoscoClass();

            $faleClass->setId($rsFale['id']);
            $faleClass->setNome($rsFale['primeiro_nome']);
            $faleClass->setSobrenome($rsFale['sobrenome']);
            $faleClass->setEmail($rsFale['email']);
            $faleClass->setTelefone($rsFale['telefone']);
            $faleClass->setCelular($rsFale['celular']);
            $faleClass->setCategoria($rsFale['tipo_mensagem']);
            $faleClass->setMensagem($rsFale['mensagem']);
            

            return $faleClass;
        }else{
            return "FALHA";
        }        

    }
    public function selectAll(){

        $sql = "SELECT * FROM tbl_fale_conosco";

        $pdoConn = $this->conn->startConnection();

        $select = $pdoConn->query($sql);

        $i = 0;

        while($rsUsuario=$select->fetch(PDO::FETCH_ASSOC)){

            $listFale[] = new FaleConoscoClass();
            $listFale[$i]->setId($rsUsuario['id']);
            $listFale[$i]->setNome($rsUsuario['primeiro_nome']);
            $listFale[$i]->setSobrenome($rsUsuario['sobrenome']);
            $listFale[$i]->setEmail($rsUsuario['email']);
            $listFale[$i]->setTelefone($rsUsuario['telefone']);
            $listFale[$i]->setCelular($rsUsuario['celular']);
            $listFale[$i]->setCategoria($rsUsuario['tipo_mensagem']);
            $listFale[$i]->setMensagem($rsUsuario['mensagem']);

            $i++;
        }

        $this->conn->closeConnection();

        if(isset($listFale)){
            return $listFale;
           
        }else{
            return "Erro no banco!";
        }

    }
    
   
    public function delete($id){

        $sql = "DELETE FROM tbl_fale_conosco WHERE id = $id";

        $pdoConn = $this->conn->startConnection();

        if($pdoConn->query($sql)){
            $this->conn->closeConnection();
            return 1;
        }else{
            $this->conn->closeConnection();
            return 'Erro no script de DELETE';
        }
    }
}
   
?>

