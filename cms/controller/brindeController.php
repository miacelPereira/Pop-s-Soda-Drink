<?php



class BrindeController{

    private $brindeCmsDao;

    public function __construct(){

        $this->brindeDao = new BrindeDao();
        
       


    }

    public function insertBrinde(){
        
        //require_once '../upload.php';

        if($_SERVER['REQUEST_METHOD'] == 'POST'){

            $brinde = new BrindeCms();

            $name = $_FILES['flImg']['name'];
            $fileSize = round($_FILES['flImg']['size']/1024);
            $fileExtension = strrchr($name,".");

            $filename = pathinfo($name, PATHINFO_FILENAME);
            $filename = md5(uniqid(time()).$filename);

            $dir = $_SERVER['DOCUMENT_ROOT']."/inf4m20191/tcc/cms/view/img/uploaded/brinde/";

            $extensoesPermitidas = array(".jpg", ".png", ".jpeg");

            if(in_array($fileExtension, $extensoesPermitidas)){
                if($fileSize<20000){

                    $tempFile = $_FILES['flImg']['tmp_name'];
                    $imgDir = $dir . $filename . $fileExtension;

                    if(move_uploaded_file($tempFile, $imgDir)){
                        $brinde->setFoto($imgDir);
                    }
                }
            }
            
            $brinde->setNome($_POST['txtNome']);
            $brinde->setDescricao($_POST['txtDescricao']);
            $brinde->setPreco($_POST['txtPreco']);
            
            return $this->brindeDao->insert($brinde);
        }

    }

    public function updateBrinde(){
        
        if($_SERVER['REQUEST_METHOD'] == 'POST'){

            $brinde = new BrindeCms();

            $name = $_FILES['flImg']['name'];
            $fileSize = round($_FILES['flImg']['size']/1024);
            $fileExtension = strrchr($name,".");

            $filename = pathinfo($name, PATHINFO_FILENAME);
            $filename = md5(uniqid(time()).$filename);

            $dir = $_SERVER['DOCUMENT_ROOT']."/inf4m20191/tcc/cms/view/img/uploaded/brinde/";

            $extensoesPermitidas = array(".jpg", ".png", ".jpeg");

            if(in_array($fileExtension, $extensoesPermitidas)){
                if($fileSize<20000){

                    $tempFile = $_FILES['flImg']['tmp_name'];
                    $imgDir = $dir . $filename . $fileExtension;

                    if(move_uploaded_file($tempFile, $imgDir)){
                        $brinde->setFoto($imgDir);
                    }
                }
            }
            $brinde->setId($_GET['id']);
            $brinde->setNome($_POST['txtNome']);
            $brinde->setDescricao($_POST['txtDescricao']);
            $brinde->setPreco($_POST['txtPreco']);
            
            return $this->brindeDao->update($brinde);
        }

    }

    public function statusBrinde($id, $ativo){ 

       // echo("chegou na contr");;
       
        $this->brindeDao->statusBrinde($id, $ativo); 
    }

    public function listBrinde(){

        return $this->brindeDao->selectAll();
    }

    public function getBrinde($id){

        return $this->brindeDao->selectById($id);
    }

    public function deleteBrinde($id){

        return $this->brindeDao->delete($id);
    }

}

?>