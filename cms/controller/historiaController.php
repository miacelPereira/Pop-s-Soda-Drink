<?php
    class HistoriaController{
        private $dao;

        public function __construct(){ $this->dao = new HistoriaDao(); }
        public function getAll(){ return $this->dao->selectAll(); }
        public function getOne($id){ return $this->dao->selectOne($id); }
        public function delete($id){ $this->dao->delete($id); }
        public function disable($id, $ativo){ $this->dao->disable($id, $ativo); }
        public function add(){
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $historia = new Historia();
                $historia->setTitulo($_POST['txttitulo']);
                $historia->setFrase($_POST['txtsubtitulo']);
                $historia->setPrimeiroTexto($_POST['txthistoriaprimeira']);
                $historia->setSegundaTexto($_POST['txthistoriasegunda']);
                $historia->setPrimeiraImagem(TreatImage($_FILES['fileprimeira'], "historia"));
                $historia->setSegundaImagem(TreatImage($_FILES['filesegunda'], "historia"));
                $this->dao->add($historia);
            }
        }
        public function update(){
            if($_SERVER['REQUEST_METHOD'] === 'POST'){
                $historia = new Historia();
                $historia->setId($_GET['id']);
                $historia->setTitulo($_POST['txttitulo']);
                $historia->setFrase($_POST['txtsubtitulo']);
                $historia->setPrimeiroTexto($_POST['txthistoriaprimeira']);
                $historia->setSegundaTexto($_POST['txthistoriasegunda']);
                if($_FILES['fileprimeira']['size'] != 0){
                    $historia->setPrimeiraImagem(TreatImage($_FILES['fileprimeira'], "historia"));
                }
                if($_FILES['filesegunda']['size'] != 0){
                    $historia->setSegundaImagem(TreatImage($_FILES['filesegunda'], "historia"));
                }
                $this->dao->edit($historia);
            }
        }   
    }

    function TreatImage($nameFile, $nameFolder){
        $name = $nameFile['name'];
        $fileSize = round($nameFile['size']/2028);
        $fileExtension = strrchr($name,".");
        $filename = pathinfo($name, PATHINFO_FILENAME);
        $filename = md5(uniqid(time()).$filename);
        $dir = $_SERVER['DOCUMENT_ROOT']."/TCC/cms/view/img/uploaded/".$nameFolder."/";
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
