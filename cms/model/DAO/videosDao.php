<?php

class VideosDao{

    private $conn;

    public function __construct(){
        
        $this->conn = new MysqlConn();
    }
    
    public function insert(VideosClass $video){
        
     //   var_dump($mensagemFale);
        
        
        $sql = "INSERT INTO tbl_videos (nome_video, video, visualizacoes, status)
        VALUES ('".$video->getNome()."', '".$video->getEndereco()."', '', '')";

      
        
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
    
    public function update(VideosClass $video){

        $sql = "UPDATE tbl_videos SET nome_video = '".$video->getNome()."', video = '".$video->getEndereco()."', visualizacoes = '".$video->getVisualizacoes()."', status = '".$video->getStatus()."' WHERE id = '".$video->getId()."'";

        $pdoConn = $this->conn->startConnection();

        if($pdoConn->query($sql)){
            
            $this->conn->closeConnection();
            
            // RESPOSTA
            return "1";
            
        }else{
            echo 'Erro no script de UPDATE';
            
            echo $sql;
            
        }

        $this->conn->closeConnection();

    }
    
    public function selectById($id){

        $sql = "SELECT * FROM tbl_videos WHERE id = ".$id;

        $pdoConn = $this->conn->startConnection();

        $select = $pdoConn->query($sql);

        $this->conn->closeConnection();

        if($rsVideo=$select->fetch(PDO::FETCH_ASSOC)){

            $videoClass = new VideosClass();

            $videoClass->setId($rsVideo['id']);
            $videoClass->setNome($rsVideo['nome_video']);
            $videoClass->setEndereco($rsVideo['video']);
            $videoClass->setVisualizacoes($rsVideo['visualizacoes']);
            $videoClass->setStatus($rsVideo['status']);
            

            return $videoClass;
        }else{
            return "FALHA";
        }        

    }
    public function selectAll(){

        $sql = "SELECT * FROM tbl_videos";

        $pdoConn = $this->conn->startConnection();

        $select = $pdoConn->query($sql);

        $i = 0;

        while($rsVideo=$select->fetch(PDO::FETCH_ASSOC)){

            $listaVideo[] = new VideosClass();
            $listaVideo[$i]->setId($rsVideo['id']);
            $listaVideo[$i]->setNome($rsVideo['nome_video']);
            $listaVideo[$i]->setEndereco($rsVideo['video']);
            $listaVideo[$i]->setVisualizacoes($rsVideo['visualizacoes']);
            $listaVideo[$i]->setStatus($rsVideo['status']);

            $i++;
        }

        $this->conn->closeConnection();

        if(isset($listaVideo)){
            return $listaVideo;
           
        }else{
            return "Erro no banco!";
        }

    }
    
   
    public function delete($id){

        $sql = "DELETE FROM tbl_videos WHERE id = $id";

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
