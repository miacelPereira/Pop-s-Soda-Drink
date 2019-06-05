<?php
    class MissaoValorController{
        private $dao;
        
        public function __construct(){ $this->dao = new MissaoValorDao(); }
        public function getAll(){ return $this->dao->selectAll(); }
        public function getOne($id){ return $this->dao->selectOne($id); }
        public function delete($id){ $this->dao->delete($id); }
        public function disable($id, $ativo){ $this->dao->disable($id, $ativo); }
        public function add(){
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $missao = new MissaoValor();
                $missao->setMissao($_POST['txt-missao']);
                $missao->setVisao($_POST['txt-visao']);
                $missao->setValor($_POST['txt-valores']);
                $missao->setImagem(TreatImage($_FILES['file-missao'], "missao"));
                $this->dao->add($missao);
            }

        }
        public function update(){
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $missao = new MissaoValor();
                $missao->setId($_GET['id']);
                $missao->setMissao($_POST['txt-missao']);
                $missao->setVisao($_POST['txt-visao']);
                $missao->setValor($_POST['txt-valores']);
                if($_FILES['file-missao']['size'] != 0){
                    $missao->setImagem(TreatImage($_FILES['file-missao'], "missao"));
                }
                $this->dao->update($missao);
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
