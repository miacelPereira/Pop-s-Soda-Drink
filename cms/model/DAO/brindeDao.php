<?php

class BrindeDao{

    private $conn;

    public function __construct(){

        $this->conn = new MysqlConn();
    }

    public function insert(BrindeCms $brinde){

        $sql = "insert into tbl_brinde (nome, descricao, preco, status)
        values ('".$brinde->getNome()."','".$brinde->getDescricao()."','".$brinde->getPreco()."',1)";

        $pdoConn = $this->conn->startConnection();
        
        if($pdoConn->query($sql)){

            $sql = "select id_brinde from tbl_brinde order by id_brinde desc limit 1";

            $select = $pdoConn->query($sql);

            if($rs=$select->fetch(PDO::FETCH_ASSOC)){
                $id_brinde= $rs['id_brinde'];
            }

            if($pdoConn->query($sql)){

            //INSERINDO A FOTO
                $sql = "insert into tbl_foto_brinde (img,id_brinde)
                values ('".$brinde->getFoto()."','".$id_brinde."')";

                $pdoConn = $this->conn->startConnection();

            }if($pdoConn->query($sql)){
               
                $this->conn->closeConnection();
                
              //  if($return1=="1" && $return2=="1"){
                    return "1";
              //  }
                
            }else{
                
                $this->conn->closeConnection();
                
                // RESPOSTA
                return 'Erro no script de INSERT foto'.var_dump($sql);
            }
            
        
        }
    }

    public function selectAll(){

        $sql = "select * from tbl_brinde order by id_brinde desc";

        $pdoConn=$this->conn->startConnection();

        $select = $pdoConn->query($sql);

        $i =0;

        while($rsBrinde=$select->fetch(PDO::FETCH_ASSOC)){

            $listBrindes[]= new BrindeCms();
            $listBrindes[$i]->setId($rsBrinde['id_brinde']);
            $listBrindes[$i]->setNome($rsBrinde['nome']);
            $listBrindes[$i]->setDescricao($rsBrinde['descricao']);
            $listBrindes[$i]->setPreco($rsBrinde['preco']);
            $listBrindes[$i]->setStatus($rsBrinde['status']);

            $i++;
        }

        $this->conn->closeConnection();

        if(isset($listBrindes)){
            return $listBrindes;
        }else{
            return "FALHA";
        }
    }


    public function delete($id){

        $sql = "DELETE FROM tbl_foto_brinde WHERE id_brinde = $id;";

        $pdoConn = $this->conn->startConnection();
        
        if($pdoConn->query($sql)){

            $sql = "DELETE FROM tbl_brinde WHERE id_brinde = $id;";

            
            
            $pdoConn = $this->conn->startConnection();

        }if($pdoConn->query($sql)){
            
            $this->conn->closeConnection();
            return 1;
           // echo($sql);
            // header('location:index.php?usuario');
        }else{
            $this->conn->closeConnection();
            return 'Erro no script de DELETE';
        }

       

    }

    public function update(BrindeCms $brinde){

        $sql = "UPDATE tbl_brinde SET nome = '".$brinde->getNome()."', 
                                    descricao = '".$brinde->getDescricao()."', 
                                    preco = '".$brinde->getPreco()."' WHERE id_brinde = ".$brinde->getId();

        //"update tbl_brind bla bla bla $brinde->getNome()"
    
        $pdoConn = $this->conn->startConnection();

        if($pdoConn->query($sql)){
            $this->conn->closeConnection();

            if($brinde->getFoto()==null){


            }else

                $sql = "UPDATE tbl_foto_brinde SET img = '".$brinde->getFoto()."' WHERE id_brinde = ".$brinde->getId();

                //"update tbl_brind bla bla bla $brinde->getNome()"

                $pdoConn = $this->conn->startConnection();

        if($pdoConn->query($sql)){
        $this->conn->closeConnection();

          return 1;
        }
        }else{
            echo 'Erro no script de UPDATE';
        }

        $this->conn->closeConnection();
    }
    


    public function selectById($id){

        $sql = "select * from tbl_brinde where id_brinde = ".$id;
       
        $pdoConn = $this->conn->startConnection();

        $select = $pdoConn->query($sql);

        

        if($rsBrinde=$select->fetch(PDO::FETCH_ASSOC)){
    
            $brinde = new BrindeCms();

            $brinde->setId($rsBrinde['id_brinde']);
            $brinde->setNome($rsBrinde['nome']);
            $brinde->setDescricao($rsBrinde['descricao']);
            $brinde->setPreco($rsBrinde['preco']);
            
            
            $sql = "select * from tbl_foto_brinde where id_brinde = ".$id;
       
            $pdoConn = $this->conn->startConnection();
    
            $select = $pdoConn->query($sql);
    
            
    
            if($rsBrinde=$select->fetch(PDO::FETCH_ASSOC)){
        
                
    
                $brinde->setFoto($rsBrinde['img']);

              
                    return $brinde;
                
        }

    }else{
        return "FALHA";
    }
    $this->conn->closeConnection();
        

    }

    public function statusBrinde($id, $ativo){
        if($ativo == 0){
            $sql = "update tbl_brinde set status = 1 where id_brinde = ". $id;
            //echo($sql);
            $pdoConn = $this->conn->startConnection();
        $pdoConn->query($sql);
        return 1;

        }else{
            $sql = "update tbl_brinde set status = 0 where id_brinde = ". $id;
            //echo($sql);
            $pdoConn = $this->conn->startConnection();
        $pdoConn->query($sql);
        return 0;

        }
        
        $this->conn->closeConnection();

    }

    


}


?>