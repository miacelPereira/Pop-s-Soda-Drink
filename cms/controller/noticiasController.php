<?php
    class NoticiasController{
        private $dao;
        
        public function __construct(){ $this->dao = new NoticiasDao(); }
        public function getAll(){ return $this->dao->selectAll(); }
        public function getOne($id){ return $this->dao->selectOne($id); }
        public function delete($id){ $this->dao->delete($id); }
        public function disable($id, $ativo){ $this->dao->disable($id, $ativo); }
        public function add(){
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $noticia = new Noticias();
                $noticia->setTitulo($_POST['txt-titulo']);
                $noticia->setSubTitulo($_POST['txt-subtitulo']);
                $noticia->setIntroducao($_POST['txt-introducao']);
                $noticia->setTexto($_POST['txt-texto']);
                $noticia->setImagem(TreatImage($_FILES['file-imagem'], "noticia"));
                $this->dao->insert($noticia);
            }
        }
        
        public function update(){
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $noticia = new Noticias();
                $noticia->setId($_GET['id']);
                $noticia->setTitulo($_POST['txt-titulo']);
                $noticia->setSubTitulo($_POST['txt-subtitulo']);
                $noticia->setIntroducao($_POST['txt-introducao']);
                $noticia->setTexto($_POST['txt-texto']);
                if($_FILES['file-imagem']['size'] != 0){
                    $noticia->setImagem(TreatImage($_FILES['file-noticia'], "noticia"));
                }
                echo('controller');
                $this->dao->update($noticia);
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
