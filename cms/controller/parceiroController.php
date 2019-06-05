<?php
    class ParceiroController{
        private $dao;
        
        public function __construct(){ $this->dao = new ParceiroDao(); }
        public function getAll(){ return $this->dao->selectAll(); }
        public function getOne($id){ return $this->dao->selectOne($id); }
        public function delete($id){ $this->dao->delete($id); }
        public function disable($id, $ativo){ $this->dao->disable($id, $ativo); }
        public function add(){
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $parceiro = new Parceiro();
                $parceiro->setNome($_POST['txt-nome']);
                $parceiro->setModalidade($_POST['txt-esporte']);
                $parceiro->setPais($_POST['txt-pais']);
                $parceiro->setImagem(TreatImage($_FILES['file-imagem'], "parceiro"));
                $this->dao->insert($parceiro);
            }
        }
        public function edit(){
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $parceiro = new Parceiro();
                $parceiro->setId($_GET['id']);
                $parceiro->setNome($_POST['txt-nome']);
                $parceiro->setModalidade($_POST['txt-esporte']);
                $parceiro->setPais($_POST['txt-pais']);
                if($_FILES['file-imagem']['size'] != 0){
                    $parceiro->setImagem(TreatImage($_FILES['file-imagem'], "parceiro"));
                }
                $this->dao->update($parceiro);
            }
        }
    }

    function TreatImage($nameFile, $nameFolder){
        $name = $nameFile['name'];
        $fileSize = round($nameFile['size']/2028);
        $fileExtension = strrchr($name,".");
        $filename = pathinfo($name, PATHINFO_FILENAME);
        $filename = md5(uniqid(time()).$filename);
        $dir = $_SERVER['DOCUMENT_ROOT']."/inf4m20191/tcc/cms/view/img/uploaded/".$nameFolder."/";
        $extensoesPermitidas = array(".jpg", ".png", ".jpeg");
        if(in_array($fileExtension, $extensoesPermitidas)){
            if($fileSize<20000){
                $tempFile = $nameFile['tmp_name'];
                $imgDir = $dir . $filename . $fileExtension;
                if(move_uploaded_file($tempFile, $imgDir)){
                    return $imgDir;
                }
            }
        }
    }        
?>
