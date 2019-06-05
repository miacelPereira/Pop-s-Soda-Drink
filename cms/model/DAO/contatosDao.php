<?php

class ContatosDao{

    private $conn;

    public function __construct(){
        
        $this->conn = new MysqlConn();
    }
    
    public function insert(ContatosClass $contato){
        
     //   var_dump($mensagemFale);
        
        
        $sql = "INSERT INTO tbl_contatos (primeiro_nome, email)
                VALUES ('".$contato->getNome()."', '".$contato->getEmail()."')";

      
        
        $pdoConn = $this->conn->startConnection();

        if($pdoConn->query($sql)){
            
            $this->conn->closeConnection();

            // RESPOSTA
            return "1";
            
        }else{
            $this->conn->closeConnection();
            
            // RESPOSTA
            return 'Erro no script de INSERT';
        }
        
    }
    public function selectAll(){

        $sql = "SELECT * FROM tbl_contatos";

        $pdoConn = $this->conn->startConnection();

        $select = $pdoConn->query($sql);

        $i = 0;

        while($rsContato=$select->fetch(PDO::FETCH_ASSOC)){

            $listaContatos[] = new ContatosClass();
            $listaContatos[$i]->setId($rsContato['id']);
            $listaContatos[$i]->setNome($rsContato['primeiro_nome']);
            $listaContatos[$i]->setEmail($rsContato['email']);

            $i++;
        }

        $this->conn->closeConnection();

        if(isset($listaContatos)){
            return $listaContatos;
           
        }else{
            return "Erro no banco!";
        }

    }  
   
    public function delete($id){

        $sql = "DELETE FROM tbl_contatos WHERE id = $id";

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
